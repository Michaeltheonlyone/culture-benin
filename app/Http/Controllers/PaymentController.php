<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contenu;
use Illuminate\Support\Facades\Auth;
use FedaPay\FedaPay;
use FedaPay\Transaction;

class PaymentController extends Controller
{
    /**
     * Initiate payment for content access
     */
    public function initiatePayment(Request $request, $contentId)
    {
        if (!Auth::check()) {
            return redirect()->route('login')
                ->with('error', 'Veuillez vous connecter pour effectuer un paiement.');
        }

        $content = Contenu::findOrFail($contentId);
        $user = Auth::user();
        $amount = 50000; // 500 XOF in cents

        // Configure FedaPay
        FedaPay::setApiKey(config('services.fedapay.secret'));
        FedaPay::setEnvironment(config('services.fedapay.env', 'sandbox'));

        $customerData = [
            'firstname' => $user->prenom ?? 'Client',
            'lastname'  => $user->nom ?? 'Anonyme',
            'email'     => $user->email,
            'phone_number' => [
                'number' => $user->phone ?? '00000000',
                'country' => 'BJ'
            ]
        ];

        try {
            $transaction = Transaction::create([
                'amount' => $amount,
                'description' => "Accès au contenu: " . ($content->titre ?? 'Contenu #' . $content->id),
                'currency' => ['iso' => 'XOF'],
                'customer' => $customerData,
                'callback_url' => route('payment.callback', ['contentId' => $contentId])
            ]);

            // Store transaction ID in session
            session([
                'payment_transaction_id' => $transaction->id,
                'payment_content_id' => $contentId,
            ]);

            // Use generateToken() instead of generatePaymentUrl()
            $token = $transaction->generateToken();
            return redirect()->away($token->url);

        } catch (\Exception $e) {
            return redirect()->route('contenus.show', $contentId)
                ->with('error', 'Erreur lors de l\'initialisation du paiement: ' . $e->getMessage());
        }
    }

    /**
     * Payment callback from FedaPay
     */
    public function paymentCallback(Request $request, $contentId = null)
    {
        $contentId = $contentId ?? session('payment_content_id');
        $transactionId = $request->input('transaction_id') ?? session('payment_transaction_id');

        if (!$transactionId || !$contentId) {
            return redirect()->route('frontend.contenus.feed')
                ->with('error', 'Session de paiement invalide.');
        }

        // Configure FedaPay
        FedaPay::setApiKey(config('services.fedapay.secret'));
        FedaPay::setEnvironment(config('services.fedapay.env', 'sandbox'));

        try {
            $transaction = Transaction::retrieve($transactionId);
            $status = $transaction->status;

            if ($status === 'approved') {
                // Grant access
                session(["paid_content_{$contentId}" => true]);

                // Clear session
                session()->forget(['payment_content_id', 'payment_transaction_id']);

                return redirect()->route('contenus.show', $contentId)
                    ->with('success', 'Paiement réussi! Vous avez maintenant accès au contenu.');

            } elseif ($status === 'canceled') {
                return redirect()->route('contenus.show', $contentId)
                    ->with('error', 'Paiement annulé.');

            } else {
                return redirect()->route('contenus.show', $contentId)
                    ->with('error', 'Paiement échoué. Statut: ' . $status);
            }

        } catch (\Exception $e) {
            return redirect()->route('contenus.show', $contentId)
                ->with('error', 'Erreur de vérification du paiement: ' . $e->getMessage());
        }
    }

    /**
     * Check if user has paid for content
     */
    public static function hasPaid($contentId)
    {
        if (!Auth::check()) return false;
        
        // Check if user is the author (authors see content for free)
        $content = Contenu::find($contentId);
        if ($content && Auth::id() == ($content->user_id ?? $content->auteur->id ?? null)) {
            return true;
        }
        
        // Check session for payment
        return session()->has("paid_content_{$contentId}");
    }
}
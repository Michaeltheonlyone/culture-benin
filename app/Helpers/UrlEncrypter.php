<?php
namespace App\Helpers;
use Illuminate\Support\Facades\Crypt;
class UrlEncrypter {
    public static function encrypt($data) {
        $encrypted = Crypt::encryptString($data);
        $safe = str_replace(['=', '/', '+'], ['', '_', '-'], base64_encode($encrypted));
        return $safe;
    }
    public static function decrypt($encryptedData) {
        $base64 = str_replace(['_', '-'], ['/', '+'], $encryptedData);
        $padding = strlen($base64) % 4;
        if ($padding > 0) { $base64 .= str_repeat('=', 4 - $padding); }
        $original = base64_decode($base64);
        return Crypt::decryptString($original);
    }
}
<?php
require_once __DIR__ . '/vendor/autoload.php';

echo "<h1>Testing FedaPay Autoloader</h1>";

// Test if class exists
if (class_exists('FedaPay\FedaPay')) {
    echo "✅ FedaPay\\FedaPay class loaded via autoloader<br>";
} else {
    echo "❌ FedaPay\\FedaPay class NOT loaded<br>";
}

// Test if we can create an instance
try {
    $fedapay = new FedaPay\FedaPay();
    echo "✅ FedaPay instance created successfully<br>";
} catch (Exception $e) {
    echo "❌ Failed to create FedaPay instance: " . $e->getMessage() . "<br>";
}
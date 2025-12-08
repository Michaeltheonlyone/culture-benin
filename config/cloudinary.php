<?php

return [
    'cloud_url' => env('CLOUDINARY_URL'),
    
    // Add these new configs
    'cloud_name' => env('CLOUDINARY_CLOUD_NAME', 'dlt0oyuge'),
    'api_key' => env('CLOUDINARY_KEY'),
    'api_secret' => env('CLOUDINARY_SECRET'),
    'secure' => true,
    
    'notification_url' => env('CLOUDINARY_NOTIFICATION_URL'),
    'upload_preset' => env('CLOUDINARY_UPLOAD_PRESET'),
    'upload_route' => env('CLOUDINARY_UPLOAD_ROUTE'),
    'upload_action' => env('CLOUDINARY_UPLOAD_ACTION'),
];
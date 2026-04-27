<?php
require __DIR__.'/vendor/autoload.php';
$app = require __DIR__.'/bootstrap/app.php';
$app->make('Illuminate\Contracts\Console\Kernel')->bootstrap();

$patient = App\Models\Patient::whereHas('user', function($q) {
    $q->where('name', 'like', '%مرام%');
})->first();

echo "=== مرام appointments ===\n";
foreach($patient->appointments as $appt) {
    echo "Doctor: {$appt->doctor->user->name}\n";
    echo "Medicine: " . ($appt->medicine_name ?: '-') . "\n";
    echo "Notes: " . ($appt->doctor_notes ?: '-') . "\n\n";
}
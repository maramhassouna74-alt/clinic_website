<?php
require __DIR__.'/vendor/autoload.php';
$app = require __DIR__.'/bootstrap/app.php';
$app->make('Illuminate\Contracts\Console\Kernel')->bootstrap();

$patient = App\Models\Patient::whereHas('user', function($q) {
    $q->where('name', 'like', '%مرام%');
})->first();

if($patient) {
    echo "Name: " . $patient->user->name . "\n";
    echo "Type: " . $patient->patient_type . "\n";
    echo "Disease1: " . ($patient->chronic_disease_type ?? 'null') . "\n";
    echo "Disease2: " . ($patient->chronic_disease_type2 ?? 'null') . "\n";
    
    // Update with second disease
    $patient->update(['chronic_disease_type2' => 'الكبد الوبائي']);
    echo "\nUpdated! New Disease2: الكبد الوبائي\n";
} else {
    echo "Patient not found";
}
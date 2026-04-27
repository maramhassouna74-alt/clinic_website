<?php
require __DIR__.'/vendor/autoload.php';
$app = require __DIR__.'/bootstrap/app.php';
$app->make('Illuminate\Contracts\Console\Kernel')->bootstrap();

// Find doctor أحمد محمد with طب عام
$doctor = App\Models\Doctor::whereHas('user', function($q) {
    $q->where('name', 'like', '%أحمد محمد%');
})->first();

if($doctor) {
    echo "Found: {$doctor->user->name}\n";
    echo "Specialty: {$doctor->specialty}\n";
    echo "Bio before: " . ($doctor->bio ?? 'empty') . "\n";
    
    $doctor->bio = null;
    $doctor->save();
    
    echo "Bio now: " . ($doctor->bio ?? 'NULL (removed)') . "\n";
} else {
    echo "Doctor not found";
}
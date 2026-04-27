<?php
require __DIR__.'/vendor/autoload.php';
$app = require __DIR__.'/bootstrap/app.php';
$app->make('Illuminate\Contracts\Console\Kernel')->bootstrap();

echo "=== Before ===\n";
$appt8 = App\Models\Appointment::find(8);
echo "medicine_name: '" . $appt8->medicine_name . "'\n";
echo "doctor_notes: '" . $appt8->doctor_notes . "'\n";

$appt8->medicine_name = 'ميتفورمين 500mg';
$appt8->doctor_notes = 'تناول القرص مرتين يومياً بعد الأكل';
$appt8->status = 'completed';
$appt8->save();

echo "\n=== After ===\n";
$appt8 = App\Models\Appointment::find(8);
echo "medicine_name: '" . $appt8->medicine_name . "'\n";
echo "doctor_notes: '" . $appt8->doctor_notes . "'\n";
echo "Status: " . $appt8->status . "\n";
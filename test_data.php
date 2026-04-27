<?php
require __DIR__.'/vendor/autoload.php';
$app = require __DIR__.'/bootstrap/app.php';
$app->make('Illuminate\Contracts\Console\Kernel')->bootstrap();

$appt10 = App\Models\Appointment::find(10);
$appt10->medicine_name = 'اورسو ديوكسي كولين';
$appt10->doctor_notes = 'تزامن مع الطعام، متابعة شهرية';
$appt10->status = 'completed';
$appt10->save();

echo "Updated!\n";
echo "medicine: " . $appt10->medicine_name . "\n";
echo "notes: " . $appt10->doctor_notes . "\n";
<?php
require __DIR__.'/vendor/autoload.php';
$app = require __DIR__.'/bootstrap/app.php';
$app->make('Illuminate\Contracts\Console\Kernel')->bootstrap();

$appointments = App\Models\Appointment::whereNotNull('doctor_notes')
    ->orWhereNotNull('medicine_name')
    ->with('doctor.user', 'patient.user')
    ->get();

echo "Appointments with notes:\n";
foreach($appointments as $appt) {
    echo "- Patient: " . $appt->patient->user->name . ", Doctor: " . $appt->doctor->user->name . "\n";
    echo "  Status: " . $appt->status . "\n";
    echo "  Medicine: " . ($appt->medicine_name ?? 'null') . "\n";
    echo "  Notes: " . ($appt->doctor_notes ?? 'null') . "\n\n";
}

if($appointments->count() == 0) {
    echo "No appointments with doctor_notes found!\n";
}
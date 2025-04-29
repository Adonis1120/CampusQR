<?php

namespace App\Livewire\Qr;

use App\Models\Student;
use Livewire\Component;
use SimpleSoftwareIO\QrCode\Facades\QrCode;

class Generator extends Component
{
    public $students;
    public $studentId;
    public $qrCodeSize = 300;

    public function mount() {
        $this->students = Student::all();
    }

    public function generateQRCode()
    {
        $student = Student::find($this->studentId);

        $qrCode = QrCode::size($this->qrCodeSize)->generate($student->student_number);

        return response()->json(['qrCode' => $qrCode]);
    }

    public function render()
    {
        return view('livewire.qr.generator');
    }
}

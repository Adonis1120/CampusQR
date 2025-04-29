<?php

namespace App\Livewire\Qr;

use App\Models\Student;
use Livewire\Component;
use SimpleSoftwareIO\QrCode\Facades\QrCode;

class Generator extends Component
{
    public $students;
    public $studentSelected;
    public $studentId;
    public $qrCodeSize = 300;
    public $qrCode;

    public function mount() {
        $this->students = Student::all();
    }

    public function generateQRCode()
    {
        $this->studentSelected = Student::find($this->studentId);
    }

    public function render()
    {
        return view('livewire.qr.generator');
    }
}

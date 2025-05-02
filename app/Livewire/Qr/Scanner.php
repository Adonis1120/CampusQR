<?php

namespace App\Livewire\Qr;

use App\Models\Attendance;
use App\Models\Student;
use Livewire\Component;

class Scanner extends Component
{
    public $scannedStudentNumber;
    public $student;
    public $scanError;
    public $recentAttendances;

    protected $listeners = ['qrScanned' => 'onScan'];

    public function mount()
    {
        $this->recentAttendances = Attendance::with('student')
            ->whereDate('created_at', today())
            ->latest()
            ->take(3)
            ->get();
    }

    public function onScan($data)
    {
        $this->scannedStudentNumber = $data;
        
        $this->student = Student::where('student_number', $data)->first();
        
        if ($this->student) {
            $existingAttendance = Attendance::where('student_id', $this->student->id)
                ->whereDate('created_at', today())
                ->first();

            if (!$existingAttendance) {
                Attendance::create([
                    'student_id' => $this->student->id,
                    'date' => now()->toDateString(),
                    'time_in' => now(),
                ]);
                
                $this->recentAttendances = Attendance::with('student')
                    ->whereDate('created_at', today())
                    ->latest()
                    ->take(10)
                    ->get();
            } else {
                $this->scanError = 'Attendance already recorded for today';
            }
        } else {
            $this->scanError = 'Student not found with ID: ' . $data;
        }
    }

    public function render()
    {
        return view('livewire.qr.scanner');
    }
}

<?php

namespace App\Livewire\Qr;

use App\Models\Attendance;
use App\Models\Student;
use Illuminate\Support\Facades\Mail;
use Livewire\Component;

class Scanner extends Component
{
    public $scannedStudentNumber;
    public $student;
    public $scanError;
    public $recentAttendances;
    public $mode = null;

    protected $listeners = ['qrScanned' => 'onScan'];

    public function mount()
    {
        $this->recentAttendances = Attendance::with('student')
            ->whereDate('created_at', today())
            ->latest()
            ->take(5)
            ->get();
    }

    public function onScan($data)
    {
        $this->scannedStudentNumber = $data;
        
        $this->student = Student::where('student_number', $data)->first();
        
        if ($this->student) {
            $latestAttendance = Attendance::where('student_id', $this->student->id)
                ->whereDate('created_at', today())
                ->latest()
                ->first();
            
            $now = now();
            $diff = 0;

            if ($latestAttendance) {
                $latestTime = $latestAttendance->time_in ?? $latestAttendance->time_out;
                $diff = $latestTime->diffInSeconds($now);
            }

            if (!$latestAttendance || $diff >= 5) {
                if (!$latestAttendance || $latestAttendance->time_out) {
                    Attendance::create([
                        'student_id' => $this->student->id,
                        'date' => now()->toDateString(),
                        'time_in' => now(),
                    ]);

                    $this->mode = 'in';
                } else {
                    Attendance::create([
                        'student_id' => $this->student->id,
                        'date' => now()->toDateString(),
                        'time_out' => now(),
                    ]);

                    $this->mode = 'out';
                }
            }

            /* uncomment for twilio push message
            $client = new Client($sid, $token); // can use env for $id, $token and $twilioNumber for safer approach

            $client->messages->create(
                '+1234567890', // recipient phone number
                [
                    'from' => $twilioNumber,
                    'body' => $student->first_name . ' timed in at ' . now()
                ]
            );
            */

            $message = $this->student->name . ' timed ' . $$this->mode . ' at ' . now();

            Mail::raw($message, function ($mail) {
                $mail->to($this->student->email)
                    ->subject("QR Scan Time " . $this->mode);
            });
                
            $this->recentAttendances = Attendance::with('student')
                ->whereDate('created_at', today())
                ->latest()
                ->take(5)
                ->get();
        } else {
            $this->scanError = 'Student not found with ID: ' . $data;
        }
    }

    public function render()
    {
        return view('livewire.qr.scanner');
    }
}

<?php

namespace App\Livewire\Dashboard;

use App\Models\Attendance;
use App\Models\Student;
use Livewire\Component;
use Illuminate\Support\Carbon;

class Index extends Component
{
    public $total_student, $total_present, $total_absent, $attendance_rate;
    public $total_scan, $time_in, $time_out;
    public $recent_attendances;

    public $weekly_attendance_data = [];

    public function mount()
    {
        $this->total_student = Student::count();

        $this->total_present = Attendance::whereBetween('created_at', [now()->startOfDay(),now()->endOfDay()])
            ->distinct('student_id')
            ->count('student_id');

        $this->total_absent = $this->total_student - $this->total_present;
        $this->attendance_rate = number_format($this->total_present / $this->total_student * 100, 2);

        $this->total_scan = Attendance::whereBetween('created_at', [now()->startOfDay(),now()->endOfDay()])->count();
        $this->time_in = Attendance::whereBetween('created_at', [now()->startOfDay(),now()->endOfDay()])->where('time_in', '!=', null)->count();
        $this->time_out = Attendance::whereBetween('created_at', [now()->startOfDay(),now()->endOfDay()])->where('time_out', '!=', null)->count();

        $this->recent_attendances = Attendance::with('student')
            ->whereDate('created_at', today())
            ->latest()
            ->take(5)
            ->get();

        $startOfWeek = now()->startOfWeek();
    
        $this->weekly_attendance_data = collect(range(0, 6))->map(function ($dayOffset) use ($startOfWeek) {
            $date = $startOfWeek->copy()->addDays($dayOffset)->format('Y-m-d');
            $present = Attendance::whereDate('created_at', $date)->distinct('student_id')->count('student_id');
            return [
                'date' => $date,
                'present' => $present,
            ];
        });
    }

    public function render()
    {
        return view('livewire.dashboard.index');
    }
}
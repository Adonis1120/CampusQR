<?php

namespace App\Livewire\Qr;

use App\Models\Attendance;
use App\Models\Student;
use Livewire\Component;
use Livewire\WithPagination;
use Carbon\Carbon;

class Report extends Component
{
    use WithPagination;

    public $recentAttendances;
    public $dateRangeStart;
    public $dateRangeEnd;
    public $totalDays;
    public $totalStudents;
    public $totalPresent;
    public $totalAbsent;
    public $attendanceRate;

    protected $paginationTheme = 'tailwind';

    public function mount()
    {
        $this->dateRangeStart = today()->toDateString();
        $this->dateRangeEnd = today()->toDateString();
        $this->totalDays = 1;
        $this->totalStudents = Student::count();
    }

    public function generateReport()
    {
        $this->totalDays = Carbon::parse($this->dateRangeStart)->diffInDays(Carbon::parse($this->dateRangeEnd)) + 1;

        $this->resetPage();
    }

    public function calculateAttendance()
    {
        // Get total distinct students who attended during the date range
        $this->totalPresent = Attendance::whereBetween('created_at', [$this->dateRangeStart, $this->dateRangeEnd])
            ->distinct('student_id')
            ->count('student_id');

        // Calculate total absent students (total students minus those who attended)
        $this->totalAbsent = $this->totalStudents - $this->totalPresent;
        $this->attendanceRate = $this->totalPresent / $this->totalStudents * 100;
    }

    public function getAttendancesProperty()
    {
        return Attendance::with('student')
            ->whereBetween('created_at', [$this->dateRangeStart, $this->dateRangeEnd])
            ->latest()
            ->paginate(10);
    }

    public function render()
    {
        $this->calculateAttendance();

        return view('livewire.qr.report', [
            'attendances' => $this->attendances,
        ]);
    }
}

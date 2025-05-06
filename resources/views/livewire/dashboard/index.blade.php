<div class="wrapper">
    {{-- Overview Cards --}}
    <x-sections.panel :column="3">
        <div class="dashboard-card dashboard-card--students">
            <div class="dashboard-card-content">
                <div>
                    <flux:text>Total Students</flux:text>
                    <flux:heading size="xl" class="dashboard-card-value">{{ $total_student }}</flux:heading>
                </div>
                <flux:avatar icon="users" color="emerald" />
            </div>
        </div>
    
        <div class="dashboard-card dashboard-card--attendance">
            <div class="dashboard-card-content">
                <div>
                    <flux:text>Today's Attendance</flux:text>
                    <flux:heading size="xl" class="dashboard-card-value">{{ $attendance_rate }}%</flux:heading>
                </div>
                <flux:avatar icon="document-check" color="green" />
            </div>
        </div>
    
        <div class="dashboard-card dashboard-card--scans">
            <div class="dashboard-card-content">
                <div>
                    <flux:text>QR Scans Today</flux:text>
                    <flux:heading size="xl" class="dashboard-card-value">{{ $total_scan }}</flux:heading>
                </div>
                <flux:avatar icon="qr-code" color="yellow" />
            </div>
        </div>
    </x-sections.panel>

    {{-- Main Content Area --}}
    <div class="scanner">
        {{-- Attendance Chart --}}
        <div class="card w-full lg:w-3/5">
            <div class="flex justify-between">
                <flux:heading level="2" size="xl">Weekly Attendance</flux:heading>
                <flux:badge variant="pill" icon="calendar">This Week</flux:badge>
            </div>
            <div class="flex flex-1 h-85 w-full mt-2 justify-center">
                <canvas id="attendanceChart"></canvas>
            </div>
        </div>

        {{-- Recent Scans --}}
        <div class="card flex-1 h-full">
            <div class="flex justify-between items-center mb-4">
                <flux:heading level="2" size="xl">Recent QR Scans</flux:heading>
                <flux:button icon="document-text" size="sm" :href="route('attendance')" :current="request()->routeIs('attendance')" wire:navigate>{{ __('View All') }}</flux:button>
            </div>
            <div class="space-y-2">
                @forelse($recent_attendances as $attendance)
                    <div class="cards">
                        <flux:avatar circle icon="check" class="bg-zinc-50" />

                        <flux:field class="flex-1">
                            <flux:label>{{ $attendance->student->last_name }}, {{ $attendance->student->first_name }} {{ $attendance->student->suffix }} {{ $attendance->student->middle_initial }}.</flux:label>
                            @if ($attendance->time_in)
                                <flux:description>{{ $attendance->student->student_number }} • {{ $attendance->time_in->format('h:i A') }}</flux:description>
                            @else
                                <flux:description>{{ $attendance->student->student_number }} • {{ $attendance->time_out->format('h:i A') }}</flux:description>
                            @endif
                        </flux:field>

                        <flux:field class="text-xs">
                            @if ($attendance->time_in)
                                <flux:label>{{ $attendance->time_in->diffForHumans() }}</flux:label>
                                <flux:description>Time in</flux:description>
                            @else  
                                <flux:label>{{ $attendance->time_out->diffForHumans() }}</flux:label>
                                <flux:description>Time out</flux:description>
                            @endif
                        </flux:field>
                    </div>
                @empty
                    <flux:text>No attendance recorded today</flux:text>
                @endforelse
            </div>
        </div>
    </div>

    {{-- Quick Stats --}}
    <x-sections.panel :column="4">
        <div class="dashboard-card">
            <div class="flex space-x-3">
                <flux:avatar icon="arrow-right-end-on-rectangle" color="emerald" />
                <div>
                    <flux:text>Time in</flux:text>
                    <flux:heading size="lg">{{ $time_in }}</flux:heading>
                </div>
            </div>
        </div>
        <div class="dashboard-card">
            <div class="flex space-x-3">
                <flux:avatar icon="arrow-right-start-on-rectangle" color="yellow" />
                <div>
                    <flux:text>Time out</flux:text>
                    <flux:heading size="lg">{{ $time_out }}</flux:heading>
                </div>
            </div>
        </div>
        <div class="dashboard-card">
            <div class="flex space-x-3">
                <flux:avatar icon="check" color="green" />
                <div>
                    <flux:text>Present Today</flux:text>
                    <flux:heading size="lg">{{ $total_present }}</flux:heading>
                </div>
            </div>
        </div>
        <div class="dashboard-card">
            <div class="flex space-x-3">
                <flux:avatar icon="x-mark" color="orange" />
                <div>
                    <flux:text>Absent Today</flux:text>
                    <flux:heading size="lg">{{ $total_absent }}</flux:heading>
                </div>
            </div>
        </div>
    </x-sections.panel>
</div>

{{-- Chart.js Implementation --}}
@push('scripts')
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    document.addEventListener('DOMContentLoaded', function () {
        const data = @json($weekly_attendance_data);
        const labels = data.map(d => (new Date(d.date)).toLocaleDateString('en-US', { weekday: 'short' }));
        const attendanceCounts = data.map(d => d.present);

        const rootStyles = getComputedStyle(document.documentElement);
        const accentColor = rootStyles.getPropertyValue('--color-zinc-600').trim();

        const ctx = document.getElementById('attendanceChart').getContext('2d');
        new Chart(ctx, {
            type: 'bar',
            data: {
                labels: labels,
                datasets: [{
                    label: 'Present Students',
                    data: attendanceCounts,
                    backgroundColor: accentColor
                }]
            },
            options: {
                responsive: true,
                scales: {
                    y: {
                        beginAtZero: true,
                        title: {
                            display: true,
                            text: 'Number of Students'
                        }
                    }
                }
            }
        });
    });
</script>
@endpush
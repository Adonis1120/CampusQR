<div class="wrapper">
    <flux:custom.header header_title="Attendance Report" header_subtitle="View and manage student attendance records." />

    <div class="container">
        <div class="w-full flex-1">
            <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">Date Range</label>
            <div class="flex items-center gap-2">
                <input type="date" class="w-full rounded-lg border border-zinc-300 dark:border-zinc-700 bg-transparent text-sm p-2"
                        wire:model="dateRangeStart">
                <span class="text-zinc-500 dark:text-zinc-400">to</span>
                <input type="date" class="w-full rounded-lg border border-zinc-300 dark:border-zinc-700 bg-transparent text-sm p-2"
                        wire:model="dateRangeEnd">
            </div>
        </div>
        <div class="container-content-end">
            <flux:button icon="qr-code" wire:click="generateReport">Generate Report</flux:button>
        </div>
    </div>

    <div class="flex flex-row gap-4">
        <div class="card flex-1">
            <div class="flex flex-row">
                <div>
                    <flux:text class="mt-2">Total Days</flux:text>
                    <flux:heading size="xl">{{ $totalDays }}</flux:heading>
                </div>
                <div class="container-content-endcenter">
                    <flux:avatar icon="calendar" />
                </div>
            </div>
        </div>
        <div class="card flex-1">
            <div class="flex flex-row">
                <div>
                    <flux:text class="mt-2">Attendance Rate</flux:text>
                    <flux:heading size="xl">{{ $attendanceRate }}%</flux:heading>
                </div>
                <div class="container-content-endcenter">
                    <flux:avatar icon="document-check" />
                </div>
            </div>
        </div>
        <div class="card flex-1">
            <div class="flex flex-row">
                <div>
                    <flux:text class="mt-2">Total Present</flux:text>
                    <flux:heading size="xl">{{ $totalPresent }}</flux:heading>
                </div>
                <div class="container-content-endcenter">
                    <flux:avatar icon="check" />
                </div>
            </div>
        </div>
        <div class="card flex-1">
            <div class="flex flex-row">
                <div>
                    <flux:text class="mt-2">Total Absent</flux:text>
                    <flux:heading size="xl">{{ $totalAbsent }}</flux:heading>
                </div>
                <div class="container-content-endcenter">
                    <flux:avatar icon="x-mark" />
                </div>
            </div>
        </div>
    </div>
    
    <div class="scrollable">
        <table>
            <thead>
                <tr>
                    <th scope="col">
                        <flux:checkbox />
                    </th>
                    <th scope="col">Student Name</th>
                    <th scope="col">Student Number</th>
                    <th scope="col">Date</th>
                    <th scope="col">Time</th>
                    <th scope="col">Status</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($attendances as $attendance)
                    <tr>
                        <td class="w-4 p-4">
                            <div class="flex items-center">
                                <flux:checkbox id="checkbox{{ $attendance->student->id }}" />
                                <label for="checkbox-table-search-1" class="sr-only">checkbox</label>
                            </div>
                        </td>
                        <td>
                            {{ $attendance->student->first_name . ' ' . $attendance->student->middle_initial . '. ' . $attendance->student->last_name . ' ' . $attendance->student->suffix }}
                        </td>
                        <td>{{ $attendance->student->student_number }}</td>
                        <td>{{ $attendance->created_at->format('Y-m-d') }}</td>
                        <td>{{ $attendance->time_in ? $attendance->time_in->format('H:i') : $attendance->time_out->format('H:i') }}</td>
                        <td>{{ $attendance->time_in ? "Time in" : "Time out" }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    @if (isset($attendances) && $attendances->hasPages())
        <div class="mt-4">{{ $attendances->links() }}</div>
    @else
        <flux:subheading size="base" class="mt-4">Showing {{ $attendances->total() }} {{ Str::plural('result', $attendances->total()) }}</flux:subheading>
    @endif
</div>

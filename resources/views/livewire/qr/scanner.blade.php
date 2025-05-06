<div class="wrapper">
    <flux:custom.header header_title="QR Scanner" header_subtitle="Scan student QR codes for attendance." />

    <div class="flex gap-4">
        <div class="card w-150">
            <div id="reader" class="camera" wire:ignore></div>
        </div>

        <div class="wrapper flex-1 h-full">
            <div class="card">
                <input type="text" id="qrCode" wire:model="scannedStudentNumber" wire:change="onScan($event.target.value)" hidden/>
            
                @if ($student)
                    <flux:text size="lg">Successful time {{ $mode }}!!!</flux:text>
                    {{--
                    <flux:field>
                        <flux:label>Student ID</flux:label>
                        <flux:description>{{ $student->student_number }}</flux:description>
                    </flux:field>

                    <flux:field>
                        <flux:label>Full Name</flux:label>
                        <flux:description>{{ $student->last_name }}, {{ $student->first_name }} {{ $student->suffix }} {{ $student->middle_initial }}.</flux:description>
                    </flux:field>
                    
                    <flux:field>
                        <flux:label>Guardian</flux:label>
                        <flux:description>{{ $student->guardian_name }}</flux:description>
                    </flux:field>

                    <flux:field>
                        <flux:label>Relationship</flux:label>
                        <flux:description>{{ $student->relationship }}</flux:description>
                    </flux:field>
                    
                    <flux:field>
                        <flux:label>CP Number</flux:label>
                        <flux:description>{{ $student->cp_number }}</flux:description>
                    </flux:field>
                    --}}
                @elseif($scanError)
                    <flux:text size="lg" class="text-red-600">{{ $scanError }}</flux:text>
                @else
                    <flux:text size="lg">Scan a student QR to display info here.</flux:text>
                @endif
            </div>
            
            <div class="card flex-1">
                <flux:heading level="2" class="text-xl mb-4">Recent Scans</flux:heading>
                
                <div class="space-y-3">
                    @forelse($recentAttendances as $attendance)
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
                        <flux:text class="text-xs">No attendance recorded today</flux:text>
                    @endforelse
                </div>
            </div>
        </div> 
    </div>
</div>

@push('scripts')
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const html5QrCode = new Html5Qrcode("reader");

            html5QrCode.start(
                { facingMode: "environment" }, // rear camera
                {
                    fps: 10,
                    qrbox: 250
                },
                (decodedText, decodedResult) => {
                    console.log(`QR Code detected: ${decodedText}`);

                    //document.getElementById('qrCode').value = decodedText;
                    setTimeout(() => {
                        const input = document.getElementById('qrCode');
                        if (input) {
                            input.value = decodedText;
                        }
                    }, 100);

                    document.getElementById('qrCode').value = decodedText;
                    document.getElementById('qrCode').dispatchEvent(new Event('change'));

                    // html5QrCode.stop();  // Put this if you want the QR Scanner disappear after reading.
                },
                (errorMessage) => {
                    // console.log(`QR Code scan error: ${errorMessage}`);
                }
            );
        });
    </script>
@endpush
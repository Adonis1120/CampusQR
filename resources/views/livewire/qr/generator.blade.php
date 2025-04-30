<div class="wrapper">
    <flux:custom.header header_title="QR Generator" header_subtitle="Generate QR code for students." />

    <div class="container">
        <div class="w-full flex-1">
            <flux:select label="Student" wire:model="studentId">
                <flux:select.option value="">-- Select a student --</flux:select.option>
                @foreach($students as $student)
                    <flux:select.option value="{{ (string) $student->id }}">{{ $student->last_name }}, {{ $student->first_name }} {{ $student->suffix }} {{ $student->middle_initial }}.</flux:select.option>
                @endforeach
            </flux:select>
        </div>

        <div class="w-full flex-1">
            <flux:select label="QR Size" wire:model="qrCodeSize">
                <flux:select.option value="200">Small (200x200)</flux:select.option>
                <flux:select.option value="300" selected>Medium (300x300)</flux:select.option>
                <flux:select.option value="400">Large (400x400)</flux:select.option>
            </flux:select>
        </div>

        <div class="container-content-end">
            <flux:button icon="qr-code" wire:click="generateQRCode">Generate QR Code</flux:button>
        </div>
    </div>

    <div class="card">
        <div class="container md:items-start">
            {{-- QR Code --}}
            {{-- QR Display --}}
            <div class="flex flex-col items-center">
                <div class="aspect-square card flex items-center justify-center">
                    <div class="text-center">
                        <div class="p-4 border border-zinc-300 inline-block">
                            <!-- QR Code -->
                            @if($studentId)
                                {!! QrCode::size($qrCodeSize)->generate($studentSelected->student_number) !!}
                            @else
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-75 w-75 text-zinc-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v1m6 11h2m-6 0h-2v4m0-11v3m0 0h.01M12 12h4.01M16 20h4M4 12h4m12 0h.01M5 8h2a1 1 0 001-1V5a1 1 0 00-1-1H5a1 1 0 00-1 1v2a1 1 0 001 1zm12 0h2a1 1 0 001-1V5a1 1 0 00-1-1h-2a1 1 0 00-1 1v2a1 1 0 001 1zM5 20h2a1 1 0 001-1v-2a1 1 0 00-1-1H5a1 1 0 00-1 1v2a1 1 0 001 1z" />
                                </svg>
                            @endif
                        </div>
                        <p class="mt-2 text-sm text-zinc-500 dark:text-zinc-400">{{ $studentSelected->student_number ?? 'QR Code Preview' }}</p>
                    </div>
                </div>
            </div>

            {{-- Student Info --}}
            <div class="flex-1 md:px-4">
                <flux:heading level="h2" size="xl" class="px-4">Student Information</flux:heading>
                <div class="container justify-start items-start px-4">
                    @if($studentId)
                        <div class="flex-1">
                            <flux:field>
                                <flux:label>Student ID</flux:label>
                                <flux:description>{{ $studentSelected->student_number }}</flux:description>
                            </flux:field>
    
                            <flux:field>
                                <flux:label>Full Name</flux:label>
                                <flux:description>{{ $studentSelected->last_name }}, {{ $studentSelected->first_name }} {{ $studentSelected->suffix }} {{ $studentSelected->middle_initial }}.</flux:description>
                            </flux:field>
                            
                            <flux:field>
                                <flux:label>Guardian</flux:label>
                                <flux:description>{{ $studentSelected->guardian_name }}</flux:description>
                            </flux:field>
                        </div>
                        <div class="flex-1">
                            <flux:field>
                                <flux:label>Relationship</flux:label>
                                <flux:description>{{ $studentSelected->relationship }}</flux:description>
                            </flux:field>
                            
                            <flux:field>
                                <flux:label>CP Number</flux:label>
                                <flux:description>{{ $studentSelected->cp_number }}</flux:description>
                            </flux:field>
                        </div>
                    @else
                        <flux:text>No student selected</flux:text>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
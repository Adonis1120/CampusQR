<div class="flex h-full w-full flex-1 flex-col gap-4 rounded-xl">
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
            {{-- QR Display --}}
            <div class="md:w-1/3 flex flex-col items-center">
                <div class="aspect-square card flex items-center justify-center">
                    <div class="text-center">
                        <div class="mx-auto bg-zinc-200 dark:bg-zinc-700 w-48 h-48 flex items-center justify-center rounded">
                            <!-- QR Code -->
                            @if($studentId)
                                {!! QrCode::size($qrCodeSize)->generate($studentSelected->student_number) !!}
                            @else
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-16 w-16 text-zinc-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v1m6 11h2m-6 0h-2v4m0-11v3m0 0h.01M12 12h4.01M16 20h4M4 12h4m12 0h.01M5 8h2a1 1 0 001-1V5a1 1 0 00-1-1H5a1 1 0 00-1 1v2a1 1 0 001 1zm12 0h2a1 1 0 001-1V5a1 1 0 00-1-1h-2a1 1 0 00-1 1v2a1 1 0 001 1zM5 20h2a1 1 0 001-1v-2a1 1 0 00-1-1H5a1 1 0 00-1 1v2a1 1 0 001 1z" />
                                </svg>
                            @endif
                        </div>
                        <p class="mt-2 text-sm text-zinc-500 dark:text-zinc-400">QR Code Preview</p>
                    </div>
                </div>
            </div>

            {{-- Student Info --}}
            <div class="md:w-2/3">
                <h3 class="text-lg font-medium text-green-800 dark:text-green-200 mb-4">Student Information</h3>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    @if($studentId)
                        <div>
                            <p class="text-sm text-green-500 dark:text-green-400">Full Name</p>
                            <p class="text-green-800 dark:text-green-200 font-medium">{{ $studentSelected->last_name }}, {{ $student->first_name }} {{ $student->suffix }} {{ $student->middle_initial }}.</p>
                        </div>
                        <div>
                            <p class="text-sm text-green-500 dark:text-green-400">Student ID</p>
                            <p class="text-green-800 dark:text-green-200 font-medium">{{ $studentSelected->student_number }}</p>
                        </div>
                        <div>
                            <p class="text-sm text-green-500 dark:text-green-400">Guardian</p>
                            <p class="text-green-800 dark:text-green-200 font-medium">{{ $studentSelected->guardian_name }}</p>
                        </div>
                        <div>
                            <p class="text-sm text-green-500 dark:text-green-400">CP Number</p>
                            <p class="text-green-800 dark:text-green-200 font-medium">{{ $studentSelected->cp_number }}</p>
                        </div>
                        <div class="md:col-span-2">
                            <p class="text-sm text-green-500 dark:text-green-400">QR Code Content</p>
                            <div class="bg-zinc-50 dark:bg-zinc-800 p-3 rounded-lg mt-1">
                                <p class="text-xs font-mono text-green-800 dark:text-green-300 break-all">{{ $studentSelected->student_number }}</p>
                            </div>
                        </div>
                    @else
                        <p class="text-sm text-green-500 dark:text-green-400">No student selected</p>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
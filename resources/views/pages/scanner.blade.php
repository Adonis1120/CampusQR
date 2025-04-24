<x-layouts.app :title="__('QR Scanner')">
    <div class="flex h-full w-full flex-1 flex-col gap-4 rounded-xl">
        {{-- Page title --}}
        <flux:custom.header header_title="QR Scanner" header_subtitle="Scan your generated QR Code." />

        {{-- Scanner Section --}}
        <div class="bg-white dark:bg-zinc-900 rounded-xl border border-neutral-200 dark:border-neutral-700 p-6 shadow-sm">
            <div class="flex flex-col md:flex-row gap-6">
                {{-- Scanner View --}}
                <div class="flex-1">
                    <div class="aspect-square bg-zinc-100 dark:bg-zinc-800 rounded-lg overflow-hidden relative">
                        {{-- Scanner placeholder --}}
                        <div class="absolute inset-0 flex items-center justify-center">
                            <div class="text-center">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-16 w-16 mx-auto text-zinc-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v1m6 11h2m-6 0h-2v4m0-11v3m0 0h.01M12 12h4.01M16 20h4M4 12h4m12 0h.01M5 8h2a1 1 0 001-1V5a1 1 0 00-1-1H5a1 1 0 00-1 1v2a1 1 0 001 1zm12 0h2a1 1 0 001-1V5a1 1 0 00-1-1h-2a1 1 0 00-1 1v2a1 1 0 001 1zM5 20h2a1 1 0 001-1v-2a1 1 0 00-1-1H5a1 1 0 00-1 1v2a1 1 0 001 1z" />
                                </svg>
                                <p class="mt-2 text-zinc-500 dark:text-zinc-400">Scanner view will appear here</p>
                            </div>
                        </div>
                    </div>
                    
                    <div class="mt-4 flex justify-center">
                        <button class="px-6 py-3 bg-zinc-800 hover:bg-zinc-700 text-white rounded-lg font-medium transition-colors flex items-center gap-2">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 9a2 2 0 012-2h.93a2 2 0 001.664-.89l.812-1.22A2 2 0 0110.07 4h3.86a2 2 0 011.664.89l.812 1.22A2 2 0 0018.07 7H19a2 2 0 012 2v9a2 2 0 01-2 2H5a2 2 0 01-2-2V9z" />
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 13a3 3 0 11-6 0 3 3 0 016 0z" />
                            </svg>
                            Activate Scanner
                        </button>
                    </div>
                </div>
                
                {{-- Scan Result --}}
                <div class="md:w-80">
                    <div class="bg-zinc-50 dark:bg-zinc-800 rounded-lg p-4 border border-zinc-200 dark:border-zinc-700">
                        <h3 class="text-lg font-medium text-gray-800 dark:text-gray-200 mb-4">Scan Result</h3>
                        
                        <div class="text-center py-8">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-12 w-12 mx-auto text-zinc-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.172 16.172a4 4 0 015.656 0M9 10h.01M15 10h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                            <p class="mt-2 text-zinc-500 dark:text-zinc-400">No QR code scanned yet</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        {{-- Recent Scans --}}
        <div class="bg-white dark:bg-zinc-900 rounded-xl border border-neutral-200 dark:border-neutral-700 p-6 shadow-sm">
            <h3 class="text-lg font-medium text-gray-800 dark:text-gray-200 mb-4">Recent Scans</h3>
            
            <div class="space-y-3">
                @for($i = 0; $i < 3; $i++)
                <div class="flex items-center gap-3 p-3 rounded-lg bg-zinc-50 dark:bg-zinc-800 hover:bg-zinc-100 dark:hover:bg-zinc-700 transition-colors">
                    <div class="flex-shrink-0 w-10 h-10 rounded-full bg-green-100 dark:bg-green-900/30 flex items-center justify-center">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-green-600 dark:text-green-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                        </svg>
                    </div>
                    <div class="flex-1 min-w-0">
                        <p class="text-sm font-medium text-gray-800 dark:text-gray-200 truncate">Juan Dela Cruz</p>
                        <p class="text-xs text-zinc-500 dark:text-zinc-400">Grade 12 - STEM | Scanned at Main Gate</p>
                    </div>
                    <div class="text-xs text-zinc-500 dark:text-zinc-400 whitespace-nowrap">
                        {{ $i + 1 }} hour{{ $i > 0 ? 's' : '' }} ago
                    </div>
                </div>
                @endfor
            </div>
            
            <button class="mt-4 w-full py-2 text-sm font-medium text-zinc-600 dark:text-zinc-300 hover:bg-zinc-100 dark:hover:bg-zinc-800 rounded-lg transition-colors">
                View All Scans
            </button>
        </div>
    </div>
</x-layouts.app>
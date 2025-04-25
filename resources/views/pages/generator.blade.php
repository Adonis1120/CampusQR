<x-layouts.app :title="__('Generate QR Codes')">
    <div class="flex h-full w-full flex-1 flex-col gap-4 rounded-xl">
        {{-- Page title --}}
        <flux:custom.header header_title="Students" header_subtitle="Manage your students and their information." />

        {{-- Generator Controls --}}
        <div class="bg-white dark:bg-zinc-900 rounded-xl border border-neutral-200 dark:border-neutral-700 p-6 shadow-sm">
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                {{-- Student Selection --}}
                <div class="md:col-span-1">
                    <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">Select Student</label>
                    <select class="w-full rounded-lg border border-zinc-300 dark:border-zinc-700 bg-transparent text-sm p-2">
                        <option>Select a student</option>
                        <option>Juan Dela Cruz</option>
                        <option>Maria Santos</option>
                        <option>Pedro Bautista</option>
                    </select>
                </div>

                {{-- QR Customization --}}
                <div class="md:col-span-1">
                    <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">QR Size</label>
                    <select class="w-full rounded-lg border border-zinc-300 dark:border-zinc-700 bg-transparent text-sm p-2">
                        <option>Small (200x200)</option>
                        <option selected>Medium (300x300)</option>
                        <option>Large (400x400)</option>
                    </select>
                </div>

                {{-- Generate Button --}}
                <div class="md:col-span-1 flex items-end">
                    <button class="w-full px-4 py-2 bg-zinc-800 hover:bg-zinc-700 text-white rounded-lg text-sm font-medium transition-colors">
                        Generate QR Code
                    </button>
                </div>
            </div>
        </div>

        {{-- QR Preview --}}
        <div class="bg-white dark:bg-zinc-900 rounded-xl border border-neutral-200 dark:border-neutral-700 p-6 shadow-sm">
            <div class="flex flex-col md:flex-row gap-8">
                {{-- QR Display --}}
                <div class="md:w-1/3 flex flex-col items-center">
                    <div class="aspect-square bg-white p-4 rounded-lg border border-zinc-200 dark:border-zinc-700 flex items-center justify-center">
                        {{-- QR Placeholder --}}
                        <div class="text-center">
                            <div class="mx-auto bg-zinc-200 dark:bg-zinc-700 w-48 h-48 flex items-center justify-center rounded">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-16 w-16 text-zinc-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v1m6 11h2m-6 0h-2v4m0-11v3m0 0h.01M12 12h4.01M16 20h4M4 12h4m12 0h.01M5 8h2a1 1 0 001-1V5a1 1 0 00-1-1H5a1 1 0 00-1 1v2a1 1 0 001 1zm12 0h2a1 1 0 001-1V5a1 1 0 00-1-1h-2a1 1 0 00-1 1v2a1 1 0 001 1zM5 20h2a1 1 0 001-1v-2a1 1 0 00-1-1H5a1 1 0 00-1 1v2a1 1 0 001 1z" />
                                </svg>
                            </div>
                            <p class="mt-2 text-sm text-zinc-500 dark:text-zinc-400">QR Code Preview</p>
                        </div>
                    </div>
                    <div class="mt-4 flex gap-3">
                        <button class="px-4 py-2 bg-zinc-800 hover:bg-zinc-700 text-white rounded-lg text-sm font-medium transition-colors flex items-center gap-2">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4" />
                            </svg>
                            Download
                        </button>
                        <button class="px-4 py-2 border border-zinc-300 dark:border-zinc-700 hover:bg-zinc-100 dark:hover:bg-zinc-800 rounded-lg text-sm font-medium transition-colors flex items-center gap-2">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                            </svg>
                            Print
                        </button>
                    </div>
                </div>

                {{-- Student Info --}}
                <div class="md:w-2/3">
                    <h3 class="text-lg font-medium text-gray-800 dark:text-gray-200 mb-4">Student Information</h3>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <div>
                            <p class="text-sm text-gray-500 dark:text-gray-400">Full Name</p>
                            <p class="text-gray-800 dark:text-gray-200 font-medium">-</p>
                        </div>
                        <div>
                            <p class="text-sm text-gray-500 dark:text-gray-400">Student ID</p>
                            <p class="text-gray-800 dark:text-gray-200 font-medium">-</p>
                        </div>
                        <div>
                            <p class="text-sm text-gray-500 dark:text-gray-400">Course</p>
                            <p class="text-gray-800 dark:text-gray-200 font-medium">-</p>
                        </div>
                        <div>
                            <p class="text-sm text-gray-500 dark:text-gray-400">Guardian</p>
                            <p class="text-gray-800 dark:text-gray-200 font-medium">-</p>
                        </div>
                        <div class="md:col-span-2">
                            <p class="text-sm text-gray-500 dark:text-gray-400">QR Code Content</p>
                            <div class="bg-zinc-50 dark:bg-zinc-800 p-3 rounded-lg mt-1">
                                <p class="text-xs font-mono text-gray-800 dark:text-gray-300 break-all">No student selected</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-layouts.app>
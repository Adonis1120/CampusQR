        <div x-data="{
            toastVisible: false,
            toastMessage: ''
        }"
        x-on:show-toast.window="toastMessage = $event.detail; toastVisible = true; 
        setTimeout(() => toastVisible = false, 5000)" 
        x-show="toastVisible" 
        class="fixed top-4 right-5 z-50 flex items-center w-full max-w-xs p-4 text-accent bg-accent-bg-card rounded-lg shadow-lg shadow-blue-200/50 dark:text-white dark:bg-accent-subtle" role="alert">
            <flux:icon.check-circle class="text-accent" />
            <div class="ms-3 text-sm font-normal">
                <flux:text class="mt-2" x-text="toastMessage"></flux:text>
            </div>
            <button type="button" class="absolute right-2 -mx-1.5 -my-1.5 bg-accent-bg-card text-accent hover:text-white rounded-lg focus:ring-2 focus:ring-gray-300 p-1.5 hover:bg-secondary inline-flex items-center justify-center h-8 w-8 dark:text-white dark:bg-accent-subtle dark:hover:bg-secondary" 
                @click="toastVisible = false" aria-label="Close">
                <span class="sr-only">Close</span>
                <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                </svg>
            </button>
        </div>

        <script src="https://cdn.jsdelivr.net/npm/flowbite@3.1.2/dist/flowbite.min.js"></script>
        
        @fluxScripts
        @livewireScripts
    </body>
</html>
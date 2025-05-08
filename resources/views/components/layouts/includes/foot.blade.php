        <div x-data="{
            toastVisible: false,
            toastMessage: ''
        }"
        x-on:show-toast.window="
        if ($event.detail) {
            toastMessage = $event.detail;
            toastVisible = true;
            setTimeout(() => toastVisible = false, 5000);
        }"
        x-show="toastVisible" 
        class="toast" role="alert">
            <flux:icon.check-circle class="text-accent" />
            <div class="toast-container">
                <flux:text class="mt-2" x-text="toastMessage"></flux:text>
            </div>
            <button type="button" class="toast-x" 
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
        @stack('scripts')
    </body>
</html>
<a href="{{ route('home') }}" class="flex flex-col items-center gap-2 font-medium" wire:navigate>
    <span class="flex h-9 w-9 mb-1 items-center justify-center rounded-md">
        <x-app-logo-icon class="size-9 fill-current text-black dark:text-white" />
    </span>
    <span class="sr-only">{{ config('app.name', 'Laravel') }}</span>
</a>
@props([
    'heading' => null,
    'column' => 1,
    'color' => false,
])

@if ($heading)
    <section {{ $attributes->class([
        'panel',
        'panel--bg-color' => $color,
    ]) }}>

        <flux:heading level="2" class="!font-bold">{{ $heading }}</flux:heading>
@endif

    {{-- Solve the md:grid-cols-{$column} that inconsistently being reconized by Tailwind --}}
    <div class="hidden">
        md:grid-cols-1 md:grid-cols-2 md:grid-cols-3 md:grid-cols-4 md:grid-cols-5 md:grid-cols-6   {{-- This ensures Tailwind detects the possible classes at build time because Tailwind ignores it because the class isn't explicitly listed in your compiled CSS--}}
    </div>

    <div {{ $attributes->class(["panel-container", "md:grid-cols-{$column}"]) }}>
        {{ $slot }}
    </div>
    
@if ($heading)
    </section>
@endif
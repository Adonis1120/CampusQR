<x-layouts.includes.head layout="auth" />
    <div class="split">
        <div class="split-left">
            <div class="split-left-gradient"></div>
            <a href="{{ route('home') }}" class="split-left-logo" wire:navigate>
                <x-app-logo />
            </a>

            @php
                [$message, $author] = str(Illuminate\Foundation\Inspiring::quotes()->random())->explode('-');
            @endphp

            <div class="split-left-content">
                <blockquote class="space-y-2">
                    <flux:heading size="xl" class="split-left-quote">&ldquo;{{ trim($message) }}&rdquo;</flux:heading>
                    <footer><flux:heading>{{ trim($author) }}</flux:heading></footer>
                </blockquote>
            </div>
        </div>
        <div class="split-right">
            <div class="split-right-container">
                {{ $slot }}
            </div>
        </div>
    </div>
<x-layouts.includes.foot />

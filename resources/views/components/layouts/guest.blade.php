<x-layouts.includes.head {{ $attributes }} />
    <header class="header">
        <nav class="header-nav">
            <a href="{{ route('home') }}" class="header-brand" wire:navigate>
                <x-app-logo />
            </a>

            <div class="header-nav-items">
                @if (Route::has('login'))
                    @auth
                        <flux:menu.item icon="layout-grid" :href="route('dashboard')">{{ __('Dashboard') }}</flux:menu.item>
                    @else
                        <flux:navbar class="-mb-px max-sm:hidden">
                            <flux:navbar.item icon="arrow-right-end-on-rectangle" :href="route('login')">Login</flux:navbar.item>
                            <flux:navbar.item icon="pencil-square" :href="route('register')">Register</flux:navbar.item>
                        </flux:navbar>

                        <flux:dropdown class="-mb-px min-sm:hidden">
                            <flux:button icon-trailing="bars-3"></flux:button>

                            <flux:menu>
                                <flux:menu.item icon="arrow-right-end-on-rectangle" :href="route('login')">Login</flux:menu.item>
                                <flux:menu.item icon="pencil-square" :href="route('register')">Register</flux:menu.item>
                            </flux:menu>
                        </flux:dropdown>
                    @endauth
                @endif
            </div>
        </nav>
    </header>

    <main class="lg:max-w-6xl max-w-[500px] sm:max-w-[600px] md:max-w-[800px] w-full">
        {{ $slot }}
    </main>

    @if (Route::has('login'))
        <div class="h-14.5 hidden lg:block"></div>
    @endif

<x-layouts.includes.foot />
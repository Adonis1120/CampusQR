<x-layouts.includes.head {{ $attributes }} />
    <header class="w-full !max-w-[500px] sm:!max-w-[600px] md:!max-w-[800px] lg:!max-w-6xl text-sm mb-2 not-has-[nav]:hidden">
        <nav class="flex items-center justify-between w-full px-2 md:px-6 py-2">
            <a href="{{ route('home') }}" class="mr-5 flex items-center space-x-2" wire:navigate>
                <x-app-logo />
            </a>

            <div class="flex items-center gap-4">
                @if (Route::has('login'))
                    @auth
                        <flux:menu.item icon="layout-grid" :href="route('dashboard')">{{ __('Dashboard') }}</flux:menu.item>
                    @else
                        <flux:navbar class="-mb-px max-md:hidden">
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
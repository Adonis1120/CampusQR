<x-layouts.includes.head layout="auth" />
    <div class="simple">
        <div class="simple-container">
            <x-app-logo-centered />
            <div class="simple-slot">
                {{ $slot }}
            </div>
        </div>
    </div>
<x-layouts.includes.foot />

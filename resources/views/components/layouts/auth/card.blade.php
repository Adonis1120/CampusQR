<x-layouts.includes.head layout="auth" />
    <div class="box">
        <div class="box-container">
            <x-app-logo-centered />

            <div class="box-wrapper">
                <div class="box-inner">
                    <div class="box-slot">{{ $slot }}</div>
                </div>
            </div>
        </div>
    </div>
<x-layouts.includes.foot />

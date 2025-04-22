@props([
    'header_title' => null,
    'header_subtitle' => null,
])

<div class="relative w-full">
    <flux:heading size="xl" level="1" class="!my-0">{{ __($header_title) }}</flux:heading>
    <flux:subheading size="lg" class="mb-4">{{ __($header_subtitle) }}</flux:subheading>
    <flux:separator variant="subtle" />
</div>
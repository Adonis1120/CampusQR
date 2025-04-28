@props([
    'placeholderText' => null,
])

<div>
    <flux:input
        wire:model.live.debounce.250ms="search"
        icon="magnifying-glass"
        placeholder="Search {{ $placeholderText }}"
        autofocus
        autocomplete="search"
        clearable
    />
</div>
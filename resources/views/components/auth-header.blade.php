@props([
    'title',
    'description',
])

<div class="auth-header">
    <flux:heading size="xl">{{ $title }}</flux:heading>
    <flux:subheading>{{ $description }}</flux:subheading>
</div>

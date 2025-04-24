<div>
    <flux:modal name="user-form" class="md:w-96">
        <div class="space-y-6">
            <div>
                <flux:heading size="lg">{{ $is_editing ? 'Update User' : 'Create User' }}</flux:heading>
                <flux:text class="mt-2">{{ $is_editing ? 'Make changes to user personal details.' : 'Fill up the form with the user personal details.' }}</flux:text>
            </div>

            <flux:input label="Name" wire:model="name" placeholder="User's name" />
            <flux:input label="Email" type="email" wire:model="email" />

            <flux:select label="Role" wire:model="role">
                <flux:select.option value="admin">Admin</flux:select.option>
                <flux:select.option value="user">User</flux:select.option>
            </flux:select>

            <div class="flex">
                <flux:spacer />
                <flux:button wire:click="save" type="submit" variant="primary">{{ $is_editing ? 'Update' : 'Save' }}</flux:button>
            </div>
        </div>
    </flux:modal>
</div>
<div class="wrapper">
    <flux:custom.header  header_title="User Management" header_subtitle="Manage User Accounts" />

    <div class="container">
        <flux:custom.search />
        
        <flux:modal.trigger name="userForm" class="flex justify-end">
            <flux:button icon="user-plus" wire:click="showForm">{{ __('Register User') }}</flux:button>
        </flux:modal.trigger>
    </div>

    <div class="scrollable">
        <table>
            <thead>
                <tr>
                    <th scope="col">
                        <flux:checkbox />
                    </th>
                    <th scope="col">Name</th>
                    <th scope="col">Email</th>
                    <th scope="col">Role</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($users as $user)
                    <tr>
                        <td class="w-4 p-4">
                            <div class="flex items-center">
                                <flux:checkbox id="checkbox{{ $user->id }}" />
                                <label for="checkbox-table-search-1" class="sr-only">checkbox</label>
                            </div>
                        </td>
                        <th scope="row">
                            {{ $user->name }}
                        </th>
                        <td>
                            {{ $user->email }}
                        </td>
                        <td>
                            {{ $user->role }}
                        </td>
                        <td>
                            <flux:button icon="pencil-square" size="sm" variant="ghost" wire:click="showForm('{{ $user->id }}')"></flux:button>
                            <flux:button icon="trash" size="sm" variant="ghost" wire:click="delete('{{ $user->id }}')"></flux:button>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    
    @if (isset($users) && $users->hasPages())
        <div class="mt-4">{{ $users->links() }}</div>
    @else
        <flux:subheading size="base" class="mt-4">Showing {{ $users->total() }} {{ Str::plural('result', $users->total()) }}</flux:subheading>
    @endif

    <livewire:users.user-form />

    <flux:modal name="delete-user" class="min-w-[22rem]">
        <div class="space-y-6">
            <div>
                <flux:heading size="xl">Delete User</flux:heading>
                <flux:text class="mt-2">
                    <p>You're about to delete this user.</p>
                    <p>This action cannot be reversed.</p>
                </flux:text>
            </div>
            <div class="flex gap-2">
                <flux:spacer />
                <flux:modal.close>
                    <flux:button variant="ghost">Cancel</flux:button>
                </flux:modal.close>
                <flux:button type="submit" variant="danger" wire:click="destroy">Delete</flux:button>
            </div>
        </div>
    </flux:modal>
</div>

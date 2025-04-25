<div>
    <flux:custom.header  header_title="User Management" header_subtitle="Manage User Accounts" />

    <div class="flex justify-between items-center p-4 gap-4">
        <flux:custom.search />
        
        <flux:modal.trigger name="userForm" class="flex justify-end">
            <flux:button icon="user-plus" disabled>{{ __('Register User') }}</flux:button>
        </flux:modal.trigger>
    </div>

    <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
        <table class="w-full text-sm text-left rtl:text-right text-accent dark:text-white">
            <thead class="text-sm text-accent-dark uppercase bg-zinc-200 dark:bg-accent-dark dark:text-white">
                <tr>
                    <th scope="col" class="p-4">
                        <div class="flex items-center">
                            <input id="checkbox-all" type="checkbox" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded-sm focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 dark:focus:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                            <label for="checkbox-all-search" class="sr-only">checkbox</label>
                        </div>
                    </th>
                    <th scope="col" class="px-6 py-3">Name</th>
                    <th scope="col" class="px-6 py-3">Email</th>
                    <th scope="col" class="px-6 py-3">Role</th>
                    {{-- @can('update', auth()->user()) --}}
                        <th scope="col" class="px-6 py-3">Action</th>
                    {{-- @endcan --}}
                </tr>
            </thead>
            <tbody>
                @foreach ($users as $user)
                    <tr class="bg-accent-bg-card border-b dark:bg-accent-subtle dark:border-accent-dark border-zinc-200 hover:bg-accent-bg-panel dark:hover:bg-zinc-800">
                        <td class="w-4 p-4">
                            <div class="flex items-center">
                                <input id="checkbox{{ $user->id }}" type="checkbox" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded-sm focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 dark:focus:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                <label for="checkbox-table-search-1" class="sr-only">checkbox</label>
                            </div>
                        </td>
                        <th scope="row" class="px-6 py-4 font-medium text-accent-dark whitespace-nowrap dark:text-white">
                            {{ $user->name }}
                        </th>
                        <td class="px-6 py-4">
                            {{ $user->email }}
                        </td>
                        <td class="px-6 py-4">
                            {{ $user->role }}
                        </td>
                        {{-- @can('update', $user)--}}
                            <td class="px-1 py-2">
                                <flux:button icon="pencil-square" size="sm" variant="ghost" wire:click="showForm('{{ $user->id }}')"></flux:button>
                                <flux:button icon="trash" size="sm" variant="ghost" wire:click="delete('{{ $user->id }}')"></flux:button>
                            </td>
                        {{-- @endcan --}}
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    
    @if (isset($users) && $users->hasPages())
        <div class="mt-4 text-accent-subtle !important">{{ $users->links() }}</div>
    @else
        <flux:subheading size="base" class="mt-4">Showing {{ $users->total() }} results</flux:subheading>
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

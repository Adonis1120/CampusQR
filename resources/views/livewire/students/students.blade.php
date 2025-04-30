<div class="wrapper">
    <flux:custom.header  header_title="Student Management" header_subtitle="Manage Student Information" />

    <div class="container">
        <flux:custom.search placeholderText="names" />
        
        <flux:modal.trigger name="studentForm" class="flex justify-end">
            <flux:button icon="user-plus" disabled>{{ __('Register Student') }}</flux:button>
        </flux:modal.trigger>
    </div>

    <div class="scrollable">
        <table>
            <thead>
                <tr>
                    <th scope="col">
                        <flux:checkbox />
                    </th>
                    
                    <th scope="col">Student ID</th>
                    <th scope="col">Name</th>
                    <th scope="col">Guardian</th>
                    <th scope="col">Relationship</th>
                    <th scope="col">CP Number</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($students as $student)
                    <tr>
                        <td class="w-4 p-4">
                            <div class="flex items-center">
                                <flux:checkbox id="checkbox{{ $student->id }}" />
                                <label for="checkbox-table-search-1" class="sr-only">checkbox</label>
                            </div>
                        </td>
                        <td>
                            {{ $student->student_number }}
                        </td>
                        <th scope="row">
                            {{ $student->first_name . ' ' . $student->middle_initial . '. ' . $student->last_name . ' ' . $student->suffix }}
                        </th>
                        <td>
                            {{ $student->guardian_name }}
                        </td>
                        <td>
                            {{ $student->relationship }}
                        </td>
                        <td>
                            {{ $student->cp_number }}
                        </td>
                        <td>
                            <flux:button icon="pencil-square" size="sm" variant="ghost" wire:click="showStudent('{{ $student->id }}')"></flux:button>
                            <flux:button icon="trash" size="sm" variant="ghost" wire:click="delete('{{ $student->id }}')"></flux:button>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    
    @if (isset($students) && $students->hasPages())
        <div class="mt-4">{{ $students->links() }}</div>
    @else
        <flux:subheading size="base" class="mt-4">Showing {{ $students->total() }} {{ Str::plural('result', $students->total()) }}</flux:subheading>
    @endif

    <livewire:students.student-form />

    <flux:modal name="delete-student" class="min-w-[22rem]">
        <div class="space-y-6">
            <div>
                <flux:heading size="xl">Delete Student</flux:heading>
                <flux:text class="mt-2">
                    <p>You're about to delete this student.</p>
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

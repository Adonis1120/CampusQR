<div>
    <flux:modal name="student-form" class="md:w-96">
        <div class="space-y-6">
            <div>
                <flux:heading size="lg">{{ $is_editing ? 'Update Student' : 'Create Student' }}</flux:heading>
                <flux:text class="mt-2">{{ $is_editing ? 'Make changes to student personal details.' : 'Fill up the form with the student personal details.' }}</flux:text>
            </div>

            <flux:input label="Student Number" wire:model="student_number" placeholder="Enter student number" />
            <flux:input label="First Name" wire:model="first_name" placeholder="Enter first name" />
            <flux:input label="Middle Initial" wire:model="middle_initial" placeholder="Enter middle initial" maxlength="1" />
            <flux:input label="Last Name" wire:model="last_name" placeholder="Enter last name" />
            <flux:input label="Suffix" wire:model="suffix" placeholder="Enter suffix (optional)" />
            <flux:input label="Guardian's Name" wire:model="guardian_name" placeholder="Enter guardian's name" />
            <flux:input label="Relationship" wire:model="relationship" placeholder="Relationship to guardian" />
            <flux:input label="Contact Number" wire:model="cp_number" placeholder="Enter contact number" maxlength="11" />

            <div class="flex">
                <flux:spacer />
                <flux:button wire:click="save" type="submit" variant="primary">{{ $is_editing ? 'Update' : 'Save' }}</flux:button>
            </div>
        </div>
    </flux:modal>
</div>

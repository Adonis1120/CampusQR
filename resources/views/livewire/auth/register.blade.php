<?php

use App\Models\User;
use App\Models\Student;
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Livewire\Attributes\Layout;
use Livewire\Volt\Component;

new #[Layout('components.layouts.auth')] class extends Component {
    public string $student_number = '';
    public string $first_name = '';
    public string $middle_initial = '';
    public string $last_name = '';
    public string $suffix = '';
    public string $guardian_name = '';
    public string $relationship = '';
    public string $cp_number = '';

    public string $name = '';
    public string $email = '';
    public string $password = '';

    public string $password_confirmation = '';

    /**
     * Handle an incoming registration request.
     */
    public function register(): void
    {
        $validated = $this->validate([
            'student_number'  => 'required|string|max:20|unique:students,student_number,',
            'first_name'      => 'required|string|max:50',
            'middle_initial'  => 'nullable|string|size:1',
            'last_name'       => 'required|string|max:50',
            'suffix'          => 'nullable|string|max:10',
            'guardian_name'   => 'required|string|max:100',
            'relationship'    => 'required|string|max:30',
            'cp_number'       => 'required|string|size:12',
            
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:' . User::class],
            'password' => ['required', 'string', 'confirmed', Rules\Password::defaults()],
        ]);

        $validated['password'] = Hash::make($validated['password']);
        $validated['role'] = 'student';
        event(new Registered(($user = User::create($validated))));

        $validated['user_id']= $user->id;
        Student::create($validated);

        Auth::login($user);

        $this->redirectIntended(route('dashboard', absolute: false), navigate: true);
    }

    public function updated($property)
    {
        if (in_array($property, ['first_name', 'middle_initial', 'last_name', 'suffix'])) {
            $this->name =
                $this->first_name .
                ($this->middle_initial ? ' ' . $this->middle_initial . '.' : '') .
                ' ' . $this->last_name .
                ($this->suffix ? ', ' . $this->suffix : '');
        }
    }
}; ?>

<div class="auth">
    <x-auth-header :title="__('Create an account')" :description="__('Enter your details below to create your account')" />

    <!-- Session Status -->
    <x-auth-session-status class="text-center" :status="session('status')" />

    <form wire:submit="register" class="auth-form">
        <flux:input label="Student Number" wire:model="student_number" placeholder="ID number" autofocus />
        <flux:input label="First Name" wire:model.lazy="first_name" placeholder="First name" />
        <flux:input label="Middle Initial" wire:model.lazy="middle_initial" placeholder="Middle initial" maxlength="1"  />
        <flux:input label="Last Name" wire:model.lazy="last_name" placeholder="Last name or surname" />
        <flux:input label="Suffix" wire:model.lazy="suffix" placeholder="Suffix (optional)" />
        <flux:input label="Guardian's Name" wire:model="guardian_name" placeholder="Guardian's full name" />
        <flux:input label="Relationship" wire:model="relationship" placeholder="Relationship to guardian" />
        <flux:input label="Contact Number" wire:model="cp_number" placeholder="CP contact number" maxlength="12" />

        <!-- Name -->
        <flux:input
            wire:model="name"
            :label="__('Name')"
            type="text"
            required
            autocomplete="name"
            :placeholder="__('Full name')"
            readonly
        />

        <!-- Email Address -->
        <flux:input
            wire:model="email"
            :label="__('Email address')"
            type="email"
            required
            autocomplete="email"
            placeholder="email@example.com"
        />

        <!-- Password -->
        <flux:input
            wire:model="password"
            :label="__('Password')"
            type="password"
            required
            autocomplete="new-password"
            :placeholder="__('Password')"
        />

        <!-- Confirm Password -->
        <flux:input
            wire:model="password_confirmation"
            :label="__('Confirm password')"
            type="password"
            required
            autocomplete="new-password"
            :placeholder="__('Confirm password')"
        />

        <flux:badge color="lime" class="!text-wrap">Please note that this is for students only! For system admin, you need to be added by an existing admin.</flux:badge>

        <div class="auth-form-footer">
            <flux:button type="submit" variant="primary" class="w-full">
                {{ __('Create account') }}
            </flux:button>
        </div>
    </form>

    <div class="space-x-1 rtl:space-x-reverse text-center text-sm text-zinc-600 dark:text-zinc-400">
        {{ __('Already have an account?') }}
        <flux:link :href="route('login')" wire:navigate>{{ __('Log in') }}</flux:link>
    </div>
</div>

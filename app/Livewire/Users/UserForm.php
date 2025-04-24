<?php

namespace App\Livewire\Users;

use Livewire\Component;
use App\Models\User;
use Flux\Flux;
use Livewire\Attributes\On;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class UserForm extends Component
{
    use AuthorizesRequests;

    public $user_id, $name, $email, $role;
    public $is_editing = false;
    public $user;

    public function mount()
    {
        // $this->cooperatives = Student::all();
    }

    public function rules()
    {
        return [
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . $this->user_id,
            'role' => 'required|string',
        ];
    }

    #[On('formUser')]
    public function formUser($id)
    {
        if ($id) {
            $this->user = User::select('id', 'name', 'email', 'role')->findOrFail($id);

            // $this->authorize('update', $user);
            $this->is_editing = true;

            $this->user_id = $id;
            $this->name = $this->user->name;
            $this->email = $this->user->email;
            $this->role = $this->user->role;
        } else {
            $this->is_editing = false;
            $this->resetForm();
        }
        
        Flux::modal('user-form')->show();
        //$this->show_modal = true;
    }

    public function save()
    {
        $data = $this->validate();

        if ($this->is_editing) {
            $this->user->update($data);
        } else {
            User::create($data);
        }

        //$this->authorize($this->is_editing ? 'update' : 'create', User::class);

        $this->resetForm();
        Flux::modal('user-form')->close();
        $this->dispatch('reloadUser');
        $this->dispatch('show-toast', 'Cooperative saved successfully!');
    }

    public function resetForm()
    {
        $this->reset([
            'user_id', 'name', 'email', 'role'
        ]);
    }
}
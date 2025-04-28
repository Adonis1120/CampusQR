<?php

namespace App\Livewire\Users;

use App\Enums\Role;
use Livewire\Component;
use App\Models\User;
use Flux\Flux;
use Illuminate\Support\Facades\Auth;
use Livewire\WithPagination;
use Livewire\Attributes\On;

class Users extends Component
{
    use WithPagination;

    public $user_id;
    public $search = '';

    protected $paginationTheme = 'tailwind';
    protected $listeners = ['resetPagination' => 'resetPage'];

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function showForm($id)
    {
        $this->dispatch('formUser', $id);
    }

    public function delete($id)
    {
        $this->user_id = $id;
        Flux::modal('delete-user')->show();
    }

    public function destroy()
    {
        $user = User::find($this->user_id);

        if (!$user) {
            session()->flash('message', 'User not found.');
            return;
        }

        // $this->authorize('delete', $user);   // Uncomment if using policies
        if (!Auth::check() || Auth::user()->role !== Role::ADMIN->value) {
            abort(403, 'Unauthorized.');
        }
        
        $user->delete();

        //$this->dispatch('reloadUser');
        $this->dispatch('resetPagination');
        Flux::modal('delete-user')->close();
        $this->dispatch('show-toast', 'User deleted successfully!');
    }

    /*
    #[On('reloadUser')]
    public function reloadUser()
    {
        $this->resetPage(); // If using pagination
    }
    */

    public function getUsersProperty()
    {
        if (!empty(trim($this->search))) {
            return User::select('id', 'name', 'email', 'role')
                ->where('name', 'like', '%' . $this->search . '%')
                ->paginate(10);
        }

        return User::select('id', 'name', 'email', 'role')->paginate(10);
    }

    public function render()
    {
        return view('livewire.users.users', [
            'users' => $this->users,
        ]);
    }
}

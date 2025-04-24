<?php

namespace App\Livewire\Users;

use Livewire\Component;
use App\Models\User;
use Flux\Flux;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Livewire\WithPagination;
use Livewire\Attributes\On;

class Users extends Component
{
    use AuthorizesRequests, WithPagination;

    public $user_id;

    protected $paginationTheme = 'tailwind';
    //protected $listeners = ['resetPagination' => 'resetPage'];

    public function mount()
    {
        //$this->authorize('viewAny', User::class);
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
            session()->flash('error', 'User not found.');
            return;
        }

        // $this->authorize('delete', $user);
        
        $user->delete();

        $this->dispatch('reloadUser');
        //$this->dispatch('resetPagination');
        Flux::modal('delete-user')->close();
    }

    #[On('reloadUser')]
    public function reloadUser()
    {
        // Reload users list
        $this->resetPage(); // If using pagination
    }

    public function getUsersProperty()
    {
        return User::select('id', 'name', 'email', 'role')->paginate(10);
    }

    public function render()
    {
        return view('livewire.users.users', [
            'users' => $this->users,
        ]);
    }
}

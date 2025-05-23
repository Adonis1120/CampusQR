<?php

namespace App\Livewire\Students;

use App\Enums\Role;
use App\Models\Student;
use Flux\Flux;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Livewire\WithPagination;

class Students extends Component
{
    use WithPagination;

    public $student_id;
    public $search = '';
    public $is_admin = false;

    protected $paginationTheme = 'tailwind';
    protected $listeners = ['resetPagination' => 'resetPage'];

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function showStudent($id = null)
    {
        $this->dispatch('formStudent', $id);
    }

    public function delete($id)
    {
        $this->student_id = $id;
        Flux::modal('delete-student')->show();
    }

    public function destroy()
    {
        $student = Student::find($this->student_id);

        if (!$student) {
            session()->flash('message', 'Student not found.');
            return;
        }

        if (!Auth::check() || Auth::user()->role !== Role::ADMIN->value) {
            abort(403, 'Unauthorized.');
        }

        if ($student->user) {
            $student->user->delete();
        }
        
        $student->delete();

        $this->dispatch('resetPagination');
        Flux::modal('delete-student')->close();
        $this->dispatch('show-toast', 'Student deleted successfully!');
    }

    public function getStudentsProperty()
    {
        if (!empty(trim($this->search))) {
            return Student::select('id', 'student_number', 'first_name', 'middle_initial', 'last_name', 'suffix', 'guardian_name', 'relationship', 'cp_number')
                ->where('first_name', 'like', '%' . $this->search . '%')
                ->orWhere('last_name', 'like', '%' . $this->search . '%')
                ->paginate(10);
        }

        $user = Auth::user();

        if ($user->role == Role::STUDENT->value) {
            return Student::where('user_id', $user->id)
                ->select('id', 'student_number', 'first_name', 'middle_initial', 'last_name', 'suffix', 'guardian_name', 'relationship', 'cp_number')
                ->paginate(10);
        }

        $this->is_admin = true;

        return Student::select('id', 'student_number', 'first_name', 'middle_initial', 'last_name', 'suffix', 'guardian_name', 'relationship', 'cp_number')
            ->paginate(10);
    }

    public function render()
    {
        return view('livewire.students.students', [
            'students' => $this->students,
        ]);
    }
}

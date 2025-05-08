<?php

namespace App\Livewire\Students;

use App\Models\Student;
use App\Models\User;
use Flux\Flux;
use Livewire\Attributes\On;
use Livewire\Component;

class StudentForm extends Component
{
    public $student_id, $student_number, $first_name, $middle_initial, $last_name, $suffix, $email, $guardian_name, $relationship, $cp_number;
    public $is_editing = false;
    public $student;

    public function mount()
    {
        // $this->students = Student::all();
    }

    public function rules()
    {
        $rules = [
            'student_number'  => 'required|string|max:20|unique:students,student_number,' . $this->student_id,
            'first_name'      => 'required|string|max:50',
            'middle_initial'  => 'nullable|string|size:1',
            'last_name'       => 'required|string|max:50',
            'suffix'          => 'nullable|string|max:10',
            'guardian_name'   => 'required|string|max:100',
            'relationship'    => 'required|string|max:30',
            'cp_number'       => 'required|string|size:13',
        ];
    
        if (!$this->is_editing) {
            $rules['email'] = 'required|email|unique:users,email';
        }
    
        return $rules;
    }

    #[On('formStudent')]
    public function formStudent($id)
    {
        if ($id) {
            $this->student = Student::select('id', 'student_number', 'first_name', 'middle_initial', 'last_name', 'suffix', 'guardian_name', 'relationship', 'cp_number')->findOrFail($id);

            $this->is_editing = true;

            $this->student_id = $id;
            $this->student_number  = $this->student->student_number;
            $this->first_name      = $this->student->first_name;
            $this->middle_initial  = $this->student->middle_initial;
            $this->last_name       = $this->student->last_name;
            $this->suffix          = $this->student->suffix;
            $this->guardian_name   = $this->student->guardian_name;
            $this->relationship    = $this->student->relationship;
            $this->cp_number       = $this->student->cp_number;
        } else {
            $this->is_editing = false;
            $this->resetForm();
        }
        
        Flux::modal('student-form')->show();
        //$this->show_modal = true;
    }

    public function save()
    {
        $data = $this->validate();
        $full_name = $this->first_name . ' ' . ($this->middle_initial ? $this->middle_initial . '. ' : '') . '. ' . $this->last_name . ($this->suffix ? ' ' . $this->suffix : '');

        if ($this->is_editing) {
            $this->student->update($data);

            if ($this->student->user) {
                $this->student->user->update([
                    'name' => $full_name,
                ]);
            }
        } else {
            Student::create($data);
            $user = User::create([
                'name' => $full_name,
                'email' => $data['email'],
                'password' => bcrypt($this->student_number),
                'role' => 'student',
            ]);
            $data['user_id']= $user->id;
        }

        $this->resetForm();
        Flux::modal('student-form')->close();
        $this->dispatch('resetPagination');
        $this->dispatch('show-toast', 'Student saved successfully!');
    }

    public function resetForm()
    {
        $this->reset([
            'student_id',
            'student_number',
            'first_name',
            'middle_initial',
            'last_name',
            'suffix',
            'guardian_name',
            'relationship',
            'cp_number',
        ]);
    }
}

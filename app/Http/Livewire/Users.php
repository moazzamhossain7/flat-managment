<?php

namespace App\Http\Livewire;

use App\Http\Livewire\Traits\DataTable\WithPerPagePagination;
use App\Models\User;
use Illuminate\Validation\Rule;
use Livewire\Component;

class Users extends Component
{
    use WithPerPagePagination;

    public User $form;
    public $password;
    public $roles;
    public $filters = [
        'role' => '',
        'search' => '',
        'status' => '',
    ];

    protected $listeners = [
        'refreshUsers' => '$refresh',
        'triggerDelete' => 'destroy',
    ];
    /**
     * constructor
     */
    public function mount()
    {
        $this->form = $this->makeBlankForm();
        $this->roles = ['org_admin', 'staff', 'supervisor', 'sales'];
    }

    /**
     * Set of validation rules
     */
    public function rules()
    {
        $rules = [
            'form.first_name' => 'required',
            'form.last_name' => 'required',
            'form.email' => 'required|unique:users,email',
            'form.phone' => 'nullable',
            'password' => 'required|min:8',
            'form.role' => ['required', Rule::in($this->roles)],
            'form.status' => 'required',
        ];

        if ($this->form->id) {
            $rules['form.email'] = ['required', Rule::unique('users', 'email')->ignore($this->form->id)];
            if (!$this->password) {
                $rules['password'] = 'nullable';
            }
        }

        return $rules;
    }

    /**
     * when create btn click reset the form
     */
    public function create()
    {
        if ($this->form->getKey()) {
            $this->form = $this->makeBlankForm();
        }
    }

    /**
     * Build blank form
     */
    public function makeBlankForm()
    {
        return User::make(['role' => 'org_admin', 'status' => 1]);
    }

    /**
     * Edit form
     */
    public function edit(User $form)
    {
        if ($this->form->isNot($form)) {
            $this->form = $form;
        }
    }

    /**
     * Store form into DB
     */
    public function save()
    {
        $this->validate();
        $isNew = !($this->form->id) ? 1 : 0;

        try {
            if ($this->password) {
                $this->form->password = bcrypt($this->password);
            }
            $this->form->subscriber_id = getSubscriberId();
            $this->form->save();

            $this->resetForm();

            $this->notify('Successfully ' . ($isNew ? 'added' : 'updated') );
        } catch (\Exception $e) {
            $this->notify($e->getMessage(), 'danger');
        }
    }

    /**
     * Clsoe modal and reset form
     */
    public function resetForm()
    {
        $this->closeModal();

        $this->form = $this->makeBlankForm();

        $this->password = '';
    }

    /**
     * handle delete resource
     *
     * @param mix $id
     * @return void
     */
    public function destroy($id)
    {
        try {
            User::findOrFail($id)->delete();

            $this->notify('User deleted successfully.');
        } catch (\Exception $e) {
            $this->notify($e->getMessage(), 'danger');
        }
    }

    /**
     * Get db rows query scope
     */
    public function getRowsQueryProperty()
    {
        return User::query()
            ->when($this->filters['status'], fn($query, $status) => $query->where('status', $status == 'active' ? 1 : 0))
            ->when($this->filters['role'], fn($query, $role) => $query->where('role', $role))
            ->when($this->filters['search'], fn($query, $search) => $query->where(function($q) use($search) {
                return $q->where('first_name', $search)->orWhere('last_name', $search);
            }))
            ->ofSubscriberId()
            ->latest();
    }

    /**
     * Get subscribers collection
     */
    public function getRowsProperty()
    {
        return $this->applyPagination($this->rowsQuery);
    }

    public function render()
    {
        return view('livewire.users.index', [
            'users' => $this->getRowsProperty(),

        ]);
    }
}

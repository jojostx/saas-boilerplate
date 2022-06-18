<?php

namespace App\Http\Livewire\Central;

use App\Models\Central\Auth\Role;
use Exception;
use Livewire\Component;
use Livewire\WithPagination;

class ShowRoles extends Component
{
    use WithPagination;

    public $search;
    public $deleteId;

    protected $listeners = [
        'roleDeleted' => '$refresh',
    ];

    public function delete()
    {
        if (!auth()->user()->hasPermissionTo('role:delete'))
        {
            throw new Exception(__('You do not have permission to delete roles.'));
        }

        $role = Role::findById($this->deleteId);
        if ($role->users()->count()) {
            throw new Exception(__('You can not delete a role with associated users.'));
        }
        Role::destroy($this->deleteId);
        $this->emit('roleDeleted');
    }

    public function render()
    {
        return view('livewire.central.show-roles', [
            'roles' => Role::where('name', 'like', '%'.$this->search.'%')->paginate(10)
        ]);
    }
}

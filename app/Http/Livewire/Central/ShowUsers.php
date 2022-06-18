<?php

namespace App\Http\Livewire\Central;

use App\Models\Central\Auth\Admin;
use Exception;
use Livewire\Component;
use Livewire\WithPagination;

class ShowUsers extends Component
{
    use WithPagination;

    public $search;
    public $deleteId;

    protected $listeners = [
        'userDeleted' => '$refresh',
    ];

    public function delete()
    {
        if (!auth()->user()->hasPermissionTo('user:delete'))
        {
            throw new Exception(__('You do not have permission to delete users.'));
        }
        Admin::destroy($this->deleteId);
        $this->emit('userDeleted');
    }

    public function render()
    {
        return view('livewire.central.show-users', [
            'users' => Admin::where('name', 'like', '%'.$this->search.'%')->paginate(10)
        ]);
    }
}

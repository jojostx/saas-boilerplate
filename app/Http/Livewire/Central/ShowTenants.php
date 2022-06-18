<?php

namespace App\Http\Livewire\Central;

use App\Models\Central\Tenant\Tenant;
use Exception;
use Livewire\Component;
use Livewire\WithPagination;

class ShowTenants extends Component
{
    use WithPagination;

    public $search;
    public $deleteId;

    protected $listeners = [
        'tenantDeleted' => '$refresh',
    ];

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function delete()
    {
        if (!auth()->user()->hasPermissionTo('tenant:delete')) {
            throw new Exception(__('You do not have permission to delete roles.'));
        }
        Tenant::destroy($this->deleteId);
        $this->emit('roleDeleted');
    }

    public function render()
    {
        return view('livewire.central.show-tenants', [
            'tenants' => Tenant::paginate(12)
        ]);
    }
}

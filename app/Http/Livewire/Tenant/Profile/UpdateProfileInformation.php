<?php

namespace App\Http\Livewire\Tenant\Profile;

use App\Models\Central\Tenant\Tenant;
use Livewire\Component;
use Illuminate\Validation\Rule;

class UpdateProfileInformation extends Component
{
    public $name;
    public $email;
    public $success;

    protected $listeners = ['profileUpdated' => '$refresh'];

    public function mount()
    {
        $this->name = auth()->user()->name;
        $this->email = auth()->user()->email;
    }

    public function save()
    {
        $validated = $this->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => [
                'required',
                'string',
                'email',
                'max:255',
                Rule::unique('tenant.users')->ignore(auth()->user()),
                function ($attribute, $value, $fail) {
                    if (auth()->user()->isOwner() && Tenant::where('email', $value)->where('id', '!=', tenant('id'))->exists()) {
                        $fail("The $attribute is occupied by another tenant.");
                    }
                }
            ],
        ]);
        auth()->user()->update($validated);
        $this->success = __('Profile Updated');
        $this->emit('profileUpdated');
    }

    public function render()
    {
        return view('livewire.tenant.profile.update-profile-information');
    }
}

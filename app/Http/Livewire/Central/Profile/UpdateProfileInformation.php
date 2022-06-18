<?php

namespace App\Http\Livewire\Central\Profile;

use Illuminate\Validation\Rule;
use Livewire\Component;

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
                Rule::unique('admins')->ignore(auth()->user()),
            ],
        ]);
        auth()->user()->update($validated);
        $this->success = __('Profile Updated');
        $this->emit('profileUpdated');
    }

    public function render()
    {
        return view('livewire.central.profile.update-profile-information');
    }
}

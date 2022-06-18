<?php

namespace App\Http\Livewire\Central\Settings;

use Livewire\Component;

class GeneralSettingsForm extends Component
{
    public $app_name;
    public $app_timezone;
    public $success;

    protected $listeners = ['settingsUpdated' => '$refresh'];

    public function mount()
    {
        $this->app_name = setting('app_name', 'Laravel');
        $this->app_timezone = setting('app_timezone', 'UTC');
    }

    public function saveGeneralSettings()
    {
        auth()->user()->hasPermissionTo('settings');

        $validated = $this->validate([
            'app_name' => 'required',
            'app_timezone' => 'required'
        ]);

        foreach ($validated as $key => $value)
        {
            setting([$key => $value]);
        }

        $this->success = __('General Settings Updated');
        $this->emit('settingsUpdated');
    }

    public function render()
    {
        return view('livewire.central.settings.general-settings-form');
    }
}

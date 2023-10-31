<?php

namespace App\Livewire;

use App\Models\Service;
use Livewire\Component;

class ServicePage extends Component
{
    public function render()
    {
        return view('livewire.service-page', [
            'services' => Service::where('is_active', 1)->get()
        ]);
    }
}

<?php

namespace App\Livewire;

use App\Models\Service;
use Livewire\Component;

class HomePage extends Component
{
    public function render()
    {
        return view('livewire.home-page', [
            'services' => Service::where('is_active', 1)->get()
        ]);
    }
}

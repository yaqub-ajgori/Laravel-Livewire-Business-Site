<?php

namespace App\Livewire;

use App\Models\Service;
use Livewire\Component;

class SingleServicePage extends Component
{

    public $service;

    public function mount($id)
    {
        $this->service = Service::find($id);
    }

    public function render()
    {
        return view('livewire.single-service-page');
    }
}

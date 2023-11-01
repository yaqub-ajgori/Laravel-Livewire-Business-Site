<?php

namespace App\Livewire;

use App\Models\Member;
use Livewire\Component;

class TeamPage extends Component
{
    public function render()
    {
        return view('livewire.team-page', [
            'members' => Member::where('status', 1)
                ->orderBy('created_at', 'desc')
                ->get(),
        ]);
    }
}

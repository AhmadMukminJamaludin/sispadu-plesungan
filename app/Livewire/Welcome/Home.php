<?php

namespace App\Livewire\Welcome;

use App\Models\Aduan;
use Livewire\Component;

class Home extends Component
{
    public string $no_tracking = '';
    
    public function render()
    {
        return view('livewire.welcome.home', [
            'aduan' => Aduan::query()
                ->latest()
                ->paginate(2),
        ])->layout('layouts.welcome');
    }
}

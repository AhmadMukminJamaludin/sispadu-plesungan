<?php

namespace App\Livewire\Welcome;

use Livewire\Component;

class LacakAduan extends Component
{
    public string $no_tracking = '';
    
    public function render()
    {
        return view('livewire.welcome.lacak-aduan');
    }
}

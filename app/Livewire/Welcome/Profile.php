<?php

namespace App\Livewire\Welcome;

use Livewire\Component;

class Profile extends Component
{
    public function render()
    {
        return view('livewire.welcome.profile')->layout('layouts.welcome');
    }
}

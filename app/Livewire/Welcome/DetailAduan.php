<?php

namespace App\Livewire\Welcome;

use App\Models\Aduan;
use Livewire\Component;

class DetailAduan extends Component
{
    public ?Aduan $aduan;

    public function mount($noTracking)
    {
        $aduan = Aduan::firstWhere('no_tracking', $noTracking);
        $this->aduan = $aduan;
    }

    public function render()
    {
        return view('livewire.welcome.detail-aduan')->layout('layouts.welcome');
    }
}

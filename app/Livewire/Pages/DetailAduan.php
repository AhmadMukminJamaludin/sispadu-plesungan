<?php

namespace App\Livewire\Pages;

use App\Models\Aduan;
use Livewire\Component;

class DetailAduan extends Component
{
    public ?Aduan $aduan;

    public function mount($noTracking)
    {
        $this->aduan = Aduan::firstWhere('no_tracking', $noTracking);
    }

    public function render()
    {
        return view('livewire.pages.detail-aduan')->layout('layouts.stisla');
    }
}

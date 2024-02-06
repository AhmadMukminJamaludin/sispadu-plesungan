<?php

namespace App\Livewire\Welcome;

use App\Models\Kegiatan;
use Livewire\Component;

class DetailKegiatan extends Component
{
    public ?Kegiatan $kegiatan;

    public function mount($slug)
    {
        $kegiatan = Kegiatan::firstWhere('slug', $slug);
        $this->kegiatan = $kegiatan;
    }

    public function render()
    {
        return view('livewire.welcome.detail-kegiatan')->layout('layouts.welcome');
    }
}

<?php

namespace App\Livewire\Welcome;

use App\Models\Kegiatan as ModelsKegiatan;
use Livewire\Component;

class Kegiatan extends Component
{
    public function render()
    {
        return view('livewire.welcome.kegiatan', [
            'kegiatan' => ModelsKegiatan::query()
                ->where('status', 'Diterbitkan')
                ->latest()
                ->first(),
            'semuaKegiatan' => ModelsKegiatan::query()
                ->where('status', 'Diterbitkan')
                ->latest()
                ->paginate(3),
        ])->layout('layouts.welcome');
    }
}

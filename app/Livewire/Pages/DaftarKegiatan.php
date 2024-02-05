<?php

namespace App\Livewire\Pages;

use App\Models\Kegiatan;
use Livewire\Component;

class DaftarKegiatan extends Component
{
    public string $nama = '';

    public function render()
    {
        return view('livewire.pages.daftar-kegiatan', [
            'semuaKegiatan' => Kegiatan::query()
                ->when($this->nama, fn ($q) => $q->whereHas('createdBy', fn ($que) => $que->where('name', 'LIKE', ["%$this->nama%"])))
                ->latest()
                ->paginate(10),
        ])->layout('layouts.stisla');
    }
}

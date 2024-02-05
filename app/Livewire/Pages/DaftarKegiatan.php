<?php

namespace App\Livewire\Pages;

use App\Models\Kegiatan;
use Livewire\Component;

class DaftarKegiatan extends Component
{
    public string $nama = '';

    public function edit(Kegiatan $kegiatan)
    {
        $this->redirectRoute('formulir-kegiatan', ['params_kegiatan' => $kegiatan]);
    }

    public function getKegiatan(Kegiatan $kegiatan)
    {
        $this->dispatch('selected', $kegiatan->id);
    }

    public function delete(Kegiatan $kegiatan)
    {
        $kegiatan->delete();
    }

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

<?php

namespace App\Livewire\Pages;

use App\Models\Kegiatan;
use Livewire\Component;

class DaftarKegiatan extends Component
{
    public string $judul = '';

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
                ->when($this->judul, fn ($q) => $q->where('judul_kegiatan', 'LIKE', ["%$this->judul%"]))
                ->orderBy('judul_kegiatan', 'asc')
                ->paginate(10),
        ])->layout('layouts.stisla');
    }
}

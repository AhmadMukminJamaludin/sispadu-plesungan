<?php

namespace App\Livewire\Modals;

use App\Models\Kegiatan;
use Livewire\Attributes\On;
use Livewire\Component;

class UpdatePublikasi extends Component
{
    public string $publikasi = '';

    public ?Kegiatan $kegiatan;

    #[On('selected')]
    public function getKegiatan(Kegiatan $kegiatan)
    {
        $this->kegiatan = $kegiatan;
    }

    public function updatePublikasi()
    {
        if ($this->publikasi) {
            $this->kegiatan->update(['status' => $this->publikasi]);
            $this->dispatch('alert-success', 'Berhasil disimpan!');
        } else {
            $this->dispatch('alert-error', 'Role tidak boleh kosong!');
        }
    }

    public function render()
    {
        return view('livewire.modals.update-publikasi');
    }
}

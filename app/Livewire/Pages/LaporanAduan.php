<?php

namespace App\Livewire\Pages;

use App\Models\Aduan;
use Livewire\Component;

class LaporanAduan extends Component
{
    public string $no_tracking = '';

    public string $tanggal_awal = '';

    public string $tanggal_akhir = '';

    public function render()
    {
        return view('livewire.pages.laporan-aduan', [
            'semuaAduan' => Aduan::query()
                ->with('responLatest')
                ->when(!auth()->user()->hasRole('admin'), function ($query) {
                    $query->where('created_by', auth()->id());
                })
                ->when($this->no_tracking, fn ($q) => $q->where('no_tracking', $this->no_tracking))
                ->when($this->tanggal_awal && $this->tanggal_akhir, fn ($q) => $q->whereRaw('DATE(created_at) >= ?', $this->tanggal_awal)->whereRaw('DATE(created_at) <= ?', $this->tanggal_akhir))
                // ->when($this->nama, fn ($q) => $q->whereHas('createdBy', fn ($que) => $que->where('name', 'LIKE', ["%$this->nama%"])))
                ->latest()
                ->paginate(10),
        ])->layout('layouts.stisla');
    }
}

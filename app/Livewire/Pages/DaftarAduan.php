<?php

namespace App\Livewire\Pages;

use App\Models\Aduan;
use Livewire\Component;

class DaftarAduan extends Component
{
    public string $no_tracking = '';
    public string $nama = '';

    public function render()
    {
        return view('livewire.pages.daftar-aduan', [
            'aduan' => Aduan::query()
                ->with('responLatest')
                ->when(!auth()->user()->hasRole('admin'), function ($query) {
                    $query->where('created_by', auth()->id());
                })
                ->when($this->no_tracking, fn ($q) => $q->where('no_tracking', $this->no_tracking))
                ->when($this->nama, fn ($q) => $q->whereHas('createdBy', fn ($que) => $que->where('name', 'LIKE', ["%$this->nama%"])))
                ->latest()
                ->paginate(3),
        ])->layout('layouts.stisla');
    }
}

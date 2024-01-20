<?php

namespace App\Livewire\Pages;

use App\Models\User;
use Livewire\Component;

class DataPengguna extends Component
{
    public string $nama = '';

    public function render()
    {
        return view('livewire.pages.data-pengguna', [
            'users' => User::query()
            ->when($this->nama, fn ($q) => $q->whereRaw('name LIKE ?', ["%{$this->nama}%"]))
            ->paginate(10)
        ])->layout('layouts.stisla');
    }
}

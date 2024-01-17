<?php

namespace App\Livewire\Welcome;

use App\Models\Aduan;
use Livewire\Component;

class DaftarAduan extends Component
{
    public string $no_tracking = '';

    public function render()
    {
        return view('livewire.welcome.daftar-aduan', [
            'aduan' => Aduan::query()
                ->when($this->no_tracking, function ($query) {
                    $query->where('no_tracking', 'LIKE', ["%$this->no_tracking%"]);
                })
                ->latest()
                ->paginate(2),
        ])->layout('layouts.welcome');
    }
}

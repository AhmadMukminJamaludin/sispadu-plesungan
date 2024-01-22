<?php

namespace App\Livewire\Pages;

use App\Models\Aduan;
use Livewire\Component;

class Dashboard extends Component
{
    public function render()
    {
        function countAduan(string $type): int {
            $total = Aduan::query()
            ->whereHas('responLatest', function ($query) use ($type) {
                $query->where('status_respon', $type);
            })
            ->get();
            return count($total);
        };
        return view('livewire.pages.dashboard', [
            'totalAduan' => count(Aduan::all()),
            'totalProses' => countAduan('Proses'),
            'totalSelesai' => countAduan('Selesai'),
            'totalTolak' => countAduan('Ditolak'),
        ])->layout('layouts.stisla');
    }
}

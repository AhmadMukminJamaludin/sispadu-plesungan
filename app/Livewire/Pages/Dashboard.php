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
        $aduanTerbaru = Aduan::query()
            ->doesntHave('respon')
            ->latest()
            ->limit(4)
            ->get();
        return view('livewire.pages.dashboard', [
            'totalAduan' => count(Aduan::all()),
            'totalProses' => countAduan('Proses'),
            'totalSelesai' => countAduan('Selesai'),
            'totalTolak' => countAduan('Ditolak'),
            'aduanTerbaru' => $aduanTerbaru
        ])->layout('layouts.stisla');
    }
}

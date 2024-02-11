<?php

namespace App\Livewire\Pages;

use App\Models\Aduan;
use App\Models\Respon;
use Illuminate\Support\Facades\Http;
use Livewire\Component;

class DetailAduan extends Component
{
    public ?Aduan $aduan;
    public ?Respon $responSelected;

    public $formRespon = [
        'status_respon' => '',
        'respon_text' => '',
    ];

    public function rules()
    {
        return [
            'formRespon.status_respon' => 'required',
            'formRespon.respon_text' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'formRespon.status_respon.required' => ':attribute harus diisi!',
            'formRespon.respon_text.required' => ':attribute harus diisi!',
        ];
    }

    public function validationAttributes()
    {
        return [
            'formRespon.status_respon' => 'Status respon',
            'formRespon.respon_text' => 'Respon',
        ];
    }

    public function mount($noTracking)
    {
        $this->aduan = Aduan::firstWhere('no_tracking', $noTracking);
    }

    public function submitRespon()
    {
        try {
            $this->validate();
            $respon = $this->aduan->respon()->firstWhere('status_respon', $this->formRespon['status_respon']);
            if (is_null($respon)) {
                $this->aduan->respon()->create($this->formRespon);
                $response = Http::get('http://103.117.57.212:3000/api', [
                    'number' => '089522822321',
                    'msg' => "{$this->formRespon['status_respon']}: {$this->formRespon['respon_text']} ~ Pesan dikirim melalui bot whatsapp",
                ]);
            } else {
                $respon->update($this->formRespon);
            }
            $this->cancel();
            $this->dispatch('alert-success', "Berhasil disimpan!");
        } catch (\Throwable $th) {
            $this->dispatch('alert-error', $th->getMessage());
        }
    }

    public function cancel()
    {
        $this->responSelected = null;
        $this->reset('formRespon');
    }

    public function selectRespon(Respon $respon): void
    {
        $this->responSelected = $respon;
        $this->formRespon['status_respon'] = $respon->status_respon;
        $this->formRespon['respon_text'] = $respon->respon_text;
    }

    public function deleteRespon(Respon $respon): void
    {
        $respon->delete();
        $this->dispatch('alert-success', "Berhasil dihapus!");
        $this->cancel();
    }

    public function render()
    {
        return view('livewire.pages.detail-aduan', [
            'listStatusRespon' => [
                'Proses' => 'Proses',
                'Pengerjaan' => 'Pengerjaan',
                'Selesai' => 'Selesai',
                'Ditolak' => 'Ditolak',
            ]
        ])->layout('layouts.stisla');
    }
}

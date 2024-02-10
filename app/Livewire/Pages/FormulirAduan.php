<?php

namespace App\Livewire\Pages;

use App\Models\Aduan;
use Illuminate\Support\Facades\Log;
use Livewire\Component;
use Livewire\WithFileUploads;

class FormulirAduan extends Component
{
    use WithFileUploads;

    public $form = [
        'judul_keluhan' => '',
        'kategori' => '',
        'keluhan' => '',
    ];

    public $photo;

    public function rules()
    {
        return [
            'form.judul_keluhan' => 'required',
            'form.kategori' => 'required',
            'form.keluhan' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'form.judul_keluhan.required' => ':attribute harus diisi!',
            'form.kategori.required' => ':attribute harus diisi!',
            'form.keluhan.required' => ':attribute harus diisi!',
        ];
    }

    public function validationAttributes()
    {
        return [
            'form.judul_keluhan' => 'Judul Keluhan',
            'form.kategori' => 'Kategori',
            'form.keluhan' => 'Keluhan',
        ];
    }

    public function submit()
    {
        try {
            $this->validate();
            Log::info($this->photo);
            if ($this->photo) {
                $path = $this->photo->storePublicly('berkas-aduan', 'public');
                $this->form['photo'] = $path;
            }
            $aduan = Aduan::create($this->form);
            $this->photo = null;
            $this->form = [
                'judul_keluhan' => '',
                'kategori' => '',
                'keluhan' => '',
            ];
            $this->dispatch('alert-success', 'Berhasil Disimpan!');
        } catch (\Throwable $th) {
            Log::error($th->getMessage());
            $this->dispatch('alert-error', $th->getMessage());
        }
    }

    public function render()
    {
        return view('livewire.pages.formulir-aduan', [
            'listKategori' => [
                'Infrastruktur' => 'Infrastruktur',
                'Pelayanan Publik' => 'Pelayanan Publik',
                'Keamanan dan Ketertiban' => 'Keamanan dan Ketertiban',
                'Administrasi' => 'Administrasi',
                'Kesejahteraan Masyarakat' => 'Kesejahteraan Masyarakat',
                'Fasilitas Umum' => 'Fasilitas Umum',
            ]
        ])->layout('layouts.stisla');
    }
}

<?php

namespace App\Livewire\Pages;

use App\Models\Kegiatan;
use Livewire\Component;
use Livewire\WithFileUploads;

class FormulirKegiatan extends Component
{
    use WithFileUploads;

    public $form = [
        'judul_kegiatan' => '',
        'kategori' => '',
        'deskripsi' => '',
    ];

    public $photo;

    public function rules()
    {
        return [
            'form.judul_kegiatan' => 'required',
            'form.kategori' => 'required',
            'form.deskripsi' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'form.judul_kegiatan.required' => ':attribute harus diisi!',
            'form.kategori.required' => ':attribute harus diisi!',
            'form.deskripsi.required' => ':attribute harus diisi!',
        ];
    }

    public function validationAttributes()
    {
        return [
            'form.judul_kegiatan' => 'Judul Keluhan',
            'form.kategori' => 'Kategori',
            'form.deskripsi' => 'Keluhan',
        ];
    }

    public function submit()
    {
        try {
            $this->validate();
            if ($this->photo) {
                $path = $this->photo->storePublicly('berkas-kegiatan', 'public');
                $this->form['photo'] = $path;
            }
            $kegiatan = Kegiatan::create($this->form);
            $this->photo = null;
            $this->form = [
                'judul_kegiatan' => '',
                'kategori' => '',
                'deskripsi' => '',
            ];
            $this->dispatch('alert-success', 'Berhasil Disimpan!');
        } catch (\Throwable $th) {
            $this->dispatch('alert-error', $th->getMessage());
        }
    }

    public function render()
    {
        return view('livewire.pages.formulir-kegiatan', [
            'listKategori' => ['Berita Kelurahan', 'Program Sosial', 'Pelayanan Publik', 'Kesehatan dan Lingkungan', 'Pendidikan', 'Kegiatan Komunitas', 'Keamanan dan Ketertiban', 'Pariwisata Lokal', 'Partisipasi Masyarakat', 'Ketenagakerjaan dan Ekonomi']
        ])->layout('layouts.stisla');
    }
}

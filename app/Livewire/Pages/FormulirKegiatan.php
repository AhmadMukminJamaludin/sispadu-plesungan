<?php

namespace App\Livewire\Pages;

use App\Models\Kegiatan;
use Illuminate\Support\Facades\Log;
use Livewire\Attributes\Url;
use Livewire\Component;
use Livewire\WithFileUploads;
use Illuminate\Support\Str;

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

    #[Url]
    public $params_kegiatan = '';

    public ?Kegiatan $kegiatan;

    public function mount(Kegiatan $kegiatan)
    {
        if($this->params_kegiatan) {
            $this->kegiatan = Kegiatan::find($this->params_kegiatan);
            $this->form['id'] = $this->kegiatan['id'];
            $this->form['judul_kegiatan'] = $this->kegiatan['judul_kegiatan'];
            $this->form['kategori'] = $this->kegiatan['kategori'];
            $this->form['deskripsi'] = $this->kegiatan['deskripsi'];
        } else {
            $this->kegiatan = $kegiatan;
        };
    }

    public function submit()
    {
        try {
            $this->validate();
            Log::info($this->photo);
            if ($this->photo) {
                $path = $this->photo->storePublicly('berkas-kegiatan', 'public');
                $this->form['photo'] = $path;
            }
            $this->form['slug'] = Str::slug($this->form['judul_kegiatan']);
            if ($this->kegiatan->id) {
                $this->kegiatan->update($this->form);
            } else {
                $this->form['status'] = 'Diterbitkan';
                $this->kegiatan->create($this->form);
            }
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

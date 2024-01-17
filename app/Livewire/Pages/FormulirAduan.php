<?php

namespace App\Livewire\Pages;

use Livewire\Component;
use Livewire\WithFileUploads;

class FormulirAduan extends Component
{
    use WithFileUploads;

    public $form = [
        'judul_keluhan' => '',
        'kategori' => '',
        'keluhan' => '',
        'photo' => '',
    ];

    protected $rules = [
        'form.judul_keluhan' => 'required',
        'form.kategori' => 'required',
        'form.keluhan' => 'required',
        'form.photo' => 'nullable',
    ];

    public function submit() 
    {
        dd($this->form);
    }

    public function render()
    {
        return view('livewire.pages.formulir-aduan')->layout('layouts.stisla');
    }
}

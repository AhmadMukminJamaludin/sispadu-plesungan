<?php

namespace App\Livewire\Pages;
use Illuminate\Support\Facades\Auth;
use Laravel\Fortify\Contracts\UpdatesUserProfileInformation;
use Livewire\Component;
use Livewire\WithFileUploads;

class Profile extends Component
{
    use WithFileUploads;

    public $form = [];

    public $photo;

    public function mount()
    {
        $user = Auth::user();

        $this->form = array_merge([
            'email' => $user->email,
            'bio' => $user->bio
        ], $user->withoutRelations()->toArray());
    }

    public function getUserProperty()
    {
        return Auth::user();
    }

    public function submit(UpdatesUserProfileInformation $updater): void
    {
        try {
            $updater->update(
                Auth::user(),
                $this->photo
                    ? array_merge($this->form, ['photo' => $this->photo])
                    : $this->form
            );
            $this->dispatch('alert-success', 'Berhasil disimpan!');
        } catch (\Throwable $th) {
            $this->dispatch('alert-error', $th->getMessage());
        }
    }

    public function deleteProfilePhoto()
    {
        try {
            Auth::user()->deleteProfilePhoto();
            $this->dispatch('alert-success', 'Photo berhasil dihapus!');
        } catch (\Throwable $th) {
            $this->dispatch('alert-error', $th->getMessage());
        }

    }

    public function render()
    {
        return view('livewire.pages.profile')->layout('layouts.stisla');
    }
}

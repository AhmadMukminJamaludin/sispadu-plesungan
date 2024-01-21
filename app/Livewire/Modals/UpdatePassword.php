<?php

namespace App\Livewire\Modals;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Laravel\Fortify\Contracts\UpdatesUserPasswords;
use Livewire\Component;
use Livewire\Attributes\On; 

class UpdatePassword extends Component
{
    public $state = [
        'current_password' => '',
        'password' => '',
        'password_confirmation' => '',
    ];

    public $user;

    #[On('selected')]
    public function getUser(User $user)
    {
        $this->user = $user;
    }

    public function updatePassword(UpdatesUserPasswords $updater)
    {
        try {
            $updater->update($this->user, $this->state);

            if (request()->hasSession()) {
                if (auth()->id() == $this->user->id) {
                    request()->session()->put([
                        'password_hash_'.Auth::getDefaultDriver() => $this->user->getAuthPassword(),
                    ]);
                }
            }

            $this->state = [
                'current_password' => '',
                'password' => '',
                'password_confirmation' => '',
            ];

            $this->dispatch('alert-success', 'Berhasil disimpan!');
        } catch (\Throwable $th) {
            $this->dispatch('alert-error', $th->getMessage());
        }
    }

    public function render()
    {
        return view('livewire.modals.update-password');
    }
}

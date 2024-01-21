<?php

namespace App\Livewire\Modals;

use App\Models\User;
use Livewire\Attributes\On;
use Livewire\Component;

class UpdateRole extends Component
{
    public string $role = '';
    
    public $user;

    #[On('selected')]
    public function getUser(User $user)
    {
        $this->user = $user;
    }

    public function updateRole()
    {
        if ($this->role) {
            if ($this->role == 'admin') {
                if (!$this->user->hasRole('admin')) {
                    $this->user->removeRole('guest');
                    $this->user->assignRole('admin');
                }
            } else {
                if (!$this->user->hasRole('guest')) {
                    $this->user->removeRole('admin');
                    $this->user->assignRole('guest');
                }
            }
            $this->dispatch('alert-success', 'Berhasil disimpan!');
        } else {
            $this->dispatch('alert-error', 'Role tidak boleh kosong!');
        }
    }

    public function render()
    {
        return view('livewire.modals.update-role');
    }
}

<div>
    <x-slot name="header">
        Data Pengguna
    </x-slot>
    <div class="row mt-4">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <form class="card-header-form mr-2">
                        <input type="text" name="search" class="form-control" wire:model.live="nama" placeholder="Cari nama pengguna...">
                    </form>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-striped">
                            <tr class="text-center">
                                <th>No.</th>
                                <th>Nama</th>
                                <th>Email</th>
                                <th>Roles</th>
                                <th>Aksi</th>
                            </tr>
                            @foreach ($users as $user)
                                <tr>
                                    <td class="text-center" style="width: 20px">{{ $loop->index + 1 }}</td>
                                    <td class="text-left">{{ $user->name }}</td>
                                    <td class="text-center">{{ $user->email }}</td>
                                    <td class="text-center">
                                        @foreach ($user->getRoleNames() as $role)
                                        <span @class(['badge', 'badge-primary' => ($role == 'admin'), 'badge-secondary' => ($role == 'guest')])>{{ $role }}</span>
                                        @endforeach
                                    </td>
                                    <td class="text-center" style="width: 75px;">
                                        <div class="dropdown d-inline mr-2">
                                            <button class="btn btn-success dropdown-toggle" type="button" id="dropdownMenuButton3" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                Aksi
                                            </button>
                                            <div class="dropdown-menu">
                                                <a class="dropdown-item" data-toggle="modal" data-target="#modal-password" wire:click="getUser({{ $user->id }})" role="button">Ubah password</a>
                                                <a class="dropdown-item" data-toggle="modal" data-target="#modal-role" wire:click="getUser({{ $user->id }})" role="button">Ubah Role</a>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </table>
                    </div>
                    <div class="float-right">
                        <nav>
                            <ul class="pagination">
                                <li @class(['page-item', 'disabled' => !$users->previousPageUrl()])>
                                    <a class="page-link" href="{{ $users->previousPageUrl() }}" aria-label="Previous">
                                        <span aria-hidden="true">&laquo; Sebelumnya</span>
                                    </a>
                                </li>
                                <li @class(['page-item', 'disabled' => !$users->nextPageUrl()])>
                                    <a class="page-link" href="{{ $users->nextPageUrl() }}" aria-label="Next">
                                        <span aria-hidden="true">Selanjutnya &raquo;</span>
                                    </a>
                                </li>
                            </ul>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@push('modals')
    <livewire:modals.update-password />
    <livewire:modals.update-role />
@endpush


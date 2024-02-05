<div>
    <x-slot name="header">
        {{ __('Daftar Kegiatan') }}
    </x-slot>
    <div class="row mt-4">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4>Semua Kegiatan</h4>
                    <form class="card-header-form">
                        <input type="text" name="search" class="form-control" wire:model.live="judul_kegiatan" placeholder="Cari judul kegiatan...">
                    </form>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-striped">
                            <tr class="text-center">
                                <th>No.</th>
                                <th>Judul Kegiatan</th>
                                <th>Kategori</th>
                                <th>Pembuat Kegiatan</th>
                                <th>Tanggal Kegiatan</th>
                                <th>Status Publikasi</th>
                                <th>Aksi</th>
                            </tr>
                            @foreach ($semuaKegiatan as $item)
                                <tr>
                                    <td class="text-center">
                                        {{ $loop->index + 1 }}
                                    </td>
                                    <td>{{ $item->judul_kegiatan }}
                                    </td>
                                    <td>
                                        <a type="button">{{ $item->kategori }}</a>
                                    </td>
                                    <td>
                                        <a type="button">
                                            <img alt="image" src="{{ asset('stisla/img/avatar/avatar-5.png') }}" class="rounded-circle mr-2" width="35" data-toggle="title" title="">
                                            <div class="d-inline-block ml-1">{{ $item->createdBy->name }}</div>
                                        </a>
                                    </td>
                                    <td>{{ \Carbon\Carbon::create($item->created_at)->translatedFormat('j F Y H:i') }}</td>
                                    <td class="text-center">
                                        <div class="badge badge-primary">{{ $item->status }}</div>
                                    </td>
                                    <td class="text-center" style="width: 75px;">
                                        <div class="dropdown d-inline mr-2">
                                            <button class="btn btn-success dropdown-toggle" type="button" id="dropdownMenuButton3" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                Aksi
                                            </button>
                                            <div class="dropdown-menu">
                                                <a class="dropdown-item" data-toggle="modal" data-target="#modal-password" wire:click="edit({{ $item->id }})" role="button">Ubah kegiatan</a>
                                                <a class="dropdown-item" data-toggle="modal" data-target="#modal-role" wire:click="edit({{ $item->id }})" role="button">Ubah publikasi</a>
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
                                <li @class(['page-item', 'disabled' => !$semuaKegiatan->previousPageUrl()])>
                                    <a class="page-link" href="{{ $semuaKegiatan->previousPageUrl() }}" aria-label="Previous">
                                        <span aria-hidden="true">&laquo; Sebelumnya</span>
                                    </a>
                                </li>
                                <li @class(['page-item', 'disabled' => !$semuaKegiatan->nextPageUrl()])>
                                    <a class="page-link" href="{{ $semuaKegiatan->nextPageUrl() }}" aria-label="Next">
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

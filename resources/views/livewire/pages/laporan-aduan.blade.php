<div x-data="laporan">
    <x-slot name="header">
        {{ __('Laporan Aduan') }}
    </x-slot>
    <div class="row mt-4">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4>Semua Aduan</h4>
                    <form class="card-header-form mr-2">
                        <input type="text" name="search" class="form-control" x-model="no_tracking" wire:model.live="no_tracking" placeholder="Cari no. tracking...">
                    </form>
                    <div class="card-header-action">
                        <button class="btn btn-primary" type="button" x-on:click="cetak()"><i class="fas fa-print mr-2"></i>Download</button>
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-striped">
                            <tr class="text-center">
                                <th>No.</th>
                                <th>No. Tracking</th>
                                <th>Judul Keluhan</th>
                                <th>Kategori</th>
                                <th>Pembuat Aduan</th>
                                <th>Tanggal Aduan</th>
                                <th>Status</th>
                            </tr>
                            @foreach ($semuaAduan as $item)
                                <tr>
                                    <td class="text-center">
                                        {{ $loop->index + 1 }}
                                    </td>
                                    <td>
                                        {{ $item->no_tracking }}
                                    </td>
                                    <td>{{ $item->judul_keluhan }}
                                        <div class="table-links">
                                            <a href="{{ route('detail-aduan', ['noTracking' => $item->no_tracking]) }}">View</a>
                                        </div>
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
                                        @if ($item->responLatest)
                                            @if ($item->responLatest->status_respon == 'Ditolak')
                                                <div class="badge badge-danger">{{ $item->responLatest->status_respon }}</div>
                                            @else
                                                <div class="badge badge-primary">{{ $item->responLatest->status_respon }}</div>
                                            @endif
                                        @else
                                            <div class="badge badge-warning">Belum Ada Respon</div>
                                        @endif
                                    </td>
                                </tr>
                            @endforeach
                        </table>
                    </div>
                    <div class="float-right">
                        <nav>
                            <ul class="pagination">
                                <li @class(['page-item', 'disabled' => !$semuaAduan->previousPageUrl()])>
                                    <a class="page-link" href="{{ $semuaAduan->previousPageUrl() }}" aria-label="Previous">
                                        <span aria-hidden="true">&laquo; Sebelumnya</span>
                                    </a>
                                </li>
                                <li @class(['page-item', 'disabled' => !$semuaAduan->nextPageUrl()])>
                                    <a class="page-link" href="{{ $semuaAduan->nextPageUrl() }}" aria-label="Next">
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

@push('scripts')
<script>
    function laporan() {
        return {
            no_tracking: '',
            nama: '',
            cetak() {
                let url = `/cetak-laporan?no_tracking=${this.no_tracking}&nama=${this.nama}`;
                let height = 1000;
                let width = 800;
                var left = ( screen.width - width ) / 2;
                var top = ( screen.height - height ) / 2;
                var newWindow = window.open( url, "center window", 'resizable = yes, width=' + width + ', height=' + height + ', top='+ top + ', left=' + left);
            },
        }
    }
</script>
@endpush

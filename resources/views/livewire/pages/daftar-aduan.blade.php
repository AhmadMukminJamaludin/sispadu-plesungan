<div>
    <x-slot name="header">
        {{ __('Daftar Aduan') }}
    </x-slot>
    <div class="row">
        @foreach ($aduanTerbaru as $item)
            <div class="col-12 col-md-4 col-lg-4">
                <article class="article article-style-c">
                    <div class="article-header">
                        @if ($item->photo)
                            <div class="article-image" data-background="{{ asset('storage/'.$item->photo) }}">
                            </div>
                        @else
                            <div class="article-image" data-background="{{ asset('stisla/img/news/img13.jpg') }}">
                            </div>
                        @endif
                    </div>
                    <div class="article-details">
                        <div class="article-category">
                            <a type="button">{{ $item->kategori }}</a>
                            <div class="bullet"></div>
                            <a type="button">{{ \Carbon\Carbon::create($item->created_at)->translatedFormat('j F Y H:i') }}</a>
                        </div>
                        <div class="article-title">
                            <h2><a href="{{ route('detail-aduan', ['noTracking' => $item->no_tracking]) }}">{{ $item->judul_keluhan }}</a></h2>
                        </div>
                        {{ Str::limit($item->keluhan, 30, '...') }}
                        <div class="article-user">
                            <img alt="image" src="{{ asset('stisla/img/avatar/avatar-1.png') }}">
                            <div class="article-user-details">
                                <div class="user-detail-name">
                                    <a href="#">{{ $item->createdBy->name }}</a>
                                </div>
                                <div class="text-job">User Guest</div>
                            </div>
                        </div>
                    </div>
                </article>
            </div>
        @endforeach
    </div>

    <div class="row mt-4">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4>Semua Aduan</h4>
                    <form class="card-header-form">
                        <input type="text" name="search" class="form-control" wire:model.live="no_tracking" placeholder="Cari no. tracking...">
                    </form>
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

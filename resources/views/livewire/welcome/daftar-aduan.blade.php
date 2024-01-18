<div>
    <section class="py-1">
        <div class="container px-5 my-5">
            @foreach ($aduan as $item)
                <div class="row gx-5">
                    <div class="col mb-5">
                        <div class="card h-100 shadow border-0">
                            <div class="card-body p-4">
                                <div class="badge bg-primary bg-gradient rounded-pill mb-2">{{ ($item->responLatest) ? $item->responLatest->status_respon : "Diterima" }}</div>
                                <a class="text-decoration-none link-dark stretched-link" href="{{ route('welcome.detail-aduan', ['noTracking' => $item->no_tracking]) }}"><div class="h5 card-title mb-3">{{ $item->judul_keluhan }}</div></a>
                                <p class="card-text mb-0">{!! Str::limit($item->keluhan, 250, '...') !!}</p>
                            </div>
                            <div class="card-footer p-4 pt-0 bg-transparent border-top-0">
                                <div class="d-flex align-items-end justify-content-between">
                                    <div class="d-flex align-items-center">
                                        <img class="rounded-circle me-3" src="https://dummyimage.com/40x40/ced4da/6c757d" alt="..." />
                                        <div class="small">
                                            <div class="fw-bold">{{ $item->createdBy->name }}</div>
                                            <div class="text-muted">{{ Carbon\Carbon::create($item->created_at)->translatedFormat('j F Y, H:i') }} WIB <div class="badge bg-secondary bg-gradient rounded-pill">{{ $item->kategori }}</div></div>
                                            <div class="text-muted">No. Tracking: {{ $item->no_tracking }}</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
            <div class="d-flex justify-content-between">
                @if ($aduan->previousPageUrl())
                <div class="text-start mb-5 mb-xl-0">
                    <a class="text-decoration-none" href="{{ $aduan->previousPageUrl() }}">
                        <i class="bi bi-arrow-left ms-2"></i>
                        Sebelumnya
                    </a>
                </div>
                @else
                <div class="text-start mb-5 mb-xl-0">
                    <a class="text-muted" type="button" disabled>

                    </a>
                </div>
                @endif
                @if ($aduan->nextPageUrl())
                <div class="text-end mb-5 mb-xl-0">
                    <a class="text-decoration-none" href="{{ $aduan->nextPageUrl() }}">
                        Selanjutnya
                        <i class="bi bi-arrow-right ms-2"></i>
                    </a>
                </div>
                @else
                <div class="text-end mb-5 mb-xl-0">
                    <a class="text-muted" type="button" disabled>

                    </a>
                </div>
                @endif
            </div>
        </div>
    </section>
    <livewire:welcome.lacak-aduan />
</div>

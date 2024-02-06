<div>
    @if ($kegiatan)
    <section class="py-5 bg-light">
        <div class="container px-5">
            <h1 class="fw-bolder fs-5 mb-4">Kegiatan Terbaru</h1>
            <div class="card border-0 shadow rounded-3 overflow-hidden">
                <div class="card-body p-0">
                    <div class="row gx-0">
                        <div class="col-lg-6 col-xl-5 py-lg-5">
                            <div class="p-4 p-md-5">
                                <div class="badge bg-primary bg-gradient rounded-pill mb-2">{{ $kegiatan->kategori }}</div>
                                <div class="h2 fw-bolder">{{ $kegiatan->judul_kegiatan }}</div>
                                <p>{!! Str::limit($kegiatan->deskripsi, 250, '...') !!}</p>
                                <a class="stretched-link text-decoration-none" href="{{ route('welcome.detail-kegiatan', ['slug' => $kegiatan->slug]) }}">
                                    Read more
                                    <i class="bi bi-arrow-right"></i>
                                </a>
                            </div>
                        </div>
                        <div class="col-lg-6 col-xl-7"><div class="bg-featured-blog" style="background-image: url('{{ asset('storage/'.$kegiatan->photo) }}')"></div></div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    @endif

    @if (count($semuaKegiatan) !== 0)
        <!-- Blog preview section-->
    <section class="py-5">
        <div class="container px-5">
            <h2 class="fw-bolder fs-5 mb-4">Semua Kegiatan</h2>
            <div class="row gx-5">
                @forelse ($semuaKegiatan as $item)
                <div class="col-lg-4 mb-5">
                    <div class="card h-100 shadow border-0">
                        @if ($item->photo)
                        <img class="card-img-top" src="{{ asset('storage/'. $item->photo) }}" alt="..." />
                        @else
                        <img class="card-img-top" src="https://dummyimage.com/600x350/adb5bd/495057" alt="..." />
                        @endif
                        <div class="card-body p-4">
                            <div class="badge bg-primary bg-gradient rounded-pill mb-2">{{ $item->kategori }}</div>
                            <a class="text-decoration-none link-dark stretched-link" href="{{ route('welcome.detail-kegiatan', ['slug' => $item->slug]) }}"><div class="h5 card-title mb-3">{{ $item->judul_kegiatan }}</div></a>
                            <p class="card-text mb-0">{!! Str::limit($item->deskripsi, 250, '...') !!}</p>
                        </div>
                        <div class="card-footer p-4 pt-0 bg-transparent border-top-0">
                            <div class="d-flex align-items-end justify-content-between">
                                <div class="d-flex align-items-center">
                                    <img class="rounded-circle me-3" src="https://dummyimage.com/40x40/ced4da/6c757d" alt="..." />
                                    <div class="small">
                                        <div class="fw-bold">{{ $item->createdBy->name }}</div>
                                        <div class="text-muted">{{ Carbon\Carbon::create($item->created_at)->translatedFormat('j F Y, H:i') }}</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @empty

                @endforelse
            </div>
        </div>
    </section>
    @endif

</div>

<div>
    <section class="py-3">
        <div class="container px-5 my-1">
            <div class="text-start mb-5 mb-xl-0">
                <a class="text-decoration-none" href="{{ route('welcome.daftar-aduan') }}">
                    <i class="bi bi-arrow-left ms-2"></i>
                    Kembali
                </a>
            </div>
            <div class="row gx-5">
                <div class="col-lg-3">
                    <div class="d-flex align-items-center mt-lg-5 mb-4">
                        <img class="img-fluid rounded-circle" src="https://dummyimage.com/50x50/ced4da/6c757d.jpg" alt="..." />
                        <div class="ms-3">
                            <div class="fw-bold">{{ $aduan->createdBy->name }}</div>
                            <div class="text-muted">User</div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-9">
                    <article>
                        <header class="mb-4">
                            <h1 class="fw-bolder mb-1">{{ $aduan->judul_keluhan }}!</h1>
                            <div class="text-muted fst-italic mb-2">{{ $aduan->no_tracking }} - {{ Carbon\Carbon::create($aduan->created_at)->translatedFormat('j F Y, H:i') }} WIB</div>
                            <a class="badge bg-secondary text-decoration-none link-light" href="#!">{{ $aduan->kategori }}</a>
                            <a class="badge bg-primary text-decoration-none link-light" href="#!">{{ $aduan->status }}</a>
                        </header>
                        <section class="mb-5">
                            {!! $aduan->keluhan !!}
                            <img class="img-fluid rounded-3 my-5" style="width: 150px" src="{{ asset('storage/'.$aduan->photo) }}" alt="..." />
                        </section>
                    </article>
                    @if (count($aduan->respon) !== 0)
                        <section>
                            <div class="card bg-light">
                                <div class="card-body">
                                    @foreach ($aduan->respon as $respon)
                                        <div class="d-flex mb-4">
                                            <div class="flex-shrink-0"><img class="rounded-circle" src="https://dummyimage.com/50x50/ced4da/6c757d.jpg" alt="..." /></div>
                                            <div class="ms-3">
                                                <div class="fw-bold">{{ $respon->createdBy->name }} - ({{ $respon->status_respon }})</div>
                                                <small class="text-muted fst-italic mb-2">{{ Carbon\Carbon::create($respon->created_at)->translatedFormat('j F Y, H:i') }} WIB</small><br>
                                                {{ $respon->respon_text }}
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                            <!-- Contact cards-->
                            <div class="row gx-5 row-cols-2 row-cols-lg-4 py-5">
                                <div class="col">
                                    <div class="feature bg-primary bg-gradient text-white rounded-3 mb-3"><i class="bi bi-chat-dots"></i></div>
                                    <div class="h5 mb-2">Diterima</div>
                                    <p class="text-muted mb-0">Aduanmu telah diterima</p>
                                </div>
                                @foreach ($aduan->respon as $respon)
                                    <div class="col">
                                        <div class="feature bg-primary bg-gradient text-white rounded-3 mb-3"><i class="bi bi-chat-dots"></i></div>
                                        <div class="h5 mb-2">{{ $respon->status_respon }}</div>
                                        <p class="text-muted mb-0">Aduanmu dalam tahap {{ $respon->status_respon }}</p>
                                    </div>
                                @endforeach
                            </div>
                        </section>
                    @endif
                </div>
            </div>
        </div>
    </section>
</div>

<div>
    <section class="py-3">
        <div class="container px-5 my-1">
            <div class="text-start mb-5 mb-xl-0">
                <a class="text-decoration-none" href="{{ route('welcome.kegiatan') }}">
                    <i class="bi bi-arrow-left ms-2"></i>
                    Kembali
                </a>
            </div>
            <div class="row gx-5">
                <div class="col-lg-3">
                    <div class="d-flex align-items-center mt-lg-5 mb-4">
                        <img class="img-fluid rounded-circle" src="https://dummyimage.com/50x50/ced4da/6c757d.jpg" alt="..." />
                        <div class="ms-3">
                            <div class="fw-bold">{{ $kegiatan->createdBy->name }}</div>
                            <div class="text-muted">User</div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-9">
                    <article>
                        <header class="mb-4">
                            <h1 class="fw-bolder mb-1">{{ $kegiatan->judul_kegiatan }}</h1>
                            <div class="text-muted fst-italic mb-2">{{ Carbon\Carbon::create($kegiatan->created_at)->translatedFormat('j F Y, H:i') }} WIB</div>
                            <a class="badge bg-secondary text-decoration-none link-light" href="#!">{{ $kegiatan->kategori }}</a>
                            <a class="badge bg-primary text-decoration-none link-light" href="#!">{{ $kegiatan->status }}</a>
                        </header>
                        <figure class="mb-4"><img class="img-fluid rounded" src="{{ asset('storage/'.$kegiatan->photo) }}" alt="..." /></figure>
                        {!! $kegiatan->deskripsi !!}
                    </article>
                </div>
            </div>
        </div>
    </section>
</div>

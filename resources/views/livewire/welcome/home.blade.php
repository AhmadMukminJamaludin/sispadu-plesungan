<div>
    <!-- Header-->
    <header class="bg-primary py-5">
        <div class="container px-5">
            <div class="row gx-5 align-items-center justify-content-center">
                <div class="col-lg-8 col-xl-7 col-xxl-6">
                    <div class="my-5 text-center text-xl-start">
                        <h1 class="display-8 fw-bolder text-white mb-2">SISTEM PELAYANAN PENGADUAN MASYARAKAT DESA PLESUNGAN</h1>
                        <p class="lead fw-normal text-white-50 mb-4">platform modern yang memudahkan warga untuk menyampaikan keluhan dan masukan secara efisien!</p>
                        <div class="d-grid gap-3 d-sm-flex justify-content-sm-center justify-content-xl-start">
                            <a class="btn btn-outline-light btn-lg px-4 me-sm-3" href="{{ route('login') }}">Buat Pengaduan!</a>
                        </div>
                    </div>
                </div>
                <div class="col-xl-5 col-xxl-6 d-none d-xl-block text-center"><img class="img-fluid rounded-3 my-5" style="width: 300px" src="{{ asset('startbootstrap/img/logo-karanganyar.png') }}" alt="..." /></div>
            </div>
        </div>
    </header>
    <section class="py-5 bg-light">
        <div class="container px-5">
            <div class="row gx-5">
                <div class="col-xl-8">
                    <h2 class="fw-bolder fs-5 mb-4">ADUAN TERBARU</h2>
                    @forelse ($aduan as $item)
                    <div class="mb-5">
                        <div class="small">{{ $item->createdBy->name }} - {{ Carbon\Carbon::create($item->created_at)->translatedFormat('j F Y, H:i') }} WIB</div>
                        <a class="link-dark" href="{{ url("/detail-aduan/{$item->no_tracking}") }}"><h3>{{ $item->judul_keluhan }}</h3></a>
                        <div class="small text-muted">{!! Str::limit($item->keluhan, 250, '...') !!}</div>
                    </div>
                    @empty

                    @endforelse
                    <div class="text-end mb-5 mb-xl-0">
                        <a class="text-decoration-none" href="{{ route('welcome.daftar-aduan') }}">
                            Lihat lebih banyak
                            <i class="bi bi-arrow-right ms-2"></i>
                        </a>
                    </div>
                </div>
                <div class="col-xl-4">
                    <div class="card border-0 h-100">
                        <div class="card-body p-4">
                            <div class="d-flex h-100 align-items-center justify-content-center">
                                <div class="text-center">
                                    <div class="h6 fw-bolder">Contact</div>
                                    <p class="text-muted mb-4">
                                        For press inquiries, email us at
                                        <br />
                                        <a href="#!">plesungan@kabkaranganyar.com</a>
                                    </p>
                                    <div class="h6 fw-bolder">Follow us</div>
                                    <a class="fs-5 px-2 link-dark"><i class="bi-twitter"></i></a>
                                    <a class="fs-5 px-2 link-dark"><i class="bi-facebook"></i></a>
                                    <a class="fs-5 px-2 link-dark"><i class="bi-instagram"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <livewire:welcome.lacak-aduan />
</div>

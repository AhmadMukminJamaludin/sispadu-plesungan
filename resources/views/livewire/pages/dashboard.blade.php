<div>
    <x-slot name="header">
        {{ __('Dashboard') }}
    </x-slot>
    <div class="row">
        <div class="col-12 mb-3">
            <div class="hero bg-primary text-white">
                <div class="hero-inner">
                    <h2>Selamat Datang, {{ Auth::user()->name }}!</h2>
                    <p class="lead">Sistem Pengaduan Masyarakat Desa Plesungan adalah platform modern yang memudahkan warga untuk menyampaikan keluhan dan masukan secara efisien!</p>
                    <div class="mt-4">
                        <a href="#" class="btn btn-outline-white btn-lg btn-icon icon-left"><i class="far fa-paper-plane mr-2"></i> Buat Aduan!</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div>
    <x-slot name="header">
        {{ __('Dashboard') }}
    </x-slot>

    @if (auth()->user()->hasRole('admin'))
    <div class="row">
        <div class="col-lg-3 col-md-6 col-sm-6 col-12">
            <div class="card card-statistic-1">
                <div class="card-icon bg-warning">
                    <i class="fas fa-sync"></i>
                </div>
                <div class="card-wrap">
                    <div class="card-header">
                        <h4>Aduan Diproses</h4>
                    </div>
                    <div class="card-body">
                        {{ $totalProses }}
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-md-6 col-sm-6 col-12">
            <div class="card card-statistic-1">
                <div class="card-icon bg-primary">
                    <i class="fas fa-envelope-open-text"></i>
                </div>
                <div class="card-wrap">
                    <div class="card-header">
                        <h4>Aduan Dikerjakan</h4>
                    </div>
                    <div class="card-body">
                        {{ $totalPengerjaan }}
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-md-6 col-sm-6 col-12">
            <div class="card card-statistic-1">
                <div class="card-icon bg-success">
                    <i class="fas fa-check"></i>
                </div>
                <div class="card-wrap">
                    <div class="card-header">
                        <h4>Aduan Selesai</h4>
                    </div>
                    <div class="card-body">
                        {{ $totalSelesai }}
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-md-6 col-sm-6 col-12">
            <div class="card card-statistic-1">
                <div class="card-icon bg-danger">
                    <i class="fas fa-times"></i>
                </div>
                <div class="card-wrap">
                    <div class="card-header">
                        <h4>Aduan Ditolak</h4>
                    </div>
                    <div class="card-body">
                        {{ $totalTolak }}
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endif
    @if (auth()->user()->hasRole('guest'))
        <div class="row">
            <div class="col-12 mb-3">
                <div class="hero bg-primary text-white">
                    <div class="hero-inner">
                        <h2>Selamat Datang, {{ Auth::user()->name }}!</h2>
                        <p class="lead">Sistem Pengaduan Masyarakat Desa Plesungan adalah platform modern yang memudahkan warga untuk menyampaikan keluhan dan masukan secara efisien!</p>
                        <div class="mt-4">
                            <a href="{{ route('formulir-aduan') }}" class="btn btn-outline-white btn-lg btn-icon icon-left"><i class="far fa-paper-plane mr-2"></i> Buat Aduan!</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endif
    @if (auth()->user()->hasRole('admin'))
    <div class="row">
        <div class="col-6 mb-3">
            <div class="card">
                <div class="card-header">
                    <h4>Statistik Aduan</h4>
                </div>
                <div class="card-body">
                    <canvas id="myChart4"></canvas>
                </div>
            </div>
        </div>
        @if (count($aduanTerbaru) !== 0)
            <div class="col-6">
                <div class="card">
                    <div class="card-header">
                        <h4>Aduan terbaru</h4>
                    </div>
                    <div class="card-body">
                        <ul class="list-unstyled list-unstyled-border">
                            @foreach ($aduanTerbaru as $item)
                                <li class="media">
                                    <img class="mr-3 rounded-circle" width="50" src="{{ asset('stisla/img/avatar/avatar-1.png') }}" alt="avatar">
                                    <div class="media-body">
                                        <div class="float-right text-warning">Belum Ada Respon</div>
                                        <a href="{{ route('detail-aduan', ['noTracking' => $item->no_tracking]) }}" class="media-title">{{ $item->judul_keluhan }}</a>
                                        <div class="text-small text-muted">{{ $item->createdBy->name }} - {{ \Carbon\Carbon::create($item->created_at)->translatedFormat('j F Y H:i') }}</div>
                                    </div>
                                </li>
                            @endforeach
                        </ul>
                        <div class="text-center pt-1 pb-1">
                            <a href="#" class="btn btn-primary btn-lg btn-round">
                                View All
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        @endif
    </div>
    @endif
</div>

@push('scripts')
<script>
    var ctx = document.getElementById("myChart4").getContext('2d');
    var myChart = new Chart(ctx, {
        type: 'pie',
        data: {
            datasets: [{
                data: [
                    {{ $totalSelesai }},
                    {{ $totalProses }},
                    {{ $totalPengerjaan }},
                    {{ $totalTolak }},
                ],
                backgroundColor: [
                    '#63ed7a',
                    '#ffa426',
                    '#ADD8E6',
                    '#fc544b',
                ],
                label: 'Dataset 1'
            }],
            labels: [
                'Selesai',
                'Diproses',
                'Dikerjakan',
                'Ditolak',
            ],
        },
        options: {
            responsive: true,
            legend: {
                position: 'right',
            },
        }
    });
</script>
@endpush

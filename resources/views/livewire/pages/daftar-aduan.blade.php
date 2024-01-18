<div>
    <x-slot name="header">
        {{ __('Daftar Aduan') }}
    </x-slot>
    <div class="row">
        @foreach ($aduan as $item)
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
                        <p>
                            {!! Str::limit($item->keluhan, 30, '...') !!}
                        </p>
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
</div>

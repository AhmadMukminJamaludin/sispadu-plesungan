<div>
    <x-slot name="header">
        {{ __('Detail Aduan') }}
    </x-slot>
    <a href="{{ route('daftar-aduan') }}">
        <h2 class="section-title">Kembali</h2>
    </a>
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <div class="tickets">
                        <div class="ticket-items" id="ticket-items">
                            <div class="ticket-item active">
                                <div class="ticket-title">
                                    <h4>{{ $aduan->judul_keluhan }}</h4>
                                </div>
                                <div class="ticket-desc">
                                    <div>{{ $aduan->createdBy->name }}</div>
                                    <div class="bullet"></div>
                                    <div>{{ \Carbon\Carbon::create($aduan->created_at)->translatedFormat('j F Y H:i') }}</div>
                                </div>
                            </div>
                        </div>
                        <div class="ticket-content">
                            <div class="ticket-header">
                                <div class="ticket-sender-picture img-shadow">
                                    <img src="{{ asset('stisla/img/avatar/avatar-5.png') }}" alt="image">
                                </div>
                                <div class="ticket-detail">
                                    <div class="ticket-title">
                                        <h4>{{ $aduan->judul_keluhan }}</h4>
                                    </div>
                                    <div class="ticket-info">
                                        <div class="font-weight-600">{{ $aduan->createdBy->name }}</div>
                                        <div class="bullet"></div>
                                        <div class="text-primary font-weight-600">{{ \Carbon\Carbon::create($aduan->created_at)->translatedFormat('j F Y H:i') }}</div>
                                    </div>
                                </div>
                            </div>
                            <div class="ticket-description">
                                <p>{!! $aduan->keluhan !!}</p>

                                <div class="gallery gallery-md">
                                    <div class="gallery-item" data-image="{{ asset('storage/'.$aduan->photo) }}" data-title="Image 1"></div>
                                </div>

                                <div class="ticket-divider"></div>

                                <ul class="list-unstyled list-unstyled-border list-unstyled-noborder">
                                    @foreach ($aduan->respon as $respon)
                                        <li class="media">
                                            <img alt="image" class="mr-3 rounded-circle" width="70" src="{{ asset('stisla/img/avatar/avatar-1.png') }}">
                                            <div class="media-body">
                                                <div class="media-right"><div class="text-primary">{{ $respon->status_respon }}</div></div>
                                                <div class="media-title mb-1">{{ $respon->createdBy->name }}</div>
                                                <div class="text-time">{{ \Carbon\Carbon::create($respon->created_at)->translatedFormat('j F Y H:i') }}</div>
                                                @if (auth()->user()->hasRole('admin'))
                                                    @if ($respon->is($responSelected))
                                                        <form wire:submit.prevent="submitRespon">
                                                            <div class="form-group">
                                                                <select class="form-control" wire:model="formRespon.status_respon" disabled>
                                                                    <option value="">Pilih Respon</option>
                                                                    @foreach ($listStatusRespon as $item)
                                                                        <option value="{{ $item }}">{{ $item }}</option>
                                                                    @endforeach
                                                                </select>
                                                            </div>
                                                            <div class="form-group">
                                                                <textarea class="form-control" wire:model="formRespon.respon_text" placeholder="Tuliskan respon ..."></textarea>
                                                            </div>
                                                            <div class="form-group text-right">
                                                                <button type="button" wire:click="cancel" class="btn btn-secondary btn-lg mr-2">
                                                                    Batal
                                                                </button>
                                                                <button class="btn btn-primary btn-lg">
                                                                    Kirim Respon
                                                                </button>
                                                            </div>
                                                        </form>
                                                    @else
                                                        <div class="media-description text-muted">
                                                            {{ $respon->respon_text }}
                                                        </div>
                                                    @endif
                                                @endif

                                                @if (auth()->user()->hasRole('admin'))
                                                    @if (!$responSelected)
                                                        <div class="media-links">
                                                            <a type="button" wire:click="selectRespon({{ $respon->id }})">Ubah Respon</a>
                                                            <div class="bullet"></div>
                                                            <a type="button" wire:click="deleteRespon({{ $respon->id }})" class="text-danger">Hapus Respon</a>
                                                        </div>
                                                    @endif
                                                @endif
                                            </div>
                                        </li>
                                    @endforeach
                                </ul>

                                <div class="ticket-divider"></div>

                                @if (auth()->user()->hasRole('admin'))
                                    @if (!$responSelected)
                                        <div class="ticket-form">
                                            <h5 class="mb-4">Tambahkan Respon</h5>
                                            <form wire:submit.prevent="submitRespon">
                                                <div class="form-group">
                                                    <select class="form-control" wire:model="formRespon.status_respon">
                                                        <option value="">Pilih Respon</option>
                                                        @foreach ($listStatusRespon as $item)
                                                            <option value="{{ $item }}">{{ $item }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                                <div class="form-group">
                                                    <textarea class="form-control" wire:model="formRespon.respon_text" placeholder="Tuliskan respon ..."></textarea>
                                                </div>
                                                <div class="form-group text-right">
                                                    <button class="btn btn-primary btn-lg">
                                                        Kirim Respon
                                                    </button>
                                                </div>
                                            </form>
                                        </div>
                                    @endif
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@push('scripts')
<script>
    $(document).ready(function() {
        $('#summernote1').summernote({
            tabsize: 2,
            height: 200,
            toolbar: [
                ['font', ['bold', 'underline', 'clear']],
                ['color', ['color']],
                ['para', ['ul', 'ol', 'paragraph']],
            ],
            callbacks: {
                    onChange: function(contents, $editable) {
                        @this.set('form.keluhan', contents);
                }
            }
        });
        $('#summernote').summernote({
            tabsize: 2,
            height: 200,
            toolbar: [
                ['font', ['bold', 'underline', 'clear']],
                ['color', ['color']],
                ['para', ['ul', 'ol', 'paragraph']],
            ],
            callbacks: {
                    onChange: function(contents, $editable) {
                        @this.set('form.keluhan', contents);
                }
            }
        });
    });
    $.uploadPreview({
        input_field: "#image-upload",   // Default: .image-upload
        preview_box: "#image-preview",  // Default: .image-preview
        label_field: "#image-label",    // Default: .image-label
        label_default: "Choose File",   // Default: Choose File
        label_selected: "Change File",  // Default: Change File
        no_label: false,                // Default: false
        success_callback: null          // Default: null
    });
</script>
@endpush

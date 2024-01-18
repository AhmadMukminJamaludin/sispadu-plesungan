<div>
    <x-slot name="header">
        {{ __('Detail Aduan') }}
    </x-slot>
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
                                    <div>Farhan A. Mujib</div>
                                    <div class="bullet"></div>
                                    <div>2 min ago</div>
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
                                        <h4>Technical Problem</h4>
                                    </div>
                                    <div class="ticket-info">
                                        <div class="font-weight-600">Farhan A. Mujib</div>
                                        <div class="bullet"></div>
                                        <div class="text-primary font-weight-600">2 min ago</div>
                                    </div>
                                </div>
                            </div>
                            <div class="ticket-description">
                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                                tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
                                quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
                                consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
                                cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
                                proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                                tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
                                quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
                                consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
                                cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
                                proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>

                                <div class="ticket-divider"></div>
                                <div class="list-group">
                                    @foreach ($aduan->respon as $respon)
                                        <div class="list-group-item list-group-item-action flex-column align-items-start">
                                            <div class="d-flex w-100 justify-content-between">
                                                <h5 class="mb-1">{{ $respon->createdBy->name }}</h5>
                                                <small>{{ \Carbon\Carbon::create($respon->created_at)->translatedFormat('j F Y H:i') }}</small>
                                            </div>
                                            <p class="mb-1">{{ $respon->respon_text }}</p>
                                            <small>Donec id elit non mi porta.</small>
                                        </div>
                                    @endforeach
                                </div>

                                <div class="ticket-form">
                                    <form>
                                        <div class="form-group">
                                            <textarea class="summernote form-control" placeholder="Type a reply ..."></textarea>
                                        </div>
                                        <div class="form-group text-right">
                                            <button class="btn btn-primary btn-lg">
                                            Reply
                                            </button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div>
    <section class="py-1">
        <div class="container px-5 my-5">
            <!-- Call to action-->
            <aside class="bg-primary bg-gradient rounded-3 p-4 p-sm-5 mt-5">
                <div class="d-flex align-items-center justify-content-between flex-column flex-xl-row text-center text-xl-start">
                    <div class="mb-4 mb-xl-0">
                        <div class="fs-3 fw-bold text-white">CARI DAN LACAK ADUANMU DISINI</div>
                    </div>
                    <div>
                        <div class="input-group">
                            <input class="form-control" type="text" wire:model.live="no_tracking" placeholder="Nomor Tracking Aduan..." aria-label="Nomor Tracking Aduan..." aria-describedby="button-newsletter" />
                            <a class="btn btn-outline-light" id="button-newsletter" type="button" href="{{ url("/detail-aduan/{$no_tracking}") }}">LACAK</a>
                        </div>
                    </div>
                </div>
            </aside>
        </div>
    </section>
</div>

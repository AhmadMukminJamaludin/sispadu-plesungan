<div>
    <x-slot name="header">
        {{ __('Formulir Aduan') }}
    </x-slot>
    <div class="section-body">
        <h2 class="section-title">Buat Aduan Baru</h2>
        <p class="section-lead">
            Dengan mengisi form ini dan mengirimkan Aduan, Anda telah menyetujui Ketentuan Layanan dan Kebijakan Privasi kami.
        </p>

        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <form wire:submit.prevent="submit">
                            <div class="form-group row mb-4">
                                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Judul Keluhan</label>
                                <div class="col-sm-12 col-md-7">
                                    <input type="text" wire:model="form.judul_keluhan" class="form-control">
                                </div>
                            </div>
                            <div class="form-group row mb-4">
                                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Kategori</label>
                                <div class="col-sm-12 col-md-7">
                                    <select class="form-control selectric" wire:model="form.kategori">
                                        <option>Tech</option>
                                        <option>News</option>
                                        <option>Political</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row mb-4">
                                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Deskripsi Keluhan</label>
                                <div class="col-sm-12 col-md-7">
                                    <textarea class="summernote-simple" wire:model="form.keluhan"></textarea>
                                </div>
                            </div>
                            <div class="form-group row mb-4">
                                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Foto Pendukung</label>
                                <div class="col-sm-12 col-md-7">
                                    <div id="image-preview" class="image-preview">
                                        <label for="image-upload" id="image-label">Choose File</label>
                                        <input type="file" name="image" wire:model="form.photo" id="image-upload" />
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row mb-4">
                                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3"></label>
                                <div class="col-sm-12 col-md-7">
                                    <button class="btn btn-primary btn-lg btn-icon icon-left"><i class="far fa-paper-plane mr-2"></i>Kirim Aduan</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

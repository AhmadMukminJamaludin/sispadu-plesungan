<div>
    <x-slot name="header">
        Profile
    </x-slot>
    <div class="row mt-sm-4">
        <div class="col-12 col-md-12 col-lg-5">
            <div class="card profile-widget">
                <div class="profile-widget-header"> 
                    @if ($this->user->profile_photo_url)
                        <img src="{{ $this->user->profile_photo_url }}" alt="{{ $this->user->name }}" class="rounded-circle profile-widget-picture">
                    @else
                        <img alt="image" src="{{ asset('stisla/img/avatar/avatar-1.png') }}" class="rounded-circle profile-widget-picture">
                    @endif                    
                    <div class="profile-widget-items">
                    </div>
                </div>
                <div class="profile-widget-description">
                    <div class="profile-widget-name">
                        {{ auth()->user()->name }} 
                        <div class="text-muted d-inline font-weight-normal"><div class="slash">
                        </div> 
                            @foreach (auth()->user()->getRoleNames() as $role)
                                {{ $role }}
                            @endforeach
                        </div>
                    </div>
                    {!! auth()->user()->bio !!}
                </div>
            </div>
        </div>
        <div class="col-12 col-md-12 col-lg-7">
            <div class="card">
                <form wire:submit.prevent="submit" wire:ignore>
                    <div class="card-header">
                        <h4>Edit Profile</h4>
                    </div>
                    <div class="card-body">
                        <div class="row">                               
                            <div class="form-group col-12">
                                <label>Name</label>
                                <input type="text" class="form-control" wire:model="form.name">
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-12">
                                <label>Email</label>
                                <input type="text" class="form-control" wire:model="form.email">
                                <div class="invalid-feedback">
                                    Please fill in the email
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-12">
                                <label>No. HP/Whatsapp</label>
                                <input type="text" class="form-control" onkeypress="return onlyNumberKey(event)" wire:model="form.phone">
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-12">
                                <label>Bio</label>
                                <textarea wire:ignore class="form-control" id="summernote">{{ $this->user->bio }}</textarea>
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-7">
                                <label>Photo</label>
                                <div id="image-preview" class="image-preview">
                                    <label for="image-upload" id="image-label">Choose File</label>
                                    <input type="file" name="image" wire:model="photo" id="image-upload" />
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer text-right">
                        <button class="btn btn-outline-secondary mr-2" wire:click="deleteProfilePhoto" type="button">Hapus Photo</button>
                        <button class="btn btn-primary">Simpan Profile</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

@push('scripts')
<script>
    function onlyNumberKey(evt) {
        var ASCIICode = (evt.which) ? evt.which : evt.keyCode
        if (ASCIICode > 31 && (ASCIICode < 48 || ASCIICode > 57))
            return false;
        return true;
    }
    $(document).ready(function() {
        $('#summernote').summernote({
            tabsize: 2,
            height: 200,
            toolbar: [
                ['font', ['bold', 'underline', 'clear']],
                ['color', ['color']],
                ['para', ['ul', 'ol']],
            ],
            callbacks: {
                onChange: function(contents, $editable) {
                    @this.set('form.bio', contents);
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
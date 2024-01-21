<div wire:ignore>
    <div class="modal fade" tabindex="-1" role="dialog" id="modal-password">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Ubah Password</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form wire:submit.prevent="updatePassword" wire:ignore>
                    <div class="modal-body">
                        <div class="form-group">
                            <label>Password baru</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <div class="input-group-text">
                                        <i class="fas fa-lock"></i>
                                    </div>
                                </div>
                                <input type="password" class="form-control" wire:model="state.password" placeholder="Password" name="password">
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Konfirmasi password</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <div class="input-group-text">
                                        <i class="fas fa-lock"></i>
                                    </div>
                                </div>
                                <input type="password" class="form-control" placeholder="Password" wire:model="state.password_confirmation" name="password">
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer bg-whitesmoke br">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary" data-dismiss="modal" wire:click="updatePassword">Save changes</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

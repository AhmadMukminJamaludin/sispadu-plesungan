<div wire:ignore>
    <div class="modal fade" tabindex="-1" role="dialog" id="modal-role">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Ubah Role</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form wire:submit.prevent="updateRole" wire:ignore>
                    <div class="modal-body">
                        <div class="form-group">
                            <label>Role User</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <div class="input-group-text">
                                        <i class="fas fa-edit"></i>
                                    </div>
                                </div>
                                <select wire:model="role" class="form-control">
                                    <option value="">Pilih Role</option>
                                    <option value="admin">Admin</option>
                                    <option value="guest">Guest</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer bg-whitesmoke br">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary" data-dismiss="modal" wire:click="updateRole">Save changes</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

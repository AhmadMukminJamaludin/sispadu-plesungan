import './bootstrap';

Livewire.on("alert-success", message => {
    iziToast.success({
        title: 'Berhasil!',
        message: message,
        position: 'topCenter'
    });
})

Livewire.on("alert-error", message => {
    iziToast.error({
        title: 'Terjadi kesalahan!',
        message: message,
        position: 'topCenter'
    });
})

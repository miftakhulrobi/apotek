<script>
    $('.edit').click(function() {
        const id = $(this).attr('data-id');
        const kategoriname = $(this).attr('data-kategoriname');

        $('[name="id"]').val(id);
        $('[name="kategoriname"]').val(kategoriname);
    })

    $('.hapus-kategori').click(function(e) {
        const id = $(this).attr('data-id');
        swal({
            title: 'Anda Yakin?',
            text: "Menghapus data ini!",
            type: 'warning',
            buttons: {
                cancel: {
                    visible: true,
                    text: 'Batal!',
                    className: 'btn btn-danger'
                },
                confirm: {
                    text: 'Lanjut!',
                    className: 'btn btn-success'
                }
            }
        }).then((willDelete) => {
            if (willDelete) {
                window.location = "<?= base_url('kategori_a/destroy/') ?>" + id;
                swal("Data berhasil di hapus!", {
                    icon: "success",
                    buttons: {
                        confirm: {
                            className: 'btn btn-success'
                        }
                    }
                });
            } else {
                swal("Batal menghapus data!", {
                    buttons: {
                        confirm: {
                            className: 'btn btn-success'
                        }
                    }
                });
            }
        });
    })
</script>
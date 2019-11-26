<script src="<?= base_url('admin') ?>/js/datatables.min.js"></script>
<script src="<?= base_url('admin') ?>/js/sweetalert.min.js"></script>
<script>
    $(document).ready(function() {
        $('#data-obat').DataTable();
    });

    $('.detail-obat').click(function() {
        const id = $(this).attr('data-id');
        $.ajax({
            url: '<?= base_url('obat_a/getobatid/') ?>' + id,
            type: 'GET',
            dataType: 'json',
            success: function(data) {
                $('[name="obat_id"]').val(data.obat_id);
                $('[name="biji"]').val(data.biji);
                $('[name="kaplet"]').val(data.kaplet);
                $('[name="box"]').val(data.box);
                $('[name="botol"]').val(data.botol);
                $('[name="dus"]').val(data.dus);
                $('[name="desc"]').val(data.desc);
            }
        })
    })

    $('.edit-obat').click(function() {
        const id = $(this).attr('data-id');
        $.ajax({
            url: '<?= base_url('obat_a/getobatid/') ?>' + id,
            type: 'GET',
            dataType: 'json',
            success: function(data) {
                $('[name="id"]').val(data.obat_id);
                $('[name="obatname"]').val(data.obatname);
            }
        })
    })

    $('.hapus-obat').click(function(e) {
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
                window.location = "<?= base_url('obat_a/destroy/') ?>" + id;
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
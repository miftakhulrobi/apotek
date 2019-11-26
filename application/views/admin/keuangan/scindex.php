<script src="<?= base_url('admin') ?>/js/datatables.min.js"></script>
<script src="<?= base_url('admin') ?>/js/sweetalert.min.js"></script>
<script>
    $(document).ready(function() {
        $('#data-pengeluaran').DataTable();
    });

    $('.hapus-pengeluaran').click(function(e) {
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
                window.location = "<?= base_url('keuangan_a/destroy/') ?>" + id;
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

    $('.truncate-pengeluaran').click(function(e) {
        swal({
            title: 'Anda Yakin?',
            text: "Menghapus semua data pengeluaran!",
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
                window.location = "<?= base_url('keuangan_a/truncate') ?>";
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
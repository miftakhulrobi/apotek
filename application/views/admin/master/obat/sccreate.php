<script src="<?= base_url('admin') ?>/js/datatables.min.js"></script>
<script>
    $(document).ready(function() {
        $('#data-kategori').DataTable();
    });

    $('.pilih-kategori').click(function() {
        const kategori_id = $(this).attr('data-kategori_id');
        const kategoriname = $(this).attr('data-kategoriname');

        $('[name="kategori_id"]').val(kategori_id);
        $('[name="kategoriname"]').val(kategoriname);

        $('#create').modal('hide');
    })
</script>
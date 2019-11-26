<script>
    $('.pilih-kategori').click(function() {
        const kategori_id = $(this).attr('data-kategori_id');
        const kategoriname = $(this).attr('data-kategoriname');

        $('[name="kategori_id"]').val(kategori_id);
        $('[name="kategoriname"]').val(kategoriname);

        $('#create').modal('hide');
    })
</script>
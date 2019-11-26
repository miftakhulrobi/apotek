<script>
    $('.edit').click(function() {
        const id = $(this).attr('data-id');
        const kategoriname = $(this).attr('data-kategoriname');

        $('[name="id"]').val(id);
        $('[name="kategoriname"]').val(kategoriname);
    })
</script>
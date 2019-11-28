<script src="<?= base_url('admin') ?>/js/datatables.min.js"></script>
<script src="<?= base_url('admin') ?>/js/sweetalert.min.js"></script>
<script>
    $(document).ready(function() {
        $('#data-obat').DataTable();
    });

    function Obat(data) {
        this.biji = data.biji;
        this.kaplet = data.kaplet;
        this.box = data.box;
        this.botol = data.botol;
        this.dus = data.dus;
        this.detail = function() {
            return `<option value="${this.biji}">Bijian : ${this.biji}</option>
                    <option value="${this.kaplet}">Kaplet : ${this.kaplet}</option>
                    <option value="${this.box}">Box : ${this.box}</option>
                    <option value="${this.botol}">Botol : ${this.botol}</option>
                    <option value="${this.dus}">Dus : ${this.dus}</option>`;
        }
    }

    function SimpanItem(item) {
        this.product = item.product;
        this.harga = item.harga;
        this.qty = item.qty;
        this.total = item.total;
        this.record = function() {
            return `<tr>
                        <td>${this.product}</td>
                        <td>${this.harga}</td>
                        <td>${this.qty}</td>
                        <td data-total="${this.total}">${this.total}</td>
                    </tr>`;
        }
    }

    const formatMoney = function(angka, prefix) {
        // let number_string = angka.replace(/[^,\d]/g, '').toString(),
        let number_string = angka.toString(),
            split = number_string.split(','),
            sisa = split[0].length % 3,
            rupiah = split[0].substr(0, sisa),
            ribuan = split[0].substr(sisa).match(/\d{3}/gi);
        if (ribuan) {
            separator = sisa ? '.' : '';
            rupiah += separator + ribuan.join('.');
        }
        rupiah = split[1] != undefined ? rupiah + ',' + split[1] : rupiah;
        return prefix == undefined ? rupiah : (rupiah ? 'Rp' + rupiah : '');
    }

    $('.btn-cari-product').click(function() {
        $('[name="total"]').val('');
        $('[name="qty"]').val('');

        $('.badge-transaksi-baru').css('opacity', 1).addClass('badge-transaksi-baru-animation');
    })

    $('.batal-item').click(function() {
        $('[name="obatname"]').val('');
        $('[name="harga"]').val('');
        $('[name="total"]').val('');
        $('[name="qty"]').val('');
    })

    $('.pilih-obat').click(function(e) {
        const id = $(this).attr('data-id');
        $.ajax({
            url: '<?= base_url('obat_p/getobatid/') ?>' + id,
            type: 'GET',
            dataType: 'json',
            success: function(data) {
                $('[name="obatname"]').val(data.obatname);
                $('#create').modal('hide');

                let dataobat = new Obat(data);
                $('#harga').html(dataobat.detail());
            }
        })
    })

    $('[name="harga"]').click(function() {
        $('[name="total"]').val('');
        $('[name="qty"]').val('');
    })

    $('[name="qty"]').keyup(function() {
        const harga = $('[name="harga"]').val();
        const qty = $(this).val();
        let total = harga * qty;
        $('[name="total"]').val(total);
    })

    $('.simpan-item').click(function() {
        const item = {
            product: $('[name="obatname"]').val(),
            harga: $('[name="harga"]').val(),
            qty: $('[name="qty"]').val(),
            total: $('[name="total"]').val(),
        };
        let newItem = new SimpanItem(item);
        $('#table-target').append(newItem.record());

        $('[name="obatname"]').val('');
        $('[name="harga"]').val('');
        $('[name="total"]').val('');
        $('[name="qty"]').val('');

        $('[name="bayar"]').val('');
        $('[name="kembalian"]').val('');

        $('.bayar').text('');
        $('.kembalian').text('');

        $('[name="discount"]').val('');
        $('[name="totaldiscount"]').val('');

        $('[name="pricebayar"]').val('');
        $('[name="pricediscount"]').val('');
        $('[name="pricekembalian"]').val('');

        let subtotal = $('[name="subtotal"]').val();
        if (!subtotal) {
            $('[name="subtotal"]').val(item.total);
            $('[name="resulttotal"]').val(item.total);
            $('.total-belanja').text(formatMoney(item.total, 'Rp'));
            $('.total-belanja').attr('data-totalbelanja', item.total);

            $('[name="pricemoney"]').val(item.total);
            $('[name="pricetotal"]').val(item.total);
        } else {
            newtotal = parseInt(subtotal) + parseInt(item.total);
            $('[name="subtotal"]').val(newtotal);
            $('[name="resulttotal"]').val(newtotal);
            $('.total-belanja').text(formatMoney(newtotal, 'Rp'));
            $('.total-belanja').attr('data-totalbelanja', newtotal);

            $('[name="pricemoney"]').val(newtotal);
            $('[name="pricetotal"]').val(newtotal);
        }

        $.ajax({
            url: '<?= base_url('transaction_p/inserttoprocess') ?>',
            type: 'POST',
            data: {
                product: item.product,
                price: item.harga,
                qty: item.qty,
                total: item.total
            },
            dataType: 'json',
            success: function() {

            }
        })
    })

    $('[name="bayar"]').keyup(function() {
        const bayar = $(this).val();
        const resulttotal = $('[name="resulttotal"]').val();
        const kembalian = bayar - resulttotal;
        $('[name="kembalian"]').val(kembalian);

        $('.bayar').text(formatMoney(bayar, 'Rp'));
        $('.kembalian').text(formatMoney(kembalian, 'Rp'));

        $('[name="pricebayar"]').val(bayar);
        $('[name="pricekembalian"]').val(kembalian);
    })

    $('[name="discount"]').keyup(function() {
        $('[name="bayar"]').val('');
        $('[name="kembalian"]').val('');

        $('.bayar').text('');
        $('.kembalian').text('');

        $('[name="pricebayar"]').val('');
        $('[name="pricekembalian"]').val('');

        const discount = $(this).val();
        const subtotal = $('[name="subtotal"]').val();
        const totaldiscount = subtotal * discount / 100;
        const resulttotal = subtotal - totaldiscount;
        $('[name="totaldiscount"]').val(totaldiscount);
        $('[name="resulttotal"]').val(resulttotal);

        $('.total-belanja').text(formatMoney(resulttotal, 'Rp'));
        $('.total-belanja').attr('data-totalbelanja', resulttotal);

        $('[name="pricetotal"]').val(resulttotal);
        $('[name="pricediscount"]').val(totaldiscount);
    })

    $('.btn-reset-transaksi').click(function() {
        swal({
            title: 'Anda Yakin?',
            text: "Mereset transaksi ini!",
            type: 'warning',
            buttons: {
                cancel: {
                    visible: true,
                    text: 'Batal!',
                    className: 'btn btn-danger'
                },
                confirm: {
                    text: 'Reset!',
                    className: 'btn btn-success'
                }
            }
        }).then((willDelete) => {
            if (willDelete) {
                window.location = "<?= base_url('transaction_p/reset') ?>";
                swal("Transaksi di batalkan!", {
                    icon: "success",
                    buttons: {
                        confirm: {
                            className: 'btn btn-success'
                        }
                    }
                });
            } else {
                swal("Melanjutkan transaksi!", {
                    buttons: {
                        confirm: {
                            className: 'btn btn-success'
                        }
                    }
                });
            }
        });
    })

    $('.btn-simpan-transaksi').click(function() {
        let pricemoney = $('[name="pricemoney"]').val();
        let pricetotal = $('[name="pricetotal"]').val();
        let pricebayar = $('[name="pricebayar"]').val();
        let pricediscount = $('[name="pricediscount"]').val();
        let pricekembalian = $('[name="pricekembalian"]').val();

        $.ajax({
            url: '<?= base_url('transaction_p/newtransaksi') ?>',
            type: 'POST',
            data: {
                pricemoney: pricemoney,
                pricetotal: pricetotal,
                pricebayar: pricebayar,
                pricediscount: pricediscount,
                pricekembalian: pricekembalian
            },
            dataType: 'json',
            success: function(data) {
                $('.btn-print-transaksi').attr('href', '<?= base_url('pdf/cetaktransaksi/') ?>' + data.transaction_id)
                toastr.success("Transaksi baru berhasil ditambahkan!");
            }
        })
        $('.btn-simpan-transaksi').css('display', 'none');
        $('.btn-reset-transaksi').css('display', 'none');
        $('.btn-print-transaksi').css('display', 'inline');
    })
</script>
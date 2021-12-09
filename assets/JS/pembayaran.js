window.addEventListener('load', function(){
    $('input[type="text"]').on('change', function () {
        this.value = this.value.trim();
    });

    $('textarea').on('change', function () {
        this.value = this.value.trim();
    });

    $('#pembayaran_pasien').on('input', function () {
        var pembayaran_total   = $('#pembayaran_total').val();
        var pembayaran_pasien  = $(this).val();
        var pembayaran_kembali = pembayaran_pasien - pembayaran_total;

        if (pembayaran_kembali <= 0 || pembayaran_kembali == 'NaN') {
            $('#pembayaran_kembali').val(0);
        } else {
            $('#pembayaran_kembali').val(pembayaran_kembali);
        }


        this.value = this.value.trim();
    });

    $('#myForm').on('submit', function(e) {
    	e.preventDefault();

        formSubmit(this);
    });
});

window.addEventListener('load', function(){
    $('input[type="text"]').on('change', function () {
        this.value = this.value.trim();
    });

    $('textarea').on('change', function () {
        this.value = this.value.trim();
    });

	$('#pasien_id').select2({
		minimumInputLength: 2,
		allowClear: false,
		ajax: {
			dataType: 'json',
			url: '../pasien/getPasienByName/',
			delay: 1000, // 1 second
			data: function(params) {
				return {
					search: params.term
				}
			},
			processResults: function (data, page) {
				return {
					results: data
				};
			},
		}
	});

    $('#pasien_id').on('select2:selecting', function(e){
        var data = e.params.args.data;

        $('#pasien_tempatLahir').val(data.pasien_tempatLahir);
        $('#pasien_tglLahir').val(data.pasien_tglLahir);
        $('#pasien_alamat').val(data.pasien_alamat);
    });

    $('#poli_id').on('change', function(e){
        var poli_id = $(this).val();

        $.ajax({
    		url      : '../dokter/getDokterByPoliId/',
    		type     : 'POST',
            dataType : 'json',
            data     : {
                poli_id : poli_id
            },
            beforeSend: function (result) {
            },
    		success: function(data, textStatus, xhr) {
                var list = '';
                data.forEach(function(event){
                    list += '<option value="'+ event.dokter_id +'">'+ event.dokter_nama +'</option>';
                });

                $('#dokter_id').html(list);
    		},
            error: function(XMLHttpRequest, textStatus, errorThrown) {
            },
            complete: function(e) {
            }
    	});
    });

    $('#myForm').on('submit', function(e) {
    	e.preventDefault();

        formSubmit(this);
    });
});

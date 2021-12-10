window.addEventListener('load', function(){
    $('input[type="text"]').on('change', function () {
        this.value = this.value.trim();
    });

    $('textarea').on('change', function () {
        this.value = this.value.trim();
    });

    $('#myForm').on('submit', function(e) {
    	e.preventDefault();

        formSubmit(this);
    });
});

$(document).on('click', '.reset-btn', function(){
    var bar          = $('#ModalProgress .progress-bar');
    var textProgress = $('#ModalProgress .progress-text');

    if (confirm('Reset password user ke password default? (Password default: 123)')) {
	    var id = $(this).val();

    	$.ajax({
    		url 	: baseUrl + '/user/reset_action',
    		type 	: 'POST',
            data    : {
                id: id
            },
            beforeSend: function (result) {
                textProgress.text('Menyimpan...');
				bar.removeClass('bg-success');
				bar.removeClass('bg-danger');
				bar.addClass('progress-bar-striped');
                bar.width(99 + '%');
                bar.text(99 + '%');
                $('#ModalProgress').modal('show');
            },
    		success: function(data, textStatus, xhr) {
    			// If status 200 or complete, change progressbar text to 'complete'
    			if (xhr.status === 200) {
    				if (data == '') {
                        textProgress.text('Password berhasil direset...');
                        bar.addClass('bg-success');
                        bar.text('100%');

                        setTimeout(function () {
                            $('#ModalProgress').modal('hide');
                        }, 1500);
    				}
    				else {
                        textProgress.text('Gagal');
                        bar.addClass('bg-danger');
    					bar.text('error');
        				console.log(data);
    				}
                    bar.removeClass('progress-bar-striped');
    			}
    			else {
    				console.error(textStatus);
    			}
    		},
            error: function(XMLHttpRequest, textStatus, errorThrown) {
                textProgress.text('Gagal');
                bar.addClass('bg-danger');
                bar.text('error');
				console.error(textStatus);
            }
    	});
    }
});

$(document).on('click', '.delete-btn', function(){
    var bar          = $('#ModalProgress .progress-bar');
    var textProgress = $('#ModalProgress .progress-text');

    if (confirm('Hapus data?')) {
	    var id = $(this).val();

    	$.ajax({
    		url 	: baseUrl + '/user/hapus_action',
    		type 	: 'POST',
            data    : {
                id: id
            },
            beforeSend: function (result) {
                textProgress.text('Menyimpan...');
				bar.removeClass('bg-success');
				bar.removeClass('bg-danger');
				bar.addClass('progress-bar-striped');
                bar.width(99 + '%');
                bar.text(99 + '%');
                $('#ModalProgress').modal('show');
            },
    		success: function(data, textStatus, xhr) {
    			// If status 200 or complete, change progressbar text to 'complete'
    			if (xhr.status === 200) {
    				if (data == '') {
                        textProgress.text('Berhasil, memuat ulang...');
                        bar.addClass('bg-success');
                        bar.text('100%');

                        setTimeout(function () {
                            window.location.reload();
                        }, 1000);
    				}
    				else {
                        textProgress.text('Gagal');
                        bar.addClass('bg-danger');
    					bar.text('error');
        				console.log(data);
    				}
                    bar.removeClass('progress-bar-striped');
    			}
    			else {
    				console.error(textStatus);
    			}
    		},
            error: function(XMLHttpRequest, textStatus, errorThrown) {
                textProgress.text('Gagal');
                bar.addClass('bg-danger');
                bar.text('error');
				console.error(textStatus);
            }
    	});
    }
});

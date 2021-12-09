
let xhrPost;
function formSubmit(self){
    if (xhrPost) return alert('Sedang memproses...');

    if (confirm('Data sudah benar?')) {
	    var bar          = $('#ModalProgress .progress-bar');
        var textProgress = $('#ModalProgress .progress-text');
    	let formData     = new FormData(self);
        let action       = $(self).attr('action');

    	xhrPost = $.ajax({
    		url 		: action,
    		type 		: 'POST',
    		data 		: formData,
    		contentType	: false,
    		processData	: false,
    		cache 		: false,
            xhr: function () {
                var xhr = new window.XMLHttpRequest();
                xhr.upload.addEventListener('progress', function (e) {
                    if (e.lengthComputable) {
                        var percentVal 	= (e.loaded / e.total);
                        percentVal 		= parseInt(percentVal * 100);

                        if (percentVal >= 100) percentVal = 99;

                        bar.width(percentVal + '%');
                        bar.text(percentVal + '%');
                    }
                }, false);
                return xhr;
            },
            beforeSend: function (result) {
                $('button[type="submit"]').prop('disabled', true);

                textProgress.text('Menyimpan...');
				bar.removeClass('bg-success');
				bar.removeClass('bg-danger');
				bar.addClass('progress-bar-striped');
                bar.text('0%');
                bar.width('0%');
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
                        $('button[type="submit"]').prop('disabled', false);
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
                $('button[type="submit"]').prop('disabled', false);
                textProgress.text('Gagal');
                bar.addClass('bg-danger');
                bar.text('error');
				console.error(textStatus);
            },
            complete: function(e) {
                xhrPost = null;
            }
    	});
    }
}

window.addEventListener('load', function(){
    $('[data-toggle="tooltip"]').tooltip();
    $('.select2').select2();
});

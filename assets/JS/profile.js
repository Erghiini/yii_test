window.addEventListener('load', function(){
    $('#formUbahPassword').on('submit', function(e) {
    	e.preventDefault();

        let password_lama        = $('input[name="password_lama"]').val();
        let password_baru        = $('input[name="password_baru"]').val();
        let kofirm_password_baru = $('input[name="kofirm_password_baru"]').val();

        if (password_lama == '') return alert('Silakan isi password anda saat ini.');
        if (password_baru == '') return alert('Password baru tidak boleh kosong!');
        if (password_baru != kofirm_password_baru) return alert('Password baru & konfirmasi password tidak sama!');

        formSubmit(this);
    });
});

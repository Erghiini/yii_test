window.addEventListener('load', function(){
    $('input[type="text"]').on('change', function () {
        this.value = this.value.trim();
    });

    $('[name="tindakan_tarif"]').on('input', function(){
        var tarif = $(this).val();

        if (tarif <= 0) return $(this).val(0);
    });

    $('#myForm').on('submit', function(e) {
    	e.preventDefault();

        formSubmit(this);
    });
});

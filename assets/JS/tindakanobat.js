
function getObat() {
    $('.obat_id').select2({
        minimumInputLength: 3,
        allowClear: false,
        ajax: {
            dataType: 'json',
            url: baseUrl + '/obat/getObatByName/',
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
}

window.addEventListener('load', function(){
    getObat();

    $('input[type="text"]').on('change', function () {
        this.value = this.value.trim();
    });

    $('textarea').on('change', function () {
        this.value = this.value.trim();
    });

    $(document).on('input', '.obat_jumlah', function(){
        var obat_jumlah = $(this).val();
        if (obat_jumlah <= 0) $(this).val(1);
    });

    $('#btn_tambah_obat').on('click', function(){
        var item = `
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-lg-8">
                            <div class="form-group">
                                <label>Nama Obat</label>
                                <select class="form-control obat_id" name="obat_id[]" required>
                                    <option>Masukkan Nama Obat</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="form-group">
                                <label>Jumlah Obat</label>
                                <input type="number" name="obat_jumlah[]" class="form-control obat_jumlah" placeholder="0" min="1" required>
                            </div>
                        </div>
                        <div class="col-lg-12" align="right">
                            <button type="button" class="btn btn-sm btn-danger btn-hapus-obat"><i class="fa fa-trash"></i> Hapus Obat</button>
                        </div>
                    </div>
                </div>
            </div>
        `;
        $('#list_obat').append(item);
        getObat();
    });

    $(document).on('click', '.btn-hapus-obat', function(){
        if (confirm('Hapus Obat?')) {
            $(this).closest('.card').remove();
        }
    });

    $('#myForm').on('submit', function(e) {
    	e.preventDefault();

        formSubmit(this);
    });
});

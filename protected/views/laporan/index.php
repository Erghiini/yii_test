
<!-- Content Header (Page header) -->
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Laporan</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item active"><a href="#">Dashboard</a></li>
                </ol>
            </div>
        </div>
    </div><!-- /.container-fluid -->
</section>

<!-- Main content -->
<section class="content">

    <!-- solid sales graph -->
    <div class="card bg-gradient-info">
        <div class="card-header border-0">
            <h3 class="card-title">
                <i class="fas fa-walking mr-1"></i>
                Jumlah Kunjungan
            </h3>
        </div>
        <div class="card-body">
            <canvas class="chart" id="line-chart" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
        </div>
    </div>
    <!-- /.card -->
</section>
<!-- /.content -->

<script type="text/javascript">
    window.addEventListener('load', function(){
        var label = [];
        var value = [];

        $.ajax({
            url: baseUrl + "/laporan/getDataPengunjung",
            method: "GET",
            dataType: 'json',
            success: function(data) {
                for (var i = 0; i < data.length; i++) {
                    label.push(data[i].tahun);
                    value.push(data[i].jml);
                }
            }
        });

        label = ['2017','2018','2019','2020','2021'];
        value = [100, 200, 300, 450, 350];
        var pendaftaranGraphChartCanvas = $('#line-chart').get(0).getContext('2d');
        var pendaftaranGraphChartData = {
            labels: label,
            datasets: [
                {
                    label: 'Jumlah Pasien',
                    fill: false,
                    borderWidth: 2,
                    lineTension: 0,
                    spanGaps: true,
                    borderColor: '#efefef',
                    pointRadius: 3,
                    pointHoverRadius: 7,
                    pointColor: '#efefef',
                    pointBackgroundColor: '#efefef',
                    data: value
                }
            ]
        }
        var pendaftaranGraphChartOptions = {
            maintainAspectRatio: false,
            responsive: true,
            legend: {
                display: false
            },
            scales: {
                xAxes: [{
                    ticks: {
                        fontColor: '#efefef'
                    },
                    gridLines: {
                        display: false,
                        color: '#efefef',
                        drawBorder: false
                    }
                }],
                yAxes: [{
                    ticks: {
                        stepSize: 10,
                        fontColor: '#efefef'
                    },
                    gridLines: {
                        display: true,
                        color: '#efefef',
                        drawBorder: false
                    }
                }]
            }
        }
        var pendaftaranGraphChart = new Chart(pendaftaranGraphChartCanvas, {
            type: 'line',
            data: pendaftaranGraphChartData,
            options: pendaftaranGraphChartOptions
        });
    });
</script>

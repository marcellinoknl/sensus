@include('layouts.header')
  <div class="container-scroller">
    <!-- partial:partials/_navbar.html -->
@include('pages.navbarlogo')
    <!-- partial -->
    <div class="container-fluid page-body-wrapper">
      <!-- partial:partials/_settings-panel.html -->
      <!-- partial -->
      @include('layouts.navbar')
      <!-- partial -->
      <div class="main-panel">
        <div class="content-wrapper">
          <div class="row">
            <div class="col-sm-12">
                <div class="home-tab">
                    <div class="tab-content tab-content-basic">
                        <div class="tab-pane fade show active" id="overview" role="tabpanel" aria-labelledby="overview">
                            <div class="row">
                                <div class="col-lg-12 d-flex flex-column">
                                    <div class="row flex-grow">
                                        <div class="col-12 grid-margin stretch-card">
                                            <div class="card card-rounded">
                                                <div class="card-body">
                                                    <div class="d-sm-flex justify-content-between align-items-start">
                                                        <div>
                                                            <h4 class="card-title card-title-dash">Data Sensus</h4>
                                                            <p class="card-subtitle card-subtitle-dash">Total Penduduk :</p>
                                                        </div>
                                                    </div>
                                                    <div class="d-sm-flex align-items-center mt-1 justify-content-between">
                                                      <div class="d-sm-flex align-items-center mt-4 justify-content-between">
                                                        <div class="row">
                                                            <div class="col-md-12">
                                                            <h2 class="me-2 fw-bold">{{ $totalMembers }} jiwa</h2>
                                                            </div>
                                                            <div class="col-md-12">  
                                                                <p>Total Keluarga Yang Sudah Mengisi Survey : <strong>{{$totalHeadFamily}}</strong></p>
                                                            </div>
                                                        </div>
                                                    </div>                                          
                                                        <div class="me-3">
                                                            <div id="marketing-overview-legend"></div>
                                                        </div>
                                                    </div>
                                                    <div class="chartjs-bar-wrapper mt-3">
                                                        <canvas id="chartSensus"></canvas>
                                                    </div>
                                                    <br>
                                                    <canvas id="chartPendapatan"></canvas>
                                                    <br>
                                                    <canvas id="chartPengeluaran"></canvas>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-4 d-flex flex-column"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
        <script>
            var ctxSensus = document.getElementById('chartSensus').getContext('2d');
            var dataSensus = @json($data);
            var labelsSensus = dataSensus.map(function(item) { return item.village; });
            var countsSensus = dataSensus.map(function(item) { return item.count; });
            
            var chartSensus = new Chart(ctxSensus, {
                type: 'bar',
                data: {
                    labels: labelsSensus,
                    datasets: [{
                        label: 'Keluarga yang telah mengisi sensus',
                        data: countsSensus,
                        backgroundColor: 'rgba(75, 192, 192, 0.2)',
                        borderColor: 'rgba(75, 192, 192, 1)',
                        borderWidth: 1
                    }]
                },
                options: {
                    scales: {
                        y: { 
                            beginAtZero: true,
                            ticks: {
                                stepSize: 1,
                                callback: function(value) { 
                                    if (Math.floor(value) === value) {
                                        return value;
                                    }
                                }
                            },
                            max: Math.max(...countsSensus) < 200 ? 200 : Math.ceil(Math.max(...countsSensus) / 100) * 100
                        }
                    }
                }
            });
        
            var ctxPendapatan = document.getElementById('chartPendapatan').getContext('2d');
            var ctxPengeluaran = document.getElementById('chartPengeluaran').getContext('2d');
            var data = @json($data);
            var labels = data.map(function(item) { return item.village; });
            var pendapatanData = data.map(function(item) { return item.pendapatan; });
            var pengeluaranData = data.map(function(item) { return item.pengeluaran; });
        
                    var chartPendapatan = new Chart(ctxPendapatan, {
            type: 'bar',
            data: {
                labels: labels,
                datasets: [{
                    label: 'Pendapatan (in Rp.)',
                    data: pendapatanData,
                    backgroundColor: 'rgba(75, 192, 192, 0.2)',
                    borderColor: 'rgba(75, 192, 192, 1)',
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true,
                        stepSize: 10000000, // 10 million (Rp. 10 Juta) increment
                        max: 50000000, // 50 million (Rp. 50 Juta) maximum
                    }
                }
            }
        });

        var chartPengeluaran = new Chart(ctxPengeluaran, {
            type: 'bar',
            data: {
                labels: labels,
                datasets: [{
                    label: 'Pengeluaran (in Rp.)',
                    data: pengeluaranData,
                    backgroundColor: 'rgba(255, 99, 132, 0.2)',
                    borderColor: 'rgba(255, 99, 132, 1)',
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true,
                        stepSize: 10000000, // 10 million (Rp. 10 Juta) increment
                        max: 50000000, // 50 million (Rp. 50 Juta) maximum
                    }
                }
            }
        });
        </script>
        
        
        </div>

@include('layouts.footer')
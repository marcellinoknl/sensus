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
                                                        <h2 class="me-2 fw-bold">{{ $totalMembers }}</h2>
                                                        <h4 class="me-2">jiwa</h4>
                                                    </div>                                                    
                                                        <div class="me-3">
                                                            <div id="marketing-overview-legend"></div>
                                                        </div>
                                                    </div>
                                                    <div class="chartjs-bar-wrapper mt-3">
                                                        <canvas id="chartSensus"></canvas>
                                                    </div>
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
            var ctx = document.getElementById('chartSensus').getContext('2d');
            var data = @json($data);
            var labels = data.map(function(item) { return item.village; });
            var counts = data.map(function(item) { return item.count; });
            var myChart = new Chart(ctx, {
              type: 'bar',
              data: {
                  labels: labels,
                  datasets: [{
                      label: 'Jumlah Anggota Keluarga',
                      data: counts,
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
                              stepSize: 1, // Ini akan memastikan bahwa hanya angka bulat yang ditampilkan
                              callback: function(value) { 
                                  if (Math.floor(value) === value) {
                                      return value;
                                  }
                              }
                          },
                          max: Math.max(...counts) < 200 ? 200 : Math.ceil(Math.max(...counts) / 100) * 100 // Ini akan mengatur nilai maksimum pada sumbu y
                      }
                  }
              }
          });

        </script>
        
        </div>

@include('layouts.footer')
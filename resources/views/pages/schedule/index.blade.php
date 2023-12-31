@include('layouts.header')
  <div class="container-scroller">
    <!-- partial:partials/_navbar.html -->
    @include('pages.navbarlogo')
    <!-- partial -->
    <div class="container-fluid page-body-wrapper">
      <!-- partial:partials/_settings-panel.html -->

      <!-- partial -->
      @include('layouts.navbar')
      <script>
        // Check if a success message is present in the session
        @if (session('success'))
            Swal.fire({
                icon: 'success',
                title: 'Success!',
                text: '{{ session('success') }}',
            });
        @endif
    </script> 
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
                                  <div class="col-lg-12 grid-margin stretch-card">
                                    <div class="card">
                                      <div class="card-body">
                                        <h4 class="card-title">Kelola Schedule</h4>
                                        <p class="card-description">
                                          Data Master > Kelola Schedule
                                        </p>
                                        <div class="align-items-start">
                                          <button id="addDesaButton" class="button add-button"><i class="fas fa-plus"></i>&nbsp;&nbsp;Tambah Schedule</button>

                                          <script>
                                              document.getElementById("addDesaButton").addEventListener("click", function() {
                                                  window.location.href = "{{ route('schedule.add') }}";
                                              });
                                          </script>                                        
                                          </div>
                                          <div class="table-responsive">
                                            <table class="table table-striped">
                                                <thead>
                                                    <tr>
                                                        <th>
                                                            No
                                                        </th>
                                                        <th>
                                                            Nama Sensus
                                                        </th>
                                                        <th>
                                                          Nama Desa
                                                      </th>
                                                        <th>
                                                            Jadwal Mulai
                                                        </th>
                                                        <th>
                                                            Jadwal Selesai
                                                        <th>
                                                            Aksi
                                                        </th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                  @foreach ($schedules as $schedule)
                                                  <style>
                                                    tr.nonactive {
                                                    background-color: yellow;
                                                    }
                                                  </style>
                                                      <tr class="{{ $schedule->status == 1 ? 'bg-danger' : '' }}"> <!-- Added class for non-active question -->
                                                        <td class="py-1">
                                                              {{ $loop->iteration }}
                                                          </td>
                                                          <td>
                                                              {{ $schedule->census_name }}
                                                          </td>
                                                          <td>
                                                            {{ $schedule->village ? $schedule->village->village_name : 'N/A' }}
                                                          </td>
                                                          <td>
                                                              {{ $schedule->schedule }}
                                                          </td>
                                                          <td>
                                                            {{ $schedule->schedule_end }}
                                                          </td>
                                                          <td style="display: flex;">
                                                            <!-- Edit button -->
                                                            <button class="button edit-button" onclick="window.location.href = '{{ route('schedule.edit', ['census' => $schedule->id]) }}'">
                                                                <i class="fas fa-edit"></i>
                                                            </button>
                                                        
                                                            <!-- Toggle Activation button -->
                                                            <form action="{{ route('schedule.toggle', $schedule->id) }}" method="POST">
                                                                @csrf
                                                                <button type="submit" class="button {{ $schedule->status == 0 ? 'deactivate-button' : 'activate-button' }}">
                                                                    <i class="fas {{ $schedule->status == 0 ? 'fa-ban' : 'fa-check' }}"></i> {{ $schedule->status == 0 ? 'Nonaktifkan' : 'Aktifkan' }}
                                                                </button>
                                                            </form>
                                                        </td>
                                                                                                               
                                                      </tr>
                                                  @endforeach
                                              </tbody>
                                              
                                            </table>
                                        </div>                                        
                                      </div>
                                    </div>
                                  </div>
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>

@include('layouts.footer')
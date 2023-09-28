@include('layouts.header')
  <div class="container-scroller">
    <!-- partial:partials/_navbar.html -->
    @include('pages.navbarlogo')
    <!-- partial -->
    <div class="container-fluid page-body-wrapper">

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
                                        <h4 class="card-title">Kelola Desa</h4>
                                        <p class="card-description">
                                          Data Master > Kelola Desa
                                        </p>
                                        <div class="align-items-start">
                                          <button id="addDesaButton" class="button add-button"><i class="fas fa-plus"></i>&nbsp;&nbsp;Tambah Desa</button>

                                          <script>
                                              document.getElementById("addDesaButton").addEventListener("click", function() {
                                                  window.location.href = "{{ route('villages.add') }}";
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
                                                            Nama Desa
                                                        </th>
                                                        <th>
                                                            Alamat Desa
                                                        </th>
                                                        <th>
                                                            Data Dibuat Pada
                                                        </th>
                                                        <th>
                                                            Aksi
                                                        </th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                  @foreach ($villages as $village)
                                                      <tr>
                                                          <td class="py-1">
                                                              {{ $loop->iteration }}
                                                          </td>
                                                          <td>
                                                              {{ $village->village_name }}
                                                          </td>
                                                          <td>
                                                              {{ $village->address }}
                                                          </td>
                                                          <td>
                                                              {{ $village->created_at->format('d F Y') }}
                                                          </td>
                                                          <td style="display: flex;">
                                                            <!-- Edit button -->
                                                            <button class="button edit-button" onclick="window.location.href = '{{ route('villages.edit', ['village' => $village->id]) }}'">
                                                                <i class="fas fa-edit"></i>
                                                            </button>
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
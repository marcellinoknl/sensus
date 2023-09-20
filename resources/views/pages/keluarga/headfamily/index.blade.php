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
                                        <h4 class="card-title">Kelola Nama Keluarga</h4>
                                        <p class="card-description">
                                          Data Master > Kelola Nama Keluarga
                                        </p>
                                        <div class="align-items-start">
                                          <button id="addDesaButton" class="button add-button"><i class="fas fa-plus"></i>&nbsp;&nbsp;Tambah Nama Keluarga</button>

                                          <script>
                                              document.getElementById("addDesaButton").addEventListener("click", function() {
                                                  window.location.href = "{{ route('headfamily.add') }}";
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
                                                            NIK Keluarga
                                                        </th>
                                                        <th>
                                                          Nama Keluarga
                                                        </th>
                                                        <th>Kuesioner</th>
                                                        <th>
                                                            Aksi
                                                        </th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                  @foreach ($head_of_families as $head_of_family)
                                                      <tr>
                                                          <td class="py-1">
                                                              {{ $loop->iteration }}
                                                          </td>
                                                          <td>
                                                              {{ $head_of_family->census ? $head_of_family->census->census_name : 'N/A' }}
                                                          </td>
                                                          <td>
                                                              {{ $head_of_family->village ? $head_of_family->village->village_name : 'N/A' }}
                                                          </td>
                                                          <td>
                                                            {{ $head_of_family->number_of_family_card }}
                                                          </td>
                                                          <td>
                                                            {{ $head_of_family->nama_keluarga }}
                                                          </td>
                                                          <td>
                                                            @if($head_of_family->status_sensus == 0)
                                                                <a href="{{ route('kuesioner.index', ['headfamily' => $head_of_family->id]) }}" class="button census-button btn-success">
                                                                    Isi census
                                                                </a>
                                                            @else
                                                            <span>Sensus telah di isi. <a href="{{ route('kuesioner.detail', ['headfamily' => $head_of_family->id]) }}">lihat</a></span>
                                                            @endif
                                                        </td>
                                                        
                                                          <td style="display: flex;">
                                                            <!-- Edit button -->
                                                            <button class="button edit-button" onclick="window.location.href = '{{ route('headfamily.edit', ['headfamily' => $head_of_family->id]) }}'">
                                                              <i class="fas fa-edit"></i>
                                                            </button>
                                                        
                                                            <!-- Delete button (No confirmation) -->
                                                            <form action="{{ route('headfamily.destroy', $head_of_family->id) }}" method="POST">
                                                                @csrf
                                                                @method('DELETE')
                                                                <button type="submit" class="button delete-button">
                                                                    <i class="fas fa-trash-alt"></i>
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
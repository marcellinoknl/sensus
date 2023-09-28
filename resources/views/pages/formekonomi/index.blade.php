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
                                            <h4 class="card-title">Kelola Pertanyaan Sensus</h4>
                                            <p class="card-description">Data Master > Kelola Pertanyaan Sensus</p>
                                            <div class="align-items-start">
                                                <button type="button" class="button add-button" onclick="window.location.href = '{{ route('pertanyaan.add') }}'">
                                                    <i class="fas fa-plus"></i>&nbsp;&nbsp;Tambah Pertanyaan
                                                </button>
                                            </div>
                                            <div class="table-responsive">
                                                <table class="table table-striped">
                                                    <thead>
                                                        <tr>
                                                            <th>No</th>
                                                            <th>Pertanyaan</th>
                                                            <th>Aksi</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        @foreach ($questions as $question)
                                                        <tr>
                                                            <td class="py-1">{{ $loop->iteration }}</td>
                                                            <td>{{ $question->question }}</td>
                                                            <td style="display: flex;">
                                                              <!-- Edit button -->
                                                              <form action="{{ route('pertanyaan.edit', ['pertanyaan' => $question->id]) }}" method="get">
                                                                  <button type="submit" class="button edit-button">
                                                                      <i class="fas fa-edit"></i>
                                                                  </button>
                                                              </form>                                                              
                                                          
                                                              <!-- Delete button (No confirmation) -->
                                                              {{-- <form action="{{ route('pertanyaan.destroy', ['pertanyaan' => $question->id]) }}" method="POST">
                                                                  @csrf
                                                                  @method('DELETE')
                                                                  <button type="submit" class="button delete-button">
                                                                      <i class="fas fa-trash-alt"></i>
                                                                  </button>
                                                              </form> --}}
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
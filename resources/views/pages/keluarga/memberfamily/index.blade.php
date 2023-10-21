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
                                            <h4 class="card-title">Kelola Anggota Keluarga</h4>
                                            <p class="card-description">Data Master > Kelola Anggota Keluarga</p>
                                            <div class="align-items-start">
                                                <button type="button" class="button add-button" onclick="window.location.href = '{{ route('familymember.add') }}'">
                                                    <i class="fas fa-plus"></i>&nbsp;&nbsp;Tambah Anggota Keluarga
                                                </button>
                                                <form action="{{ route('familymember.import') }}" method="POST" enctype="multipart/form-data">
                                                  @csrf
                                                  <input type="file" name="file">
                                                  <button type="submit">Import</button>
                                              </form>                                              
                                              
                                            </div>
                                            <div class="table-responsive">
                                                <table class="table table-striped">
                                                    <thead>
                                                        <tr>
                                                            <th>No</th>
                                                            <th>Nama Keluarga</th>
                                                            <th>NIK</th>
                                                            <th>Alamat</th>
                                                            <th>Nama Lengkap</th>
                                                            <th>Pendidikan Terakhir</th>
                                                            <th>Jenis Pekerjaan</th>
                                                            <th>Suku Etnis</th>
                                                            <th>Kewarganegaraan</th>
                                                            <th>Umur</th>
                                                            <th>Jenis Kelamin</th>
                                                            <th>Agama</th>
                                                            <th>Status Hubungan Dalam Keluarga</th>
                                                            <th>Tanggal Lahir</th>
                                                            <th>Tempat Lahir</th>
                                                            <th>Nomor Telepon</th>
                                                            <th>Status Pernikahan</th>
                                                            <th>Aksi</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        @foreach ($familyMembers as $familyMember)
                                                        <tr>
                                                            <td class="py-1">{{ $loop->iteration }}</td>
                                                            <td>{{$familyMember->head_of_family->nama_keluarga}}</td>
                                                            <td>{{ $familyMember->NIK }}</td>
                                                            <td>{{ $familyMember->address }}</td>
                                                            <td>{{ $familyMember->full_name }}</td>
                                                            <td>{{ $familyMember->last_education }}</td>
                                                            <td>{{ $familyMember->type_of_work }}</td>
                                                            <td>{{ $familyMember->etnic }}</td>
                                                            <td>{{ $familyMember->citizenship }}</td>
                                                            <td>{{ $familyMember->age }}</td>
                                                            <td>{{ $familyMember->gender }}</td>
                                                            <td>{{ $familyMember->religion }}</td>
                                                            <td>{{ $familyMember->relationship_status_in_the_family }}</td>
                                                            <td>{{ $familyMember->date_of_birth }}</td>
                                                            <td>{{ $familyMember->place_of_birth }}</td>
                                                            <td>{{ $familyMember->phone_number }}</td>
                                                            <td>{{ $familyMember->marital_status }}</td>
                                                            <td style="display: flex;">
                                                              <!-- Edit button -->
                                                              <form action="{{ route('familymember.edit', ['familymember' => $familyMember->id]) }}" method="get" style="display: inline-block;">
                                                                <button type="submit" class="button edit-button">
                                                                    <i class="fas fa-edit"></i>
                                                                </button>
                                                            </form>   
                                                            <button type="button" class="button delete-button" data-toggle="modal" data-target="#deleteConfirmationModal" data-action="{{ route('familymember.destroy', ['familymember' => $familyMember->id]) }}">
                                                              <i class="fas fa-trash-alt"></i>
                                                            </button>
                                                            
                                                            <div class="modal fade" id="deleteConfirmationModal" tabindex="-1" role="dialog" aria-labelledby="deleteConfirmationModalLabel" aria-hidden="true">
                                                              <div class="modal-dialog" role="document">
                                                                <div class="modal-content">
                                                                  <div class="modal-header">
                                                                    <h5 class="modal-title" id="deleteConfirmationModalLabel">Konfirmasi Menghapus Anggota Keluarga</h5>
                                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                      <span aria-hidden="true">&times;</span>
                                                                    </button>
                                                                  </div>
                                                                  <div class="modal-body">
                                                                    Apakah Anda yakin untuk menghapus data ini?
                                                                  </div>
                                                                  <div class="modal-footer">
                                                                    <button type="button" class="btn btn-secondary" style="width: 100px;" data-dismiss="modal">Batal</button>
                                                                    <form id="deleteForm" action="{{ route('familymember.destroy', ['familymember' => $familyMember->id]) }}" method="POST">
                                                                      @csrf
                                                                      @method('DELETE')
                                                                      <button type="submit" class="btn btn-danger" style="width: 100px;">Hapus</button>
                                                                    </form>                                                                    
                                                                  </div>
                                                                </div>
                                                              </div>
                                                            </div>
                                                            
                                                            <script>
                                                              $(document).ready(function () {
                                                                $('#deleteConfirmationModal').on('show.bs.modal', function (event) {
                                                                  var button = $(event.relatedTarget);
                                                                  var action = button.data('action');
                                                                  var form = $('#deleteForm');
                                                                  form.attr('action', action);
                                                                });
                                                              });
                                                            </script>                                                                                                 
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
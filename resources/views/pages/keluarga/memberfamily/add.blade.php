@include('layouts.header')
@include('_alerts')
  <div class="container-scroller">
    <!-- partial:partials/_navbar.html -->
    @include('pages.navbarlogo')
    <!-- partial -->
    <div class="container-fluid page-body-wrapper">
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
                                  <div class="col-lg-12 grid-margin stretch-card">
                                    <div class="card">
                                      <div class="card-body">
                                        <h4 class="card-title">Tambah Nama Anggota Keluarga</h4>
                                        <p class="card-description">
                                          Data Master > Kelola Anggota Keluarga > Tambah Nama Anggota Keluarga
                                        </p>
                                        <form method="POST" action="{{ route('familymember.store')}}" class="forms-sample">
                                            @csrf <!-- Add the CSRF token -->
                                            <div class="form-group row">
                                                <label for="head_of_family_id" class="col-sm-3 col-form-label">Nama Keluarga</label>
                                                <div class="col-sm-5">
                                                    <select class="form-control" id="head_of_family_id" name="head_of_family_id">
                                                        <option disabled selected value="">Pilih Nama Keluarga</option>
                                                        @foreach ($headFamilyMembers as $headFamilyMember)
                                                            <option value="{{ $headFamilyMember->id }}">{{ $headFamilyMember->nama_keluarga }} - {{ $headFamilyMember->number_of_family_card }}</option>
                                                        @endforeach
                                                    </select>
                                                    @error('head_of_family_id')
                                                        <div class="text-danger">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="NIK" class="col-sm-3 col-form-label">NIK</label>
                                                <div class="col-sm-5">
                                                    <input type="text" class="form-control" id="NIK" name="NIK" placeholder="NIK">
                                                    @error('NIK')
                                                        <div class="text-danger">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="address" class="col-sm-3 col-form-label">Alamat</label>
                                                <div class="col-sm-9">
                                                    <input type="text" class="form-control" id="address" name="address" placeholder="Alamat">
                                                    @error('address')
                                                        <div class="text-danger">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="full_name" class="col-sm-3 col-form-label">Nama Lengkap</label>
                                                <div class="col-sm-9">
                                                    <input type="text" class="form-control" id="full_name" name="full_name" placeholder="Nama Lengkap">
                                                    @error('full_name')
                                                        <div class="text-danger">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="last_education" class="col-sm-3 col-form-label">Pendidikan Terakhir</label>
                                                <div class="col-sm-9">
                                                    <input type="text" class="form-control" id="last_education" name="last_education" placeholder="Pendidikan Terakhir">
                                                    @error('last_education')
                                                        <div class="text-danger">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="type_of_work" class="col-sm-3 col-form-label">Jenis Pekerjaan</label>
                                                <div class="col-sm-9">
                                                    <input type="text" class="form-control" id="type_of_work" name="type_of_work" placeholder="Jenis Pekerjaan">
                                                    @error('type_of_work')
                                                        <div class="text-danger">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="etnic" class="col-sm-3 col-form-label">Suku Etnis</label>
                                                <div class="col-sm-9">
                                                    <input type="text" class="form-control" id="etnic" name="etnic" placeholder="Suku Etnis">
                                                    @error('etnic')
                                                        <div class="text-danger">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="citizenship" class="col-sm-3 col-form-label">Kewarganegaraan</label>
                                                <div class="col-sm-9">
                                                    <input type="text" class="form-control" id="citizenship" name="citizenship" placeholder="Kewarganegaraan">
                                                    @error('citizenship')
                                                        <div class="text-danger">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="age" class="col-sm-3 col-form-label">Umur</label>
                                                <div class="col-sm-3">
                                                    <input type="number" class="form-control" id="age" name="age" placeholder="Umur">
                                                    @error('age')
                                                        <div class="text-danger">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="gender" class="col-sm-3 col-form-label">Jenis Kelamin</label>
                                                <div class="col-sm-5">
                                                    <select class="form-control" id="gender" name="gender">
                                                        <option disabled selected value="">Pilih Jenis Kelamin</option>
                                                        <option value="Male">Male</option>
                                                        <option value="Female">Female</option>
                                                        <option value="Other">Other</option>
                                                    </select>
                                                    @error('gender')
                                                        <div class="text-danger">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="religion" class="col-sm-3 col-form-label">Agama</label>
                                                <div class="col-sm-9">
                                                    <input type="text" class="form-control" id="religion" name="religion" placeholder="Agama">
                                                    @error('religion')
                                                        <div class="text-danger">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="relationship_status_in_the_family" class="col-sm-3 col-form-label">Status Hubungan Dalam Keluarga</label>
                                                <div class="col-sm-9">
                                                    <input type="text" class="form-control" id="relationship_status_in_the_family" name="relationship_status_in_the_family" placeholder="Status Hubungan Dalam Keluarga">
                                                    @error('relationship_status_in_the_family')
                                                        <div class="text-danger">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="date_of_birth" class="col-sm-3 col-form-label">Tanggal Lahir</label>
                                                <div class="col-sm-5">
                                                    <input type="date" class="form-control" id="date_of_birth" name="date_of_birth">
                                                    @error('date_of_birth')
                                                        <div class="text-danger">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="place_of_birth" class="col-sm-3 col-form-label">Tempat Lahir</label>
                                                <div class="col-sm-9">
                                                    <input type="text" class="form-control" id="place_of_birth" name="place_of_birth" placeholder="Tempat Lahir">
                                                    @error('place_of_birth')
                                                        <div class="text-danger">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="phone_number" class="col-sm-3 col-form-label">Nomor Telepon</label>
                                                <div class="col-sm-9">
                                                    <input type="text" class="form-control" id="phone_number" name="phone_number" placeholder="Nomor Telepon">
                                                    @error('phone_number')
                                                        <div class="text-danger">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                              <label for="marital_status" class="col-sm-3 col-form-label">Status Pernikahan</label>
                                              <div class="col-sm-5">
                                                  <select class="form-control" id="marital_status" name="marital_status">
                                                    <option disabled selected value="">Pilih Status Pernikahan</option>
                                                      <option value="Sudah Menikah">Sudah Menikah</option>
                                                      <option value="Belum Menikah">Belum Menikah</option>
                                                  </select>
                                                  @error('marital_status')
                                                      <div class="text-danger">{{ $message }}</div>
                                                  @enderror
                                              </div>
                                          </div>                                          
                                            <button type="submit" class="btn btn-success me-2">Tambahkan</button>
                                            <button type="button" class="btn btn-danger" onclick="cancel()">Batal</button>
                                            <script>
                                                function cancel() {
                                                    window.location.href = "{{ route('familymember.index') }}";
                                                }
                                            </script>
                                        </form>                                        
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
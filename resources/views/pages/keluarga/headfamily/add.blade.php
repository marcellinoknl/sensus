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
                                        <h4 class="card-title">Tambah Nama Keluarga</h4>
                                        <p class="card-description">
                                          Data Master > Kelola Nama Keluarga > Tambah Nama Keluarga
                                        </p>
                                        <form method="POST" action="{{ route('headfamily.store') }}" class="forms-sample">
                                            @csrf <!-- Add the CSRF token -->
                                            <div class="form-group row">
                                                <label for="census_id" class="col-sm-3 col-form-label">Census Name</label>
                                                <div class="col-sm-9">
                                                    <select class="form-control" id="census_id" name="census_id">
                                                        <option disabled selected value="">Select Census Name</option>
                                                        @foreach ($censuses as $census)
                                                            <option value="{{ $census->id }}">{{ $census->census_name }}</option>
                                                        @endforeach
                                                    </select>
                                                    @error('census_id')
                                                        <div class="text-danger">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="village_id" class="col-sm-3 col-form-label">Village Name</label>
                                                <div class="col-sm-9">
                                                    <select class="form-control" id="village_id" name="village_id">
                                                        <option disabled selected value="">Select Village Name</option>
                                                        @foreach ($villages as $village)
                                                            <option value="{{ $village->id }}">{{ $village->village_name }}</option>
                                                        @endforeach
                                                    </select>
                                                    @error('village_id')
                                                        <div class="text-danger">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="number_of_family_card" class="col-sm-3 col-form-label">NIK KK</label>
                                                <div class="col-sm-9">
                                                    <input type="text" class="form-control" id="number_of_family_card" name="number_of_family_card" placeholder="Number of Family Card">
                                                    @error('number_of_family_card')
                                                        <div class="text-danger">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="nama_keluarga" class="col-sm-3 col-form-label">Nama Keluarga</label>
                                                <div class="col-sm-9">
                                                    <input type="text" class="form-control" id="nama_keluarga" name="nama_keluarga" placeholder="Nama Keluarga">
                                                    @error('nama_keluarga')
                                                        <div class="text-danger">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                              <label for="pendapatan" class="col-sm-3 col-form-label">Pendapatan</label>
                                              <div class="col-sm-9">
                                                  <input type="number" class="form-control" id="pendapatan" name="pendapatan" placeholder="Pendapatan">
                                                  @error('pendapatan')
                                                      <div class="text-danger">{{ $message }}</div>
                                                  @enderror
                                              </div>
                                          </div>
                                          
                                          <div class="form-group row">
                                              <label for="pengeluaran" class="col-sm-3 col-form-label">Pengeluaran</label>
                                              <div class="col-sm-9">
                                                  <input type="number" class="form-control" id="pengeluaran" name="pengeluaran" placeholder="Pengeluaran">
                                                  @error('pengeluaran')
                                                      <div class="text-danger">{{ $message }}</div>
                                                  @enderror
                                              </div>
                                          </div>
                                          
                                            <button type="submit" class="btn btn-success me-2">Tambahkan</button>
                                            <button type="button" class="btn btn-danger" onclick="cancel()">Batal</button>
                                            <script>
                                                function cancel() {
                                                    window.location.href = "{{ route('headfamily') }}";
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
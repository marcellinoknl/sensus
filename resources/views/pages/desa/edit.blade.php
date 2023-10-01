@include('layouts.header')
@include('_alerts')
  <div class="container-scroller">
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
                                        <h4 class="card-title">Tambah Data Desa</h4>
                                        <p class="card-description">
                                          Data Master > Kelola Desa > Tambah Desa
                                        </p>
                                        <form method="POST" action="{{ route('villages.update', ['village' => $villageData->id]) }}" class="forms-sample">
                                            @csrf
                                            @method('PUT') <!-- Use the PUT method for editing -->
                                            <div class="form-group row">
                                                <label for="village_name" class="col-sm-3 col-form-label">Nama Desa</label>
                                                <div class="col-sm-9">
                                                    <input type="text" class="form-control" id="village_name" name="village_name" placeholder="Masukkan Nama Desa" value="{{ $villageData->village_name }}">
                                                    @error('village_name')
                                                        <div class="text-danger">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="address" class="col-sm-3 col-form-label">Alamat Desa</label>
                                                <div class="col-sm-9">
                                                    <input type="text" class="form-control" id="address" name="address" placeholder="Masukkan Alamat Desa" value="{{ $villageData->address }}">
                                                    @error('address')
                                                        <div class="text-danger">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                            </div>
                                            <input type="hidden" name="village_id" value="{{ $villageData->id }}"> <!-- Add a hidden input for the village ID -->
                                            <button type="submit" class="btn btn-success me-2">Ubah</button> <!-- Change the button text to "Update" -->
                                            <button type="button" class="btn btn-danger" onclick="cancel()">Batal</button>
                                            <script>
                                                function cancel() {
                                                    window.location.href = "{{ route('desa') }}";
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
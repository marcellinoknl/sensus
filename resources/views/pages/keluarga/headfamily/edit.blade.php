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
                                            <h4 class="card-title">Edit Nama Keluarga</h4>
                                            <p class="card-description">
                                                Data Master > Kelola Nama Keluarga > Edit Nama Keluarga
                                            </p>
                                            <form method="POST" action="{{ route('headfamily.update', $head_of_family->id) }}" class="forms-sample">
                                                @csrf <!-- Add the CSRF token -->
                                                @method('PUT') <!-- Use the PUT method for updating -->
                                            
                                                <div class="form-group row">
                                                    <label for="census_id" class="col-sm-3 col-form-label">Census Name</label>
                                                    <div class="col-sm-9">
                                                        <select class="form-control" id="census_id" name="census_id">
                                                            <option disabled value="">Select Census Name</option>
                                                            @foreach ($censuses as $census)
                                                                <option value="{{ $census->id }}" {{ $head_of_family->census_id == $census->id ? 'selected' : '' }}>
                                                                    {{ $census->census_name }}
                                                                </option>
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
                                                            <option disabled value="">Select Village Name</option>
                                                            @foreach ($villages as $village)
                                                                <option value="{{ $village->id }}" {{ $head_of_family->village_id == $village->id ? 'selected' : '' }}>
                                                                    {{ $village->village_name }}
                                                                </option>
                                                            @endforeach
                                                        </select>
                                                        @error('village_id')
                                                            <div class="text-danger">{{ $message }}</div>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label for="number_of_family_card" class="col-sm-3 col-form-label">Number of Family Card</label>
                                                    <div class="col-sm-9">
                                                        <input type="text" class="form-control" id="number_of_family_card" name="number_of_family_card" placeholder="Number of Family Card" value="{{ $head_of_family->number_of_family_card }}">
                                                        @error('number_of_family_card')
                                                            <div class="text-danger">{{ $message }}</div>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label for="nama_keluarga" class="col-sm-3 col-form-label">Nama Keluarga</label>
                                                    <div class="col-sm-9">
                                                        <input type="text" class="form-control" id="nama_keluarga" name="nama_keluarga" placeholder="Nama Keluarga" value="{{ $head_of_family->nama_keluarga }}">
                                                        @error('nama_keluarga')
                                                            <div class="text-danger">{{ $message }}</div>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <button type="submit" class="btn btn-success me-2">Ubah</button>
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
@include('layouts.header')
@include('_alerts')
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
                                  <div class="col-lg-12 grid-margin stretch-card">
                                    <div class="card">
                                        <div class="card-body">
                                            <h4 class="card-title">Edit Schedule Sensus</h4>
                                            <p class="card-description">
                                                Data Master > Kelola Schedule > Edit Schedule
                                            </p>
                                            <form method="POST" action="{{ route('schedule.update', $scheduleData->id) }}" class="forms-sample">
                                                @csrf
                                                @method('PUT')
                                        
                                                <div class="form-group row">
                                                    <label for="census_name" class="col-sm-3 col-form-label">Census Name</label>
                                                    <div class="col-sm-9">
                                                        <input type="text" class="form-control" id="census_name" name="census_name" value="{{ $scheduleData->census_name }}" placeholder="Census Name">
                                                        @error('census_name')
                                                            <div class="text-danger">{{ $message }}</div>
                                                        @enderror
                                                    </div>
                                                </div>
                                        
                                                <div class="form-group row">
                                                    <label for="schedule" class="col-sm-3 col-form-label">Schedule</label>
                                                    <div class="col-sm-9">
                                                        <input type="date" class="form-control" id="schedule" name="schedule" value="{{ convertIndonesianDateToCarbon($scheduleData->schedule)->format('Y-m-d') }}" style="width: 190px;">
                                                        @error('schedule')
                                                            <div class="text-danger">{{ $message }}</div>
                                                        @enderror
                                                    </div>
                                                </div>
                                        
                                                <div class="form-group row">
                                                    <label for="village_id" class="col-sm-3 col-form-label">Desa (Village)</label>
                                                    <div class="col-sm-9">
                                                        <select class="form-control" id="village_id" name="village_id">
                                                            <option disabled value="">Pilih Desa</option>
                                                            @foreach ($villages as $village)
                                                                    <option value="{{ $village->id }}" {{ $village->id == $scheduleData->village_id ? 'selected' : '' }}>{{ $village->village_name }}</option>
                                                                @endforeach

                                                        </select>
                                                        @error('village_id')
                                                            <div class="text-danger">{{ $message }}</div>
                                                        @enderror
                                                    </div>
                                                </div>
                                        
                                                <button type="submit" class="btn btn-success me-2">Ubah</button>
                                                <button type="button" class="btn btn-danger" onclick="cancel()">Batal</button>
                                                <script>
                                                    function cancel() {
                                                        window.location.href = "{{ route('schedule') }}";
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
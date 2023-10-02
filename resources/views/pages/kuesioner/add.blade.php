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
                                                @if($question->where('status', 0)->isEmpty())
                                                    <p>Anda belum membuat pertanyaan sensus.</p>
                                                @else
                                                    <h4 class="card-title">Isi Sensus Keluarga {{ $familyName->nama_keluarga }}</h4>
                                                    <p class="card-description">
                                                        Data Master > Isi Data Sensus Keluarga
                                                    </p>
                                                    <form method="POST" action="{{ route('store.answers') }}">
                                                        @csrf
                                                        <input type="hidden" name="headfamily" value="{{ $familyName->id }}">
                            
                                                        @error('headfamily')
                                                            <div class="alert alert-danger">{{ $message }}</div>
                                                        @enderror
                            
                                                        @foreach($question as $q)
                                                            @if($q->status == 0)
                                                                <div class="form-group">
                                                                    <label for="question_{{ $q->id }}">{{ $q->question }}</label>
                                                                    @if($q->input_type === 'isian')
                                                                        <input type="text" class="form-control @error('answers.' . $q->id) is-invalid @enderror" name="answers[{{ $q->id }}]">
                                                                        @error('answers.' . $q->id)
                                                                            <span class="invalid-feedback" role="alert">
                                                                                <strong>{{ $message }}</strong>
                                                                            </span>
                                                                        @enderror
                                                                    @elseif($q->input_type === 'dropdown')
                                                                        <select class="form-control @error('answers.' . $q->id) is-invalid @enderror" name="answers[{{ $q->id }}]">
                                                                            <option disabled selected value="">Pilih Opsi</option>
                                                                            @foreach(json_decode($q->options) as $option)
                                                                                <option value="{{ $option }}">{{ $option }}</option>
                                                                            @endforeach
                                                                        </select>
                                                                        @error('answers.' . $q->id)
                                                                            <span class="invalid-feedback" role="alert">
                                                                                <strong>{{ $message }}</strong>
                                                                            </span>
                                                                        @enderror
                                                                    @endif
                                                                </div>
                                                            @endif
                                                        @endforeach
                            
                                                        <button type="submit" class="btn btn-primary">Kirimkan</button>
                                                    </form>
                                                @endif
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
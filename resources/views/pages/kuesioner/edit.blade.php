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
                                                <h4 class="card-title">Isi Sensus Keluarga {{ $familyName->nama_keluarga }}</h4>
                                                <p class="card-description">
                                                    Data Master > Isi Data Sensus Keluarga
                                                </p>
                                                <form method="POST" action="{{ route('update.answers') }}">
                                                    @csrf
                                                    @method('PUT') {{-- Use PUT method for updating --}}
                                                    <input type="hidden" name="headfamily" value="{{ $familyName->id }}">
                                                    @foreach($question as $q)
                                                        <div class="form-group">
                                                            <label for="question_{{ $q->id }}">{{ $q->question }}</label>
                                                            @if($q->input_type === 'isian')
                                                                <input type="text" class="form-control" name="answers[{{ $q->id }}]"
                                                                       value="{{ $answers->where('question_id', $q->id)->first()->answer ?? '' }}">
                                                            @elseif($q->input_type === 'dropdown')
                                                                <select class="form-control" name="answers[{{ $q->id }}]">
                                                                    @foreach(json_decode($q->options) as $option)
                                                                        <option value="{{ $option }}"
                                                                                {{ optional($answers->where('question_id', $q->id)->first())->answer === $option ? 'selected' : '' }}>
                                                                            {{ $option }}
                                                                        </option>
                                                                    @endforeach
                                                                </select>
                                                            @endif
                                                        </div>
                                                    @endforeach
                                                    <button type="submit" class="btn btn-primary">Update</button>
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
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
                                        <h4 class="card-title">Edit Pertanyaan Sensus</h4>
                                        <p class="card-description">
                                          Data Master > Kelola Pertanyaan > Edit Pertanyaan Sensus
                                        </p>
                                        <form method="POST" action="{{ route('pertanyaan.update', ['pertanyaan' => $question->id]) }}" class="forms-sample">
                                          @csrf <!-- Add the CSRF token -->
                                          @method('PUT') <!-- Use the PUT method for updating -->
                                          <div class="form-group row">
                                              <label for="question" class="col-sm-3 col-form-label">Pertanyaan Sensus</label>
                                              <div class="col-sm-9">
                                                  <input type="text" class="form-control" id="question" name="question" value="{{ $question->question }}" placeholder="Masukkan Pertanyaan">
                                                  @error('question')
                                                      <div class="text-danger">{{ $message }}</div>
                                                  @enderror
                                              </div>
                                          </div>
                                          <div class="form-group row">
                                              <label for="input_type" class="col-sm-3 col-form-label">Tipe Input</label>
                                              <div class="col-sm-9">
                                                  <select class="form-control" id="input_type" name="input_type">
                                                      <option value="isian" {{ $question->input_type === 'isian' ? 'selected' : '' }}>Isian</option>
                                                      <option value="dropdown" {{ $question->input_type === 'dropdown' ? 'selected' : '' }}>Dropdown</option>
                                                  </select>
                                              </div>
                                          </div>
                                          <div class="form-group row" id="options-container">
                                              <label for="options" class="col-sm-3 col-form-label">Opsi</label>
                                              <div class="col-sm-9">
                                                  <!-- Render existing options here -->
                                                  @if ($question->input_type === 'dropdown')
                                                      @foreach (json_decode($question->options) as $option)
                                                          <div class="input-group mb-2">
                                                              <input type="text" class="form-control" name="options[]" value="{{ $option }}" placeholder="Masukkan Opsi">
                                                              <button type="button" class="btn btn-danger" onclick="removeOption(this)">Hapus Opsi</button>
                                                          </div>
                                                      @endforeach
                                                  @endif
                                                  <button type="button" class="btn btn-primary" id="add-option">Tambahkan Opsi</button>
                                              </div>
                                          </div>
                                          <button type="submit" class="btn btn-success me-2">Ubah</button>
                                          <button type="button" class="btn btn-danger" onclick="cancel()">Batal</button>
                                      </form>
                                      
                                      <script>
                                          document.addEventListener('DOMContentLoaded', function() {
                                              const addOptionButton = document.getElementById('add-option');
                                              const optionsContainer = document.getElementById('options-container');
                                              const inputTypeSelect = document.getElementById('input_type');
                                      
                                              // Handle initial state based on the input type
                                              toggleOptionsVisibility(inputTypeSelect.value);
                                      
                                              addOptionButton.addEventListener('click', function() {
                                                  const newOptionInput = document.createElement('div');
                                                  newOptionInput.className = 'input-group mb-2';
                                                  newOptionInput.innerHTML = `
                                                      <input type="text" class="form-control" name="options[]" placeholder="Masukkan Opsi">
                                                      <button type="button" class="btn btn-danger" onclick="removeOption(this)">Hapus Opsi</button>
                                                  `;
                                      
                                                  optionsContainer.appendChild(newOptionInput);
                                              });
                                      
                                              inputTypeSelect.addEventListener('change', function() {
                                                  toggleOptionsVisibility(this.value);
                                              });
                                          });
                                      
                                          function toggleOptionsVisibility(inputType) {
                                              const optionsContainer = document.getElementById('options-container');
                                      
                                              if (inputType === 'dropdown') {
                                                  optionsContainer.style.display = 'block';
                                              } else {
                                                  optionsContainer.style.display = 'none';
                                              }
                                          }
                                      
                                          function removeOption(button) {
                                              const optionInput = button.previousElementSibling;
                                              const optionInputGroup = button.parentElement;
                                              optionInputGroup.remove();
                                          }
                                      
                                          function cancel() {
                                              window.location.href = "{{ route('pertanyaan.index') }}";
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
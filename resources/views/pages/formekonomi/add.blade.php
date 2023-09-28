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
                                        <h4 class="card-title">Tambah Pertanyaan Sensus</h4>
                                        <p class="card-description">
                                          Data Master > Kelola Pertanyaan > Tambah Pertanyaan Sensus
                                        </p>
                                        <form method="POST" action="{{ route('pertanyaan.store') }}" class="forms-sample">
                                          @csrf <!-- Add the CSRF token -->
                                          <div class="form-group row">
                                              <label for="village_name" class="col-sm-3 col-form-label">Pertanyaan Sensus</label>
                                              <div class="col-sm-9">
                                                  <input type="text" class="form-control" id="question" name="question" placeholder="Masukkan Pertanyaan">
                                                  @error('question')
                                                      <div class="text-danger">{{ $message }}</div>
                                                  @enderror
                                              </div>
                                          </div>
                                          <div class="form-group row">
                                            <label for="input_type" class="col-sm-3 col-form-label">Tipe Input</label>
                                            <div class="col-sm-9">
                                                <select class="form-control" id="input_type" name="input_type">
                                                    <option value="" disabled selected>Pilih Jenis Inputan</option>
                                                    <option value="isian">Isian</option>
                                                    <option value="dropdown">Dropdown</option>
                                                </select>
                                                @error('input_type')
                                                    <div class="text-danger">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                          <div class="form-group row" id="opsi-group" style="display: none;">
                                              <label for="options" class="col-sm-3 col-form-label">Opsi</label>
                                              <div class="col-sm-9">
                                                  <input type="text" class="form-control" id="options" name="options[]" placeholder="Masukkan Opsi">
                                                  <div id="options-container"></div>
                                                  <button type="button" class="btn btn-primary mt-2" id="add-option">Tambahkan Opsi</button>
                                              </div>
                                          </div>
                                          <script>
                                              document.addEventListener('DOMContentLoaded', function() {
                                                  const inputTypeSelect = document.getElementById('input_type');
                                                  const opsiGroup = document.getElementById('opsi-group');
                                                  const addOptionButton = document.getElementById('add-option');
                                                  const optionsContainer = document.getElementById('options-container');
                                      
                                                  inputTypeSelect.addEventListener('change', function() {
                                                      if (inputTypeSelect.value === 'dropdown') {
                                                          opsiGroup.style.display = 'block';
                                                      } else {
                                                          opsiGroup.style.display = 'none';
                                                          // Clear any existing options
                                                          optionsContainer.innerHTML = '';
                                                      }
                                                  });
                                      
                                                  addOptionButton.addEventListener('click', function() {
                                                      const newOptionInput = document.createElement('input');
                                                      newOptionInput.type = 'text';
                                                      newOptionInput.className = 'form-control mt-2';
                                                      newOptionInput.name = 'options[]';
                                                      newOptionInput.placeholder = 'Masukkan Opsi';
                                      
                                                      const removeOptionButton = document.createElement('button');
                                                      removeOptionButton.type = 'button';
                                                      removeOptionButton.className = 'btn btn-danger mt-2';
                                                      removeOptionButton.innerText = 'Hapus Opsi';
                                                      removeOptionButton.addEventListener('click', function() {
                                                          optionsContainer.removeChild(newOptionInput);
                                                          optionsContainer.removeChild(removeOptionButton);
                                                      });
                                      
                                                      optionsContainer.appendChild(newOptionInput);
                                                      optionsContainer.appendChild(removeOptionButton);
                                                  });
                                              });
                                      
                                              function cancel() {
                                                  window.location.href = "{{ route('pertanyaan.index') }}";
                                              }
                                          </script>
                                          <button type="submit" class="btn btn-success me-2">Tambahkan</button>
                                          <button type="button" class="btn btn-danger" onclick="cancel()">Batal</button>
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
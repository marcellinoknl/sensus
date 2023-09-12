@include('layouts.header')
@include('_alerts')
  <div class="container-scroller">
    <!-- partial:partials/_navbar.html -->
    <nav class="navbar default-layout col-lg-12 col-12 p-0 fixed-top d-flex align-items-top flex-row">
      <div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-start">
        <div class="me-3">
          <button class="navbar-toggler navbar-toggler align-self-center" type="button" data-bs-toggle="minimize">
            <span class="icon-menu"></span>
          </button>
        </div>
        <div>
          <a class="navbar-brand brand-logo" href="index.html">
            <img src="" alt="logo" />
          </a>
          <a class="navbar-brand brand-logo-mini" href="index.html">
            <img src="images/logo-mini.svg" alt="logo" />
          </a>
        </div>
      </div>
      @include('layouts.horizontaltab')
    </nav>
    <!-- partial -->
    <div class="container-fluid page-body-wrapper">
      <!-- partial:partials/_settings-panel.html -->
      <div class="theme-setting-wrapper">
        <div id="settings-trigger"><i class="ti-settings"></i></div>
        <div id="theme-settings" class="settings-panel">
          <i class="settings-close ti-close"></i>
          <p class="settings-heading">SIDEBAR SKINS</p>
          <div class="sidebar-bg-options selected" id="sidebar-light-theme"><div class="img-ss rounded-circle bg-light border me-3"></div>Light</div>
          <div class="sidebar-bg-options" id="sidebar-dark-theme"><div class="img-ss rounded-circle bg-dark border me-3"></div>Dark</div>
          <p class="settings-heading mt-2">HEADER SKINS</p>
          <div class="color-tiles mx-0 px-4">
            <div class="tiles success"></div>
            <div class="tiles warning"></div>
            <div class="tiles danger"></div>
            <div class="tiles info"></div>
            <div class="tiles dark"></div>
            <div class="tiles default"></div>
          </div>
        </div>
      </div>
      <div id="right-sidebar" class="settings-panel">
        <i class="settings-close ti-close"></i>
        <ul class="nav nav-tabs border-top" id="setting-panel" role="tablist">
          <li class="nav-item">
            <a class="nav-link active" id="todo-tab" data-bs-toggle="tab" href="#todo-section" role="tab" aria-controls="todo-section" aria-expanded="true">Pengumuman</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" id="chats-tab" data-bs-toggle="tab" href="#chats-section" role="tab" aria-controls="chats-section">CHATS</a>
          </li>
        </ul>
        <div class="tab-content" id="setting-content">
          <div class="tab-pane fade show active scroll-wrapper" id="todo-section" role="tabpanel" aria-labelledby="todo-section">
            <div class="add-items d-flex px-3 mb-0">
              <form class="form w-100">
                <div class="form-group d-flex">
                  <input type="text" class="form-control todo-list-input" placeholder="Add To-do">
                  <button type="submit" class="add btn btn-primary todo-list-add-btn" id="add-task">Add</button>
                </div>
              </form>
            </div>
            <div class="list-wrapper px-3">
              <ul class="d-flex flex-column-reverse todo-list">
                <li>
                  <div class="form-check">
                    <label class="form-check-label">
                      <input class="checkbox" type="checkbox">
                      Team review meeting at 3.00 PM
                    </label>
                  </div>
                  <i class="remove ti-close"></i>
                </li>
                <li>
                  <div class="form-check">
                    <label class="form-check-label">
                      <input class="checkbox" type="checkbox">
                      Prepare for presentation
                    </label>
                  </div>
                  <i class="remove ti-close"></i>
                </li>
                <li>
                  <div class="form-check">
                    <label class="form-check-label">
                      <input class="checkbox" type="checkbox">
                      Resolve all the low priority tickets due today
                    </label>
                  </div>
                  <i class="remove ti-close"></i>
                </li>
                <li class="completed">
                  <div class="form-check">
                    <label class="form-check-label">
                      <input class="checkbox" type="checkbox" checked>
                      Schedule meeting for next week
                    </label>
                  </div>
                  <i class="remove ti-close"></i>
                </li>
                <li class="completed">
                  <div class="form-check">
                    <label class="form-check-label">
                      <input class="checkbox" type="checkbox" checked>
                      Project review
                    </label>
                  </div>
                  <i class="remove ti-close"></i>
                </li>
              </ul>
            </div>
            <h4 class="px-3 text-muted mt-5 fw-light mb-0">Events</h4>
            <div class="events pt-4 px-3">
              <div class="wrapper d-flex mb-2">
                <i class="ti-control-record text-primary me-2"></i>
                <span>Feb 11 2018</span>
              </div>
              <p class="mb-0 font-weight-thin text-gray">Creating component page build a js</p>
              <p class="text-gray mb-0">The total number of sessions</p>
            </div>
            <div class="events pt-4 px-3">
              <div class="wrapper d-flex mb-2">
                <i class="ti-control-record text-primary me-2"></i>
                <span>Feb 7 2018</span>
              </div>
              <p class="mb-0 font-weight-thin text-gray">Meeting with Alisa</p>
              <p class="text-gray mb-0 ">Call Sarah Graves</p>
            </div>
          </div>
          <!-- To do section tab ends -->
          <div class="tab-pane fade" id="chats-section" role="tabpanel" aria-labelledby="chats-section">
            <div class="d-flex align-items-center justify-content-between border-bottom">
              <p class="settings-heading border-top-0 mb-3 pl-3 pt-0 border-bottom-0 pb-0">Friends</p>
              <small class="settings-heading border-top-0 mb-3 pt-0 border-bottom-0 pb-0 pr-3 fw-normal">See All</small>
            </div>
            <ul class="chat-list">
              <li class="list active">
                <div class="profile"><img src="images/faces/face1.jpg" alt="image"><span class="online"></span></div>
                <div class="info">
                  <p>Thomas Douglas</p>
                  <p>Available</p>
                </div>
                <small class="text-muted my-auto">19 min</small>
              </li>
              <li class="list">
                <div class="profile"><img src="images/faces/face2.jpg" alt="image"><span class="offline"></span></div>
                <div class="info">
                  <div class="wrapper d-flex">
                    <p>Catherine</p>
                  </div>
                  <p>Away</p>
                </div>
                <div class="badge badge-success badge-pill my-auto mx-2">4</div>
                <small class="text-muted my-auto">23 min</small>
              </li>
              <li class="list">
                <div class="profile"><img src="images/faces/face3.jpg" alt="image"><span class="online"></span></div>
                <div class="info">
                  <p>Daniel Russell</p>
                  <p>Available</p>
                </div>
                <small class="text-muted my-auto">14 min</small>
              </li>
              <li class="list">
                <div class="profile"><img src="images/faces/face4.jpg" alt="image"><span class="offline"></span></div>
                <div class="info">
                  <p>James Richardson</p>
                  <p>Away</p>
                </div>
                <small class="text-muted my-auto">2 min</small>
              </li>
              <li class="list">
                <div class="profile"><img src="images/faces/face5.jpg" alt="image"><span class="online"></span></div>
                <div class="info">
                  <p>Madeline Kennedy</p>
                  <p>Available</p>
                </div>
                <small class="text-muted my-auto">5 min</small>
              </li>
              <li class="list">
                <div class="profile"><img src="images/faces/face6.jpg" alt="image"><span class="online"></span></div>
                <div class="info">
                  <p>Sarah Graves</p>
                  <p>Available</p>
                </div>
                <small class="text-muted my-auto">47 min</small>
              </li>
            </ul>
          </div>
          <!-- chat tab ends -->
        </div>
      </div>
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
                                            <form method="POST" action="{{ route('familymember.update', ['familymember' => $familyMember->id]) }}" class="forms-sample">
                                                @csrf
                                                @method('PUT') <!-- Add the method for update -->
                                                <div class="form-group row">
                                                    <label for="head_of_family_id" class="col-sm-3 col-form-label">Nama Keluarga</label>
                                                    <div class="col-sm-5">
                                                        <select class="form-control" id="head_of_family_id" name="head_of_family_id">
                                                            <option disabled value="">Pilih Nama Keluarga</option>
                                                            @foreach ($headofFamilyMembers as $headFamilyMember)
                                                            <option value="{{ $headFamilyMember->id }}" {{ $headFamilyMember->id == $familyMember->head_of_family_id ? 'selected' : '' }}>
                                                                {{ $headFamilyMember->nama_keluarga }} - {{ $headFamilyMember->number_of_family_card }}
                                                            </option>
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
                                                        <input type="number" class="form-control" id="NIK" name="NIK" placeholder="NIK" value="{{ $familyMember->NIK }}">
                                                        @error('NIK')
                                                        <div class="text-danger">{{ $message }}</div>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label for="address" class="col-sm-3 col-form-label">Alamat</label>
                                                    <div class="col-sm-9">
                                                        <input type="text" class="form-control" id="address" name="address" placeholder="Alamat" value="{{ $familyMember->address }}">
                                                        @error('address')
                                                        <div class="text-danger">{{ $message }}</div>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label for="full_name" class="col-sm-3 col-form-label">Nama Lengkap</label>
                                                    <div class="col-sm-9">
                                                        <input type="text" class="form-control" id="full_name" name="full_name" placeholder="Nama Lengkap" value="{{ $familyMember->full_name }}">
                                                        @error('full_name')
                                                        <div class="text-danger">{{ $message }}</div>
                                                        @enderror
                                                    </div>
                                                </div>
                                                
                                                <div class="form-group row">
                                                    <label for="last_education" class="col-sm-3 col-form-label">Pendidikan Terakhir</label>
                                                    <div class="col-sm-9">
                                                        <input type="text" class="form-control" id="last_education" name="last_education" placeholder="Pendidikan Terakhir" value="{{ $familyMember->last_education }}">
                                                        @error('last_education')
                                                        <div class="text-danger">{{ $message }}</div>
                                                        @enderror
                                                    </div>
                                                </div>
                                                
                                                <div class="form-group row">
                                                    <label for="type_of_work" class="col-sm-3 col-form-label">Jenis Pekerjaan</label>
                                                    <div class="col-sm-9">
                                                        <input type="text" class="form-control" id="type_of_work" name="type_of_work" placeholder="Jenis Pekerjaan" value="{{ $familyMember->type_of_work }}">
                                                        @error('type_of_work')
                                                        <div class="text-danger">{{ $message }}</div>
                                                        @enderror
                                                    </div>
                                                </div>
                                            
                                                <div class="form-group row">
                                                    <label for="etnic" class="col-sm-3 col-form-label">Suku Etnis</label>
                                                    <div class="col-sm-9">
                                                        <input type="text" class="form-control" id="etnic" name="etnic" placeholder="Suku Etnis" value="{{ $familyMember->etnic }}">
                                                        @error('etnic')
                                                        <div class="text-danger">{{ $message }}</div>
                                                        @enderror
                                                    </div>
                                                </div>
                                                
                                                <div class="form-group row">
                                                    <label for="citizenship" class="col-sm-3 col-form-label">Kewarganegaraan</label>
                                                    <div class="col-sm-9">
                                                        <input type="text" class="form-control" id="citizenship" name="citizenship" placeholder="Kewarganegaraan" value="{{ $familyMember->citizenship }}">
                                                        @error('citizenship')
                                                        <div class="text-danger">{{ $message }}</div>
                                                        @enderror
                                                    </div>
                                                </div>
                                                
                                                <div class="form-group row">
                                                    <label for="age" class="col-sm-3 col-form-label">Umur</label>
                                                    <div class="col-sm-3">
                                                        <input type="number" class="form-control" id="age" name="age" placeholder="Umur" value="{{ $familyMember->age }}">
                                                        @error('age')
                                                        <div class="text-danger">{{ $message }}</div>
                                                        @enderror
                                                    </div>
                                                </div>
                                                
                                                <div class="form-group row">
                                                    <label for="gender" class="col-sm-3 col-form-label">Jenis Kelamin</label>
                                                    <div class="col-sm-5">
                                                        <select class="form-control" id="gender" name="gender">
                                                            <option disabled value="">Pilih Jenis Kelamin</option>
                                                            <option value="Male" {{ $familyMember->gender == 'Male' ? 'selected' : '' }}>Male</option>
                                                            <option value="Female" {{ $familyMember->gender == 'Female' ? 'selected' : '' }}>Female</option>
                                                            <option value="Other" {{ $familyMember->gender == 'Other' ? 'selected' : '' }}>Other</option>
                                                        </select>
                                                        @error('gender')
                                                        <div class="text-danger">{{ $message }}</div>
                                                        @enderror
                                                    </div>
                                                </div>
                                                
                                                <div class="form-group row">
                                                    <label for="religion" class="col-sm-3 col-form-label">Agama</label>
                                                    <div class="col-sm-9">
                                                        <input type="text" class="form-control" id="religion" name="religion" placeholder="Agama" value="{{ $familyMember->religion }}">
                                                        @error('religion')
                                                        <div class="text-danger">{{ $message }}</div>
                                                        @enderror
                                                    </div>
                                                </div>
                                                
                                                <div class="form-group row">
                                                    <label for="relationship_status_in_the_family" class="col-sm-3 col-form-label">Status Hubungan Dalam Keluarga</label>
                                                    <div class="col-sm-9">
                                                        <input type="text" class="form-control" id="relationship_status_in_the_family" name="relationship_status_in_the_family" placeholder="Status Hubungan Dalam Keluarga" value="{{ $familyMember->relationship_status_in_the_family }}">
                                                        @error('relationship_status_in_the_family')
                                                        <div class="text-danger">{{ $message }}</div>
                                                        @enderror
                                                    </div>
                                                </div>
                                                
                                                <div class="form-group row">
                                                    <label for="date_of_birth" class="col-sm-3 col-form-label">Tanggal Lahir</label>
                                                    <div class="col-sm-5">
                                                        <input type="date" class="form-control" id="date_of_birth" name="date_of_birth" value="{{ $familyMember->date_of_birth }}">
                                                        @error('date_of_birth')
                                                        <div class="text-danger">{{ $message }}</div>
                                                        @enderror
                                                    </div>
                                                </div>
                                                
                                                <div class="form-group row">
                                                    <label for="place_of_birth" class="col-sm-3 col-form-label">Tempat Lahir</label>
                                                    <div class="col-sm-9">
                                                        <input type="text" class="form-control" id="place_of_birth" name="place_of_birth" placeholder="Tempat Lahir" value="{{ $familyMember->place_of_birth }}">
                                                        @error('place_of_birth')
                                                        <div class="text-danger">{{ $message }}</div>
                                                        @enderror
                                                    </div>
                                                </div>
                                                
                                                <div class="form-group row">
                                                    <label for="phone_number" class="col-sm-3 col-form-label">Nomor Telepon</label>
                                                    <div class="col-sm-9">
                                                        <input type="text" class="form-control" id="phone_number" name="phone_number" placeholder="Nomor Telepon" value="{{ $familyMember->phone_number }}">
                                                        @error('phone_number')
                                                        <div class="text-danger">{{ $message }}</div>
                                                        @enderror
                                                    </div>
                                                </div>
                                                
                                                <div class="form-group row">
                                                    <label for="marital_status" class="col-sm-3 col-form-label">Status Pernikahan</label>
                                                    <div class="col-sm-5">
                                                        <select class="form-control" id="marital_status" name="marital_status">
                                                            <option disabled value="">Pilih Status Pernikahan</option>
                                                            <option value="Sudah Menikah" {{ $familyMember->marital_status == 'Sudah Menikah' ? 'selected' : '' }}>Sudah Menikah</option>
                                                            <option value="Belum Menikah" {{ $familyMember->marital_status == 'Belum Menikah' ? 'selected' : '' }}>Belum Menikah</option>
                                                        </select>
                                                        @error('marital_status')
                                                        <div class="text-danger">{{ $message }}</div>
                                                        @enderror
                                                    </div>
                                                </div>                                          
                                                
                                                <button type="submit" class="btn btn-success me-2">Update</button>
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
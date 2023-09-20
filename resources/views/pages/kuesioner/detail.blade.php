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
                                                <h4 class="card-title">Lihat Detail Sensus Keluarga {{ $head_of_family->nama_keluarga }}</h4>
                                                <p class="card-description">Data Master > Lihat Detail Sensus</p>
                                                <div class="row">
                                                    <!-- Column for Head of Family and Related Data -->
                                                    <div class="col-md-6">
                                                        <!-- Access head_of_family attributes -->
                                                        <p><strong>NIK Keluarga:</strong> {{ $head_of_family->number_of_family_card }}</p>
                                                        <p><strong>Nama Keluarga:</strong> {{ $head_of_family->nama_keluarga }}</p>
                                        
                                                        <!-- Access related census data -->
                                                        <p><strong>1. Nama Sensus:</strong> {{ $head_of_family->census->census_name }}</p>
                                                        <p><strong>2. Jadwal Pengadaan:</strong> {{ $head_of_family->census->schedule }}</p>
                                        
                                                        <!-- Access related village data -->
                                                        <p><strong>3. Nama Desa:</strong> {{ $head_of_family->village->village_name }}</p>
                                                        <p><strong>4. Alamat Desa:</strong> {{ $head_of_family->village->address }}</p>
                                        
                                                        <!-- Check if there are family members -->
                                                        @if ($head_of_family->member_of_family->isEmpty())
                                                            <p style="color: red; font-weight: bold">Anggota Keluarga Belum ditambahkan. <br> tambahkan <a href="/familymember">disini</a></p>
                                                        @else
                                                            <!-- Loop through family members -->
                                                            @foreach ($head_of_family->member_of_family as $key => $family_member)
                                                                <p><strong>{{ $key + 5 }}. Anggota Keluarga</strong></p>
                                                                <p><strong>Nama Anggota Keluarga:</strong> {{ $family_member->full_name }}</p>
                                                                <p><strong>NIK:</strong> {{ $family_member->NIK }}</p>
                                                                <p><strong>Umur:</strong> {{ $family_member->age }}</p>
                                                                <p><strong>Status dalam Keluarga:</strong> {{ $family_member->relationship_status_in_the_family }}</p>
                                                            @endforeach
                                                        @endif
                                                    </div>
                                                    
                                                    <!-- Column for Sensus Questions and Responses -->
                                                    <div class="col-md-6">
                                                        <!-- Loop to display questions and answers -->
                                                        @if(count($questions_and_answers) > 0)
                                                            <div style="font-weight: bold; color:red">Respon Pertanyaan Sensus :</div> 
                                                            @foreach($questions_and_answers as $qa)
                                                                <p><strong>Pertanyaan {{ $loop->iteration }}:</strong> {{ $qa->question }}</p>
                                                                <p><strong>Jawaban {{ $loop->iteration }}:</strong> {{ $qa->answer }}</p>
                                                            @endforeach
                                                        @else
                                                            <!-- Message to display if the head of the family has not filled out any questions -->
                                                            <p><strong>Keluarga Ini belum mengisi Sensus.</strong></p>
                                                        @endif
                                                    </div>
                                                </div> <!-- End of Row -->
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
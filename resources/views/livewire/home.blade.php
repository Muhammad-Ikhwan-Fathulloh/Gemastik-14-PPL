<div>
    {{-- If your happiness depends on money, you will never be happy with yourself. --}}
    @if (auth()->user()->level==1)
    <div class="card bg-gradient-dark">
      <div class="card-body">
        <h5 class="text-white"><strong>Halo Admin, {{ Auth::user()->name }}</strong></h5>
      </div>
    </div>
    <hr>
    <div class="row">
      <!-- card -->
            <div class="col-xl-3 col-md-6 mb-4">
              <div class="card border-left-light shadow h-100">
                <div class="card-body bg-gradient-dark">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Pengguna</div>
                      <a href="/profile" class="h5 mb-0 font-weight-bold text-white btn btn-success">{{ $users }}</a>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-user fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <!-- card -->
            <div class="col-xl-3 col-md-6 mb-4">
              <div class="card border-left-light shadow h-100">
                <div class="card-body bg-gradient-dark">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Masalah</div>
                      <a href="/permasalahan" class="h5 mb-0 font-weight-bold text-white btn btn-success">{{ $masalahs }}</a>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-cogs fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <!-- card -->
            <div class="col-xl-3 col-md-6 mb-4">
              <div class="card border-left-light shadow h-100">
                <div class="card-body bg-gradient-dark">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Solusi</div>
                      <a href="/sumbangide" class="h5 mb-0 font-weight-bold text-white btn btn-success">{{ $solusis }}</a>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-search-plus fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <!-- card -->
            <div class="col-xl-3 col-md-6 mb-4">
              <div class="card border-left-light shadow h-100">
                <div class="card-body bg-gradient-dark">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Inspirasi</div>
                      <a href="/inspirasi" class="h5 mb-0 font-weight-bold text-white btn btn-success">{{ $inspirasis }}</a>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-trophy fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>
    </div>
    @elseif (auth()->user()->level==2)
    <div class="card bg-gradient-dark">
      <div class="card-body">
        <h5 class="text-white"><strong>Halo Investor, {{ Auth::user()->name }}</strong></h5>
      </div>
    </div>
    <hr>
    <div class="row">
      <!-- card -->
            <div class="col-xl-3 col-md-6 mb-4">
              <div class="card border-left-light shadow h-100">
                <div class="card-body bg-gradient-dark">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Masalah</div>
                      <a href="/permasalahan" class="h5 mb-0 font-weight-bold text-white btn btn-success">{{ $masalahs }}</a>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-cogs fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <!-- card -->
            <div class="col-xl-3 col-md-6 mb-4">
              <div class="card border-left-light shadow h-100">
                <div class="card-body bg-gradient-dark">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Komentar Masalah</div>
                      <a href="/komentar/masalah" class="h5 mb-0 font-weight-bold text-white btn btn-success">{{ $komenmasalahs }}</a>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-comment fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <!-- card -->
            <div class="col-xl-3 col-md-6 mb-4">
              <div class="card border-left-light shadow h-100">
                <div class="card-body bg-gradient-dark">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Solusi</div>
                      <a href="/sumbangide" class="h5 mb-0 font-weight-bold text-white btn btn-success">{{ $solusis }}</a>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-search-plus fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <!-- card -->
            <div class="col-xl-3 col-md-6 mb-4">
              <div class="card border-left-light shadow h-100">
                <div class="card-body bg-gradient-dark">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Komentar Solusi</div>
                      <a href="/komentar/solusi" class="h5 mb-0 font-weight-bold text-white btn btn-success">{{ $komensolusis }}</a>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-comment fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>
    </div>
    @elseif (auth()->user()->level==3)
    <div class="card bg-gradient-dark">
      <div class="card-body">
        <h5 class="text-white"><strong>Halo Creator, {{ Auth::user()->name }}</strong></h5>
      </div>
    </div>
    <hr>
    <div class="row">
      <!-- card -->
            <div class="col-xl-3 col-md-6 mb-4">
              <div class="card border-left-light shadow h-100">
                <div class="card-body bg-gradient-dark">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Masalah</div>
                      <a href="/permasalahan" class="h5 mb-0 font-weight-bold text-white btn btn-success">{{ $masalahs }}</a>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-cogs fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <!-- card -->
            <div class="col-xl-3 col-md-6 mb-4">
              <div class="card border-left-light shadow h-100">
                <div class="card-body bg-gradient-dark">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Komentar Masalah</div>
                      <a href="/komentar/masalah" class="h5 mb-0 font-weight-bold text-white btn btn-success">{{ $komenmasalahs }}</a>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-comment fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <!-- card -->
            <div class="col-xl-3 col-md-6 mb-4">
              <div class="card border-left-light shadow h-100">
                <div class="card-body bg-gradient-dark">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Solusi</div>
                      <a href="/sumbangide" class="h5 mb-0 font-weight-bold text-white btn btn-success">{{ $solusis }}</a>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-search-plus fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <!-- card -->
            <div class="col-xl-3 col-md-6 mb-4">
              <div class="card border-left-light shadow h-100">
                <div class="card-body bg-gradient-dark">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Komentar Solusi</div>
                      <a href="/komentar/solusi" class="h5 mb-0 font-weight-bold text-white btn btn-success">{{ $komensolusis }}</a>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-comment fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>

    </div>
    @endif
</div>

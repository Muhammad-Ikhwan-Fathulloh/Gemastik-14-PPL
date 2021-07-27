
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.80.0">
    <title>Collabs</title>
    <link rel="shortcut icon" type="image/png" href="logo/collabss.png">

    <link rel="canonical" href="https://getbootstrap.com/docs/4.6/examples/album/">

    

    <!-- Bootstrap core CSS -->
<link href="/docs/4.6/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
<!-- Custom fonts for this template-->
  <link href="{{asset('template')}}/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">

    <!-- Favicons -->
<link rel="apple-touch-icon" href="/docs/4.6/assets/img/favicons/apple-touch-icon.png" sizes="180x180">
<link rel="icon" href="/docs/4.6/assets/img/favicons/favicon-32x32.png" sizes="32x32" type="image/png">
<link rel="icon" href="/docs/4.6/assets/img/favicons/favicon-16x16.png" sizes="16x16" type="image/png">
<link rel="manifest" href="/docs/4.6/assets/img/favicons/manifest.json">
<link rel="mask-icon" href="/docs/4.6/assets/img/favicons/safari-pinned-tab.svg" color="#563d7c">
<link rel="icon" href="/docs/4.6/assets/img/favicons/favicon.ico">
<meta name="msapplication-config" content="/docs/4.6/assets/img/favicons/browserconfig.xml">
<meta name="theme-color" content="#563d7c">
@livewireStyles

    <style>
      .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        user-select: none;
      }

      @media (min-width: 768px) {
        .bd-placeholder-img-lg {
          font-size: 3.5rem;
        }
      }

      .bg-ku {
        background: linear-gradient(to right, #29648a, #25274d);
      }

      .bg-ka {
        background: linear-gradient(to right, #ffffff, #464866);
      }

      .bg-kuk {
        background: #4682b4;
      }

      .bg-b {
        background: #464866;
      }

    </style>

    
    <!-- Custom styles for this template -->
    <link href="album.css" rel="stylesheet">
  </head>
  <body class="bg-ku">
    
<header>
  <div class="collapse bg-dark" id="navbarHeader">
    <div class="container">
      <div class="row">
        <div class="col-sm-8 col-md-7 py-4">
          <h4 class="text-white">About</h4>
          <p class="text-white">Melihat potensi anak muda di era perkembangan zaman yang semakin masif. Diperlukan sebuah sistem yang dapat mewadahi potensi menjadi lebih sederhana. Kami dari tim Nocturnailed menghadirkan Collabs, sebuah Aplikasi yang mewadahi ide anak muda sebagai creator dan investor sebagai pendanaan untuk dapat saling berdiskusi dan berkolaborasi bersama membangun karya.</p>
        </div>
        <div class="col-sm-4 offset-md-1 py-4">
          <h4 class="text-white">Contact</h4>
          <ul class="list-unstyled">
            <li><a href="#" class="text-white">Collabs</a></li>
            <li><a href="#" class="text-white">Sekolah Tinggi Teknologi Bandung</a></li>
            <li><a href="#" class="text-white">Nocturnailed Team</a></li>
          </ul>
          <a href="/login" class="btn btn-sm btn-info text-white"><i class="fas fa-fw fa-sign-in-alt"></i> Login</a>
          <a href="/register" class="btn btn-sm btn-info text-white"><i class="fas fa-fw fa-sign-in-alt"></i> Register</a>
        </div>
      </div>
    </div>
  </div>
  <div class="navbar navbar-dark bg-ka shadow-sm">
    <div class="container d-flex justify-content-between">
      <a href="#" class="navbar-brand d-flex align-items-center">
        <img src="{{ url('logo/collabs.png') }}" width="150">
      </a>
      @if(empty(auth()->user()->id))
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarHeader" aria-controls="navbarHeader" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      @elseif(!empty(auth()->user()->id))
        <a href="/home"><p align="right" class="text-white"><strong>{{ Auth::user()->name }}</strong> 
          @if(!empty(auth()->user()->foto))
          <img class="img-profile rounded-circle" src="{{ Auth::user()->foto }}" width="40px">
          @endif
        </p>
        </a>
      @endif
    </div>
  </div>
</header>
<main role="main">
<section class="py-5 text-center container text-white">
    <div class="row py-lg-5">
      <div class="col-lg-6 col-md-8 mx-auto">
        <img src="{{ url('logo/meetings.png') }}" width="400px">
        <hr>
        <h1 class="fw-light"><strong>< COLLABS ></strong></h1>
        <p class="lead"><i class="fas fa-fw fa-street-view"></i> Kolaborasi bersama membangun karya!</p>
  <!-- <div class="row">
    <div class="col-sm-5 col-md-6 text-right">
      <a href="/login" class="btn btn-sm btn-success"><i class="fas fa-fw fa-sign-in-alt"></i> Permasalahan</a>
    </div>
    <div class="col-sm-5 col-md-6 text-left">
      <a href="/register" class="btn btn-sm btn-success"><i class="fas fa-fw fa-sign-in-alt"></i> Solusi</a>
    </div>
  </div> -->
        
      </div>
    </div>
  </section>
  <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320"><path fill="#4682b4" fill-opacity="1" d="M0,160L288,192L576,256L864,224L1152,160L1440,192L1440,320L1152,320L864,320L576,320L288,320L0,320Z"></path></svg>
<div class="bg-kuk">
  <section>
    <div class="container">
  <div class="row row-cols-1 row-cols-md-2 g-4">
    <div class="col text-center">
      <img src="{{ url('logo/meeting.png') }}" width="300px">
    </div>
    <div class="col text-center">
      
      <strong class="text-white">Collabs</strong>
      <p class="text-white">Melihat potensi anak muda di era perkembangan zaman yang semakin masif. Diperlukan sebuah sistem yang dapat mewadahi potensi menjadi lebih sederhana. Kami dari tim Nocturnailed menghadirkan Collabs, sebuah Aplikasi yang mewadahi ide anak muda sebagai creator dan investor sebagai pendanaan untuk dapat saling berdiskusi dan berkolaborasi bersama membangun karya.</p>
    </div>
  </div>
</div>
  </section>
  <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320"><path fill="#464866" fill-opacity="1" d="M0,96L288,64L576,160L864,160L1152,128L1440,64L1440,320L1152,320L864,320L576,320L288,320L0,320Z"></path></svg>

  <div class="album py-5 bg-b">
    <div class="container">
<!-- Komentar -->
<!-- Main content -->
            <section class="content">
              <div class="container">
                <div class="row row-cols-1 row-cols-md-2 g-4">
                  <div class="col text-center">
                   <!--  -->
                   <h3 class="text-white"><strong>Mulai Kolaborasi</strong></h3>
                   <div class="row row-cols-1 row-cols-md-2 g-4">
                    <hr>
                     <div class="col">
                       <img src="{{ url('logo/masalah.png') }}" width="150px">
                       <h5 class="text-white"><strong>Dari masalah terkini</strong></h5>
                     </div>
                     <div class="col">
                       <img src="{{ url('logo/solusi.png') }}" width="150px">
                       <h5 class="text-white"><strong>Dari solusi terkini</strong></h5>
                     </div>
                     <hr>
                   </div>
                  </div>
                  <div class="col text-center">
                    <img src="{{ url('logo/logo.png') }}" width="400px">
                  </div>
                </div>
              </div>
              <hr> 
              @yield('content')
              @livewireScripts
              @include('sweetalert::alert')
              <hr>
               <p class="text-white" align="center"><strong>Tim Nocturnailed</strong></p>
               <p class="text-white" align="center"><strong>Sekolah Tinggi Teknologi Bandung</strong></p>
          <div class="row row-cols-1 row-cols-md-3 g-4">
            <div class="col" align="center">
              <img src="https://i.ibb.co/vXgH8Wr/Logopit-1619837910132.jpg" class="rounded-circle" width="100">
              <p class="text-white">Muhammad Ikhwan Fathulloh</p>
              <p class="text-white">Anggota 1</p>
            </div>
            <div class="col" align="center">
              <img src="https://i.ibb.co/CQr7t6n/Logopit-1626925514205.jpg" class="rounded-circle" width="100">
              <p class="text-white">Dimas Aji Permadi</p>
              <p class="text-white">Ketua</p>
            </div>
            <div class="col" align="center">
              <img src="https://i.ibb.co/nczf7mW/Logopit-1626925559368.jpg" class="rounded-circle" width="100">
              <p class="text-white">Shalih Rizaldy</p>
              <p class="text-white">Anggota 2</p>
            </div>
          </div>
            </section>
            
            <!-- /.content -->
<!-- Komentar -->
    </div>
  </div>

</main>
<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320"><path fill="#464866" fill-opacity="1" d="M0,128L288,256L576,128L864,160L1152,64L1440,0L1440,0L1152,0L864,0L576,0L288,0L0,0Z"></path></svg>
<section class="bg-ku">
<footer class="text-white py-5">
  <div class="container">
    <p class="float-right">
      <a href="#" class="text-white btn btn-success"><i class="fas fa-fw fa-arrow-circle-up"></i> Back to top</a>
    </p>
    <p class="mb-1">Sekolah Tinggi Teknologi Bandung</p>
      <p class="mb-0">Nocturnailed Team</p>
      <hr>
      <p class="mb-2">Copyright &copy; 2021 | Collabs</p>
  </div>
</footer>
</section>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
      <script>window.jQuery || document.write('<script src="/docs/4.6/assets/js/vendor/jquery.slim.min.js"><\/script>')</script><script src="/docs/4.6/dist/js/bootstrap.bundle.min.js" integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous"></script>
      <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
      <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous"></script>
<x-livewire-alert::scripts />
      
  </body>
</html>

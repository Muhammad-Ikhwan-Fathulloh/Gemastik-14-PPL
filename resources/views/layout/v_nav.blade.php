 <!-- Nav Item - Dashboard -->
      <li class="nav-item {{request()->is('home')?'active':''}}">
        <a class="nav-link" href="/home">
          <i class="fas fa-fw fa-tachometer-alt"></i>
          <span>Dashboard</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="/">
          <i class="fas fa-fw fa-home"></i>
          <span>Landing</span></a>
      </li>

      <!-- Divider -->
      <hr class="sidebar-divider">

       <!-- Heading -->
      <div class="sidebar-heading">
        Profile
      </div> 

      <!-- Nav Item - Pages Collapse Menu -->
      <li class="nav-item {{request()->is('profile')?'active':''}}">
        <a class="nav-link" href="/profile">
          <i class="fas fa-fw fa-user"></i>
          <span>Profile</span></a>
      </li>
      @if (auth()->user()->level==1)
      <!-- Divider -->
      <hr class="sidebar-divider">

      <!-- Heading -->
      <div class="sidebar-heading">
        Menu Admin
      </div> 

      <li class="nav-item {{request()->is('permasalahan')?'active':''}}">
        <a class="nav-link" href="/permasalahan">
          <i class="fas fa-fw fa-cogs"></i>
          <span>Permasalahan</span></a>
      </li>

      <li class="nav-item {{request()->is('komentar/masalah')?'active':''}}">
        <a class="nav-link" href="/komentar/masalah">
          <i class="fas fa-fw fa-comment"></i>
          <span>Komentar Permasalahan</span></a>
      </li>

      <li class="nav-item {{request()->is('sumbangide')?'active':''}}">
        <a class="nav-link" href="/sumbangide">
          <i class="fas fa-fw fa-search-plus"></i>
          <span>Sumbang Ide</span></a>
      </li>

      <li class="nav-item {{request()->is('komentar/solusi')?'active':''}}">
        <a class="nav-link" href="/komentar/solusi">
          <i class="fas fa-fw fa-comment"></i>
          <span>Komentar Solusi</span></a>
      </li>


      <li class="nav-item {{request()->is('inspirasi')?'active':''}}">
        <a class="nav-link" href="/inspirasi">
          <i class="fas fa-fw fa-trophy"></i>
          <span>Inspirasi</span></a>
      </li>

      <li class="nav-item {{request()->is('chat')?'active':''}}">
        <a class="nav-link" href="/chat">
          <i class="fas fa-fw fa-comments"></i>
          <span>Chat</span></a>
      </li>

      <li class="nav-item {{request()->is('kategori')?'active':''}}">
        <a class="nav-link" href="/kategori">
          <i class="fas fa-fw fa-list"></i>
          <span>Kategori</span></a>
      </li>
      @elseif (auth()->user()->level==2)
      <!-- Divider -->
      <hr class="sidebar-divider">

      <!-- Heading -->
      <div class="sidebar-heading">
        Menu Investor
      </div> 

      <li class="nav-item {{request()->is('permasalahan')?'active':''}}">
        <a class="nav-link" href="/permasalahan">
          <i class="fas fa-fw fa-cogs"></i>
          <span>Permasalahan</span></a>
      </li>

      <li class="nav-item {{request()->is('komentar/masalah')?'active':''}}">
        <a class="nav-link" href="/komentar/masalah">
          <i class="fas fa-fw fa-comment"></i>
          <span>Komentar Permasalahan</span></a>
      </li>

      <li class="nav-item {{request()->is('sumbangide')?'active':''}}">
        <a class="nav-link" href="/sumbangide">
          <i class="fas fa-fw fa-search-plus"></i>
          <span>Sumbang Ide</span></a>
      </li>

      <li class="nav-item {{request()->is('komentar/solusi')?'active':''}}">
        <a class="nav-link" href="/komentar/solusi">
          <i class="fas fa-fw fa-comment"></i>
          <span>Komentar Solusi</span></a>
      </li>

      <li class="nav-item {{request()->is('chat')?'active':''}}">
        <a class="nav-link" href="/chat">
          <i class="fas fa-fw fa-comments"></i>
          <span>Chat</span></a>
      </li>

      @elseif (auth()->user()->level==3)
      <!-- Divider -->
      <hr class="sidebar-divider">

      <!-- Heading -->
      <div class="sidebar-heading">
        Menu Creator
      </div> 

      <li class="nav-item {{request()->is('permasalahan')?'active':''}}">
        <a class="nav-link" href="/permasalahan">
          <i class="fas fa-fw fa-cogs"></i>
          <span>Permasalahan</span></a>
      </li>

      <li class="nav-item {{request()->is('komentar/masalah')?'active':''}}">
        <a class="nav-link" href="/komentar/masalah">
          <i class="fas fa-fw fa-comment"></i>
          <span>Komentar Permasalahan</span></a>
      </li>

      <li class="nav-item {{request()->is('sumbangide')?'active':''}}">
        <a class="nav-link" href="/sumbangide">
          <i class="fas fa-fw fa-search-plus"></i>
          <span>Sumbang Ide</span></a>
      </li>

      <li class="nav-item {{request()->is('komentar/solusi')?'active':''}}">
        <a class="nav-link" href="/komentar/solusi">
          <i class="fas fa-fw fa-comment"></i>
          <span>Komentar Solusi</span></a>
      </li>

      <li class="nav-item {{request()->is('chat')?'active':''}}">
        <a class="nav-link" href="/chat">
          <i class="fas fa-fw fa-comments"></i>
          <span>Chat</span></a>
      </li>

      @endif
      
      <!-- Divider -->
      <hr class="sidebar-divider">

      
      

      <!-- Nav Item - Tables -->
      <li class="nav-item">
        <a class="nav-link" href="" data-toggle="modal" data-target="#logoutModal">
          <i class="fas fa-fw fa-sign-out-alt"></i>
          <span>Logout</span></a>
      </li>
      

      <!-- Divider -->
      <hr class="sidebar-divider d-none d-md-block">

      <!-- Sidebar Toggler (Sidebar) -->
      <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
      </div>

    </ul>
    <!-- End of Sidebar -->
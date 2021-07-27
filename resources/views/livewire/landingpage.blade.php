<div>
    {{-- In work, do what you enjoy. --}}
    <div>
      <form class="d-flex">
          <input wire:model="search" class="form-control me-2 border-light" type="text" name="search" placeholder="Cari berdasarkan Kategori Solusi" aria-label="Search" value="">
          <span class="btn btn-outline-light" value="cari"><i class="fas fa-fw fa-search"></i></span>
        </form>
    </div>
    <hr>
    <div class="row row-cols-1 row-cols-md-3 g-4">
      <?php $no=1; ?>
	 @foreach ($solusis as $datas)
   <div class="col">
	<div class="card">
  <div class="card-header">
     @foreach ($solusisk as $userku)
    @if($datas->id_user == $userku->id_user)
    <strong><p align="left" class="text-dark">
      <img class="img-profile rounded-circle" src="{{ $userku->foto }}" width="40px"> | 
      @if($userku->level == 1)
      Admin
      @elseif($userku->level == 2)
      Investor
      @elseif($userku->level == 3)
      Creator
      @endif
      </p>
     <p align="left" class="text-dark">{{ $userku->name }}</p></strong>
     @endif
     @endforeach
  </div>
  <div class="card-body" align="justify">
  	<label><strong>Deskripsi Solusi :</strong></label>
  	<p>{{ $datas->deskripsi_solusi }}</p>
  	<label><strong>File Solusi :</strong></label>
  	<hr>
    @if(empty(auth()->user()->id))
        Buat Akun!
    @elseif(!empty(auth()->user()->id))
    <div class="row row-cols-1 row-cols-md-3 g-4 text-center">
      <div class="col">
        <p><strong>Klik Link</strong></p>
        <a href="{{ $datas->file_solusi }}" class="btn btn-sm btn-success">File Solusi</a>
      </div>
      <div class="col">
        <p><strong>Scan Link</strong></p>
        <div class="visible-print text-center border-light">
            {!! QrCode::size(70)->generate($datas->file_solusi); !!}           
        </div>
      </div>
    </div>  
    @endif
  	<br>
  	<label><strong>Deskripsi Penerapan :</strong></label>
  	<p>{{ $datas->deskripsi_penerapan }}</p>
  	<label><strong>File Penerapan :</strong></label>
  	<hr>
    @if(empty(auth()->user()->id))
        Buat Akun!
    @elseif(!empty(auth()->user()->id))
    <div class="row row-cols-1 row-cols-md-3 g-4 text-center">
      <div class="col">
        <p><strong>Klik Link</strong></p>
        <a href="{{ $datas->file_penerapan }}" class="btn btn-sm btn-success">File Penerapan</a>
      </div>
      <div class="col">
        <p><strong>Scan Link</strong></p>
        <div class="visible-print text-center border-light">
            {!! QrCode::size(70)->generate($datas->file_penerapan); !!}           
        </div>
      </div>
    </div>  
    @endif
  	<br>
  	<label><strong>Harapan :</strong></label>
  	<p>{{ $datas->harapan }}</p>
  	<label><strong>Feedback :</strong></label>
  	<p>{{ $datas->feedback }}</p>
  	</div>
  <div class="card-footer">
    <form wire:submit.prevent="SimpanDatas()">
    @if (session('pesan'))
      <div class="alert alert-success">
        {{session('pesan')}}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
      </div>
    @endif
    @if(empty(auth()->user()->id))
        
        @elseif(!empty(auth()->user()->id))
        <p>
          <a class="btn btn-success" data-toggle="collapse" href="#komentar{{ $datas->id }}" role="button" aria-expanded="false" aria-controls="komentar{{ $datas->id }}"><i class="fas fa-fw fa-comment"></i> <strong>Diskusi</strong></a>
        </p>
        <div class="row">
          <div class="col">
            <div class="collapse multi-collapse" id="komentar{{ $datas->id }}" wire:ignore.self>
        <div class="form-group">
          <textarea type="text" name="komentarsolusi" wire:model="komentarsolusi" class="form-control" placeholder="Masukkan Komentar" rows="3"></textarea>
          @error('komentarsolusi') <div class="alert alert-danger">{{ $message }}</div> @enderror
        </div>
        
        <button class="btn btn-sm btn-success" data-toggle="modal" data-target="#" wire:click.prevent="SimpanDatas({{ $datas->id }})"><i class="fas fa-fw fa-pen"></i> <strong>Kirim</strong></button>
      </div>
    </div>
  </div>
        <hr>
        <p>
          <a class="btn btn-success" data-toggle="collapse" href="#pesan{{ $datas->id }}" role="button" aria-expanded="false" aria-controls="pesan{{ $datas->id }}"><i class="fas fa-fw fa-comments"></i> <strong>Chat</strong></a>
        </p>
        <div class="row">
          <div class="col">
            <div class="collapse multi-collapse" id="pesan{{ $datas->id }}" wire:ignore.self>
              <div class="card card-body">
                <div class="form-group">
                  <textarea type="text" name="pesan" wire:model="pesan" class="form-control" placeholder="Masukkan Pesan" rows="3"></textarea>
                  @error('pesan') <div class="alert alert-danger">{{ $message }}</div> @enderror
                </div>
                <div class="form-group">
                  <textarea type="text" name="file" wire:model="file" class="form-control" placeholder="Masukkan Link File" rows="1"></textarea>
                  @error('file') <div class="alert alert-danger">{{ $message }}</div> @enderror
                </div>
                <button class="btn btn-sm btn-success" data-toggle="modal" data-target="#" wire:click.prevent="SimpanDatak({{ $datas->id }})"><i class="fas fa-fw fa-comments"></i> <strong>Chat</strong></button>
              </div>
            </div>
          </div>
        </div>
  <hr>
        
        @endif
      </form>
      
  	<div class="row">
  		<div class="col">
  			<span class="btn btn-info"><strong>#{{ $datas->kategori }}</strong></span>
  		</div>
      @if(empty(auth()->user()->id))
        
        @elseif(!empty(auth()->user()->id))
        @if(auth()->user()->id == $datas->id_user)
  		<div class="col" align="right">
        <a href="/komentar/solusi" class="btn btn-sm btn-success"><i class="fas fa-fw fa-phone"></i> <strong>Komentar</strong></a><br><br>
  			<button type="button" class="btn btn-sm btn-danger" data-toggle="modal" data-target="#delete{{ $datas->id }}"><i class="fas fa-fw fa-trash"></i> <strong>Hapus</strong></button>
  		</div>
      @endif
      @endif
  	</div>
  	</div>
</div>
<hr>
<p class="text-white">Diskusi :</p>
  <p>
          <a class="btn btn-success" data-toggle="collapse" href="#lihat{{ $datas->id }}" role="button" aria-expanded="false" aria-controls="lihat{{ $datas->id }}"><i class="fas fa-fw fa-comments"></i> <strong>Lihat Diskusi</strong></a>
        </p>
        <div class="row">
          <div class="col">
            <div class="collapse multi-collapse" id="lihat{{ $datas->id }}" wire:ignore.self>
  @foreach ($komentars as $datak)
  @if($datak->id_solusi == $datas->id)
  
    <p align="right" class="text-white">
      @if($datak->level == 1)
      Admin
      @elseif($datak->level == 2)
      Investor
      @elseif($datak->level == 3)
      Creator
      @endif
     | {{ $datak->name }} <img class="img-profile rounded-circle" src="{{ $datak->foto }}" width="40px"></p>
    <div class="form-group">
          <textarea type="text" name="komentarsolusi" class="form-control" placeholder="Masukkan Komentar" rows="2" readonly="" wire:ignore.self>{{ $datak->komentar }}</textarea>
          @error('komentarsolusi') <div class="alert alert-danger">{{ $message }}</div> @enderror
        </div>
  
  <hr>
  @endif
  @endforeach
</div>
</div>
</div>
</div>
@endforeach

</div>
</div>

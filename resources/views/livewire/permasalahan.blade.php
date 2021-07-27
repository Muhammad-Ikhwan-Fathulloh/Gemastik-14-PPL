<div>
    {{-- Because she competes with no one, no one can compete with her. --}}
    @if(empty(auth()->user()->id))
        
        @elseif(!empty(auth()->user()->id))
    <div class="card border-light mb-3 bg-ku">
	  <div class="card-body">
	  	<!--  -->
	  	<form wire:submit.prevent="SimpanData()">
		@if (session('pesan'))
			<div class="alert alert-success">
				{{session('pesan')}}
				<button type="button" class="close" data-dismiss="alert" aria-label="Close">
					<span aria-hidden="true">&times;</span>
			</div>
		@endif
			  <div class="form-group">
			    <label class="text-white" for="">Latar Belakang</label>
			    <textarea type="text" name="latar_belakang" wire:model="latar_belakang" class="form-control" placeholder="Masukkan Latar Belakang" rows="3"></textarea>
			    @error('latar_belakang') <div class="alert alert-danger">{{ $message }}</div> @enderror
			  </div>

			  <div class="form-group">
			    <label class="text-white" for="">Deskripsi Masalah</label>
			    <textarea type="text" name="deskripsi_masalah" wire:model="deskripsi_masalah" class="form-control" placeholder="Masukkan Deskripsi Masalah" rows="5"></textarea>
			    @error('deskripsi_masalah') <div class="alert alert-danger">{{ $message }}</div> @enderror
			  </div>

        <div class="form-group">
          <label class="text-white" for="">Kategori</label>

          <select class="custom-select" id="inputGroupSelect01" type="text" name="kategori" wire:model="kategori">
          <option selected>------- Kategori -------</option>
          @foreach ($kategoris as $datak)
          <option value="{{$datak->kategori_collabs}}">{{$datak->kategori_collabs}}</option>
          @endforeach
        </select>

          @error('kategori') <div class="alert alert-danger">{{ $message }}</div> @enderror
        </div>

			  <button class="btn btn-sm btn-light" data-toggle="modal" data-target="#profile" wire:click.prevent="SimpanData()"><i class="fas fa-fw fa-pen"></i> <strong>Kirim</strong></button>
			</form>
			<!--  -->
	  </div>
	 </div>
@endif
   <div>
      <form class="d-flex" wire:poll>
          <input wire:model="search" class="form-control me-2 border-light" type="text" name="search" placeholder="Cari berdasarkan Kategori Masalah" aria-label="Search" value="">
          <span class="btn btn-outline-light" value="cari"><i class="fas fa-fw fa-search"></i></span>
        </form>
    </div>
    <hr>
    <!-- <h5 class="text-white">Riwayat :</h5> -->
<div class="row row-cols-1 row-cols-md-3 g-4" wire:poll>
	 @foreach ($masalah as $datas)
   <div class="col" wire:poll>
	<div class="card">
  <div class="card-header">
    @foreach ($masalahk as $userku)
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
  	<label><strong>Latar Belakang :</strong></label>
  	<p>{{ $datas->latar_belakang }}</p>
  	<label><strong>Deskripsi Masalah :</strong></label>
  	<p>{{ $datas->deskripsi_masalah }}</p>
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
          <textarea type="text" name="komentarpermasalahan" wire:model="komentarpermasalahan" class="form-control" placeholder="Masukkan Komentar" rows="3"></textarea>
          @error('komentarpermasalahan') <div class="alert alert-danger">{{ $message }}</div> @enderror
        </div>
        
        <button class="btn btn-sm btn-success" data-toggle="modal" data-target="#" wire:click.prevent="SimpanDatas({{ $datas->id }})"><i class="fas fa-fw fa-pen"></i> <strong>Kirim</strong></button>
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
        <a href="/komentar/masalah" class="btn btn-sm btn-success"><i class="fas fa-fw fa-phone"></i> <strong>Komentar</strong></a><br><br>
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
  @if($datak->id_permasalahan == $datas->id)
  
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
          <textarea type="text" name="komentarpermasalahan" class="form-control" placeholder="Masukkan Komentar" rows="2" readonly="" wire:ignore.self>{{ $datak->komentar }}</textarea>
          @error('komentarpermasalahan') <div class="alert alert-danger">{{ $message }}</div> @enderror
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

<br>
<br>

<!-- Hapus Data -->
<!-- Modal -->
@foreach ($masalah as $datas)
<div wire:ignore.self class="modal modal-danger fade" id="delete{{ $datas->id }}">
  <div class="modal-dialog modal-sm">
    <div class="modal-content bg-ku">
      <div class="modal-header">
        <h5 class="modal-title text-white" id="exampleModalLabel"><i class="fas fa-fw fa-tasks"></i> {{ $datas->latar_belakang }}</h5>
        <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body text-white">
        Apakah anda yakin ingin menghapus data ini ?
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Tidak</button>
        <button type="submit" class="btn btn-danger" wire:click.prevent="deleteData({{ $datas->id }})" data-dismiss="modal">Ya</button>
      </div>
    </div>
  </div>
</div>
@endforeach

	<!-- Hapus Data -->
</div>

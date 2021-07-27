<div>
    {{-- Close your eyes. Count to one. That is how long forever feels. --}}
    <div class="card border-light mb-3 bg-ku">
	  <div class="card-body">
	  	<button type="button" class="btn btn-light" data-toggle="modal" data-target="#addsolusi" wire:click.prevent="clearform()"><i class="fas fa-fw fa-plus-circle"></i>
		  <strong>Tambah Data Solusi</strong>
		</button>
    <br>
    <br>
    <div>
      <form class="d-flex" wire:poll>
          <input wire:model="search" class="form-control me-2 border-light" type="text" name="search" placeholder="Cari berdasarkan Kategori" aria-label="Search" value="">
          <span class="btn btn-outline-light" value="cari"><i class="fas fa-fw fa-search"></i></span>
        </form>
    </div>
    <br>
	  	<!-- Pesan -->
	  	@if (session('pesan'))
			<div class="alert alert-success">
				{{session('pesan')}}
				<button type="button" class="close" data-dismiss="alert" aria-label="Close">
					<span aria-hidden="true">&times;</span>
			</div>
		@endif
		<hr>
		<!-- Data -->
	  	<div class="table-responsive" wire:poll>
	<table class="table table-light">
		<thead class="table">
			<tr>
				<th>No</th>
				<th>Deskripsi Solusi</th>
				<th>Deskripsi Penerapan</th>
				<th>Harapan</th>
				<th>File Solusi</th>
				<th>File Penerapan</th>
				<th>Feedback</th>
				<th>Kategori</th>
				<th>Aksi</th>
			</tr>
		</thead>
		<tbody>
			<?php $no=1; ?>
			@foreach ($solusis as $datas)
				<tr>
					<td>{{ $no++ }}</td>
					<td>{{ $datas->deskripsi_solusi }}</td>
					<td>{{ $datas->deskripsi_penerapan }}</td>
					<td>{{ $datas->harapan }}</td>
					<td>
						<a href="{{ $datas->file_solusi }}" class="btn btn-sm btn-success">File Solusi</a>
					</td>
					<td>
						<a href="{{ $datas->file_penerapan }}" class="btn btn-sm btn-success">File Penerapan</a>
					</td>
					<td>{{ $datas->feedback }}</td>
					<td>{{ $datas->kategori }}</td>
					<td>
						<button class="btn btn-sm btn-warning" data-toggle="modal" data-target="#editsolusi" wire:click.prevent="detailData({{ $datas->id }})"><i class="fas fa-fw fa-pen"></i> <strong>Ubah</strong></button>
						<hr>
						<button type="button" class="btn btn-sm btn-danger" data-toggle="modal" data-target="#delete{{ $datas->id }}"><i class="fas fa-fw fa-trash"></i> <strong>Hapus</strong></button>
					</td>
				</tr>
			@endforeach


		</tbody>
	</table>
	  </div>
    {{ $solusis->links() }}
	  </div>
	</div>

	<!-- ------------------------------------------------------------------------------------------------------ -->
	<!-- Tambah Data -->
	<!-- Modal -->
<div wire:ignore.self class="modal fade" id="addsolusi" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
    	
    	
      <div class="modal-header">
        <h5 class="modal-title" id="staticBackdropLabel"><i class="fas fa-fw fa-tasks"></i> Tambah Solusi</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close" wire:click.prevent="clearform()">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body bg-ku">
        <!-- Form -->
        <form wire:submit.prevent="SimpanData()">
		@if (session('pesan'))
			<div class="alert alert-success">
				{{session('pesan')}}
				<button type="button" class="close" data-dismiss="alert" aria-label="Close">
					<span aria-hidden="true">&times;</span>
			</div>
		@endif
    <div class="form-group">
          <label class="text-white" for="">Permasalahan</label>

          <select class="custom-select" id="inputGroupSelect01" type="text" name="id_permasalahan" wire:model="id_permasalahan">
          <option selected>------- Permasalahan -------</option>
          @foreach ($masalahs as $datak)
          <option value="{{$datak->id}}">{{$datak->latar_belakang}}</option>
          @endforeach
        </select>

          @error('id_permasalahan') <div class="alert alert-danger">{{ $message }}</div> @enderror
        </div>

        <div class="form-group">
			<label class="text-white" for="">Deskripsi Solusi</label>
			<textarea type="text" name="deskripsi_solusi" wire:model="deskripsi_solusi" class="form-control" placeholder="Masukkan Deskripsi Solusi" rows="4"></textarea>
			@error('deskripsi_solusi') <div class="alert alert-danger">{{ $message }}</div> @enderror
		</div>

		<div class="form-group">
			<label class="text-white" for="">Deskripsi Penerapan</label>
			<textarea type="text" name="deskripsi_penerapan" wire:model="deskripsi_penerapan" class="form-control" placeholder="Masukkan Deskripsi Penerapan" rows="4"></textarea>
			@error('deskripsi_penerapan') <div class="alert alert-danger">{{ $message }}</div> @enderror
		</div>

		<div class="form-group">
			<label class="text-white" for="">Harapan</label>
			<textarea type="text" name="harapan" wire:model="harapan" class="form-control" placeholder="Masukkan Harapan" rows="2"></textarea>
			@error('harapan') <div class="alert alert-danger">{{ $message }}</div> @enderror
		</div>

		<div class="form-group">
			<label class="text-white" for="">File Solusi</label>
			<textarea type="text" name="file_solusi" wire:model="file_solusi" class="form-control" placeholder="Masukkan Link File" rows="1"></textarea>
			@error('file_solusi') <div class="alert alert-danger">{{ $message }}</div> @enderror
		</div>

		<div class="form-group">
			<label class="text-white" for="">File Penerapan</label>
			<textarea type="text" name="file_penerapan" wire:model="file_penerapan" class="form-control" placeholder="Masukkan Link File" rows="1"></textarea>
			@error('file_penerapan') <div class="alert alert-danger">{{ $message }}</div> @enderror
		</div>

		<div class="form-group">
			<label class="text-white" for="">Feedback</label>
			<textarea type="text" name="feedback" wire:model="feedback" class="form-control" placeholder="Masukkan Feedback" rows="2"></textarea>
			@error('feedback') <div class="alert alert-danger">{{ $message }}</div> @enderror
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
  
        <!-- Form -->
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal" wire:click.prevent="clearform()">Close</button>
        <button type="submit" class="btn btn-primary" wire:submit.prevent="SimpanData()">Simpan</button>
      </div>
    </div>
  </div>
</div>
</form>
	<!-- modal -->
	<!-- Tambah Data -->
<!-- ------------------------------------------------------------------------------------------------------ -->

<!-- ------------------------------------------------------------------------------------------------------ -->
	<!-- Ubah Data -->
	<!-- Modal -->
<div wire:ignore.self class="modal fade" id="editsolusi" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
    	
    	
      <div class="modal-header">
        <h5 class="modal-title" id="staticBackdropLabel"><i class="fas fa-fw fa-tasks"></i> Ubah Solusi</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close" wire:click.prevent="clearform()">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body bg-ku">
        <!-- Form -->
        <form wire:submit.prevent="UbahData()">
		@if (session('pesan'))
			<div class="alert alert-success">
				{{session('pesan')}}
				<button type="button" class="close" data-dismiss="alert" aria-label="Close">
					<span aria-hidden="true">&times;</span>
			</div>
		@endif
    <div class="form-group">
          <label class="text-white" for="">Permasalahan</label>

          <select class="custom-select" id="inputGroupSelect01" type="text" name="id_permasalahan" wire:model="id_permasalahan">
          <option selected>------- Permasalahan -------</option>
          @foreach ($masalahs as $datak)
          <option value="{{$datak->id}}">{{$datak->latar_belakang}}</option>
          @endforeach
        </select>

          @error('id_permasalahan') <div class="alert alert-danger">{{ $message }}</div> @enderror
        </div>

        <div class="form-group">
			<label class="text-white" for="">Deskripsi Solusi</label>
			<textarea type="text" name="deskripsi_solusi" wire:model="deskripsi_solusi" class="form-control" placeholder="Masukkan Deskripsi Solusi" rows="4"></textarea>
			@error('deskripsi_solusi') <div class="alert alert-danger">{{ $message }}</div> @enderror
		</div>

		<div class="form-group">
			<label class="text-white" for="">Deskripsi Penerapan</label>
			<textarea type="text" name="deskripsi_penerapan" wire:model="deskripsi_penerapan" class="form-control" placeholder="Masukkan Deskripsi Penerapan" rows="4"></textarea>
			@error('deskripsi_penerapan') <div class="alert alert-danger">{{ $message }}</div> @enderror
		</div>

		<div class="form-group">
			<label class="text-white" for="">Harapan</label>
			<textarea type="text" name="harapan" wire:model="harapan" class="form-control" placeholder="Masukkan Harapan" rows="2"></textarea>
			@error('harapan') <div class="alert alert-danger">{{ $message }}</div> @enderror
		</div>

		<div class="form-group">
			<label class="text-white" for="">File Solusi</label>
			<textarea type="text" name="file_solusi" wire:model="file_solusi" class="form-control" placeholder="Masukkan Link File" rows="1"></textarea>
			@error('file_solusi') <div class="alert alert-danger">{{ $message }}</div> @enderror
		</div>

		<div class="form-group">
			<label class="text-white" for="">File Penerapan</label>
			<textarea type="text" name="file_penerapan" wire:model="file_penerapan" class="form-control" placeholder="Masukkan Link File" rows="1"></textarea>
			@error('file_penerapan') <div class="alert alert-danger">{{ $message }}</div> @enderror
		</div>

		<div class="form-group">
			<label class="text-white" for="">Feedback</label>
			<textarea type="text" name="feedback" wire:model="feedback" class="form-control" placeholder="Masukkan Feedback" rows="2"></textarea>
			@error('feedback') <div class="alert alert-danger">{{ $message }}</div> @enderror
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
  
        <!-- Form -->
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal" wire:click.prevent="clearform()">Close</button>
        <button type="submit" class="btn btn-primary" wire:submit.prevent="UbahData()">Ubah</button>
      </div>
    </div>
  </div>
</div>
</form>
	<!-- modal -->
	<!-- Ubah Data -->
<!-- ------------------------------------------------------------------------------------------------------ -->

<!-- ------------------------------------------------------------------------------------------------------ -->
	<!-- Hapus Data -->
<!-- Modal -->
@foreach ($solusis as $datas)
<div wire:ignore.self class="modal modal-danger fade" id="delete{{ $datas->id }}">
  <div class="modal-dialog modal-sm">
    <div class="modal-content bg-ku">
      <div class="modal-header">
        <h5 class="modal-title text-white" id="exampleModalLabel"><i class="fas fa-fw fa-tasks"></i> {{ $datas->deskripsi_solusi }}</h5>
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
<!-- ------------------------------------------------------------------------------------------------------ -->

</div>

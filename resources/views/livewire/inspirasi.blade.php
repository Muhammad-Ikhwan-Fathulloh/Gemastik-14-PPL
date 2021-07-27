<div>
    {{-- Do your work, then step back. --}}
    <div class="card border-light mb-3 bg-ku">
	  <div class="card-body">
	  	<button type="button" class="btn btn-light" data-toggle="modal" data-target="#addinspirasi" wire:click.prevent="clearform()"><i class="fas fa-fw fa-plus-circle"></i>
		  <strong>Tambah Data Inspirasi</strong>
		</button>
    <br>
    <br>
    <div>
      <form class="d-flex" wire:poll>
          <input wire:model="search" class="form-control me-2 border-light" type="text" name="search" placeholder="Cari berdasarkan Keterangan" aria-label="Search" value="">
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
				<th>User</th>
				<th>Inspirasi</th>
				<th>Keterangan</th>
				<th>Aksi</th>
			</tr>
		</thead>
		<tbody>
			<?php $no=1; ?>
			@foreach ($inspirasib as $datas)
				<tr>
					<td>{{ $no++ }}</td>
					<td>{{ $datas->id_users }}</td>
					<td>{{ $datas->inspirasi }}</td>
					<td>{{ $datas->keterangan }}</td>
					<td>
						<button class="btn btn-sm btn-warning" data-toggle="modal" data-target="#editinspirasi" wire:click.prevent="detailData({{ $datas->id }})"><i class="fas fa-fw fa-pen"></i> <strong>Ubah</strong></button>
						<hr>
						<button type="button" class="btn btn-sm btn-danger" data-toggle="modal" data-target="#delete{{ $datas->id }}"><i class="fas fa-fw fa-trash"></i> <strong>Hapus</strong></button>
					</td>
				</tr>
			@endforeach


		</tbody>
	</table>
	  </div>
    {{ $inspirasib->links() }}
	  </div>
	</div>

	<!-- ------------------------------------------------------------------------------------------------------ -->
	<!-- Tambah Data -->
	<!-- Modal -->
<div wire:ignore.self class="modal fade" id="addinspirasi" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
    	
    	
      <div class="modal-header">
        <h5 class="modal-title" id="staticBackdropLabel"><i class="fas fa-fw fa-tasks"></i> Tambah Inspirasi</h5>
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
          <label class="text-white" for="">User</label>

          <select class="custom-select" id="inputGroupSelect01" type="text" name="id_users" wire:model="id_users">
          <option selected>------- User -------</option>
          @foreach ($userb as $datak)
          <option value="{{$datak->id}}">{{$datak->name}}</option>
          @endforeach
        </select>

          @error('id_users') <div class="alert alert-danger">{{ $message }}</div> @enderror
        </div>
  <!-- <div class="form-group">
    <label class="text-white" for="">User</label>
    <input type="text" name="id_users" wire:model="id_users" class="form-control" placeholder="Masukkan User">
    @error('id_users') <div class="alert alert-danger">{{ $message }}</div> @enderror
  </div> -->
  <div class="form-group">
    <label class="text-white" for="">Inspirasi</label>
    <input type="text" name="inspirasi" wire:model="inspirasi" class="form-control" placeholder="Masukkan Inspirasi">
    @error('inspirasi') <div class="alert alert-danger">{{ $message }}</div> @enderror
  </div>
  <div class="form-group">
    <label class="text-white" for="">Keterangan</label>
    <input type="text" name="keterangan" wire:model="keterangan" class="form-control" placeholder="Masukkan Keterangan">
    @error('keterangan') <div class="alert alert-danger">{{ $message }}</div> @enderror
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
<div wire:ignore.self class="modal fade" id="editinspirasi" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
    	
    	
      <div class="modal-header">
        <h5 class="modal-title" id="staticBackdropLabel"><i class="fas fa-fw fa-tasks"></i> Ubah Inspirasi</h5>
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
          <label class="text-white" for="">User</label>

          <select class="custom-select" id="inputGroupSelect01" type="text" name="id_users" wire:model="id_users">
          <option selected>------- User -------</option>
          @foreach ($userb as $datak)
          <option value="{{$datak->id}}">{{$datak->name}}</option>
          @endforeach
        </select>

          @error('id_users') <div class="alert alert-danger">{{ $message }}</div> @enderror
        </div>
  <!-- <div class="form-group">
    <label class="text-white" for="">User</label>
    <input type="text" name="id_users" wire:model="id_users" class="form-control" placeholder="Masukkan User">
    @error('id_users') <div class="alert alert-danger">{{ $message }}</div> @enderror
  </div> -->
  <div class="form-group">
    <label class="text-white" for="">Inspirasi</label>
    <input type="text" name="inspirasi" wire:model="inspirasi" class="form-control" placeholder="Masukkan Inspirasi">
    @error('inspirasi') <div class="alert alert-danger">{{ $message }}</div> @enderror
  </div>
  <div class="form-group">
    <label class="text-white" for="">Keterangan</label>
    <input type="text" name="keterangan" wire:model="keterangan" class="form-control" placeholder="Masukkan Keterangan">
    @error('keterangan') <div class="alert alert-danger">{{ $message }}</div> @enderror
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
@foreach ($inspirasib as $datas)
<div wire:ignore.self class="modal modal-danger fade" id="delete{{ $datas->id }}">
  <div class="modal-dialog modal-sm">
    <div class="modal-content bg-ku">
      <div class="modal-header">
        <h5 class="modal-title text-white" id="exampleModalLabel"><i class="fas fa-fw fa-tasks"></i> {{ $datas->inspirasi }}</h5>
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

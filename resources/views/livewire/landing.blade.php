<div>
    {{-- Success is as dangerous as failure. --}}
    <p class="text-white" align="center"><strong>Testimoni :</strong></p>
    <div class="row row-cols-1 row-cols-md-3 g-4" wire:poll>
@foreach ($inspirasib as $datas)
<div class="col">
	<div class="card bg-b">
      <img src="{{ $datas->foto }}" class="card-img-top rounded-circle" width="100px">
      <div class="card-body">
        <p class="text-white" align="center"><strong>{{ $datas->name }}</strong></p>
	    <hr>
	    <p class="text-white" align="center"><strong>{{ $datas->inspirasi }}</strong></p>
	    <hr>
	    <p class="text-white" align="center"><strong>{{ $datas->keterangan }}</strong></p>
      <hr>
      <?php $no=1; ?>
      <div class="row row-cols-1 row-cols-md-3 g-4" wire:poll>
      @foreach ($project as $datak)
      @if($datak->id_user == $datas->id)
      <div class="col">
        <a href="{{ $datak->file_solusi }}" class="btn btn-success">Project {{ $no++ }}</a>
      
      </div>
      @endif
      @endforeach
    </div>
      </div>
    </div>
</div>
@endforeach
</div>
{{ $inspirasib->links() }}
</div>

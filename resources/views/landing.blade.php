@extends('layout.v_templates')

@section('title','Dashboard')
@section('halaman','Dashboard')

@section('content')

<div class="accordion" id="accordionExample">
  <div class="card bg-b">
    <div class="card-header" id="headingOne">
      <h2 class="mb-0">
        <button class="btn btn-link btn-block text-left text-white" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
          <i class="fas fa-fw fa-cogs"></i> Mulai kolaborasi dengan masalah yang sama 
        </button>
      </h2>
    </div>

    <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordionExample">
      <div class="card-body">
      	@livewire('permasalahan')
      </div>
    </div>
  </div>
  <div class="card bg-b">
    <div class="card-header" id="headingTwo">
      <h2 class="mb-0">
        <button class="btn btn-link btn-block text-left collapsed text-white" type="button" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
          <i class="fas fa-fw fa-search-plus"></i> Cari solusi dan mulai kolaborasi
        </button>
      </h2>
    </div>
    <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionExample">
      <div class="card-body">
        @livewire('landingpage')
      </div>
    </div>
  </div>
  <div class="card bg-b">
    <div class="card-header" id="headingThree">
      <h2 class="mb-0">
        <button class="btn btn-link btn-block text-left collapsed text-white" type="button" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
          <i class="fas fa-fw fa-trophy"></i> Testimoni Collabs
        </button>
      </h2>
    </div>
    <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordionExample">
      <div class="card-body">
        @livewire('landing')
      </div>
    </div>
  </div>
</div>
@endsection

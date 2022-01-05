@extends('layouts.app')

@section('content')
<section class="section">
    <div class="section-header">
      <h1>Jam</h1>
    </div>

    @if (session("msg"))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
      <p>{{ session("msg") }}</p>
      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
      </button>
    </div>    
    @endif
    

    <div class="section-body">
      <form action="{{ url("/jam") }}" method="post">
        <div class="card">
          <div class="card-header">
            <h4>Waktu Pembelajaran</h4>
          </div>
          <div class="card-body">
            <div class="form-group col-4">
              <label>Mulai</label>
              <input type="time" value="{{ $jam->mulai ?? "00:00" }}" name="mulai" class="form-control">
            </div>
            <div class="form-group col-4">
              <label>Selesai</label>
              <input type="time" value="{{ $jam->selesai ?? "00:00" }}" name="selesai" class="form-control">
            </div>
            <div class="form-group col-6">
              <button class="btn btn-sm btn-primary pull-right">Edit</button>
              @csrf
            </div>
          </div>
        </div>
      </form>
        
    </div>
</section>
@endsection
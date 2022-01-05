@extends('layouts.app')

@section('content')

    @include('game.create')

    @foreach ($game as $item)
        @php
            $jawaban = Illuminate\Support\Facades\DB::table("game_jawaban")
            ->where("game_soal_id", $item->id)
            ->get();
        @endphp

        
            
        <div class="modal fade bd-example-modal-lg" id="editModal-{{ $item->id }}" tabindex="-1" role="dialog"
            aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <form action="{{ url("/game/$item->id") }}" method="post" enctype="multipart/form-data">

                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Edit game</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <div class="form-group row">
                                <div class="col-12">
                                    <label>Nama Game</label>
                                    <input type="text" name="name" value="{{ $item->name }}" class="form-control" required>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-sm-12 mb-3 mb-sm-0">
                                    <div class="alert"></div>
                                    <div id='img_container'>
                                        <img id="preview" src="{{ asset("storage/$item->gambar") }}" width="500px" alt="your image" title='' />
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <p>Jawaban</p>
                                @foreach ($jawaban as $item2)
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text">
                                            <input type="radio" name="benar" value="{{ $loop->index }}" 
                                                @if ($item2->benar == 1)
                                                    checked
                                                @endif
                                                aria-label="Radio button for following text input">
                                        </div>
                                    </div>
                                    <input type="text" name="jawaban[]" value="{{ $item2->jawaban }}" class="form-control" aria-label="Text input with radio button">
                                </div><br>
                                @endforeach

                            </div>
                        </div>
                        <div class="modal-footer">
                            @csrf
                            @method('PUT')
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Edit</button>
                        </div>

                    </form>
                </div>
            </div>
        </div>


        <div class="modal fade bd-example-modal-lg" id="deleteModal-{{ $item->id }}" tabindex="-1" role="dialog"
            aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <form action="{{ url("/game/$item->id") }}" method="post">

                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Apakah Anda yakin akan menghapus secara permanen ?</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-footer">
                            @csrf
                            @method('DELETE')
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-danger">Hapus</button>
                        </div>

                    </form>
                </div>
            </div>
        </div>
        


    @endforeach
   

    <section class="section">
        <div class="section-header">
            <h1>Game</h1>
        </div>

        @if (session('msg'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <p>{{ session('msg') }}</p>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        @endif


        <div class="section-body">

            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>Daftar Game</h4>
                            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addModal">
                                Tambah
                            </button>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered table-md" id="example">
                                    <thead>
                                        <th>#</th>
                                        <th>Nama</th>
                                        <th>Action</th>
                                    </thead>
                                    <tbody>
                                        @foreach ($game as $item)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>{{ $item->name }}</td>
                                                <td>
                                                    <button type="button" class="btn btn-info" data-toggle="modal" data-target="#editModal-{{ $item->id }}">
                                                        Edit
                                                    </button>
                                                    <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#deleteModal-{{ $item->id }}">
                                                        Hapus
                                                    </button>
                                                </td>
                                            </tr>
                                            

                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </section>

  
    
@endsection

@section('script')
    <script>
        // Code By Webdevtrick ( https://webdevtrick.com )
$("#inputGroupFile01").change(function(event) {  
    RecurFadeIn();
    readURL(this);    
  });
  $("#inputGroupFile01").on('click',function(event){
    RecurFadeIn();
  });
  function readURL(input) {    
    if (input.files && input.files[0]) {   
      var reader = new FileReader();
      var filename = $("#inputGroupFile01").val();
      filename = filename.substring(filename.lastIndexOf('\\')+1);
      reader.onload = function(e) {
        debugger;      
        $('#preview').attr('src', e.target.result);
        $('#preview').hide();
        $('#preview').fadeIn(500);      
        $('.custom-file-label').text(filename);             
      }
      reader.readAsDataURL(input.files[0]);    
    } 
    $(".alert").removeClass("loading").hide();
  }
  function RecurFadeIn(){ 
    console.log('ran');
    FadeInAlert("Wait for it...");  
  }
  function FadeInAlert(text){
    $(".alert").show();
    $(".alert").text(text).addClass("loading");  
  }
  
    </script>
@endsection

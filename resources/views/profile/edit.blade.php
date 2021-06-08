@extends('layouts.master')

@section('content')
@if(auth()->user()->role == 'users')

<section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1></h1>
          </div>
          <div class="col-sm-6">
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">

      <!-- Default box -->
      <div class="card">
        <div class="card-header">
          <h3 class="card-title"></h3>

          <div class="card-tools">
          </div>
        </div>
         <div class="table-responsive btn-sm">
        <div class="card-body btn-sm">
          <form action="{{ url('/profile/edit/' . $user->id) }}" method="post">
          {{ csrf_field() }}

<!---
          <h3 align="center">
            @if(session('success'))
             <div class="alert alert-success">{{session('success')}}</div>
            @endif
            @if(session('error'))
            <div class="alert alert-error">{{session('error')}}</div>
            @endif
          </h3>
-->
        
            <div>
            <div class="form-group">
            <label>Nama Depan</label>
            <input id="name" type="text" name="name" value="{{$user->name}}"  class="form-control @error('name') is-invalid @enderror" required autocomplete="name">
             @error('name')
              <span class="invalid-feedback" role="alert">
                     <strong>{{ $message }}</strong>
              </span>
            @enderror
          </div>
          <div class="form-group">
            <label>Nama Belakang</label>
            <input id="full_name" type="text" name="full_name" value="{{$user->full_name}}"  class="form-control @error('Nama Belakang') is-invalid @enderror" required autocomplete="nama">
             @error('name')
              <span class="invalid-feedback" role="alert">
                     <strong>{{ $message }}</strong>
              </span>
            @enderror
          </div>
          <div>
           <div class="form-group">
                   <label for="jenis_kelamin">Gender :</label> <br>
                    <div class="form-check form-check-inline">
                        <label for="jenis_kelamin">
                            <input type="radio" name="jenis_kelamin" value="Laki-Laki" id="jenis_kelamin" {{$user->jenis_kelamin == 'Laki-Laki'? 'checked' : ''}} >Laki-Laki
                            <input type="radio" name="jenis_kelamin" value="Perempuan" id="jenis_kelamin" {{$user->jenis_kelamin == 'Perempuan'? 'checked' : ''}} >Perempuan
                        </label>
                        </div>
                </div>
             @error('jenis_kelamin')
              <span class="invalid-feedback" role="alert">
                     <strong>{{ $message }}</strong>
              </span>
            @enderror
          </div>
          <div>
            <div class="form-group">
            <label>Alamat</label>
            <input id="alamat" type="text" name="alamat" value="{{$user->alamat}}"  class="form-control @error('alamat') is-invalid @enderror" required autocomplete="alamat">
             @error('alamat')
              <span class="invalid-feedback" role="alert">
                     <strong>{{ $message }}</strong>
              </span>
            @enderror
          </div>
          <div>
            <div class="form-group">
            <label>Tanggal Lahir</label>
            <input id="date" type="date" onkeydown="return false;" name="date" value="{{$user->date}}"  class="form-control @error('date') is-invalid @enderror" required autocomplete="date">
             @error('date')
              <span class="invalid-feedback" role="alert">
                     <strong>{{ $message }}</strong>
              </span>
            @enderror
          </div>
          <div>
           <div>
            <div class="form-group">
            <label>Nomor Telepon</label>
            <input id="number" type="number" name="number" value="{{$user->number}}"  class="form-control @error('nomor') is-invalid @enderror" required autocomplete="nomor">
             @error('nomor')
              <span class="invalid-feedback" role="alert">
                     <strong>{{ $message }}</strong>
              </span>
            @enderror
          </div>
           @if(auth()->user()->role == 'users')
            <button type="submit" class="btn btn-success btn-sm">Simpan</button>
           @endif
          </div>
        </form>
        </div>
      </div>
        <!-- /.card-body -->
        <!-- /.card-footer-->
      </div>
      <!-- /.card -->
    </section>
    <!-- /.content --> 
    
    
    @endif
@endsection
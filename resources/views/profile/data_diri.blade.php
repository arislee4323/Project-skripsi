@extends('layouts.master')
@section('content')

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
          <div class="table-responsive">
           <div class="card-body btn-sm">
          <form action="{{ url('/profile/edit/' . $user->id) }}" method="post">
          {{ csrf_field() }}
            @if(auth()->user()->role == 'admin')
            <div class="form-group">
            <label>Nama Depan</label>
            <label name="name" class="form-control">{{$user->name}}</label></div>
            @endif
            @if(auth()->user()->role == 'users')
            <div class="form-group">
            <label>Nama Depan</label>
            <label name="name" class="form-control">{{$user->name}}</label></div>
            @endif
            @if(auth()->user()->role == 'users')
            <div class="form-group">
            <label>Nama Belakang</label>
            <label name="full_name" class="form-control">{{$user->full_name}}</label></div>
            @endif
             @if(auth()->user()->role == 'admin')
            <div class="form-group">
            <label>Nama Belakang</label>
            <label name="full_name" class="form-control">{{$user->full_name}}</label></div>
            @endif
            <div class="form-group">
            <label>Username</label>
            <label name="Username" class="form-control">{{$user->username}}</label></div>

             <div class="form-group">
            <label>Gender</label>
            <label name="jenis_kelamin" class="form-control">{{$user->jenis_kelamin}}</label></div>

             <div class="form-group">
            <label>Alamat</label>
            <label name="alamat" class="form-control">{{$user->alamat}}</label></div>

            <div class="form-group">
            <label>Tanggal Lahir</label>
            <label name="date" class="form-control">{{$user->date}}</label></div>

             <div class="form-group">
            <label>Email</label>
            <label name="email" class="form-control">{{$user->email}}</label></div>

             <div class="form-group">
            <label>Nomor Telepon</label>
            <label name="number" class="form-control">{{$user->number}}</label></div>
             @if(auth()->user()->role == 'users')
             <button type="submit" class="btn btn-success btn-sm"> <a href="/profile/edit/{{ $user->id  }} " style="color: white;">Edit</a></button> 
             @endif
                       </form>
                    
        <!-- /.card-body -->
        <!-- /.card-footer-->
      </div>
    </div>
  </div>
      <!-- /.card -->

    </section>
    <!-- /.content --> 
    
@endsection
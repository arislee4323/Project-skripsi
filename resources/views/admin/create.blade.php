@extends('layouts.master')

@section('content')
@if(auth()->user()->role == 'admin')

<section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1></h1>
           @if (count($errors) > 0)
    <div class="alert alert-warning">
        <ul>
             @foreach ($errors->all() as $error)
              <li>{{ $error }}</li>
             @endforeach
        </ul>
    </div>
          @endif
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
         <form action="{{ url('/admin/new') }}" method="post" enctype="multipart/form-data">
          {{ csrf_field() }}
          <div class="form-group">
            <label>Nama Depan</label>
            <input type="text" name="name" placeholder="Masukan Depan..." class="form-control">
          </div>
      <div class="form-group">
      <label>Nama Belakang</label>
            <input type="text" name="full_name" placeholder="Masukan Nama Belakang..." class="form-control">
      </div>
      <div class="form-group">
        <label>Username</label>
        <input type="text" name="username" placeholder="Masukan Username..." class="form-control">
      </div>
       <div class="form-group">
      <div class="form-group">
        <label>Jam Buka</label>
        <input type="time" name="jam_buka" class="form-control" onkeydown="return false;">
       </div>
       <div class="form-group">
         <label>Jam Tutup</label>
         <input type="time" name="jam_tutup" class="form-control" onkeydown="return false;">
       </div> 
      <div class="form-group">
        <label>Gender :</label>&nbsp
        <input type="radio" name="jenis_kelamin" value="Laki-Laki">&nbsp Laki-Laki &nbsp&nbsp
        <input type="radio" name="jenis_kelamin" value="Perempuan"> &nbsp Perempuan
      </div>
      <div class="form-group">
        <label>Daftar Harga</label>
        <textarea name="daftar_harga" placeholder="Masukan daftar harga..." class="form-control" rows="3"></textarea>
      </div>
      <div class="form-group">
        <label>Alamat</label>
        <input type="text" name="alamat" placeholder="Masukan Alamat Detail..." class="form-control">
      </div>
      <div class="form-group">
        <label>Tanggal Lahir</label>
        <input type="date" name="date" onkeydown="return false;" placeholder="Data Disesuaikan Oleh Pemiliknya" class="form-control">
      </div>
      <div class="form-group">
        <label>Email</label>
        <input type="email" name="email" placeholder="Masukan Email..." class="form-control">
      </div>
      <div class="form-group">
        <label>Nomor HP</label>
        <input type="number" name="number" placeholder="Masukan Nomor...." class="form-control">
      </div>
      <button type="submit" class="btn btn-success btn-sm">Simpan</button>
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




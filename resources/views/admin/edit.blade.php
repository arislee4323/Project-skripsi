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
          <form action="{{ url('/admin/edit/' . $admin->id) }}" method="post">
          {{ csrf_field() }}
          <div class="form-group">
            <label>Nama Depan</label>
        <input type="text" name="name" placeholder="Nama Depan..." value="{{$admin->name}}" class="form-control">
      </div>
      <div class="form-group">
            <label>Name Belakang</label>
        <input type="text" name="full_name" placeholder="Nama Belakang..." value="{{$admin->full_name}}" class="form-control">
      </div>
      <div class="form-group">
        <label>Username</label>
        <input type="text" name="username" placeholder="Username Harus Diisi..." value="{{$admin->username}}" class="form-control">
      </div>
      <div class="form-group">
        <label>Jam Buka</label>
        <input type="time" name="jam_buka" value="{{ $admin->jam_buka }}"  onkeydown="return false;" class="form-control">
      </div>
      <div class="form-group">
        <label>Jam Tutup</label>
        <input type="time" name="jam_tutup" value="{{ $admin->jam_tutup }}" onkeydown="return false;" class="form-control">
      </div>
       <div class="form-group">
                        <label for="jenis_kelamin">Gender :</label> <br>
                    <div class="form-check form-check-inline">
                        <label for="jenis_kelamin">
                            <input type="radio" name="jenis_kelamin" value="Laki-Laki" id="jenis_kelamin" {{$admin->jenis_kelamin == 'Laki-Laki'? 'checked' : ''}} >Laki-Laki
                            <input type="radio" name="jenis_kelamin" value="Perempuan" id="jenis_kelamin" {{$admin->jenis_kelamin == 'Perempuan'? 'checked' : ''}} >Perempuan
                        </label>
                        </div>
                </div>

      <div class="form-group">
        <label>Daftar Harga</label>
        <textarea name="daftar_harga" placeholder="Masukan Daftar Harga" class="form-control" rows="3">{{ $admin->daftar_harga }}</textarea>
      </div>
      <div class="form-group">
        <label>Alamat</label>
        <input type="text" name="alamat" placeholder="Alamat Harus Sesuai Dengan Alamat Toko..." value="{{$admin->alamat}}" class="form-control">
      </div>
      <div class="form-group">
        <label>Tanggal Lahir</label>
        <input type="date" name="date" onkeydown="return false;" value="{{$admin->date}}" class="form-control">
      </div>
      <div class="form-group">
        <label>Email</label>
        <input type="email" name="email" placeholder="Email Wajib Diisi..." value="{{$admin->email}}" class="form-control">
      </div>
      <div class="form-group">
        <label>Nomor HP</label>
        <input type="number" name="number" placeholder="Masukan Nomor Toko..." value="{{$admin->number}}" class="form-control">
      </div>
          <div>
            <button type="submit" class="btn btn-success btn-sm">Simpan</button>
          </div>
        </form>
        </div>
      </div>
        <!-- /.card-body -->
       
        <!-- /.card-footer-->
      </div>
      <!-- /.card -->

    </section>
    @endif
@endsection
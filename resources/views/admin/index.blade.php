@extends('layouts.master')


@section('content')

@if(auth()->user()->role == 'admin')
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

<style>

  .id{
   float: right;
   margin-left: 20px;
  }

  .username {
    float: right;
    margin-left: 20px;
    
  }

  .name {
    float: right;
    margin-left: 20px;
  }

</style>
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
    <!--
  <form action="/admin/cariid" method="GET" class="id">
    <input type="number" name="cariid" placeholder="Cari ID Admin ..." value="{{ old('cariid') }}">
    <input type="submit" value="CARI" class="btn-success">
  </form>
  <form action="/admin/cariname" method="GET" class="name">
    <input type="text" name="cariname" placeholder="Cari Nama Admin ..." value="{{ old('cariname') }}">
    <input type="submit" value="CARI" class="btn-success">
  </form>
  <form action="/admin/cariemail" method="GET" class="name">
    <input type="email" name="cariemail" placeholder="Cari Email Admin ..." value="{{ old('cariemail') }}">
    <input type="submit" value="CARI" class="btn-success">
  </form>
<form action="/admin/cariusername" method="GET" class="username">
    <input type="text" name="cariusername" placeholder="Cari Username Admin..." value="{{ old('cariusername') }}">
    <input type="submit" value="CARI" class="btn-success">
  </form>
-->
     <!--
        <a href="/admin/new" class="btn btn-success btn-sm">Tambah Admin</a>
      -->
                    <table class="table table-striped btn-sm">
                      <tr>
                        <th>No</th>
                        <th>ID Toko</th>
                        <th>Foto</th>
                        <th>Nama Depan</th>
                        <th>Nama Belakang</th>
                        <th>Username</th>
                        <th>Jam Buka</th>
                        <th>Jam Tutup</th>
                        <th>Gender</th>
                        <th>Alamat</th>
                        <th>Daftar Harga</th>
                        <th>Date</th>
                        <th>Email</th>
                        <th>Nomor</th>
                        <th>Action</th>
                      </tr>
                      @php
                      $no = 1;
                      @endphp
                      @foreach($admins as $admin)
                      <tr>
                        <td>{{ $no++ }}</td>
                        <td>{{ $admin->id }}</td>
                        <td><img src="/uploads/avatars/{{ $admin->user->avatar }}" class="img-circle elevation-2" alt="User Image" style="width:50px;height:50px;"></td>
                        <td>{{ $admin->name }}</td>
                        <td>{{ $admin->full_name }}</td>
                        <td>{{ $admin->username }}</td>
                        <td>{{ $admin->jam_buka }}</td>
                        <td>{{ $admin->jam_tutup }}</td>
                        <td>{{ $admin->jenis_kelamin }}</td>
                        <td>{{ $admin->alamat }}</td>
                        <td><textarea rows="6" cols="20" onkeydown="return false;">{{ $admin->daftar_harga }}</textarea></td>
                        <td>{{ $admin->date }}</td>
                        <td>{{ $admin->email }}</td>
                        <td>{{ $admin->number }}</td>
                        <td>
                          <a href="/admin/edit/{{ $admin->id  }}" class="btn btn-success btn-sm">Edit</a>
      
                          @if(auth()->user()->role == '123')
                          <!--
                          <form action="/admin/delete/{{$admin->id}}" method="post">
                          {{ csrf_field() }}
                          {{ method_field('DELETE') }}
                          <button type="submit" class="btn btn-danger btn-sm">Hapus</button>
                          </form>
                        -->
                          @endif
                        </td>
                      </tr>
                      @endforeach
                    </table>
                    <br>
                    <!--
                  {{ $admins->links() }}
                  <br>
                  <label style="color: #123c69">JUMLAH DATA ADMIN SAAT INI: {{ $admins->total() }}</label>
                -->
           </div>
         </div>
     
        <!-- /.card-body -->
        <div class="card-footer">
         
        </div>
        <!-- /.card-footer-->
      </div>
      <!-- /.card -->

    </section>



    
    @endif
    @include('sweetalert::alert')
    @endsection








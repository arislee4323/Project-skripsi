@extends('layouts.master')

@section('content')
@if(auth()->user()->role =='admin')

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
   margin-left: 3px;
  }

  .username {
    float: left;
    margin-left: 3px;
    
  }
  .email {
    float: left;
    margin-left: 3px;
    
  }
  .nomor {
    float: left;
    margin-left: 3px;
    
  }

  .name {
    float: right;
    margin-left: 3px;
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
  <form action="/user/cariid" method="GET" class="id">
    <input type="number" name="cariid" placeholder="Cari ID User..." value="{{ old('cariid') }}">
    <input type="submit" value="CARI" class="btn-success">
  </form>

  <form action="/user/cariname" method="GET" class="name">
    <input type="text" name="cariname" placeholder="Cari Nama User..." value="{{ old('cariname') }}">
    <input type="submit" value="CARI" class="btn-success">
  </form>

  <form action="/user/cariemail" method="GET" class="email">
    <input type="email" name="cariemail" placeholder="Cari Email User..." value="{{ old('cariemail') }}">
    <input type="submit" value="CARI" class="btn-success">
  </form>

   <form action="/user/carinomor" method="GET" class="nomor">
    <input type="number" name="carinomor" placeholder="Cari Nomor User..." value="{{ old('carinomor') }}">
    <input type="submit" value="CARI" class="btn-success">
  </form>

<form action="/user/cariusername" method="GET" class="username">
    <input type="text" name="cariusername" placeholder="Cari Username User..." value="{{ old('cariusername') }}">
    <input type="submit" value="CARI" class="btn-success">
  </form>
                    <table class="table table-striped btn-sm">
                      <tr>
                        <th>NO</th>
                        <th>ID User</th>
                        <th>Foto</th>
                        <th>Username</th>
                        <th>Nama</th>
                        <th>Gender</th>
                        <th>Tanggal Lahir</th>
                        <th>Nomor</th>
                        <th>Alamat</th>
                        <th>Email</th>
                        <th>Action</th>
                      </tr>
                      @php
                      $no = 1;
                      @endphp
                      @foreach($users as $user)
                      <tr>
                       
                        <td>{{ $no++ }}</td>
                        <td>{{ $user->id }}</td>
                        <td><img src="/uploads/avatars/{{ $user->avatar }}" class="img-circle elevation-2" alt="User Image" style="width:50px;height:50px;"></td>
                        <td>{{ $user->username }}</td>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->jenis_kelamin }}</td>
                        <td>{{ $user->date }}</td>
                        <td>{{ $user->number }}</td>
                        <th>{{ $user->alamat }}</th>
                        <td>{{ $user->email}}</td>
                        <td>
                          <button type="submit" onclick="DeleteUser('{{ $user->id }}')" class="btn btn-danger btn-sm">Hapus</button>
                        </td>
                      </tr>
                    @endforeach
                    </table>
                    @endif
                   {{ $users->links() }}
                   <br>
                   <label style="color:#123c69">JUMLAH DATA USER SAAT INI: {{$users->total() }}</label>
               </div>
        </div>

        <!-- /.card-body -->
        
        <!-- /.card-footer-->
      </div>
      <!-- /.card -->

    </section>
    <!-- /.content --> 
    @include('sweetalert::alert')

   <div class="modal fade" id="deleteModalUser" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                      <div class="modal-dialog">
                      <div class="modal-content">
                      <div class="modal-header">
                      <h5 class="modal-title" id="staticBackdropLabel">Konfirmasi Hapus</h5>
                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                      </div>
                      <div class="modal-body">
                       Apakah Anda Yakin Akan Membatalkan Antrian

                      </div>
                      <div class="modal-footer">
                       <form id="delModalUser" action="/user/delete/" method="post">
                                 {{ csrf_field() }}
                                 {{ method_field('DELETE') }}
                                 <input type="hidden" name="id">
                                 <button type="submit" class="btn btn-danger btn-sm">Ya</button>
                                 <button type="button" class="btn btn-sm btn-secondary" data-bs-dismiss="modal">Tidak</button>
                        </form>
                     
                      </div>
                      </div>
                      </div>
                      </div>
@endsection


@section('scripts')
<script>
  function DeleteUser(id)
  {
  const defer = $.Deferred();
    let finished = defer.then(
      (param) => { 
         $('#deleteModalUser').modal('show');
        return 'ok';
      }
    )
    .then(
      (param) => {
        const modal = $('#delModalUser');
         setTimeout(() => {
         console.log(modal.html())
          modal.find('input[name="id"]').val(id);
         }, 100);        
      }
    );
    defer.resolve('ok');
    finished.done(() => {
     
     console.log($('input:hidden[name="id"]').val())
    });  
  }
</script>
@endsection

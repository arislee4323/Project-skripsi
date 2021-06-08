@extends('layouts.master')
@section('content')

<section class="content-header">
       <section class="content">

      <!-- Default box -->
      <div class="card">
        <div class="card-header table-responsive"><br>
         <center><label>Barbershop</label> <label style="color: #7CFC00">Danoe</label></center>
          <div class="card-tools">
          </div>
        </div>
      <div class="table-responsive">
        <div class="card-body btn-sm">
                      <div class="table-responsive">
                     <table class="table table-striped btn-sm">
                      <center>
                       <h1><a href="/booking/{{ $admin->id}}">
                        <img src="/uploads/avatars/{{ $admin->user->avatar }}" style="width:500px; height:300px;"></a></h1>
                      </center>
                      <br>
                      <br>
                      <h4 style="color: black;">TOKO INI SEDANG: 
                        @if($admin->status == 1)
                          <label style="color: #00FA9A;">BUKA</label>
                        @else
                          <label style="color: red;">TUTUP</label>
                        @endif
                      </h4>
                    </table>
                  </div>
                </div>    
        </div>
        <!-- /.card-body -->
        
        <!-- /.card-footer-->
      </div>
      <!-- /.card -->

    </section><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">

      <!-- Default box -->
      <div class="card">
        <div class="card-header">
          <h6>
          <label style="color: ">Alamat: {{ $admin->alamat }}</label>
        </h6>
          <div class="card-tools ">
          </div>
        </div>
        <div class="table-responsive">
        <div class="card-body btn-sm">  
                     <table class="table table-striped btn-sm">
                      <tr>
                       <th>Daftar Harga</th>
                       <th>Jam Buka</th> 
                      </tr>
                      <tr>
                        <td><textarea onkeydown="return false;" rows="6" cols="30"> {{ $admin->daftar_harga}}</textarea></td>
                        <td>
                      {{ $admin->jam_buka }} -
                      {{ $admin->jam_tutup}}
                    </td>
                    </tr>
                    </table>
        </div>
      </div>
        <!-- /.card-body -->
        
        <!-- /.card-footer-->
      </div>
      <!-- /.card -->

    </section>

    <section class="content">

      <!-- Default box -->
      <div class="card">
        <div class="card-header">
          <h3 class="card-title btn-sm"><label>Hubungi Barbershop:&nbsp;&nbsp;<span class="fab fa-whatsapp"> {{ $admin->number}}</label></h3>
       
          <div class="card-tools ">
          </div>
        </div>
        <div class="table-responsive">
        <div class="card-body btn-sm">  
        <table class="table table-striped btn-sm">
        <?php
        //$current_user_id = auth()->user()->id;
        $bookings_perpage = json_decode(json_encode($bookings), true);
        $offset = (intval($bookings_perpage['current_page']) -1 ) * 10;
        //$btn_disabled = (count($booked_user) > 0 && $current_user_id == $booked_user[0]->user_id) ? 'disabled': '';
        ?>
                      @if(auth()->user()->role == 'users')
                       <a href="/booking/new/{{ $admin->id }}" class="btn btn-success btn-sm {{$btn_disabled}} ">Tambah Antrian Anda</a>
                      @endif
                       @if(auth()->user()->role == 'admin')
                       <a href="/booking/new/{{ $admin->id }}" class="btn btn-success btn-sm">Tambah Antrian Anda</a><hr>
                      @endif
                      @if(auth()->user()->role == 'admin')
                       <a href="/activity/new/{{ $admin->id }}" class="btn btn-success btn-sm">Buka Toko Anda</a>
                      @endif
                      @if(auth()->user()->id)
                      <tr>
                        <th>Foto</th>
                        <th>Nama</th> 
                        <th>Nomor Telepon</th> 
                        <th>Antrian Anda </th>
                        <th>Pesan</th>
                        <th>tanggal membuat booking</th>
                        <th>tanggal merubah booking</th>
                        @if(auth()->user()->role == 'admin')
                        <th></th>
                        @endif
                        <th>Action</th>
                         @if(auth()->user()->role == 'users')
                        <th></th>
                        @endif
                        @if(auth()->user()->role == 'admin')
                        <th></th>
                         @endif
                      </tr>
                       @php
                      $no = 1;
                      @endphp
                      
                     @foreach($bookings as $booking)
                        <tr>
                         <td>
                          @foreach($users as $user )
                              @if( $user->id == $booking->user_id)
                              <img src="/uploads/avatars/{{$user->avatar}}" style="width:50px; height:50px;"></a>
                              @endif
                          @endforeach
                         </td>
                          <td>
                         @foreach($users as $user)
                         @if( $user->id == $booking->user_id)
                              {{ $user->name }} 
                              @endif
                          @endforeach
                        </td>
                          <td>
                            @if(auth()->user()->role == 'users')
                            @if($booking->user_id == auth()->user()->id)
                               {{ $user->number}}
                            @else
                              xxxxxxxxxxxx
                            @endif
                          </td>
                         @endif

                         @if(auth()->user()->role == 'admin')
                          @foreach($users as $user)
                         @if( $user->id == $booking->user_id)
                              {{ $user->number }} 
                              @endif
                          @endforeach
                         @endif
                         <td>{{ $offset+$no++ }}</td>

                          @if(auth()->user()->role == 'admin')
                            <td><textarea rows="3" cols="20" onkeydown="return false;">{{ $booking->pesan }}</textarea></td>
                         @endif
                         
                         @if(auth()->user()->role == 'users')
                            <td><textarea rows="3" cols="20" onkeydown="return false;">
                              @if($user->id ==  $booking->user_id)
                              {{ $booking->pesan }}
                              @endif
                            </textarea></td>
                         @endif

                          <td>{{ $booking->created_at }}</td>
                          <td>{{ $booking->updated_at }}</td>
                          <td>
                            @if(auth()->user()->role == 'users')
                            @if($booking->user_id == auth()->user()->id)
                              <a href="/booking/edit/{{ $booking->id }} " class="btn btn-success btn-sm"><label>Edit Antrian Anda</label></a><br><br>
                                 <button onclick="handleDeleteUser('{{ $booking->id }}')" type="submit" class="btn btn-danger btn-sm">Batalkan Antrian Anda</button> 
                            @else
                            @endif
                                 </td>
                            @endif
                           <td>
                              @if(auth()->user()->role == 'admin')
                              @if($booking->user_id == auth()->user()->id)  
                             <a href="/booking/edit/{{ $booking->id }} " class="btn btn-success btn-sm"><label>Edit Antrian Anda</label></a><br><br>
                              @else
                            @endif
                                 <button onclick="handleDeleteAdmin('{{ $booking->id }}')" type="submit" class="btn btn-danger btn-sm">Selesaikan Antrian</button>
                            @endif
                          </td>
                        </tr>
                      
                      @endforeach
                    </table>
                    @endif
                    
                    {{ $bookings->links() }}
                    <br>
                    <label style="color:#123c69">JUMLAH ANTRIAN SAAT INI: {{$bookings->total() }}</label>
        </div>
      </div>
        <!-- /.card-body -->
        
        <!-- /.card-footer-->
      </div>
      <!-- /.card -->

    </section>   
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
                       <form id="modalDelUser" action="/booking/delete/user" method="post">
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
                      <div class="modal fade" id="deleteModalAdmin" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                      <div class="modal-dialog">
                      <div class="modal-content">
                      <div class="modal-header">
                      <h5 class="modal-title" id="staticBackdropLabel">Konfirmasi Selesaikan Antrian</h5>
                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                      </div>
                      <div class="modal-body">
                      Apakah Anda Yakin akan Menyelesaikan Antrian
                      </div>
                      <div class="modal-footer">
                      <button type="button" class="btn btn-sm btn-secondary" data-bs-dismiss="modal">Tidak</button>
                      <form id="modalDelAdmin"  action="/booking/delete/" method="post">
                                 {{ csrf_field() }}
                                 {{ method_field('DELETE') }}
                                 <input type="hidden" name="id">
                                 <button type="submit" class="btn btn-danger btn-sm">Ya</button>
                                </form>
                    </div>
                    </div>
                    </div>
                    </div>

@endsection

@section('scripts')
<script>
  function handleDeleteUser(id)
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
        const modal = $('#modalDelUser');
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

  function handleDeleteAdmin(id)
  {

   
    const defer = $.Deferred();
    let finished = defer.then(
      (param) => { 
         $('#deleteModalAdmin').modal('show')
        return 'ok';
      }
    )
    .then(
      (param) => {
        const modal = $('#modalDelAdmin');
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





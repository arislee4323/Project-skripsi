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
                      @if(auth()->user()->role == 'users')
                       <a href="/booking/new/{{ $admin->id }}" class="btn btn-success btn-sm">Tambah Antrian Anda</a>
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
                        <th>Nomor HP</th> 
                        <th>Antrian Anda </th>
                        <th>Pesan</th>
                        <th>tanggal membuat booking</th>
                        <th>tanggal merubah booking</th>
                        @if(auth()->user()->role == 'admin')
                        <th></th>
                        @endif
                        <th>Action</th>
                         @if(auth()->user()->role == 'user')
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
                         <td>{{ $no++ }}</td>

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
                             <a href="/booking/edit/{{ $booking->id }} " class="btn btn-success btn-sm">Edit Antrian Anda
                             </a><br><br>
                               <form action="/booking/delete/{{$booking->id}}" method="post">
                                 {{ csrf_field() }}
                                 {{ method_field('DELETE') }}
                                 <button type="submit" class="btn btn-danger btn-sm">Batalkan Antrian Anda</button>
                                </form>
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
                               <form action="/booking/delete/{{$booking->id}}" method="post">
                                 {{ csrf_field() }}
                                 {{ method_field('DELETE') }}
                                 <button type="submit" class="btn btn-danger btn-sm">Selesaikan Antrian</button>
                                </form>
                                @endif
                          </td>
                        </tr>
                      
                      @endforeach
                    </table>
                    @endif
                    
                    {{ $bookings->links() }}
  
        </div>
      </div>


        <!-- /.card-body -->
        
        <!-- /.card-footer-->
      </div>
      <!-- /.card -->

    </section>   
@endsection


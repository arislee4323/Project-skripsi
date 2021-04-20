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
          <h3 class="card-title">Profile</h3>

          <div class="card-tools">
          </div>
        </div>
     <div class="table-responsive">
       <div class="card-body btn-sm">
         <h3 align="center">
            @if(session('success'))
             <div class="alert alert-success">{{session('success')}}</div>
            @endif
            @if(session('error'))
            <div class="alert alert-error">{{session('error')}}</div>
            @endif
          </h3>
                   <div class="row">
                     <div class="col-md-10 col-offset-1">
                       @if(auth()->user()->role == 'users')
                        <img class="btn-sm" src="/uploads/avatars/{{ $user->avatar }}" style="width: 150px; height:150px; float:left; border-radius: 50%; margin-right: 25px;">
                      @endif
                     
                      @if(auth()->user()->role == 'admin')
                        <img class="btn-sm" src="/uploads/avatars/{{ $user->avatar }}" style="width: 150px; height:150px; float:left; border-radius: 50%; margin-right: 25px;">
                      @endif
                       <h2>{{ $user->name }}</h2><br><br><br>
                       <form enctype="multipart/form-data" action="/profile" method="POST">
                         <br>
                         <br>
                         @if(auth()->user()->role == 'admin')
                        <input type="file" name="avatar">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                         @endif
                         @if(auth()->user()->role == 'users')
                        <input type="file" name="avatar">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                         @endif
                         <div class="card-body"><br>
                          <a href="/profile/password " style="color: black;">Edit Password</a><br>
                         <form action="{{ url('/profile/password') }}" method="post">
                         {{ csrf_field() }}
                       <a href="/profile/data_diri/{{ $user->id  }} " style="color: black;">Lihat profil</a><br>
                        @if(auth()->user()->role == 'admin')
                        <input type="submit" class="pull-right btn btn-sm btn-success">
                        @endif
                      
                        @if(auth()->user()->role == 'users')
                        <input type="submit" class="pull-right btn btn-sm btn-success">
                        @endif
                       </form>
                     </div>
                   </div>

                </div>
           </div>
            
        <!-- /.card-body -->
        
        <!-- /.card-footer-->
      </div>
      <!-- /.card -->

    </section>

     
@endsection
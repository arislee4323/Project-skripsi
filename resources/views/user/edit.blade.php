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

    <!-- Main content -->
    <section class="content">

      <!-- Default box -->
      <div class="card">
        <div class="card-header">
          <h3 class="card-title"></h3>

          <div class="card-tools">
            <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
              <i class="fas fa-minus"></i></button>
            
          </div>
        </div>
       <div class="table-responsive">
        <div class="card-body btn-sm">
          <form action="{{ url('/user/edit/' . $user->id) }}" method="post">
          {{ csrf_field() }}
          <div class="form-group">
            <label>Name</label>
            <input type="text" name="name" placeholder="Masukan Nama Anda..." value="{{$user->name}}" class="form-control"></div>
          <div class="form-group">
            <label>Email</label>
            <input type="email" name="email" placeholder="Masukan Email Anda..." value="{{$user->email}}" class="form-control"></div>
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
    <!-- /.content --> 

   @endif
@endsection
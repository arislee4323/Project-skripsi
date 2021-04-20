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
       <div class="table-responsive btn-sm">
        <div class="card-body">
        <form action="{{ url('/booking/new/'. $admin->id) }}" method="post">
          {{ csrf_field() }}


        <div class="form-group">
        <label>Pesan</label>
        <textarea name="pesan" placeholder="Masukan Pesan Jika Diperlukan..." class="form-control" rows="3"></textarea>
        <input type="hidden" name="bb_id" value="{{ $admin->id }}">
        <input type="hidden" name="user_id" value="{{ auth()->user()->id}}">
        </div>

      <button type="submit" class="btn btn-success btn-sm">Booking</button>
    </form>
        </div>
      </div>
        <!-- /.card-body -->
       
        <!-- /.card-footer-->
      </div>
      <!-- /.card -->

    </section>

@endsection
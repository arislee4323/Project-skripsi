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
        <div class="card-body">
          <form action="{{ url('/status/'. $admin->id ) }}" method="post">
          {{ csrf_field() }}
          @if(auth()->user()->role == 'admin')
           <div class="form-group">
            <label>Buka Atau Tutup Toko Anda</label><br>
            <input name="status" type="radio" value="1"  class="@error('status') is-invalid @enderror" required autocomplete="status" {{$admin->status == '1'? 'checked' : ''}}>BUKA<br>
            <input name="status" type="radio" value="0" class="@error('status') is-invalid @enderror"  required autocomplete="status" {{$admin->status == '0'? 'checked' : ''}}>TUTUP
            <input type="hidden" name="bb_id" value="{{ $admin->id }}">
             @error('status')
              <span class="invalid-feedback" role="alert">
                     <strong>{{ $message }}</strong>
              </span>
            @enderror
          </div>
           @endif

           
      <button type="submit" class="btn btn-success btn-sm">Simpan</button>
    </form>
        </div>
        <!-- /.card-body -->
       
        <!-- /.card-footer-->
      </div>
      <!-- /.card -->

    </section>

@endsection


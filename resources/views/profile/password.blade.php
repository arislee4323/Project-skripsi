@extends('layouts.master')
@section('content')

<section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1></h1>
          </div>
           @if(session('errorMsg'))
        <div class="alert alert-icon alert-danger alert-dismissible fade in" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="close">
                <span aria-hidden="true">&times;</span>
                
            </button>
            <i class="mdi mdi-check-all"></i>
            <strong>On Snap !</strong>{{session ('errorMsg') }}
        </div>
        @endif
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
         
                     <form action="{{ url('/profile/password/edit') }}" method="post">
                       {{ csrf_field() }}

                        <div class="form-group row">
                            <label for="old_password" class="col-md-4 col-form-label text-md-right">{{ __('Old Password') }}</label>

                            <div class="col-sm-6">
                                <input id="old_password" type="password" class="form-control @error('old_password') is-invalid @enderror" name="old_password" value="{{ old('old_password') }}" required autocomplete="old_password" autofocus>

                                @error('old_password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('New Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>

                        <div class="form-group row btn-sm">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-success btn-sm">
                                    {{ __('Submit') }}
                                </button>
                            </div>
                        </div>
                    </form>      
                    </table>
                  </div>
        </div>
        <!-- /.card-body -->
       
        <!-- /.card-footer-->
      </div>
      <!-- /.card -->

    </section>
    <!-- /.content --> 
    
@endsection
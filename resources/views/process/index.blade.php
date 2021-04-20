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
          <style type="text/css">
    .pagination li{
      float: left;
      list-style-type: none;
      margin:5px;
    }
  </style>
 <div class="table-responsive btn-sm">   
                    <table class="table table-striped">
                      <tr>
                        <th></th>
                        <th></th>
                        <th></th>
                        <th></th>
                      </tr>
                      @foreach($admins as $admin)
                      <tr>
                        <td class="btn-sm"><a href="/booking/{{ $admin->id}}">
                        <img src="/uploads/avatars/{{ $admin->user->avatar }}" style="width: 200px; height:160px;"></a>
                      </td>
                        <td>
                          <br>
                          <br>
                          <br>
                          </td>
                          <td></td>
                          
                          <td><br><br><br><a href="/booking/{{ $admin->id}}" style="color: black"><label style="font-size: 30px;">Barbershop</label> <label style="color: #7CFC00; font-size: 30px; text-align: 30px">Danoe</label></td>
                      </tr>
                      @endforeach
                    </table>
                  </div>
        </div>

        <!-- /.card-body -->
       
        <!-- /.card-footer-->
      </div>
      <!-- /.card -->

    </section>
@endsection


@extends('layouts.master')
@section('content')




<section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            
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
					<div class="form-group btn-sm">

				<div class="form-group">
        <label>Pesan</label>
        <textarea name="pesan" placeholder="Merubah Pesan Jika Diperlukan..." class="form-control" rows="3">{{ $booking->pesan }}</textarea>
        </div>
          <div>
						<button type="submit" onclick="handleEdit()" class="btn btn-success btn-sm">Simpan</button>
					</div>
        </div>
      </div>
        <!-- /.card-body -->
        
        <!-- /.card-footer-->
      </div>
      <!-- /.card -->

    </section>


    <div class="modal fade" id="editModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="staticBackdropLabel">Konfirmasi Edit Antrian</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
       Apakah Anda Yakin akan Melakukan Edit Antrian
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-sm btn-secondary" data-bs-dismiss="modal">Tidak</button>
        <form action="{{ url('/booking/edit/' . $booking->id) }}" method="post">
          {{ csrf_field() }}
          <button type="submit" class="btn btn-sm btn-success">Ya</button>
        </form>
      </div>
    </div>
  </div>
</div>

@endsection


@section('scripts')

<script>
   function handleEdit(id)
  {

    $('#editModal').modal('show')
  }

</script>
@endsection
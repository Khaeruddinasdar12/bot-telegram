@extends('layouts.template')

@section('title')
Data User
@endsection

@section('content')
<!-- Content Header (Page header) -->
<div class="content-header">
</div>
<!-- /.content-header -->
<section class="content">
  <div class="row">
    <div class="col-12">

      <div class="card">
        <div class="card-header">
          <h2 class="card-title"><i class="fa fa-users"></i> Data User</h2>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
          <div class="card">
            <div class="card-body">
             <div class="float-left">
              <h4>Data User</h4>
            </div>
            <div class="float-right">
              <button class="btn btn-primary btn-sm" data-toggle="modal" data-target="#pesan-siaran"><i class="fa fa-paper-plane"></i> Kirim Pesan Siaran</button>
            </div>
            <div class="table-responsive-sm">
              <table class="table table-bordered" style="width:100% !important; ">
                <thead>
                  <tr>
                    <th>No.</th>
                    <th>Nama Kontak</th>
                    <th>Waktu Start</th>
                  </tr>
                </thead> 
                <tbody>
                    @php $no = 1;@endphp
                    @foreach($data as $dt)
                    <tr>
                        <td>{{$no++}}</td>
                        <td>{{$dt->nama_kontak}}</td>
                        <td>{{$dt->created_at}}</td>
                    </tr>
                    @endforeach
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
</section>
<!--MODALS-->
<!-- Modal Kirim Pesan Siaran -->
<div class="modal fade bd-example-modal" id="pesan-siaran" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <form method="post" id="kirim">
      @csrf
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Kirim Pesan Siaran </h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>

        <div class="modal-body">
          <div class="form-group">
            <label>Pesan</label>
            <textarea class="form-control" rows="5" name="pesan"></textarea>
          </div>
        </div>

        <div class="modal-footer">
          <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Tutup</button>
          <button type="submit" class="btn btn-primary btn-sm">Kirim Pesan Siaran</button>
        </div>
      </div>
    </form>
  </div>
</div>
<!-- End Modal Kirim Pesan Siaran -->
<!-- END MODALS -->
@endsection

@section('js')
<script type="text/javascript">
 $('#kirim').submit(function(e){ // kirim pesan siaran
    e.preventDefault();
    var request = new FormData(this);
    var endpoint= '{{route("broadcast")}}';
    $.ajax({
      url: endpoint,
      method: "POST",
      data: request,
      contentType: false,
      cache: false,
      processData: false,
            // dataType: "json",
            success:function(data){
              $('#kirim')[0].reset();
              $('#pesan-siaran').modal('hide');
              good(data.status, data.pesan);
            },
            error: function(xhr, status, error){
              var error = xhr.responseJSON; 
              if ($.isEmptyObject(error) == false) {
                $.each(error.errors, function(key, value) {
                  gagal(key, value);
                });
              }
            } 
          }); 
  });
</script>
@endsection

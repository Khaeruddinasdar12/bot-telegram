@extends('layouts.template')

@section('title')
Pengerjaan Sedang Berlangsung
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
          <h2 class="card-title"><i class="fa fa-tags"></i> Data Pengerjaan</h2>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
          <div class="card">
            <div class="card-body">
             <div class="float-left">
              <h4>Data Pengerjaan Sedang Berlangsung</h4>
            </div>
            <div class="table-responsive-sm">
              <table class="table table-bordered" style="width:100% !important; ">
                <thead>
                  <tr>
                    <th>No.</th>
                    <th>Nama Kontak</th>
                    <th>Jenis Pengerjaan</th>
                    <th>Keterangan</th>
                    <th>Status</th>
                    <th>Waktu</th>
                    <th>Action</th>
                  </tr>
                </thead> 
                <tbody>
                    @php $no = 1;@endphp
                    @foreach($data as $dt)
                    <tr>
                        <td>{{$no++}}</td>
                        <td>{{$dt->chat->telegramuser->nama_kontak}}</td>
                        <td>{{$dt->chat->pesan}}</td>
                        <td>{{$dt->keterangan}}</td>
                        <td><span class="badge badge-warning">Masih berlangsung</span></td>
                        <td>{{$dt->created_at}}</td>
                        <td><button class="btn btn-primary btn-xs" data-toggle="modal" data-target="#keterangan" data-id="{{$dt->id}}" data-keterangan="{{$dt->keterangan}}" title="tambah keterangan" </button><i class="fa fa-plus"></i></button>
                        <button class="btn btn-success btn-xs" data-toggle="modal" data-target="#konfirmasi" data-id="{{$dt->id}}" data-keterangan="{{$dt->keterangan}}" title="selesaikan pengerjaan" </button><i class="fa fa-check-square"></i></button></td>
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
<!-- Modal Tambah Keterangan -->
<div class="modal fade bd-example-modal" id="keterangan" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <form method="post" id="kirim">
      @csrf
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Tambah Keterangan (catatan) </h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>

        <div class="modal-body">
            <input type="hidden" id="keterangan-id" name="pengerjaan_id">
          <div class="form-group">
            <label>keterangan</label>
            <textarea class="form-control" rows="5" name="keterangan" id="keterangan"></textarea>
          </div>
        </div>

        <div class="modal-footer">
          <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Tutup</button>
          <button type="submit" class="btn btn-primary btn-sm">Submit</button>
        </div>
      </div>
    </form>
  </div>
</div>
<!-- End Modal Tambah Keterangan -->


<!-- Modal Konfirmasi -->
<div class="modal fade" id="konfirmasi" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    
      <div class="modal-content">
          <form method="post" id="konfirmasi-post">
      @csrf
        <div class="modal-header">
          <h5 class="modal-title">Pekerjaan Telah Selesai ?</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>

        <div class="modal-body">
            <input type="hidden" id="konfirmasi-id" name="pengerjaan_id">
          <div class="form-group">
            <label>keterangan</label>
            <textarea class="form-control" rows="5" name="keterangan" id="keterangan-konfirmasi"></textarea>
          </div>
        </div>

        <div class="modal-footer">
          <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Tutup</button>
          <button type="submit" class="btn btn-primary btn-sm">Ya, Selesai</button>
        </div>
        </form
      </div>
    
  </div>
</div>
<!-- End Modal Konfirmasi -->
<!-- END MODALS -->
@endsection

@section('js')
<script type="text/javascript">
$('#keterangan').on('show.bs.modal', function (event) { //tambah keterangan
  var button = $(event.relatedTarget)
  var id = button.data('id')
  var keterangan = button.data('keterangan')
  
  var modal = $(this)
  modal.find('.modal-body #keterangan-id').val(id)
  modal.find('.modal-body #keterangan').val(keterangan)
})

$('#konfirmasi').on('show.bs.modal', function (event) { // konfirmasi pengerjaan
  var button = $(event.relatedTarget)
  var id = button.data('id')
  var keterangan = button.data('keterangan')
  
  var modal = $(this)
  modal.find('.modal-body #konfirmasi-id').val(id)
  modal.find('.modal-body #keterangan-konfirmasi').val(keterangan)
})


$('#konfirmasi-post').submit(function(e){ // konfirmasi pengerjaan 
    e.preventDefault();
    var request = new FormData(this);
    var endpoint= '{{route("konfirmasi.pengerjaan")}}';
    $.ajax({
      url: endpoint,
      method: "POST",
      data: request,
      contentType: false,
      cache: false,
      processData: false,
            // dataType: "json",
            success:function(data){
              $('#konfirmasi-post')[0].reset();
              $('#konfirmasi').modal('hide');
              berhasil(data.status, data.pesan);
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
  
 $('#kirim').submit(function(e){ // tambah keterangan
    e.preventDefault();
    var request = new FormData(this);
    var endpoint= '{{route("keterangan.pengerjaan")}}';
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
              $('#keterangan').modal('hide');
              berhasil(data.status, data.pesan);
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
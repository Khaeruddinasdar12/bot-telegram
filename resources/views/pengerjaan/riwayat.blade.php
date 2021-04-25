@extends('layouts.template')

@section('title')
Riwayat Pengerjaan 
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
          <h2 class="card-title"><i class="fa fa-history"></i> Riwayat Pengerjaan</h2>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
          <div class="card">
            <div class="card-body">
             <div class="float-left">
              <h4>Data Riwayat Pengerjaan</h4>
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
                        <td><span class="badge badge-success">Selesai</span></td>
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
<!-- END MODALS -->
@endsection

@section('js')
<script type="text/javascript">
$('#keterangan').on('show.bs.modal', function (event) {
  var button = $(event.relatedTarget)
  var id = button.data('id')
  var keterangan = button.data('keterangan')
  
  var modal = $(this)
  modal.find('.modal-body #keterangan-id').val(id)
  modal.find('.modal-body #keterangan').val(keterangan)
})

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
@extends('layouts.template')

@section('title')
Inboxes
@endsection

@section('content')
<!-- Content Header (Page header) -->
<div class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1 class="m-0 text-dark">Data Inbox</h1>
      </div><!-- /.col -->
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="#">Data Inbox</a></li>
          <!-- <li class="breadcrumb-item active">Dashboard v1</li> -->
        </ol>
      </div><!-- /.col -->
    </div><!-- /.row -->
  </div><!-- /.container-fluid -->
</div>
<!-- /.content-header -->
<section class="content">
  <div class="row">

    <div class="col-md-12">
      <div class="card card-primary">
        <div class="card-header">
          <h3 class="card-title">
            <i class="fas fa-edit"></i>
            Data Inbox
          </h3>
          <div class="card-tools">
            <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
              <i class="fas fa-minus"></i></button>
          </div>
        </div>
        <div class="card-body">
          <div class="row">

            <div class="col-12">
              <div class="tab-content" id="vert-tabs-tabContent">

                <!-- tab data inbox -->
                <div class="tab-pane text-left fade show active" id="vert-tabs-add" role="tabpanel" aria-labelledby="vert-tabs-add-tab">
                  <div class="table-responsive">
                    <table id="example0" class="table table-bordered table-striped">
                      <thead>
                        <tr>
                          <th>Nama Kontak</th>
                          <th>Pesan</th>
                          <th>Waktu</th>
                          <th>Action</th>
                        </tr>
                      </thead>
                      <tbody>
                      @php $no = 1; @endphp
                       @foreach($data as $datas) 
                        <tr>
                          <td>{{$no++}}</td>
                          <td>{{$datas->nama_kontak}}</td>
                          <td>{{$datas->pesan}}</td>
                          <td>{{$datas->created_at}}</td>
                          <td>
                            <button class="btn btn-outline-success btn-sm" data-toggle="modal" data-target="#editbus" title="edit data"><i class="fas fa-pencil-alt"></i></button>

                            <button class="btn btn-outline-danger btn-sm" title="hapus data"  onclick="hapus()" id="del_data"><i class="fas fa-trash"></i></button>
                          </td>
                        </tr>
                        @endforeach
                      </tbody>
                    </table>
                  </div>
                </div>
                <!-- end tab data inbox -->


              </div>
            </div>
          </div>
        </div>
        <!-- /.card -->
      </div>
    </div>

  </div>
</section>

<style>
  .width-0 {
    width: 120px !important;
  }

  .table-modal {
    line-height: 40px !important;
    width: 700px;
  }

  .width-1 {
    width: 50px !important;
  }
</style>
@endsection

@section('js')
<script src="{{ asset('admin/plugins/datatables/jquery.dataTables.js') }}"></script>
<script src="{{ asset('admin/plugins/datatables-bs4/js/dataTables.bootstrap4.js') }}"></script>
<script>
  $(function() {
    $("#example0, #example1, #example2, #example3, #example4").DataTable();
  });
</script>
<script>
  // detail pivot
  $('#showdetailpivot').on('show.bs.modal', function(event) {
    var button = $(event.relatedTarget)
    var nama = button.data('nama')
    var tipe = button.data('tipe')
    var rute = button.data('rute')
    var harga = button.data('harga')
    var desc = button.data('desc')

    var modal = $(this)
    modal.find('.modal-title').text('Detail Bus ' + nama)
    modal.find('.modal-body #namabus').text(nama)
    modal.find('.modal-body #tipebus').text(tipe)
    modal.find('.modal-body #rutebus').text(rute)
    modal.find('.modal-body #hargabus').text(harga)
    modal.find('.modal-body #deskripsi').text(desc)
  })
  // end detail pivot

  // detail bus
  $('#showdetail0').on('show.bs.modal', function(event) {
    var button = $(event.relatedTarget)
    var nama = button.data('nama')
    var tipe = button.data('tipe')
    var kursi = button.data('kursi')
    var desc = button.data('desc')

    var modal = $(this)
    modal.find('.modal-title').text('Detail Bus ' + nama)
    modal.find('.modal-body #namabuss').text(nama)
    modal.find('.modal-body #tipebuss').text(tipe)
    modal.find('.modal-body #kursis').text(kursi)
    modal.find('.modal-body #deskripsis').text(desc)
  })
  // end detail bus

  // edit bus
  $('#editbus').on('show.bs.modal', function(event) {
    var button = $(event.relatedTarget)
    var nama = button.data('nama')
    var tipe = button.data('tipe')
    var kursi = button.data('kursi')
    var desc = button.data('desc')
    var id = button.data('id')

    var modal = $(this)
    modal.find('.modal-title').text('Edit Data Bus ' + nama)
    modal.find('.modal-body #namabusss').val(nama)
    modal.find('.modal-body #tipebusss').val(tipe)
    modal.find('.modal-body #kursiss').val(kursi)
    modal.find('.modal-body #bus-id').val(id)
    modal.find('.modal-body #deskripsiss').val(desc)
  })
  // end edit bus

  // detail tipe
  $('#edittipe').on('show.bs.modal', function(event) {
    var button = $(event.relatedTarget)
    var nama = button.data('tipe')
    var id = button.data('id')

    var modal = $(this)
    modal.find('.modal-title').text('Edit Data Tipe ' + nama)
    modal.find('.modal-body #namatipe').val(nama)
    modal.find('.modal-body #tipe-id').val(id)
  })
  // end detail tipe

  // detail rute
  $('#editrute').on('show.bs.modal', function(event) {
    var button = $(event.relatedTarget)
    var nama = button.data('rute')
    var id = button.data('id')

    var modal = $(this)
    modal.find('.modal-title').text('Edit Data Rute ' + nama)
    modal.find('.modal-body #namarute').val(nama)
    modal.find('.modal-body #rute-id').val(id)
  })
  // end detail rute


  // JQUERY FORM EDIT

  //edit data bus
  $('#edit-bus').submit(function(e) {
    e.preventDefault();
    var id = eval(document.getElementById('bus-id').value); //id pada inputan
    console.log(id);
    var request = new FormData(this);
    var endpoint = "managemen-bus/edit-bus/" + id;
    $.ajax({
      url: endpoint,
      method: "POST",
      data: request,
      contentType: false,
      cache: false,
      processData: false,
      // dataType: "json",
      success: function(data) {
        $('#edit-bus')[0].reset(); //id form
        $('#editbus').modal('hide'); //id modal
        console.log(data.pesan);
        berhasil(data.status, data.pesan);
      },
      error: function(xhr, status, error) {
        var error = xhr.responseJSON;
        if ($.isEmptyObject(error) == false) {
          $.each(error.errors, function(key, value) {
            gagal(key, value);
          });
        }
      }
    });
  });
  // end edit data bus

  // EDIT TIPE
  $('#edit-tipe').submit(function(e) {
    e.preventDefault();
    var id = eval(document.getElementById('tipe-id').value); //id pada inputan
    var request = new FormData(this);
    var endpoint = "managemen-bus/edit-tipe-bus/" + id;
    $.ajax({
      url: endpoint,
      method: "POST",
      data: request,
      contentType: false,
      cache: false,
      processData: false,
      // dataType: "json",
      success: function(data) {
        $('#edit-tipe')[0].reset(); //id form
        $('#edittipe').modal('hide'); //id modal

        berhasil(data.status, data.pesan);
      },
      error: function(xhr, status, error) {
        var error = xhr.responseJSON;
        if ($.isEmptyObject(error) == false) {
          $.each(error.errors, function(key, value) {
            gagal(key, value);
          });
        }
      }
    });
  });
  // END EDIT TIPE

  //edit rute bus
  $('#edit-rute').submit(function(e) {
    e.preventDefault();
    var id = eval(document.getElementById('rute-id').value); //id pada inputan
    var request = new FormData(this);
    var endpoint = "managemen-bus/edit-rute/" + id;
    $.ajax({
      url: endpoint,
      method: "POST",
      data: request,
      contentType: false,
      cache: false,
      processData: false,
      // dataType: "json",
      success: function(data) {
        $('#edit-rute')[0].reset(); //id form
        $('#editrute').modal('hide'); //id modal

        berhasil(data.status, data.pesan);
      },
      error: function(xhr, status, error) {
        var error = xhr.responseJSON;
        if ($.isEmptyObject(error) == false) {
          $.each(error.errors, function(key, value) {
            gagal(key, value);
          });
        }
      }
    });
  });
  // end edit rute bus

  // END JQUERY FORM EDIT
</script>
@endsection
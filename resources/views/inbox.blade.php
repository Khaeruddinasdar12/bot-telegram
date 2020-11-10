@extends('layouts.template')

@section('title')
Inbox
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

    <div class="col-md-4">
      <div class="content-chat">
        <div class="card chat-card">
          <div class="card-header">
            <h3 class="card-title">Chatbox Nama User</h3>

            <div class="card-tools">
              <button type="button" class="btn btn-tool" data-card-widget="collapse"><i
                class="fas fa-minus"></i>
              </button>
            </div>
          </div>
          <div class="card-body p-0 chat-column" style="display: block;">
            <ul class="nav nav-pills flex-column">
              @foreach($data as $datas)
              <li class="nav-item chat">
                <a class="nav-link" onclick="chat('{{$datas->chat_id}}')">
                  <h6>{{$datas->telegramuser->nama_kontak}}</h6>
                  <p>
                    <small> 23 Jan 2:05 pm </small>
                    <span class="badge bg-primary float-right">{{$datas->jmlPesan}}</span>
                  </p>
                </a>
              </li>
              @endforeach
            </ul>
          </div>
          <!-- /.card-body -->
        </div>
      </div>
    </div>

    <div class="col-md-8">
      <!-- chatbox -->
      <div class="content-chat-message">
        <div class="card card-sucress cardutline direct-chat direct-chat-success">
          <div class="card-header">
            <h3 class="card-title" id="nama-user">Direct Chat</h3>
          </div>
          <!-- /.card-header -->
          <div class="card-body chat-message" id="chat-body">


          </div>
          <!-- /.card-body -->
        </div>
      </div>
      <!-- chatbox -->
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
    // $(function () {
    //     $("#example0, #example1, #example2, #example3, #example4").DataTable();
    // });

  </script>
  <script>
    function chat(id) {
        var endpoint = "percakapan/" + id;
        $.ajax({
          url: endpoint,
          method: "GET",
          contentType: false,
          cache: false,
          processData: false,
          beforeSend: function () {
            $(".loader").css("display", "block");
          },
          success: function (data) {
            obj = data[0].chat;
            // console.log(obj);
            i=1;
            var txt = []; 
            $.each( obj, function( key, value ) {
              if(value.from == 1) {
                txt[i] = '<div class="direct-chat-msg right"><div class="direct-chat-infos clearfix"></div><div class="direct-chat-text">'+value.pesan+'</div></div>';
              } else {
                txt[i] = '<div class="direct-chat-msg"><div class="direct-chat-infos clearfix"><span class="direct-chat-name float-left"></span></div><div class="direct-chat-text">'+value.pesan+'</div></div>';
              }
              // data = 
              console.log(value.from);
              i++;
            });

            $("#nama-user").text(data[0].nama_kontak);
            $("#chat-body").html(
              '<div class="direct-chat-messages">' +txt.join([separator = ''])+ '</div>'
              );
            // console.log('' + id);
            $(".loader").css("display", "none");
          },
          error: function (xhr, status, error) {
            var error = xhr.responseJSON;
            if ($.isEmptyObject(error) == false) {
              $.each(error.errors, function (key, value) {
                gagal(key, value);
              });
            }
          }
        });
      }

    // detail bus
    $('#showdetail0').on('show.bs.modal', function (event) {
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
    $('#editbus').on('show.bs.modal', function (event) {
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

    // JQUERY FORM EDIT

    //edit data bus
    $('#edit-bus').submit(function (e) {
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
            success: function (data) {
                $('#edit-bus')[0].reset(); //id form
                $('#editbus').modal('hide'); //id modal
                console.log(data.pesan);
                berhasil(data.status, data.pesan);
              },
              error: function (xhr, status, error) {
                var error = xhr.responseJSON;
                if ($.isEmptyObject(error) == false) {
                  $.each(error.errors, function (key, value) {
                    gagal(key, value);
                  });
                }
              }
            });
      });
    // end edit data bus

    // END JQUERY FORM EDIT

  </script>
  @endsection

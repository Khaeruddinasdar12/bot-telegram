@extends('layouts.template')

@section('title')
Inbox
@endsection

@section('firebase')
<!-- The core Firebase JS SDK is always required and must be listed first -->
<script src="https://www.gstatic.com/firebasejs/8.2.9/firebase-app.js"></script>
<script src="https://www.gstatic.com/firebasejs/8.2.9/firebase-messaging.js"></script>
<!-- TODO: Add SDKs for Firebase products that you want to use
 https://firebase.google.com/docs/web/setup#available-libraries -->
 <!-- <script src="https://www.gstatic.com/firebasejs/8.2.9/firebase-analytics.js"></script> -->

 <script>
  // Your web app's Firebase configuration
  // For Firebase JS SDK v7.20.0 and later, measurementId is optional
  var firebaseConfig = {
    apiKey: "AIzaSyAVg0UjtWhMOKnwbkSCDwhl55T8X3whAnY",
    authDomain: "bot-telegram-ff33e.firebaseapp.com",
    projectId: "bot-telegram-ff33e",
    storageBucket: "bot-telegram-ff33e.appspot.com",
    messagingSenderId: "383270674531",
    appId: "1:383270674531:web:826b3dffb54bf521d41856",
    measurementId: "G-7JDH318GSR"
  };
  // Initialize Firebase
  firebase.initializeApp(firebaseConfig);
  // firebase.analytics();
</script>

<!-- LAMA -->
<!-- <script src="https://www.gstatic.com/firebasejs/8.2.2/firebase-app.js"></script>
<script src="https://www.gstatic.com/firebasejs/8.2.2/firebase-messaging.js"></script>
-->
<!--  <script src="https://www.gstatic.com/firebasejs/8.2.2/firebase-auth.js"></script>
 <script src="https://www.gstatic.com/firebasejs/8.2.2/firebase-firestore.js"></script> -->

<!--  <script>
  // Your web app's Firebase configuration
  // For Firebase JS SDK v7.20.0 and later, measurementId is optional
  var firebaseConfig = {
    apiKey: "AIzaSyAXMFabSnctaDDAABRSuxPKxIhiTW22qNI",
    authDomain: "petcare-8fdde.firebaseapp.com",
    projectId: "petcare-8fdde",
    storageBucket: "petcare-8fdde.appspot.com",
    messagingSenderId: "189745989695",
    appId: "1:189745989695:web:d6841b38fbcd6e8f33508a",
    measurementId: "G-FBG1DW8XD1"
  };
  // Initialize Firebase
  firebase.initializeApp(firebaseConfig);
  // firebase.analytics();
</script> -->
<!-- END -->
<script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
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
          </div>
          <div class="card-body p-0 chat-column" style="display: block;">
            <ul class="nav nav-pills flex-column" id="list-user"> 
              <!-- kode list user di js -->
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
            <!-- kode menampilkan percakapan di js -->
            <div class="text-center" >
              <img src="{{ asset('asset/image/aps-logo.jpg') }}" alt="AngkasaPura Support Logo"
              class="img-fluid aps-bg">
              <h2>AngkasaPura Support</h2>
              <h4>Chat Bot Telegram</h4>
            </div>
            
          </div>
          <div class="card-footer"><form id="bls" method="POST"><div class="input-group"><input type="text" name="pesan" placeholder="tulis pesan" class="form-control" id="pesan-balasan"><input type="hidden" name="id" value="" id="hidden-id">@csrf<span class="input-group-append"><button type="" class="btn btn-success">Kirim</button></span></div></form></div>
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
<script type="text/javascript">

  const messaging = firebase.messaging();
  messaging.usePublicVapidKey("BJy-g7JentFaP664WOKvQnTOigkACjXX7EYE0dRiFNdqh6iMn0TztzCEN-CSlPQvNjYK0uJ-lOYB6XaPCLQAnAQ");

  function sendTokenToServer(token) {
    console.log('token retrieved ', token);
    user_id = '{{Auth::user()->id}}';
    url = '{{route("save.token")}}';
    axios.post(url , {
      'token' : token, 
      'user_id' : user_id
    }).then(res => {
      console.log(res);
    });
  }

  function retrieveToken() {
    messaging.getToken().then((currentToken) =>{
      if(currentToken) {
        sendTokenToServer(currentToken);
      } else {
        alert('you should allow notification');
      }
    }).catch((err) => {
      console.log('An error occured while retrieving token. ', err);
        // showToken('Error retrieving Instance ID token. ', err);
        // setTokenSentToServer(false);
      })
  }

  retrieveToken();

  messaging.onTokenRefresh(() => {
    retrieveToken();
  });

    messaging.onMessage((payload) => { // akan otomatis tereksekusi jika sendchat(id)
      list_user();
      chat(iduser);
    });
    
    
    $('#bls').submit(function (e) {
      e.preventDefault();
      iduser = $('#hidden-id').val();
      // list_dokter();
      var request = new FormData(this);
      var endpoint = '{{ route("balas") }}';
      $.ajax({
        url: endpoint,
        method: "POST",
        data: request,
        contentType: false,
        cache: false,
        processData: false,
        beforeSend: function () {
                // idDokter = ;  

                $(".loader").css("display", "block");
              },
            // dataType: "json",
            success: function (data) {
                $('#bls')[0].reset(); //reset form chat
                list_user();
                chat(iduser);
              },
              error: function (xhr, status, error) {
                var error = xhr.responseJSON;
                if ($.isEmptyObject(error) == false) {
                  $.each(error.errors, function (key, value) {
                    alert(value);
                  });
                }
              }
            });
    });
    
    iduser = '';
    function chat(id) { // memunculkan percakapan sesuai user yang terpilih atau terklik
      iduser = id;
      // list_dokter();
      $('#hidden-id').val(iduser);
      // alert('chat function ' + id);
      var endpoint = "percakapan/"+id;
        // alert(endpoint);
        token = $('meta[name="csrf-token"]').attr('content');
        $.ajax({
          url: endpoint,
            // method: "POST",
            contentType: false,
            cache: false,
            data : {
              '_method' : 'POST',
              '_token'  : token
            },
            processData: false,
            beforeSend: function () {
              $(".loader").css("display", "block");
            },
            success: function (data) {
                obj = data[0].chat;
                // console.log(obj);
                list_user();
                i = 1;
                var txt = [];
                $.each(obj, function (key, value) {
                  if (value.from == 1) {
                    txt[i] =
                    '<div class="direct-chat-msg right"><div class="direct-chat-infos clearfix"></div><div class="direct-chat-text">' +
                    value.pesan + '</div></div>';
                  } else {
                    txt[i] =
                    '<div class="direct-chat-msg"><div class="direct-chat-infos clearfix"><span class="direct-chat-name float-left"></span></div><div class="direct-chat-text">' +
                    value.pesan + '</div></div>';
                  }
                    i++;
                  });
                // $("#nama-user").text(data[0].nama_kontak);
                $("#chat-body").html(txt.join([separator = '']));
                // console.log('' + id);
                // $(".loader").css("display", "none");
              },
              error: function (xhr, status, error) {
                var error = xhr.responseJSON;
                if ($.isEmptyObject(error) == false) {
                  $.each(error.errors, function (key, value) {
                    alert(key, value);
                  });
                }
              }
            });
      }

    function list_user() { // menampilkan list user yang pernah chat
      var endpoint = "list-user";
      $.ajax({
        url: endpoint,
        method: "GET",
        contentType: false,
        cache: false,
        processData: false,
        success: function (data) {
          // alert('success');
          // obj = data[0].chat;
                // console.log(data);
                i = 1;
                var txt = [];
                $.each(data, function (key, value) {
                    if(value.id == iduser) {
                        var css = 'active';
                    } else {
                        var css = '';
                    }
                  txt[i] ='<li class="nav-item chat"><a class="nav-link '+css+'" onclick="chat('+value.id+')"><h6>'+value.nama_kontak+'</h6><p><small>'+value.updated_at+'</small><span class="badge bg-primary float-right">1</span></p></a>              </li>';
                  i++;
                });
                // $("#nama-user").text(data[0].nama_kontak); 
                $("#list-user").html(txt.join([separator = '']));
                // console.log('' + id);
                // $(".loader").css("display", "none");
              },
              error: function (xhr, status, error) {
                var error = xhr.responseJSON;
                if ($.isEmptyObject(error) == false) {
                  $.each(error.errors, function (key, value) {
                    alert(key, value);
                  });
                }
              }
            });
    }
    
    $(document).ready(function(){ //menampilkan list dokter dan chat nya jika ada
      list_user();
      // alert('halo');
      // if(idDokter == 0) {

      // } else {
      //   chat(idDokter);  
      // }
      
    });
  </script>
  @endsection

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
 <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Compose</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Compose</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-3">
            <a href="mailbox.html" class="btn btn-primary btn-block mb-3">Back to Inbox</a>

            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Folders</h3>

                <div class="card-tools">
                  <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>
                  </button>
                </div>
              </div>
              <div class="card-body p-0">
                <ul class="nav nav-pills flex-column">
                  <li class="nav-item active">
                    <a href="#" class="nav-link">
                      <i class="fas fa-inbox"></i> Inbox
                      <span class="badge bg-primary float-right">12</span>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="#" class="nav-link">
                      <i class="far fa-envelope"></i> Sent
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="#" class="nav-link">
                      <i class="far fa-file-alt"></i> Drafts
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="#" class="nav-link">
                      <i class="fas fa-filter"></i> Junk
                      <span class="badge bg-warning float-right">65</span>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="#" class="nav-link">
                      <i class="far fa-trash-alt"></i> Trash
                    </a>
                  </li>
                </ul>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Labels</h3>

                <div class="card-tools">
                  <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>
                  </button>
                </div>
              </div>
              <!-- /.card-header -->
              <div class="card-body p-0">
                <ul class="nav nav-pills flex-column">
                  <li class="nav-item">
                    <a class="nav-link" href="#"><i class="far fa-circle text-danger"></i> Important</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="#"><i class="far fa-circle text-warning"></i> Promotions</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="#"><i class="far fa-circle text-primary"></i> Social</a>
                  </li>
                </ul>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        <div class="col-md-9">
          <div class="card card-primary card-outline">
            <div class="card-header">
              <h3 class="card-title">Read Mail</h3>

              <div class="card-tools">
                <a href="#" class="btn btn-tool" data-toggle="tooltip" title="Previous"><i class="fas fa-chevron-left"></i></a>
                <a href="#" class="btn btn-tool" data-toggle="tooltip" title="Next"><i class="fas fa-chevron-right"></i></a>
              </div>
            </div>
            <!-- /.card-header -->
            <div class="card-body p-0">
              <div class="mailbox-read-info">
                <h5>Message Subject Is Placed Here</h5>
                <h6>From: support@adminlte.io
                  <span class="mailbox-read-time float-right">15 Feb. 2015 11:03 PM</span></h6>
              </div>
              <!-- /.mailbox-read-info -->
              <div class="mailbox-controls with-border text-center">
                <div class="btn-group">
                  <button type="button" class="btn btn-default btn-sm" data-toggle="tooltip" data-container="body" title="Delete">
                    <i class="far fa-trash-alt"></i></button>
                  <button type="button" class="btn btn-default btn-sm" data-toggle="tooltip" data-container="body" title="Reply">
                    <i class="fas fa-reply"></i></button>
                  <button type="button" class="btn btn-default btn-sm" data-toggle="tooltip" data-container="body" title="Forward">
                    <i class="fas fa-share"></i></button>
                </div>
                <!-- /.btn-group -->
                <button type="button" class="btn btn-default btn-sm" data-toggle="tooltip" title="Print">
                  <i class="fas fa-print"></i></button>
              </div>
              <!-- /.mailbox-controls -->
              <div class="mailbox-read-message">
                <p>Hello John,</p>

                <p>Keffiyeh blog actually fashion axe vegan, irony biodiesel. Cold-pressed hoodie chillwave put a bird
                  on it aesthetic, bitters brunch meggings vegan iPhone. Dreamcatcher vegan scenester mlkshk. Ethical
                  master cleanse Bushwick, occupy Thundercats banjo cliche ennui farm-to-table mlkshk fanny pack
                  gluten-free. Marfa butcher vegan quinoa, bicycle rights disrupt tofu scenester chillwave 3 wolf moon
                  asymmetrical taxidermy pour-over. Quinoa tote bag fashion axe, Godard disrupt migas church-key tofu
                  blog locavore. Thundercats cronut polaroid Neutra tousled, meh food truck selfies narwhal American
                  Apparel.</p>

                <p>Raw denim McSweeney's bicycle rights, iPhone trust fund quinoa Neutra VHS kale chips vegan PBR&amp;B
                  literally Thundercats +1. Forage tilde four dollar toast, banjo health goth paleo butcher. Four dollar
                  toast Brooklyn pour-over American Apparel sustainable, lumbersexual listicle gluten-free health goth
                  umami hoodie. Synth Echo Park bicycle rights DIY farm-to-table, retro kogi sriracha dreamcatcher PBR&amp;B
                  flannel hashtag irony Wes Anderson. Lumbersexual Williamsburg Helvetica next level. Cold-pressed
                  slow-carb pop-up normcore Thundercats Portland, cardigan literally meditation lumbersexual crucifix.
                  Wayfarers raw denim paleo Bushwick, keytar Helvetica scenester keffiyeh 8-bit irony mumblecore
                  whatever viral Truffaut.</p>

                <p>Post-ironic shabby chic VHS, Marfa keytar flannel lomo try-hard keffiyeh cray. Actually fap fanny
                  pack yr artisan trust fund. High Life dreamcatcher church-key gentrify. Tumblr stumptown four dollar
                  toast vinyl, cold-pressed try-hard blog authentic keffiyeh Helvetica lo-fi tilde Intelligentsia. Lomo
                  locavore salvia bespoke, twee fixie paleo cliche brunch Schlitz blog McSweeney's messenger bag swag
                  slow-carb. Odd Future photo booth pork belly, you probably haven't heard of them actually tofu ennui
                  keffiyeh lo-fi Truffaut health goth. Narwhal sustainable retro disrupt.</p>

                <p>Skateboard artisan letterpress before they sold out High Life messenger bag. Bitters chambray
                  leggings listicle, drinking vinegar chillwave synth. Fanny pack hoodie American Apparel twee. American
                  Apparel PBR listicle, salvia aesthetic occupy sustainable Neutra kogi. Organic synth Tumblr viral
                  plaid, shabby chic single-origin coffee Etsy 3 wolf moon slow-carb Schlitz roof party tousled squid
                  vinyl. Readymade next level literally trust fund. Distillery master cleanse migas, Vice sriracha
                  flannel chambray chia cronut.</p>

                <p>Thanks,<br>Jane</p>
              </div>
              <!-- /.mailbox-read-message -->
            </div>
            <!-- /.card-body -->
            <div class="card-footer bg-white">
              <ul class="mailbox-attachments d-flex align-items-stretch clearfix">
                <li>
                  <span class="mailbox-attachment-icon"><i class="far fa-file-pdf"></i></span>

                  <div class="mailbox-attachment-info">
                    <a href="#" class="mailbox-attachment-name"><i class="fas fa-paperclip"></i> Sep2014-report.pdf</a>
                        <span class="mailbox-attachment-size clearfix mt-1">
                          <span>1,245 KB</span>
                          <a href="#" class="btn btn-default btn-sm float-right"><i class="fas fa-cloud-download-alt"></i></a>
                        </span>
                  </div>
                </li>
                <li>
                  <span class="mailbox-attachment-icon"><i class="far fa-file-word"></i></span>

                  <div class="mailbox-attachment-info">
                    <a href="#" class="mailbox-attachment-name"><i class="fas fa-paperclip"></i> App Description.docx</a>
                        <span class="mailbox-attachment-size clearfix mt-1">
                          <span>1,245 KB</span>
                          <a href="#" class="btn btn-default btn-sm float-right"><i class="fas fa-cloud-download-alt"></i></a>
                        </span>
                  </div>
                </li>
                <li>
                  <span class="mailbox-attachment-icon has-img"><img src="../../dist/img/photo1.png" alt="Attachment"></span>

                  <div class="mailbox-attachment-info">
                    <a href="#" class="mailbox-attachment-name"><i class="fas fa-camera"></i> photo1.png</a>
                        <span class="mailbox-attachment-size clearfix mt-1">
                          <span>2.67 MB</span>
                          <a href="#" class="btn btn-default btn-sm float-right"><i class="fas fa-cloud-download-alt"></i></a>
                        </span>
                  </div>
                </li>
                <li>
                  <span class="mailbox-attachment-icon has-img"><img src="../../dist/img/photo2.png" alt="Attachment"></span>

                  <div class="mailbox-attachment-info">
                    <a href="#" class="mailbox-attachment-name"><i class="fas fa-camera"></i> photo2.png</a>
                        <span class="mailbox-attachment-size clearfix mt-1">
                          <span>1.9 MB</span>
                          <a href="#" class="btn btn-default btn-sm float-right"><i class="fas fa-cloud-download-alt"></i></a>
                        </span>
                  </div>
                </li>
              </ul>
            </div>
            <!-- /.card-footer -->
            <div class="card-footer">
              <div class="float-right">
                <button type="button" class="btn btn-default"><i class="fas fa-reply"></i> Reply</button>
                <button type="button" class="btn btn-default"><i class="fas fa-share"></i> Forward</button>
              </div>
              <button type="button" class="btn btn-default"><i class="far fa-trash-alt"></i> Delete</button>
              <button type="button" class="btn btn-default"><i class="fas fa-print"></i> Print</button>
            </div>
            <!-- /.card-footer -->
          </div>
          <!-- /.card -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>
<section class="content">
  <div class="card card-outline direct-chat direct-chat">
  <div class="card-header">
    <h3 class="card-title">Direct Chat</h3>
    <div class="card-tools">
      <span data-toggle="tooltip" title="3 New Messages" class="badge badge-light">3</span>
      <button type="button" class="btn btn-tool" data-widget="collapse">
        <i class="fas fa-minus"></i>
      </button>
      <button type="button" class="btn btn-tool" data-toggle="tooltip" title="Contacts" data-widget="chat-pane-toggle">
        <i class="fas fa-comments"></i>
      </button>
      <button type="button" class="btn btn-tool" data-widget="remove"><i class="fas fa-times"></i>
      </button>
    </div>
  </div>
  <!-- /.card-header -->
  <div class="card-body">
    <!-- Conversations are loaded here -->
    <div class="direct-chat-messages">
      <!-- Message. Default to the left -->
      <div class="direct-chat-msg">
        <div class="direct-chat-infos clearfix">
          <span class="direct-chat-name float-left">Alexander Pierce</span>
          <span class="direct-chat-timestamp float-right">23 Jan 2:00 pm</span>
        </div>
        <!-- /.direct-chat-infos -->
        <div class="direct-chat-text">
          Is this template really for free? That's unbelievable!
        </div>
        <!-- /.direct-chat-text -->
      </div>
      <!-- /.direct-chat-msg -->
      <!-- Message to the right -->
      <div class="direct-chat-msg right">
        <div class="direct-chat-infos clearfix">
          <span class="direct-chat-name float-right">Sarah Bullock</span>
          <span class="direct-chat-timestamp float-left">23 Jan 2:05 pm</span>
        </div>
        <!-- /.direct-chat-infos -->
        
        <!-- /.direct-chat-img -->
        <div class="direct-chat-text">
          You better believe it!
        </div>
        <!-- /.direct-chat-text -->
      </div>
      <!-- /.direct-chat-msg -->
      <!-- Message. Default to the left -->
      <div class="direct-chat-msg">
        <div class="direct-chat-infos clearfix">
          <span class="direct-chat-name float-left">Alexander Pierce</span>
          <span class="direct-chat-timestamp float-right">23 Jan 5:37 pm</span>
        </div>
        <!-- /.direct-chat-infos -->
        
        <!-- /.direct-chat-img -->
        <div class="direct-chat-text">
          Working with AdminLTE on a great new app! Wanna join?
        </div>
        <!-- /.direct-chat-text -->
      </div>
      <!-- /.direct-chat-msg -->
      <!-- Message to the right -->
      <div class="direct-chat-msg right">
        <div class="direct-chat-infos clearfix">
          <span class="direct-chat-name float-right">Sarah Bullock</span>
          <span class="direct-chat-timestamp float-left">23 Jan 6:10 pm</span>
        </div>
        <!-- /.direct-chat-infos -->
      
        <!-- /.direct-chat-img -->
        <div class="direct-chat-text">
          I would love to.
        </div>
        <!-- /.direct-chat-text -->
      </div>
      <!-- /.direct-chat-msg -->
    </div>
    <!--/.direct-chat-messages-->
    <!-- Contacts are loaded here -->
    <div class="direct-chat-contacts">
      <ul class="contacts-list">
        <li>
          <a href="#">
            <img class="contacts-list-img" src="/docs/3.0/assets/img/user1-128x128.jpg">
            <div class="contacts-list-info">
              <span class="contacts-list-name">
                Count Dracula
                <small class="contacts-list-date float-right">2/28/2015</small>
              </span>
              <span class="contacts-list-msg">How have you been? I was...</span>
            </div>
            <!-- /.contacts-list-info -->
          </a>
        </li>
        <!-- End Contact Item -->
        <li>
          <a href="#">
            <img class="contacts-list-img" src="/docs/3.0/assets/img/user7-128x128.jpg">
            <div class="contacts-list-info">
              <span class="contacts-list-name">
                Sarah Doe
                <small class="contacts-list-date float-right">2/23/2015</small>
              </span>
              <span class="contacts-list-msg">I will be waiting for...</span>
            </div>
            <!-- /.contacts-list-info -->
          </a>
        </li>
        <!-- End Contact Item -->
        <li>
          <a href="#">
            <img class="contacts-list-img" src="/docs/3.0/assets/img/user3-128x128.jpg">
            <div class="contacts-list-info">
              <span class="contacts-list-name">
                Nadia Jolie
                <small class="contacts-list-date float-right">2/20/2015</small>
              </span>
              <span class="contacts-list-msg">I'll call you back at...</span>
            </div>
            <!-- /.contacts-list-info -->
          </a>
        </li>
        <!-- End Contact Item -->
        <li>
          <a href="#">
            <img class="contacts-list-img" src="/docs/3.0/assets/img/user5-128x128.jpg">
            <div class="contacts-list-info">
              <span class="contacts-list-name">
                Nora S. Vans
                <small class="contacts-list-date float-right">2/10/2015</small>
              </span>
              <span class="contacts-list-msg">Where is your new...</span>
            </div>
            <!-- /.contacts-list-info -->
          </a>
        </li>
        <!-- End Contact Item -->
        <li>
          <a href="#">
            <img class="contacts-list-img" src="/docs/3.0/assets/img/user6-128x128.jpg">
            <div class="contacts-list-info">
              <span class="contacts-list-name">
                John K.
                <small class="contacts-list-date float-right">1/27/2015</small>
              </span>
              <span class="contacts-list-msg">Can I take a look at...</span>
            </div>
            <!-- /.contacts-list-info -->
          </a>
        </li>
        <!-- End Contact Item -->
        <li>
          <a href="#">
            <img class="contacts-list-img" src="/docs/3.0/assets/img/user8-128x128.jpg">
            <div class="contacts-list-info">
              <span class="contacts-list-name">
                Kenneth M.
                <small class="contacts-list-date float-right">1/4/2015</small>
              </span>
              <span class="contacts-list-msg">Never mind I found...</span>
            </div>
            <!-- /.contacts-list-info -->
          </a>
        </li>
        <!-- End Contact Item -->
      </ul>
      <!-- /.contacts-list -->
    </div>
    <!-- /.direct-chat-pane -->
  </div>
  <!-- /.card-body -->
  <div class="card-footer">
    <form action="#" method="post">
      <div class="input-group">
        <input type="text" name="message" placeholder="Type Message ..." class="form-control">
        <span class="input-group-append">
          <button type="button" class="btn btn-primary">Send</button>
        </span>
      </div>
    </form>
  </div>
  <!-- /.card-footer-->
</div>
<!--/.direct-chat -->
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
    <div class="row">

        <div class="col-md-4">
            <div class="card">
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
                            <a href="{{ route('beranda') }}" class="nav-link">
                                <h6>{{$datas->nama_kontak}}</h6>
                                <p>
                                    <small> 23 Jan 2:05 pm </small>
                                    <span class="badge bg-primary float-right">12</span>
                                </p>
                            </a>
                        </li>
                        @endforeach
                    </ul>
                </div>
                <!-- /.card-body -->
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
                          <th>No.</th>
                          <th>Nama Kontak</th>
                          <th>Jumlah Pesan</th>
                          <!-- <th>Waktu</th> -->
                          <th>Action</th>
                        </tr>
                      </thead>
                      <tbody>
                      @php $no = 1; @endphp
                       @foreach($data as $datas) 
                        <tr>
                          <td>{{$no++}}</td>
                          <td>{{$datas->nama_kontak}}</td>
                          <td>{{$datas->jmlPesan}} pesan tak terbaca</td>
                          
                          <td>
                            <button class="btn btn-outline-success btn-sm" data-toggle="modal" data-target="#editbus" title="lihat pesan"><i class="fas fa-reply"></i></button>
                          </td>
                        </tr>
                        @endforeach
                      </tbody>
                    </table>
                  </div>
                                <!-- tab data inbox -->
                                <div class="tab-pane text-left fade show active" id="vert-tabs-add" role="tabpanel"
                                    aria-labelledby="vert-tabs-add-tab">
                                    <div class="table-responsive">
                                        <table id="example0" class="table table-bordered table-striped">
                                            <thead>
                                                <tr>
                                                    <th>#</th>
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
                                                        <a href="{{route('chatbox')}}"
                                                            class="btn btn-outline-success btn-sm" title="Balas Pesan">
                                                            <i class="fas fa-reply"></i>
                                                        </a>

                                                        <button class="btn btn-outline-danger btn-sm" title="hapus data"
                                                            onclick="hapus()" id="del_data"><i
                                                                class="fas fa-trash"></i></button>
                                                    </td>
                                                </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                <!-- end tab data inbox -->

        <div class="col-md-8">
            <!-- chatbox -->
            <div class="card card-sucress cardutline direct-chat direct-chat-success">
                <div class="card-header">
                    <h3 class="card-title">Direct Chat</h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <!-- Conversations are loaded here -->
                    <div class="direct-chat-messages">
                        <!-- Message. Default to the left -->
                        <div class="direct-chat-msg">
                            <div class="direct-chat-infos clearfix">
                                <span class="direct-chat-name float-left">Adhe Pratama</span>
                                <span class="direct-chat-timestamp float-right">23 Jan 2:00
                                    pm</span>
                            </div>
                            <!-- /.direct-chat-infos -->
                            <img class="direct-chat-img" src="{{ asset('admin/dist/img/user1-128x128.jpg') }}"
                                alt="Message User Image">
                            <!-- /.direct-chat-img -->
                            <div class="direct-chat-text">
                                PC Saya Bermasalah
                            </div>
                            <!-- /.direct-chat-text -->
                        </div>
                        <!-- /.direct-chat-msg -->

                        <!-- Message to the right -->
                        <div class="direct-chat-msg right">
                            <div class="direct-chat-infos clearfix">
                                <span class="direct-chat-name float-right">Sarah Bullock</span>
                                <span class="direct-chat-timestamp float-left">23 Jan 2:05 pm</span>
                            </div>
                            <!-- /.direct-chat-infos -->
                            <img class="direct-chat-img" src="{{ asset('admin/dist/img/user3-128x128.jpg') }}"
                                alt="Message User Image">
                            <!-- /.direct-chat-img -->
                            <div class="direct-chat-text">
                                Segera Kami Tangani !!
                            </div>
                            <!-- /.direct-chat-text -->
                        </div>
                        <!-- /.direct-chat-msg -->
                    </div>
                    <!--/.direct-chat-messages-->

                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                    <form action="#" method="post">
                        <div class="input-group">
                            <input type="text" name="message" placeholder="Type Message ..." class="form-control">
                            <span class="input-group-append">
                                <button type="submit" class="btn btn-success">Send</button>
                            </span>
                        </div>
                    </form>
                </div>
                <!-- /.card-footer-->
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
    $(function () {
        $("#example0, #example1, #example2, #example3, #example4").DataTable();
    });

</script>
<script>
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

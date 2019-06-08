<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>LEA | Perpus - Mini</title>

    <!-- Favicon -->
    <link rel="shortcut icon" href="{{asset('img/lea.png')}}" type="image/x-icon">

    <!-- Font awesome -->
    <link href="{{asset('editor/css/font-awesome.css')}}" rel="stylesheet">
    <!-- Bootstrap -->
    <link href="{{asset('editor/css/bootstrap.css')}}" rel="stylesheet">
    <!-- slick slider -->
    <link rel="stylesheet" type="text/css" href="{{asset('editor/css/slick.css')}}">
    <!-- price picker slider -->
    <link rel="stylesheet" type="text/css" href="{{asset('editor/css/nouislider.css')}}">
    <!-- Fancybox slider -->
    <link rel="stylesheet" href="{{asset('editor/css/jquery.fancybox.css')}}" type="text/css" media="screen" />
    <!-- Theme color -->
    <link id="switcher" href="{{asset('editor/css/theme-color/default-theme.css')}}" rel="stylesheet">

    <!-- Main style sheet -->
    <link href="{{asset('editor/css/style.css')}}" rel="stylesheet">
    <link rel="stylesheet" href="{{asset('editor/toastr.css')}}">


    <!-- Google Font -->
    <link href='https://fonts.googleapis.com/css?family=Vollkorn' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css'>


  </head>
  <body class="aa-price-range">
    <?php
      function batas($kalimat)
      {
          $cetak = substr($kalimat,0,75);
          echo $cetak.'...';
      }

      function asbatas($kalimat)
      {
          $cetak = substr($kalimat,0,20);
          echo $cetak;
      }
    ?>
    <!-- Pre Loader -->
    <div id="aa-preloader-area">
      <div class="pulse"></div>
    </div>
    <!-- SCROLL TOP BUTTON -->
      <a class="scrollToTop" href="#"><i class="fa fa-angle-double-up"></i></a>
    <!-- END SCROLL TOP BUTTON -->

    <!-- Start menu section -->
    <section id="aa-menu-area">
      <nav class="navbar navbar-default main-navbar" role="navigation">
        <div class="container">
          <div class="navbar-header">
            <!-- FOR MOBILE VIEW COLLAPSED BUTTON -->
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
              <span class="sr-only">Toggle navigation</span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
            </button>
            <!-- LOGO -->
            <!-- Text based logo -->
             <a class="navbar-brand aa-logo" href="{{url('/')}}"> Home <span>Perpus-Mini</span></a>
             <!-- Image based logo -->
             <!-- <a class="navbar-brand aa-logo-img" href="index.html"><img src="img/logo.png" alt="logo"></a> -->
          </div>
          <div id="navbar" class="navbar-collapse collapse">
            <ul id="top-menu" class="nav navbar-nav navbar-right aa-main-nav">
              <li class="dropdown active">
               <a class="dropdown-toggle" data-toggle="dropdown" href="{{url('/')}}">HOME <span class="caret"></span></a>
               <ul class="dropdown-menu" role="menu">
                 <li><a href="#aa-slider">Home</a></li>
                 <li><a href="#aa-latest-property">Buku Baru</a></li>
                 <li><a href="#aa-service">Statistik</a></li>
                 <li><a href="#aa-agents">Tentang Kami</a></li>
               </ul>
             </li>
              <li><a href="{{url('list-buku')}}">List Buku</a></li>
            </ul>
          </div><!--/.nav-collapse -->
        </div>
      </nav>
    </section>
    <!-- End menu section -->


    <!-- Start slider  -->
    <section id="aa-slider">
      <div class="aa-slider-area">
        <!-- Top slider -->
        <div class="aa-top-slider">
          <!-- Top slider single slide -->
          <div class="aa-top-slider-single">
            <img src="{{asset('img/lea.jpg')}}" alt="img">
          </div>
          <!-- / Top slider single slide -->
          <!-- Top slider single slide -->
          <div class="aa-top-slider-single">
            <img src="{{asset('editor/img/slider/2.jpg')}}" alt="img">
          </div>
          <!-- / Top slider single slide -->
        </div>
      </div>
    </section>
    <!-- End slider  -->

    <!-- Advance Search -->
    <section id="aa-advance-search">
      <div class="container">
        <div class="aa-advance-search-area">
          {{ Form::open(array('url' => 'carihome', 'class' => 'form','method' => 'get')) }}
            <div class="aa-advance-search-top">
              <div class="row">
                <div class="col-md-2">
                  <div class="aa-single-advance-search">
                    <input name="judul" type="text" placeholder="Judul Buku">
                  </div>
                </div>
                <div class="col-md-2">
                  <div class="aa-single-advance-search">
                    <input name="nim" type="text" placeholder="NIM">
                  </div>
                </div>
                <div class="col-md-2">
                  <div class="aa-single-advance-search">
                    <select name="tanggal">
                     <option value="" selected>Tahun</option>
                     @foreach($tahun as $th)
                     <option value="{{$th}}">{{$th}}</option>
                     @endforeach
                    </select>
                  </div>
                </div>
                <div class="col-md-2">
                   <div class="aa-single-advance-search">
                    <select name="dosen">
                      <option value="" selected>Dosen</option>
                      @foreach($dosen as $dos)
                        <option value="{{$dos->id}}">{{$dos->nama}}</option>
                      @endforeach
                    </select>
                </div>
                </div>
                <div class="col-md-2">
                   <div class="aa-single-advance-search">
                    <select name="jenis">
                      <option value="" selected>Jenis</option>
                      @foreach($jenis as $dos)
                        <option value="{{$dos->id}}">{{$dos->nama}}</option>
                      @endforeach
                    </select>
                </div>
                </div>
                <div class="col-md-2">
                  <div class="aa-single-advance-search">
                    <input class="aa-search-btn" type="submit" value="Search">
                  </div>
                </div>
              </div>
            </div>
          {{ Form::close() }}
        </div>
      </div>
    </section>
    <!-- / Advance Search -->

    <!-- Latest property -->
    <section id="aa-latest-property">
      <div class="container">
        <div class="aa-latest-property-area">
          <div class="aa-title">
            <h2>Buku Terbaru</h2>
            <span></span>
            <p>Buku Terbaru Yang Ada di lea, Have Fun!!</p>
          </div>
          <div class="aa-latest-properties-content">
            <div class="row">
              @foreach($buku6 as $buku)
              <div class="col-md-4">
                <article class="aa-properties-item">
                  <a href="#" class="aa-properties-item-img">
                    @if($buku->foto)
                      @php
                        $link = "http://localhost/silabvbeda/public/img/buku-pict/".$buku->foto."?kategori=".$buku->jenis_id."&&nim=".$buku->mahasiswa_nim;
                      @endphp
                      <img src="{{$link}}" alt="img" style="height:250px">
                    @else
                      <img src="{{asset('img/lea.png')}}" alt="img" style="height:250px">
                    @endif
                  </a>
                  <div class="aa-tag for-sale">
                    New
                  </div>
                  <div class="aa-properties-item-content">
                    <div class="aa-properties-info text-center">
                      <center>
                        <span>{{Carbon\Carbon::parse($buku->tanggal)->format('d F Y')}}</span> -
                        <span>{{$buku->mahasiswa_nim}}</span>
                      </center>
                    </div>
                    <div class="aa-properties-about" style="height:130px;position: static;">
                      <h3> <a href="javascript:void(0)" onclick="detail({{$buku->id}})">{{$buku->mahasiswa->nama}}</a> </h3>
                      <table style="width:100%">
                        <tr>
                          <td style="text-align:center"><b>Judul</b> </td>
                        </tr>
                        <tr>
                          <td style="text-align:justify">{{batas($buku->judul)}}</td>
                        </tr>
                      </table>
                    </div>
                    <div class="aa-properties-detial">
                      <a href="javascript:void(0)" class="aa-secondary-btn" onclick="detail({{$buku->id}})">View Details</a>
                    </div>
                  </div>
                </article>
              </div>
              @endforeach
            </div>
          </div>
        </div>
      </div>
    </section>
    <!-- / Latest property -->

    <!-- Service section -->
    <!-- <section id="aa-service">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <div class="aa-service-area">
              <div class="aa-title">
                <h2>Statistik Peminjaman Buku</h2>
                <span></span>
                <p>Statistik Ini Dikelompokkan perbulannya</p>
              </div>
              <div class="aa-service-content">
                <div class="row">
                  <div class="col-md-3">
                    <div class="aa-single-service">
                      <div class="aa-service-icon">
                        <span class="fa fa-home"></span>
                      </div>
                      <div class="aa-single-service-content">
                        <h4><a href="#">Property Sale</a></h4>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Iusto repellendus quasi asperiores itaque dolorem at.</p>
                      </div>
                    </div>
                  </div>
                  <div class="col-md-3">
                    <div class="aa-single-service">
                      <div class="aa-service-icon">
                        <span class="fa fa-check"></span>
                      </div>
                      <div class="aa-single-service-content">
                        <h4><a href="#">Property Rent</a></h4>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Iusto repellendus quasi asperiores itaque dolorem at.</p>
                      </div>
                    </div>
                  </div>
                  <div class="col-md-3">
                    <div class="aa-single-service">
                      <div class="aa-service-icon">
                        <span class="fa fa-crosshairs"></span>
                      </div>
                      <div class="aa-single-service-content">
                        <h4><a href="#">Property Development</a></h4>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Iusto repellendus quasi asperiores itaque dolorem at.</p>
                      </div>
                    </div>
                  </div>
                  <div class="col-md-3">
                    <div class="aa-single-service">
                      <div class="aa-service-icon">
                        <span class="fa fa-bar-chart-o"></span>
                      </div>
                      <div class="aa-single-service-content">
                        <h4><a href="#">Market Analysis</a></h4>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Iusto repellendus quasi asperiores itaque dolorem at.</p>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section> -->
    <!-- / Service section -->

    <!-- Our Agent Section-->
    <section id="aa-agents">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <div class="aa-agents-area">
              <div class="aa-title">
                <h2>Anggota Lea</h2>
                <span></span>
                <p>Kepengurusan 2018 - 2019</p>
              </div>
              <!-- agents content -->
              <div class="aa-agents-content">
                <ul class="aa-agents-slider">
                  @foreach($asisten as $asis)
                  <li>
                    <div class="aa-single-agents">
                      <div class="aa-agents-img">
                        @if($asis->mahasiswa->avatar)
                          @php
                            $links = "http://localhost/silabvbeda/public/img/profile-pict/".$asis->mahasiswa->avatar;
                          @endphp
                          <img src="{{$links}}" alt="agent member image" height="300px">
                        @else
                          <img src="{{asset('img/lea.png')}}" alt="agent member image" height="300px">
                        @endif
                      </div>
                      <div class="aa-agetns-info">
                        <h4><a href="#">{{asbatas(optional($asis->mahasiswa)->nama)}}</a></h4>
                        <span>@if(count($asis->mahasiswa->jabatan)>0)
                          {{optional($asis->mahasiswa->jabatan[0])->name}}
                          @else
                          Admin
                        @endif</span>
                        <div class="aa-agent-social">
                          <a href="#"><i class="fa fa-facebook"></i></a>
                          <a href="#"><i class="fa fa-twitter"></i></a>
                          <a href="#"><i class="fa fa-instagram"></i></a>
                          <a href="#"><i class="fa fa-google-plus"></i></a>
                        </div>
                      </div>
                    </div>
                  </li>
                  @endforeach
                </ul>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!-- / Our Agent Section-->

    <!-- Modal -->
    <div class="modal fade bd-example-modal-lg" id="modal-detail" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-lg">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <div class="aa-title">
              <h2>Perpustakaan Mini</h2>
              <span></span>
              <p>Detail Buku</p>
                <img id="imgfoto" src="{{asset('img/lea.png')}}" alt="img" style="height:250px">
            </div>
            <br>
            <div class="">
              <div class="form-row">
                <div class="form-group col-md-3">
                  <label for="kode_buku">Kode Buku</label>
                  <input type="text" class="form-control" id="kode_buku"  value="" readonly="readonly">
                </div>
                <div class="form-group col-md-9">
                  <label for="mahasiswa_nim">Judul</label>
                  <input type="text" class="form-control" id="judul" value="" readonly="readonly">
                </div>
              </div>
              <div class="form-row">
                <div class="form-group col-md-3">
                  <label for="nim">NIM</label>
                  <input type="text" class="form-control" id="nim" value="" readonly="readonly">
                </div>
                <div class="form-group col-md-6">
                  <label for="nama">Nama</label>
                  <input type="text" class="form-control" id="nama" value="" readonly="readonly">
                </div>
                <div class="form-group col-md-3">
                  <label for="tahun">Tahun</label>
                  <input type="text" class="form-control" id="tahun" value="" readonly="readonly">
                </div>
              </div>
              <div class="form-row">
                <div class="form-group col-md-4">
                  <label for="konsentrasi_bidang">Konsentrasi / Bidang</label>
                  <input type="text" class="form-control" id="konsentrasi_bidang" value="" readonly="readonly">
                </div>
                <div class="form-group col-md-4">
                  <label for="obj_tmptKp">Object / Tempat KP</label>
                  <input type="text" class="form-control" id="obj_tmptKp" value="" readonly="readonly">
                </div>
                <div class="form-group col-md-4">
                  <label for="jenis">Jenis</label>
                  <input type="text" class="form-control" id="jenis" value="" readonly="readonly">
                </div>
              </div>
              <div class="form-row">
                <div class="form-group col-md-6">
                  <label for="pembimbing1">Pembimbing 1</label>
                  <input type="text" class="form-control" id="pembimbing1"  value="" readonly="readonly">
                </div>
                <div class="form-group col-md-6">
                  <label for="pembimbing2">Pembimbing 2</label>
                  <input type="text" class="form-control" id="pembimbing2"  value="" readonly="readonly">
                </div>
              </div>
              <div class="form-row text-center">
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal-transaksi">Baca</button>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="modal fade" id="modal-transaksi" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body form-row">
              <div class="form-group col-md-12">
                <label for="fnim">NIM</label>
                <input type="text" class="form-control" id="fnim" placeholder="Nomor Induk Mahasiswa">
              </div>
          </div>
          <div class="modal-footer">
            <button type="button" onclick="baca()" class="btn btn-primary">Baca</button>
          </div>
        </div>
      </div>
    </div>

  @include('toast::messages-jquery')

  <!-- jQuery library -->
  <!--<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script> -->
  <script src="{{asset('editor/js/jquery.min.js')}}"></script>
  <!-- Include all compiled plugins (below), or include individual files as needed -->
  <script src="{{asset('editor/js/bootstrap.js')}}"></script>
  <!-- slick slider -->
  <script type="text/javascript" src="{{asset('editor/js/slick.js')}}"></script>
  <!-- Price picker slider -->
  <script type="text/javascript" src="{{asset('editor/js/nouislider.js')}}"></script>
   <!-- mixit slider -->
  <script type="text/javascript" src="{{asset('editor/js/jquery.mixitup.js')}}"></script>
  <!-- Add fancyBox -->
  <script type="text/javascript" src="{{asset('editor/js/jquery.fancybox.pack.js')}}"></script>
  <!-- Custom js -->
  <script src="{{asset('editor/js/custom.js')}}"></script>

  <script src="{{asset('editor/toastr.js')}}"></script>

  <script type="text/javascript">
      var kode_buku = document.getElementById('kode_buku');
      var judul = document.getElementById('judul');
      var nim = document.getElementById('nim');
      var fnim = document.getElementById('fnim');
      var nama = document.getElementById('nama');
      var tahun = document.getElementById('tahun');
      var konsentrasi_bidang = document.getElementById('konsentrasi_bidang');
      var obj_tmptKp = document.getElementById('obj_tmptKp');
      var jenis = document.getElementById('jenis');
      var pembimbing1 = document.getElementById('pembimbing1');
      var pembimbing2 = document.getElementById('pembimbing2');
      var imgfoto = document.getElementById('imgfoto');
      var server="<?php echo Request::root(); ?>";
      var ids = null;

      function detail(id) {
        $.ajax({
          url: '{{config('perpus.data_buku')}}'+id, data: "", dataType: 'json', success: function(rows)
            {
              for (var i = 0; i < rows.length; i++) {
                var row = rows[i];
                ids = row.id;
                kode_buku.value=row.kode_buku;
                judul.value=row.judul;
                nim.value = row.mahasiswa_nim;
                nama.value=row.nama;
                tahun.value=formatDate(row.tanggal);

                if(row.foto!=null){
                  imgfoto.src = '{{config('perpus.url_img')}}'+row.foto;
                }

                konsentrasi_bidang.value=row.konsentrasi_bidang;
                obj_tmptKp.value=row.obj_tmptKp;
                jenis.value=row.jenis;
                pembimbing1.value=row.dosen1;
                pembimbing2.value=row.dosen2;
                $('#modal-detail').modal('show');
              }
            }
          });
      }

      function formatDate(date) {
        date = Date.parse(date);
        date = new Date(date);
        var monthNames = [
          "Januari", "Februari", "Maret",
          "April", "Mei", "Juni", "Juli",
          "Agustus", "September", "Oktober",
          "November", "Desember"
        ];

        var day = date.getDate();
        var monthIndex = date.getMonth();
        var year = date.getFullYear();

        return day + ' ' + monthNames[monthIndex] + ' ' + year;
      }

      function baca() {
        console.log(server+'/cek/'+fnim.value+'/'+ids);
        toastr.options.progressBar = true;
        if(fnim.value == null || fnim.value == ''){
          //pesan gagal karna data kosong
          toastr.warning('Nim Tidak Boleh Kosong', 'warning', {timeOut: 5000});
        }else{
          $.ajax({
            url: server+'/cek/'+fnim.value+'/'+ids, data: "", dataType: 'json', success: function(rows)
              {
                for (var i = 0; i < rows.length; i++) {
                  var row = rows[i];
                  if(row.status == 'Info'){
                    toastr.info(row.pesan, 'informasi', {timeOut: 5000});
                  }else if(row.status == 'Berhasil'){
                    location.reload();
                    toastr.success(row.pesan, 'Berhasil', {timeOut: 5000});
                  }else if(row.status == 'Error'){
                    toastr.error(row.pesan, 'error', {timeOut: 5000});
                  }else if(row.status == 'Warning'){
                    toastr.warning(row.pesan, 'warning', {timeOut: 5000});
                  }
                }
                console.log(rows);
              }
            });
        }
      }
  </script>

  </body>
</html>

<!DOCTYPE html>
<html lang="id">

<head>
  <meta charset="UTF-8">
  <title>Dashboard Fakultas</title>
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <link rel="stylesheet" href="{{ asset('asset/css/bootstrap.css') }}">
 


  <link rel="stylesheet" href="{{ asset('asset/css/bootstrap.min.css') }}">
  

  <!-- Bootstrap Grid CSS -->
  <link rel="stylesheet" href="{{ asset('asset/css/bootstrap-grid.css') }}">
  <link rel="stylesheet" href="{{ asset('asset/css/bootstrap-grid.min.css') }}">

  <!-- Bootstrap Reboot CSS -->
  <link rel="stylesheet" href="{{ asset('asset/css/bootstrap-reboot.css') }}">
  <link rel="stylesheet" href="{{ asset('asset/css/bootstrap-reboot.min.css') }}">
   <link rel="stylesheet" href="{{ asset('asset/css/toastr.css') }}">
  <link rel="stylesheet" href="{{ asset('asset/css/toastr.min.css') }}">

  <style>
    body,
    html {
      height: 100%;
      margin: 0;
      background-color: #f8f9fa;
    }

    .container-fluid {
      height: 100vh;
      display: flex;
      flex-direction: row;
    }

    .left-panel {
      flex: 1;
      background-color: #ffffff;
      padding: 30px;
      padding-top: 0px;
      display: flex;
      flex-direction: column;
      justify-content: center;
    }

    .right-panel {
      flex: 1;
      background: linear-gradient(to bottom right, #2196f3, #03a9f4);
      color: white;
      padding: 30px;
      display: flex;
      flex-direction: column;
      justify-content: center;
      align-items: center;
    }

    .menu-grid {
      display: grid;
      grid-template-columns: repeat(3, 1fr);
      grid-gap: 20px;
    }

    .menu-box {
      border-radius: 10px;
      color: white;
      text-align: left;
      padding: 25px 10px;
      font-weight: bold;
      font-size: 1.1rem;
      transition: transform 0.2s;
      text-decoration: none !important;
    }

    .menu-box:hover {
      transform: scale(1.05);
      color: white;
    }

    .box-red {
      background-color: #dc3545;
    }

    .box-orange {
      background-color: #fd7e14;
    }

    .box-green {
      background-color: #28a745;
    }

    .box-pink {
      background-color: #e83e8c;
    }

    .box-purple {
      background-color: #6f42c1;
    }

    .box-yellow {
      background-color: #ffc107;
    }

    .box-blue {
      background-color: #007bff;
    }

    .box-teal {
      background-color: #20c997;
    }

    .poster img {
      max-width: 200px;
      height: auto;
      border-radius: 10px;
      margin-bottom: 15px;
    }

    .poster-title {
      font-size: 2.2rem;
      font-weight: 700;
    }

    .poster-sub {
      background: white;
      color: #007bff;
      padding: 5px 15px;
      border-radius: 20px;
      font-weight: bold;
      display: inline-block;
      margin: 10px 0;
    }

    .poster-content h5 {
      font-weight: bold;
    }

    .footer-text {
      font-size: 0.85rem;
      color: #666;
      margin-top: 30px;
      text-align: center;
    }



    @media (max-width: 768px) {
      .container-fluid {
        flex-direction: column;
      }

      .left-panel,
      .right-panel {
        flex: none;
        height: auto;
      }

      .menu-grid {
        grid-template-columns: repeat(2, 1fr);
      }
    }

    .right-panel {
      flex: 1;
      padding: 0;
      overflow: hidden;
    }

    .carousel-inner img {
      border-radius: 0;
    }

    .icon {
      width: 80px;
      height: 80px;
      object-fit: cover;
    }
  </style>
</head>

<body>

  <div class="container-fluid">



    <input type="hidden" id="unit_id" value="{{$unit->id}}">
    <!-- Left Panel -->
    <div class="left-panel">
      <div class="d-flex justify-content-between align-items-center flex-wrap mb-5">

        <!-- Kiri: Logo UNRI dan Teks -->
        <div class="d-flex align-items-center flex-shrink-1">
          <img src="{{ asset('asset/img/logounri.png') }}" alt="Logo UNRI" style="height: 40px;">
          <div class="ml-3 pl-3 border-left" style="line-height: 1.2;">
            @php
            $words = explode(' ', $unit->name);
            $firstLine = $words[0] ?? '';
            $secondLine = implode(' ', array_slice($words, 1));
            @endphp
            <span style="font-weight: bold;">{!! $firstLine . '<br>' . $secondLine !!}</span>
          </div>
        </div>

        <!-- Kanan: Logo BLU dan DIKTI -->
        <div class="d-flex align-items-center flex-shrink-1 mt-2 mt-md-0">
          <img src="{{ asset('asset/img/logoblu.png') }}" alt="Logo BLU" style="height: 40px;" class="mr-2">
          <img src="{{ asset('asset/img/logodikti.png') }}" alt="Logo DIKTI" style="height: 40px;">
        </div>

      </div>
      <div class="menu-grid">
        <a href="#" class="menu-box box-red" onclick="formBukuTamu(this)">
          <img src="{{ asset('asset/img/icontamu.png') }}" class="icon" alt=""> <br>
          Buku <br>
          Tamu</a>
        <a href="#" class="menu-box box-orange">
          <img src="{{ asset('asset/img/iconstatistik.png') }}" class="icon" alt=""> <br>

          Statistik <br>
          Pengunjung</a>
        <a href="#" class="menu-box box-green">
          <img src="{{ asset('asset/img/icondenahlokasi.png') }}" class="icon" alt=""> <br>
          Denah <br>
          Lokasi Fakultas</a>
        <a href="#" class="menu-box box-pink">
          <img src="{{ asset('asset/img/iconpengumuman.png') }}" class="icon" alt=""> <br>

          Pengumuman<br>
          Fakultas</a>
        <a href="#" class="menu-box box-purple">
          <img src="{{ asset('asset/img/iconkegiatan.png') }}" class="icon" alt=""> <br>
          Kegiatan<br>Fakultas</a>
        <a href="#" class="menu-box box-yellow">
          <img src="{{ asset('asset/img/iconjadwal.png') }}" class="icon" alt=""> <br>
          Jadwal <br>Penting</a>
        <a href="#" class="menu-box box-blue">
          <img src="{{ asset('asset/img/iconinformasi.png') }}" class="icon" alt=""> <br>
          Kontak <br> Informasi</a>
        <a href="#" class="menu-box box-teal">
          <img src="{{ asset('asset/img/iconsarankritik.png') }}" class="icon" alt=""> <br>
          Kritik <br> dan Saran</a>
      </div>
      <div class="footer-text">
        © Universitas Riau
      </div>
    </div>

    <!-- Right Panel -->
    <div class="right-panel">
      <div id="eventCarousel" class="carousel slide h-100" data-ride="carousel" data-interval="4000">

        <!-- TITIK DOT NAVIGASI -->
        <ol class="carousel-indicators">
          <li data-target="#eventCarousel" data-slide-to="0" class="active"></li>
          <li data-target="#eventCarousel" data-slide-to="1"></li>
          <li data-target="#eventCarousel" data-slide-to="2"></li>
        </ol>

        <!-- SLIDE ISI -->
        <div class="carousel-inner h-100">
          <div class="carousel-item active h-100">
            <img src="{{asset('asset/img/slide/flyer1.png')}}" class="d-block w-100 h-100" style="object-fit: cover;" alt="Slide 1">
          </div>
          <div class="carousel-item h-100">
            <img src="{{asset('asset/img/slide/flyer2.png')}}" class="d-block w-100 h-100" style="object-fit: cover;" alt="Slide 2">
          </div>
          <div class="carousel-item h-100">
            <img src="{{asset('asset/img/slide/flyer3.png')}}" class="d-block w-100 h-100" style="object-fit: cover;" alt="Slide 3">
          </div>
        </div>

        <!-- PANAH KIRI -->
        <a class="carousel-control-prev" href="#eventCarousel" role="button" data-slide="prev">
          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
          <span class="sr-only">Previous</span>
        </a>

        <!-- PANAH KANAN -->
        <a class="carousel-control-next" href="#eventCarousel" role="button" data-slide="next">
          <span class="carousel-control-next-icon" aria-hidden="true"></span>
          <span class="sr-only">Next</span>
        </a>

      </div>
    </div>

  </div>
  <div id="containerModal"></div>
  <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.2/dist/js/bootstrap.bundle.min.js"></script>
  <script src="{{ asset('asset/js/toastr.js') }}"></script>
  <script src="{{ asset('asset/js/toastr.min.js') }}"></script>



  
  <script>
    // Optional: force trigger carousel (meskipun pakai data-ride)
    $('#eventCarousel').carousel({
      interval: 7000,
      ride: 'carousel'
    });

    function successMsg(txt) {
  toastr.options = {
    "closeButton": false,
    "debug": false,
    "newestOnTop": false,
    "progressBar": true,
    "positionClass": "toast-top-right",
    "preventDuplicates": false,
    "onclick": null,
    "showDuration": "1000",
    "hideDuration": "1000",
    "timeOut": "5000",
    "extendedTimeOut": "1000",
    "showEasing": "swing",
    "hideEasing": "linear",
    "showMethod": "fadeIn",
    "hideMethod": "fadeOut"
  }
  toastr["success"](txt);

}


    function formBukuTamu() {
      var id = $('#unit_id').val();
      var url = "{{ route('buku-tamu.form', ':id') }}".replace(':id', id);

      $.get(url, function(html) {
        $('#containerModal').html(html);
        $('#modalBukuTamu').modal('show');
      });
    }
  </script>
</body>


</html>
<!DOCTYPE html>
<html>

<head>
  <title>Monitor</title>
  <!-- Favicon icon -->
  <link rel="icon" type="image/png" sizes="16x16" href="favicon.ico">
  <link rel="stylesheet" type="text/css" href="<?= base_url("asset"); ?>/css/adminlte.min.css">
  <style type="text/css">
    body {
      background: url('<?= base_url("asset/images/background2.png"); ?>') no-repeat center center fixed;
      background-size: 100% 100%;
      -webkit-background-size: 100% 100%;
      -moz-background-size: 100% 100%;
      -o-background-size: 100% 100%;

    }

    .no-antrian {
      font-size: 70px !important;
    }

    .loket {
      font-size: 30px !important;
    }
  </style>
</head>

<body>
  <div class="wrapper" style="height:auto !important">

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid" id="data-antri">
        <div class="row" style="background-color: #dc3545;">
          <div class="col-lg-2"><img src="./asset/image/logo.png" width="200px" height="200px" alt></div>
          <div class="col-lg-8 text-center">
            <h1 style="font-size:60px; color:white">SISTEM ANTRIAN</h1>
            <h1 style="font-size:60px; color:white">PENGADILAN AGAMA TILAMUTA</h1>
          </div>
          <div class="col-lg-2"></div>
          <!-- ./col -->
        </div>
        <br>
        <br>
        <!-- Small boxes (Stat box) -->
        <div class="row">
          <!-- <div class="col-lg-1 col-6">
          </div> -->
          <div class="col">
            <!-- small box -->
            <div class="small-box bg-info">
              <div class="inner text-center">
                <p>LAYANAN INFORMASI DAN PERADUAN</p>
                <p>No. Antrian</p>
                <h3 id="noantrian1" class="no-antrian"></h3>
              </div>
              <span class="small-box-footer loket">LOKET 1</span>
            </div>
          </div>
          <!-- ./col -->
          <div class="col">
            <!-- small box -->
            <div class="small-box bg-success">
              <div class="inner text-center">
                <p>LAYANAN PENDAFTARAN PERKARA</p>
                <p>No. Antrian</p>
                <h3 id="noantrian2" class="no-antrian"></h3>
              </div>
              <span class="small-box-footer loket">LOKET 2 </span>
            </div>
          </div>
          <!-- ./col -->
          <div class="col">
            <!-- small box -->
            <div class="small-box bg-warning">
              <div class="inner text-center" style="color:white">
                <br>
                <p>LAYANAN PEMBAYARAN BIAYA</p>
                <p>No. Antrian</p>
                <h3 id="noantrian3" class="no-antrian"></h3>
              </div>
              <span class="small-box-footer loket">LOKET 3 </span>
            </div>
          </div>
          <!-- ./col -->
          <div class="col">
            <!-- small box -->
            <div class="small-box bg-danger">
              <div class="inner text-center">
                <p>LAYANAN PENGAMBILAN PRODUK PERADILAN</p>
                <p>No. Antrian</p>
                <h3 id="noantrian4" class="no-antrian"></h3>
              </div>
              <span class="small-box-footer loket">LOKET 4 </span>
            </div>
          </div>
          <!-- ./col -->
          <div class="col">
            <!-- small box -->
            <div class="small-box" style="background-color: purple; color: white;">
              <div class="inner text-center">
                <br>
                <p>POS LAYANAN HUKUM</p>
                <p>No. Antrian</p>
                <h3 id="noantrian5" class="no-antrian"></h3>
              </div>
              <span class="small-box-footer loket">LOKET 5 </span>
            </div>
          </div>
        </div>
        <div class="row flex-row d-flex justify-content-center">
          <div class="col-lg-6 text-center" style="background-color: black;">
            <span style="font-size:40px; color:white; ">
              <label id="hari_ini"></label>
            </span>
            <h3 style="font-size:70px; color:white; ">
              JAM <label id="waktu_sekarang"></label> WITA
            </h3>
          </div>
        </div>
        <br>
        <!-- /.row -->
        <div class="row" style="background-color: green; color:white;">
          <marquee behavior="" direction=""><span style="font-size:50px;">SELAMAT DATANG DI PENGADILAN AGAMA TILAMUTA</span>
          </marquee>
        </div>
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- ./wrapper -->


  <?php $this->load->view('script'); ?>
  <script type="text/javascript">
    $('.carousel').carousel({
      interval: 2000
    })

    function get_monitor() {

      $.ajax({
        url: '<?= site_url('monitor/get_data'); ?>',
        dataType: 'JSON',
        success: function(msg) {
          $('#noantrian1').text(msg.nomor1);
          $('#noantrian2').text(msg.nomor2);
          $('#noantrian3').text(msg.nomor3);
          $('#noantrian4').text(msg.nomor4);
          $('#noantrian5').text(msg.nomor5);

        }
      });

    }
    window.setInterval(get_monitor, 2000);
    window.setTimeout("waktu()", 1000);

    function waktu() {
      var waktu = new Date();
      setTimeout("waktu()", 1000);

      var str = "" + waktu.getSeconds();
      var pad = "00";
      var second = pad.substring(0, pad.length - str.length) + str;
      document.getElementById("waktu_sekarang").innerHTML = waktu.getHours() + ':' + waktu.getMinutes() + ':' + second;

      var months = ['Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'];

      var myDays = ['Minggu', 'Senin', 'Selasa', 'Rabu', 'Kamis', 'Jum&#39;at', 'Sabtu'];

      var date = new Date();

      var day = date.getDate();

      var month = date.getMonth();

      var thisDay = date.getDay(),

        thisDay = myDays[thisDay];

      var yy = date.getYear();

      var year = (yy < 1000) ? yy + 1900 : yy;

      document.getElementById('hari_ini').innerHTML = (thisDay + ', ' + day + ' ' + months[month] + ' ' + year);
    }
  </script>
</body>

</html>
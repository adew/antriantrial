<!DOCTYPE html>
<html>

<head>
	<title>Nomor Antrian</title>
	<!-- Favicon icon -->
	<link rel="icon" type="image/png" sizes="16x16" href="favicon.ico">
	<?php $this->load->view('css');
	?>
	<!-- <link rel="stylesheet" type="text/css" href="<?= base_url("asset"); ?>/css/adminlte.min.css"> -->
	<style type="text/css">
		@media print {
			body * {
				visibility: visible;
			}

			#print-antri1 * {
				visibility: visible;
			}

			#print-antri2 * {
				visibility: visible;
			}

			#print-antri3 * {
				visibility: visible;
			}

			#print-antri4 * {
				visibility: visible;
			}

			#print-antri5 * {
				visibility: visible;
			}
		}
	</style>
</head>

<body>
	<div class="container-fluid">
		<div class="row flex-row d-flex justify-content-center" style="background-color: green;">
			<div class="col-lg-2 text-right"><img src="./asset/image/logo.png" width="140px" height="140px" alt></div>
			<div class="col-lg-8 text-center">
				<span style="font-size:40px; color:white; ">
					<label id="hari_ini">SELAMAT DATANG DI</label>
				</span>
				<h3 style="font-size:50px; color:white; ">
					<label id="waktu_sekarang">PENGADILAN AGAMA TILAMUTA</label>
				</h3>
			</div>
			<div class="col-2"></div>
		</div>
		<div class="row">
			<div class="col">
				<div class="card-deck shadow-lg p-3 mb-3 bg-white rounded" id="print-antri1">
					<div class="card">
						<div class="card-header text-center" style="font-size: 15px; font-weight: bold; height:92px">LAYANAN INFORMASI DAN PERADUAN</div>
						<strong style="font-size: 100px; text-align: center;" id="no-antrian1"><?= $nomor1 + 1; ?></strong>
						<div class="card-body">
							<h5 class="card-title text-center" style="font-size: 30px; font-weight: bold">LOKET 1</h5>
						</div>
					</div>
				</div>
				<button type="button" onclick="print_antrian(1)" class="btn btn-lg btn-primary" style="width:100%;"> Cetak</button>
			</div>
			<div class="col">
				<div class="card-deck shadow-lg p-3 mb-3 bg-white rounded" id="print-antri2">
					<div class="card">
						<div class="card-header text-center" style="font-size: 15px; font-weight: bold; height:92px">LAYANAN PENDAFTARAN PERKARA</div>
						<strong style="font-size: 100px; text-align: center;" id="no-antrian2"><?= $nomor2 + 1; ?></strong>
						<div class="card-body">
							<h5 class="card-title text-center" style="font-size: 30px; font-weight: bold">LOKET 2</h5>
						</div>
					</div>
				</div>
				<button type="button" onclick="print_antrian(2)" class="btn btn-lg btn-primary" style="width:100%;"> Cetak</button>
			</div>
			<div class="col">
				<div class="card-deck shadow-lg p-3 mb-3 bg-white rounded" id="print-antri3">
					<div class="card">

						<div class="card-header text-center" style="font-size: 15px; font-weight: bold; height:92px">LAYANAN PEMBAYARAN BIAYA</div>
						<strong style="font-size: 100px; text-align: center;" id="no-antrian3"><?= $nomor3 + 1; ?></strong>
						<div class="card-body">
							<h5 class="card-title text-center" style="font-size: 30px; font-weight: bold">LOKET 3</h5>
						</div>
					</div>
				</div>
				<button type="button" onclick="print_antrian(3)" class="btn btn-lg btn-primary" style="width:100%;"> Cetak</button>
			</div>
			<div class="col">
				<div class="card-deck shadow-lg p-3 mb-3 bg-white rounded" id="print-antri4">
					<div class="card">
						<div class="card-header text-center" style="font-size: 15px; font-weight: bold; height:92px">LAYANAN PENGAMBILAN PRODUK PERADILAN</div>
						<strong style="font-size: 100px; text-align: center;" id="no-antrian4"><?= $nomor4 + 1; ?></strong>
						<div class="card-body">
							<h5 class="card-title text-center" style="font-size: 30px; font-weight: bold">LOKET 4</h5>
						</div>
					</div>
				</div>
				<button type="button" onclick="print_antrian(4)" class="btn btn-lg btn-primary" style="width:100%;"> Cetak</button>
			</div>
			<div class="col align-self-stretch">
				<div class="card-deck shadow-lg p-3 mb-3 bg-white rounded" id="print-antri5">
					<div class="card">


						<div class="card-header text-center" style="font-size: 15px; font-weight: bold; height:92px">POS LAYANAN HUKUM</div>
						<strong style="font-size: 100px; text-align: center;" id="no-antrian4"><?= $nomor5 + 1; ?></strong>
						<div class="card-body">
							<h5 class="card-title text-center" style="font-size: 30px; font-weight: bold">LOKET 5</h5>
						</div>
					</div>
				</div>
				<button type="button" onclick="print_antrian(5)" class="btn btn-lg btn-primary" style="width:100%;"> Cetak</button>
			</div>
		</div>
	</div>
	<?php $this->load->view('script'); ?>

	<script type="text/javascript">
		// function PrintDiv() {
		// 	var divToPrint = document.getElementById('print-antri1');
		// 	var popupWin = window.open('', '_blank', 'width=300,height=300');
		// 	popupWin.document.open();
		// 	popupWin.document.write('<html><body onload="window.print()">' + divToPrint.innerHTML + '</html>');
		// 	popupWin.document.close();
		// }

		function PrintDiv(id) {
			var printContents = document.getElementById('print-antri' + id).innerHTML;
			var originalContents = document.body.innerHTML;
			document.body.innerHTML = printContents;
			window.print();
			document.body.innerHTML = originalContents;
		}


		function print_antrian(param) {

			$.ajax({
				url: '<?= site_url("antrian/print_antrian/") ?>' + param,
				dataType: 'JSON',
				success: function(data) {
					if (data != null) {
						// $('#no-antrian').html(data);
						// window.print();
						PrintDiv(param);
						location.reload();
					} else {
						alert('gagal generate nomor');
					}
				}
			});

		}
	</script>
</body>

</html>
<!DOCTYPE html>
<html>

<head>
	<title>Login</title>
	<link rel="icon" type="image/png" sizes="16x16" href="favicon.ico">
	<?php $this->load->view('css'); ?>
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
			<div class="col-md-4">
			</div>
			<div class="col-md-4">

				<br>
				<br>
				<br>
				<h2 class="text-center">LOGIN</h2>
				<hr>
				<form id="form-login" method="post">
					<div class="form-group">
						<label for="exampleInputEmail1">Username</label>
						<input type="text" class="form-control" name="username" placeholder="Enter username">
					</div>
					<div class="form-group">
						<label for="exampleInputPassword1">Password</label>
						<input type="password" class="form-control" name="password" placeholder="Password">
					</div>
					<div class="form-group">
						<div class="row">
							<div class="col-md-5">
								<!-- <label></label> -->
								<button type="button" class="btn btn-primary" onclick="login()">Login</button>
							</div>
							<div class="col-md-7">
								<select name="noloket" class="form-control">
									<option value="0">ADMIN</option>
									<option value="1">LOKET 1</option>
									<option value="2">LOKET 2</option>
									<option value="3">LOKET 3</option>
									<option value="4">LOKET 4</option>
									<option value="5">LOKET 5</option>

								</select>
							</div>
						</div>
					</div>
					<!-- <button type="button" class="btn btn-primary" onclick="login()">Submit</button> -->
				</form>

			</div>
			<div class="col-md-4">
			</div>
		</div>
	</div>
	<?php $this->load->view('script'); ?>
	<script type="text/javascript">
		// Execute a function when the user releases a key on the keyboard
		// input.addEventListener("keyup", function(event) {
		// Cancel the default action, if needed
		// event.preventDefault();
		// Number 13 is the "Enter" key on the keyboard
		// if (event.keyCode === 13) {
		// Trigger the button element with a click
		// login();
		// }
		// }); 


		function login() {
			var data = $('#form-login').serialize();
			$.ajax({
				url: '<?= site_url("login/cek_login") ?>',
				data: data,
				type: 'POST',
				dataType: 'JSON',
				success: function(response) {
					if (response == 1) {
						location.replace('<?= site_url('dashboard'); ?>');
					} else if (response == 2) {
						alert('Komputer tidak terdaftar sebagai loket pendaftaran, segera hubungi admin');
					} else if (response == 3) {
						location.replace('<?= site_url('admin'); ?>');
					} else {
						alert("Password atau username salah atau tidak terdaftar");
					}
				}
			});

		}
	</script>
</body>

</html>
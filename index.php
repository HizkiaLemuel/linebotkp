<!DOCTYPE html>
<html lang="en">
<head>
	<title>YOUTH GKI DELIMA</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->
	<link rel="icon" type="image/png" href="images/icons/favicon.ico"/>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/Linearicons-Free-v1.0.0/icon-font.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/animate/animate.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/css-hamburgers/hamburgers.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/animsition/css/animsition.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/select2/select2.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/daterangepicker/daterangepicker.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="css/util.css">
	<link rel="stylesheet" type="text/css" href="css/main.css">
<!--===============================================================================================-->
</head>
<body>


	<div class="container-contact100">
		<div class="wrap-contact100">
			<form class="contact100-form validate-form" action="submit.php" method="get">
				<span class="contact100-form-title">
					Welcome to Youth GKI Delima
				</span>

                <label class="label-input100" for="message">
                    Hai rekan pemuda! <br/>
                    Selamat datang dan selamat bergabung di Komisi Pemuda GKI Delima. <br/>
                    Kami mohon kesedianmu untuk mengisi form dibawah ini agar kami dapat berkenalan lebih lanjut denganmu. <br/>
                </label>

				<label class="label-input100" for="first-name">Nama kamu? *</label>
				<div class="wrap-input100 rs1-wrap-input100 validate-input" data-validate="Type first name">
					<input id="first-name" class="input100" type="text" name="name" placeholder="Nama Lengkap">
					<span class="focus-input100"></span>
				</div>
				<div class="wrap-input100 rs2-wrap-input100 validate-input" data-validate="Type last name">
					<input class="input100" type="text" name="nick-name" placeholder="Panggilan">
					<span class="focus-input100"></span>
				</div>

                <label class="label-input100" for="phone">Jenis Kelamin *</label>
                <div class="wrap-input100 validate-input custom-input100" data-validate="Fill gender">
                    <input type="radio"  name="gender" value="Perempuan"> Female<br>
                    <input type="radio" name="gender" value="Laki-laki"> Male<br>
                </div>

                <label class="label-input100" for="phone">Tanggal lahir *</label>
                <div class="wrap-input100 validate-input" data-validate="Fill date of birth">
                    <input id="dob" class="input100" type="date" name="dob" placeholder="Date of Birth">
                    <span class="focus-input100"></span>
                </div>

				<label class="label-input100" for="phone">Nomor HP *</label>
				<div class="wrap-input100 validate-input" data-validate="Fill phone number">
					<input id="phone" class="input100" type="text" name="phone" placeholder="Eg. 0800000000">
					<span class="focus-input100"></span>
				</div>

				<label class="label-input100" for="email">Email</label>
				<div class="wrap-input100">
					<input id="email" class="input100" type="text" name="email" placeholder="Eg. example@email.com">
					<span class="focus-input100"></span>
				</div>

				<label class="label-input100" for="message">Alamat *</label>
				<div class="wrap-input100 validate-input" data-validate = "Address is required">
					<textarea id="address" class="input100" name="address" placeholder="Eg. Tanjung Duren Selatan"></textarea>
					<span class="focus-input100"></span>
				</div>

				<label class="label-input100" for="message">Hobi</label>
				<div class="wrap-input100">
					<textarea id="hobby" class="input100" name="hobby" placeholder="Eg. Nonton, Tidur, Makan"></textarea>
					<span class="focus-input100"></span>
				</div>

				<label class="label-input100" for="message">Social Media</label>
				<div class="wrap-input100 " >
					<textarea id="socmed" class="input100" name="socmed" placeholder="Eg. instagram:kpdelima"></textarea>
					<span class="focus-input100"></span>
				</div>

				<label class="label-input100" for="message">Status *</label>
				<div class="wrap-input100 validate-input custom-input100" data-validate = "Status is required">
					<select class="input selection-2" name="status">
					  <option value="kerja">Kerja</option>
					  <option value="kuliah">Kuliah</option>
                        <option value="lain-lain">Lainnya</option>
					</select>
					<span class="focus-input100"></span>
				</div>

				<label class="label-input100" for="message">Apakah kamu ingin turut ambil bagian dalam pelayanan?</label>
				<div class="wrap-input100 custom-input100 custom-checkbox" >
					<span class="txt2">
							Ya, saya ingin turut ambil bagian dalam pelayanan sebagai :
					</span>
					<br/>

					<label><input type="checkbox" name="liturgos" value="1" label="Liturgos"> &nbsp;Liturgos </label><br/>
                    <label><input  type="checkbox" name="singer" value="1"> &nbsp;Singer</label> <br/>
					<label><input  type="checkbox" name="pemusik" value="1"> &nbsp;Pemusik</label> <br/>
					<label><input  type="checkbox" name="usher" value="1"> &nbsp;Usher</label> <br/>
					<label><input  type="checkbox" name="kolektan" value="1"> &nbsp;Kolektan</label> <br/>
					<label><input  type="checkbox" name="multi" value="1"> &nbsp;Multimedia</label> <br/>
                    <label><input  type="checkbox" name="sm" value="1"> &nbsp;Social Media
					<span class="focus-input100"></span>
				</div>

				<div class="container-contact100-form-btn">
					<button class="contact100-form-btn">
						Submit Data
					</button>
				</div>
			</form>

			<div class="contact100-more flex-col-c-m" style="background-image: url('images/bg.jpg');">

				<div class="flex-w  p-b-47">
					<img class="img" style="width: 150px; height: 100px" src="images/logo.png" alt="logokp">
				</div>

				<div class="flex-w size1 p-b-47">
					<div class="txt1 p-r-25">
						<span class="lnr lnr-heart"></span>
					</div>

					<div class="flex-col size2">
						<span class="txt1 p-b-20">
							Service
						</span>

						<span class="txt2">
							Every Sunday <br/>
							11.00am<br/>
							@ Ruang Kebaktian GKI Delima
						</span>
					</div>
				</div>


				<div class="flex-w size1 p-b-47">
					<div class="txt1 p-r-25">
						<span class="lnr lnr-map-marker"></span>
					</div>

					<div class="flex-col size2">
						<span class="txt1 p-b-20">
							Address
						</span>

						<span class="txt2">
							Jln. Delima IV/5 - Tanjung Duren, Jakarta 11470
						</span>
					</div>
				</div>

				<div class="dis-flex size1 p-b-47">
					<div class="txt1 p-r-25">
						<span class="lnr lnr-phone-handset"></span>
					</div>

					<div class="flex-col size2">
						<span class="txt1 p-b-20">
							Lets Talk
						</span>

						<span class="txt3">
							(021) 5684463<br/>
                            089656495148 (Yeheskiel) <br/>
                            081290194918 (Enjel) <br/>
						</span>
					</div>
				</div>

				<div class="dis-flex size1 p-b-47">
					<div class="txt1 p-r-25">
						<span class="lnr lnr-envelope"></span>
					</div>

					<div class="flex-col size2">
						<span class="txt1 p-b-20">
							General Support
						</span>

						<span class="txt3">
							gkidelima@gmail.com<br/>
                            gkidelima.kp@gmail.com
						</span>
					</div>
				</div>
			</div>
		</div>
	</div>



	<div id="dropDownSelect1"></div>

<!--===============================================================================================-->
	<script src="vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/animsition/js/animsition.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/bootstrap/js/popper.js"></script>
	<script src="vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/select2/select2.min.js"></script>
	<script>
		$(".selection-2").select2({
			minimumResultsForSearch: 20,
			dropdownParent: $('#dropDownSelect1')
		});
	</script>
<!--===============================================================================================-->
	<script src="vendor/daterangepicker/moment.min.js"></script>
	<script src="vendor/daterangepicker/daterangepicker.js"></script>
<!--===============================================================================================-->
	<script src="vendor/countdowntime/countdowntime.js"></script>
<!--===============================================================================================-->
	<script src="js/main.js"></script>
	<!-- Global site tag (gtag.js) - Google Analytics -->
	<script async src="https://www.googletagmanager.com/gtag/js?id=UA-23581568-13"></script>
	<script>
	  window.dataLayer = window.dataLayer || [];
	  function gtag(){dataLayer.push(arguments);}
	  gtag('js', new Date());

	  gtag('config', 'UA-23581568-13');
	</script>
</body>
</html>

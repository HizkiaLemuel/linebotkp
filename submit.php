<!DOCTYPE html>
<html lang="en">
<head>
	<title>Contact V17</title>
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
        <div class="contact100-more flex-col-c-m" style="background-image: url('images/bg.jpg');">

            <div class="flex-w  p-b-47">
                <img class="img" style="width: 150px; height: 100px" src="images/logo.png" alt="logokp">
            </div>

            <div class="flex-w size1 p-b-47">
                <div class="txt1 p-r-25">
                    <span class="lnr lnr-heart"></span> <br/>
<?php

$servername = "localhost:3306";
$username = "kuliverc_kp";
$password = "kpdelima";
$database = "kuliverc_kpdelima";

$conn = new mysqli($servername, $username, $password, $database);
if ($conn->connect_error) {
    error_log("Connection failed: " . mysqli_connect_error());
}

$sql = "INSERT INTO jemaat (nama_lengkap, nama_panggilan, jenis_kelamin,  ttl, alamat, phone, hobby, socialmedia, pekerjaan, usher, pemusik, multimedia, liturgos, kolektan, singer, socmed, email) VALUES ('".$_GET["name"]."', '".$_GET["nick-name"]."', '".$_GET["gender"]."' , '".$_GET["dob"]."' , '".$_GET["address"]."' , '".$_GET["phone"]."' , '".$_GET["hobby"]."' , '".$_GET["socmed"]."' , '".$_GET["status"]."' , '".$_GET["usher"]."' , '".$_GET["pemusik"]."' , '".$_GET["multi"]."' , '".$_GET["liturgos"]."' , '".$_GET["kolektan"]."' , '".$_GET["singer"]."' , '".$_GET["sm"]."', '".$_GET["email"]."' )";

if ($conn->query($sql) === TRUE) {
	echo "<span class='txt1 p-b-20'>Terimakasih, datamu sudah masuk. GBU</span><br/>";
}
else{
	echo "<span class='txt1 p-b-20'>Maaf, ada kesalahan. Mohon hubungi pengurus KP. Terimakasih</span><br/>";
}

?>
                </div>
            </div>
        </div>

    </div>
</div>
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




<?php
/**
 * Created by PhpStorm.
 * User: hizkia
 * Date: 10/04/18
 * Time: 19.28
 */

$servername = "https://kuliver.com";
$username = "kuliverc_kp";
$password = "kpdelima";

// Create connection
//$conn = mysqli_connect($servername, $username, $password);
$mysqli = new mysqli($servername, $username, $password, "kuliverc_kpdelima");
// Check connection
if ($mysqli->connect_error) {
    error_log("Connection failed: " . mysqli_connect_error());
}

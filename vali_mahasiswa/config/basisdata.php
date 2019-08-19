<?php
/* Konfigurasi Online 
$servername = "localhost";
$database = "dbpasca";
$username = "pascaipb";
$password = "1T5ps1P8";
*/

/* Konfigurasi Offline/Localhost */
$servername = "localhost";
$database = "dbpasca";
$username = "root";
$password = "";

// Membuat koneksi ke database
$connect = mysqli_connect($servername, $username, $password, $database);

// Mengecek koneksi database
if (!$connect) {
    die("Koneksi gagal: " . mysqli_connect_error());
}
//echo "Koneksi berhasil";
//echo "<br>";
//echo "<a href='javascript:history.go(-1)'><<</a>";
//mysqli_close($connect);

?>

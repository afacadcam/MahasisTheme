<?php
if(!isset($_SESSION))
{
	session_start();
}
if ( isset($_SESSION['login']) )
{
  header('location: ../index');
  exit();
}

include '../config/basisdata.php';

if ( isset($_POST["login"]) )
{
  // Data yang dikirimkan ke API
  $postData = array(
      'username' => $_POST['username'],
      'password' => $_POST['password']
  );

  /* ================================================== */
  // LDAP LOGIN MAHASISWA
  /* ================================================== */
  $api_login = curl_init('https://api.ipb.ac.id/v1/Authentication/LoginMahasiswa');
  curl_setopt_array($api_login, array(
      CURLOPT_POST => TRUE,
      CURLOPT_RETURNTRANSFER => TRUE,
      CURLOPT_HTTPHEADER => array(
          'X-IPBAPI-TOKEN : Bearer bcf88c17-2911-34e6-a70c-ba190aae9272',
          'Content-Type: application/json'
      ),
      CURLOPT_POSTFIELDS => json_encode($postData)
  ));  
  $responseLogin = curl_exec($api_login);   // Eksekusi untuk mengirimkan request

  // Mematikan jika terjadi eror response API
  if($responseLogin === FALSE)
  {
      die(curl_error($api_login));
  }  
  $datamahasiswa = json_decode($responseLogin, TRUE);   // Men-Decode respon data mahasiswa

  if ($error = $datamahasiswa['Error'])
  {
     $output = hash('ripemd160', $error);
     header("Location: ../login?failed='$output' ");
  }

  // Respon sukses yang didapatkan mahasiswa  
  $nim = $datamahasiswa['NIM'];
  $user = $datamahasiswa['Username'];
  $kodemayor = $datamahasiswa['KodeMayor'];
  $mayor = $datamahasiswa['Mayor'];
  $mhsID = $datamahasiswa['MahasiswaId'];
  $auth = $datamahasiswa['Token'];
  $authkey = substr(base64_encode(uniqid(str_shuffle($auth))), 0, 20);
  $pass = password_hash($_POST["password"], PASSWORD_DEFAULT);
  /* ================================================== */


  /* ================================================== */
  // BIODATA MAHASISWA
  /* ================================================== */
  $api_orang = curl_init('https://api.ipb.ac.id/v1/Orang/Mahasiswa/BiodataByNim?nim='.$nim);
  curl_setopt_array($api_orang, array(
      CURLOPT_RETURNTRANSFER => TRUE,
      CURLOPT_HTTPHEADER => array(
          'X-IPBAPI-TOKEN : Bearer bcf88c17-2911-34e6-a70c-ba190aae9272',
          'Content-Type: application/json'
      ),
  ));

  $resonseBiodata = curl_exec($api_orang);  // Eksekusi untuk mengirimkan request

  // Mematikan jika terjadi eror response API
  if($resonseBiodata === FALSE){
      die(curl_error($api_orang));
  }
  $biodata = json_decode($resonseBiodata, TRUE);  // Men-Decode respon biodata mahasiswa
  // Respon yang mau diambil yaitu biodata mahasiswa
  $jalurmasuk = $biodata['JalurMasuk'];
  $tahunmasuk = $biodata['TahunMasuk'];
  $jalan = $biodata['Jalan'];
  /* ================================================== */


	/* ================================================== */
  // IDENTIFIER ORANG_ID MAHASISWA
  /* ================================================== */
	$api_orangid = curl_init('https://api.ipb.ac.id/v1/Orang/Identifier/OrangIdByNim?nim='.$nim);
	curl_setopt_array($api_orangid, array(
			CURLOPT_RETURNTRANSFER => TRUE,
			CURLOPT_HTTPHEADER => array(
					'X-IPBAPI-TOKEN : Bearer bcf88c17-2911-34e6-a70c-ba190aae9272',
					'Content-Type: application/json'
			),
	));

  $responseOrang = curl_exec($api_orangid);  // Eksekusi untuk mengirimkan request

  // Mematikan jika terjadi eror response API
	if($responseOrang === FALSE){
			die(curl_error($api_orangid));
	}
	$orangid = json_decode($responseOrang, TRUE);  // Men-Decode respon data mahasiswa
	$IDorang = $orangid['OrangId'];  // Respon yang mau diambil yaitu orangid mahasiswa
	/* ================================================== */

  
  // Buat kondisi untuk pengecekan data eror, kosong, eksis, dan kecocokan data
  if( (empty($datamahasiswa['Error']) and !empty($datamahasiswa) and $datamahasiswa['KodeStrata']!='S1') )
  {
    $cek_user = mysqli_query($connect, "SELECT * FROM user WHERE username='$user'");
    $cek_pengaju = mysqli_query($connect, "SELECT * FROM mahasiswa_pengajuan WHERE mahasiswa_id='$mhsID'");

    // cek keberadaan data username dalam tabel
    if (mysqli_num_rows($cek_user) > 0)   // Jika ada data usernya, langsung masuk
    {

        if (mysqli_num_rows($cek_pengaju) < 1) 
        {
            $sqlpengaju = "INSERT INTO mahasiswa_pengajuan (mahasiswa_id, kodemayor, mayor, jalur, alamat) VALUES ('$mhsID', '$kodemayor', '$mayor', '$jalurmasuk', '$jalan') ";
            $inputpengaju = mysqli_query($connect, $sqlpengaju);

            if($inputpengaju === FALSE){
                //echo "Error " . mysqli_error($connect);
                echo "Error";
                exit();
            }
        }
      
        // cek kesesuaian password
        $data = mysqli_fetch_assoc($cek_user);

        if ( password_verify($_POST['password'], $data['password_hash']) )
        {

            // mengirim session ke halaman yang telah terautentikasi
            $_SESSION['login'] = true;
            $_SESSION['username'] = $data['username'];
            $_SESSION['level'] = $data['akses_id'];
            $_SESSION['orang'] = $data['orangid'];
            $_SESSION['tahunmasuk'] = $tahunmasuk;
            $_SESSION['mahasiswaID'] = $mhsID;
            
            header('Location: ../sukses');
        }
    }
    else  // Jika data belum terdapat didalam basisdata, maka lakukan perintah simpan data dari API ke database
    {  

        $aksesid = 6;
        $status = 10;
        $time = date("Y-m-d");

        $sql = "INSERT INTO user (username, auth_key, password_hash, akses_id, status, created_at, orangid) VALUES ('$user', '$authkey', '$pass', '$aksesid', '$status', '$time', '$IDorang') ";
        $result = mysqli_query($connect, $sql);

        $cek_pengaju = mysqli_query($connect, "SELECT * FROM mahasiswa_pengajuan WHERE mahasiswa_id='$mhsID'");
        if (mysqli_num_rows($cek_pengaju) < 1) 
        {
            $sqlpengaju = "INSERT INTO mahasiswa_pengajuan (mahasiswa_id, kodemayor, mayor, jalur, alamat) VALUES ('$mhsID', '$kodemayor', '$mayor', '$jalurmasuk', '$jalan') ";
            $inputpengaju = mysqli_query($connect, $sqlpengaju);

            if($inputpengaju === FALSE){
                // echo "Error " . mysqli_error($connect);
                echo "Error";
                exit();
            }
        }

        if ($result === TRUE)
        {
            $cek_user = mysqli_query($connect, "SELECT * FROM user WHERE username='$user'");
            $data = mysqli_fetch_assoc($cek_user);

            //mengirim session ke halaman yang telah terautentikasi
            $_SESSION['login'] = true;            
            $_SESSION['username'] = $data['username'];
            $_SESSION['level'] = $data['akses_id'];
            $_SESSION['orang'] = $data['orangid'];
            $_SESSION['tahunmasuk'] = $tahunmasuk;
            $_SESSION['mahasiswaID'] = $mhsID;

            //mengarahkan halaman notifikasi setelah sukes menyimpan
            header('Location: ../sukses');
        } else {
            //echo "Error " . mysqli_error($connect); //Buka hanya jika deperlukan untuk identifikasi eror sql, sebaiknya jangan ditampilkan
            echo "Error";
            exit();
        }
    }

  } else {
      echo "Anda bukan mahasiswa Pascasarjana!";
      return false;
  }
}

?>
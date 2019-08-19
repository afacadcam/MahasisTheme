<?php 

	$sql = mysqli_query( $connect, "SELECT O.nama, M.nim, S.kode FROM orang O JOIN mahasiswa M ON O.id = M.orang_id JOIN strata S ON M.strata_id = S.id WHERE O.id =".$_SESSION['orang']);
	$data = mysqli_fetch_assoc($sql);
	$_SESSION['nama'] = $data['nama'];
	$_SESSION['nim'] = $data['nim'];
	$_SESSION['strata'] = $data['kode'];
	// Buat Variabel
	$nama = $_SESSION['nama'];
	$nim = $_SESSION['nim'];
	$strata = $_SESSION['strata'];

	/** Data di Tabel Mahasiswa Pengajuan */
	$pengaju = mysqli_query( $connect, "SELECT Y.Inisial, P.mayor, P.jalur FROM mahasiswa_pengajuan P JOIN mayor Y ON P.kodemayor = Y.Kode WHERE P.mahasiswa_id =".$_SESSION['mahasiswaID']);
	$hasil = mysqli_fetch_assoc($pengaju);
	$_SESSION['kodeps'] = $hasil['Inisial'];
	$_SESSION['mayor'] = $hasil['mayor'];
	$_SESSION['jalur'] = $hasil['jalur'];
	// Buat Variabel
	$kodeps = $_SESSION['kodeps'];
	$mayor = $_SESSION['mayor'];
	$jalur = $_SESSION['jalur'];

	if ($strata == 'S2') 
	{

		/** Data di Tabel Mahasiswa Magister */
		$sql2 = mysqli_query( $connect, "SELECT T.nama FROM mahasiswamagister A JOIN statusakademik T ON A.statusakademik_id = T.id WHERE A.orang_id =".$_SESSION['orang']);
		$data2 = mysqli_fetch_assoc($sql2);
		$_SESSION['nama2'] = $data2['nama'];
		// Buat Variabel
		$status2 = $_SESSION['nama2'];

	} 
	else 
	{
		/** Data di Tabel Mahasiswa Doktor */
		$sql3 = mysqli_query( $connect, "SELECT T.nama FROM mahasiswadoktor B JOIN statusakademik T ON B.statusakademik_id = T.id WHERE B.orang_id =".$_SESSION['orang']);
		$data3 = mysqli_fetch_assoc($sql3);
		$_SESSION['nama3'] = $data3['nama'];
		// Buat Variabel
		$status3 = $_SESSION['nama3'];

	}	

?>
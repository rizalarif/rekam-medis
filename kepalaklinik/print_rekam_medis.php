<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Untitled Document</title>
<!-- Bootstrap Core CSS -->
<link href="../vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

<!-- MetisMenu CSS -->
<link href="../vendor/metisMenu/metisMenu.min.css" rel="stylesheet">

<!-- Custom CSS -->
<link href="../dist/css/sb-admin-2.css" rel="stylesheet">

<!-- Custom Fonts -->
<link href="../vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
</head>
<body>
	<table width="100%" border="0">
		<tr>
			<td widht="100%"><a href=''>
					<h1><img src="../img/klinik.png" width="100px" onclick="javascript:window.print()" height="100px" alt=""></a>  Laporan Rekam Medis</h1></a></td>
</td>

		</tr>
	</table>

<table class="table">
 <thead>
  <tr>
    		<th>No.</th>
				<th>Nomer Pasien</th>
    		<th>Nama Pasien</th>
				<th>Dokter</th>
    		<th>Tanggal Periksa</th>
				<th>Terapi</th>
				<th>Diagnosa</th>
  </tr>
 </thead>
<?php
  include '../config/koneksi.php';
	 		$no=0;
			if (!isset($_POST['cari']) && empty($_POST['pencarian'])) {
	 			$sql=mysqli_query($koneksi, "SELECT * FROM tb_rekam_medis ORDER BY id desc ");
	 			while($bc=mysqli_fetch_array($sql)){

					$sql2	=	mysqli_query($koneksi, "SELECT * FROM tb_pasien WHERE id_pasien='$bc[id_pasien]'");
					$bc2	=	mysqli_fetch_array($sql2);

											$sql3	=	mysqli_query($koneksi, "SELECT * FROM tb_dokter WHERE id_dokter='$bc[id_dokter]'");
											$bc3	=	mysqli_fetch_array($sql3);



		$no++;
  ?>
  <tbody>
  <tr>
    		<td><?php echo"$no"; ?></td>
				<td><?php echo"$bc[id_pasien]"; ?></td>
    		<td><?php echo"$bc2[nama_pasien] <br>Usia : $bc[umur]<br>$bc2[nik_pasien]"; ?></td>
    		<td><?php echo"$bc3[nama_dokter]"; ?></td>
				<td><?php echo"$bc[tgl_periksa]"; ?></td>
				<td><?php echo"$bc[terapi]"; ?></td>
				<td><?php echo"$bc[diagnosa]"; ?></td>



  </tr>
  </tbody>
  <?php
		}
}else {
					$sql4	=	mysql_query("SELECT * FROM tb_pasien WHERE nik_pasien='$_POST[pencarian]'");
					$bc4	=	mysql_fetch_array($sql4);

	$sql=mysql_query("SELECT * FROM tb_rekam_medis WHERE id_pasien='$bc4[id_pasien]' ORDER BY id desc ");
	while($bc=mysql_fetch_array($sql)){

		$sql2	=	mysql_query("SELECT * FROM tb_pasien WHERE id_pasien='$bc[id_pasien]'");
		$bc2	=	mysql_fetch_array($sql2);

								$sql3	=	mysql_query("SELECT * FROM tb_dokter WHERE id_dokter='$bc[id_dokter]'");
								$bc3	=	mysql_fetch_array($sql3);
$no++;
?>
<tbody>
<tr>
			<td><?php echo"$no"; ?></td>
			<td><?php echo"$bc[id_pasien]"; ?></td>
			<td><?php echo"$bc2[nama_pasien] <br>Usia : $bc[umur]<br>$bc2[nik_pasien]"; ?></td>
			<td><?php echo"$bc3[nama_dokter]"; ?></td>
			<td><?php echo"$bc[tgl_periksa]"; ?></td>
			<td><?php echo"$bc[terapi]"; ?></td>
			<td><?php echo"$bc[diagnosa]"; ?></td>



</tr>
</tbody>
<?php
	}
}
  ?>
</table>
</body>
</html>

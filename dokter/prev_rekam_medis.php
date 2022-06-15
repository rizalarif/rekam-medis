<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Untitled Document</title>
</head>
<body>
	<table width="100%" border="0">
		<tr>
			<td widht="60%"><h1>Data Rekam Medis</h1></td>
			<td width="60%" align="right" valign="bottom">
					<form action="<?php $_SERVER['PHP_SELF'] ?>" method="post">
						  <input type="text" name="pencarian" value=""><input type="submit" name="cari" value="CARI">
					</form>
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
				<th>Pilihan</th>
  </tr>
 </thead>
<?php
  include '../config/koneksi.php';
	 		$no=0;
			if (!isset($_POST['cari']) && empty($_POST['pencarian'])) {
	 			$sql=mysqli_query($koneksi,"SELECT * FROM tb_rekam_medis ORDER BY id desc ");
	 			while($bc=mysqli_fetch_array($sql)){

					$sql2	=	mysqli_query($koneksi,"SELECT * FROM tb_pasien WHERE id_pasien='$bc[id_pasien]'");
					$bc2	=	mysqli_fetch_array($sql2);

											$sql3	=	mysqli_query($koneksi,"SELECT * FROM tb_dokter WHERE id_dokter='$bc[id_dokter]'");
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


				<td>
					<a href="?menu=editRekamMedis&id=<?php echo"$bc[id]"; ?>">
						<i class="glyphicon glyphicon-pencil"></i></a>&nbsp;&nbsp;&nbsp;&nbsp;
						<a href="del_rekam_medis.php?id=<?php echo"$bc[id]"; ?>">
						<i class="glyphicon glyphicon-remove" style="color:#FF0000"></i></a></td>
  </tr>
  </tbody>
  <?php
		}
}else {
					$sql4	=	mysqli_query($koneksi, "SELECT * FROM tb_pasien WHERE nik_pasien='$_POST[pencarian]'");
					$bc4	=	mysqli_fetch_array($sql4);

	$sql=mysqli_query($koneksi, "SELECT * FROM tb_rekam_medis WHERE id_pasien='$bc4[id_pasien]' ORDER BY id desc ");
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

			<td>
				<a href="?menu=editRekamMedis&id=<?php echo"$bc[id]"; ?>">
					<i class="glyphicon glyphicon-pencil"></i></a>&nbsp;&nbsp;&nbsp;&nbsp;
					<a href="del_rekam_medis.php?id=<?php echo"$bc[id]"; ?>">
					<i class="glyphicon glyphicon-remove" style="color:#FF0000"></i></a></td>
</tr>
</tbody>
<?php
	}
}
  ?>
</table>
</body>
</html>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Untitled Document</title>
</head>
<body>
	<table width="100%">
		<tr>
			<td widht="40%"><h1>Laporan Pasien</h1></td>
			<td width="60%" align="right" valign="bottom"><a href="print_pasien.php"><img src="../img/print.png" alt="">Cetak laporan</a></td>
		</tr>
	</table>

<table class="table">
 <thead>
  <tr>
    		<th>No.</th>
				<th>NIK Pasien</th>
    		<th>Nama Pasien</th>
				<th>Umur</th>
    		<th>Jenis Kelamin</th>
    		<th>Tanggal Lahir</th>
				<th>Alamat</th>
    		<th>Tanggal Daftar</th>
  </tr>
 </thead>
<?php
  include '../config/koneksi.php';
	 		$no=0;
	 			$sql=mysqli_query($koneksi, "SELECT * FROM tb_pasien WHERE stts='1'  ORDER BY id_pasien desc ");
	 			while($bc=mysqli_fetch_array($sql)){
	 $no++;
  ?>
  <tbody>
  <tr>
    		<td><?php echo"$no"; ?></td>
				<td><?php echo"$bc[nik_pasien]"; ?></td>
    		<td><?php echo"$bc[nama_pasien]"; ?></td>
    		<td><?php echo"$bc[umur]"; ?></td>
				<td><?php echo"$bc[jk]"; ?></td>
				<td><?php echo"$bc[tgl_lahir]"; ?></td>
    		<td><?php echo"$bc[alamat_pasien]"; ?></td>
    		<td><?php echo"$bc[tgl_daftar]"; ?></td>

  </tbody>
  <?php
	}
  ?>
</table>
</body>
</html>

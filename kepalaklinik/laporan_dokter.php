<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Untitled Document</title>
</head>
<body>
	<table width="100%">
		<tr>
			<td widht="40%"><h1>Laporan Dokter</h1></td>
			<td width="60%" align="right" valign="bottom"><a href="print_dokter.php"><img src="../img/print.png" alt="">Cetak laporan</a></td>
		</tr>
	</table>

<table class="table">
 <thead>
  <tr>
    		<th>No.</th>
				<th>Id Dokter</th>
    		<th>Nama Dokter</th>
    		<th>Jenis Kelamin</th>
        <th>Umur</th>
				<th>Alamat</th>
        <th>Username</th>
        <th>Password</th>
  </tr>
 </thead>
<?php
  include '../config/koneksi.php';
	 		$no=0;
	 			$sql=mysqli_query($koneksi, "SELECT * FROM tb_dokter WHERE stts='1'  ORDER BY id_dokter desc ");
	 			while($bc=mysqli_fetch_array($sql)){
          $sql2 = mysqli_query($koneksi, "SELECT * FROM tb_user WHERE id_dokter='$bc[id_dokter]'");
          $bc2  = mysqli_fetch_array($sql2);
	 $no++;
  ?>
  <tbody>
  <tr>
    		<td><?php echo"$no"; ?></td>
				<td><?php echo"$bc[id_dokter]"; ?></td>
    		<td><?php echo"$bc[nama_dokter]"; ?></td>
    		<td><?php echo"$bc[jk_dokter]"; ?></td>
				<td><?php echo"$bc[umur]"; ?></td>
				<td><?php echo"$bc[alamat_dokter]"; ?></td>
    		<td><?php echo"$bc2[pengguna]"; ?></td>
        <td><?php echo"$bc2[sandi]"; ?></td>

  </tr>
  </tbody>
  <?php
	}
  ?>
</table>
</body>
</html>

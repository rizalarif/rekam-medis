<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Untitled Document</title>
</head>
<body>
	<table width="100%">
		<tr>
			<td widht="40%"><h1>Laporan User</h1></td>
			<td width="60%" align="right" valign="bottom"><a href="print_user.php"><img src="../img/print.png" alt="">Cetak laporan</a></td>
		</tr>
	</table>

<table class="table">
 <thead>
  <tr>
    		<th>No.</th>
				<th>Id User</th>
        <th>Username</th>
        <th>Password</th>
				<th>Hak Akses</th>
  </tr>
 </thead>
<?php
  include '../config/koneksi.php';
	 		$no=0;
	 			$sql=mysqli_query($koneksi, "SELECT * FROM tb_user");
	 			while($bc=mysqli_fetch_array($sql)){

	 $no++;
  ?>
  <tbody>
  <tr>
    		<td><?php echo"$no"; ?></td>
				<td><?php echo"$bc[id_pengguna]"; ?></td>
    		<td><?php echo"$bc[pengguna]"; ?></td>
    		<td><?php echo"$bc[sandi]"; ?></td>
				<td><?php
									if ($bc['hak_akses']==1) {
										echo "Admin";
									}elseif ($bc['hak_akses']==2) {
										echo "Dokter";
									}elseif ($bc['hak_akses']==3) {
										echo "Kepala Klinik";
									}
				 ?></td>

    <td>
			<?php
						if ($bc['hak_akses']==2) {
							echo " ";
						}else {

			?>

			<?php
						}
			 ?>
		</td>
  </tr>
  </tbody>
  <?php
	}
  ?>
</table>
</body>
</html>

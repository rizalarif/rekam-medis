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
	<table width="100%">
		<tr>
			<td widht="40%"<a href=''>
				<h1><img src="../img/klinik.png" width="100px" onclick="javascript:window.print()" height="100px" alt=""></a>  Laporan User</h1></a>
			</td>

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

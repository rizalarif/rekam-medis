<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Untitled Document</title>
</head>
<body>
	<table>
		<tr>
			<td widht="30%"><h1>Data User</h1></td>
			<td width="80%" align="right" valign="bottom"><a href="?menu=inputUser"><h4>Tambah User</h4></a></td>
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
    		<th>Pilihan</th>
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
			  <a href="?menu=editUser&id=<?php echo"$bc[id_pengguna]"; ?>">
				<i class="glyphicon glyphicon-pencil"></i></a>&nbsp;&nbsp;&nbsp;&nbsp;
				<a href="del_user.php?id=<?php echo"$bc[id_pengguna]"; ?>">
				<i class="glyphicon glyphicon-remove" style="color:#FF0000"></i></a>
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

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Untitled Document</title>
</head>
<body>
	<table>
		<tr>
			<td widht="60%"><h1>Laporan Pendaftaran Periksa</h1></td>
			<td width="60%" align="right" valign="bottom"><a href="print_pendaftaran.php"><img src="../img/print.png" alt="">Cetak laporan</a></td>

		</tr>
	</table>

<table class="table">
 <thead>
  <tr>
    		<th>No.</th>
				<th>Nomer Pasien</th>
    		<th>Pasien</th>
				<th>Dokter</th>
    		<th>Tanggal Periksa</th>
    		<th>Waktu Daftar</th>
				<th>Status Periksa</th>
  </tr>
 </thead>
<?php
  include '../config/koneksi.php';
	 		$no=0;
	 			$sql=mysqli_query($koneksi, "SELECT * FROM tb_pendaftaran WHERE stts ='2' ORDER BY no_pendaftaran desc ");
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
    		<td><?php echo"$bc2[nama_pasien]<br>$bc2[nik_pasien]"; ?></td>
    		<td><?php echo"$bc3[nama_dokter]"; ?></td>
				<td><?php echo"$bc[tgl_periksa]"; ?></td>
				<td><?php echo"$bc[waktu_pendaftaran]"; ?></td>
    		<td><?php
				if ($bc['stts']=='1') {
					@$status="Dalam Antrian";
				}elseif ($bc['stts']=='2') {
					@$status="Telah Diperiksa";
				}
				 echo @$status; ?></td>

  </tr>
  </tbody>
  <?php
	}
  ?>
</table>
</body>
</html>

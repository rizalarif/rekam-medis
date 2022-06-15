<?php

	mysql_connect("localhost", "root", "");
	mysql_select_db("tk_wahyu");
 
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Untitled Document</title>
</head>

<body>

<table class="table">
 <thead>
  <tr>
    <th>No.</th>
	<th>NIS</th>
    <th>Nama Siswa</th>
	<th>TTL</th>
    <th>Jenis Kelamin</th>
    <th>Alamat Siswa</th>
	<th>Kelas</th>
    <th>Nama Wali</th>
	<th>Telp. Wali</th>
    <th>Pilihan</th>
  </tr>
 </thead>
<?php

		$cari	= $_POST['csiswa'];
     	if(isset($_POST['cari'])){
	 	
		if(empty($cari)){
		echo "<script language='javascript'>alert('Masukan Data'); document.location='index.php'; </script>";
		}else{
	 
	 $no=0;
	 $dtsw=mysql_query("select * from tb_siswa where nama_siswa like '%$cari%'");
	 while($bcsw=mysql_fetch_array($dtsw)){
	 
	 	$dtnil=mysql_query("select * from tb_nilai order by id_nilai ASC");
	 	$bcnil=mysql_fetch_array($dtnil);
	 //while($bcnil=mysql_fetch_array($dtnil)){
	 	
		
		
	 $no++;
  ?>
  <tbody>
  <tr>
    <td><?php echo"$no"; ?></td>
	<td><?php echo"$bcsw[nis_siswa]"; ?></td>
    <td><?php echo"$bcsw[nama_siswa]"; ?></td>
    <td><?php echo"$bcsw[tempat],$bcsw[tanggal]-$bcsw[bulan]-$bcsw[tahun]"; ?></td>
	<td><?php echo"$bcsw[jk]"; ?></td>
	<td><?php echo"$bcsw[alamat_siswa]"; ?></td>
    <td><?php echo"$bcsw[kelas]"; ?></td>
    <td><?php echo"$bcsw[nama_wali]"; ?></td>
	<td><?php echo"$bcsw[telepon_wali]"; ?></td>
    <td><a href="?admin=edit_siswa&&id=<?php echo"$bcsw[id_siswa]"; ?>"><i class="glyphicon glyphicon-pencil"></i></a>&nbsp;&nbsp;&nbsp;&nbsp;<a href="?admin=del_siswa&&id=<?php echo"$bcsw[id_siswa]"; ?>"><i class="glyphicon glyphicon-remove" style="color:#FF0000"></i></a></td>
  </tr>
  </tbody>
  <?php
	}
	}
	}
	  ?>
</table>
</body>
</html>
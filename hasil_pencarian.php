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
    <th width="24">No.</th>
	<th width="65">NIS</th>
    <th width="98">Nama Siswa</th>
	<th width="98">Kelas</th>
    <th width="123">Pilihan</th>
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
	<td><?php echo"$bcsw[kelas]"; ?></td>
    <td><a href="?indek=prev_nilai&&id=<?php echo"$bcsw[id_siswa]"; ?>">Lihat Nilai</a></td>
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
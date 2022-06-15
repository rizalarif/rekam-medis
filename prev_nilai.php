<?php

	mysql_connect("localhost", "root", "");
	mysql_select_db("tk_wahyu");
	
		 	$dtsw=mysql_query("select * from tb_siswa where id_siswa='$_GET[id]'");
		    $bcsw=mysql_fetch_array($dtsw);
 
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Untitled Document</title>
</head>

<body>
<h3><?php echo"$bcsw[nama_siswa]"; ?></h3>
<table class="table">
 <thead>
  <tr>
    <th>No.</th>
	<th>Mapel</th>
	<th>Nilai</th>
	<th>Deskripsi</th>
	<th>Semester</th>
	<th>Tahun Ajaran</th>
  </tr>
 </thead>
<?php
     
	 $no=0;
	 $dtnil=mysql_query("select * from tb_nilai where id_siswa='$bcsw[id_siswa]'");
	 while($bcnil=mysql_fetch_array($dtnil)){
	 
		
		$dtmpl=mysql_query("select * from tb_mapel where id_mapel ='$bcnil[id_mapel]'");
	 	$bcmpl=mysql_fetch_array($dtmpl);
	 //while($bcnil=mysql_fetch_array($dtnil)){
	 	
		
		
	 $no++;
  ?>
  <tbody>
  <tr>
    <td><?php echo"$no"; ?></td>
	<td><?php echo"$bcmpl[nama_mapel]"; ?></td>
    <td><?php echo"$bcnil[nilai]"; ?></td>
	<td><?php echo"$bcnil[deskripsi]"; ?></td>
	<td><?php echo"$bcnil[semester]"; ?></td>
    <td><?php echo"$bcnil[tahun_ajaran]"; ?></td>
  </tr>
  </tbody>
  <?php
	}
  ?>
</table>
</body>
</html>
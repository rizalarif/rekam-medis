<?php
if (isset($_POST['submit'])) {

  $bulan = $_POST['bulan'];
  $tahun = $_POST['tahun'];
  echo "$bulan, $tahun";
}

 ?>
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
 	<table width="100%" border="0">
 		<tr>
 			<td widht="100%"><a href=''>
 					<h1><img src="../img/klinik.png" width="100px" onclick="javascript:window.print()" height="100px" alt=""></a>  Laporan Rekam Medis</h1></a></td>
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
   </tr>
  </thead>
 <?php
   include '../config/koneksi.php';
 	 		$no=0;
 			if (!isset($_POST['cari']) && empty($_POST['pencarian'])) {
 	 			$sql=mysqli_query($koneksi, "SELECT * FROM tb_rekam_medis ORDER BY id desc ");
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



 </tr>
 </tbody>
 <?php
 	}
 }
   ?>
 </table>

 <table>
   <tr>
     <td widht="100%">
       <a href=''>
         <h1><img src="../img/klinik.png" width="100px" onclick="javascript:window.print()" height="100px" alt=""></a>  Laporan Pendaftaran</h1></a></td>

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

 <table width="100%">
   <tr>
     <td widht="100%"><a href=''>
       <h1><img src="../img/klinik.png" width="100px" onclick="javascript:window.print()" height="100px" alt=""></a>  Laporan Pasien</h1></a></td>
   </tr>
 </table>

<table class="table" border="0.5">
<thead>
 <tr>
       <th>No.</th>
       <th>Nomor Pasien</th>
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
       <td><?php echo"No : $bc[id_pasien] <br> NIK : $bc[nik_pasien]"; ?></td>
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

<table width="100%">
  <tr>
    <td widht="40%"><a href=''>
      <h1><img src="../img/klinik.png" width="100px" onclick="javascript:window.print()" height="100px" alt=""></a>  Laporan Dokter</h1></td>
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
<table border="0" width=100%>
  <tr>
    <td>Mengetahui</td>
    <td>&nbsp;</td>
    <td align="right">Pringapus, <?php $tgl = date('d - m - Y'); echo $tgl;?></td>
  </tr>
  <tr>
    <td>Kepala Klinik</td>
    <td>&nbsp;</td>
    <td align="right">Penanggung Jawab</td>
  </tr>
  <tr>
    <td colspan="3">&nbsp;</td>
  </tr>
  <tr>
    <td colspan="3">&nbsp;</td>
  </tr>
  <tr>
    <td colspan="3">&nbsp;</td>
  </tr>
  <tr>
    <td>Ttd.</td>
    <td>&nbsp;</td>
    <td align="right">Ttd.</td>
  </tr>
</table>
 </body>
 </html>

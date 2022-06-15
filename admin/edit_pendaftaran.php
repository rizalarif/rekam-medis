<?php

	mysql_connect("localhost", "root", "");
	mysql_select_db("rekam_medis");
	
	 		
			$dtsw	= mysql_query("SELECT * FROM tb_pendaftaran");
  			$bcsw	= mysql_fetch_array($dtsw);
 
?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title> Selamat Datang di Klinik G&G </title>

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
 <div id="wrapper">
         
            <?php include("Navbar.php");?>
            <?php include("Sidemenu.php");?>

        <!-- Page Content -->
        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Halaman Edit Data Pendaftaran</h1>
                    </div>
                    <!-- /.col-lg-12 -->
                </div>
<form method="post" action="">
<table width="600" border="0" cellspacing="1" cellpadding="1">
<tr valign="middle">
    <td>No pendaftaran</td>
    <td align="center">:</td>
    <td><input name="no_pendaftaran" type="text" class="form-control" id="no_pendaftaran" style="width:50px" size="15" readonly required value="<?php echo"$bcsw[no_pendaftaran]"; ?>"/></td>
  </tr>
  <tr>
    <td width="116" valign="middle">Nama Pasien</td>
    <td width="3" valign="middle">:</td>
    <td width="371" valign="top"><input name="id_pasien" type="text" class="form-control" style="width:100px" size="15" required value="<?php echo"$bcsw[id_pasien]"; ?>"/></td>
  </tr>
  <tr>
    <td valign="middle">Nama Dokter </td>
    <td valign="middle">:</td>
    <td valign="top"><input name="id_dokter" type="text" class="form-control" style="width:250px" id="id_dokter" size="30" required  value="<?php echo"$bcsw[id_dokter]"; ?>"/></td>
  </tr>
  <tr>
    <td width="116" valign="middle">Tanggal Periksa</td>
    <td width="3" valign="middle">:</td>
    <td width="371" valign="top"><input name="tgl_periksa" type="date" class="form-control" id="tgl_periksa" required value="<?php echo"$bcsw[tgl_periksa]"; ?>"/></td>
  </tr>
  <tr>
    <td width="116" valign="middle">Waktu Pendaftaran</td>
    <td width="3" valign="middle">:</td>
    <td width="371" valign="top"><input name="waktu_pendaftaran" type="date" class="form-control" id="waktu_pendaftaran" required value="<?php echo"$bcsw[waktu_pendaftaran]"; ?>"/></td>
  </tr>
   <tr>
    <td valign="middle">Status </td>
    <td valign="middle">:</td>
    <td valign="top"><input name="status" type="text" class="form-control" style="width:250px" id="status" size="30" required  value="<?php echo"$bcsw[status]"; ?>"/></td>
  </tr>
  <tr>
    <td valign="top">&nbsp;</td>
    <td valign="top">&nbsp;</td>
    <td valign="top">&nbsp;</td>
  </tr>
  <tr>

    <td valign="top">&nbsp;</td>
    <td valign="top">&nbsp;</td>
    <td valign="top"><input type="submit" name="kirim" value="E D I T" class="btn btn-primary"/></td>
  </tr>
</table>
</form>
<?php
	
	mysql_connect("localhost", "root", "");
	mysql_select_db("rekam_medis");
	
			$id_pasien		= trim(htmlentities($_POST['id_pasien']));
			$id_dokter			= trim(htmlentities($_POST['id_dokter']));
			$tgl_periksa		= $_POST['tgl_periksa'];
			$waktu_pendaftaran	= trim(htmlentities($_POST['waktu_pendaftaran']));
			$status		= trim(htmlentities($_POST['status']));
	
 if(isset($_POST['kirim'])){
 	$sql1 = "UPDATE tb_pendaftaran SET id_pasien = '$id_pasien', id_dokter = '$id_dokter', tgl_periksa = '$tgl_periksa', waktu_pendaftaran = '$waktu_pendaftaran', status = '$status' WHERE no_pendaftaran = '$bcsw[no_pendaftaran]';";
	$cek1 = mysql_query($sql1);
	 echo'<script language="javascript">
           alert ("Data Berhasil Dirubah"); location = "?admin=prev_pendaftaran"
           </script>';
	 
 }
?>
</body>
</html>

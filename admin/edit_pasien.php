<?php

	mysql_connect("localhost", "root", "");
	mysql_select_db("rekam_medis");
	
	 		
			$dtsw	= mysql_query("SELECT * FROM tb_pasien");
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
                        <h1 class="page-header">Halaman Edit Data Pasien</h1>
                    </div>
                    <!-- /.col-lg-12 -->
                </div>
<form method="post" action="">
<table width="600" border="0" cellspacing="1" cellpadding="1">
 <tr valign="middle">
    <td>Id Pasien </td>
    <td align="center">:</td>
    <td><input name="id_pasien" type="text" class="form-control" id="id_pasien" style="width:50px" size="15" readonly required value="<?php echo"$bcsw[id_pasien]"; ?>"/></td>
  </tr>
  <tr>
    <td width="116" valign="middle">Nama Pasien</td>
    <td width="3" valign="middle">:</td>
    <td width="371" valign="top"><input name="nama_pasien" type="text" class="form-control" style="width:100px" size="15" required value="<?php echo"$bcsw[nama_pasien]"; ?>"/></td>
  </tr>
  <tr>
    <td valign="middle">Umur </td>
    <td valign="middle">:</td>
    <td valign="top"><input name="umur" type="text" class="form-control" style="width:250px" id="umur" size="30" required  value="<?php echo"$bcsw[umur]"; ?>"/></td>
  </tr>
  <tr>
    <td valign="middle">Jenis Kelamin </td>
    <td valign="middle">:</td>
    <td valign="top"><select name="jk" required class="form-control" style="width:150px">
	<option value="Laki-laki" <?php
       if($bcsw['jk']=='Laki-laki'){
		     echo"selected";
            }
	?>>Laki-laki</option>
	<option value="Perempuan" <?php
       if($bcsw['jk']=='Perempuan'){
		     echo"selected";
            }
	?>>Perempuan</option>
	</select></td>
  </tr>
  <tr>
    <td width="116" valign="middle">Tanggal Lahir</td>
    <td width="3" valign="middle">:</td>
    <td width="371" valign="top"><input name="tgl_lahir" type="date" class="form-control" id="tgl_lahir" required value="<?php echo"$bcsw[tgl_lahir]"; ?>"/></td>
  </tr>
<tr>
    <td valign="top">Alamat Pasien </td>
    <td valign="top">:</td>
    <td valign="top"><textarea name="alamat_pasien" cols="60" rows="3" required class="form-control"><?php echo"$bcsw[alamat_pasien]"; ?></textarea></td>
  </tr>
   <tr>
    <td width="116" valign="middle">Tanggal Daftar</td>
    <td width="3" valign="middle">:</td>
    <td width="371" valign="top"><input name="tgl_daftar" type="date" class="form-control" required value="<?php echo"$bcsw[tgl_daftar]"; ?>"/></td>
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
	
 	$nama_pasien		= trim(htmlentities($_POST['nama_pasien']));
    $umur	= trim(htmlentities($_POST['umur']));
	$jk			= trim(htmlentities($_POST['jk']));
	$tgl_lahir	= trim(htmlentities($_POST['tgl_lahir']));
	$alamat_pasien	= trim(htmlentities($_POST['alamat_pasien']));
	$tgl_daftar		= trim(htmlentities($_POST['tgl_daftar']));
	
 if(isset($_POST['kirim'])){
 	$sql1 = "UPDATE tb_pasien SET nama_pasien = '$nama_pasien', umur = '$umur', jk = '$jk', tgl_lahir = '$tgl_lahir', alamat_pasien = '$alamat_pasien', tgl_daftar = '$tgl_daftar' WHERE id_pasien = '$bcsw[id_pasien]';";
	$cek1 = mysql_query($sql1);
	 echo'<script language="javascript">
           alert ("Data Berhasil Dirubah"); location = "?admin=prev_pasien"
           </script>';
	 
 }
?>
</body>
</html>

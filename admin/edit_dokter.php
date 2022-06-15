<?php

	mysql_connect("localhost", "root", "");
	mysql_select_db("rekam_medis");
 
 
 		$dtgr	= mysql_query("SELECT * FROM tb_dokter");
  		$bcgr	= mysql_fetch_array($dtgr);
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
                        <h1 class="page-header">Halaman Input Data Pasien</h1>
                    </div>
                    <!-- /.col-lg-12 -->
                </div>
<form method="post" action="">
<table width="500" border="0" cellspacing="2" cellpadding="2">
  <tr>
    <td colspan="3" valign="top"><h3>:: Edit Data Dokter ::</h3> <hr /></td>
  </tr>
  <tr valign="middle">
    <td>Id Dokter </td>
    <td align="center">:</td>
    <td><input name="id_dokter" type="text" class="form-control" id="id_dokter" style="width:50px" size="15" readonly required value="<?php echo"$bcgr[id_dokter]"; ?>"/></td>
  </tr>
  <tr valign="middle">
    <td width="21%">Nama Dokter</td>
    <td width="2%" align="center">:</td>
    <td width="77%"><input name="nama_dokter" type="text" class="form-control" style="width:150px" id="nama_dokter" size="15" required value="<?php echo"$bcgr[nama_dokter]"; ?>"/></td>
  </tr>
  <tr valign="middle">
    <td>Jenis Kelamin </td>
    <td align="center">:</td>
    <td><select name="jk_dokter" class="form-control" style="width:180px" required>
    <option value="Laki-laki" <?php
       if($bcgr['jk_dokter']=='Laki-laki'){
		     echo"selected";
            }
	?>>Laki-laki</option>
	<option value="Perempuan" <?php
       if($bcgr['jk_dokter']=='Perempuan'){
		     echo"selected";
            }
	?>>Perempuan</option>
	</select></td>
  </tr>
  <tr>
    <td valign="top">Alamat</td>
    <td align="center" valign="top">:</td>
    <td valign="top"><textarea name="alamat_dokter" id="alamat_dokter" cols="50" rows="5"class="form-control" style="width:380px" required><?php echo"$bcgr[alamat_dokter]"; ?></textarea></td>
  </tr>
  <tr valign="middle">
    <td>Umur</td>
    <td align="center">:</td>
    <td><input name="umur" type="text" id="umur" class="form-control" style="width:150px" required value="<?php echo"$bcgr[umur]"; ?>"/></td>
  </tr>
  <tr valign="middle">
    <td>Username</td>
    <td align="center">:</td>
    <td><input name="user" type="text" id="user" class="form-control" style="width:200px" required value="<?php echo"$bcgr[user]"; ?>"/></td>
  </tr>
  <tr valign="middle">
    <td>Password</td>
    <td align="center">:</td>
    <td><input name="pass" type="text" id="pass" class="form-control" style="width:200px" required value="<?php echo"$bcgr[pass]"; ?>"/></td>
  </tr>
  <tr valign="middle">
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr valign="middle">
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td><input type="submit" name="kirim" value="E D I T" class="btn btn-primary"/>&nbsp;</td>
  </tr>
</table>
</form>
<?php
	
	mysql_connect("localhost", "root", "");
	mysql_select_db("rekam_medis");
	
			$nama_dokter		= trim(htmlentities($_POST['nama_dokter']));
			$jk_dokter			= trim(htmlentities($_POST['jk_dokter']));
			$alamat_dokter		= $_POST['alamat_dokter'];
			$umur	= trim(htmlentities($_POST['umur']));
			$user		= trim(htmlentities($_POST['user']));
			$pass		= trim(htmlentities($_POST['pass']));


 if(isset($_POST['kirim'])){

	$sql1 = "UPDATE tb_dokter SET nama_dokter = '$nama_dokter', jk_dokter = '$jk_dokter', alamat_dokter = '$alamat_dokter', umur = '$umur', user = '$user', pass = '$pass' WHERE id_dokter = '$bcgr[id_dokter]'";
	$cek1 = mysql_query($sql1);
	 echo'<script language="javascript">
           alert ("Data Berhasil Dirubah"); location = "?admin=prev_dokter"
           </script>';

	 
 }	
	
?>
</body>
</html>

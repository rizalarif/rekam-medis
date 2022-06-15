<?php

	mysql_connect("localhost", "root", "");
	mysql_select_db("rekam_medis");
	
	 		
			$dtsw	= mysql_query("SELECT * FROM tb_rekam_medis");
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
                        <h1 class="page-header">Halaman Edit Data Rekam Medis</h1>
                    </div>
                    <!-- /.col-lg-12 -->
                </div>
<form method="post" action="">
<table width="600" border="0" cellspacing="1" cellpadding="1">
<tr valign="middle">
    <td>Id</td>
    <td align="center">:</td>
    <td><input name="id" type="text" class="form-control" id="id" style="width:50px" size="15" readonly required value="<?php echo"$bcsw[id]"; ?>"/></td>
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
    <td valign="middle">Umur </td>
    <td valign="middle">:</td>
    <td valign="top"><input name="umur" type="text" class="form-control" style="width:250px" id="umur" size="30" required  value="<?php echo"$bcsw[umur]"; ?>"/></td>
  </tr>
  <tr>
    <td valign="middle">Terapi</td>
    <td valign="middle">:</td>
    <td valign="top"><input name="terapi" type="text" class="form-control" style="width:250px" id="terapi" size="30" required  value="<?php echo"$bcsw[terapi]"; ?>"/></td>
  </tr>
  <tr>
    <td valign="top">Diagnosa</td>
    <td valign="top">:</td>
    <td valign="top"><textarea name="diagnosa" cols="60" rows="3" required class="form-control"><?php echo"$bcsw[diagnosa]"; ?></textarea></td>
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

	
	$id_pasien	= trim($_POST['prdId']);
	$id_dokter		= trim($_POST['prdId']);
	$tgl_periksa	= trim($_POST['tgl_periksa']);
	$umur		= trim($_POST['umur']);
	$terapi			= trim($_POST['terapi']);
	$diagnosa		= trim($_POST['diagnosa']);

	
	if(isset($_POST['kirim'])){
		$sql="UPDATE tb_nilai SET  id_pasien =  '$id_pasien', id_dokter = '$id_dokter', tgl_periksa = '$tgl_periksa', umur = '$umur',terapi = '$terapi', diagnosa = '$diagnosa' WHERE  id_pasien = '$bcsw[id_pasien]'";
		mysql_query($sql);
		echo'<script language="javascript">
           alert ("Data Berhasil Dirubah"); location = "?admin=prev_rekam_medis&&id='."$bcsw[id_pasien]".'"
           </script>';
	}
?>
</body>
</html>
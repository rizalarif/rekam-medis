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
                        <h1 class="page-header">Halaman Input Rekam Medis</h1>
                    </div>
                    <!-- /.col-lg-12 -->
                </div>
                <!-- /.row -->
				  <div class="panel-body">
				<div class="row"> 
				<div class="col-lg-6">
                                    <form role="form" enctype="multipart/form-data" method="POST" action="">
									<div class="form-group">
                                            <label>Nama Pasien</label>
                                           <?php      
				mysql_connect("localhost", "root", "");
				 mysql_select_db("rekam_medis");				
				 $result = mysql_query("select * from tb_pasien"); 	 
				$jsArray = "var prdName = new Array();\n"; 
				 
			echo '<select name="prdId" onchange="document.getElementById(\'prd_name\').value = prdName[this.value]" class="form-control" style="width:150px" required>';  
			echo '<option value="">Pilih Nama Pasien</option>';  
				while ($row = mysql_fetch_array($result)) {  
    				echo '<option value="' . $row['id_pasien'] . '">' . $row['nama_pasien'] . '</option>';  
    				$jsArray .= "prdName['" . $row['id_pasien'] . "'] = '" . addslashes($row['nama_pasien']) . "';\n";  
														  }  
					echo '</select>';  
						?>
                                        </div>
										 <div class="form-group">
                                            <label>Nama Dokter</label>
                                           <?php  
				 mysql_connect("localhost", "root", "");
 				mysql_select_db("rekam_medis");      
				$result = mysql_query("select * from tb_dokter"); 	 
				$jsArray = "var prdName = new Array();\n"; 
				 
			echo '<select name="prdId1" onchange="document.getElementById(\'prd_name\').value = prdName[this.value]" class="form-control" style="width:150px" required>';  
			echo '<option value="">Pilih Dokter</option>';  
				while ($row = mysql_fetch_array($result)) {  
    				echo '<option value="' . $row['id_dokter'] . '">' . $row['nama_dokter'] . '</option>';  
    				$jsArray .= "prdName['" . $row['id_dokter'] . "'] = '" . addslashes($row['nama_dokter']) . "';\n";  
														  }  
					echo '</select>';
						?>
                                        </div>
										<div class="form-group">
                                            <label>Tanggal Periksa </label>
                                            <input class="form-control" type="date" name="tgl_periksa" required>
                                            <p class="help-block">Masukkan Tanggal Periksa</p>
                                        </div>
										
                                         <button type="submit" class="btn btn-outline btn-info" name ="kirim" >Simpan <i class="fa fa-save fa-fw"></i></button>
                                   
                               </div>

                              
                                <!-- /.col-lg-6 (nested) -->
                                <div class="col-lg-6">
								 <div class="form-group">
                                            <label>Umur</label>
                                            <input class="form-control" placeholder="Enter text" name="umur" id="umur" required>
                                        </div>
								 <div class="form-group">
                                            <label>Terapi</label>
                                            <input class="form-control" placeholder="Enter text" name="terapi" id="terapi" required>
                                        </div>
                                     <div class="form-group">
                                            <label>Diagnosa</label>
                                            <textarea class="form-control" placeholder="Enter text" name="diagnosa" required></textarea>
                                        </div>
                                    </form>

                                </div>
                                <!-- /.col-lg-6 (nested) -->
                            </div>
                            <!-- /.row (nested) -->
                        </div>
                        <!-- /.panel-body -->
            </div>
            <!-- /.container-fluid -->
        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->

    <!-- jQuery -->
    <script src="../vendor/jquery/jquery.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="../vendor/bootstrap/js/bootstrap.min.js"></script>

    <!-- Metis Menu Plugin JavaScript -->
    <script src="../vendor/metisMenu/metisMenu.min.js"></script>

    <!-- Custom Theme JavaScript -->
    <script src="../dist/js/sb-admin-2.js"></script>
<?php
	
	mysql_connect("localhost", "root", "");
	mysql_select_db("rekam_medis");
	
	@$id_pasien	= trim($_POST['prdId']);
	@$id_dokter		= trim($_POST['prdId1']);
	@$tgl_periksa	= trim($_POST['tgl_periksa']);
	@$umur		= trim($_POST['umur']);
	@$terapi			= trim($_POST['terapi']);
	@$diagnosa		= trim($_POST['diagnosa']);


 if(isset($_POST['kirim'])){
 	$sql = "select * from tb_rekam_medis where id_pasien='$id_pasien' ";
	$cek = mysql_num_rows(mysql_query($sql));
	
 if ($cek > 0) {
     echo '<script language="javascript">
           alert ("Nama Sudah Ada");
           </script>';
              
 }else{
	$sql1 = "INSERT INTO tb_rekam_medis VALUES ('', '$id_pasien', '$id_dokter', '$tgl_periksa', '$umur', '$terapi', '$diagnosa')";
	$cek1 = mysql_query($sql1);
	 echo'<script language="javascript">
           alert ("Data Berhasil Disimpan");
           </script>';
 }
	 
 }	
	
?>
</body>
</html>
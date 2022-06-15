<?php
 include '../config/koneksi.php';
  $sql1 = mysqli_query($koneksi, "SELECT * FROM tb_pasien WHERE id_pasien='$_GET[id]'");
  $bc1  = mysqli_fetch_array($sql1);
 ?>
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Halaman Edit Data Pasien</h1>
                    </div>
                    <!-- /.col-lg-12 -->
                </div>
                <!-- /.row -->
				  <div class="panel-body">
				<div class="row">
				<div class="col-lg-6">
                                    <form role="form" enctype="multipart/form-data" method="POST" action="<?php $_SERVER['PHP_SELF']; ?>">
                  <div class="form-group">
                           <label>NIK Pasien</label>
                    <input class="form-control" value="<?php echo $bc1['nik_pasien']; ?>" placeholder="Enter text" name="nik_pasien" required>
                  </div>
                   <div class="form-group">
                                            <label>Nama Pasien</label>
                                           <input class="form-control" value="<?php echo $bc1['nama_pasien']; ?>" placeholder="Enter text" name="nama_pasien" required>
                                        </div>
									 <div class="form-group">
                                            <label>Umur</label>
                                            <input class="form-control" value="<?php echo $bc1['umur']; ?>" placeholder="Enter text" name="umur" required>
                                        </div>
										 <div class="form-group">
                                            <label>Jenis Kelamin</label>
                                           <select name="jk" class="form-control" required>
	  										<option value="<?php echo $bc1['jk']; ?>"><?php echo $bc1['jk']; ?></option>
     										 <option value="Laki-laki">Laki-laki</option>
     										 <option value="Perempuan">Perempuan</option>
										</select>
                                        </div>
										<div class="form-group">
                                            <label>Tanggal Lahir </label>
                                            <input class="form-control" type="date" value="<?php echo $bc1['tgl_lahir']; ?>" name="tgl_lahir" required>
                                            <p class="help-block">Masukkan Tanggal Lahir</p>
                                        </div>
                                    <div class="form-group">
                                                               <label>Alamat</label>
                                                               <textarea class="form-control" placeholder="Enter text" name="alamat_pasien" required><?php echo $bc1['alamat_pasien']; ?></textarea>
                                                           </div>

                                         <button type="submit" class="btn btn-outline btn-info" name ="kirim" >Simpan <i class="fa fa-save fa-fw"></i></button>


                              </div>
                                <!-- /.col-lg-6 (nested) -->
                                <div class="col-lg-6">


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

include '../config/koneksi.php';

      @$nik_pasien     = $_POST['nik_pasien'];
    	@$nama_pasien     = $_POST['nama_pasien'];
      @$umur            = $_POST['umur'];
    	@$jk              = $_POST['jk'];
    	@$tgl_lahir       = $_POST['tgl_lahir'];
    	@$alamat_pasien		= $_POST['alamat_pasien'];
    	@$tgl_daftar      = date("Y-m-d");

 if(isset($_POST['kirim'])){

	$sql1 =mysqli_query($koneksi, "UPDATE tb_pasien SET nik_pasien='$nik_pasien', nama_pasien='$nama_pasien', umur='$umur',  jk='$jk', tgl_lahir='$tgl_lahir', alamat_pasien='$alamat_pasien' WHERE id_pasien='$_GET[id]'");
	echo '<script language="javascript">
           alert ("Data Berhasil Rubah");
           </script>';


?>
     <script type="text/javascript">
          window.location ="?menu=pasien" ;
     </script>
<?php
     header('location:?menu=pasien');
 }
?>
</body>
</html>

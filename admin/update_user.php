<?php
include '../config/koneksi.php';
    $sql  = mysql_query("SELECT * FROM tb_user WHERE id_pengguna='$_GET[id]'");
    $bc   = mysql_fetch_array($sql);

 ?>
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Halaman Input Data User</h1>
                    </div>
                    <!-- /.col-lg-12 -->
                </div>
                <!-- /.row -->
				  <div class="panel-body">
				<div class="row">
				<div class="col-lg-6">
                                    <form role="form" enctype="multipart/form-data" method="POST" action="<?php $_SERVER['PHP_SELF']; ?>">
									 <div class="form-group">
                                            <label>Username</label>
                                           <input class="form-control" value="<?php echo $bc['pengguna']; ?>" placeholder="Enter text" name="pengguna" required>
                                        </div>
									 <div class="form-group">
                                            <label>Password</label>
                                            <input class="form-control" value="<?php echo $bc['sandi']; ?>" placeholder="Enter text" name="sandi" required>
                                        </div>
										 <div class="form-group">
                                            <label>Hak Akses</label>
                        <select name="hak_akses" class="form-control" required>
                          <?php
                          if ($bc['hak_akses']==1) {
        										$level = "Admin";
        									}elseif ($bc['hak_akses']==2) {
        										$level = "Dokter";
        									}elseif ($bc['hak_akses']==3) {
        										$level = "Kepala Klinik";
        									}
                            echo "<option value=$bc[hak_akses]>$level</option>";
                           ?>

     										 <option value="1">Admin</option>
                         <option value="2">Kepala Klinik</option>
										</select>
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

    	@$pengguna     = $_POST['pengguna'];
      @$sandi        = $_POST['sandi'];
    	@$hak_akses    = $_POST['hak_akses'];

 if(isset($_POST['kirim'])){

	$sql1 = "UPDATE tb_user SET pengguna='$pengguna', sandi='$sandi', hak_akses='$hak_akses' WHERE id_pengguna='$_GET[id]'";
	mysql_query($sql1);
	echo '<script language="javascript">
           alert ("Data Berhasil Diubah");
           </script>';


?>
     <script type="text/javascript">
          window.location ="?menu=user" ;
     </script>
<?php
     header('location:?menu=user');
 }
?>
</body>
</html>

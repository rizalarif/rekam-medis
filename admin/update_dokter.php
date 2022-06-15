<?php
    include '../config/koneksi.php';
    $sql4 = mysqli_query($koneksi, "SELECT * FROM tb_dokter WHERE id_dokter='$_GET[id]'");
    $bc4  = mysqli_fetch_array($sql4);

    $sql5 = mysqli_query($koneksi, "SELECT * FROM tb_user WHERE id_dokter='$_GET[id]'");
    $bc5  = mysqli_fetch_array($sql5);
?>
<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">Halaman Edit Data Dokter</h1>
    </div>
    <!-- /.col-lg-12 -->
</div>
<!-- /.row -->
<div class="panel-body">
<div class="row">
<div class="col-lg-6">
                    <form role="form" enctype="multipart/form-data" method="POST" action="<?php $_SERVER['PHP_SELF']; ?>">
             <div class="form-group">
                          <label>Nama Dokter</label>
                   <input class="form-control" value="<?php echo $bc4['nama_dokter']; ?>" placeholder="Enter text" name="nama_dokter" required>
             </div>

             <div class="form-group">
                                <label>Jenis Kelamin</label>
                    <select name="jk_dokter" class="form-control" required>
                         <option value="<?php echo $bc4['jk_dokter']; ?>"><?php echo $bc4['jk_dokter']; ?></option>
                         <option value="Laki-laki">Laki-laki</option>
                         <option value="Perempuan">Perempuan</option>
                    </select>
              </div>
              <div class="form-group">
                           <label>Umur</label>
                   <input class="form-control" value="<?php echo $bc4['umur']; ?>" placeholder="Enter text" name="umur" required>
              </div>
              <div class="form-group">
                        <label>Alamat</label>
                   <textarea class="form-control" placeholder="Enter text" name="alamat_dokter" required>
                     <?php echo $bc4['alamat_dokter']; ?>
                   </textarea>
               </div>

                         <button type="submit" class="btn btn-outline btn-info" name ="kirim" >Simpan <i class="fa fa-save fa-fw"></i></button>


              </div>

                <!-- /.col-lg-6 (nested) -->
                <div class="col-lg-6">
                  <div class="form-group">
                               <label>Username</label>
                        <input class="form-control" value="<?php echo $bc5['pengguna']; ?>" placeholder="Enter text" name="pengguna" required>
                  </div>
                  <div class="form-group">
                               <label>Password</label>
                        <input class="form-control" value="<?php echo $bc5['sandi']; ?>" placeholder="Enter text" name="sandi" required>
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

include '../config/koneksi.php';

@$nama_dokter     = $_POST['nama_dokter'];
@$umur            = $_POST['umur'];
@$jk_dokter       = $_POST['jk_dokter'];
@$alamat_dokter		= $_POST['alamat_dokter'];
@$pengguna        = $_POST['pengguna'];
@$sandi           = $_POST['sandi'];

if(isset($_POST['kirim'])){


      $sql1 =mysqli_query($koneksi, "UPDATE tb_dokter SET nama_dokter='$nama_dokter', jk_dokter='$jk_dokter',
               alamat_dokter='$alamat_dokter', umur='$umur' WHERE id_dokter='$_GET[id]'");

                $sql2 =mysqli_query($koneksi, "UPDATE tb_user SET pengguna='$pengguna',  sandi='$sandi' WHERE id_dokter='$_GET[id]'");

echo '<script language="javascript">
alert ("Data Berhasil Diubah");
</script>';


?>
<script type="text/javascript">
window.location ="?menu=dokter" ;
</script>
<?php
header('location:?menu=dokter');
}
?>
</body>
</html>

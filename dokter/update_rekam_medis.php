<?php
    include '../config/koneksi.php';
    $sql5 = mysqli_query($koneksi, "SELECT * FROM tb_rekam_medis WHERE id='$_GET[id]'");
    $bc5  = mysqli_fetch_array($sql5);
?>
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
                    <form role="form" enctype="multipart/form-data" method="POST" action="<?php $_SERVER['PHP_SELF']; ?>">
             <div class="form-group">
                                <label>Pasien</label>


                      <?php
                              include '../config/koneksi.php';
                              $sql1 = mysqli_query($koneksi, "SELECT * FROM tb_pasien WHERE id_pasien='$bc5[id_pasien]'");
                              $bc1=mysqli_fetch_array($sql1);

                                echo "<br>$bc1[id_pasien] - $bc1[nama_pasien]";

                        ?>

              </div>
              <div class="form-group">
                                 <label>Dokter</label>


                       <?php
                               include '../config/koneksi.php';
                               $sql2 = mysqli_query($koneksi, "SELECT * FROM tb_dokter WHERE id_dokter='$bc5[id_dokter]'");
                               $bc2=mysqli_fetch_array($sql2);

                                 echo "<br>$bc2[id_dokter] - $bc2[nama_dokter]";

                         ?>

               </div>
               <div class="form-group">
                              <label>Umur</label>
                        <input class="form-control" value="<?php echo $bc5['umur']; ?>" placeholder="Enter text" name="umur" required>
               </div>
               <div class="form-group">
                              <label>Diagnosa</label>
                      <textarea class="form-control" placeholder="Enter text" name="diagnosa" required>
                        <?php echo $bc5['diagnosa']; ?>
                      </textarea>
              </div>
              <div class="form-group">
                             <label>Terapi</label>
                     <textarea class="form-control" placeholder="Enter text" name="terapi" required>
                       <?php echo $bc5['terapi']; ?>
                     </textarea>
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


@$diagnosa                = $_POST['diagnosa'];
@$terapi                  = $_POST['terapi'];
@$umur                    = $_POST['umur'];



if(isset($_POST['kirim'])){
            $sql3 = mysqli_query($koneksi, "SELECT max(id_dokter) as id_dokter FROM tb_dokter");
            $bc3  = mysqli_fetch_array($sql3);
            @$id_dokter = $bc3['id_dokter'] + 1;
            echo "$id_dokter";

      $sql6 =mysqli_query($koneksi, "UPDATE tb_rekam_medis SET umur='$umur', terapi='$terapi', diagnosa='$diagnosa' WHERE id='$_GET[id]'");

      echo '<script language="javascript">
      alert ("Data Berhasil Disimpan");
      </script>';


?>
<script type="text/javascript">
window.location ="?menu=rekam_medis" ;
</script>
<?php
header('location:?menu=rekam_medis');
}
?>
</body>
</html>

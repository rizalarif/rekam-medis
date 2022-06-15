<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">Halaman Input Pendaftaran Periksa</h1>
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
                    <select name="pasien" class="form-control" required>
                      <option value="">Pilih Pasien Terdaftar</option>

                      <?php
                              include '../config/koneksi.php';
                              $sql1 = mysql_query("SELECT * FROM tb_pasien WHERE stts='1'");
                              while($bc1=mysql_fetch_array($sql1))
                              {
                                echo "<option value=$bc1[id_pasien]>$bc1[id_pasien] - $bc1[nama_pasien]</option>";
                              }
                        ?>

                    </select>
              </div>
              <div class="form-group">
                                 <label>Dokter</label>
                     <select name="dokter" class="form-control" required>
                       <option value="">Pilih Dokter Terdaftar</option>

                       <?php
                               include '../config/koneksi.php';
                               $sql2 = mysql_query("SELECT * FROM tb_dokter WHERE stts='1'");
                               while($bc2=mysql_fetch_array($sql2))
                               {
                                 echo "<option value=$bc2[id_dokter]>$bc2[id_dokter] - $bc2[nama_dokter]</option>";
                               }
                         ?>

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

@$pasien                  = $_POST['pasien'];
@$dokter                  = $_POST['dokter'];
@$tgl_periksa             = $_POST[''];
@$waktu_pendaftaran       = date("H:i:s d-m-Y");


if(isset($_POST['kirim'])){
            $sql3 = mysql_query("SELECT max(id_dokter) as id_dokter FROM tb_dokter");
            $bc3  = mysql_fetch_array($sql3);
            @$id_dokter = $bc3['id_dokter'] + 1;
            echo "$id_dokter";

      $sql1 = "INSERT INTO tb_pendaftaran VALUES ('', '$pasien', '$dokter',  '$tgl_periksa', '$waktu_pendaftaran','1')";
      mysql_query($sql1);


      echo '<script language="javascript">
      alert ("Data Berhasil Disimpan");
      </script>';


?>
<script type="text/javascript">
window.location ="?menu=pendaftaran" ;
</script>
<?php
header('location:?menu=pendaftaran');
}
?>
</body>
</html>


<?php

	mysql_connect("localhost", "root", "");
	mysql_select_db("rekam_medis");
	?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Selamat Datang di Klinik G&G </title>

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
                        <h1 class="page-header">Report</h1>
                         <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Data pasien
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <table width="100%" class="table table-striped table-bordered table-hover" id="example1">
                                <thead>
                                    <tr>
                                        <th>Nama Pasien</th>
                                        <th>Umur Pasien</th>
                                        <th>Alamat</th>
                                        <th>Jenis Kelamin</th>
										 									  <th>Tanggal Daftar</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                <?php
                                  $ambil = mysql_query("SELECT * FROM tb_pasien ORDER by id_pasien ASC") or die(mysql_error());
                                     while ($data = mysql_fetch_array($ambil))
                                    {
                                    ?>
                                    <tr class="odd gradeX">
                                        <td><?php echo $data['nama_pasien'] ?></td>
                                        <td><?php echo $data['umur'] ?></td>
										<td><?php echo $data['alamat_pasien'] ?></td>
                                        <td ><?php echo $data['jk'] ?></td>
										<td ><?php echo $data['tgl_lahir'] ?></td>
										 <td ><?php echo $data['tgl_daftar'] ?></td>
                                        <td >
                                        <input type="button" class="btn btn-outline btn-success" value="Edit" onClick='top.location="edit_pasien.php? <?php echo"id_pasien=$data[id_pasien]";?>"'>
                                          <?php echo "<a class='btn btn-outline btn-danger' data-toggle='modal' data-target='#konfirmasi_hapus' data-href='del_pasien.php?id_pasien=".$data['id_pasien']."'>Hapus</a>"; ?>

                                      </td>
                                    </tr>
                                     <?php

                                     }
                                        ?>

                                </tbody>

                            </table>

                     </div>

                    </div>

                     <div class="panel panel-default">
                        <div class="panel-heading">
                            Data Dokter
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <table width="100%" class="table table-striped table-bordered table-hover" id="example3">
                                <thead>
                                    <tr>
                                        <th>Nama Dokter</th>
                                        <th>Umur Dokter</th>
                                        <th>Alamat</th>
                                        <th>Jenis Kelamin</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                <?php
                                  $ambil = mysql_query("SELECT * FROM tb_dokter ORDER by id_dokter ASC") or die(mysql_error());
                                     while ($data = mysql_fetch_array($ambil))
                                    {
                                    ?>
                                    <tr class="odd gradeX">
                                        <td><?php echo $data['nama_dokter'] ?></td>
                                        <td><?php echo $data['umur'] ?></td>
                                        <td><?php echo $data['alamat_dokter'] ?></td>
                                        <td ><?php echo $data['jk_dokter'] ?></td>
                                        <td class="center">
                                       <input type="button" class="btn btn-outline btn-success" value="Edit" onClick='top.location="edit_dokter.php? <?php echo"id_dokter=$data[id_dokter]";?>"'>
                                      <?php echo "<a class='btn btn-outline btn-danger' data-toggle='modal' data-target='#konfirmasi_hapus' data-href='del_dokter.php?id_dokter=".$data['id_dokter']."'>Hapus</a>"; ?>
                                      </td>
                                    </tr>
                                     <?php

                                     }
                                        ?>

                                </tbody>

                            </table>

                    </div>

                    </div>
					 <div class="panel panel-default">
                        <div class="panel-heading">
                            Data Pendaftar
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <table width="100%" class="table table-striped table-bordered table-hover" id="example3">
                                <thead>
                                    <tr>
                                        <th>Nama Pasien</th>
                                        <th>Nama Dokter</th>
                                        <th>Tanggal Periksa</th>
                                        <th>Waktu Pendaftaran</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                <?php
                                  $jupuk = mysql_query("SELECT * FROM tb_pendaftaran ORDER by no_pendaftaran ASC") or die(mysql_error());
                                     while ($data = mysql_fetch_array($jupuk)) {
									 	$dtpas1=mysql_query("select * from tb_pasien where id_pasien ='$data[id_pasien]'");
	 									$bcpas1=mysql_fetch_array($dtpas1);

									 	$dtdk1=mysql_query("select * from tb_dokter where id_dokter ='$data[id_dokter]'");
	 									$bcdk1=mysql_fetch_array($dtdk1);
                                    ?>
                                    <tr class="odd gradeX">
                                        <td><?php echo $data['id_pasien'] ?></td>
                                        <td><?php echo $data['id_dokter'] ?></td>
                                        <td><?php echo $data['tgl_periksa'] ?></td>
                                        <td ><?php echo $data['waktu_pendaftaran'] ?></td>
                                        <td class="center">
                                       <input type="button" class="btn btn-outline btn-success" value="Edit" onClick='top.location="edit_pendaftaran.php? <?php echo"no_pendaftaran=$data[no_pendaftaran]";?>"'>
                                      <?php echo "<a class='btn btn-outline btn-danger' data-toggle='modal' data-target='#konfirmasi_hapus' data-href='del_pendaftaran.php?no_pendaftaran=".$data['no_pendaftaran']."'>Hapus</a>"; ?>
                                      </td>
                                    </tr>
                                     <?php

                                     }
                                        ?>

                                </tbody>

                            </table>

                    </div>

                    </div>
					 <div class="panel panel-default">
                        <div class="panel-heading">
                            Data Rekam Medis
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <table width="100%" class="table table-striped table-bordered table-hover" id="example3">
                                <thead>
                                    <tr>
									    <th>Nama Pasien</th>
                                        <th>Nama Dokter</th>
                                        <th>Tanggal Periksa</th>
                                        <th>Terapi</th>
										<th>Diagnosa</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                <?php
                                  $ambil1 = mysql_query("SELECT * FROM tb_rekam_medis ORDER by id ASC") or die(mysql_error());
                                     while ($data = mysql_fetch_array($ambil1)) {
									 	$dtpas2=mysql_query("select * from tb_pasien where id_pasien ='$data[id_pasien]'");
	 									$bcpas2=mysql_fetch_array($dtpas2);

									 	$dtdk2=mysql_query("select * from tb_dokter where id_dokter ='$data[id_dokter]'");
	 									$bcdk2=mysql_fetch_array($dtdk2);
                                    ?>
                                    <tr class="odd gradeX">
										<td><?php echo $data['id_pasien'] ?></td>
                                        <td><?php echo $data['id_dokter'] ?></td>
                                        <td><?php echo $data['tgl_periksa'] ?></td>
                                        <td><?php echo $data['terapi'] ?></td>
                                        <td ><?php echo $data['diagnosa'] ?></td>
                                        <td class="center">
                                       <input type="button" class="btn btn-outline btn-success" value="Edit" onClick='top.location="edit_rekam_medis.php? <?php echo"id=$data[id]";?>"'>
                                      <?php echo "<a class='btn btn-outline btn-danger' data-toggle='modal' data-target='#konfirmasi_hapus' data-href='del_rekam_medis.php?id=".$data['id']."'>Hapus</a>"; ?>
                                      </td>
                                    </tr>
                                     <?php

                                     }
                                        ?>

                                </tbody>

                            </table>

                    </div>

                    </div>

                    <!-- /.col-lg-12 -->
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->

          <div class="modal fade" id="konfirmasi_hapus" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-body">
                    <b>Anda yakin ingin menghapus data ini ?</b><br><br>
                    <a class="btn btn-outline btn-danger btn-ok"> Hapus</a>
                    <button type="button" class="btn btn-outline btn-primary" data-dismiss="modal"><i class="fa fa-close"></i> Batal</button>
                </div>
            </div>
        </div>
    </div>


    <!-- jQuery -->
    <script src="../vendor/jquery/jquery.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="../vendor/bootstrap/js/bootstrap.min.js"></script>

    <!-- Metis Menu Plugin JavaScript -->
    <script src="../vendor/metisMenu/metisMenu.min.js"></script>

    <!-- Custom Theme JavaScript -->
    <script src="../dist/js/sb-admin-2.js"></script>
      <!-- DataTables JavaScript -->
    <script src="../vendor/datatables/js/jquery.dataTables.min.js"></script>
    <script src="../vendor/datatables-plugins/dataTables.bootstrap.min.js"></script>
    <script src="../vendor/datatables-responsive/dataTables.responsive.js"></script>
  <script type="text/javascript">
    $(function () {
     $("#example1").dataTable();
     $('#example2').dataTable({
      "bPaginate": true,
      "bLengthChange": false,
      "bFilter": false,
      "bSort": true,
      "bInfo": true,
      "bAutoWidth": false
     });
    });
      $(function () {
     $("#example3").dataTable();
     $('#example4').dataTable({
      "bPaginate": true,
      "bLengthChange": false,
      "bFilter": false,
      "bSort": true,
      "bInfo": true,
      "bAutoWidth": false
     });
    });
   </script>
 <script type="text/javascript">
    //Hapus Data
    $(document).ready(function() {
        $('#konfirmasi_hapus').on('show.bs.modal', function(e) {
            $(this).find('.btn-ok').attr('href', $(e.relatedTarget).data('href'));
        });
    });
  </script>


</body>

</html>

<?php

	include 'koneksi.php';

  if(isset($_POST['log'])) {
    $nama_user  = @$_POST['user'];
    $pswd       = @$_POST['pass'];

    //$enkrip     = md5($pswd);

    $sql  = mysqli_query($koneksi, "SELECT * FROM tb_user WHERE pengguna='$nama_user' and sandi='$pswd'");
    $row  = mysqli_fetch_row($sql);
	  $bc		= mysqli_fetch_array($sql);

      if($row > 0){
        session_start();
        $_SESSION['user']	= $nama_user;
        $_SESSION['pass']	= $pswd;

				$_SESSION['dokter'] = $bc['id_dokter'];
		//$_SESSION['akses']	= '$bc[akses]';
            if ($row[4]==1) {
              header('Location:../admin/');
            }elseif ($row[4]==2) {
              header('Location:../dokter/');
      			}elseif ($row[4]==3) {
      				header('Location:../kepalaklinik/');
      			}

  }else{
		echo '<script language="javascript">
	           alert ("USERNAME ATAU PASSWORD YANG ANDA MASUKAN SALAH");
	           </script>';

?>
<script type="text/javascript">
window.location ="../index.php?indek=login" ;
</script>
<?php
	}
}
 ?>

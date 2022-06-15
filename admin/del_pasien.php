<form action="<?php $_SERVER['PHP_SELF'] ?>" method="post">
  <div align="center">
<table align="centre">
  <tr>
    <td colspan="2" align="center"><div style="font-family:tahoma; font-size:20pt;">Apakah anda yakin untuk menghapus ? </div></br></td>
  </tr>
  <tr align="center">
    <td><input type="submit" name="ya" value="YA"></td>
    <td><input type="submit" name="tidak" value="TIDAK"></td>
  </tr>
</table>
</div>
</form>

<?php
include '../config/koneksi.php';

if (isset($_POST['ya'])) {

mysqli_query($koneksi, "UPDATE tb_pasien SET stts='0' WHERE id_pasien = '$_GET[id]'");
header('location:index.php?menu=pasien');

}elseif (isset($_POST['tidak'])) {
  header('location:index.php?menu=pasien');
}
?>

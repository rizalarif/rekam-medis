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
 mysql_connect("localhost", "root", "");
 mysql_select_db("rekam_medis");

 if (isset($_POST['ya'])) {
 	//$id_dokter = $_GET['id_dokter'];

	$query = mysql_query("DELETE FROM tb_rekam_medis WHERE id = '$_GET[id]'");
?><script language="javascript">alert('Data berhasil dihapus !'); document.location='report.php';</script>
<?php
}elseif (isset($_POST['tidak'])) {
?>
<script language="javascript">alert('Data berhasil dihapus !'); document.location='report.php';</script>
<?php
}

 ?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Input Raport</title>
<style type="text/css">
<!--
body {
	margin-left: 5%;
	margin-top: 0%;
	margin-right: 5%;
	margin-bottom: 0px;
}
.style1 {
	font-size: 24px;
	font-weight: bold;
}
-->
</style></head>

<body>
<?php
	mysql_connect("localhost", "root", "");
	mysql_select_db("tk_wahyu");
	
		$dtnil=mysql_query("select * from tb_nilai where id_siswa='$_GET[id]'");
		$bcnil=mysql_fetch_array($dtnil);
			$dtsw=mysql_query("select * from tb_siswa where id_siswa='$bcnil[id_siswa]'");
			$bcsw=mysql_fetch_array($dtsw);
				$dtmpl=mysql_query("select * from tb_nilai where id_mapel='$bcnil[id_mapel]'");
				$bcmpl=mysql_fetch_array($dtmpl);
					$dtgr=mysql_query("select * from tb_nilai where id_guru='$bcnil[id_guru]'");
					$bcgr=mysql_fetch_array($dtgr);
?>
<form method="post" action="">
<table width="700" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td valign="top"><table width="100%" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td width="13%" rowspan="2" align="center" valign="top"><img src="../img/logotk.jpg" width="100" height="100" /></td>
        <td width="87%" align="center" valign="top"><h2><b>LAPORAN PENILAIAN SISWA</b></h2></td>
      </tr>
      <tr>
        <td align="center" valign="top"><h2><b>TK WAHYU LESTARI</b></h2></td>
      </tr>
    </table></td>
  </tr>
  <tr>
    <td valign="top"><table width="100%" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td width="17%" valign="top">NIS </td>
        <td width="1%" valign="top">:</td>
        <td width="31%" valign="top"><?php echo"$bcsw[nis_siswa]"; ?> </td>
        <td width="17%" valign="top">Semester</td>
        <td width="1%" valign="top">:</td>
        <td width="33%" valign="top"><?php echo"$bcnil[semester]"; ?></td>
      </tr>
      <tr>
        <td valign="top">Nama Siswa </td>
        <td valign="top">:</td>
        <td valign="top"><?php echo"$bcsw[nama_siswa]"; ?></td>
        <td valign="top">Tahun Ajaran </td>
        <td valign="top">:</td>
        <td valign="top"><?php echo"$bcnil[tahun_ajaran]"; ?></td>
      </tr>
      <tr>
        <td valign="top">Kelas</td>
        <td valign="top">:</td>
        <td valign="top"><?php echo"$bcsw[kelas]"; ?></td>
        <td valign="top">&nbsp;</td>
        <td valign="top">&nbsp;</td>
        <td valign="top">&nbsp;</td>
      </tr>
      <tr>
        <td valign="top">&nbsp;</td>
        <td valign="top">&nbsp;</td>
        <td valign="top">&nbsp;</td>
        <td valign="top">&nbsp;</td>
        <td valign="top">&nbsp;</td>
        <td valign="top">&nbsp;</td>
      </tr>
    </table></td>
  </tr>
  <tr>
    <td align="center" valign="top"><table width="100%" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td valign="top"><table width="100%" border="1" cellpadding="3" cellspacing="0" bordercolor="#000000">
          <tr>
            <td width="3%" align="center" valign="top">No</td>
            <td width="36%" align="center" valign="top">Aspek Perkembangan </td>
            <td width="10%" align="center" valign="top">Kkm</td>
            <td width="11%" align="center" valign="top">Nilai</td>
            <td width="40%" align="center" valign="top">Deskripsi</td>
          </tr>
		  <?php	
		
			$no=0;
			$dtn=mysql_query("select * from tb_nilai where id_siswa='$bcsw[id_siswa]' order by id_mapel asc");
	 		while($bcn=mysql_fetch_array($dtn)){
			$no++;
				$dtm=mysql_query("select * from tb_mapel where id_mapel='$bcn[id_mapel]'");
				$bcm=mysql_fetch_array($dtm);
?>
          <tr>
            <td align="center" valign="top"><?php echo"$no."; ?></td>
            <td valign="top"><?php echo"$bcm[nama_mapel]"; ?></td>
            <td align="center" valign="top"><?php echo"$bcnil[kkm]"; ?></td>
            <td align="center" valign="top"><?php echo"$bcn[nilai]"; ?></td>
            <td valign="top"><?php echo"$bcn[deskripsi]"; ?></td>
          </tr>
<?php
	}
?>	
        </table></td>
      </tr>
      <tr>
        <td valign="top">&nbsp;</td>
      </tr>
      <tr>
        <td valign="top"><table width="100%" border="1" cellpadding="3" cellspacing="0" bordercolor="#000000">
          <tr>
            <td width="34%" rowspan="3" align="center" valign="middle">Ketidakhadiran</td>
            <td width="35%" align="center" valign="top">Sakit</td>
            <td width="31%" align="center" valign="top"><input name="sakit" type="text" id="sakit" size="3" />
              Hari</td>
          </tr>
          <tr>
            <td align="center" valign="top">Izin</td>
            <td align="center" valign="top"><input name="izin" type="text" id="izin" size="3" /> 
              Hari </td>
          </tr>
          <tr>
            <td align="center" valign="top">Tanpa Keterangan </td>
            <td align="center" valign="top"><input name="tdkmsk" type="text" id="tdkmsk" size="3" /> 
              Hari </td>
          </tr>
          <tr>
            <td rowspan="2" align="center" valign="top">Tanda Tangan<br />
              Nama dan Tanggal</td>
            <td align="center" valign="middle"><p>Guru</p>
              <p>&nbsp;</p></td>
            <td valign="top">&nbsp;</td>
          </tr>
          <tr>
            <td align="center" valign="top"><p>Orang Tua/Wali</p>
              <p>&nbsp;</p></td>
            <td valign="top">&nbsp;</td>
          </tr>
        </table></td>
      </tr>
      <tr>
        <td valign="top">Purworejo
          ,
		  <?php
				$bln = date('m');
				echo"$bln";
		?> <?php
			//bulan
   		 $bulan=date("m");
   		 if($bulan==1){
		 $bulan="Januari";
		 }elseif($bulan==2){
		 $bulan="Februari";
		 }elseif($bulan==3){
		 $bulan="Maret";
		 }elseif($bulan==4){
		 $bulan="April";
		 }elseif($bulan==5){
		 $bulan="Mei";
		 }elseif($bulan==6){
		 $bulan="Juni";
		 }elseif($bulan==7){
		 $bulan="Juli";
		 }elseif($bulan==8){
		 $bulan="Agustus";
		 }elseif($bulan==9){
		 $bulan="September";
		 }elseif($bulan==10){
		 $bulan="Oktober";
		 }elseif($bulan==11){
		 $bulan="November";
		 }elseif($bulan==12){
		 $bulan="Desember";
		 }
		 echo"$bulan";
		?> <?php
				$thn = date('Y');
				echo"$thn";
		?></td>
      </tr>
      <tr>
        <td align="center" valign="top">Kepala Taman Kanak - Kanak&nbsp;&nbsp; </td>
      </tr>
      <tr>
        <td align="center" valign="middle"><p>Ribkhiyatun.Spd</p></td>
      </tr>
      <tr>
        <td align="center" valign="top">NIP. 20173008</td>
      </tr>
      <tr>
        <td align="center" valign="top">&nbsp;</td>
      </tr>
      <tr>
        <td align="center" valign="top">&nbsp;</td>
      </tr>
      <tr>
        <td align="center" valign="top">&nbsp;</td>
      </tr>
      <tr>
        <td align="center" valign="top"><input type="submit" name="kirim" value="cetak" onclick="window.print();"/></td>
      </tr>
    </table></td>
  </tr>
</table>
</form>
<?php
		if(isset($_POST['kirim'])){
				$semester		= $_POST['semester'];
				$thn_ajar		= $_POST['tahun'];
				$sakit			= $_POST['sakit'];
				$izin			= $_POST['izin'];
				$tnpket			= $_POST['tdkmsk'];
				$tempat			= $_POST['tempat'];
				$nama_kepsek	= $_POST['kepsek'];
				$nip_kepsek		= $_POST['nip']; 
		}
?>
</body>
</html>

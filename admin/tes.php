<?php
//ambil nilai variabel error
if (isset($_GET['error']))
{
   $error=$_GET['error'];
}
else
{
   $error="";
}
  
//siapkan pesan kesalahan
$pesan="";
if ($error=="variabel_belum_diset")
{
   $pesan="<h3>Maaf, anda harus mengakses halaman ini dari form.php</h3>";
}
if ($error=="nama_kosong")
{
   $pesan="<h3>Maaf, anda harus mengisi nama</h3>";
}
if ($error=="nama_harus_huruf")
{
   $pesan="<h3>Maaf, nama harus berupa huruf</h3>";
}
?>
  
<!DOCTYPE html>
<head>
   <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
   <title>Belajar Form PHP</title>
</head>
<body>
   <h2>Tutorial Belajar Form HTML - PHP </h2>
   <?php
   echo $pesan;
   ?>
   <form action="test.php" method="get">
      Nama: <input type="text" name="nama" />
      <br />
      E-Mail: <input type="text" name="email" />
      <br />
      <input type="submit" value="Proses Data" >
   </form>
</body>
</html>
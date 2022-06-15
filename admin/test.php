<?php
if (isset($_GET['nama']) AND isset($_GET['email']))
{
   $nama=$_GET['nama'];
   $email=$_GET['email'];
   $nama=htmlspecialchars($nama);
   $email=strip_tags($email);
}
else
{
   header("Location:form.php?error=variabel_belum_diset");
}
  
if(empty($nama))
{
   header("Location:form.php?error=nama_kosong");
}
else
{
   if (is_numeric($nama))
   {
      header("Location:form.php?error=nama_harus_huruf");
   }
   else
   {
      echo "Nama: $nama <br /> Email: $email";
   }
}  
?>
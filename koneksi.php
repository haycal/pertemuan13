<?php  
$server  = "localhost";  
  $username = "root";  
  $password = "";  
  $database = "mahasiswa";  
  $koneksi = mysqli_connect($server,$username,$password) or die ('Koneksi gagal');  
  if($koneksi){  
   mysqli_select_db($koneksi, $database) or die ('Database belum dibuat');   
  }  
?>
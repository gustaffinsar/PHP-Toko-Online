<?php
if($_POST){
 $nama=$_POST['nama'];
 $alamat=$_POST['alamat'];
 $telp=$_POST['telp'];
 $username=$_POST['username'];
 $password=$_POST['password'];
 if(empty($nama)){
 echo "<script>alert('nama tidak boleh kosong');location.href='tambah_pelanggan.php';</script>";
 } else if(empty($alamat)){
 echo "<script>alert('alamat tidak boleh kosong');location.href='tambah_pelanggan.php';</script>";
 } else if(empty($telp)){
    echo "<script>alert('telp tidak boleh kosong');location.href='tambah_pelanggan.php';</script>";
 } else if(empty($username)){
   echo "<script>alert('username tidak boleh kosong');location.href='tambah_pelanggan.php';</script>";
 } else if(empty($password)){
   echo "<script>alert('password tidak boleh kosong');location.href='tambah_pelanggan.php';</script>";
 } else {
 include "koneksi.php";
 $insert=mysqli_query($conn,"insert into pelanggan 
 (nama, alamat, telp, username, password) 
 value 
 ('".$nama."','".$alamat."','".$telp."','".$username."','".$password."')");
 if($insert){
 echo "<script>alert('Sukses menambahkan pelanggan');location.href='tampil_pelanggan.php';</script>";
 } else {
 echo "<script>alert('Gagal menambahkan pelanggan');location.href='tambah_pelanggan.php';</script>";
 }
 }
}
?>
<?php
if($_POST){
 $nama_produk=$_POST['nama_produk'];
 $deskripsi=$_POST['deskripsi'];
 $harga=$_POST['harga'];
 $foto_produk=$_POST['foto_produk'];
 if(empty($nama_produk)){
 echo "<script>alert('nama produk tidak boleh kosong');location.href='tambah_produk.php';</script>";
 } else if(empty($deskripsi)){
 echo "<script>alert('deskripsi tidak boleh kosong');location.href='tambah_produk.php';</script>";
 } else if(empty($harga)){
    echo "<script>alert('harga tidak boleh kosong');location.href='tambah_produk.php';</script>";
 } else if(empty($foto_produk)){
    echo "<script>alert('foto produk tidak boleh kosong');location.href='tambah_produk.php';</script>";
 } else {
 include "koneksi.php";
 $insert=mysqli_query($conn,"insert into produk 
 (nama_produk, deskripsi, harga, foto_produk) 
 value 
 ('".$nama_produk."','".$deskripsi."','".$harga."','".$foto_produk."')");
 if($insert){
 echo "<script>alert('Sukses menambahkan produk');location.href='tampil_produk.php';</script>";
 } else {
 echo "<script>alert('Gagal menambahkan produk');location.href='tambah_produk.php';</script>";
 }
 }
}
?>
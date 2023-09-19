<?php
    if($_GET['id']){
        include "koneksi.php";
        $id_detail_transaksi=$_GET['id'];
        $cek_detail_transaksi=mysqli_query($conn, "select * from detail_transaksi where id_detail_transaksi = '".$id_detail_transaksi."' ");
        $detail_transaksi=mysqli_fetch_array($cek_detail_transaksi);
        $id_produk=$detail_transaksi['id_produk'];

        $cek_produk=mysqli_query($conn,"select * from produk where id_produk = '".$id_produk."' ");
        $produk= mysqli_fetch_array($cek_produk);
        $jumlah= $detail_transaksi['qty'];
        $harga= $produk['harga'];
        $subtotal= $jumlah*$harga;

            mysqli_query($conn, "update detail_transaksi set subtotal ='".$subtotal."' where id_detail_transaksi = '".$id_detail_transaksi."' ");
            header('location: histori_pembelian.php');
}
?>
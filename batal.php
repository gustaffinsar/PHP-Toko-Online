<?php
    if($_GET['id']){
        include "koneksi.php";
        $id_detail_transaksi=$_GET['id'];

            mysqli_query($conn, "update detail_transaksi set subtotal = 0 where id_detail_transaksi = '".$id_detail_transaksi."' ");
            header('location: histori_pembelian.php');
}
?>
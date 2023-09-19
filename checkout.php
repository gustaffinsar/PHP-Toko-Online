<?php 
    session_start();
    include "koneksi.php";
    $cart=@$_SESSION['cart'];
    if(count($cart)>0){
        date('Y-m-d',mktime(0,0,0,date('m'),(date('d')),date('Y')));
        foreach ($cart as $key_produk => $val_produk) {
            mysqli_query($conn,"insert into transaksi(id_pelanggan,id_petugas,tgl_transaksi)value('".$val_produk['id_pelanggan']."','".$_SESSION['id_petugas']."','".date('Y-m-d')."')");
        }
       
        $id=mysqli_insert_id($conn);
        foreach ($cart as $key_produk => $val_produk){
            mysqli_query($conn,"insert into detail_transaksi(id_transaksi,id_produk,qty) value('".$id."','".$val_produk['id_produk']."','".$val_produk['qty']."')");
        }
        unset($_SESSION['cart']);
        echo '<script>alert("anda berhasil melakukan transaksi");location.href="histori_pembelian.php"</script>';
    }
?>
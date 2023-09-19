<?php 
    include "header.php";
    include "koneksi.php";

    $qry_detail_produk=mysqli_query($conn,"select * from produk where id_produk = '".$_GET['id_produk']."'");
    $dt_produk=mysqli_fetch_array($qry_detail_produk);

?>

<h2>Beli produk</h2>
<div class="row">
    <div class="col-md-4">
        <img src="images/<?=$dt_produk['foto_produk'] ?>" class="card-img-top" alt="">
    </div>
    <div class="col-md-8">
        <form action="masukkan_keranjang.php?id_produk=<?=$dt_produk['id_produk']?>" method="post">
            <table class="table table-hover table-striped">
                <thead>
                <tr>
                    <td>Nama produk</td>
                    <td><?=$dt_produk['nama_produk']?></td>
                </tr>
                <tr>
                    <td>Deskripsi</td>
                    <td><?=$dt_produk['deskripsi']?></td>
                </tr>
                <tr>
                    <td>Jumlah Beli</td>
                    <td><input type="number" name="jumlah_pembelian" value="1"></td>
                </tr>
                <tr>
                    <td>Pelanggan</td>
                    <td> 
                    <select name="id_pelanggan" class="form-control">
                    <option></option>
                <?php
                include "koneksi.php";
                    $qry_pelanggan=mysqli_query($conn,"select * from pelanggan");
                while($data_pelanggan=mysqli_fetch_array($qry_pelanggan)){
                    echo '<option value="'.$data_pelanggan['id_pelanggan'].'">'.$data_pelanggan['nama'].'</option>'; 
                    }
                ?>
                </select>
                </td>
                </tr>
                <tr>
                    <td colspan="2"><input type="submit" name="" class="btn btn-success" value="BELI"></td>
                </tr>
                </thead>
            </table>
        </form>
    </div>
</div>

<?php 
    include "footer.php";
?>
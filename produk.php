<?php 
    include "header.php";
?>

<h2>Daftar Produk</h2>
    <div class="row">
        <?php 
            include "koneksi.php";
                $qry_produk=mysqli_query($conn,"select * from produk");
            while($dt_produk=mysqli_fetch_array($qry_produk)){
        ?>
            <div class="col-md-3">
                <div class="card">
                    <img src="images/<?=$dt_produk['foto_produk']?>" class="card-img-top" alt="">
                <div class="card-body">
                    <h5 class="card-title"><?=$dt_produk['nama_produk']?></h5>
                    <p class="card-title"><?=substr($dt_produk['deskripsi'],0,50)?></p>
                    <h6 class="card-title"><?=$dt_produk['harga']?></h6>
                    <a href="beli_produk.php?id_produk=<?=$dt_produk['id_produk']?>" class="btn btn-primary">BELI</a>
            </div>
        </div>
    </div>
    <?php 
        }  
    ?>
</div>
<?php 
    include "footer.php"
?>
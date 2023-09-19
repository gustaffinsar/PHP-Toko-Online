<?php 
    include "header.php";
?>

<h2>Histori Pembelian Produk</h2>
<table class="table table-hover table-striped">
    <thead>
        <th>No</th>
        <th>Tanggal Transaksi</th>
        <th>Nama Produk</th>
        <th>Harga Barang</th>
        <th>Jumlah Pembelian</th>
        <th>Total</th>
        <th>Nama Pelanggan</th>
        <th>Alamat</th>
        <th>Telepon</th>
        <th>Status</th>
        <th>Aksi</th>
    </thead>
    <tbody>
        <?php 
            include "koneksi.php";
            $qry_histori=mysqli_query($conn,"select * from transaksi order by id_transaksi desc");
            $qry_harga=mysqli_query($conn,"select * from detail_transaksi order by id_detail_transaksi desc");

            $no=0;
            while($dt_histori=mysqli_fetch_array($qry_histori)){
                while ($data_harga=mysqli_fetch_array($qry_harga)) {
                $no++;

                $qry_produk=mysqli_query($conn,"select * from detail_transaksi join produk on produk.id_produk=detail_transaksi.id_produk join transaksi on transaksi.id_transaksi=detail_transaksi.id_transaksi join pelanggan on pelanggan.id_pelanggan=transaksi.id_pelanggan where id_detail_transaksi ='".$data_harga['id_detail_transaksi']."'");
                $dt_produk=mysqli_fetch_array($qry_produk);

                $produk_dibeli=$dt_produk['nama_produk'];
                $harga_barang=$dt_produk['harga'];
                $nama_pelanggan=$dt_produk['nama'];
                $alamat=$dt_produk['alamat'];
                $telepon=$dt_produk['telp'];
                $harga=$dt_produk['subtotal'];

                if ($dt_produk['subtotal']>0) {
                    $status_kirimkan= "<label class='alert alert-success'> Sudah Terkirim <br>".$harga."</label>";
                    $button_kembali="<a href='batal.php?id=".$data_harga['id_detail_transaksi']."' class='btn btn-warning' onclick='return confirm(\"batal\")'> Batal </a>";
                } else{
                    $status_kirimkan= "<label class='alert alert-danger'> Belum Terkirim <br>".$harga."</label>";
                    $button_kembali="<a href='kirimkan.php?id=".$data_harga['id_detail_transaksi']."' class='btn btn-warning' onclick='return confirm(\"terkirim\")'> Kirimkan </a>";
                }
                ?>
                    <tr>
                        <td style="font-weight:bold"><?= $no ?></td>
                        <td style="font-weight:bold"><?= $dt_histori['tgl_transaksi'] ?></td>
                        <td style="font-weight:bold"><?= $produk_dibeli ?></td>
                        <td style="font-weight:bold"><?= $harga_barang ?></td>
                        
                        <td style="font-weight:bold"><?= $data_harga['qty'] ?></td>
                        <td style="font-weight:bold"><?= $harga ?></td>
                        <th><?= $nama_pelanggan ?></th>
                        <th><?= $alamat ?></th>
                        <th><?= $telepon ?></th>
                        <td style="font-weight:bold"><?= $status_kirimkan ?></td>
                        <td style="font-weight:bold"><?= $button_kembali ?></td>
                    </tr>
                <?php 
                }
            }
                ?>
    </tbody>
</table>

<?php 
    include "footer.php";
?>
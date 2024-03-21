<?php
session_start();
include "header.php";
include "koneksi.php";


$kodeProduk = mysqli_real_escape_string(koneksiToko(), $_GET['produk']);
$result = mysqli_query(koneksiToko(), "SELECT * FROM produk WHERE kode_produk='$kodeProduk'");
$row = mysqli_fetch_assoc($result);

?>

<div class="container">
    <h2 style="width: 100%; border-bottom: 4px solid #2341d6;"><b>Detail Produk</b></h2>
    <div class="row">
        <div class="thumbnail">
            <img src="image/produk/<?php echo $row['image'] ?>" width="400">
        </div>
    </div>
    <div class="col-md-8">
        <form action="proses/add.php" method="get">
            <input type="hidden" name="kd_cs" value="
            <?php
            if (isset ($_SESSION['username'])) {
                echo $_SESSION['kd_cs'];
            }
            ?>">
            <input type="hidden" name="produk" value="<?php echo $kodeProduk ?>">
            <input type="hidden" name="hal" value="1">
            <table class="table table-striped">
                <tbody>
                    <tr>
                        <td><b>Nama</b></td>
                        <td>
                            <?php echo $row['nama'] ?>
                        </td>
                    </tr>
                    <tr>
                        <td><b>Harga</b></td>
                        <td>Rp.
                            <?php echo number_format($row['harga'], 0, ',', '.') ?>
                        </td>
                    </tr>
                    <tr>
                        <td><b>Deskripsi</b></td>
                        <td>
                            <?php echo $row['deskripsi'] ?>
                        </td>
                    </tr>
                    <tr>
                        <td><b>Jumlah</b></td>
                        <td><input class="form-control" type="number" min="1" name="jml" value="1"
                                style="width: 155px;"></td>
                    </tr>
                </tbody>
            </table>

            <?php
            if (isset ($_SESSION['username'])) {
                ?>
            <button type="submit" class="btn btn-success"><i class="glyphicon glyphicon-shopping-cart"></i> Tambahkan Ke
                Keranjang</button>
            <?php
            } else {
                ?>
            <a href="keranjang.php" class="btn btn-success"><i class="glyphicon glyphicon-shopping-cart"></i> Tambahkan
                Ke Keranjang</a>
            <?php
            }
            ?>
            <a href="index.php" class="btn btn-warning">Kembali Belanja</a>
        </form>
    </div>
</div>
<br>
<br>

<?php
include "footer.php";
?>
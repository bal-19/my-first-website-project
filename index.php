<?php
    session_start();
//     if (!isset($_SESSION['username'])) {
//         header('Location: index.php');
//     exit;
// }
    include "header.php";
    include "crudproduk.php";
    if(isset($_SESSION['kd_cs'])) {
        $kode_cs = $_SESSION['kd_cs'];
    }

?>
<!-- IMAGE -->
<div class="container-fluid" style="margin: 0; padding: 0;">
    <div class="image" style="margin-top: -21px;">
        <img src="image/home/Mondo Store.jpg" style="width: 100%; height: 750px;">
    </div>
</div>
<br>
<br>

<!-- PRODUK TERBARU -->
<div class="container">
    <h2 style="width: 100%; border-bottom: 4px solid #2341d6; margin-top: 80px;"><b>Produk Kami</b></h2>
    <div class="row">
        <?php
            // $kode_cs = $_SESSION['kd_cs'];
            foreach (bacaSemuaProduk() as $dataProduk) {
                $kodeProduk = $dataProduk['kode_produk'];
                $namaProduk = $dataProduk['nama'];
                $gambarProduk = $dataProduk['image'];
                $deskripsiProduk = $dataProduk['deskripsi'];
                $hargaProduk = $dataProduk['harga'];
        ?>
                <div class='col-sm-6 col-md-4' >
                    <div class='thumbnail'>
                        <img src='image/produk/<?php echo $gambarProduk ?>' alt='<?php echo $namaProduk ?>' style="width: 400px; height: 400px;">
                        <div class='caption'>
                            <div style="height: 40px">
                            <h4><?php echo $namaProduk ?></h3>
                            </div>
                            <h3>Rp. <?php echo number_format($hargaProduk, 0, ',', '.') ?></h4>
                            <div class='row'>
                            <div class='col-md-6'>
                                <a href='detail_produk.php?produk=<?php echo $kodeProduk ?>' class='btn btn-primary btn-block'>Details</a>
                            </div>
                            <?php if(isset($_SESSION['kd_cs'])) { ?>
                                <div class='col-md-6'>
                                    <a href="proses/add.php?produk=<?php echo $kodeProduk ?>&kd_cs=<?php echo $kode_cs; ?>&hal=1&jml=1" class='btn btn-success btn-block' role='button'><i class='glyphicon glyphicon-shopping-cart'></i> Tambah</a>
                                </div>      
                            <?php } else { ?>
                                <div class="col-md-6">
                                    <a href="keranjang.php" class="btn btn-success btn-block" role="button"><i class="glyphicon glyphicon-shopping-cart"></i> Tambah</a>
                                </div>
                            <?php
                            }       
                            ?>
                            </div>
                        </div>
                    </div>
                </div>
        <?php        
            }
        ?>
    </div>
</div>
<br>
<br>
<br>
<br>
<?php
    include "footer.php";
?>
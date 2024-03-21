<?php
session_start();
include 'header.php';
include '../koneksi.php';

if (!isset($_SESSION['username'])) {
    header('Location: index.php');
    exit;
}

$koneksi = koneksiToko();
// customer
$result1 = mysqli_query($koneksi, "SELECT distinct kode_customer FROM customer");
$jml1 = mysqli_num_rows($result1);
// pesanan dibatalkan/ditolak
$result2 = mysqli_query($koneksi, "SELECT distinct kode_produk FROM produk");
$jml2 = mysqli_num_rows($result2);
?>
<div class="container">
    <div class="row">
        <div class="col-md-4">
            <div style="background-color: #dfdfdf; padding-bottom: 60px; padding-left: 20px;padding-right: 20px; padding-top: 10px;">
                <a href="m_customer.php" style="text-decoration: none; color: black;"><h4>CUSTOMER</h4></a>
                <h4 style="font-size: 56pt;"><b><?= $jml1; ?></b></h4>
            </div>
        </div>
        <div class="col-md-4">
            <div style="background-color: #dfdfdf; padding-bottom: 60px; padding-left: 20px;padding-right: 20px; padding-top: 10px;">
                <a href="m_produk.php" style="text-decoration: none; color: black;"><h4>PRODUK</h4></a>
                <h4 style="font-size: 56pt;"><b><?= $jml2; ?></b></h4>
            </div>
        </div>
    </div>
</div>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<?php
include 'footer.php';
?>
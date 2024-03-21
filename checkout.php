<?php
    session_start();
    include "koneksi.php";
    include "header.php";

    if (!isset($_SESSION['username'])) {
        header("Location: user_login.php");
        exit();
    }

    $kode_cs = $_SESSION['kd_cs'];
?>
<html>
<head>
</head>
<body>
    <div class="container">
        <h2 style="width: 100%; border-bottom: 4px solid #2341d6;"><b>Checkout</b></h2>
        <h4>Daftar pesanan</h4>
        <table class="table table-striped table-inverse table-responsive">
            <thead>
                <tr>
                    <th scope="col">No</th>
                    <th scope="col">Nama</th>
                    <th scope="col">Harga</th>
                    <th style='text-align: center;' scope="col">Qty</th>
                    <th scope="col">Sub Total</th>
                </tr>
            </thead>
            <tbody>

                <?php
                    $sql = "SELECT * FROM keranjang WHERE kode_customer='$kode_cs'";
                    $result = koneksiToko()->query($sql);

                    koneksiToko()->close();
                ?>

                <!-- Tampilkan daftar pesanan -->
                <?php
                    $no = 1;
                    $hasil = 0;
                    
                    if ($result->num_rows > 0) {
                        while ($row = $result->fetch_assoc()) {
                            echo "<tr>";
                            echo "<td>" . $no . "</td>";
                            echo "<td>" . $row["nama_produk"] . "</td>";
                            echo "<td>" . number_format($row["harga"]) . "</td>";
                            echo "<td style='text-align: center;'>" . $row["qty"] . "</td>";
                            echo "<td>" . number_format($row["harga"] * $row["qty"]) . "</td>";
                            echo "</tr>";
                            $no++;
                            $sub = $row['harga'] * $row['qty'];
                            $hasil += $sub;
                        }
                ?>
                 <tr>
                    <td colspan="3" style="text-align: right; font-weight: bold;"></td>
                    <td style="font-weight: bold;">
                        Grand Total =
                    </td>
                    <td style="font-weight: bold;">
                        Rp. <?php echo number_format($hasil) ?>
                    </td>
                </tr>
                <?php
                    } else {
                        echo "<tr>
                            <td colspan='5' class='text-center bg-warning'>
                                <h5><b>TIDAK ADA PESANAN</b></h5>
                            </td>
                        </tr>";
                    }
                ?>
            </tbody>
        </table>

        <div class="alert alert-warning">
            <strong>Peringatan:</strong> Pastikan Anda telah memeriksa pesanan Anda dengan teliti sebelum melakukan checkout.
        </div>

        <h2>Data Diri</h2>
        <div class="container">
            <form action="proses/checkout.php" method="post">
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="nama">Nama:</label>
                            <input type="text" class="form-control" id="nama" name="nama" style="width: 500px;" required>
                        </div>

                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="provinsi">Provinsi:</label>
                            <input type="text" class="form-control" id="provinsi" name="provinsi" style="width: 500px;" required>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="kota">Kota:</label>
                            <input type="text" class="form-control" id="kota" name="kota" style="width: 500px;" required>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="alamat">Alamat:</label>
                            <input type="text" class="form-control" id="alamat" name="alamat" style="width: 500px;" required>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="kodepos">Kode Pos:</label>
                            <input type="text" class="form-control" id="kodepos" name="kodepos" style="width: 500px;" required>
                        </div>
                    </div>
                </div>
                <button type="submit" class="btn btn-success"><i class="glyphicon glyphicon-shopping-cart"></i> Pesan Sekarang</button>
                    <a href="keranjang.php" class="btn btn-danger">Cancel</a>
            </form>
        </div>
    </body>
</html>
<br>
<br>
<br>
<?php
    include "footer.php";
?>
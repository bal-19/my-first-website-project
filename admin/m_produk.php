<?php
    session_start();
    include "header.php";
    include "../koneksi.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body>
    <div class="container">
        <h2 style="width: 100%; border-bottom: 4px solid"><b>Master Produk</b></h2>
        <form action="hapus_produk.php" method="post">
        <table class="table table-striped table-inverse table-responsive">
            <thead>
                <tr>
                    <th scope="col">No</th>
                    <th scope="col">Kode Produk</th>
                    <th scope="col">Nama Produk</th>
                    <th scope="col">Image</th>
                    <th scope="col">Harga</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>

                <?php
                    $sql = "SELECT * FROM produk";
                    $result = koneksiToko()->query($sql);

                    koneksiToko()->close();
                ?>

                <!-- Tampilkan daftar produk -->
                <?php
                    $no = 1;
                    $hasil = 0;
                    
                    if ($result->num_rows > 0) {
                        while ($row = $result->fetch_assoc()) {
                ?>
                            <tr>
                            <td><?php echo $no ?></td>
                            <td><?php echo $row["kode_produk"] ?></td>
                            <td><?php echo $row["nama"] ?></td>
                            <td><?php echo  "<img src='../image/produk/".$row["image"]."' width='100'>" ?></td>
                            <td>Rp. <?php echo number_format($row["harga"]) ?></td>
                            <td>
                                <a href="edit_produk.php?produk=<?php echo $row['kode_produk'] ?>" name="edit" class="btn btn-warning"><i class="glyphicon glyphicon-pencil"></i></a>
                                <button name="delete" value="<?php echo $row['kode_produk']; ?>" class="btn btn-danger"><i class="glyphicon glyphicon-trash" onclick="return confirm('Yakin ingin dihapus?')"></i></button>
                            </td>
                            </tr>
                <?php
                            $no++;
                        }
                    }
                ?>
            </tbody>
        </table>
        </form>
        <a href='tambahproduk.php' class="btn btn-success"><i class="glyphicon glyphicon-plus"></i> Tambah Produk</a>
    </div>      
</body>
<br>
<br>
<br>
<?php
    include "footer.php";
?>
</html>
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
        <form action="hapus_user.php" method="post">
            <table class="table table-striped table-inverse table-responsive">
                <thead>
                    <tr>
                        <th scope="col">No</th>
                        <th scope="col">Kode Customer</th>
                        <th scope="col">Nama</th>
                        <th scope="col">Email</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>

                    <?php
                        $sql = "SELECT * FROM customer";
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
                                <td><?php echo $row["kode_customer"] ?></td>
                                <td><?php echo $row["nama"] ?></td>
                                <td><?php echo $row["email"] ?></td>
                                <td>
                                    <button type="submit" name="hapus" value="<?php echo $row['kode_customer']; ?>" class="btn btn-danger"><i class="glyphicon glyphicon-trash" onclick="return confirm('Yakin ingin dihapus?')"></i></button>
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
    </div>      
</body>
<br>
<br>
<br>
<?php
    include "footer.php";
?>
</html>
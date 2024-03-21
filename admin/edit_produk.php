<?php
    include "header.php";
    include "../koneksi.php";

    $kodeProduk = mysqli_real_escape_string(koneksiToko(), $_GET['produk']);
    $result = mysqli_query(koneksiToko(), "SELECT * FROM produk WHERE kode_produk='$kodeProduk'");
    $row = mysqli_fetch_assoc($result);
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body>
  <div class="container">
    <h2 style="width: 100%; border-bottom: 4px solid"><b>Edit Produk</b></h2>
    <form action="proses_edit.php" method="post" enctype="multipart/form-data">
        <div class="form-group">
            <img id="previewImage" src="../image/produk/<?php echo $row['image'] ?>" alt="Preview" style="max-width: 100px; max-height: 100px;">
            <input type="file" name="file" id="file" size='50'>
            <p>Pilih Gambar untuk Produk</p> 
        </div>
      <div class="form-group">
        <label for="kodeProduk">Kode Produk:</label>
        <input type="text" value="<?php echo $row['kode_produk'] ?>" class="form-control" name="kodeProduk" readonly>
      </div>
      <div class="form-group">
        <label for="namaProduk">Nama Produk:</label>
        <input type="text" value="<?php echo $row['nama'] ?>" class="form-control" name="namaProduk">
      </div>
      <div class="form-group">
        <label for="harga">Harga:</label>
        <input type="number" value="<?php echo $row['harga'] ?>" class="form-control" name="harga">
      </div>
      <div class="form-group">
        <label for="deskripsi">Deskripsi:</label>
        <input type="text" value="<?php echo $row['deskripsi'] ?>" class="form-control" name="deskripsi">
      </div>
      <button type="submit" class="btn btn-warning">Edit</button>
      <a href="m_produk.php" class="btn btn-danger">Cancel</a>
    </form>
  </div>
</body>
<script>
  const fileInput = document.getElementById('file');
  const previewImage = document.getElementById('previewImage');

  fileInput.addEventListener('change', function() {
    const file = fileInput.files[0];
    const reader = new FileReader();

    reader.addEventListener('load', function() {
      previewImage.src = reader.result;
    });

    if (file) {
      reader.readAsDataURL(file);
    }
  });
</script>
</html>

<?php
    include "header.php";
    include 'crudproduk.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body>
  <div class="container">
    <h2 style="width: 100%; border-bottom: 4px solid"><b>Tambah Produk</b></h2>
    <form action="proses_tambah.php" method="post" enctype="multipart/form-data">
        <div class="form-group">
            <img id="previewImage" src="" alt="Preview" style="max-width: 100px; max-height: 100px;">
            <input type="file" name="file" id="file" size='50'>
            <p>Gambar harus berjenis .jpg <br>
            Pilih Gambar untuk Produk </p>
        </div>
        <div class="form-group">
            <label for="kodeProduk">Kode Produk:</label>
            <input type="text" value="<?php echo generateKodeCustomer(); ?>" class="form-control" name="kodeProduk" readonly>
        </div>
        <div class="form-group">
            <label for="namaProduk">Nama Produk:</label>
            <input type="text" class="form-control" name="namaProduk" placeholder="Masukkan Nama Produk">
        </div>
        <div class="form-group">
            <label for="harga">Harga:</label>
            <input type="number" class="form-control" name="harga" placeholder="Masukkan Harga">
            <p>Isi Harga Tanpa Menggunakan Titik(.) atau Koma(,)</p>
        </div>
        <div class="form-group">
            <label for="deskripsi">Deskripsi:</label>
            <input type="text" class="form-control" name="deskripsi">
        </div>
        <button type="submit" class="btn btn-success">Tambah</button>
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

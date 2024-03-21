<?php
    include "../koneksi.php";
    $koneksi = koneksiToko();

    function hapusProduk($kode_produk) {
        global $koneksi;
        $sql = "DELETE FROM produk WHERE kode_produk = '$kode_produk'";

        $hasil = 0;
        if (mysqli_query($koneksi, $sql)) {
            $hasil = 1;
        }
        mysqli_close($koneksi);
        return $hasil;
    }

    function generateKodeCustomer() {
        $koneksi = koneksiToko();
      
        $query = "SELECT kode_produk FROM produk ORDER BY kode_produk DESC LIMIT 1";
        $result = mysqli_query($koneksi, $query);
      
        if (mysqli_num_rows($result) > 0) {
          $row = mysqli_fetch_assoc($result);
          $kodeTerakhir = $row['kode_produk'];
      
          $angkaTerakhir = substr($kodeTerakhir, 3);
          $angkaBaru = intval($angkaTerakhir) + 1;
      
          $kode = "B" . str_pad($angkaBaru, 3, '0', STR_PAD_LEFT);
        } else {
          $kode = "B001";
        }
      
        mysqli_close($koneksi);
      
        return $kode;
      }

    function editProduk($kode_produk, $nama, $image, $deskripsi, $harga) {
       global $koneksi;
        $sql = "UPDATE produk SET nama='$nama', image='$image', deskripsi='$deskripsi', harga='$harga' WHERE kode_produk='$kode_produk'";
        $hasil = 0;
        if (mysqli_query($koneksi, $sql)) {
            $hasil = 1;
        }
        mysqli_close($koneksi);
        return $hasil;
    }

    function tambahProduk($kode_produk, $nama, $image, $deskripsi, $harga) {
        global $koneksi;
        $sql = "INSERT INTO produk VALUES('$kode_produk', '$nama', '$image', '$deskripsi', $harga)";
        $hasil = 0;
        if (mysqli_query($koneksi, $sql)) {
            $hasil = 1;
        }
        mysqli_close($koneksi);
        return $hasil;
    }
?>
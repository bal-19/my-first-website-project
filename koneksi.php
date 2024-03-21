<?php
//menciptakan koneksi
function koneksiToko() {
    $koneksi = mysqli_connect("localhost", "root", "", "dbtokoroti");

    //cek koneksi
    if(!$koneksi) {
        die("Koneksi Gagal : ". mysqli_connect_error());
    }
    return $koneksi;
}
?>
<?php

$koneksi = new mysqli('localhost', 'root', '', 'mobile_ganggu');
if ($koneksi->connect_error) {
    die("Koneksi Gagal: " . $koneksi->connect_error);
}

<?php

$koneksi = mysqli_connect('localhost', 'root', '', 'ptercbl');

function query($query)
{
    global $koneksi;
    $result = mysqli_query($koneksi, $query);
    $rows = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $rows[] = $row;
    }
    return $rows;
}

function tambah($data)
{
    global $koneksi;
    $id = $data['id_barang'];
    $brand = $data['brand'];
    $type = $data['type'];
    $harga = $data['harga'];

    $query = ("INSERT INTO mobil VALUES ('$id', '$brand', '$type', '$harga')");
    mysqli_query($koneksi, $query);
}

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
    $image = upload();

    $query = ("INSERT INTO mobil VALUES ('$id', '$brand', '$type', '$harga', '$image')");
    mysqli_query($koneksi, $query);
}

function upload()
{
    global $koneksi;
    $gambar = $_FILES['image']['name'];
    $size = $_FILES['image']['size'];
    $error = $_FILES['image']['error'];
    $tmp_name = $_FILES['image']['tmp_name'];

    if ($error === 4) {
        echo "<script>
                alert('gambar belum di upload');
            </script>";
        return false;
    };

    $ekstensiValid = ['jpg', 'jpeg', 'png'];
    $ekstensiGambar = explode('.', $gambar);
    $ekstensiGambar = strtolower(end($ekstensiGambar));

    if (in_array($ekstensiGambar, $ekstensiValid)) {
        $fileData = file_get_contents($tmp_name);
        $base64encoder = base64_encode($fileData);

        return $base64encoder;
    } else {
        echo "<script>
                alert('Ekstensi Gambar Tidak Valid');
            </script>";
        return false;
    }

    if ($size > 10000000) {
        echo "<script>
                alert('Ukuran Gambar Terlalu Besar')
            </script>";
        return false;
    }
}

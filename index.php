<?php
require 'function.php';

if (isset($_POST['submit'])) {
    if (tambah($_POST) > 0) {
        echo "<script>
            alert ('Data Gagal Ditambahkan!');
            document.location.href='index.php';
        </script>";
    } else {
        echo "<script>
            alert('Data Berhasil Ditambahkan!');
            document.location.href='index.php';
        </script>";
    }
}

$mahasiswa = query("SELECT * FROM mobil");


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>

    <form action="" method="post" enctype="multipart/form-data">
        <ul>
            <li>
                <label for="id_barang">Masukkan ID Mobil</label>
                <input type="text" name="id_barang" id="id_barang">
            </li>
            <li>
                <label for="brand">Masukkan Brand Mobil</label>
                <input type="text" name="brand" id="brand">
            </li>
            <li>
                <label for="type">Masukkan Type Mobil</label>
                <input type="text" name="type" id="type">
            </li>
            <li>
                <label for="harga">Masukkan Harga Mobil</label>
                <input type="text" name="harga" id="harga">
            </li>
            <li>
                <label for="image">Upload Gambar</label>
                <input type="file" name="image" id="image">
            </li>
            <li>
                <button type="submit" name="submit">Submit</button>
            </li>
        </ul>
    </form>

    <table border='1' cellpadding='10' cellspacing='10'>
        <tr>
            <th>ID</th>
            <th>Brand</th>
            <th>Type</th>
            <th>Price (USD)</th>
            <th>Gambar</th>
        </tr>
        <?php foreach ($mahasiswa as $data) : ?>
            <tr>
                <td><?= $data['id_mobil'] ?></td>
                <td><?= $data['brand'] ?></td>
                <td><?= $data['type'] ?></td>
                <td><?= $data['price'] ?></td>
                <td><img src="data:image/jpeg;base64,<?= htmlspecialchars($data['image']) ?>" alt="" style="width: 200px; height: auto;"></td>
            </tr>
        <?php endforeach; ?>
    </table>
</body>

</html>
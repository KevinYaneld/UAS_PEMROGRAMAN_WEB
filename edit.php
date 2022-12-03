<?php
include 'config.php';

$id = (int) $_GET['id'];

$sql = "SELECT * FROM produk INNER JOIN aplikasi ON produk.id_produk = aplikasi.id_produk WHERE produk.id_produk = '$id'";
$query = mysqli_query($koneksi, $sql);
$data = mysqli_fetch_array($query);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>EDIT DATA</title>
    <link rel="stylesheet" href="style-1.css">
</head>
<body>
<div class="center">
        <h1>Edit Data</h1>
        <form id="register" method="post" action = "" enctype="multipart/form-data">
            <input type = "hidden" name="id" value = "<?= $data['id_produk']?>">
            <div class="txt_field">
                <p>Tanggal Tambah Data : <?= date("d-m-Y") ?></p>
            </div>
            <div class="txt_field">
                <input type="text" name ="nama_developer" value = "<?= $data['nama_developer'] ?>">
                <span></span>
                <label for="nama_developer">Nama Developer</label>
            </div>
            <div class="txt_field">
                <input type="text" name ="kategori" value = "<?= $data['kategori'] ?>">
                <span></span>
                <label for="kategori">Kategori</label>
            </div>
            <div class="txt_field">
                <input type="text" name ="nama_aplikasi" value = "<?= $data['nama_aplikasi']?>">
                <span></span>
                <label for="nama_aplikasi">Nama Aplikasi</label>
            </div>
            <div class="txt_field">
                <input type="text" name ="harga" value = "<?= $data['harga']?>">
                <span></span>
                <label for="harga">Harga</label>
            </div>
            <div class="txt_field">
                <input type="file" name="gambar"><br><br>
                <span></span>
                <label for="">Upload Gambar Icon</label><br>
            </div>
        <input type="hidden" name="tanggal" value=<?= date("d-m-Y") ?>>
        <input type="submit" name = "simpan" value="Simpan" style = "margin-bottom:10px;">

        </form>
    </div>


    <?php
    if ($_POST){

        $nama = $_POST['nama_aplikasi'];
        $gambar = $_FILES['gambar']['name'];

        if($gambar != ""){
            $x = explode('.', $gambar);
            $ekstensi = strtolower(end($x));
            $tanggal = date('Y-m-d');
            $tmp = $_FILES['gambar']['tmp_name'];
            $gambar_baru = "$tanggal-$nama.$ekstensi";
        }

        $gambar_icon = "SELECT gambar_icon FROM aplikasi WHERE id_produk = '{$id}'";

        $data_gambar = mysqli_query($koneksi, $gambar_icon);
        $gambar_lama = mysqli_fetch_array($data_gambar);
        unlink("gambar_icon/".$gambar_lama['gambar_icon']); 

        move_uploaded_file($tmp,"gambar_icon/".$gambar_baru);

        $sql = "UPDATE produk SET nama_developer = '{$_POST['nama_developer']}',
        kategori = '{$_POST['kategori']}',harga = '{$_POST['harga']}' WHERE id_produk = '{$_POST['id']}'";

        $query = mysqli_query($koneksi, $sql);

        $sql = "UPDATE aplikasi SET nama_aplikasi = '{$_POST['nama_aplikasi']}', rilis = '$tanggal',
        gambar_icon ='$gambar_baru' WHERE id_produk = '{$_POST['id']}'";
        $query = mysqli_query($koneksi, $sql);

        if ($query) {
            echo "Data Berhasil Disimpan";
            header('Location: product.php');
        } else{
            echo "Data Gagal Disimpan".mysqli_error();
        }
    }
    ?>
</body>
</html>
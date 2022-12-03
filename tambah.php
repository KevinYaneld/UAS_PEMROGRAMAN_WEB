<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TAMBAH DATA</title>
    <link rel="stylesheet" href="style-1.css">
</head>
<body>
    <div class = "center">
        <h1>Tambah Data</h1>
        <form  method="post" action = "" enctype="multipart/form-data">
            <div class="txt_field">
                <p>Tanggal Tambah Data : <?= date("d-m-Y") ?></p>
            </div>
            
            <div class="txt_field">
                <input type="text" name ="nama_developer">
                <span></span>
                <label for="nama_developer">Nama Developer</label>
            </div>
            <div class="txt_field">
                <input type="text" name ="kategori">
                <span></span>
                <label for="kategori">Kategori</label>
            </div>
            <div class="txt_field">
                <input type="text" name ="nama_aplikasi">
                <span></span>
                <label for="nama_aplikasi">Nama Aplikasi</label>
            </div>
            <div class="txt_field">
                <input type="text" name ="harga">
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
    include 'config.php';
    if (isset($_POST['simpan'])) {
        $nama = $_POST['nama_aplikasi'];

        $gambar = $_FILES['gambar']['name'];

        $x = explode('.', $gambar);

        $ekstensi = strtolower(end($x));

        $tanggal = date('Y-m-d');

        $tmp = $_FILES['gambar']['tmp_name'];

        $gambar_baru = "$tanggal-$nama.$ekstensi";

        if(move_uploaded_file($tmp, 'gambar_icon/'.$gambar_baru)) { 
            $sql = "INSERT INTO produk (nama_developer, kategori, harga) VALUES ('{$_POST['nama_developer']}', '{$_POST['kategori']}', '{$_POST['harga']}')";
            $query = mysqli_query($koneksi, $sql);

            $sql = "SELECT max(id_produk) AS last_id FROM produk LIMIT 1";
            $query = mysqli_query($koneksi, $sql);

            $data = mysqli_fetch_array($query);
            $last_id = $data['last_id'];
            
            $sql = "INSERT INTO aplikasi (id_produk, nama_aplikasi, rilis, gambar_icon) VALUES ('$last_id', '{$_POST['nama_aplikasi']}', '{$_POST['tanggal']}','$gambar_baru')";
            $query = mysqli_query($koneksi, $sql);

            if ($query) {
                echo "Data Berhasil Disimpan";
                header('Location: product.php');
            } else{
                echo "Data Gagal Disimpan".mysqli_error();
            }
        }
}


?>
</body>
</html>
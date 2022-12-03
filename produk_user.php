<?php
    include 'config.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,200;0,300;0,400;0,500;0,700;1,700;1,800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
    <link rel="stylesheet" href="produk_user.css">
</head>
<body>
    
    <div class="bungkus">
        <header class="header">
            <div class="konten1">
                
                <div class="header2">  
                    <div class="header1">
                        <ul class="menu">
                            <li><a href="user.php">Kembali</a></li>
                        </ul>
                    </div>
                </div>
                <!-- batas -->
                <div class="konten3">
                    <h1 style = "margin-left : 43%; margin-bottom : 5%; margin-top : 5%">DAFTAR PRODUK</h1>
                    <form action="" method="get" style = "margin-left : 37%; margin-bottom : 5%;">
                        <label>Cari Nama Aplikasi :</label>
                        <input type="text" name="cari">
                        <input type="submit" value="Cari">
                    </form>
                <div class="barang">

                <?php
                    if(isset($_GET['cari'])){
                        $cari = $_GET['cari'];
                        $sql = "SELECT * FROM produk INNER JOIN aplikasi ON produk.id_produk = aplikasi.id_produk WHERE nama_aplikasi LIKE '%".$cari."%'";
                        $query = mysqli_query($koneksi, $sql);				
                    }else{
                        $sql = "SELECT * FROM produk INNER JOIN aplikasi ON produk.id_produk = aplikasi.id_produk";
                        $query = mysqli_query($koneksi, $sql);		
                    }
                    while ($data = mysqli_fetch_array($query)){
                        ?>
                    <div>
                        <div id="kamu">
                        <img src="gambar_icon/<?=$data['gambar_icon']?>" alt="" height="80%">
                        </div>
                        <p class="kamu1" style = "text-align : center;"><?php echo $data['nama_aplikasi'] ?></p>
                        <p class="kamu1" style = "text-align : center;"><?php echo $data['nama_developer'] ?></p>
                        <p class="kamu1" style = "text-align : center;"><?php echo $data['kategori'] ?></p>
                        <p class="kamu1" style = "text-align : center;">Rp.<?php echo $data['harga'] ?></p>
                        <p class="kamu1" style = "text-align : center;"><?php echo $data['rilis'] ?></p>
                    <?php
                    ?>
                    </div>
                    <?php
                    }
                    ?>
                </div>
                <!-- batas -->
            </div>
        </header>
    </div>
</body>

</html>

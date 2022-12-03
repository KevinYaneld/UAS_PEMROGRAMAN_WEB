<?php
include 'config.php';

$id = (int) $_GET['id'];

if($id){
    $gambar_icon = "SELECT gambar_icon FROM aplikasi WHERE id_produk = '{$id}'";

    $data_gambar = mysqli_query($koneksi, $gambar_icon);
    $gambar = mysqli_fetch_array($data_gambar);
    unlink("gambar_icon/".$gambar['gambar_icon']); 
     
    
    $sql = "DELETE FROM aplikasi WHERE id_produk ='{$id}'";
    $query = mysqli_query($koneksi, $sql);

    $sql = "DELETE FROM produk WHERE id_produk ='{$id}'";
    $query = mysqli_query($koneksi, $sql);

    
}
header('Location: product.php');
exit;
?>

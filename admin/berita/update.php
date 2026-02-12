<?php
include_once '../../koneksi.php';

try{

$db = new Database();
$conn = $db->getConnection();

$id    = $_POST['id'];
$judul = $_POST['judul'];
$isi   = $_POST['isi'];

$sql = "UPDATE berita 
        SET judul=:judul, isi=:isi
        WHERE id=:id";

$stmt = $conn->prepare($sql);
$stmt->execute([
    ':judul'=>$judul,
    ':isi'=>$isi,
    ':id'=>$id
]);

header("Location: ../../index.php?page=tampil_berita&status=updated");
exit;

}catch(PDOException $e){
    echo $e->getMessage();
}
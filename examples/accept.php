<?php

session_start();

$koneksi = mysqli_connect("localhost","root","","test");

$id = $_POST['id'];
var_dump($id);
$sql = mysqli_query($koneksi,"update `table` set status = 'approved' WHERE id = '$id'");


// if(isset($_POST['id'])!=''){
//     $id = $_POST['id'];
//     $sql = $koneksi->query("update `table` set status = 'approved' WHERE id = '$id'");
//     mysqli_close($koneksi);
// }

header("location:tables.php");

?>
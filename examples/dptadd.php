 <?php
 $conn = mysqli_connect("localhost","root","","test");

 $departemen = $_POST['departemen'];

 $query="INSERT INTO departemen (departemen) VALUE ('$departemen')";

 $hasil=mysqli_query($conn, $query);

 if($hasil){
     echo "<script>alert('Departemen Berhasil ditambah!')
    window.location.href='departemen.php'</script>";
 }
?>
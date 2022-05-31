<?php 
$conn = mysqli_connect("localhost","root","","test");
$query="SELECT * FROM users";
$hasil = mysqli_query($conn,$query);
?>
</br>
</br>
<table border="1">
  <tr>
    <th>Nama</th>
    <th>Departemen</th>
    <th>Hak</th>
  </tr>
    <?php while($data=mysqli_fetch_array($hasil)){ ?>
  <tr>
    <th><?php echo $data['name']; ?></th>
    <th style="text-align:center;"><?php echo $data['departemen']; ?></th>
    <th><?php echo $data['rank']; ?></th>
  </tr>
<?php } ?>

</table>
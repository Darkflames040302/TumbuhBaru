<!DOCTYPE html>
<html>
<head>
	<title>CETAK LAPORAN CUTI</title>
</head>
<body>

	<center>

		<h2>DATA LAPORAN CUTI</h2>
	</center>

	<?php 
	    $koneksi = mysqli_connect("localhost","root","","test");
	?>
    <table border="1" class="table align-items-center table-flush">
        <thead class="thead-light">
          <tr>
            <th scope="col" class="sort" data-sort="no" width="1%">No</th>
            <th scope="col" class="sort" data-sort="name">Nama lengkap</th>
            <th scope="col" class="sort" data-sort="budget">Keterangan</th>
            <th scope="col">Tanggal Cuti</th>
            <th scope="col" class="sort" data-sort="completion">Lama cuti</th>
            <th scope="col" class="sort" data-sort="status">Status</th>
          </tr>
        </thead>
        <tbody class="list">
          <?php
            $no = 1;
            $sql = mysqli_query($koneksi,"SELECT users.name,t.id , t.description, t.status, t.tanggal_cuti , t.lama_cuti , t.userId FROM `table` t JOIN users ON users.userId = t.userId");
            while($tabel = mysqli_fetch_array($sql)){
          ?>
            <th scope="row">
              <tr>
                <td><?php echo $no++; ?></td>
                <td><?php echo $tabel['name']; ?></td>
                <td><?php echo $tabel['description']; ?></td>
                <td><?php echo $tabel['tanggal_cuti']; ?></td>
                <td><?php echo $tabel['lama_cuti']; ?></td>
                <td><?php echo $tabel['status']; ?></td>
              </tr>
          <?php
          }
          ?>
        </tbody>
    <script>
		window.print();
	</script>

</body>
</html>
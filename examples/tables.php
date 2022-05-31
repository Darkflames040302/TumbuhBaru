<!--
=========================================================
* Argon Dashboard - v1.2.0
=========================================================
* Product Page: https://www.creative-tim.com/product/argon-dashboard


* Copyright  Creative Tim (http://www.creative-tim.com)
* Coded by www.creative-tim.com



=========================================================
* The above copyright notice and this permission notice shall be included in all copies or substantial portions of the Software.
-->
<?php

session_start();

include "access.php";

$DB = NEW PDO("mysql:host=localhost;dbname=test","root","");
  if (!$DB){
    die("could not connect to the database!");
  }



  if($_SERVER['REQUEST_METHOD'] == "POST"){
    $arr['description'] = $_POST['description'];
    $arr['tanggal_Cuti'] = $_POST['tanggal_Cuti'];
    $arr['lama_Cuti'] = $_POST['lama_Cuti'];
    $arr['userId'] = $_POST['userId'];
    $arr['status'] = $_POST['status'];
    
    $query = "insert into `table` (description,tanggal_Cuti,lama_Cuti,userId,status) values(:description,:tanggal_Cuti,:lama_Cuti,:userId,:status)";
    $stm = $DB->prepare($query);
    if($stm){
      $check = $stm->execute($arr);
      if(!$check){
        $error = "could not save to database";
      }
      if($error == ""){
        header("location: tables.php");
        die;
      }
    }
  }

?>
<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="Start your development with a Dashboard for Bootstrap 4.">
  <meta name="author" content="Creative Tim">
  <title>PaidLeaveCheck - Tumbuh Baru</title>
  <!-- Favicon -->
  <link rel="icon" href="../assets/img/brand/favicon.png" type="image/png">
  <!-- Fonts -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700">
  <!-- Icons -->
  <link rel="stylesheet" href="../assets/vendor/nucleo/css/nucleo.css" type="text/css">
  <link rel="stylesheet" href="../assets/vendor/@fortawesome/fontawesome-free/css/all.min.css" type="text/css">
  <!-- Argon CSS -->
  <link rel="stylesheet" href="../assets/css/argon.css?v=1.2.0" type="text/css">
</head>

<body>
  <!-- Sidenav -->
  <nav class="sidenav navbar navbar-vertical  fixed-left  navbar-expand-xs navbar-light bg-white" id="sidenav-main">
    <div class="scrollbar-inner">
      <!-- Brand -->
      <div class="sidenav-header  align-items-center">
        <a class="navbar-brand" href="javascript:void(0)">
          <img src="../assets/img/brand/tumbuhbaru.png" class="navbar-brand-img" alt="...">
        </a>
      </div>
      <div class="navbar-inner">
        <!-- Collapse -->
        <div class="collapse navbar-collapse" id="sidenav-collapse-main">
          <!-- Nav items -->
          <ul class="navbar-nav">
            <li class="nav-item">
              <a class="nav-link" href="dashboard.php">
                <i class="ni ni-tv-2 text-primary"></i>
                <span class="nav-link-text">Dashboard</span>
              </a>
            </li>
            <?php
            if(access('PEMIMPIN', false)):
            ?>
            <li class="nav-item">
              <a class="nav-link" href="profile.php">
                <i class="ni ni-single-02 text-yellow"></i>
                <span class="nav-link-text">Add User</span>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="departemen.php">
                <i class="ni ni-circle-08 text-pink"></i>
                <span class="nav-link-text">Departemen</span>
              </a>
            </li>
            <?PHP endif;?>
            <li class="nav-item">
              <a class="nav-link active" href="tables.php">
                <i class="ni ni-bullet-list-67 text-default"></i>
                <span class="nav-link-text">Cuti</span>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="logout.php">
                <i class="ni ni-key-25 text-info"></i>
                <span class="nav-link-text">Logout</span>
              </a>
            </li>
          </ul>
          <!-- Divider -->
          <hr class="my-3">
        </div>
      </div>
    </div>
  </nav>
  <!-- Main content -->
  <div class="main-content" id="panel">
    <!-- Topnav -->
    <nav class="navbar navbar-top navbar-expand navbar-dark bg-primary border-bottom">
      <div class="container-fluid">
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <!-- Navbar links -->
          <ul class="navbar-nav align-items-center  ml-md-auto ">
            <li class="nav-item d-xl-none">
              <!-- Sidenav toggler -->
              <div class="pr-3 sidenav-toggler sidenav-toggler-dark" data-action="sidenav-pin" data-target="#sidenav-main">
                <div class="sidenav-toggler-inner">
                  <i class="sidenav-toggler-line"></i>
                  <i class="sidenav-toggler-line"></i>
                  <i class="sidenav-toggler-line"></i>
                </div>
              </div>
            </li>
            <li class="nav-item d-sm-none">
              <a class="nav-link" href="#" data-action="search-show" data-target="#navbar-search-main">
                <i class="ni ni-zoom-split-in"></i>
              </a>
            </li>
          </ul>
          <ul class="navbar-nav align-items-center  ml-auto ml-md-0 ">
            <li class="nav-item dropdown">
              <a class="nav-link pr-0" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <div class="media align-items-center">
                  <span class="avatar avatar-sm rounded-circle">
                    <img alt="Image placeholder" src="../assets/img/theme/blank.png">
                  </span>
                  <div class="media-body  ml-2  d-none d-lg-block">
                    <span class="mb-0 text-sm  font-weight-bold">
                    <?php
                        if(isset($_SESSION['name'])){
                          echo $_SESSION['name'];
                        }
                      ?>
                    </span>
                  </div>
                </div>
              </a>
              <div class="dropdown-menu  dropdown-menu-right ">
                <div class="dropdown-header noti-title">
                  <h6 class="text-overflow m-0">Welcome!</h6>
                </div>
                <a href="#!" class="dropdown-item">
                  <i class="ni ni-single-02"></i>
                  <span>My profile</span>
                </a>
                <a href="#!" class="dropdown-item">
                  <i class="ni ni-settings-gear-65"></i>
                  <span>Settings</span>
                </a>
                <a href="#!" class="dropdown-item">
                  <i class="ni ni-calendar-grid-58"></i>
                  <span>Activity</span>
                </a>
                <a href="#!" class="dropdown-item">
                  <i class="ni ni-support-16"></i>
                  <span>Support</span>
                </a>
                <div class="dropdown-divider"></div>
                <a href="#!" class="dropdown-item">
                  <i class="ni ni-user-run"></i>
                  <span>Logout</span>
                </a>
              </div>
            </li>
          </ul>
        </div>
      </div>
    </nav>
    <!-- Header -->
    <div class="header bg-primary pb-6">
      <div class="container-fluid">
        <div class="header-body">
          <div class="row align-items-center py-4">
            <div class="col-lg-6 col-7">
              <h6 class="h2 text-white d-inline-block mb-0">Tables</h6>
              <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
                <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
                  <li class="breadcrumb-item"><a href="#"><i class="fas fa-home"></i></a></li>
                  <li class="breadcrumb-item"><a href="#">Tables</a></li>
                  <li class="breadcrumb-item active" aria-current="page">Tables</li>
                </ol>
              </nav>
            </div>
            <div class="col-lg-6 col-5 text-right">
              <!-- <a href="#" class="btn btn-sm btn-neutral">New</a>
              <a href="#" class="btn btn-sm btn-neutral">Filters</a> -->
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- Page content -->
    <div class="container-fluid mt--6">
      <div class="row">
        <div class="col">
          <div class="card">
            <!-- Card header -->
            <div class="card-header border-0">
              <h3 class="mb-0">Pengajuan Cuti</h3>
            </div>
            <div class="card-body">
              <form method="POST">
                <h6 class="heading-small text-muted mb-4">Form</h6>
                <div class="pl-lg-4">
                  <div class="row">
                    <div class="col-lg-6">
                      <div class="form-group">
                        <label class="form-control-label" for="input-username">Nama</label>
                        <span class="form-control"><?php if(isset($_SESSION['name'])){echo $_SESSION['name'];}?></span>
                        <input type="hidden" class="form-control" value="<?php if(isset($_SESSION['userId'])){echo $_SESSION['userId'];}?>" name="userId" >
                      </div>
                    </div>
                    <div class="col-lg-6">
                      <div class="form-group">
                        <label class="form-control-label" for="input-email">keterangan</label>
                        <input type="text" class="form-control" placeholder="keterangan" name="description" required>
                      </div>
                    </div>
                    <div class="col-lg-6">
                      <div class="form-group">
                        <label class="form-control-label" for="input-last-name">tanggal cuti</label>
                        <input type="date" class="form-control" placeholder="tanggal cuti" name="tanggal_Cuti" required>
                      </div>
                    </div>
                    <div class="col-lg-6">
                      <div class="form-group">
                        <label class="form-control-label" for="input-last-name">lama cuti</label>
                        <input type="text" class="form-control" placeholder="lama cuti" name="lama_Cuti" required>
                        <input type="hidden" class="form-control" value="pending" name="status">
                      </div>
                    </div>
                  </div>
                </div>
                <div>
                  <input type="submit" class="btn btn-sm btn-primary" value="add"><br>
                </div>
              </form>
            </div>
            <!-- Light table -->
            <div class="table-responsive">
              <table class="table align-items-center table-flush">
                <thead class="thead-light">
                  <tr>
                    <th scope="col" class="sort" data-sort="userId">userid</th>
                    <th scope="col" class="sort" data-sort="name">Nama lengkap</th>
                    <th scope="col" class="sort" data-sort="budget">Keterangan</th>
                    <th scope="col">Tanggal Cuti</th>
                    <th scope="col" class="sort" data-sort="completion">Lama cuti</th>
                    <th scope="col" class="sort" data-sort="status">Status</th>
                    <th scope="col" class="sort"></th>
                  </tr>
                </thead>
                <tbody class="list">
                  <?php
                  $koneksi = mysqli_connect("localhost","root","","test");
                  $users_id=$_SESSION['userId'];
                  
                  if(access('PEMIMPIN', false)){
                    $dataa = mysqli_query($koneksi, "SELECT users.name,t.id , t.description, t.status, t.tanggal_cuti , t.lama_cuti , t.userId FROM `table` t JOIN users ON users.userId = t.userId");
                  }else{
                    $dataa = mysqli_query($koneksi, "SELECT users.name,t.id , t.description, t.status, t.tanggal_cuti , t.lama_cuti , t.userId FROM `table` t JOIN users ON users.userId = t.userId WHERE t.userid='$users_id'");
                  }
                  while($tabel = mysqli_fetch_array($dataa)){
                  ?>
                    <th scope="row">
                      <tr>
                        <td><?php echo $tabel['userId']; ?></td>
                        <td><?php echo $tabel['name']; ?></td>
                        <td><?php echo $tabel['description']; ?></td>
                        <td><?php echo $tabel['tanggal_cuti']; ?></td>
                        <td><?php echo $tabel['lama_cuti']; ?></td>
                        <td><?php echo $tabel['status'];?></td>
                        <?php
                          if(access('PEMIMPIN', false)):
                        ?>
                        <td class="text-right">
                          <div class="dropdown">
                            <a class="btn btn-sm btn-icon-only text-light" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                              <i class="fas fa-ellipsis-v"></i>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
                              <form class="dropdown-item" method="post" action="accept.php">
                                <input type="hidden" name="id" value="<?php echo $tabel['id']; ?>"/>
                                <input class="btn btn-link" type="submit" name="someAction" value="Accept" />
                              </form>
                              <form class="dropdown-item" action="deny.php" method="post">
                                <input type="hidden" name="id" value="<?php echo $tabel['id']; ?>"/>
                                <input class="btn btn-link" type="submit" name="someAction" value="Reject" />
                              </form>
                              <!-- <a class="dropdown-item" href="#">Accept</a>
                              <a class="dropdown-item" href="#">Reject</a> -->
                            </div>
                          </div>
                        </td>
                        <?PHP endif;?>
                      </tr>

                  <?php
                  }
                  ?>
                </tbody>
              </table>
              <?php if(access('PEMIMPIN', false)):?>
              <div>
                <a href="cetak.php" class="btn btn-sm btn-primary" target="_blank">Print Report</a>
              </div>
              <?php endif;?>
            </div>
          </div>
        </div>
      </div>
      
      <!-- Footer -->
      <footer class="footer pt-0">
        <div class="row align-items-center justify-content-lg-between">
          <div class="col-lg-6">
            <div class="copyright text-center  text-lg-left  text-muted">
              &copy; 2020 <a class="font-weight-bold ml-1" target="_blank">kelompok 4</a>
            </div>
          </div>
          <div class="col-lg-6">
            <ul class="nav nav-footer justify-content-center justify-content-lg-end">
              <li class="nav-item">
              </li>
            </ul>
          </div>
        </div>
      </footer>
    </div>
  </div>
  <!-- Argon Scripts -->
  <!-- Core -->
  <script src="../assets/vendor/jquery/dist/jquery.min.js"></script>
  <script src="../assets/vendor/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
  <script src="../assets/vendor/js-cookie/js.cookie.js"></script>
  <script src="../assets/vendor/jquery.scrollbar/jquery.scrollbar.min.js"></script>
  <script src="../assets/vendor/jquery-scroll-lock/dist/jquery-scrollLock.min.js"></script>
  <!-- Argon JS -->
  <script src="../assets/js/argon.js?v=1.2.0"></script>
</body>

</html>
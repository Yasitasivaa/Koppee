<?php

require_once './connection.php';
global $conn;

// Fungsi untuk nambah menu
if(isset($_POST['create_menu'])){
    $menu_name = $_POST['menu'];
    $menu_price = $_POST['price'];

    $query = "INSERT INTO menu (name, price) VALUES ('$menu_name', '$menu_price')";
    $result = mysqli_query($conn, $query);

    if (!$result) {
        die("Query error: " . mysqli_error($conn));
    }else{
        header('Location: ./admin.php');
    }
}

// Fungsi untuk edit menu
if(isset($_POST['update_menu'])){
    $menu_id = $_POST['update_menu_id'];
    $menu_name = $_POST['update_menu_name'];
    $menu_price = $_POST['update_menu_price'];

    $query = "UPDATE menu SET
                        name = '$menu_name',
                        price = '$menu_price'
                    WHERE id = '$menu_id'";
    $result = mysqli_query($conn, $query);

    if (!$result) {
        die("Query error: " . mysqli_error($conn));
    }else{
        header('Location: ./admin.php');
    }
}

// Fungsi untuk delete menu
if(isset($_POST['delete_menu'])){
    $menu_id = $_POST['delete_menu_id'];

    $query = "DELETE FROM menu WHERE id = '$menu_id'";
    $result = mysqli_query($conn, $query);

    if (!$result) {
        die("Query error: " . mysqli_error($conn));
    }else{
        header('Location: ./admin.php');
    }
}

// Fungsi untuk nambah reservasi
if(isset($_POST['create_reservation'])){
    $reservation_name = $_POST['create_reservation_name'];
    $reservation_email = $_POST['create_reservation_email'];
    $reservation_date = $_POST['create_reservation_date'];
    $reservation_person = $_POST['create_reservation_person'];

    $query = "INSERT INTO reservation (name, email, reservation_date, total_person)
              VALUES ('$reservation_name', '$reservation_email', '$reservation_date', '$reservation_person')";
    $result = mysqli_query($conn, $query);

    if (!$result) {
        die("Query error: " . mysqli_error($conn));
    }else{
        header('Location: ./admin.php');
    }
}

// Fungsi untuk edit reservasi
if(isset($_POST['update_reservation'])){
    $reservation_id = $_POST['update_reservation_id'];
    $reservation_name = $_POST['update_reservation_name'];
    $reservation_email = $_POST['update_reservation_email'];
    $reservation_date = $_POST['update_reservation_date'];
    $reservation_person = $_POST['update_reservation_person'];

    $query = "UPDATE reservation SET
                        name = '$reservation_name',
                        email = '$reservation_email',
                        reservation_date = '$reservation_date',
                        total_person = '$reservation_person'
                    WHERE id = '$reservation_id'";
    $result = mysqli_query($conn, $query);

    if (!$result) {
        die("Query error: " . mysqli_error($conn));
    }else{
        header('Location: ./admin.php');
    }
}

// Fungsi untuk delete reservasi
if(isset($_POST['delete_reservation'])){
    $reservation_id = $_POST['delete_reservation_id'];

    $query = "DELETE FROM reservation WHERE id = '$reservation_id'";
    $result = mysqli_query($conn, $query);

    if (!$result) {
        die("Query error: " . mysqli_error($conn));
    }else{
        header('Location: ./admin.php');
    }
}

// Fungsi untuk ambil data menu
$query_menu = "SELECT * FROM menu";
$menus = mysqli_query($conn, $query_menu);

// Fungsi untuk ambil data reservasi
$query_reservation = "SELECT * FROM reservation";
$reservations = mysqli_query($conn, $query_reservation);

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>KOPPEE - Coffee Shop</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="Free Website Template" name="keywords">
    <meta content="Free Website Template" name="description">

    <!-- Favicon -->
    <link href="img/favicon.ico" rel="icon">

    <!-- Google Font -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@200;400&family=Roboto:wght@400;500;700&display=swap" rel="stylesheet">

    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
    <link href="lib/tempusdominus/css/tempusdominus-bootstrap-4.min.css" rel="stylesheet" />

    <!-- Customized Bootstrap Stylesheet -->
    <link href="css/style.min.css" rel="stylesheet">
</head>

<body>
    <!-- Navbar Start -->
    <div class="container-fluid p-0 nav-bar">
        <nav class="navbar navbar-expand-lg bg-none navbar-dark py-3">
            <a href="index.html" class="navbar-brand px-lg-4 m-0">
                <h1 class="m-0 display-4 text-uppercase text-white">KOPPEE</h1>
            </a>
            <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse justify-content-between" id="navbarCollapse">
                <div class="navbar-nav ml-auto p-4">
                    <a href="index.html" class="nav-item nav-link active">Beranda</a>
                    <a href="about.html" class="nav-item nav-link">Tentang Kami</a>
                    <a href="service.html" class="nav-item nav-link">Service</a>
                    <a href="menu.html" class="nav-item nav-link">Menu</a>
                    <div class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">Pages</a>
                        <div class="dropdown-menu text-capitalize">
                            <a href="reservation.html" class="dropdown-item">Reservasi</a>
                            <a href="testimonial.html" class="dropdown-item">Testimoni</a>
                        </div>
                    </div>
                    <a href="contact.html" class="nav-item nav-link">Kontak Kami</a>
                </div>
            </div>
        </nav>
    </div>
    <!-- Navbar End -->

    <!-- Carousel Start -->
    <div class="container-fluid p-0 mb-5">
        <img class="w-100" src="img/carousel-1.jpg" alt="Image">
        <div class="carousel-caption d-flex flex-column align-items-center justify-content-center">
            <h2 class="text-primary font-weight-medium m-0">Selamat Datang di Tampilan</h2>
            <h1 class="display-1 text-white m-0">ADMIN</h1>
            <h2 class="text-white m-0">* KOPPEE *</h2>
        </div>
    </div>
    <!-- Carousel End -->

    <!-- Tabel Menu Start -->
    <div class="container-fluid py-5">
        <div class="row mb-3">
            <div class="col-6">
                <h3>Tabel Menu</h3>
            </div>
            <div class="col-6 text-right">
                <!-- Button trigger modal -->
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
                    Tambah Menu
                </button>

                <!-- Modal -->
                <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <form method="post" action="">
                            <div class="modal-content">
                                <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Tambah Menu KOPPEE</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                                </div>
                                <div class="modal-body text-left">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Nama Menu</label>
                                        <input type="text" name="menu" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputPassword1">Harga Menu</label>
                                        <input type="number" name="price" min="0" class="form-control" id="exampleInputPassword1">
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                    <button type="submit" name="create_menu" class="btn btn-primary">Save changes</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <table class="table">
            <thead class="thead-dark">
              <tr>
                <th scope="col">Menu ID</th>
                <th scope="col">Nama Menu</th>
                <th scope="col">Harga Menu</th>
                <th scope="col">Aksi</th>
              </tr>
            </thead>
            <tbody>
                <?php foreach ($menus as $menu) { ?>
                    <tr>
                        <th scope="row"><?php echo $menu['id']; ?></th>
                        <td><?php echo $menu['name']; ?></td>
                        <td><?php echo $menu['price']; ?></td>
                        <td>
                            <div class="row">
                                <div class="col-6 col-md-4 col-lg-3 col-xl-2">
                                    <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#editMenu<?php echo $menu['id']; ?>">
                                        Edit Data
                                    </button>
                                    <div class="modal fade" id="editMenu<?php echo $menu['id']; ?>" tabindex="-1" aria-labelledby="editMenuLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <form method="post" action="">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel">Edit Menu KOPPEE</h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                    </div>
                                                    <div class="modal-body text-left">
                                                        <div class="form-group">
                                                            <label for="exampleInputEmail1">Nama Menu</label>
                                                            <input type="text" name="update_menu_name" value="<?php echo $menu['name']; ?>" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                                                            <input type="text" name="update_menu_id" value="<?php echo $menu['id']; ?>" class="form-control d-none" id="exampleInputEmail1" aria-describedby="emailHelp">
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="exampleInputPassword1">Harga Menu</label>
                                                            <input type="number" name="update_menu_price" value="<?php echo $menu['price']; ?>" min="0" class="form-control" id="exampleInputPassword1">
                                                        </div>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                        <button type="submit" name="update_menu" class="btn btn-primary">Save changes</button>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-6 col-md-4 col-lg-3 col-xl-2">
                                    <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#deleteMenu<?php echo $menu['id']; ?>">
                                        Delete
                                    </button>
                                    <div class="modal fade" id="deleteMenu<?php echo $menu['id']; ?>" tabindex="-1" aria-labelledby="editMenuLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <form method="post" action="">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel">Delete Menu KOPPEE</h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                    </div>
                                                    <div class="modal-body text-left">
                                                        <div class="form-group">
                                                            <h5>Apakah Anda Yakin Ingin Menghapus Menu?</h5>
                                                            <input type="number" value="<?php echo $menu['id']; ?>" class="d-none" name="delete_menu_id">
                                                        </div>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                        <button type="submit" name="delete_menu" class="btn btn-primary">Save changes</button>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
    <!-- Tabel Menu End -->


    <!-- Tabel Reservasi Start -->
    <div class="container-fluid py-5">
        <div class="row mb-3">
            <div class="col-6"><h3>Tabel Reservasi</h3></div>
            <div class="col-6 text-right">
                <!-- Button trigger modal -->
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalReservation">
                    Tambah Reservasi
                </button>

                <!-- Modal -->
                <div class="modal fade" id="exampleModalReservation" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <form method="post" action="">
                            <div class="modal-content">
                                <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Tambah Reservasi KOPPEE</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                                </div>
                                <div class="modal-body text-left">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Nama Pelanggan</label>
                                        <input type="text" name="create_reservation_name" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Email Pelanggan</label>
                                        <input type="text" name="create_reservation_email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputPassword1">Waktu Reservasi</label>
                                        <input type="datetime-local" name="create_reservation_date" min="0" class="form-control" id="exampleInputPassword1">
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputPassword1">Total Orang</label>
                                        <input type="number" name="create_reservation_person" min="0" class="form-control" id="exampleInputPassword1">
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                    <button type="submit" name="create_reservation" class="btn btn-primary">Save changes</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <table class="table">
            <thead class="thead-dark">
              <tr>
                <th scope="col">Reservasi ID</th>
                <th scope="col">Email</th>
                <th scope="col">Nama</th>
                <th scope="col">Tanggal</th>
                <th scope="col">Jumlah Orang</th>
                <th scope="col">Aksi</th>
              </tr>
            </thead>
            <tbody>
            <?php foreach ($reservations as $reservation) { ?>
                <tr>
                  <th scope="row"><?php echo $reservation['id']; ?></th>
                  <td><?php echo $reservation['email']; ?></td>
                  <td><?php echo $reservation['name']; ?></td>
                  <td><?php echo $reservation['reservation_date']; ?></td>
                  <td><?php echo $reservation['total_person']; ?></td>
                  <td>
                      <div class="row">
                          <div class="col-6 col-md-4 col-lg-3 col-xl-2">
                              <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#editReservasi<?php echo $reservation['id']; ?>">
                                  Edit Data
                              </button>
                              <div class="modal fade" id="editReservasi<?php echo $reservation['id']; ?>" tabindex="-1" aria-labelledby="editMenuLabel" aria-hidden="true">
                                  <div class="modal-dialog">
                                      <form method="post" action="">
                                          <div class="modal-content">
                                              <div class="modal-header">
                                              <h5 class="modal-title" id="exampleModalLabel">Edit Reservasi KOPPEE</h5>
                                              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                  <span aria-hidden="true">&times;</span>
                                              </button>
                                              </div>
                                              <div class="modal-body text-left">
                                                  <div class="form-group">
                                                      <label for="exampleInputEmail1">Nama Pelanggan</label>
                                                      <input type="text" value="<?php echo $reservation['name']; ?>" name="update_reservation_name" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                                                      <input type="text" name="update_reservation_id" value="<?php echo $reservation['id']; ?>" class="form-control d-none" id="exampleInputEmail1" aria-describedby="emailHelp">
                                                  </div>
                                                  <div class="form-group">
                                                      <label for="exampleInputEmail1">Email Pelanggan</label>
                                                      <input type="text" value="<?php echo $reservation['email']; ?>" name="update_reservation_email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                                                  </div>
                                                  <div class="form-group">
                                                      <label for="exampleInputPassword1">Waktu Reservasi</label>
                                                      <input type="datetime-local" value="<?php echo $reservation['reservation_date']; ?>" name="update_reservation_date" min="0" class="form-control" id="exampleInputPassword1">
                                                  </div>
                                                  <div class="form-group">
                                                      <label for="exampleInputPassword1">Total Orang</label>
                                                      <input type="number" value="<?php echo $reservation['total_person']; ?>" name="update_reservation_person" min="0" class="form-control" id="exampleInputPassword1">
                                                  </div>
                                              </div>
                                              <div class="modal-footer">
                                                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                  <button type="submit" name="update_reservation" class="btn btn-primary">Save changes</button>
                                              </div>
                                          </div>
                                      </form>
                                  </div>
                              </div>
                          </div>
                          <div class="col-6 col-md-4 col-lg-3 col-xl-2">
                              <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#deleteReservasi<?php echo $reservation['id']; ?>">
                                  Delete
                              </button>
                              <div class="modal fade" id="deleteReservasi<?php echo $reservation['id']; ?>" tabindex="-1" aria-labelledby="editMenuLabel" aria-hidden="true">
                                  <div class="modal-dialog">
                                      <form method="post" action="">
                                          <div class="modal-content">
                                              <div class="modal-header">
                                              <h5 class="modal-title" id="exampleModalLabel">Delete Reservasi KOPPEE</h5>
                                              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                  <span aria-hidden="true">&times;</span>
                                              </button>
                                              </div>
                                              <div class="modal-body text-left">
                                                  <div class="form-group">
                                                      <h5>Apakah Anda Yakin Ingin Menghapus Reservasi?</h5>
                                                      <input type="text" name="delete_reservation_id" value="<?php echo $reservation['id']; ?>" class="form-control d-none" id="exampleInputEmail1" aria-describedby="emailHelp">
                                                  </div>
                                              </div>
                                              <div class="modal-footer">
                                                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                  <button type="submit" name="delete_reservation" class="btn btn-primary">Save changes</button>
                                              </div>
                                          </div>
                                      </form>
                                  </div>
                              </div>
                          </div>
                      </div>
                  </td>
                </tr>
            <?php } ?>
            </tbody>
        </table>
    </div>
    <!-- Tabel Reservasi End -->


    <!-- Footer Start -->
    <div class="container-fluid footer text-white mt-5 pt-5 px-0 position-relative overlay-top">
        <div class="row mx-0 pt-5 px-sm-3 px-lg-5 mt-4">
            <div class="col-lg-3 col-md-6 mb-5">
                <h4 class="text-white text-uppercase mb-4" style="letter-spacing: 3px;">Our Location</h4>
                <p><i class="fa fa-map-marker-alt mr-2"></i>Jalan Hayam Wuruk, No 23, Kecamatan Gubeng, Kota Surabaya</p>
                <p><i class="fa fa-phone-alt mr-2"></i>+6285415892830</p>
                <p class="m-0"><i class="fa fa-envelope mr-2"></i>cs@koppee.com</p>
            </div>
            <div class="col-lg-3 col-md-6 mb-5">
                <h4 class="text-white text-uppercase mb-4" style="letter-spacing: 3px;">Follow Us</h4>
                <p>Jangan lewatkan momen-momen menarik! Segera ikuti kami untuk informasi terbaru.</p>
                <div class="d-flex justify-content-start">
                    <a class="btn btn-lg btn-outline-light btn-lg-square mr-2" href="#"><i class="fab fa-twitter"></i></a>
                    <a class="btn btn-lg btn-outline-light btn-lg-square mr-2" href="#"><i class="fab fa-facebook-f"></i></a>
                    <a class="btn btn-lg btn-outline-light btn-lg-square mr-2" href="#"><i class="fab fa-linkedin-in"></i></a>
                    <a class="btn btn-lg btn-outline-light btn-lg-square" href="#"><i class="fab fa-instagram"></i></a>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 mb-5">
                <h4 class="text-white text-uppercase mb-4" style="letter-spacing: 3px;">Open Hours</h4>
                <div>
                    <h6 class="text-white text-uppercase">Senin - Jumat</h6>
                    <p>09.00 - 23.00 WIB</p>
                    <h6 class="text-white text-uppercase">Sabtu - Minggu</h6>
                    <p>10.00 - 04.00 WIB</p>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 mb-5">
                <h4 class="text-white text-uppercase mb-4" style="letter-spacing: 3px;">Newsletter</h4>
                <p>Nikmati konten-konten terbaik secara langsung di kotak masuk Anda.</p>
                <div class="w-100">
                    <div class="input-group">
                        <input type="text" class="form-control border-light" style="padding: 25px;" placeholder="Your Email">
                        <div class="input-group-append">
                            <button class="btn btn-primary font-weight-bold px-3">Sign Up</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="container-fluid text-center text-white border-top mt-4 py-4 px-sm-3 px-md-5" style="border-color: rgba(256, 256, 256, .1) !important;">
            <p class="mb-2 text-white">Copyright &copy; <a class="font-weight-bold" href="#">Domain</a>. All Rights Reserved.</a></p>
            <p class="m-0 text-white">Designed by <a class="font-weight-bold" href="https://htmlcodex.com">HTML Codex</a></p>
        </div>
    </div>
    <!-- Footer End -->


    <!-- Back to Top -->
    <a href="#" class="btn btn-lg btn-primary btn-lg-square back-to-top"><i class="fa fa-angle-double-up"></i></a>


    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js"></script>
    <script src="lib/easing/easing.min.js"></script>
    <script src="lib/waypoints/waypoints.min.js"></script>
    <script src="lib/owlcarousel/owl.carousel.min.js"></script>
    <script src="lib/tempusdominus/js/moment.min.js"></script>
    <script src="lib/tempusdominus/js/moment-timezone.min.js"></script>
    <script src="lib/tempusdominus/js/tempusdominus-bootstrap-4.min.js"></script>

    <!-- Contact Javascript File -->
    <script src="mail/jqBootstrapValidation.min.js"></script>
    <script src="mail/contact.js"></script>

    <!-- Template Javascript -->
    <script src="js/main.js"></script>
</body>

</html>
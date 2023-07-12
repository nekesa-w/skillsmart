<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <title>Skillsmart</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport" />
    <meta content="Free HTML Templates" name="keywords" />
    <meta content="Free HTML Templates" name="description" />

    <!-- Favicon -->
    <link href="img/favicon.ico" rel="icon" />

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Belanosima&family=Figtree&display=swap" rel="stylesheet">

    <!-- Font Awesome -->
    <script src="https://kit.fontawesome.com/0e4ad45b15.js" crossorigin="anonymous"></script>

    <!-- Libraries Stylesheet -->
    <link href="main/lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet" />
    <link href="main/lib/lightbox/main/css/lightbox.min.css" rel="stylesheet" />

    <!-- Customized Bootstrap Stylesheet -->
    <link href="main/css/style.css" rel="stylesheet" />
</head>

<body>
    <!-- Navbar Start -->
    <div class="container-fluid bg-light position-relative shadow">
        <nav class="navbar navbar-expand-lg bg-light navbar-light py-3 py-lg-0 px-0 px-lg-5">
            <a href="" class="navbar-brand font-weight-bold text-secondary" style="font-size: 50px">
                <span class="text-primary"><i class="fa-solid fa-crosshairs"></i> skillsmart</span>
            </a>
            <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse justify-content-between" id="navbarCollapse">
                <?php $session = session(); ?>
                <?php if ($session->isLoggedIn == TRUE) : ?>

                    <div class="navbar-nav font-weight-bold mx-auto py-0">
                        <a href="<?= base_url('courses'); ?>" class="nav-item nav-link"> <i class="fa-solid fa-book"></i> COURSES </a>
                        <a href="<?= base_url('profile'); ?>" class="nav-item nav-link"> <i class="fa-solid fa-user"></i> PROFILE </a>
                    </div>
                    <a href="<?= base_url('logout'); ?>" class="btn btn-primary px-4">Logout</a>

                <?php else : ?>

                    <div class="navbar-nav font-weight-bold mx-auto py-0">
                        <a href="<?= base_url('index'); ?>" class="nav-item nav-link active"> <i class="fa-solid fa-house"></i> HOME </a>
                        <a href="<?= base_url('about_us'); ?>" class="nav-item nav-link active"> <i class="fa-solid fa-address-card"></i> ABOUT US </a>
                    </div>
                    <a href="<?= base_url('login'); ?>" class="btn btn-primary px-4">Login</a>

                <?php endif ?>
            </div>
        </nav>
    </div>
    <!-- Navbar End -->


    <?= $this->renderSection('content') ?>


    <!-- Footer Start -->
    <div class="container-fluid bg-secondary text-white mt-5 py-5 px-sm-3 px-md-5">
        <div class="row pt-5">
            <div class="col-lg-5 col-md-6 mb-5">
                <a href="" class="navbar-brand font-weight-bold text-primary m-0 mb-4 p-0" style="font-size: 40px; line-height: 40px">

                    <span class="text-white"><i class="fa-solid fa-crosshairs"></i> skillsmart</span>
                </a>
                <p>
                    Unlock your potential, level up your life. Join the journey towards personal growth and success. Start now!
                </p>
                <div class="d-flex justify-content-start mt-4">
                    <a class="btn btn-outline-primary rounded-circle text-center mr-2 px-0" style="width: 38px; height: 38px" href="#"><i class="fab fa-twitter"></i></a>
                    <a class="btn btn-outline-primary rounded-circle text-center mr-2 px-0" style="width: 38px; height: 38px" href="#"><i class="fab fa-facebook-f"></i></a>
                    <a class="btn btn-outline-primary rounded-circle text-center mr-2 px-0" style="width: 38px; height: 38px" href="#"><i class="fab fa-linkedin-in"></i></a>
                    <a class="btn btn-outline-primary rounded-circle text-center mr-2 px-0" style="width: 38px; height: 38px" href="#"><i class="fab fa-instagram"></i></a>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 mb-5">
                <h3 class="text-primary mb-4">Get In Touch</h3>
                <div class="d-flex">
                    <h4 class="fa fa-map-marker-alt text-primary"></h4>
                    <div class="pl-3">
                        <h5 class="text-white">Address</h5>
                        <p>123 Street, Nairobi, Kenya</p>
                    </div>
                </div>
                <div class="d-flex">
                    <h4 class="fa fa-envelope text-primary"></h4>
                    <div class="pl-3">
                        <h5 class="text-white">Email</h5>
                        <p>skillsmart@gmail.com</p>
                    </div>
                </div>
                <div class="d-flex">
                    <h4 class="fa fa-phone-alt text-primary"></h4>
                    <div class="pl-3">
                        <h5 class="text-white">Phone</h5>
                        <p>+254 000 0000</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 mb-5">
                <h3 class="text-primary mb-4">Quick Links</h3>
                <div class="d-flex flex-column justify-content-start">
                    <a class="text-white mb-2" href="<?= base_url('index'); ?>"><i class="fa fa-angle-right mr-2"></i>Home</a>
                    <a class="text-white mb-2" href="<?= base_url('about_us'); ?>"><i class="fa fa-angle-right mr-2"></i>About Us</a>
                </div>
            </div>
        </div>
        <div class="container-fluid pt-5" style="border-top: 1px solid rgba(23, 162, 184, 0.2) ;">
            <p class="m-0 text-center text-white">
                &copy;
                <a class="text-primary font-weight-bold" href="<?= base_url('about_us'); ?>">SkillSmart</a>.
                All Rights Reserved.
                Designed by
                <a class="text-primary font-weight-bold" href="https://htmlcodex.com">HTML Codex</a>
                <br />Distributed By:
                <a href="https://themewagon.com" target="_blank">ThemeWagon</a>
            </p>
        </div>
    </div>
    <!-- Footer End -->

    <!-- Back to Top -->
    <a href="#" class="btn btn-primary p-3 back-to-top"><i class="fa fa-angle-double-up"></i></a>

    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js"></script>
    <script src="main/lib/easing/easing.min.js"></script>
    <script src="main/lib/owlcarousel/owl.carousel.min.js"></script>
    <script src="main/lib/isotope/isotope.pkgd.min.js"></script>
    <script src="main/lib/lightbox/js/lightbox.min.js"></script>

    <!-- Template Javascript -->
    <script src="main/js/main.js"></script>
</body>

</html>
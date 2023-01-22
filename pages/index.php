<?php
session_start();
include('./layout.php');
if (isset($_SESSION["userlogin"]) && $_SESSION["userlogin"] === true) {
} else {
    header("location:log-in.php");
}
?>
<nav class="navbar navbar-light bg-light fixed-top">
    <div class="container-fluid">
        <a class="navbar-brand text-primary" href="#">AJ Worldwide</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbar"
            aria-controls="offcanvasNavbar">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasNavbar" aria-labelledby="offcanvasNavbarLabel">
            <div class="offcanvas-header">
                <h5 class="offcanvas-title text-primary" id="offcanvasNavbarLabel">AJ Worldwide</h5>
                <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas"
                    aria-label="Close"></button>
            </div>
            <div class="offcanvas-body">
                <ul class="navbar-nav justify-content-end flex-grow-1 pe-3">
                    <li class="nav-item">
                        <a class="nav-link active text-primary" aria-current="page" href="#">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-primary" href="./logout.php">Logout</a>
                    </li>
            </div>
        </div>
    </div>
</nav>

<section class="vh-100 mt-3" style="background-color: #f4f5f7;">
    <div class="container py-5 h-100">
        <div class="row d-flex justify-content-center align-items-center h-100">
            <div class="col col-lg-6 mb-4 mb-lg-0">
                <div class="card mb-3" style="border-radius: .5rem;">
                    <div class="row g-0">
                        <div class="col-md-4 gradient-custom text-center text-white"
                            style="border-top-left-radius: .5rem; border-bottom-left-radius: .5rem;">
                            <img src="../images/ava1-bg.webp" alt="Avatar" class="img-fluid my-5"
                                style="width: 80px;" />
                            <h5 class="text-capitalize">
                                <?php echo $_SESSION['fullname']; ?>
                            </h5>
                            <p>Web Designer</p>
                            <i class="far fa-edit mb-5"></i>
                        </div>
                        <div class="col-md-8">
                            <div class="card-body p-4">
                                <h6>Information</h6>
                                <hr class="mt-0 mb-4">
                                <div class="row pt-1">
                                    <div class="col-6 mb-3">
                                        <h6>Email</h6>
                                        <p class="text-muted"><?php echo $_SESSION['email']; ?></p>
                                    </div>
                                    <div class="col-6 mb-3">
                                        <h6>Name</h6>
                                        <p class="text-muted text-">
                                            <?php echo $_SESSION['fullname']; ?>
                                        </p>
                                    </div>
                                </div>
                                <h6>Projects</h6>
                                <hr class="mt-0 mb-4">
                                <div class="row pt-1">
                                    <div class="col-6 mb-3">
                                        <h6>Company</h6>
                                        <p class="text-muted">AJ Worldwideweb</p>
                                    </div>
                                    <div class="col-6 mb-3">
                                        <h6>Last Login</h6>
                                        <p class="text-muted">
                                            <?php echo $_SESSION['last_login']; ?>
                                        </p>
                                    </div>
                                </div>
                                <div class="d-flex justify-content-start">
                                    <a href="#!"><i class="fab fa-facebook-f fa-lg me-3"></i></a>
                                    <a href="#!"><i class="fab fa-twitter fa-lg me-3"></i></a>
                                    <a href="#!"><i class="fab fa-instagram fa-lg"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
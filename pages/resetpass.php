<?php
session_start();
include('./layout.php');
if (isset($_SESSION["userlogin"]) && $_SESSION["userlogin"] === true) {
    header("location:index.php");
} elseif (isset($_SESSION["recover"]) && $_SESSION["recover"] === true) { ?>
    <div class="modal show d-block bg-light" id="modelId" tabindex="-1" role="dialog" aria-labelledby="modelTitleId"
        aria-hidden="true">
        <div class="modal-dialog modal-lg modal-fullscreen-sm-down modal-dialog-centered " role="document">
            <div class="modal-content border border-0 rounded-0">
                <div class="modal-body p-0">
                    <div class="row">
                        <div class="col-lg-6 col-md-12 pe-lg-1 px-4 pt-4 pb-3">
                            <form action="#" method="post" class="needs-validation px-5 py-3" id="resetpass">
                                <!-- @csrf -->
                                <span class="text-primary fw-bold fs-4 border rounded-2 px-1 bg-primary-subtle"
                                    style="width: 60px;height:60px">
                                    AJ
                                </span>
                                <h2 class="py-4 pb-1" style="font-weight: 600px;">
                                    Create New Password.
                                </h2>
                                <span class="fs-6">
                                    Password must contain atleast 8 characters, 1 speacial character & 1 number.
                                </span>
                                <div class="pt-2 pb-1">
                                    <span class="fw-semibold">New Password</span>
                                    <div class="form-floating">
                                        <input type="password" required class="form-control" id="repass"
                                            placeholder="input new password" minlength="6">
                                        <label for="" class="form-label">New Password</label>
                                    </div>
                                    <span class="text-danger fw-bold" role="alert">
                                </div>
                                <div class="pt-1 pb-2">
                                    <span class="fw-semibold">Confirm Password</span>
                                    <div class="form-floating">
                                        <input type="password" required class="form-control" id="repasscon"
                                            placeholder="confirm password">
                                        <label for="" class="form-label">Confirm Password</label>
                                    </div>
                                    <span class="text-danger fw-bold" role="alert">
                                        <!-- <small>{{ $em_err }}</small> -->
                                    <!-- <?php //echo // $_SESSION['rid'];?>     -->

                                    </span>
                                </div>

                                <div class="d-grid">
                                    <button type="submit" class="btn btn-lg btn-primary rounded-1 text-white">Update
                                        Password</button>
                                </div>
                                <div class="text-center pt-4">
                                    Have an account ?
                                    <a href="./log-in.php" class="text-end" rel="noopener noreferrer">Login!</a>
                                </div>
                            </form>
                        </div>
                        <div class="d-none col-lg-6 d-lg-block">
                            <img class="img-fluid h-100" style="height: 500px;" src="../images/Right Sideresetsecret.png"
                                alt="Card image cap">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php include('./footer.php');
} else {
    header("location:log-in.php");
} ?>
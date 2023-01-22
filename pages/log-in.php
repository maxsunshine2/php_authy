<?php
session_start();
include('./layout.php');
if(isset($_SESSION["userlogin"]) && $_SESSION["userlogin"] === true){
  header("location:index.php");  
} else { ?>
<div class="modal show d-block bg-light" id="modelId" tabindex="-1" role="dialog" aria-labelledby="modelTitleId"
    aria-hidden="true">
    <div class="modal-dialog modal-lg modal-fullscreen-sm-down modal-dialog-centered " role="document">
        <div class="modal-content border border-0 rounded-0">
            <div class="modal-body p-0">
                <div class="row">
                    <div class="col-lg-6 col-md-12 pe-lg-1 px-4 pt-4 pb-3">
                        <form action="#" method="post" class="needs-validation px-5 py-3" id="login">
                            
                            <span class="text-primary fw-bold fs-4 border rounded-2 px-1 bg-primary-subtle"
                                style="width: 60px;height:60px">
                                AJ
                            </span>
                            <h2 class="pt-4 pb-3" style="font-weight: 600px;">
                                Log into your account
                            </h2>
                            <div class="px-1">
                                <span class="fw-semibold">Email</span>
                                <div class="form-floating">
                                    <input type="email" class="form-control" name="email" id="logml" placeholder="input email">
                                    <label for="" class="form-label">Email</label>
                                </div>
                        
                                <span class="text-danger fw-bold" role="alert">
                                    <!-- <small>error</small> -->
                                </span>
                                
                            </div>
                            <div class="my-2 px-1">
                                <div class="d-flex justify-content-between align-items-center">
                                    <span class="fw-semibold">Password</span>
                                    <a href="./resetmail.php" class="text-end fw-semibold text-decoration-none"
                                        rel="noopener noreferrer">Forgot Password?</a>
                                </div>
                                <div class="form-floating">
                                    <input required type="password" class="form-control" name="password" id="logps"
                                        placeholder="input password">
                                    <label for="" class="form-label">Password</label>
                                </div>
                                
                                <span class="text-danger fw-bold" role="alert">
                                    <!-- <small>$psw_error</small> -->
                                </span>
                                
                            </div>
                            <div class="mb-3">
                                <div class="form-check">
                                    <input required class="form-check-input outline-1" type="checkbox" id="remember">
                                    <label class="form-check-label fw-semibold" for="remember">Remenber Me</label>
                                </div>
                            </div>
                            <div class="d-grid">
                                <button type="submit" class="btn btn-lg btn-primary rounded-1 text-white">Login</button>
                            </div>
                            <div class="text-center pt-4">
                                Dont have an account ?
                                <a href="./register.php" class="text-end" rel="noopener noreferrer">Sign up!</a>
                            </div>
                        </form>
                    </div>
                    <div class="d-none col-lg-6 d-lg-block">
                        <img class="img-fluid h-100" style="height: 500px;" src="../images/Right Sidelogin.png"
                            alt="Card image cap">
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php include('./footer.php');
}?>
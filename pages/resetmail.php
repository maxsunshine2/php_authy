<?php 
session_start();
include('./layout.php');
if(isset($_SESSION["userlogin"]) && $_SESSION["userlogin"] === true){
  header("location:index.php");
} else { ?>
?>
<div class="modal show d-block bg-light" id="modelId" tabindex="-1" role="dialog" aria-labelledby="modelTitleId"
    aria-hidden="true">
    <div class="modal-dialog modal-lg modal-fullscreen-sm-down modal-dialog-centered " role="document">
        <div class="modal-content border border-0 rounded-0">
            <div class="modal-body p-0">
                <div class="row">
                    <div class="col-lg-6 col-md-12 pe-lg-1 px-4 pt-4 pb-3">
                        <form action="#" method="post" id="recover" class="needs-validation px-5 py-3">
                            <span class="text-primary fw-bold fs-4 border rounded-2 px-1 bg-primary-subtle"
                                style="width: 60px;height:60px">
                                AJ
                            </span>
                            <h2 class="py-5 pb-3" style="font-weight: 600px;">
                                Recover your account.
                            </h2>
                            <span class="fs-6">
                                Enter the email address associated with your account to proceed with recovering your account.
                            </span>
                            <div class="px-1 py-4">
                                <span class="fw-semibold">Email</span>
                                <div class="form-floating">
                                    <input required type="email" class="form-control" name="email" id="rmail" placeholder="input email">
                                    <label for="" class="form-label">Email</label>
                                </div>
                                <span class="text-danger fw-bold" role="alert">
                                    <!-- <small>{{ $em_err }}</small> -->
                                </span>
                            </div>
                            
                            <div class="d-grid">
                                <button type="submit" class="btn btn-lg btn-primary rounded-1 text-white">Recover Account</button>
                            </div>
                            <div class="text-center pt-4">
                                Have an account ?
                                <a href="./log-in.php" class="text-end" rel="noopener noreferrer">Login!</a>
                            </div>
                        </form>
                    </div>
                    <div class="d-none col-lg-6 d-lg-block">
                        <img class="img-fluid h-100" src="../images/Right Sideresetmail.png"
                            alt="Card image cap">
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php include('./footer.php');
}?>
<?php include('./layout.php');?>
<div class="modal show d-block bg-light" id="modelId" tabindex="-1" role="dialog" aria-labelledby="modelTitleId"
    aria-hidden="true">
    <div class="modal-dialog modal-lg modal-fullscreen-sm-down modal-dialog-centered " role="document">
        <div class="modal-content border border-0 rounded-0">
            <div class="modal-body p-0">
                <div class="row">
                    <div class="col-lg-6 col-md-12 pe-lg-1 px-3 pt-4 pb-3">
                        <form action="login" method="post" class="needs-validation px-5 py-3" id="reg">
                            <!-- @csrf -->
                            <span class="text-primary fw-bold fs-4 border rounded-2 px-1 bg-primary-subtle"
                                style="width: 60px;height:60px">
                                AJ
                            </span>
                            <h2 class="py-3 pb-1" style="font-weight: 600px;">
                                Create a new account.
                            </h2>
                            <span class="fs-6">
                                It's not difficult, you just have to enter some data and it's done right away!.
                            </span>
                            <div class="row my-2">
                                <div class="col">
                                <label for="" class="form-label fw-semibold">first name</label>
                                    <input required type="text" class="form-control form-control-lg" placeholder="First name"
                                        aria-label="First name" id="fn">
                                </div>
                                <div class="col">
                                <label for="" class="form-label fw-semibold">last name</label>
                                    <input required type="text" class="form-control form-control-lg" placeholder="Last name"
                                        aria-label="Last name" id="ln">
                                </div>
                            </div>
                            <div class="pt-2 pb-1">
                                <span class="fw-semibold">Email</span>
                                <div class="form-floating">
                                    <input required type="email" class="form-control" name="email" id="email" placeholder="email">
                                    <label for="" class="form-label">Email</label>
                                </div>
                                <span class="" role="alert">
                                    <!-- <small>{{ $em_err }}</small> -->
                                </span>
                            </div>
                            <div class="pt-1 pb-2">
                                <span class="fw-semibold">Password</span>
                                <div class="form-floating">
                                    <input required type="password" class="form-control" name="email" id="psw" placeholder="psw" minlength="6">
                                    <label for="" class="form-label" >Password</label>
                                </div>
                                <span class="text-danger fw-bold" role="alert">
                                    <!-- <small>{{ $em_err }}</small> -->
                                </span>
                            </div>

                            <div class="d-grid">
                                <button type="submit" id="rg" class="btn btn-lg btn-primary rounded-1 text-white">Sign Up!
                                    </button>
                            </div>
                            <div class="text-center pt-4">
                                Have an account ?
                                <a href="./log-in.php" class="text-end" rel="noopener noreferrer">Login!</a>
                            </div>
                        </form>
                    </div>
                    <div class="d-none col-lg-6 d-lg-block">
                        <img class="img-fluid h-100" src="../images/Right Sideregister.png"
                            alt="Card image cap">
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>



</form>
<?php include('./footer.php');?>
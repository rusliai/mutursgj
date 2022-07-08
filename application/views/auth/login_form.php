<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>SIMUT RSGJ</title>

    <!-- Custom fonts for this template-->
    <link href="<?php echo base_url()?>assets/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="<?php echo base_url()?>assets/css/sb-admin-2.min.css" rel="stylesheet">

</head>
<style>


    body {
	background-image: url("<?php echo base_url()?>assets/img/wallpaper.jpg");
	background-color: #cccccc;
	/* background-repeat: no-repeat; */
	background-size: cover;
	/* opacity: 6; */
	/* opacity: 0.6; */
	position: absolute;
	left: 0;
	top: 0;
	width: 100%;
	height: auto;
}

   
</style>

<body >

    <div class="container">

        <!-- Outer Row -->
        <div style="margin-top: 5rem;" class="row justify-content-center">

            <div class="col-xl-5 col-lg-6 col-md-9">

                <div class="card o-hidden border-0 shadow-lg my-5">
                    <div class="card-body p-2">
                      
                        <div>
                            
                            <div>
                                <div class="p-5">
                                    <div class="text-center">
                                        <h1 class="h4 text-gray-900 mb-4">SISTEM INFORMASI MUTU RS.GRAHA JUANDA</h1>
                                        <?php if($this->session->flashdata('message_login_error')): ?>
                                        <div class="alert">
                                                <?= $this->session->flashdata('message_login_error') ?>
                                        </div>
                                    <?php endif ?>
                                    </div>
                                    <form class="user" action="<?php echo base_url()?>auth/submit_login" method="post">
                                        <div class="form-group">
                                            <input type="text" class="form-control form-control-user"
                                                id="username" aria-describedby="emailHelp"
                                                name="username"
                                                placeholder="Masukan Username">
                                        </div>
                                        <div class="form-group">
                                            <input type="password" class="form-control form-control-user"
                                                name="password"
                                                id="exampleInputPassword" 
                                                placeholder="Password">
                                        </div>
                                        <div class="form-group">
                                            <div class="custom-control custom-checkbox small">
                                                <input type="checkbox" class="custom-control-input" id="customCheck">
                                                <label class="custom-control-label" for="customCheck">Simpan Login</label>
                                            </div>
                                        </div>
                                    <button type="submit" class="btn btn-primary btn-lg btn-block">LogIn</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </div>

    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="<?php echo base_url()?>assets/vendor/jquery/jquery.min.js"></script>
    <script src="<?php echo base_url()?>assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="<?php echo base_url()?>assets/vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="<?php echo base_url()?>assets/js/sb-admin-2.min.js"></script>

</body>

</html>
<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en" class="h-100">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>MiSHU - Admin Dashboard</title>
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="/temp/admin_asset/images/mishu.png">
    <link href="/temp/admin_asset/css/style.css" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&family=Roboto:wght@100;300;400;500;700;900&display=swap" rel="stylesheet">
    <style>
        .pass_div {
            position: relative;
        }
        .pass_div i {
            position: absolute;
            top: 40px;
            right: 10px;
            width: 40px;
            height: 40spx;
            background:#0dcaf0;
            color:white;
            text-align:center;
            line-height:40px;
            border-top-right-radius: 5px;
            border-bottom-right-radius: 5px;
            border-top-left-radius: 5px;
            border-bottom-left-radius: 5px;
            cursor: pointer;
        }
    </style>
</head>
<body class="h-100">
    <div class="authincation h-100">
        <div class="container h-100">
            <div class="row justify-content-center h-100 align-items-center">
                <div class="col-md-8">
                    <div class="authincation-content">
                        <div class="row no-gutters">
                            <div class="col-xl-12">
                                <div class="auth-form">
                                    <div class="card">
                                    <div class="text-center mb-3">
										<a href="index.html"><img width="100" src="/temp/admin_asset/images/mishu.png" alt=""></a>
									</div>
                                    </div>
									
                                    <h2 class="text-center mb-4 text-white">Register User</h2>
                                    <div class="card-body">
                            <?php if(isset($_SESSION['success'])){?>
                                <div class="alert alert-success"><?=$_SESSION['success']?></div>
                                <?php } unset($_SESSION['success'])?>
                            <?php if(isset($_SESSION['exist'])){?>
                                <div class="alert alert-danger"><?=$_SESSION['exist']?></div>
                                <?php } unset($_SESSION['exist'])?>

                                <form action="Form_post.php" method="POST">
                            <div class="mb-3 text-white">
                                <label class="form-label">Name</label>
                                <input name="name" style="border-color: <?= (isset($_SESSION['invalid_in']))?'red': ' '?>" type="text" class="form-control" placeholder="Enter your name">
                                <?php if(isset($_SESSION['invalid_in'])){?>
                                    <strong class="text-danger"><?= $_SESSION['invalid_in']?></strong>
                                <?php } unset($_SESSION['invalid_in'])?>
                            </div>
                            <div class="mb-3 text-white">
                                <label class="form-label">Email</label>
                                <input name="email" style="border-color: <?=(isset($_SESSION['invalid_mail']))?'red' : ' '?>" type="text" class="form-control" placeholder="Enter your email">
                                <?php if(isset($_SESSION['invalid_mail'])){?>
                                    <strong class="text-danger"><?=$_SESSION['invalid_mail']?></strong>
                                <?php } unset($_SESSION['invalid_mail'])?>
                            </div>
                            <div class="mb-3 text-white pass_div">
                                <label class="form-label">Password</label>
                                <input id="pass" name="password" style="border-color: <?=(isset($_SESSION['invalid_pass']))?'red' : ' '?>" type="password" class="form-control" placeholder="Enter your password">
                                <?php if(isset($_SESSION['invalid_pass'])){?>
                                    <strong class="text-danger"><?=$_SESSION['invalid_pass']?></strong>
                                <?php } unset($_SESSION['invalid_pass'])?>

                                <i id="show_pass" class="fa fa-eye"></i>
                            </div>
                            <div class="mb-3 text-white">
                                <label class="form-label"> Select Gender</label>
                                <div class="form-check">
                                <input class="form-check-input" type="radio" name="gender" id="gen1" value="Male">
                                <label class="form-check-label" for="gen1">
                                    Male
                                </label>
                                </div>
                                <div class="form-check">
                                <input class="form-check-input" type="radio" name="gender" id="gen2" value="Female">
                                <label class="form-check-label" for="gen2">
                                    Female
                                </label>
                                </div>
                                <?php if(isset($_SESSION['invalid_gender'])){?>
                                    <strong class="text-danger"><?=$_SESSION['invalid_gender']?></strong>
                                <?php } unset($_SESSION['invalid_gender'])?>
                            </div>
                            <div class="text-center">
                                     <button type="submit" class="btn bg-white text-primary btn-block">Submit</button>
                            </div>
                            </form>
                                    <div class="new-account mt-3">
                                        <p class="text-white">already have an account? <a class="text-white" href="login.php">Sign in</a></p>
                                    </div>
                               </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <!--**********************************
        Scripts
    ***********************************-->
    <!-- Required vendors -->
    <script src="/temp/admin_asset/vendor/global/global.min.js"></script>
	<script src="/temp/admin_asset/vendor/bootstrap-select/dist/js/bootstrap-select.min.js"></script>
    <script src="/temp/admin_asset/js/custom.min.js"></script>
    <script src="/temp/admin_asset/js/deznav-init.js"></script>
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" ></script>
    <script>
        $('#show_pass').click(function(){
            var pass = document.getElementById('pass');
            if(pass.type == 'password'){
                pass.type = 'text';
            }
            else{
                pass.type = 'password';
            }
        })
    </script>

</body>

</html>

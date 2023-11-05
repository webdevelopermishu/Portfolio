<!-- <?php
$a= 10;

for($a=0; $a <=10; $a++){
    echo "count: $a <br>";
}
while($a <=20){
    echo "count : $a <br>";
    $a++;
}
do{
    echo "count : $a <br>";
    $a++;
}while ($a <=30);
?> -->

<?php
 require 'db.php';
$select = "SELECT * FROM users";
$select_res = mysqli_query($db_connect, $select);
$after_assoc = mysqli_fetch_assoc($select_res);

foreach($after_assoc as $value){
    echo $value;
}


?>

<?php
die();
?>



<!-- original element -->
<!-- ////// -->
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>work</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" >
    <style>
        .pass_div {
            position: relative;
        }
        .pass_div i {
            position: absolute;
            top: 32px;
            right: 0px;
            width: 36px;
            height: 36spx;
            background:#0dcaf0;
            color:white;
            text-align:center;
            line-height:36px;
            border-top-right-radius: 5px;
            border-bottom-right-radius: 5px;
            cursor: pointer;
        }
    </style>
  </head>
  <body>
    <div class="conteiner">
        <div class="row">
            <div class="col-lg-6 m-auto">
                <div class="card mt-3">
                        <div class="card-header bg-info">
                            <h3 class="text-white">Register User</h3>
                        </div>
                        <div class="card-body">
                        <?php if(isset($_SESSION['success'])){?>
                                <div class="alert alert-success"><?=$_SESSION['success']?></div>
                                <?php } unset($_SESSION['success'])?>
                            <?php if(isset($_SESSION['exist'])){?>
                                <div class="alert alert-danger"><?=$_SESSION['exist']?></div>
                                <?php } unset($_SESSION['exist'])?>


                        <form action="Form_post.php" method="POST">
                            <div class="mb-3">
                                <label class="form-label">Name</label>
                                <input name="name" style="border-color: <?= (isset($_SESSION['invalid_in']))?'red': ' '?>" type="text" class="form-control" placeholder="Enter your name">
                                <?php if(isset($_SESSION['invalid_in'])){?>
                                    <strong class="text-danger"><?= $_SESSION['invalid_in']?></strong>
                                <?php } unset($_SESSION['invalid_in'])?>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Email</label>
                                <input name="email" style="border-color: <?=(isset($_SESSION['invalid_mail']))?'red' : ' '?>" type="text" class="form-control" placeholder="Enter your email">
                                <?php if(isset($_SESSION['invalid_mail'])){?>
                                    <strong class="text-danger"><?=$_SESSION['invalid_mail']?></strong>
                                <?php } unset($_SESSION['invalid_mail'])?>
                            </div>
                            <div class="mb-3 pass_div">
                                <label class="form-label">Password</label>
                                <input id="pass" name="password" style="border-color: <?=(isset($_SESSION['invalid_pass']))?'red' : ' '?>" type="password" class="form-control" placeholder="Enter your password">
                                <?php if(isset($_SESSION['invalid_pass'])){?>
                                    <strong class="text-danger"><?=$_SESSION['invalid_pass']?></strong>
                                <?php } unset($_SESSION['invalid_pass'])?>
                                <i id="show_pass" class="fa fa-eye"></i>
                            </div>
                            <div class="mb-3">
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
                            <button type="submit" class="btn btn-info">Submit</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
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
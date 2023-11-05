<?php
session_start(); 

require '../db.php';
$select_logo = "SELECT * FROM logos Where id=1";
$res_logo = mysqli_query($db_connect, $select_logo);
$after_assoc = mysqli_fetch_assoc($res_logo);
?>
<?php require '../admin_header.php'?>
		<!--**********************************
            Content body start
        ***********************************-->
        <div class="content-body">
            <!-- row -->
			<div class="container">
				<div class="row">
					<div class="col-lg-6">
                        <div class="card">
                            <div class="card-header">
                                <h3>Update header logo</h3>
                            </div>
                            <div class="card-body">
                            <?php if(isset($_SESSION['updated'])){?>
                                <strong><div class="alert alert-success"><?=$_SESSION['updated']?></div></strong>
                            <?php } unset($_SESSION['updated'])?>
                                <form action="header.php" method="POST" enctype="multipart/form-data">
                                    <div class="mb-3">
                                        <label for="">Upload logo</label>
                                        <input type="file" name="header_logo" class="form-control" onchange="document.getElementById('blah').src = window.URL.createObjectURL(this.files[0])">
                                        <div class="my-2">
                                            <img width="100" src="../uploads/logos/<?= $after_assoc['header_logo']?>" id="blah" alt="">
                                        </div>
                                        <?php if(isset($_SESSION['required'])){?>
                                        <strong class="text-danger"><?=$_SESSION['required']?></strong>
                                        <?php } unset($_SESSION['required'])?>
                                        <?php if(isset($_SESSION['invalid_format'])){?>
                                        <strong class="text-danger"><?=$_SESSION['invalid_format']?></strong>
                                        <?php } unset($_SESSION['invalid_format'])?>
                                    </div>
                                    <div class="mb-3">
                                        <button type="submit" class="btn btn-info">Update</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
					<div class="col-lg-6">
                        <div class="card">
                            <div class="card-header">
                                <h3>Update footer logo</h3>
                            </div>
                            <div class="card-body">
                            <?php if(isset($_SESSION['updated2'])){?>
                                <strong><div class="alert alert-success"><?=$_SESSION['updated2']?></div></strong>
                            <?php } unset($_SESSION['updated2'])?>
                                <form action="footer.php" method="POST" enctype="multipart/form-data">
                                    <div class="mb-3">
                                        <label for="">Upload logo</label>
                                        <input type="file" name="footer_logo" class="form-control" onchange="document.getElementById('blah2').src = window.URL.createObjectURL(this.files[0])">
                                        <div class="my-2">
                                            <img width="100" src="../uploads/logos/<?= $after_assoc['footer_logo']?>" id="blah2" alt="">
                                        </div>
                                        <?php if(isset($_SESSION['required2'])){?>
                                        <strong class="text-danger"><?=$_SESSION['required2']?></strong>
                                        <?php } unset($_SESSION['required2'])?>
                                        <?php if(isset($_SESSION['invalid_format2'])){?>
                                        <strong class="text-danger"><?=$_SESSION['invalid_format2']?></strong>
                                        <?php } unset($_SESSION['invalid_format2'])?>
                                    </div>
                                    <div class="mb-3">
                                        <button type="submit" class="btn btn-info">Update</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
				</div>
            </div>
        </div>	
        <!--**********************************
            Content body end
        ***********************************-->
<?php require '../admin_footer.php'?>
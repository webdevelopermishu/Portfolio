<?php session_start();?>
<?php require '../admin_header.php' ;?>
<?php
     require '../db.php';

     $about = "SELECT * FROM abouts";
     $about_res = mysqli_query($db_connect, $about);
     $after_assoc_about = mysqli_fetch_assoc($about_res);
     
     
?>

		<!--**********************************
            Content body start
        ***********************************-->
        <div class="content-body">
            <!-- row -->
			<div class="container">
				<div class="row">
					<div class="col-lg-8">
                        <div class="card">
                            <div class="card-header bg-info">
                                <h3 class="text-white bg-info m-auto">Update user info</h3>
                            </div>
                            <div class="card-body">
                                <?php if(isset($_SESSION['updated2'])){?>
                                    <strong><div class="alert alert-success"><?=$_SESSION['updated2']?></div></strong>
                                <?php } unset($_SESSION['updated2'])?>
                                <form action="about_post.php" method="post" enctype="multipart/form-data">
                                    <div class="mb-3">
                                        <label class="form-label" for="">Nick Name</label>
                                        <input type="text" name="nick_name" class="form-control" value="<?=$after_assoc_about['nick_name']?>">
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label" for="">Full Name</label>
                                        <input type="text" name="full_name" class="form-control" value="<?=$after_assoc_about['full_name']?>">
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label" for="">Designation</label>
                                        <input type="text" name="designation" class="form-control" value="<?=$after_assoc_about['designation']?>">
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label" for="">Short Description</label>
                                        <textarea name="short_desc" class="form-control" id="" cols="10" rows="5"><?=$after_assoc_about['short_desc']?></textarea>
                                    </div>
                                    <div class="mb-3 text-center">
                                        <button type="submit" class="btn btn-info">Update</button>
                                    </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="card">
                            <div class="card-header bg-info">
                                <h3 class="text-white mb-2 m-auto">Update user image</h3>
                            </div>
                            <div class="card-body">
                                    <div class="mb-3">
                                        <label class="form-label" for="">Image</label>
                                        <input type="file" name="image" class="form-control" onchange="document.getElementById('blah2').src = window.URL.createObjectURL(this.files[0])">
                                        <div class="my-2"><img width="200" id="blah2" src="../uploads/abouts/<?=$after_assoc_about['image']?>" alt=""></div>
                                        <?php if(isset($_SESSION['invalid_format2'])){?>
                                            <strong class="text-danger"><?=$_SESSION['invalid_format2']?></strong>
                                        <?php } unset($_SESSION['invalid_format2'])?>
                                    </div>
                                    <div class="mb-3 text-center">
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
<?php require '../admin_footer.php' ?>

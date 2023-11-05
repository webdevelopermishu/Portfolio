<?php
session_start(); 
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
                            <div class="card-header m-auto">
                                <h3>Edit Profile</h3>
                            </div>
                            <div class="card-body">
                                <form action="update_profile.php" method="POST">
                                    <div class="mb-3">
                                        <label for="" class="form-label text-black">Name</label>
                                        <input type="text" name="name" class="form-control" value="<?=$after_assoc_user_info['name']?>" style="border-color:<?=(isset($_SESSION['name_required']))? 'red' : ' '?>" placeholder="Update your name">
                                        <?php if(isset($_SESSION['name_required'])){?>
                                            <strong class="text-danger"><?=$_SESSION['name_required']?></strong>
                                        <?php } unset($_SESSION['name_required'])?>
                                    </div>
                                    <div class="mb-3">
                                        <label for="" class="form-label text-black">Password</label>
                                        <input type="password" name="password" class="form-control" placeholder="Update your password">
                                    </div>
                                    <input type="hidden" name="user_id" value="<?=$after_assoc_user_info['id']?>">
                                    <div class="mb-3">
                                        <button type="submit" class="btn btn-info">Update your profile</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
					<div
                     class="col-lg-6">
                        <div class="card">
                            <div class="card-header m-auto">
                                <h3>Update image</h3>
                            </div>
                            <div class="card-body">
                            <?php if(isset($_SESSION['updated'])){?>
                                <strong><div class="alert alert-success"><?=$_SESSION['updated']?></div></strong>
                            <?php } unset($_SESSION['updated'])?>
                                <form action="update_image.php" method="POST" enctype="multipart/form-data">
                                    <div class="mb-3">
                                        <label for="" class="form-label text-black">Image</label>
                                        <input type="file" name="image" class="form-control" onchange="document.getElementById('blah').src = window.URL.createObjectURL(this.files[0])">
                                       <div>
                                       <img width="200" src="../uploads/users/<?=$after_assoc_user_info['image']?>" id="blah" alt="">
                                       </div>
                                       <?php if(isset($_SESSION['invalid_format'])){?>
                                        <strong class="text-danger"><?=$_SESSION['invalid_format']?></strong>
                                        <?php } unset($_SESSION['invalid_format'])?>
                                    </div>
                                    <input type="hidden" name="user_id" value="<?=$after_assoc_user_info['id']?>">
                                    <div class="mb-3">
                                        <button type="submit" class="btn btn-info">Update your image</button>
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
        <?php if(isset($_SESSION['update'])){?>
            <script>
            Swal.fire(
                'Success!',
                '<?=$_SESSION['update']?>',
                'success'
              )
            </script>
        <?php } unset($_SESSION['update'])?>
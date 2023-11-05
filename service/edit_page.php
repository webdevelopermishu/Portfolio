<?php
session_start();
require '../admin_header.php';?>
<?php
$id = $_GET['id'];

$select = "SELECT * FROM services WHERE id=$id";
$after_res = mysqli_query($db_connect, $select);
$after_assoc = mysqli_fetch_assoc($after_res);

?>
		<!--**********************************
            Content body start
        ***********************************-->
        <div class="content-body">
            <!-- row -->
			<div class="container">
				<div class="row">
					<div class="col-lg-6 m-auto">
                        <div class="card">
                            <div class="card-header bg-info">
                                <h3 class="text-white mb-2 m-auto">Edit Services</h3>
                            </div>
                            <div class="card-body">
                                <form action="edit_service.php" method="POST">
                                    <div class="mb-3">
                                        <label class="form-label" for="">Title</label>
                                        <input type="text" name="title" class="form-control" value="<?=$after_assoc['title']?>">
                                    </div>
                                    <input type="hidden" name="id" value="<?=$after_assoc['id']?>">
                                    <div class="mb-3">
                                        <label class="form-label" for="">Short Description</label>
                                        <input type="text" name="short_desc" class="form-control" value="<?=$after_assoc['short_desc']?>">
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
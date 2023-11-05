<?php
session_start();
require '../admin_header.php';?>
<?php
$id = $_GET['id'];

$select = "SELECT * FROM expertises WHERE id=$id";
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
                                <h3 class="text-white mb-2 m-auto">Edit expertise</h3>
                            </div>
                            <div class="card-body">
                                <form action="edit_expertise.php" method="POST">
                                    <div class="mb-3">
                                        <label class="form-label" for="">Topic Name</label>
                                        <input type="text" name="topic_name" class="form-control" value="<?=$after_assoc['topic_name']?>">
                                    </div>
                                    <input type="hidden" name="id" value="<?=$after_assoc['id']?>">
                                    <div class="mb-3">
                                        <label class="form-label" for="">Percentage</label>
                                        <input type="number" name="percentage" class="form-control" value="<?=$after_assoc['percentage']?>">
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
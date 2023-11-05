<?php session_start();?>

<?php require '../admin_header.php';?>
<?php
     require '../db.php';

     $services = "SELECT * FROM services";
     $services_res = mysqli_query($db_connect, $services);
     
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
                                <h3 class="text-white bg-info m-auto">Services</h3>
                            </div>
                            <div class="card-body">
                                <?php if(isset($_SESSION['delete_service'])){?>
                                    <div class="alert alert-danger text-center"><strong class="text-danger"><?=$_SESSION['delete_service']?></strong></div>
                                <?php } unset($_SESSION['delete_service'])?>
                                <?php if(isset($_SESSION['not_changed'])){?>
                                    <div class="alert alert-danger text-center"><strong class="text-danger"><?=$_SESSION['not_changed']?></strong></div>
                                <?php } unset($_SESSION['not_changed'])?>
                                <?php if(isset($_SESSION['title_changed'])){?>
                                    <div class="alert alert-success"><?=$_SESSION['title_changed']?></div>
                                <?php } unset($_SESSION['title_changed'])?>
                                <table class="table table-bordered">
                                    <tr class="text-center">
                                        <th>SL</th>
                                        <th>Title</th>
                                        <th>Short Description</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                    <?php foreach($services_res as $sl=>$service){?>
                                    <tr class="text-center">
                                        <td><?=$sl+1?></td>
                                        <td><?=$service['title']?></td>
                                        <td><?=$service['short_desc']?></td>
                                        <td>
                                            <a href="status_change.php?id=<?=$service['id']?>" class="btn btn-<?=($service['status']==1)?'success':'light'?>"><?=($service['status']==1)?'Active':'Deactive'?></a>
                                        </td>
                                        <td>
                                            <div
                                            class="d-flex">
									            <a href="edit_page.php?id=<?=$service['id']?>" class=" btn btn-primary shadow btn-xs sharp "><i class="fa fa-pencil"></i></a>
									            <a  class=" btn btn- shadow btn-xs sharp del "><i class="fa fa-"></i></a>
                                            </div>

                                            <div class="d-flex">
									            <a  class=" btn btn- shadow btn-xs sharp "><i class="fa fa-"></i></a>
									            <a href="delete_service.php?id=<?=$service['id']?>" class=" btn btn-danger shadow btn-xs sharp del"><i class="fa fa-trash"></i></a>
						                    </div>
                                        </td>
                                    </tr>
                                    <?php } ?>
                                </table>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="card">
                            <div class="card-header bg-info">
                                <h3 class="text-white mb-2 m-auto">Add new Services</h3>
                            </div>
                            <div class="card-body">
                                <?php if(isset($_SESSION['service_aded'])){?>
                                    <div class="alert alert-success"><?=$_SESSION['service_aded']?></div>
                                <?php } unset($_SESSION['service_aded'])?>
                                <?php if(isset($_SESSION['service_null'])){?>
                                    <div class="alert alert-danger"><?=$_SESSION['service_null']?></div>
                                <?php } unset($_SESSION['service_null'])?>
                                <form action="service_post.php" method="POST">
                                    <div class="mb-3">
                                        <label class="form-label" for="">Title</label>
                                        <input type="text" name="title" class="form-control">
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label" for="">Short Description</label>
                                        <input type="text" name="short_desc" class="form-control">
                                    </div>
                                    <div class="mb-3 text-center">
                                        <button type="submit" class="btn btn-info">Add</button>
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
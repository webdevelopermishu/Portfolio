<?php session_start();?>

<?php require '../admin_header.php';?>
<?php
     require '../db.php';

     $expertise = "SELECT * FROM expertises";
     $expertise_res = mysqli_query($db_connect, $expertise);
     
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
                                <h3 class="text-white bg-info m-auto">Skills</h3>
                            </div>
                            <div class="card-body">
                                <?php if(isset($_SESSION['delete_skill'])){?>
                                    <div class="alert alert-danger text-center"><strong class="text-danger"><?=$_SESSION['delete_skill']?></strong></div>
                                <?php } unset($_SESSION['delete_skill'])?>
                                <?php if(isset($_SESSION['not_changed'])){?>
                                    <div class="alert alert-danger text-center"><strong class="text-danger"><?=$_SESSION['not_changed']?></strong></div>
                                <?php } unset($_SESSION['not_changed'])?>
                                <?php if(isset($_SESSION['topic_changed'])){?>
                                    <div class="alert alert-success"><?=$_SESSION['topic_changed']?></div>
                                <?php } unset($_SESSION['topic_changed'])?>
                                <table class="table table-bordered">
                                    <tr class="text-center">
                                        <th>SL</th>
                                        <th>Topic Name</th>
                                        <th>Percentage</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                    <?php foreach($expertise_res as $sl=>$skill){?>
                                    <tr class="text-center">
                                        <td><?=$sl+1?></td>
                                        <td><?=$skill['topic_name']?></td>
                                        <td><?=$skill['percentage']?>%</td>
                                        <td>
                                            <a href="status_change.php?id=<?=$skill['id']?>" class="btn btn-<?=($skill['status']==1)?'success':'light'?>"><?=($skill['status']==1)?'Active':'Deactive'?></a>
                                        </td>
                                        <td>
                                            <div
                                            class="d-flex">
									            <a href="edit_page.php?id=<?=$skill['id']?>" class=" btn btn-primary shadow btn-xs sharp "><i class="fa fa-pencil"></i></a>
									            <a  class=" btn btn- shadow btn-xs sharp del "><i class="fa fa-"></i></a>
                                            </div>

                                            <div class="d-flex">
									            <a  class=" btn btn- shadow btn-xs sharp "><i class="fa fa-"></i></a>
									            <a href="delete_expertise.php?id=<?=$skill['id']?>" class=" btn btn-danger shadow btn-xs sharp del"><i class="fa fa-trash"></i></a>
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
                                <h3 class="text-white mb-2 m-auto">Add new expertise</h3>
                            </div>
                            <div class="card-body">
                                <?php if(isset($_SESSION['topc_update'])){?>
                                    <div class="alert alert-success"><?=$_SESSION['topc_update']?></div>
                                <?php } unset($_SESSION['topc_update'])?>
                                <?php if(isset($_SESSION['topic_null'])){?>
                                    <div class="alert alert-danger"><?=$_SESSION['topic_null']?></div>
                                <?php } unset($_SESSION['topic_null'])?>
                                <form action="expertise_post.php" method="POST">
                                    <div class="mb-3">
                                        <label class="form-label" for="">Topic Name</label>
                                        <input type="text" name="topic_name" class="form-control">
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label" for="">Percentage</label>
                                        <input type="number" name="percentage" class="form-control">
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
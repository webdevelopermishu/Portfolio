<?php session_start();?>

<?php require '../admin_header.php';?>
<?php
     require '../db.php';

     $feedbacks = "SELECT * FROM feedbacks";
     $feedbacks_res = mysqli_query($db_connect, $feedbacks);
     
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
                                <h3 class="text-white bg-info m-auto">feedback's</h3>
                            </div>
                            <div class="card-body">
                                <?php if(isset($_SESSION['delete_feedback'])){?>
                                    <div class="alert alert-danger text-center"><strong class="text-danger"><?=$_SESSION['delete_feedback']?></strong></div>
                                <?php } unset($_SESSION['delete_feedback'])?>
                                <table class="table table-bordered m-auto">
                                    <tr class="text-center">
                                        <th>SL</th>
                                        <th>Name</th>
                                        <th>Designation</th>
                                        <th>Feedback</th>
                                        <th>image</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                    <?php foreach($feedbacks_res as $sl=>$feedback){?>
                                    <tr class="text-center">
                                        <td><?=$sl+1?></td>
                                        <td><?=$feedback['name']?></td>
                                        <td><?=$feedback['designation']?></td>
                                        <td><?=$feedback['feedback']?></td>
                                        <td><img width="80" src="../uploads/feedbacks/<?=$feedback['image']?>" alt=""></td>
                                        <td>
                                            <a href="status_change.php?id=<?=$feedback['id']?>" class="btn btn-<?=($feedback['status']==1)?'success':'light'?>"><?=($feedback['status']==1)?'Active':'Deactive'?></a>
                                        </td>
                                        <td>
                                            <div class="d-flex">
									            <a href="delete_feedback.php?id=<?=$feedback['id']?>" class=" btn btn-danger shadow btn-xs sharp del"><i class="fa fa-trash"></i></a>
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
                                <h3 class="text-white mb-2 m-auto">Add new Feedback</h3>
                            </div>
                            <div class="card-body">
                                <?php if(isset($_SESSION['feedback_aded'])){?>
                                    <div class="alert alert-success"><?=$_SESSION['feedback_aded']?></div>
                                <?php } unset($_SESSION['feedback_aded'])?>
                                <?php if(isset($_SESSION['feedback_null'])){?>
                                    <div class="alert alert-danger"><?=$_SESSION['feedback_null']?></div>
                                <?php } unset($_SESSION['feedback_null'])?>
                                <form action="feedback_post.php" method="POST" enctype="multipart/form-data">
                                    <div class="mb-3">
                                        <label class="form-label" for="">Name</label>
                                        <input type="text" name="name" class="form-control">
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label" for="">Designation</label>
                                        <input type="text" name="designation" class="form-control">
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label" for="">Feedback</label>
                                        <textarea name="feedback" class="form-control" id="" cols="10" rows="5"></textarea>
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label" for="">Image</label>
                                        <input type="file" name="image" class="form-control" onchange="document.getElementById('blah').src = window.URL.createObjectURL(this.files[0])">
                                        <div>
                                        <img width="100" src="" id="blah" alt="">
                                        </div>
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
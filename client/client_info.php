<?php 
session_start();
?>
<?php require '../admin_header.php';?>
<?php
     require '../db.php';

     $messages = "SELECT * FROM messages";
     $messages_res = mysqli_query($db_connect, $messages);
     
?>

		<!--**********************************
            Content body start
        ***********************************-->
        <div class="content-body">
            <!-- row -->
			<div class="container">
				<div class="row">
					<div class="col-lg-auto">
                        <div class="card">
                            <div class="card-header bg-info">
                                <h3 class="text-white bg-info m-auto">Client's</h3>
                            </div>
                            <div class="card-body">
                                <?php if(isset($_SESSION['delete_message'])){?>
                                    <div class="alert alert-danger text-center"><strong class="text-danger"><?=$_SESSION['delete_message']?></strong></div>
                                <?php } unset($_SESSION['delete_message'])?>
                                <table class="table table-bordered m-auto">
                                    <tr class="text-center">
                                        <th>SL</th>
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Subject</th>
                                        <th>message</th>
                                        <th>image</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                    <?php foreach($messages_res as $sl=>$message){?>
                                    <tr class="text-center">
                                        <td><?=$sl+1?></td>
                                        <td><?=$message['name']?></td>
                                        <td><?=$message['email']?></td>
                                        <td><?=$message['subject']?></td>
                                        <td><?=$message['message']?></td>
                                        <td><img width="80" src="../uploads/clients/<?=$message['image']?>" alt=""></td>
                                        <td>
                                            <a href="status_change.php?id=<?=$message['id']?>" class="btn btn-<?=($message['status']==1)?'success':'light'?>"><?=($message['status']==1)?'Active':'Deactive'?></a>
                                        </td>
                                        <td>
                                            <div class="d-flex">
									            <a href="delete_mssg.php?id=<?=$message['id']?>" class=" btn btn-danger shadow btn-xs sharp del"><i class="fa fa-trash"></i></a>
						                    </div>
                                        </td>
                                    </tr>
                                    <?php } ?>
                                </table>
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

?>
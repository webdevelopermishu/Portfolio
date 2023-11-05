<?php
session_start();
    require '../db.php';
    $select = "SELECT * FROM users";
    $select_result = mysqli_query($db_connect, $select);


    $total = "SELECT COUNT(*) as total FROM users";
    $total_user = mysqli_query($db_connect, $total);
    $after_user_assoc = mysqli_fetch_assoc($total_user);
?>
<?php require '../admin_header.php';?>
		<!--**********************************
            Content body start
        ***********************************-->
        <div class="content-body">
            <!-- row -->
			<div class="container">
				<div class="row">
                    <div class="col-lg-12 m-auto mt-3">
                <div class="card">
                    <div class="card-header bg-info text-center">
                        <h3 class="text-white m-auto">User list</h3>
                        <p class="text-white">Total Users: <?= $after_user_assoc['total']?></p>
                    </div>
                    <div class="card-body">
                        <table class="table table-striped">
                            <tr>
                                <th>SL</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Gender</th>
                                <th>action</th>
                            </tr>
                            <?php  foreach($select_result as $key=>$user){?>
                            <tr>
                                <td><?=$key+1?></td>
                                <td><?=$user['name']?></td>
                                <td><?=$user['email']?></td>
                                <td><?=$user['gender']?></td>
                                <td>
                                <div class="d-flex">
									<a data-link="user_delete.php?id=<?=$user['id']?>" class="btn btn-danger shadow btn-xs sharp del"><i class="fa fa-trash"></i></a>
								</div>
                                </td>
                            </tr>
                            <?php }?>
                        </table>
                    </div>
                </div>
				</div>
            </div>
        </div>
        <!--**********************************
            Content body end
        ***********************************-->
<?php require'../admin_footer.php';?>
<script>
    $('.del').click(function(){
        var link = $(this).attr('data-link');
Swal.fire({
  title: 'Are you sure?',
  text: "You won't be able to revert this!",
  icon: 'warning',
  showCancelButton: true,
  confirmButtonColor: '#3085d6',
  cancelButtonColor: '#d33',
  confirmButtonText: 'Yes, delete it!'
}).then((result) => {
  if (result.isConfirmed) {
    window.location.href = link;
  }
})
    })
</script>
<?php if(isset($_SESSION['user_delete'])){ ?>
    <script>
        Swal.fire(
      'Deleted!',
      'Your file has been deleted.',
      'success'
    )
    </script>
<?php } unset($_SESSION['user_delete'])?>

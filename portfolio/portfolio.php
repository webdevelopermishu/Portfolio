<?php session_start();?>

<?php require '../admin_header.php';?>
<?php
     require '../db.php';

     $portfolios = "SELECT * FROM portfolios";
     $portfolios_res = mysqli_query($db_connect, $portfolios);
     
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
                                <h3 class="text-white bg-info m-auto">portfolios</h3>
                            </div>
                            <div class="card-body">
                                <?php if(isset($_SESSION['delete_portfolio'])){?>
                                    <div class="alert alert-danger text-center"><strong class="text-danger"><?=$_SESSION['delete_portfolio']?></strong></div>
                                <?php } unset($_SESSION['delete_portfolio'])?>
                                <?php if(isset($_SESSION['not_changed'])){?>
                                    <div class="alert alert-danger text-center"><strong class="text-danger"><?=$_SESSION['not_changed']?></strong></div>
                                <?php } unset($_SESSION['not_changed'])?>
                                <?php if(isset($_SESSION['title_changed'])){?>
                                    <div class="alert alert-success"><?=$_SESSION['title_changed']?></div>
                                <?php } unset($_SESSION['title_changed'])?>
                                <table class="table table-bordered m-auto">
                                    <tr class="text-center">
                                        <th>SL</th>
                                        <th>Title</th>
                                        <th>category</th>
                                        <th>image</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                    <?php foreach($portfolios_res as $sl=>$portfolio){?>
                                    <tr class="text-center">
                                        <td><?=$sl+1?></td>
                                        <td><?=$portfolio['title']?></td>
                                        <td><?=$portfolio['category']?></td>
                                        <td><img width="80" src="../uploads/portfolios/<?=$portfolio['image']?>" alt=""></td>
                                        <td>
                                            <a href="status_change.php?id=<?=$portfolio['id']?>" class="btn btn-<?=($portfolio['status']==1)?'success':'light'?>"><?=($portfolio['status']==1)?'Active':'Deactive'?></a>
                                        </td>
                                        <td>
                                            <div
                                            class="d-flex">
									            <a href="edit_page.php?id=<?=$portfolio['id']?>" class=" btn btn-primary shadow btn-xs sharp "><i class="fa fa-pencil"></i></a>
									            <a  class=" btn btn- shadow btn-xs sharp del "><i class="fa fa-"></i></a>
                                            </div>

                                            <div class="d-flex">
									            <a  class=" btn btn- shadow btn-xs sharp "><i class="fa fa-"></i></a>
									            <a href="delete_portfolio.php?id=<?=$portfolio['id']?>" class=" btn btn-danger shadow btn-xs sharp del"><i class="fa fa-trash"></i></a>
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
                                <h3 class="text-white mb-2 m-auto">Add new Portfolio</h3>
                            </div>
                            <div class="card-body">
                                <?php if(isset($_SESSION['portfolio_aded'])){?>
                                    <div class="alert alert-success"><?=$_SESSION['portfolio_aded']?></div>
                                <?php } unset($_SESSION['portfolio_aded'])?>
                                <?php if(isset($_SESSION['portfolio_null'])){?>
                                    <div class="alert alert-danger"><?=$_SESSION['portfolio_null']?></div>
                                <?php } unset($_SESSION['portfolio_null'])?>
                                <form action="portfolio_post.php" method="POST" enctype="multipart/form-data">
                                    <div class="mb-3">
                                        <label class="form-label" for="">Title</label>
                                        <input type="text" name="title" class="form-control">
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label" for="">Category</label>
                                        <input type="text" name="category" class="form-control">
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label" for="">Image</label>
                                        <input type="file" name="image" class="form-control" onchange="document.getElementById('blah').src = window.URL.createObjectURL(this.files[0])">
                                        <div>
                                        <img width="150" src="" id="blah" alt="">
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
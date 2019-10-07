<?php 
include("header.php");
$res=mysqli_query($con,"select * from tasks where u_id='".$_SESSION['uid']."'");
?>
  <!-- Page Content -->
<div class="container">
	<div class="row">
	  <div class="col-md-12">
	  <h3 class="box-title"><i class="fa fa-tasks"  title="Open"></i> Task List </h3>
	  <?php echo $_SESSION['msg'];if(!empty($_SESSION['msg']))unset($_SESSION['msg']);?>
	  <div class="box-footer clearfix no-border">
      <button type="button" class="btn btn-default pull-right"><i class="fa fa-plus"></i> <a href="create_task.php">create List</a></button>
      </div>
		<div class="box box-aqua">
		  <div class="box-header ui-sortable-handle" style="cursor: move;">
		  
			<i class="ion ion-clipboard"></i>
			
			
		  </div>
	 
		  <div class="box-body">
			<ul class="todo-list ui-sortable">
			<?php
			while($row = mysqli_fetch_assoc($res))
			{
			
			
			?>
			  <li class="dropdown">
			
				<span class="handle ui-sortable-handle">
				  <i class="fa fa-ellipsis-v"></i>
				  <i class="fa fa-ellipsis-v"></i>
				</span>
				<span class="text" style="padding-right:830px;"><a href="todo_list.php?id=<?php echo $row['t_id'];?>"><?php echo $row['t_name'];?></a></span>
					<?php if($row['t_status'] == "2")
							{ 
								
							}
							else
							{
								?>
					 <div class="tools">
			  <a href="todo_list.php?id=<?php echo $row['t_id'];?>"><i class="fa fa-eye"  title="Open"></i></a>
			  <a href="share_task.php?id=<?php echo $row['t_id'];?>"><i class="fa fa-share"  title="share"></i></a>
              <a href="edit_task.php?id=<?php echo $row['t_id'];?>"><i class="fa fa-edit"  title="Edit"></i></a>
			  <a href="close_task.php?id=<?php echo $row['t_id'];?>"><i class="fa fa-times"  title="Open"></i></a>
              <a href="delete_task.php?id=<?php echo $row['t_id'];?>"><i class="fa fa-trash-o"  title="Delete"></i></a>
			  
            </div>
							<?php } ?>		
					
			  </li>
			  <?php
			}
			?>
			  
			</ul>
			<!--<ul class="pager">
			  <li><a href="#">Prev</a></li>
			  <li><a href="#">Next</a></li>
			</ul>-->
		  </div>
		  
		</div>
	  </div> 
	</div>
  </div>
  <!-- /.container -->

  <?php 
include("footer.php");
?>
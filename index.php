<?php 
include("header.php");
$res=mysqli_query($con,"select * from assign where du_id='".$_SESSION['uid']."'");

$sharedres=mysqli_query($con,"select * from assign where su_id='".$_SESSION['uid']."'");
?>
  <!-- Page Content -->
<div class="container">
	<div class="row">
	  <div class="col-md-12">
	  <h3 class="box-title"><i class="fa fa-tasks"  title="Open"></i> Received Task List </h3>
	  <?php echo $_SESSION['msg'];if(!empty($_SESSION['msg']))unset($_SESSION['msg']);?>
	  
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
				<span class="text" style="padding-right:830px;"><a href="todo_list.php?id=<?php echo $row['t_id'];?>">
				<?php 
				$taskres=mysqli_query($con,"select * from tasks where t_id='".$row['t_id']."'");
				$taskrow = mysqli_fetch_assoc($taskres);
				echo $taskrow['t_name'];?></a></span>
							<?php 
							
							if($taskrow['t_status'] == "2")
							{ 
								
							}
							else
							{
							?>								
					 <div class="tools">
					 <a href="close_task.php?id=<?php echo $row['t_id'];?>"><i class="fa fa-times"  title="Open"></i></a>
			  
					</div>
							<?php
							}
							?>
					
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
	<div class="row">
	  <div class="col-md-12">
	  <h3 class="box-title"><i class="fa fa-tasks"  title="Open"></i> Shared Task List </h3>
	  <?php echo $_SESSION['msg'];if(!empty($_SESSION['msg']))unset($_SESSION['msg']);?>
	  
		<div class="box box-aqua">
		  <div class="box-header ui-sortable-handle" style="cursor: move;">
		  
			<i class="ion ion-clipboard"></i>
			
			
		  </div>
	 
		  <div class="box-body">
			<ul class="todo-list ui-sortable">
			<?php
			while($sharerow = mysqli_fetch_assoc($sharedres))
			{
			
			
			?>
			  <li class="dropdown">
			
				<span class="handle ui-sortable-handle">
				  <i class="fa fa-ellipsis-v"></i>
				  <i class="fa fa-ellipsis-v"></i>
				</span>
				<span class="text" style="padding-right:830px;"><a href="todo_list.php?id=<?php echo $sharerow['t_id'];?>">
				<?php 
				$taskres=mysqli_query($con,"select * from tasks where t_id='".$sharerow['t_id']."'");
				$taskrow = mysqli_fetch_assoc($taskres);
				echo $taskrow['t_name'];?></a></span>
								
					 <div class="tools">
					 <a href="close_task.php?id=<?php echo $sharerow['t_id'];?>"><i class="fa fa-times"  title="Open"></i></a>
			  
            </div>
						
					
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
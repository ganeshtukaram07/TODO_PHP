<?php
include("header.php");
$res=mysqli_query($con,"select * from tasks where t_id=".$_GET['id']);
$listsres=mysqli_query($con,"select * from lists where t_id=".$_GET['id']);
//echo "UPDATE assign SET `a_status` = '1' WHERE t_id ='".$_GET['id']."' AND du_id='".$_SESSION['uid']."'";exit;
$updatestate=mysqli_query($con,"UPDATE assign SET `a_status` = '1' WHERE t_id ='".$_GET['id']."' AND du_id='".$_SESSION['uid']."'");
$row = mysqli_fetch_assoc($res);
?>
<div class="container">
	<div class="row">
	  <div class="col-md-12">
<div class="box-header ui-sortable-handle" style="cursor: move;">
        <i class="ion ion-clipboard"></i>
        <h3 class="box-title"> <i class="fa fa-list"  title="Open"></i> <?php echo $row['t_name'];?> </h3>  To Do List
        <p><?php echo $row['t_description'];?></p>
      </div>
<div class="box-body">
        <ul class="todo-list ui-sortable">
		<?php
			while($listrow = mysqli_fetch_assoc($listsres))
			{
			
			
			?>
          <li>
            <span class="handle ui-sortable-handle">
              <i class="fa fa-ellipsis-v"></i>
              <i class="fa fa-ellipsis-v"></i>
            </span>
            
            <span class="text"><?php echo $listrow['l_name'];?></span>
            
            <div class="tools">
			  <a href="share_task.php?id=<?php echo $_GET['id'];?>"><i class="fa fa-share" title="share"></i></a>
              <a href="edit_list.php?id=<?php echo $listrow['l_id'];?>"><i class="fa fa-edit"  title="Edit"></i></a>
              <a href="delete_list.php?id=<?php echo $listrow['l_id'];?>"><i class="fa fa-trash-o"  title="Delete"></i></a>
            </div>
          </li>
           <?php
			}
			?>
        </ul>
      </div>
      <div class="box-footer clearfix no-border">
      <button type="button" class="btn btn-default pull-right"><i class="fa fa-plus"></i> <a href="create_list.php?id=<?php echo $_GET['id'];?>">Add List</a></button>
      </div>
    </div>
  </div> 
</div>
    </div>
  </div>
<?php include("footer.php");?>
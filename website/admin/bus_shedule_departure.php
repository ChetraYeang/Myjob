 <?php
        	if(isset($_REQUEST["services_id"])){ 	
	        	// DATA from table Type Tours
				$stmt_op= $DB_con->prepare("SELECT * FROM services WHERE id_more_service=:services_id");
				$stmt_op -> execute(array(':services_id'=>$_REQUEST['services_id']));	        	
	        	$rs_service = $stmt_op -> fetch(PDO::FETCH_ASSOC);
        	}
      	?>
<div class="box box-solid box-primary ">
  <div class="box-header with-border">
    <h3 class="box-title">Departure Schedule</h3>
    <div class="box-tools pull-right">
      <!-- Buttons, labels, and many other things can be placed here! -->
      <!-- Here is a label for example -->
     <a href="sr-admin.php?page=services_list&sercive_type=<?php echo $_REQUEST["service_type"]; ?>" class="btn btn-block btn-primary btn-sm"> View all Tours</a>
    </div><!-- /.box-tools -->
  </div><!-- /.box-header -->
  <div class="box-body">
	<form  method="post" enctype="multipart/form-data" action="<?php if(isset($_REQUEST['action'])){echo "admin/services_update.php";}else{echo "admin/services_save.php"; }?>">
	</select>
        <?php if(isset($_REQUEST['msg'])){ ?>
	        <div class="alert alert-success alert-dismissable">
	            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
	            <h4>	<i class="icon fa fa-check"></i> Alert!</h4>
	            <?php echo $_REQUEST['msg']; ?>
	        </div>
        <?php  } ?>

       

		<div class="form-group">
			<label>Times</label>
			<input type="text" class="form-control" name="s_name" placeholder="Enter ..." value="<?php echo @$rs_service['service_name']; ?>">
		</div>
		
		
		<div class="form-group">
			<label>Destinations</label>
			<select class="form-control" data-placeholder="Select a destination" name="tour_dest">
				<?php
					$dest_sql =$DB_con->prepare("SELECT c_id, c_title FROM menu WHERE c_type =:num and c_main_id =:main_id");
					$dest_sql->execute(array(':num'=>2,':main_id' => 2));
                    while($result_dest=$dest_sql->fetch(PDO::FETCH_ASSOC)){
                		
                		if($result_dest['c_id']==$rs_service['id_destination']){ $select= "selected"; }else{ $select="";};
                ?>
            		<option value="<?php echo $result_dest['c_id']; ?>" <?php echo $select; ?> >
           		 		<?php echo $result_dest['c_title'];?>
            		</option>
                <?php
                			
                    }
				 ?>
				
			</select>
		</div>
		<div class="form-group">
			<label>Transportation Company</label>
			<select class="form-control" data-placeholder="Select a destination" name="tour_dest">
				<?php
					$com_sql =$DB_con->prepare("SELECT c_id, c_title FROM menu WHERE c_type =:num and c_main_id =:main_id");
					$com_sql->execute(array(':num'=>2,':main_id' => 51));
                    while($result_com=$com_sql->fetch(PDO::FETCH_ASSOC)){
                		
                		if($result_com['c_id']==$rs_service['id_destination']){ $select= "selected"; }else{ $select="";};
                ?>
            		<option value="<?php echo $result_dest['c_id']; ?>" <?php echo $select; ?> >
           		 		<?php echo $result_com['c_title'];?>
            		</option>
                <?php
                			
                    }
				 ?>
				
			</select>
		</div>
		<div class="form-group">
			<label>Prices</label>
			<input type="number" class="form-control" name="star_rate" placeholder="Enter ..." value="<?php echo @$rs_service['star']; ?>">
		</div>
		<div class="form-group">
			<label>Durations</label>
			<input type="number" class="form-control" name="star_rate" placeholder="Enter ..." value="<?php echo @$rs_service['star']; ?>">
		</div>

		<div class="form-group">
			<label>Vichicle Type</label>
			<input type="number" class="form-control" name="star_rate" placeholder="Enter ..." value="<?php echo @$rs_service['star']; ?>">
		</div>
    
		<div class="form-group">
			<div class="checkbox">
				<label>
				  <input type="checkbox" name="display" <?php if(@$rs_service['display']==1) echo 'checked="checked"'; ?>>
				  Check is disable / Uncheck is enable
				</label>
			</div>	
		</div>
		
        <div class="form-group">
			<div class="checkbox">
				<label>
				  <input type="checkbox" name="display" <?php if(@$rs_service['display']==1) echo 'checked="checked"'; ?>>
				  Check is show / Uncheck is unshow
				</label>
			</div>	
		</div>
		<input type="hidden" name="service_type" value="<?php echo $_REQUEST['service_type'];?>">
		<input type="hidden" name="services_id" value="<?php echo @$rs_service['id_more_service'];?>">
	
  </div><!-- /.box-body -->
  <div class="box-footer">
    <button type="submit" class="btn btn-primary">Submit</button>
  </div><!-- box-footer -->
  </form>
</div><!-- /.box -->
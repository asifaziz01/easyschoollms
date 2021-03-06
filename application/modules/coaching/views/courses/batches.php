<div class="row">
    <div class="col-12 list" >
	<?php
	$i = 1;
	if ($all_batches) {
		foreach ($all_batches as $row) { 
			?>
			<div class="card d-flex flex-row mb-3">
	            <div class="d-flex flex-grow-1 min-width-zero">
	                <div class="card-body align-self-center d-flex flex-column flex-md-row justify-content-between min-width-zero align-items-md-center">
	                	<div>
	                      <a class="list-item-heading mb-0 truncate w-40 w-xs-100" href="<?php echo site_url ('coaching/enrolments/create_batch/'.$coaching_id.'/'.$course_id.'/'.$row['batch_id']); ?>">
		                    <p class="mb-0 text-muted text-small w-15 w-xs-100 d-none">
	                    		<span class="badge badge-danger  "><?php echo $i; ?></span>
		                    </p>
	                        <h4><?php echo $row["batch_name"];?></h4>
	                      </a>           				 
						</div>
                    	<?php if ($row['start_date'] > 0 ) { ?>
		                    <p class="mb-0 text-muted text-small w-15 w-xs-100">
								<?php echo 'Starting On:<br> '. date('d M, Y', $row["start_date"]); ?>
							</p>
						<?php } ?> 
						<?php if ($row['end_date'] > 0 ) { ?>
		                    <p class="mb-0 text-muted text-small w-15 w-xs-100">
								<?php echo 'Ending On:<br> '.date('d M, Y', $row["end_date"]); ?>
							</p>
						<?php } ?>
	                    <div class="w-20 w-xs-100">
	                    	<span class="badge badge-primary"><?php echo $row['num_users']; ?> Users</span>
	                    </div>
	                </div>
	            </div>
                <div class="mr-2 align-self-center">
                	<div class="dropdown d-inline-block ">
                        <button class="btn btn-outline-primary btn-sm dropdown-toggle mb-1" type="button" id="manageMenu<?php echo $row['batch_id']; ?>" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                            Manage
                        </button>
                        <div class="dropdown-menu " aria-labelledby="manageMenu<?php echo $row['batch_id']; ?>" x-placement="bottom-start" >
							<a href="<?php echo site_url('coaching/enrolments/schedule/'.$coaching_id.'/'.$course_id.'/'.$row["batch_id"]); ?>" class="dropdown-item" >
								<i class="fa fa-calendar"></i> Schedule
							</a>
							<a href="<?php echo site_url ('coaching/enrolments/batch_users/'.$coaching_id.'/'.$course_id.'/'.$row['batch_id']); ?>" class="dropdown-item">
								<i class="fa fa-users"></i> Users 
							<a href="<?php echo site_url ('coaching/virtual_class/index/'.$coaching_id.'/'.$course_id.'/'.$row['batch_id']); ?>" class="dropdown-item">
								<i class="fa fa-video"></i> Virtual Classrooms 
							</a>							
		                    <?php if ($is_admin): ?>
		                    	<div class="separator"></div>
								<a href="<?php echo site_url('coaching/enrolments/create_batch/'.$coaching_id.'/'.$course_id.'/'.$row["batch_id"]); ?>" class="dropdown-item">
									<i class="fa fa-edit"></i> Edit
								</a>								
								<a href="javascript:void(0);" onclick="show_confirm ('Are you sure delete this batch?', '<?php echo site_url('coaching/enrolment_actions/delete_batch/'.$coaching_id.'/'.$course_id.'/'.$row["batch_id"]); ?>')" class="dropdown-item"><i class="fa fa-trash"></i> Delete </a>
							<?php endif; ?>
                        </div>
                    </div>
				</div>
	        </div>

			<li class="list-group-item media d-none">
				<div class="media-left">
				</div>
				<div class="media-body">
					<a href="<?php echo site_url ('coaching/enrolments/batch_users/'.$coaching_id.'/'.$course_id.'/'.$row['batch_id']); ?>"><?php echo $row["batch_name"];?></a><br>
					<?php 
					if ($row['start_date'] > 0 ) {
						echo '<div class="text-muted">Starting On: '. date('d M, Y', $row["start_date"]).'</div>';
					} 
					if ($row['end_date'] > 0 ) {
						echo '<div class="text-muted">Ending On: '.date('d M, Y', $row["end_date"]).'</div>';
					} 
					?>
					<?php if($is_admin): ?>
					<div class="btn-group">
						<a href="<?php echo site_url('coaching/enrolments/create_batch/'.$coaching_id.'/'.$course_id.'/'.$row["batch_id"]); ?>" class="btn btn-xs"><i class="fa fa-edit"></i> </a>	
						<a href="javascript:void(0);" onclick="show_confirm ('Are you sure delete this batch?', '<?php echo site_url('coaching/enrolment_actions/delete_batch/'.$coaching_id.'/'.$course_id.'/'.$row["batch_id"]); ?>')" class="btn btn-xs"><i class="fa fa-trash"></i> </a>
					</div>
					<?php endif; ?>
				</div>
				<div class="media-right">
					<a href="<?php echo site_url('coaching/enrolments/schedule/'.$coaching_id.'/'.$course_id.'/'.$row["batch_id"]); ?>" class="btn btn-info" ><i class="fa fa-calendar"></i> Schedule</a>	
				</div>
				<div class="media-right">
					<?php echo '<a href="'.site_url ('coaching/enrolments/batch_users/'.$coaching_id.'/'.$course_id.'/'.$row['batch_id']).'" class="btn btn-success">'.$row['num_users'].' Users</a>'; ?>
				</div>
			</li>
		<?php } 
		} else {
			?>
			<li class="list-group-item ">
				<div class="text-danger">No batches found. <?php echo anchor ('coaching/enrolments/create_batch/'.$coaching_id.'/'.$course_id, 'Create Batch', ['class'=>'btn btn-outline-primary']); ?></div>
			</li>
			<?php
		}
		?>
	</ul>
</div>
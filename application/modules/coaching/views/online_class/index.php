<div class="card card-default">
	<ul class="list-group">	
		<?php 
			$i=1;
			if (! empty ($class)) {
				foreach($class as $row) { 
					?>
					<li class="list-group-item d-flex flex-sm-row flex-column">
						<div class="flex-grow-1 my-auto">
							<h4>
								<?php echo $row["meeting_url"]; ?>
							</h4>
							<p class="text-muted mb-0">
								<?php if ($row['app_type'] == OC_APP_ZOOM ) { ?>
									<span>Zoom App</span>
								<?php } else if ($row['app_type'] == OC_APP_GOOGLE ) { ?>
									<span>Google Meet</span>
								<?php } else if ($row['app_type'] == OC_APP_JIO ) { ?>
									<span>Jio Meet</span>
								<?php } else { ?>
									<span>Other</span>
								<?php } ?>
							</p>
							<p>
								Created on: <?php echo date ('d M, Y', $row['created_on']); ?>
							</p>
						</div>
						<div class="flex-shrink-1 px-sm-3 my-auto">
							<a href="<?php echo $row['meeting_url']; ?>" class="btn btn-primary "> Join </a>
							<a onclick="show_confirm ('Delete this online class?', '<?php echo site_url ('coaching/online_class_actions/delete_class/'.$coaching_id.'/'.$course_id.'/'.$row['id']); ?>')" href="#" class="btn btn-danger "><i class="fa fa-trash"></i></a>
						</div>
					</li>
					<?php
					$i++; 
				}

			} else {
				?>
				<li class="list-group-item">
					<span class="text-danger">No online class added yet</span> 
					<?php echo anchor ('coaching/online_class/add_class/'.$coaching_id.'/'.$course_id, 'Add Class'); ?>
				</li>
				<?php
			}
		?> 
		</ul> 
	</div>
</div>


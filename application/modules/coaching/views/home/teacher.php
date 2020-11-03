<div class="row">
	<!-- // Col-md-6 -->
	<div class="col-md-6">
		<!----// Class //-->
		<div class="card mb-4 shadow">
			<div class="position-absolute card-top-buttons p-4 mt-1 mr-1">
				<h4 class="card-title mb-0">
					<span class="badge badge-primary"><?php echo $num_courses; ?></span>
				</h4>
            </div>
			<div class="card-body">
				<h4 class="card-title d-flex justify-content-between">
					<span><i class="iconsminds-books "></i> My Subjects</span>
				</h4>
				<div class="separator mb-5"></div>
				<div class="scroll" style="height:250px;">
					<?php
					$i = 0;
					if (! empty($courses)) {
						foreach ($courses as $row) {
							?>
							 <div class="d-flex flex-row justify-content-between mb-3 pb-3 border-bottom">
							 	<div class="flex-grow-1 my-auto">
				                  <?php echo $row['title']; ?>
		                            <div class="text-muted text-small">
		                              <?php
		                                if ($row['cat_id'] == 0)
		                                  echo 'Uncategorized';
		                                else
		                                  echo $row['cat_title'];
		                              ?>
		                            </div>
							 	</div>
			                  	<div class="flex-shrink-0 my-auto mr-3">
			                      	<?php 
				                        if ($row['status'] == COURSE_STATUS_ACTIVE) {
				                          echo '<span class="badge badge-success">Published</span>';
				                        } else {
				                          echo '<span class="badge badge-danger">Unpublished</span>';
				                        }
			                        ?>
				                </div>
				                <div class="flex-shrink-0">
				                    <a class="btn btn-primary" href="<?php echo site_url ('coaching/courses/manage/'.$coaching_id.'/'.$row['course_id']); ?>"><i class="fa fa-cog"></i> Manage </a>
			    	            </div>
			                </div>
							<?php
							$i++;
							if ($i >= 5) {
								break;
							}
						}
					} else {
						?>
						<div class="alert alert-danger">
							No subject created
						</div>
						<?php
					}
					?>
				</div>
			</div>
		</div>
	</div>


	<div class="col-md-6">
		<!----// Class //-->
		<div class="card mb-4 shadow">
			<div class="position-absolute card-top-buttons p-4 mt-1 mr-1">
				<h4 class="card-title mb-0">
					<span class="badge badge-primary"><?php echo $num_oc; ?></span>
				</h4>
            </div>
			<div class="card-body">
				<h4 class="card-title d-flex justify-content-between">
					<span><i class="iconsminds-books "></i> Online Classes</span>
				</h4>
				<div class="separator mb-5"></div>
				<div class="scroll" style="height:250px;">
					<?php
					$i = 0;
					if (! empty($online_class)) {
					  foreach ($online_class as $oc) {
						if (! empty($oc)) {
						  foreach ($oc as $row) {
							?>
							 <div class="d-flex flex-row justify-content-between mb-3 pb-3 border-bottom">
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
			                  	<div class="flex-shrink-0 my-auto mr-3">
									<a href="<?php echo $row['meeting_url']; ?>" class="btn btn-primary "> Join </a>
				                </div>
			                </div>
							<?php
							$i++;
							if ($i >= 5) {
								break;
							}
						  }
						}
					  }
					} 
					if ($i == 0) {
						?>
						<div class="text-danger">
							No class created
						</div>
						<?php
					}
					?>
				</div>
			</div>
		</div>
	</div>
	
	<div class="col-md-6">
		<!-- Tests -->
		<div class="card mb-4 shadow">
			<div class="position-absolute card-top-buttons p-4 mt-1 mr-1">
				<h4 class="card-title mb-0">
					<span class="badge badge-primary"><?php echo $num_tests; ?></span>
				</h4>
            </div>
			<div class="card-body">
				<h4 class="card-title d-flex justify-content-between">
					<span><i class="iconsminds-books "></i> Tests</span>
				</h4>
				<div class="separator mb-5"></div>
				<div class="scroll" style="height:250px;">
					<?php
					$i = 0;
					if (! empty($tests)) {
					  foreach ($tests as $test) {
					  	if (! empty ($test)) {
					  	  foreach ($test as $row) {

							?>
							 <div class="d-flex flex-row justify-content-between mb-3 pb-3 border-bottom">
							 	<div class="flex-grow-1 my-auto">
				                  <?php echo $row['title']; ?>
		                            <div class="text-muted text-small">
		                              <?php
		                                if ($row['category_id'] == 0) {
		                                  //echo 'Uncategorized';
		                                } else {
		                                 //echo $row['cat_title'];
		                                }
		                              ?>
		                            </div>
							 	</div>
			                  	<div class="flex-shrink-0 my-auto mr-3">
			                      	<?php 
				                        if ($row['status'] == COURSE_STATUS_ACTIVE) {
				                          echo '<span class="badge badge-success">Published</span>';
				                        } else {
				                          echo '<span class="badge badge-danger">Unpublished</span>';
				                        }
			                        ?>
				                </div>
				                <div class="flex-shrink-0">
				                    <a class="btn btn-primary" href="<?php echo site_url ('coaching/courses/manage/'.$coaching_id.'/'.$row['test_id']); ?>"><i class="fa fa-cog"></i> Manage </a>
			    	            </div>
			                </div>
							<?php
							$i++;
							if ($i >= 5) {
								break;
							}
					  	  }
					  	}
 					  }
					} 
					if ($i == 0) {
						?>
						<div class="text-danger">
							No test created
						</div>
						<?php
					}
					?>
				</div>
			</div>
		</div>
		<!-- Tests -->
	</div>


	<div class="col-md-6">
		<!----// Announcements //-->
		<div class="card mb-4 shadow">
            <div class="card-body">
            	<h4 class="card-title d-flex justify-content-between">
					<span><i class="iconsminds-loudspeaker"></i> Announcements</span>
				</h4>
				<div class="separator mb-5"></div>
				<div class="scroll" style="height:250px;">
	                <?php 
	                if (! empty ($announcements)) {
						foreach ($announcements as $row) {
							?>
			                <div class="mb-4 border-bottom">
			                    <p class="mb-2">
			                        <a href="<?php echo site_url ('coaching/announcements/create_announcement/'.$coaching_id.'/'.$row['announcement_id']); ?>"><span><?php echo $row['title']; ?></span></a>
			                        <span class="float-right text-muted"><?php echo date ('j/M', $row['start_date']); ?></span>
			                    </p>
			                </div>
			                <?php
						}
					}
					?>
				</div>
            </div>
        </div>
	</div>
</div>

<div class="row justify-content-center d-none">
	<div class="col-md-12">
		<div class="card mb-4 shadow-sm">
			<div class="card-header ">
				<h4>My Classrooms</h4>
			</div>
			<ul class="list-group ">
				<?php 
				$i=1;
				if (! empty ($my_classrooms)) {
					foreach($my_classrooms as $row) { 
						?>
						<li class="list-group-item media">
							<div class="media-left">
								<?php if ($row['running'] == 'true') { ?>
									<span class="icon-block half rounded-circle bg-success">
										<i class="fa fa-video"></i>
									</span>
								<?php } else { ?>
									<span class="icon-block half rounded-circle bg-grey-200">
										<i class="fa fa-video"></i>									
									</span>
								<?php } ?>
							</div>
							<div class="media-body">
								<h4 class=""><?php echo $row['class_name']; ?></h4>
								<?php if ($row['running'] == 'true') { ?>
									<span class="badge badge-success">Class has started</span>
								<?php } else { ?>
									<span class="badge badge-default bg-grey-200">Class not started</span>
								<?php } ?>
								<?php if ($row['role'] == VM_PARTICIPANT_MODERATOR) { ?>
									<span class="badge badge-default bg-blue-200">Moderator</span>
								<?php } else { ?>
									<span class="badge badge-default bg-blue-200">Attendee</span>
								<?php } ?>
								<?php //echo anchor ('coaching/virtual_class/class_details/'.$coaching_id.'/'.$row['class_id'], $row['class_name']); ?>
								<div class="mt-2">
									<?php 
									if ($row['role'] == VM_PARTICIPANT_MODERATOR) {
										$button_text = 'Start and Join';
									} else {
										$button_text = 'Join';
									}
									if ($row['running'] == 'true') {
										$class = 'btn-success';
									} else {
										$class = 'btn-default';
									}
									echo anchor ('coaching/virtual_class/join_class/'.$coaching_id.'/'.$row['class_id'].'/'.$member_id, '<i class="fa fa-plus"></i> '.$button_text, ['class'=>'btn mr-1 '.$class]);
									echo anchor ('coaching/virtual_class/participants/'.$coaching_id.'/'.$row['class_id'].'/'.$member_id, '<i class="fa fa-plus"></i> Participants', ['class'=>'btn btn-info mr-1 ']);
									?>
								</div>
							</div>

							<div class="media-right">
							</div>
						</li>
						<?php
						$i++;
						if ($i >= 3) {
							break;
						}
					}
				} else {
		        	?>
		            <div class="text-danger my-4 mx-2">
		                You are not in any class
		            </div>
		            <?php
		        }
				?>
			</ul>
		</div>
	</div>
</div>

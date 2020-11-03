<div class="row">
	<!-- // Col-md-6 -->
	<div class="col-md-6">
		<!----// Class //-->
		<div class="card mb-4 shadow">
			<div class="position-absolute card-top-buttons p-4 mt-1 mr-1">
				<h4 class="card-title mb-0">
					<span class="badge badge-primary"><?php //echo $num_courses; ?></span>
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
				                  	<h4><?php echo $row['title']; ?></h4>
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
			                      	
				                </div>
				                <div class="flex-shrink-0">
				                    <a class="btn btn-primary" href="<?php echo site_url ('student/courses/home/'.$coaching_id.'/'.$member_id.'/'.$row['course_id']); ?>"><i class="fa fa-cog"></i> Learn </a>
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
							No subjects found
						</div>
						<?php
					}
					?>
				</div>
			</div>
		</div>
	</div>


	<!-- // Col-md-6 -->
	<div class="col-md-6">
		<!----// Class //-->
		<div class="card mb-4 shadow">
			<div class="position-absolute card-top-buttons p-4 mt-1 mr-1">
				<h4 class="card-title mb-0">
					<span class="badge badge-primary"><?php //echo $num_courses; ?></span>
				</h4>
            </div>
			<div class="card-body">
				<h4 class="card-title d-flex justify-content-between">
					<span><i class="iconsminds-books "></i> Online Class</span>
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


	<!-- // Col-md-6 -->
	<div class="col-md-6">
		<!----// Class //-->
		<div class="card mb-4 shadow">
			<div class="position-absolute card-top-buttons p-4 mt-1 mr-1">
				<h4 class="card-title mb-0">
					<span class="badge badge-primary"><?php //echo $num_courses; ?></span>
				</h4>
            </div>
			<div class="card-body">
				<h4 class="card-title d-flex justify-content-between">
					<span><i class="iconsminds-books "></i> Online Tests</span>
				</h4>
				<div class="separator mb-5"></div>
				<div class="scroll" style="height:250px;">
					<?php 
				$i = 0;
				if (! empty ($my_tests)) {
					foreach ($my_tests as $row) {
						$tests = $row['tests'];
						if (! empty ($tests)) {
							foreach ($tests as $test) {
								?>
								<div class="d-flex pb-3 mb-3 border-bottom flex-column flex-sm-row">
									<div class="flex-grow-1 my-auto">
										<h3><?php echo $test['title']; ?></h3>
										<h6><?php echo $row['title']; ?></h6>
										<div>
											<i class="simple-icon-chart"></i>
											<strong class="mx-2">Duration:</strong>
											<span><?php echo $test['time_min']; ?> min</span>
										</div>
										<div>
											<i class="simple-icon-graph"></i>
											<strong class="mx-2">Pass Percent:</strong>
											<span><?php echo $test['pass_marks']; ?>%</span>
										</div>
									</div>
									<div class="flex-shrink-0 my-auto">
										<a href="<?php echo site_url ('student/tests/take_test/'.$coaching_id.'/'.$member_id.'/'.$row['course_id'].'/'.$test['test_id']); ?>" class="btn btn-outline-primary">
											<i class="iconsminds-notepad"></i>
											<span class="ml-2">Take Tests</span>
										</a>
									</div>
								</div>
								<?php
								$i++;

								if ($i >= 3) {
									break;
								}
							}
							if ($i >= 3) {
								break;
							}
						}
						?>
						<?php
					}
				}
				if ($i == 0) {
					echo '<span class="text-danger">No tests right now</span>';
				}
				?>
				</div>
			</div>
		</div>
	</div>


	<!-- // Col-md-6 -->
	<div class="col-md-6">
		<!----// Class //-->
		<div class="card mb-4 shadow">
			<div class="position-absolute card-top-buttons p-4 mt-1 mr-1">
				<h4 class="card-title mb-0">
					<span class="badge badge-primary"><?php //echo $num_courses; ?></span>
				</h4>
            </div>
			<div class="card-body">
				<h4 class="card-title d-flex justify-content-between">
					<span><i class="iconsminds-books "></i> Online Tests</span>
				</h4>
				<div class="separator mb-5"></div>
				<div class="scroll" style="height:250px;">
					<?php 
					$i = 0;
					if (! empty ($my_tests)) {
						foreach ($my_tests as $row) {
							$tests = $row['tests'];
							if (! empty ($tests)) {
								foreach ($tests as $test) {
									?>
									<div class="d-flex pb-3 mb-3 border-bottom flex-column flex-sm-row">
										<div class="flex-grow-1 my-auto">
											<h3><?php echo $test['title']; ?></h3>
											<h6><?php echo $row['title']; ?></h6>
											<div>
												<i class="simple-icon-chart"></i>
												<strong class="mx-2">Duration:</strong>
												<span><?php echo $test['time_min']; ?> min</span>
											</div>
											<div>
												<i class="simple-icon-graph"></i>
												<strong class="mx-2">Pass Percent:</strong>
												<span><?php echo $test['pass_marks']; ?>%</span>
											</div>
										</div>
										<div class="flex-shrink-0 my-auto">
											<a href="<?php echo site_url ('student/tests/take_test/'.$coaching_id.'/'.$member_id.'/'.$row['course_id'].'/'.$test['test_id']); ?>" class="btn btn-outline-primary">
												<i class="iconsminds-notepad"></i>
												<span class="ml-2">Take Tests</span>
											</a>
										</div>
									</div>
									<?php
									$i++;

									if ($i >= 3) {
										break;
									}
								}
								if ($i >= 3) {
									break;
								}
							}
							?>
							<?php
						}
					}
					if ($i == 0) {
						echo '<span class="text-danger">No tests right now</span>';
					}
					?>
				</div>
			</div>
		</div>
	</div>


</div>


<div class="row">
	<div class="col-12">
		<h2>My Class</h2>
		<?php $i = 1; ?>
		<?php if (! empty ($batches)) { ?>
		<div class="card">
			<div class="card-body">
			  <div class="scroll" style="">
				<?php foreach($batches as $i=>$batch) { ?>
			        <div class="d-flex pb-3 mb-3 border-bottom flex-column flex-lg-row">
			            <div class="flex-grow-1 my-auto">
			            	<div class="d-flex">
			            		<div class="flex-grow-1 my-auto">
					            	<div class="d-flex flex-column flex-lg-row">
				            			<a href="<?php //echo site_url ('student/courses/home/'.$coaching_id.'/'.$member_id.'/'.$course['course_id'].'/'.$course['batch_id']); ?>" class="flex-grow-1 my-auto">
				                            <h5 class="mb-lg-0 listing-heading ellipsis"><?php echo $batch['batch_name']; ?></h5>
				                        </a>
					            		<div class="pr-3 px-lg-3 flex-shrink-1 my-auto">
					            			<p class="mb-0">
					            				
					            			</p>
					            		</div>
					            	</div>
			            		</div>
			            	</div>
			            </div>
			            <div class="flex-shrink-1 my-lg-auto mt-3">
			            	<a class="btn btn-primary" href="<?php //echo site_url ('student/courses/home/'.$coaching_id.'/'.$member_id.'/'.$course['course_id'].'/'.$course['batch_id']); ?>">Course Home <i class="fa fa-arrow-right"></i></a>
			            </div>
			        </div>
					<?php
					$i++;
					if ($i >= 3) {
						break;
					}
				}
				?>
			  </div>
			</div>
		</div>
		<?php } else { ?>
			<p>You are not enroled in any course yet</p>
		<?php } ?>
	</div>
</div>

<div class="row">
	<div class="col-12">
		
	</div>
</div>

<div class="row mt-5">
	<div class="col-md-8 ">

		

	</div>


	<div class="col-md-4 ">

		<h2 class="">My Tests</h2>
		<h3></h3>
		<div class="card mb-4 shadow-sm">
			<div class="card-body">
				<?php 
				$i = 0;
				if (! empty ($my_tests)) {
					foreach ($my_tests as $row) {
						$tests = $row['tests'];
						if (! empty ($tests)) {
							foreach ($tests as $test) {
								?>
								<div class="d-flex pb-3 mb-3 border-bottom flex-column flex-sm-row">
									<div class="flex-grow-1 my-auto">
										<h3><?php echo $test['title']; ?></h3>
										<h6><?php echo $row['title']; ?></h6>
										<div>
											<i class="simple-icon-chart"></i>
											<strong class="mx-2">Duration:</strong>
											<span><?php echo $test['time_min']; ?> min</span>
										</div>
										<div>
											<i class="simple-icon-graph"></i>
											<strong class="mx-2">Pass Percent:</strong>
											<span><?php echo $test['pass_marks']; ?>%</span>
										</div>
									</div>
									<div class="flex-shrink-0 my-auto">
										<a href="<?php echo site_url ('student/tests/take_test/'.$coaching_id.'/'.$member_id.'/'.$row['course_id'].'/'.$test['test_id']); ?>" class="btn btn-outline-primary">
											<i class="iconsminds-notepad"></i>
											<span class="ml-2">Take Tests</span>
										</a>
									</div>
								</div>
								<?php
								$i++;

								if ($i >= 3) {
									break;
								}
							}
							if ($i >= 3) {
								break;
							}
						}
						?>
						<?php
					}
				}
				if ($i == 0) {
					echo '<span class="text-danger">No tests right now</span>';
				}
				?>					
			</div>
		</div>
		<!--// My Tests ------------------>

		<h2 class="mt-4">Virtual Sessions</h2>
		<div class="card mb-4 shadow-sm">
			<div class="card-body">
				<div class="scroll" style="">
					<?php
					$i = 1;
					if (! empty ($classrooms)) {
						foreach ($classrooms as $class) {
							$course = $class['course'];
							?>
							<div class="d-flex pb-3 mb-3 border-bottom flex-column flex-sm-row">
								<div class="flex-grow-1 my-auto">
									<h3><?php echo $course['title']; ?></h3>
									<h6><?php echo $class['class_name']; ?></h6>
								</div>
								<div class="flex-shrink-0 my-auto">
	                            	<?php 
									if ($class['running'] == 'true') {
										echo anchor ('student/virtual_class/join_class/'.$coaching_id.'/'.$class['class_id'].'/'.$member_id.'/'.$class['course_id'].'/'.$class['batch_id'], '<i class="fa fa-plus"></i> Join ', ['class'=>'btn btn-primary mr-1']);
									} else {
										echo anchor ('student/virtual_class/join_class/'.$coaching_id.'/'.$class['class_id'].'/'.$member_id.'/'.$class['course_id'].'/'.$class['batch_id'], '<i class="fa fa-plus"></i> Join ', ['class'=>'btn btn-outline-primary mr-1']);
									}
									?>
								</div>
							</div>
							<?php
							$i++;
							if ($i > 3) {
								break;
							}
						}
					} else { 
						echo '<span class="text-danger">No virtual sessions</span>';
					}
					?>
				</div>
			</div>
		</div>
		<!--// My Classes ------------------>

		<h4 class="mt-4">Announcements</h4>

		<div class="card mb-4 shadow-sm ">
			<div class="card-body">
				<?php $i = 0; ?>
				<?php if (! empty ($annc)) { ?>
				<div class="scroll" style="height: 250px;">
					<?php foreach($annc as $row) { ?>
						<div class="flex-row justify-content-between">
							<div class="pr-3 flex-grow-1">
								<a href="<?php echo site_url ('student/announcements/view/'.$coaching_id.'/'.$member_id.'/'.$row['announcement_id']); ?>">
									<h4 class="text-left"><?php echo $row['title']; ?></h4>
									<p class="text-justify text-muted">
										<?php echo character_limiter ($row['description'], 80); ?>
									</p>
								</a>
							</div>
						</div>
						<div class="separator mb-2"></div>
						<?php 
						$i++;
						if ($i >= 3) {
							break;
						}
						?>
					<?php } ?>
				</div>
				<?php
				} else {
		        	?>
		            <div class="alert alert-info mb-0">There are no announcements.</div>
		            <?php
		        }
				?>
			</div>
			<div class="card-footer text-right">
				<?php echo anchor ('student/announcements/index/'.$coaching_id.'/'.$member_id, 'Show All', ['class'=>'btn btn-primary mr-1']); ?>
			</div>
		</div>
		<!--// Announcements ------------------>

</div>
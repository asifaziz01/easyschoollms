<div class="row">
    <div class="col-lg-4">
        <div class="card mb-4 progress-banner">
            <a href="<?php echo site_url ('coaching/subscription/index/'.$coaching_id.'/'.$subscription['sp_id']); ?>" class="card-body justify-content-between d-flex flex-row align-items-center">
                <div>
                    <div>
                    </div>
                </div>

                <div>
					<button class="btn btn-light btn-sm">Details</button>
                </div>
            </a>
        </div>
    </div>

    <div class="col-lg-4">
        <div class="card mb-4 progress-banner">
            <a href="<?php echo site_url ('coaching/users/index/'.$coaching_id); ?>" class="card-body justify-content-between d-flex flex-row align-items-center">
                <div>
                    <i class="iconsminds-conference mr-2 text-white align-text-bottom d-inline-block"></i>
                    <div>
                        <p class="lead text-white"><?php echo $users['total']; ?> Users</p>
                        <p class="text-small text-white"></p>
                    </div>
                </div>
                <div>
                	<button class="btn btn-light btn-sm">Go To Users</button>
                </div>
            </a>
        </div>
    </div>

    <div class="col-lg-4">
        <div class="card mb-4 progress-banner">
            <a href="<?php echo site_url ('coaching/courses/index/'.$coaching_id); ?>" class="card-body justify-content-between d-flex flex-row align-items-center">
                <div>
                    <i class="iconsminds-books mr-2 text-white align-text-bottom d-inline-block"></i>
                    <div>
                        <p class="lead text-white"><?php echo $num_courses; ?> Classes</p>
                        <p class="text-small text-white"></p>
                    </div>
                </div>
                <div>
                	<button class="btn btn-light btn-sm">Go To Classes</button>
                </div>
            </a>
        </div>
    </div>
</div>

<div class="row ">
	<!-- // Col-md-6 -->
	<div class="col-md-6">
		<!----// Class //-->
		<div class="card mb-4 shadow">
			<div class="card-body">
				<h4 class="card-title d-flex justify-content-between">
					<span><i class="iconsminds-add-user"></i> User Registration This Week</span>
				</h4>
				<div class="separator mb-5"></div>
				<div class="chart-container">
					<canvas id="user-registered"></canvas>
				</div>
			</div>
		</div>

		<!----// Users //-->
		<div class="card mb-4 shadow">
			<div class="position-absolute card-top-buttons p-4 mt-1 mr-1">
				<h4 class="card-title mb-0">
					<span class="badge badge-primary"><?php echo $users['total']; ?></span>
				</h4>
            </div>
			<div class="card-body ">
				<h4 class="card-title d-flex justify-content-between">
					<span><i class="iconsminds-conference"></i> Users</span>
				</h4>
				<div class="separator mb-5"></div>
				<div class="scroll" style="height:250px;">
					<div class="mb-3 pb-3 border-bottom">
						<div class="d-flex flex-row justify-content-between position-relative">
							<div class="h3 flex-shrink-0 my-auto">
		                    	<span class="font-weight-medium mb-0"><i class="iconsminds-administrator mr-2"></i></span>
		                    </div>
		                    <div class="h6 flex-grow-1 my-auto">
		                        <a href="<?php echo site_url ('coaching/users/index/'.$coaching_id.'/'.USER_ROLE_COACHING_ADMIN); ?>" class="stretched-link">
		                        	<span class="font-weight-medium mb-0">Admin</span>
		                        </a>
		                    </div>
		                    <div class="flex-shrink-0 my-auto">
		                    	<span class="badge badge-primary "><?php echo $users['num_admins']; ?></span>
		                    </div>
		                </div>
					</div>
	                <div class="mb-3 pb-3 border-bottom">
		                <div class="d-flex flex-row justify-content-between position-relative">
		                	<div class="h3 flex-shrink-0 my-auto">
		                    	<span class="font-weight-medium mb-0"><i class="iconsminds-business-man-woman mr-2"></i></span>
		                    </div>
		                    <div class="h6 flex-grow-1 my-auto">
		                        <a href="<?php echo site_url ('coaching/users/index/'.$coaching_id.'/'.USER_ROLE_TEACHER); ?>" class="stretched-link">
		                        	<span class="font-weight-medium mb-0">Teachers</span>
		                        </a>
		                    </div>
		                    <div class="flex-shrink-0 my-auto">
		                    	<span class="badge badge-primary "><?php echo $users['num_teachers']; ?></span>
		                    </div>
		                </div>
	                </div>
	                <div class="mb-3 pb-3 border-bottom">
		                <div class="d-flex flex-row justify-content-between position-relative">
		                	<div class="h3 flex-shrink-0 my-auto">
		                    	<span class="font-weight-medium mb-0"><i class="iconsminds-student-male-female mr-2"></i></span>
		                    </div>
		                    <div class="h6 flex-grow-1 my-auto">
		                        <a href="<?php echo site_url ('coaching/users/index/'.$coaching_id.'/'.USER_ROLE_STUDENT); ?>" class="stretched-link">
		                        	<span class="font-weight-medium mb-0">Students</span>
		                        </a>
		                    </div>
		                    <div class="flex-shrink-0 my-auto">
		                    	<span class="badge badge-primary "><?php echo $users['num_students']; ?></span>
		                    </div>
		                </div>
	                </div>
	                <?php if($users['num_pending'] > 0): ?>
	                <div class="mb-3 pb-3 border-bottom">
		                <div class="d-flex flex-row justify-content-between position-relative">
		                    <div class="h6 flex-grow-1 my-auto">
		                        <a href="<?php echo site_url ('coaching/users/index/'.$coaching_id.'/0/'.USER_STATUS_UNCONFIRMED); ?>" class="stretched-link">
		                        	<span class="font-weight-medium mb-0">Pending For Approval</span>
		                        </a>
		                    </div>
		                    <div class="flex-shrink-1 my-auto">
		                    	<span class="badge badge-primary "><?php echo $users['num_pending']; ?></span>
		                    </div>
		                </div>
	                </div>
	            	<?php endif; ?>
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
					<span class="badge badge-primary"><?php echo $num_courses; ?></span>
				</h4>
            </div>
			<div class="card-body">
				<h4 class="card-title d-flex justify-content-between">
					<span><i class="iconsminds-books "></i> Classes</span>
				</h4>
				<div class="separator mb-5"></div>
				<div class="scroll" style="height:300px;">
						<?php
						$i = 0;
						if (! empty($courses)) {
							foreach ($courses as $row) {
								?>
								 <div class="d-flex flex-row justify-content-between mb-3 pb-3 border-bottom">
								 	<div class="flex-grow-1 my-auto">
					                  <a class="d-flex" href="<?php echo site_url ('coaching/users/batch_users/'.$coaching_id.'/'.$row['batch_id']); ?>" style="font-size: 1.1rem;">
					                      <span class="flex-grow-1 my-auto"><?php echo $row['batch_name']; ?></span>
					                  </a>
								 	</div>
				                  <div class="flex-shrink-0 my-auto">
				                    <a class="btn btn-outline-primary btn-sm" href="<?php echo site_url ('coaching/users/batch_users/'.$coaching_id.'/'.$row['batch_id']); ?>"><i class="fa fa-users"></i> Users </a>

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
								No class created
							</div>
							<?php
						}
						?>
				</div>
			</div>
		</div>
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

<div class="card fixed d-none">
	<ul class="nav nav-pills nav-fill">
		<?php
		if (! empty ($dashboard_menu)) {
			foreach ($dashboard_menu as $menu) {
				$link = $menu['controller_path'].'/'.$menu['controller_nm'].'/'.$menu['action_nm'].'/'.$coaching_id;
				?>
				<li class="nav-item">					
					<a href="<?php echo site_url ($link); ?>" class="nav-link text-grey-600">
						<span class="d-block"><?php echo $menu['icon_img']; ?></span>
						<span><?php echo $menu['menu_desc']; ?></span>
					</a>
				</li>
				<?php
				}
			}
		?>
	</nav>
</div>
<div class="row mb-4">
    <!-- Chapters -->
    <div class="col-lg-6 col-md-12 mb-4">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title text-primary">
                	<span><i class="simple-icon-notebook pr-3"></i></span>Chapters <span class="badge badge-primary float-right"><?php echo $num_lessons; ?></span>
                </h5>
                <div class="separator mb-5"></div>
                <div class="card-body p-0 align-self-center justify-content-between min-width-zero align-items-md-center">
	                <a class="list-item-heading mb-0 truncate w-100 mt-0 d-inline-block" href="<?php echo site_url ('coaching/lessons/index/'.$coaching_id.'/'.$course_id); ?>">
	                    <i class="simple-icon-book-open heading-icon"></i>
	                    <span class="align-middle d-inline-block">Chapters</span>
	                </a>
	                <a class="list-item-heading mb-0 truncate w-100 mt-0 d-inline-block" href="<?php echo site_url ('coaching/lessons/create/'.$coaching_id.'/'.$course_id); ?>">
	                    <i class="simple-icon-plus heading-icon"></i>
	                    <span class="align-middle d-inline-block">Create Chapter</span>
	                </a>
	            </div>
            </div>
        </div>
    </div>
    
    <!-- Tests -->
    <div class="col-lg-6 col-md-12 mb-4">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title text-primary">
                	<span><i class="simple-icon-puzzle pr-3"></i></span>Tests <span class="badge badge-primary float-right"><?php echo $num_tests; ?></span>
                </h5>
                <div class="separator mb-5"></div>
                <div class="card-body p-0 align-self-center justify-content-between min-width-zero align-items-md-center">
	                <a class="list-item-heading mb-0 truncate w-100 mt-0 d-inline-block" href="<?php echo site_url ('coaching/tests/index/'.$coaching_id.'/'.$course_id); ?>">
	                    <i class="simple-icon-puzzle heading-icon"></i>
	                    <span class="align-middle d-inline-block">Tests</span>
	                </a>
	                <a class="list-item-heading mb-0 truncate w-100 mt-0 d-inline-block" href="<?php echo site_url ('coaching/tests/create_test/'.$coaching_id.'/'.$course_id); ?>">
	                    <i class="simple-icon-plus heading-icon"></i>
	                    <span class="align-middle d-inline-block">Create Test</span>
	                </a>
                
	            </div>
            </div>
        </div>
    </div>

    <!-- Teachers -->
	<?php if ($is_admin) { ?>
	    <div class="col-lg-6 col-md-12 mb-4">
	        <div class="card">
	            <div class="card-body">
	                <h5 class="card-title text-primary">
	                	<span><i class="iconsminds-business-man-woman pr-3"></i></span>Teachers <span class="badge badge-primary float-right"><?php echo $num_teachers; ?></span>
	                </h5>
	                <div class="separator mb-5"></div>
	                <div class="card-body p-0 align-self-center justify-content-between min-width-zero align-items-md-center">
		                <a class="list-item-heading mb-0 truncate w-100 mt-0 d-inline-block" href="<?php echo site_url ('coaching/courses/teachers/'.$coaching_id.'/'.$course_id); ?>">
		                    <i class="iconsminds-business-man-woman heading-icon"></i>
		                    <span class="align-middle d-inline-block">Teachers</span>
		                </a>
		                <a class="list-item-heading mb-0 truncate w-100 mt-0 d-inline-block" href="<?php echo site_url ('coaching/courses/teachers/'.$coaching_id.'/'.$course_id.'/'.TEACHERS_NOT_ASSIGNED); ?>">
		                    <i class="iconsminds-add-user heading-icon"></i>
		                    <span class="align-middle d-inline-block">Add Teacher</span>
		                </a>
		            </div>
	            </div>
	        </div>
	    </div>
	<?php } ?>
    
    <!-- Organize -->
    <div class="col-lg-6 col-md-12 mb-4">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title text-primary">
                	<span><i class="iconsminds-calendar-1 pr-3"></i></span>Organize <span class="badge badge-primary float-right"></span>
                </h5>
                <div class="separator mb-5"></div>
                <div class="card-body p-0 align-self-center justify-content-between min-width-zero align-items-md-center">
	                <a class="list-item-heading mb-0 truncate w-100 mt-0 d-inline-block" href="<?php echo site_url ('coaching/courses/organize/'.$coaching_id.'/'.$course_id); ?>">
	                    <i class="iconsminds-calendar-1 heading-icon"></i>
	                    <span class="align-middle d-inline-block">Organize Contents </span>
	                </a>
	                 <a class="list-item-heading mb-0 truncate w-100 mt-0 d-inline-block" href="<?php echo site_url ('coaching/courses/preview/'.$coaching_id.'/'.$course_id); ?>">
	                    <i class="iconsminds-preview heading-icon"></i>
	                    <span class="align-middle d-inline-block">Preview Course</span>
	                </a>
	            </div>
            </div>
        </div>
    </div>

	<!-- Online Class -->
    <div class="col-lg-6 col-md-12 mb-4">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title text-primary">
                	<span><i class="iconsminds-monitor---phone pr-3"></i></span>Online Classes <span class="badge badge-primary float-right"></span>
                </h5>
                <div class="separator mb-5"></div>
                <div class="card-body p-0 align-self-center justify-content-between min-width-zero align-items-md-center">
	                <a class="list-item-heading mb-0 truncate w-100 mt-0 d-inline-block" href="<?php echo site_url ('coaching/online_class/index/'.$coaching_id.'/'.$course_id); ?>">
	                    <i class="iconsminds-monitor---phone heading-icon"></i>
	                    <span class="align-middle d-inline-block">All Classes </span>
	                </a>
	                 <a class="list-item-heading mb-0 truncate w-100 mt-0 d-inline-block" href="<?php echo site_url ('coaching/online_class/add_class/'.$coaching_id.'/'.$course_id); ?>">
	                    <i class="iconsminds-add heading-icon"></i>
	                    <span class="align-middle d-inline-block">Add Class</span>
	                </a>
	            </div>
            </div>
        </div>
    </div>

	<!-- Announcements -->
    <div class="col-lg-6 col-md-12 mb-4">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title text-primary">
                	<span><i class="iconsminds-monitor---phone pr-3"></i></span>Announcements <span class="badge badge-primary float-right"></span>
                </h5>
                <div class="separator mb-5"></div>
                <div class="card-body p-0 align-self-center justify-content-between min-width-zero align-items-md-center">
	                <a class="list-item-heading mb-0 truncate w-100 mt-0 d-inline-block" href="<?php echo site_url ('coaching/announcements/index/'.$coaching_id.'/'.$course_id); ?>">
	                    <i class="iconsminds-monitor---phone heading-icon"></i>
	                    <span class="align-middle d-inline-block">All Announcements </span>
	                </a>
	                 <a class="list-item-heading mb-0 truncate w-100 mt-0 d-inline-block" href="<?php echo site_url ('coaching/announcements/create_announcements/'.$coaching_id.'/'.$course_id); ?>">
	                    <i class="iconsminds-add heading-icon"></i>
	                    <span class="align-middle d-inline-block">Add Announcement</span>
	                </a>
	            </div>
            </div>
        </div>
    </div>


    <!-- Settings -->
    <div class="col-lg-6 col-md-12 mb-4">
    	<div class="card">
    		<div class="card-body">
    			<h5 class="card-title text-primary">
    				<span><i class="iconsminds-gear pr-3"></i></span>Settings <span class="badge badge-primary float-right"></span>
    			</h5>
    			<div class="separator mb-5"></div>
    			<div class="card-body p-0 align-self-center justify-content-between min-width-zero align-items-md-center">
    				<?php if ($course['status'] == 0) { ?>
    					<a class="list-item-heading mb-0 truncate w-100 mt-0 d-inline-block" href="javascript:void(0)" onclick="javascript:show_confirm ('Are you sure you want to publish this course?', '<?php echo site_url('coaching/courses_actions/publish/'.$coaching_id.'/'.$course_id); ?>')" title="Publish Test">
    						<i class="simple-icon-cloud-upload heading-icon"></i>
    						<span class="align-middle d-inline-block">Publish</span>
    					</a>
    					<?php if ($is_admin == true) { ?>
    						<a class="list-item-heading mb-0 truncate w-100 mt-0 d-inline-block" href="<?php echo site_url ('coaching/courses/edit/'.$coaching_id.'/'.$cat_id.'/'.$course_id); ?>">
    							<i class="simple-icon-pencil heading-icon"></i>
    							<span class="align-middle d-inline-block">Edit</span>
    						</a>
		                <?php } ?>
		            <?php } else { ?>
		            	<a class="list-item-heading mb-0 truncate w-100 mt-0 d-inline-block" href="javascript:void(0)" onclick="javascript:show_confirm ('Are you sure you want to un-publish this course?', '<?php echo site_url('coaching/courses_actions/unpublish/'.$coaching_id.'/'.$course_id); ?>')" title="Un-Publish Test">
		                    <i class="simple-icon-cloud-download heading-icon"></i>
		                    <span class="align-middle d-inline-block">Un-Publish</span>
		                </a>
		            <?php } ?>
		            <?php if ($is_admin == true) { ?>
						
						<!------ DUPLICATE COURSE ------------>
		            	<a href="#" class="list-item-heading mb-0 truncate w-100 mt-0 d-inline-block" data-toggle="modal" data-target=".duplicate-modal-sm">
							<i class="iconsminds-duplicate-layer heading-icon"></i>
		            		<span class="align-middle d-inline-block">Duplicate Course</span>
		            	</a>
		            	<div class="modal fade duplicate-modal-sm" tabindex="-1" role="dialog" aria-hidden="true" style="display: none;">
		            		<div class="modal-dialog modal-sm">
		            			<?php echo form_open ('coaching/courses_actions/duplicate_course/'.$coaching_id.'/'.$course_id, ['class'=>'validate-form']); ?>
			            			<div class="modal-content">
			            				<div class="modal-body ">
			            					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
			            						<span aria-hidden="true">×</span>
			            					</button>
			            					<h5 class="modal-title">New course name</h5>
			            					<input type="text" name="new_title" class="form-control" value="<?php echo $course['title'] . ' - Duplicate'; ?>">
			            					<hr>
			            					<label>
				            					<input type="checkbox" name="switch_to_course" value="1"> Switch to new course
				            				</label>
			            					<button type="submt" class="btn btn-primary ml-3" >Submit</button>
			            				</div>
			            			</div>
			            		</form>
		            		</div>
		            	</div>
						<!------ DELETE COURSE ------------>

						<!------ DELETE COURSE ------------>
		            	<a href="#" class="list-item-heading mb-0 truncate w-100 mt-0 d-inline-block" data-toggle="modal" data-target=".bd-example-modal-sm"><i class="simple-icon-trash heading-icon"></i> Delete</a>
		            	<div class="modal fade bd-example-modal-sm" tabindex="-1" role="dialog" aria-hidden="true" style="display: none;">
		            		<div class="modal-dialog modal-sm">
		            			<div class="modal-content">
		            				<div class="modal-header">
		            					<h5 class="modal-title">Delete this course?</h5>
		            					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
		            						<span aria-hidden="true">×</span>
		            					</button>
		            				</div>
		            				<div class="modal-body text-danger">
		            					This action is irreversible. Course once deleted cannot be recovered. Proceed?
		            					<hr>
		            					<a href="<?php echo site_url ('coaching/courses_actions/delete_course/'.$coaching_id.'/'.$course_id); ?>" class="btn btn-danger">Yes, Delete this course</a>
		            					<button type="button" class="btn btn-link" data-dismiss="modal">Cancel</button>
		            				</div>
		            			</div>
		            		</div>
		            	</div>
						<!------ DELETE COURSE ------------>
		            <?php } ?>
		        </div>
		    </div>
		</div>
	</div>
</div>
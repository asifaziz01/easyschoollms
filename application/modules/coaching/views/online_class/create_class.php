<div class="row justify-content-center">
	<div class="col-md-6">
		<div class="card card-default">
			<div class="card-body">
				<?php echo form_open('coaching/online_class_actions/add_class/'.$coaching_id.'/'.$course_id.'/'.$class_id, array('class'=>'form-horizontal row-border', 'id'=>'validate-1')); ?>

					<div class="form-group ">
						<?php echo form_label('App Type ', '', array('class'=>'control-label')); ?>
						<select class="form-control" name="app_type">
							<option value="<?php echo OC_APP_ZOOM; ?>">Zoom App</option>
							<option value="<?php echo OC_APP_GOOGLE; ?>">Google Meet </option>
							<option value="<?php echo OC_APP_JIO; ?>">Jio Meet </option>
							<option value="<?php echo OC_APP_OTHER; ?>">Other </option>
						</select>
					</div>
					
					<div class="form-group ">
						<?php echo form_label('Meeting Url <span class="required">*</span>', '', array('class'=>'control-label')); ?>
						<input type="text" class="form-control required" name="meeting_url" value="<?php echo set_value('meeting_url', $class['meeting_url']); ?>" />
					</div>

					<div class="form-group ">
						<?php echo form_label('Meeting Password (If any)', '', array('class'=>'control-label')); ?>
						<input type="text" class="form-control " name="meeting_password" value="<?php echo set_value('meeting_password', $class['meeting_password']); ?>" />
					</div>
					
					<div class="separator mb-4"></div>

					<input type="submit" name="submit" value="Save" class="btn btn-primary">
				</form>	
			</div>
		</div>
	</div>
</div>
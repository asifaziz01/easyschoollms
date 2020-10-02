<div class="row">
	<div class="col-md-12">
		<?php echo form_open('coaching/courses_actions/create_edit_action/' . $coaching_id . '/' . $cat_id . '/' . $course_id, array('class' => 'card', 'id' => 'validate-1')); ?>
			<div class="card-body">
				<div class="form-group">
					<label for="title">Subject Name</label>
					<input type="text" class="form-control" id="title" name="title" placeholder="Name of the subject"<?php echo (isset($course['title'])) ? ' value="' . $course['title'] . '"' : ' '; ?>/>
				</div>
				
				<div class="form-group d-none">
					<label for="description">Description</label>
					<textarea class="form-control tinyeditor" id="description" name="description" rows="4" placeholder="How you describe this course?"><?php echo (isset($course['description'])) ? $course['description'] : ''; ?></textarea>
				</div>

				<div class="form-group d-none">
					<label for="curriculum">Curriculum</label>
					<textarea class="form-control tinyeditor" id="curriculum" name="curriculum" rows="4" placeholder="Curriculum of this course?"><?php echo (isset($course['curriculum'])) ? $course['curriculum'] : ''; ?></textarea>
				</div>

				<div class="form-group ">
					<input type="hidden" name="enrolment_type" value="1" id="enrolment_direct" >
				</div>

				<div class="form-group ">
					<label for="curriculum">Class</label>
					<select class="form-control select2-single" name="cat_id" id="cat_id">
						<?php
						if (! empty ($batches)) {
							foreach ($batches as $batch) {
								?>
								<option value="<?php echo $batch['batch_id']; ?>" <?php if ($course['cat_id'] == $batch['batch_id']) echo 'selected="selected"'; ?>><?php echo $batch['batch_name']; ?></option>
								<?php
							}
						}
						?>
					</select>
				</div>
				

				<div class="form-group">
					<input type="hidden" class="form-control" id="price" name="price" min="0" step="1" value="<?php echo intval ($course['price']); ?>" />
				</div>
				
			</div>
			<div class="card-footer">
				<input type="submit" name="submit" class="btn btn-primary" value="<?php echo $submit_label; ?>" data-toggle="tooltip" data-placement="right" title="<?php echo $submit_title; ?>">
			</div>
		<?php echo form_close(); ?>
	</div>
</div>
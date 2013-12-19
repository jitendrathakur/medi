<?php include('header.php'); ?>

<div class="col-md-10 well">

    <!-- begin form -->
    <h2>Tmed Journal</h2>
    <hr/>

		<!-- begin form -->
		<?php echo form_open_multipart($this->config->item('admin_folder').'forms/tmed_form', array('class' => 'form-horizontal')); ?>
     
     	<div class="form-group">
	        <label for="inputEmail3" class="col-sm-3 control-label">Are you satisfied with your Allowanced-Based Medicine?</label>
	        <div class="col-sm-9">
		        <?php
				$options = array(	
					''		=> '',
					'Yes'	=> 'Yes',
					'No'	=> 'No'
				);
				echo form_dropdown('is_medicine', $options, set_value('is_medicine', ''));
				?>
	        </div>
	    </div>

	    <div class="form-group">
	        <label for="inputEmail3" class="col-sm-3 control-label">Are you satisfied with your Psychiatric Medicine?</label>
	        <div class="col-sm-9">
		        <?php
				$options = array(	
					''		=> '',
					'Yes'		=> 'Yes',
					'No'	=> 'No'
				);
				echo form_dropdown('is_psychiatric', $options, set_value('is_psychiatric', ''));
				?>
	        </div>
	    </div>

	    <h3>Please select the category that best describes your Allowanced-Based Medicine</h3>
	    <div class="form-group">
	        <label for="inputEmail3" class="col-sm-3 control-label">Community-Based</label>
	        <div class="col-sm-9">
		        <input type="checkbox" value="Community-Based" id="field_61_option_1" name="category[]" <? if (strpos($category,'Community-Based') !== false) {
				    //echo 'checked';
				} ?> class="">
	        </div>
	    </div>

	    <div class="form-group">
	        <label for="inputEmail3" class="col-sm-3 control-label">Physical Activity</label>
	        <div class="col-sm-9">
		        <input type="checkbox" value="Physical Activity" <? if (strpos($category,'Physical Activity') !== false) {
				    //echo 'checked';
				} ?> id="field_61_option_2" name="category[]" class="">
	        </div>
	    </div>

	    <div class="form-group">
	        <label for="inputEmail3" class="col-sm-3 control-label">Cultural</label>
	        <div class="col-sm-9">
		        <input type="checkbox" <? if (strpos($category,'Cultural') !== false) {
				    //echo 'checked';
				} ?> value="Cultural" id="field_61_option_3" name="category[]" class="">
	        </div>
	    </div>

	    <div class="form-group">
	        <label for="inputEmail3" class="col-sm-3 control-label">Educational</label>
	        <div class="col-sm-9">
		        <input type="checkbox" value="Educational" <? if (strpos($category,'Educational') !== false) {
				    //echo 'checked';
				} ?> id="field_61_option_4" name="category[]" class="">
	        </div>
	    </div>

	    <div class="form-group">
	        <label for="inputEmail3" class="col-sm-3 control-label">Inter-Active</label>
	        <div class="col-sm-9">
		        <input type="checkbox" value="Inter-Active" id="field_61_option_5" name="category[]" <? if (strpos($category,'Inter-Active') !== false) {
				    //echo 'checked';
				} ?> class="">
	        </div>
	    </div>

	    <div class="form-group">
	        <label for="inputEmail3" class="col-sm-3 control-label">Self-Maintenance</label>
	        <div class="col-sm-9">
		        <input type="checkbox" value="Self-Maintenance" id="field_61_option_6" name="category[]" <? if (strpos($category,'Self-Maintenance') !== false) {
				    //echo 'checked';
				} ?> class="">
	        </div>
	    </div>

	    <div class="form-group">
	        <label for="inputEmail3" class="col-sm-3 control-label">Vocational</label>
	        <div class="col-sm-9">
		        <input type="checkbox" value="Vocational" id="field_61_option_7" name="category[]" <? if (strpos($category,'Vocational') !== false) {
				    //echo 'checked';
				} ?> class="">
	        </div>
	    </div>

	    <div class="form-group">
	        <label for="inputEmail3" class="col-sm-3 control-label">Social Development</label>
	        <div class="col-sm-9">
		        <input type="checkbox" value="Social Development" id="field_61_option_8" name="category[]" <? if (strpos($category,'Social Development') !== false) {
				    //echo 'checked';
				} ?> class="">
	        </div>
	    </div>

	    <div class="form-group">
	        <label for="inputEmail3" class="col-sm-3 control-label">Would you like to ask a question about Allowanced-Based Medicine?</label>
	        <div class="col-sm-9">
		        <?php
				$options = array(	
					''		=> '',
					'Yes'	=> 'Yes',
					'No'	=> 'No'
				);
				echo form_dropdown('is_question_medicine', $options, set_value('is_question_medicine', ''));
				?>
	        </div>
	    </div> 

	    <div class="form-group">
	        <label for="inputEmail3" class="col-sm-3 control-label">Would you like to ask a question about Psychiatric Medicine?</label>
	        <div class="col-sm-9">
		        <?php
				$options = array(	
					''		=> '',
					'Yes'	=> 'Yes',
					'No'	=> 'No'
				);
				echo form_dropdown('is_question_psychiatric', $options, set_value('is_question_psychiatric', ''));
				?>
	        </div>
	    </div>

	    <div class="form-group">
	        <label for="inputEmail3" class="col-sm-3 control-label">The "Pulse"</label>
	        <div class="col-sm-9">
		        <?php
				$data	= array('name'=>'pulse',  'value'=>set_value('pulse', ''), 'class'=>'form-control');
				echo form_textarea($data);
				?>
	        </div>
	    </div>

	    <div class="form-group">
	        <div class="col-sm-offset-2 col-sm-9">
	          <button type="submit" class="btn btn-primary btn-large"><?php echo lang('form_save');?></button>	          
	        </div>       
	    </div>      

    </form>
  </div>
</div>
 

<?php include('footer.php');
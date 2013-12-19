<?php include('header.php'); ?>

<div class="col-md-10 well">

    <!-- begin form -->
    <h2>Physical Health Journal</h2>
    <hr/>
		<!-- begin form -->
		<?php echo form_open_multipart($this->config->item('admin_folder').'forms/physicalhealth_form', array('class' => 'form-horizontal')); ?>
       
       <h3>Do you receive treatment for?</h3>
		<div class="form-group">
	        <label for="inputEmail3" class="col-sm-3 control-label">Diabetes</label>
	        <div class="col-sm-9">
		        <input type="checkbox" value="Diabetes" id="field_3_option_1" name="treatment[]" <? if (strpos($treatment,'Diabetes') !== false) {
				    //echo 'checked';
				} ?> class=""> 
	        </div>
	    </div>

	    <div class="form-group">
	        <label for="inputEmail3" class="col-sm-3 control-label">High Blood Pressure</label>
	        <div class="col-sm-9">
		        <input type="checkbox" value="High Blood Pressure" id="field_3_option_2" <? if (strpos($treatment,'High Blood Pressure') !== false) {
			    //echo 'checked';
			} ?> name="treatment[]" class="">
	        </div>
	    </div>

	    <div class="form-group">
	        <label for="inputEmail3" class="col-sm-3 control-label">High Cholesterol</label>
	        <div class="col-sm-9">
		        <input type="checkbox" <? if (strpos($treatment,'High Cholesterol') !== false) {
				    //echo 'checked';
				} ?>  value="High Cholesterol" id="field_3_option_3" name="treatment[]" class=""> 
	        </div>
	    </div>

	    <div class="form-group">
	        <label for="inputEmail3" class="col-sm-3 control-label">Epilepsy</label>
	        <div class="col-sm-9">
		        <input type="checkbox" <? if (strpos($treatment,'Epilepsy') !== false) {
				    //echo 'checked';
				} ?> value="Epilepsy" id="field_3_option_4" name="treatment[]" class=""> 
	        </div>
	    </div>

	    <div class="form-group">
	        <label for="inputEmail3" class="col-sm-3 control-label">Other</label>
	        <div class="col-sm-9">
		        <input type="checkbox" <? if (strpos($treatment,'Other') !== false) {
				    //echo 'checked';
				} ?> value="Other" id="field_3_option_5" name="treatment[]" class=""> 
	        </div>
	    </div>

	    <div class="form-group">
	        <label for="inputEmail3" class="col-sm-3 control-label">Do you have any STD or BBD?</label>
	        <div class="col-sm-9">
		        <?php
				$options = array(	
					''		=> '',
					'Yes'		=> 'Yes',
					'No'	=> 'No'
				);
				echo form_dropdown('is_std', $options, set_value('is_std', ''));
				?>
	        </div>
	    </div>

	    <div class="form-group">
	        <label for="inputEmail3" class="col-sm-3 control-label">Have you had a physical in the past 12 months?</label>
	        <div class="col-sm-9">
		        <?php
				$options = array(	
					''		=> '',
					'Yes'		=> 'Yes',
					'No'	=> 'No'
				);
				echo form_dropdown('is_physical', $options, set_value('is_physical', ''));
				?>
	        </div>
	    </div>

	    <div class="form-group">
	        <label for="inputEmail3" class="col-sm-3 control-label">A vision/hearing test in the past two years?</label>
	        <div class="col-sm-9">
		        <?php
				$options = array(	
					''		=> '',
					'Yes'		=> 'Yes',
					'No'	=> 'No'
				);
				echo form_dropdown('is_hearing', $options, set_value('is_hearing', ''));
				?>
	        </div>
	    </div>	

	    <div class="form-group">
	        <label for="inputEmail3" class="col-sm-3 control-label">Do you have a Primary Care Provider?</label>
	        <div class="col-sm-9">
		        <?php
				$options = array(	
					''		=> '',
					'Yes'		=> 'Yes',
					'No'	=> 'No'
				);
				echo form_dropdown('is_provider', $options, set_value('is_provider', ''));
				?>
	        </div>
	    </div>

	    <div class="form-group">
	        <label for="inputEmail3" class="col-sm-3 control-label">May we discuss your treatment with your PCP?</label>
	        <div class="col-sm-9">
		        <?php
				$options = array(	
					''		=> '',
					'Yes'	=> 'Yes',
					'No'	=> 'No'
				);
				echo form_dropdown('is_treatment', $options, set_value('is_treatment', ''));
				?>
	        </div>
	    </div>

	    <div class="form-group">
	        <label for="inputEmail3" class="col-sm-3 control-label">Are you prescribed any physical health meds?</label>
	        <div class="col-sm-9">
		        <?php
				$options = array(	
					''		=> '',
					'Yes'		=> 'Yes',
					'No'	=> 'No'
				);
				echo form_dropdown('is_meds', $options, set_value('is_meds', ''));
				?>
	        </div>
	    </div>

	    <div class="form-group">
	        <label for="inputEmail3" class="col-sm-3 control-label">Do you use over the counter meds?</label>
	        <div class="col-sm-9">
		        <?php
				$options = array(	
					''		=> '',
					'Yes'	=> 'Yes',
					'No'	=> 'No'
				);
				echo form_dropdown('is_counter', $options, set_value('is_counter', ''));
				?>
	        </div>
	    </div>

	    <div class="form-group">
	        <label for="inputEmail3" class="col-sm-3 control-label">Do you use natural supplements, remedies?</label>
	        <div class="col-sm-9">
		        <?php
				$options = array(	
					''		=> '',
					'Yes'	=> 'Yes',
					'No'	=> 'No'
				);
				echo form_dropdown('is_remedies', $options, set_value('is_remedies', ''));
				?>
	        </div>
	    </div>

	    <div class="form-group">
	        <label for="inputEmail3" class="col-sm-3 control-label">Did you lose/gain weight in the past 90 days?</label>
	        <div class="col-sm-9">
		        <?php
				$options = array(	
					''		=> '',
					'Yes'	=> 'Yes',
					'No'	=> 'No'
				);
				echo form_dropdown('is_weight', $options, set_value('is_weight', ''));
				?>
	        </div>
	    </div>

	    <div class="form-group">
	        <label for="inputEmail3" class="col-sm-3 control-label">Are you happy with your weight?</label>
	        <div class="col-sm-9">
		         <?php
				$options = array(	
					''		=> '',
					'Yes'	=> 'Yes',
					'No'	=> 'No'
				);
				echo form_dropdown('is_happy', $options, set_value('is_happy', ''));
				?>
	        </div>
	    </div>

	    <div class="form-group">
	        <label for="inputEmail3" class="col-sm-3 control-label">Are you experiencing any physical pain?</label>
	        <div class="col-sm-9">
		         <?php
				$options = array(	
					''		=> '',
					'Yes'	=> 'Yes',
					'No'	=> 'No'
				);
				echo form_dropdown('is_pain', $options, set_value('is_pain', ''));
				?>
	        </div>
	    </div>


	    <div class="form-group">
	        <div class="col-sm-offset-2 col-sm-9">
	          <button type="submit" class="btn btn-primary btn-large"><?php echo lang('form_save');?></button>
	          <a class="btn btn-primary btn-large" href="<?php echo base_url('forms/tmed_form') ?>" >Skip</a>
	        </div>       
	    </div>

    </form>
  </div>
</div>
 

<?php include('footer.php');	
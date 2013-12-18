<?php include('header.php'); ?>

<div class="col-md-10 well">

    <!-- begin form -->
    <h2>Cooccurring Journal</h2>
    <hr/>

		<?php echo form_open_multipart($this->config->item('admin_folder').'forms/cooccurring_form', array('class' => 'form-horizontal')); ?>
		
		<div class="form-group">
	        <label for="inputEmail3" class="col-sm-3 control-label">Do you want to use drugs?</label>
	        <div class="col-sm-9">
		        <?php
				$options = array(	
					''		=> '',
					'Yes'		=> 'Yes',
					'No'	=> 'No'
				);
				echo form_dropdown('is_drug', $options, set_value('is_drug', ''));
				?> 
	        </div>
	    </div>

	    <div class="form-group">
	        <label for="inputEmail3" class="col-sm-3 control-label">Have you used drugs this week?</label>
	        <div class="col-sm-9">
		        <?php
				$options = array(	
					''	  => '',
					'Yes' => 'Yes',
					'No'	=> 'No'
				);
				echo form_dropdown('is_drug_week', $options, set_value('is_drug_week', ''));
				?> 
	        </div>
	    </div>

	    <div class="form-group">
	        <label for="inputEmail3" class="col-sm-3 control-label">Do you want to drink alcohol?</label>
	        <div class="col-sm-9">
		        <?php
				$options = array(	
					'' => '',
					'Yes' => 'Yes',
					'No' => 'No'
				);
				echo form_dropdown('is_alcohol', $options, set_value('is_alcohol', ''));
				?> 
	        </div>
	    </div>

	    <div class="form-group">
	        <label for="inputEmail3" class="col-sm-3 control-label">Have you drank alcohol this week?</label>
	        <div class="col-sm-9">
		        <?php
				$options = array(	
					''		=> '',
					'Yes'	=> 'Yes',
					'No'	=> 'No'
				);
				echo form_dropdown('is_alcohol_week', $options, set_value('is_alcohol_week', ''));
				?> 
	        </div>
	    </div>

	    <div class="form-group">
	        <label for="inputEmail3" class="col-sm-3 control-label">Do you friends drink alcohol or use drugs?</label>
	        <div class="col-sm-9">
		        <?php
				$options = array(	
					''		=> '',
					'Yes'	=> 'Yes',
					'No'	=> 'No'
				);
				echo form_dropdown('is_alcohol_friend', $options, set_value('is_alcohol_friend', ''));
				?> 
	        </div>
	    </div>

	    <div class="form-group">
	        <label for="inputEmail3" class="col-sm-3 control-label">Does your family drink alcohol or use drugs?</label>
	        <div class="col-sm-9">
		        <?php
				$options = array(	
					''		=> '',
					'Yes'	=> 'Yes',
					'No'	=> 'No'
				);
				echo form_dropdown('is_alcohol_family', $options, set_value('is_alcohol_family', ''));
				?> 
	        </div>
	    </div>

	    <div class="form-group">
	        <label for="inputEmail3" class="col-sm-3 control-label">Do you have cravings to drink or use?</label>
	        <div class="col-sm-9">
		        <?php
				$options = array(	
					''		=> '',
					'Yes'	=> 'Yes',
					'No'	=> 'No'
				);
				echo form_dropdown('is_cravings', $options, set_value('is_cravings', ''));
				?> 
	        </div>
	    </div>

	    <div class="form-group">
	        <label for="inputEmail3" class="col-sm-3 control-label">Do you have drink or drug dreams?</label>
	        <div class="col-sm-9">
		        <?php
				$options = array(	
					''	  => '',
					'Yes' => 'Yes',
					'No'  => 'No'
				);
				echo form_dropdown('is_dreams', $options, set_value('is_dreams', ''));
				?>
	        </div>
	    </div>

	    <div class="form-group">
	        <label for="inputEmail3" class="col-sm-3 control-label">Do you identify triggers?</label>
	        <div class="col-sm-9">
		        <?php
				$options = array(
					''	  => '',
					'Yes' => 'Yes',
					'No'  => 'No'
				);
				echo form_dropdown('is_triggers', $options, set_value('is_triggers', ''));
				?>
	        </div>
	    </div>


	    <div class="form-group">
	        <label for="inputEmail3" class="col-sm-3 control-label">Do you have action plans for triggers?</label>
	        <div class="col-sm-9">
		        <?php
				$options = array(	
					''	  => '',
					'Yes' => 'Yes',
					'No'  => 'No'
				);
				echo form_dropdown('is_plans', $options, set_value('is_plans', ''));
				?>
	        </div>
	    </div>


	    <div class="form-group">
	        <label for="inputEmail3" class="col-sm-3 control-label">How long since you last drank alcohol?</label>
	        <div class="col-sm-9">
		        <?php
				$options = array(
					''		=> '',	
					'0-30 Days'		=> '0-30 Days',
					'31-90 Days'	=> '31-90 Days',
					'91-180 Days'	=> '91-180 Days',
					'181-360 Days'	=> '181-360 Days'
				);
				echo form_dropdown('last_alcohol', $options, set_value('last_alcohol', ''));
				?>
	        </div>
	    </div>


	    <div class="form-group">
	        <label for="inputEmail3" class="col-sm-3 control-label">How long since you last used drugs?</label>
	        <div class="col-sm-9">
		        <?php
				$options = array(
					''		=> '',	
					'0-30 Days'		=> '0-30 Days',
					'31-90 Days'	=> '31-90 Days',
					'91-180 Days'	=> '91-180 Days',
					'181-360 Days'	=> '181-360 Days'
				);
				echo form_dropdown('last_drugs', $options, set_value('last_drugs', ''));
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
	          <a class="btn btn-primary btn-large" href="<?php echo base_url('forms/recoveryvitals_form') ?>" >Skip</a>
	        </div>       
	    </div>      

    </form>
  </div>
</div>
 

<?php include('footer.php');
<?php include('header.php'); ?>

<div class="col-md-10 well">

    <!-- begin form -->
    <h2>Wellness Journal</h2>
    <hr/>
    			
 	<?php if ($this->session->flashdata('message')):?>
		<div class="alert alert-info">
			<a class="close" data-dismiss="alert">×</a>
			<?php echo $this->session->flashdata('message');?>
		</div>
	<?php endif;?>
	
	<?php if ($this->session->flashdata('error')):?>
		<div class="alert alert-error">
			<a class="close" data-dismiss="alert">×</a>
			<?php echo $this->session->flashdata('error');?>
		</div>
	<?php endif;?>
	
	<?php if (!empty($error)):?>
		<div class="alert alert-error">
			<a class="close" data-dismiss="alert">×</a>
			<?php echo $error;?>
		</div>
	<?php endif;?>



	<!-- begin form -->
	<?php echo form_open_multipart($this->config->item('admin_folder').'forms/wellness_form', array('class' => 'form-horizontal')); ?>
    
	    <div class="form-group">
	        <label for="inputEmail3" class="col-sm-3 control-label">How do you feel right now?</label>
	        <div class="col-sm-9">
		        <?php			 
				$options = array(
					'Excellent'	=> 'Excellent',
					'Good' => 'Good',
					'Not Sure' => 'Not Sure',
					'Bad' => 'Bad',
					'Terrible' => 'Terrible'							
	            );
				echo form_dropdown('feel', $options, set_value('feel', ''));
				?> 
	        </div>
	    </div>

	    <div class="form-group">
	        <label for="inputEmail3" class="col-sm-3 control-label">Are you satisfied with your wellness?</label>
	        <div class="col-sm-9">
		        <?php
				$options = array(
					'Yes' => 'Yes',
					'No' => 'No'
				);
				echo form_dropdown('wellness', $options, set_value('wellness', ''));
				?>
	        </div>
	    </div> 

	    <h4>Are You? Check all that may apply</h4>
	    <div class="form-group">	        

	        <label for="inputEmail3" class="col-sm-3 control-label">Manic or Hyper</label>
	        <div class="col-sm-9">
		        <input class="" type="checkbox" name="apply[]" id="field_3_option_1" <? if (strpos($apply,'Manic or  Hyper') !== false) {
				    //echo 'checked';
				} ?> value="Manic or Hyper" />
	        </div>
	    </div>

	    <div class="form-group">

	        <label for="inputEmail3" class="col-sm-3 control-label">Depressed</label>
	        <div class="col-sm-9">
		        <input class="mainForm" type="checkbox" name="apply[]" id="field_3_option_2" value="Depressed" <? if (strpos($apply,'Depressed') !== false) {
				    //echo 'checked';
				} ?> />
	        </div>
	    </div>

	    <div class="form-group">

	        <label for="inputEmail3" class="col-sm-3 control-label">Hallucinating</label>
	        <div class="col-sm-9">
		        <input class="mainForm" type="checkbox" name="apply[]" <? if (strpos($apply,'Hallucinating') !== false) {
				    //echo 'checked';
				} ?> id="field_3_option_3" value="Hallucinating" />
	        </div>
	    </div>

	    <div class="form-group">

	        <label for="inputEmail3" class="col-sm-3 control-label">Anxious</label>
	        <div class="col-sm-9">
		        <input class="mainForm" type="checkbox" name="apply[]" id="field_3_option_4" value="Anxious" <? if (strpos($apply,'Anxious') !== false) {
				    //echo 'checked';
				} ?> />
	        </div>
	    </div>

	    <div class="form-group">

	        <label for="inputEmail3" class="col-sm-3 control-label">Lonely</label>
	        <div class="col-sm-9">
		        <input class="mainForm" type="checkbox" name="apply[]" <? if (strpos($apply,'Lonely') !== false) {
				    //echo 'checked';
				} ?> id="field_3_option_5" value="Lonely" />
	        </div>
	    </div>

	    <div class="form-group">

	        <label for="inputEmail3" class="col-sm-3 control-label">Hearing Voices</label>
	        <div class="col-sm-9">
		        <input class="mainForm" type="checkbox" name="apply[]" <? if (strpos($apply,'Hearing Voices') !== false) {
				    //echo 'checked';
				} ?> id="field_3_option_6" value="Hearing Voices" />
	        </div>
	    </div>

	    <div class="form-group">

	        <label for="inputEmail3" class="col-sm-3 control-label">Angry/Irritable</label>
	        <div class="col-sm-9">
		        <input class="mainForm" type="checkbox" name="apply[]" <? if (strpos($apply,'Angry/Irritable') !== false) {
				    //echo 'checked';
				} ?> id="field_3_option_7" value="Angry/Irritable" />
	        </div>
	    </div>

	    <div class="form-group">

	        <label for="inputEmail3" class="col-sm-3 control-label">Thinking of Self-Harm</label>
	        <div class="col-sm-9">
		        <input class="mainForm" type="checkbox" name="apply[]" id="field_3_option_8" <? if (strpos($apply,'Thinking of Self-Harm') !== false) {
				    //echo 'checked';
				} ?> value="Thinking of Self-Harm" />
	        </div> 	         

	    </div> 

	    <div class="form-group">
	        <label for="inputEmail3" class="col-sm-3 control-label">How long since my last hospitalization?</label>
	        <div class="col-sm-9">
		        <?php
				$options = array(
					'0-30 Days'		=> '0-30 Days',
					'31-90 Days'	=> '31-90 Days',
					'91-180 Days'	=> '91-180 Days',
					'181-360 Days'	=> '181-360 Days'				
                );
				echo form_dropdown('hospitalization', $options, set_value('hospitalization', ''));
				?>
	        </div>
	    </div> 

	    <div class="form-group">
	        <label for="inputEmail3" class="col-sm-3 control-label">How long since my last contact with crisis?</label>
	        <div class="col-sm-9">
		        <?php
				$options = array(
					'0-30 Days'		=> '0-30 Days',
					'31-90 Days'	=> '31-90 Days',
					'91-180 Days'	=> '91-180 Days',
					'181-360 Days'	=> '181-360 Days'
				);
				echo form_dropdown('crisis', $options, set_value('crisis', ''));
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
          <a class="btn btn-primary btn-large" href="<?php echo base_url('forms/forensic_form') ?>" >Skip</a>
        </div>       
      </div>      

    </form>
  </div>
</div>
 

<?php include('footer.php');

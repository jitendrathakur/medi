<?php include('header.php'); ?>

<div class="col-md-10 well">

    <!-- begin form -->
    <h2>Cooccurring Journal</h2>
    <hr/>
		<?php echo form_open_multipart($this->config->item('admin_folder').'forms/recoveryvitals_form', array('class' => 'form-horizontal')); ?>
		

			<div class="form-group">
		        <label for="inputEmail3" class="col-sm-3 control-label">Are you getting enough sleep?</label>
		        <div class="col-sm-9">
			        <?php
					$options = array(	
						''		=> '',
						'Yes'		=> 'Yes',
						'No'	=> 'No'
					);
					echo form_dropdown('is_sleep', $options, set_value('is_sleep', ''));
					?> 
		        </div>
		    </div>

		    <div class="form-group">
		        <label for="inputEmail3" class="col-sm-3 control-label">Are you eating a healthy diet?</label>
		        <div class="col-sm-9">
			        <?php
					$options = array(	
						''		=> '',
						'Yes'	=> 'Yes',
						'No'	=> 'No'
					);
					echo form_dropdown('is_healthy', $options, set_value('is_healthy', ''));
					?> 
		        </div>
		    </div>


		    <div class="form-group">
		        <label for="inputEmail3" class="col-sm-3 control-label">Are you exercising weekly?</label>
		        <div class="col-sm-9">
			        <?php
					$options = array(	
						''		=> '',
						'Yes'	=> 'Yes',
						'No'	=> 'No'
					);
					echo form_dropdown('is_excersise', $options, set_value('is_excersise', ''));
					?> 
		        </div>
		    </div>

		    <div class="form-group">
		        <label for="inputEmail3" class="col-sm-3 control-label">Are you practicing meditation?</label>
		        <div class="col-sm-9">
			        <?php
					$options = array(	
						''		=> '',
						'Yes'	=> 'Yes',
						'No'	=> 'No'
					);
					echo form_dropdown('is_meditation', $options, set_value('is_meditation', ''));
					?> 
		        </div>
		    </div>	

		    <div class="form-group">
		        <label for="inputEmail3" class="col-sm-3 control-label">Are you practicing your spirituality?</label>
		        <div class="col-sm-9">
			        <?php
					$options = array(	
						''		=> '',
						'Yes'	=> 'Yes',
						'No'	=> 'No'
					 );
					echo form_dropdown('is_spirituality', $options, set_value('is_spirituality', ''));
					?>
		        </div>
		    </div>

		    <div class="form-group">
		        <label for="inputEmail3" class="col-sm-3 control-label">Are you attending support groups?</label>
		        <div class="col-sm-9">
			        <?php
					$options = array(	
						''		=> '',
						'Yes'	=> 'Yes',
						'No'	=> 'No'
					);
					echo form_dropdown('is_groups', $options, set_value('is_groups', ''));
					?>
		        </div>
		    </div>


		    <div class="form-group">
		        <label for="inputEmail3" class="col-sm-3 control-label">Are you involved in the community?</label>
		        <div class="col-sm-9">
			        <?php
					$options = array(	
						''		=> '',
						'Yes'	=> 'Yes',
						'No'	=> 'No'
					);
					echo form_dropdown('is_community', $options, set_value('is_community', ''));
					?>
		        </div>
		    </div>

		    <div class="form-group">
		        <label for="inputEmail3" class="col-sm-3 control-label">Are you involved with family activity?</label>
		        <div class="col-sm-9">
			        <?php
					$options = array(	
						''		=> '',
						'Yes'	=> 'Yes',
						'No'	=> 'No'
					);
					echo form_dropdown('is_family', $options, set_value('is_family', ''));
					?>
		        </div>
		    </div>

		    <div class="form-group">
		        <label for="inputEmail3" class="col-sm-3 control-label">Are you doing something you enjoy every week?</label>
		        <div class="col-sm-9">
			        <?php
					$options = array(	
						''		=> '',
						'Yes'	=> 'Yes',
						'No'	=> 'No'
					);
					echo form_dropdown('is_enjoy', $options, set_value('is_enjoy', ''));
					?>
		        </div>
		    </div>

		    <div class="form-group">
		        <label for="inputEmail3" class="col-sm-3 control-label">Are you practicing religion?</label>
		        <div class="col-sm-9">
			        <?php
					$options = array(	
						''		=> '',
						'Yes'	=> 'Yes',
						'No'	=> 'No'
					);
					echo form_dropdown('is_religion', $options, set_value('is_religion', ''));
					?>
		        </div>
		    </div>

		    <div class="form-group">
		        <label for="inputEmail3" class="col-sm-3 control-label">Are you satisfied with your recovery?</label>
		        <div class="col-sm-9">
			        <?php
					$options = array(	
						''		=> '',
						'Yes'	=> 'Yes',
						'No'	=> 'No'
					);
					echo form_dropdown('is_recovery', $options, set_value('is_recovery', ''));
					?>
		        </div>
		    </div>

		    <div class="form-group">
		        <label for="inputEmail3" class="col-sm-3 control-label">Are you enjoying life?</label>
		        <div class="col-sm-9">
			        <?php
					$options = array(	
						''		=> '',
						'Yes'	=> 'Yes',
						'No'	=> 'No'
					);
					echo form_dropdown('is_life', $options, set_value('is_life', ''));
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
	          <a class="btn btn-primary btn-large" href="<?php echo base_url('forms/physicalhealth_form') ?>" >Skip</a>
	        </div>       
	    </div>      

    </form>
  </div>
</div>
 

<?php include('footer.php');	
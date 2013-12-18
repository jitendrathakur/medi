<?php include('header.php'); ?>

<div class="col-md-10 well">

    <!-- begin form -->
    <h2>Forensic Journal</h2>
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
	<?php echo form_open_multipart($this->config->item('admin_folder').'forms/forensic_form', array('class' => 'form-horizontal')); ?>
		
		<div class="form-group">
	        <label for="inputEmail3" class="col-sm-3 control-label">Are you on Probation/Parole?</label>
	        <div class="col-sm-9">
		        <?php
				$options = array(	
					''		=> '',
					'Yes'		=> 'Yes',
					'No'	=> 'No'
				);
				echo form_dropdown('is_parole', $options, set_value('is_parole', ''));
				?> 
	        </div>
	    </div>

	    <div class="form-group">
	        <label for="inputEmail3" class="col-sm-3 control-label">Did you check in this week/month?</label>
	        <div class="col-sm-9">
		        <?php
				$options = array(	
					''		=> '',
					'Yes'		=> 'Yes',
					'No'	=> 'No'
				);
				echo form_dropdown('is_month', $options, set_value('is_month', ''));
				?> 
	        </div>
	    </div>

	    <div class="form-group">
	        <label for="inputEmail3" class="col-sm-3 control-label">Do you have pending charges?</label>
	        <div class="col-sm-9">
		        <?php
				$options = array(	
					''		=> '',
					'Yes'	=> 'Yes',
					'No'	=> 'No'
				);
				echo form_dropdown('is_charge', $options, set_value('is_charge', ''));
				?>  
	        </div>
	    </div>

	    <div class="form-group">
	        <label for="inputEmail3" class="col-sm-3 control-label">Are you paying on costs and fines?</label>
	        <div class="col-sm-9">
		        <?php
				$options = array(	
					''		=> '',
					'Yes'		=> 'Yes',
					'No'	=> 'No'
				);
				echo form_dropdown('is_fines', $options, set_value('is_fines', ''));
				?>
	        </div>
	    </div>

	    <div class="form-group">
	        <label for="inputEmail3" class="col-sm-3 control-label">Did you have contact with law enforcement this week?</label>
	        <div class="col-sm-9">
		        <?php
				$options = array(	
					''		=> '',
					'Yes'		=> 'Yes',
					'No'	=> 'No'
				);
				echo form_dropdown('is_week', $options, set_value('is_week', ''));
				?>
	        </div>
	    </div>

	    <div class="form-group">
	        <label for="inputEmail3" class="col-sm-3 control-label">Do you have a permanent residence?</label>
	        <div class="col-sm-9">
		        <?php
				$options = array(	
					''    => '',
					'Yes' => 'Yes',
					'No'  => 'No'
				);
				echo form_dropdown('is_residence', $options, set_value('is_residence', ''));
				?>
	        </div>
	    </div>

	    <div class="form-group">
	        <label for="inputEmail3" class="col-sm-3 control-label">Do you have thoughts of criminal activity?</label>
	        <div class="col-sm-9">
		        <?php
				$options = array(	
					''		=> '',
					'Yes'	=> 'Yes',
					'No'	=> 'No'
				);
				echo form_dropdown('is_criminal', $options, set_value('is_criminal', ''));
				?>
	        </div>
	    </div>

	    <div class="form-group">
	        <label for="inputEmail3" class="col-sm-3 control-label">Do you have friends on Probation/Parole?</label>
	        <div class="col-sm-9">
		        <?php
				$options = array(	
					''		=> '',
					'Yes'	=> 'Yes',
					'No'	=> 'No'
				);
				echo form_dropdown('is_friends', $options, set_value('is_friends', ''));
				?>
	        </div>
	    </div>

	    <div class="form-group">
	        <label for="inputEmail3" class="col-sm-3 control-label">Do you work and/or volunteer?</label>
	        <div class="col-sm-9">
		        <?php
				$options = array(	
					''		=> '',
					'Yes'	=> 'Yes',
					'No'	=> 'No'
				);
				echo form_dropdown('is_volunteer', $options, set_value('is_volunteer', ''));
				?>
	        </div>
	    </div>

	    <div class="form-group">
	        <label for="inputEmail3" class="col-sm-3 control-label">How long since my last arrest?</label>
	        <div class="col-sm-9">
		        <?php
				$options = array(
					''		=> '',
					'0-30 Days'		=> '0-30 Days',
					'31-90 Days'	=> '31-90 Days',
					'91-180 Days'	=> '91-180 Days',
					'181-360 Days'	=> '181-360 Days'
				);
				echo form_dropdown('arrest', $options, set_value('arrest', ''));
				?>
	        </div>
	    </div>

	    <div class="form-group">
	        <label for="inputEmail3" class="col-sm-3 control-label">How long since my last incarceration?</label>
	        <div class="col-sm-9">
		        <?php
				$options = array(
					''		=> '',	
					'0-30 Days'		=> '0-30 Days',
					'31-90 Days'	=> '31-90 Days',
					'91-180 Days'	=> '91-180 Days',
					'181-360 Days'	=> '181-360 Days'
				);
				echo form_dropdown('incarceration', $options, set_value('incarceration', ''));
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
          <a class="btn btn-primary btn-large" href="<?php echo base_url('forms/cooccurring_form') ?>" >Skip</a>
        </div>       
      </div>      

    </form>
  </div>
</div>
 

<?php include('footer.php');
   
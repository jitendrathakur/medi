<?php include('header.php'); ?>

<style>
.main-container {height: 630px;!important}
</style>
					<div class="journal-entries">
    		
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
        
	<div id="mainForm" style="height:100%; ">

<!-- begin form -->
				 <?php echo form_open_multipart($this->config->item('admin_folder').'forms/forensic_form'); ?>
		
		<ul id="mainForm_2" class="mainForm">

				<li id="fieldBox_7" class="mainForm first-child">
					<label class="formFieldQuestion">Are you on Probation/Parole?&nbsp;*</label>
                <?php
		$options = array(	
		''		=> '',
		'Yes'		=> 'Yes',
							'No'	=> 'No'
							
						
		                );
		echo form_dropdown('is_parole', $options, set_value('phone', ''));
		?>
        </li>

				<li id="fieldBox_8" class="mainForm">
					<label class="formFieldQuestion">Did you check in this week/month?&nbsp;*</label>
                    
                      <?php
		$options = array(	
		''		=> '',
		'Yes'		=> 'Yes',
							'No'	=> 'No'
							
						
		                );
		echo form_dropdown('is_month', $options, set_value('phone', ''));
		?>
                    </li>

				<li id="fieldBox_9" class="mainForm">
					<label class="formFieldQuestion">Do you have pending charges?&nbsp;*</label>
 <?php
		$options = array(	
		''		=> '',
		'Yes'		=> 'Yes',
							'No'	=> 'No'
							
						
		                );
		echo form_dropdown('is_charge', $options, set_value('phone', ''));
		?>                    </li>

				<li id="fieldBox_10" class="mainForm">
					<label class="formFieldQuestion">Are you paying on costs and fines?&nbsp;*</label>
                     <?php
		$options = array(	
		''		=> '',
		'Yes'		=> 'Yes',
							'No'	=> 'No'
							
						
		                );
		echo form_dropdown('is_fines', $options, set_value('phone', ''));
		?>
                    </li>

				<li id="fieldBox_11" class="mainForm">
					<label class="formFieldQuestion">Did you have contact with law enforcement this week?&nbsp;*</label>
                    <?php
		$options = array(	
		''		=> '',
		'Yes'		=> 'Yes',
							'No'	=> 'No'
							
						
		                );
		echo form_dropdown('is_week', $options, set_value('phone', ''));
		?>
                    </li>

				<li id="fieldBox_12" class="mainForm">
					<label class="formFieldQuestion">Do you have a permanent residence?&nbsp;*</label>
<?php
		$options = array(	
		''		=> '',
		'Yes'		=> 'Yes',
							'No'	=> 'No'
							
						
		                );
		echo form_dropdown('is_residence', $options, set_value('phone', ''));
		?>
        </li>

				<li id="fieldBox_13" class="mainForm">
					<label class="formFieldQuestion">Do you have thoughts of criminal activity?&nbsp;*</label>
                    <?php
		$options = array(	
		''		=> '',
		'Yes'		=> 'Yes',
							'No'	=> 'No'
							
						
		                );
		echo form_dropdown('is_criminal', $options, set_value('phone', ''));
		?>
                    </li>

				<li id="fieldBox_14" class="mainForm">
					<label class="formFieldQuestion">Do you have friends on Probation/Parole?&nbsp;*</label>
                    
                      <?php
		$options = array(	
		''		=> '',
		'Yes'		=> 'Yes',
							'No'	=> 'No'
							
						
		                );
		echo form_dropdown('is_friends', $options, set_value('phone', ''));
		?>
                    
                    </li>

				<li id="fieldBox_15" class="mainForm">
					<label class="formFieldQuestion">Do you have family members on Probation/Parole?&nbsp;*</label>
 <?php
		$options = array(	
		''		=> '',
		'Yes'		=> 'Yes',
							'No'	=> 'No'
							
						
		                );
		echo form_dropdown('is_family', $options, set_value('phone', ''));
		?>
        </li>

				<li id="fieldBox_16" class="mainForm">
					<label class="formFieldQuestion">Do you work and/or volunteer?&nbsp;*</label>
 <?php
		$options = array(	
		''		=> '',
		'Yes'		=> 'Yes',
							'No'	=> 'No'
							
						
		                );
		echo form_dropdown('is_volunteer', $options, set_value('phone', ''));
		?></li>

				<li id="fieldBox_17" class="mainForm">
					<label class="formFieldQuestion">How long since my last arrest?&nbsp;*</label>
                     <?php
		$options = array(
		''		=> '',	'0-30 Days'		=> '0-30 Days',
							'31-90 Days'	=> '31-90 Days',
							'91-180 Days'	=> '91-180 Days',
							'181-360 Days'	=> '181-360 Days'
							
						
		                );
		echo form_dropdown('arrest', $options, set_value('phone', ''));
		?> 
                    </li>

				<li id="fieldBox_18" class="mainForm">
					<label class="formFieldQuestion">How long since my last incarceration?&nbsp;*</label>
 <?php
		$options = array(
		''		=> '',	'0-30 Days'		=> '0-30 Days',
							'31-90 Days'	=> '31-90 Days',
							'91-180 Days'	=> '91-180 Days',
							'181-360 Days'	=> '181-360 Days'
							
						
		                );
		echo form_dropdown('incarceration', $options, set_value('phone', ''));
		?> 
        </li>

				<li id="fieldBox_19" class="mainForm">
					<label class="formFieldQuestion">The "Pulse"&nbsp;*</label>
                    <?php
				$data	= array('name'=>'pulse',  'value'=>set_value('pulse', ''),'style'=>'border-image:initial; height:100px; color:#000000; border:1px solid #000000;');
				echo form_textarea($data);
				?>
                    </li>
		
		
		
		</ul>
    
<div class="post-9 page type-page status-publish hentry" id="post-9">
<button type="submit" style=" background-color: #6195C5;
    border: 2px solid #142872;
    color: #FFFFFF;
    margin-bottom: 7px;height: 36px;
    left: 201px;
    position: absolute;cursor: pointer;
      width: 137px;"><?php echo lang('form_save');?></button>
				<!--<div class="main-container" style="position:absolute; left:-50px; top:534px; " > -->
 				
 <!--</div> -->

<!-- .entry-content -->
		</div>   			 

											</form>

	<a href="<?php echo base_url('forms/cooccurring_form') ?>" style="   background-color: #6195C5;
    border: 2px solid #142872;
    bottom: 4px;
    color: #FFFFFF;
    cursor: pointer;
    font-weight: bold;
    height: 32px;
    left: 42px;
    margin-bottom: 7px;
    position: absolute;
    text-align: center;
    text-decoration: none;
    width: 137px;"><?php echo 'Skip';?></a>





											</div><!-- .entry-content -->
		</div>
        
    			<!-- #content -->







<?php include('footer.php');
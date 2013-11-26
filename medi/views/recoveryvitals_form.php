<?php include('header.php'); ?>

<style>
.main-container {height: 630px;!important}
</style>

					<div class="journal-entries">
    			

	<div id="mainForm" style="height:100%; ">

<!-- begin form -->
		 <?php echo form_open_multipart($this->config->item('admin_folder').'forms/recoveryvitals_form'); ?>
		
			<ul id="mainForm_4" class="mainForm">

				<li id="fieldBox_33" class="mainForm first-child">
					<label class="formFieldQuestion">Are you getting enough sleep?&nbsp;*</label>
                     <?php
		$options = array(	
		''		=> '',
		'Yes'		=> 'Yes',
							'No'	=> 'No'
							
						
		                );
		echo form_dropdown('is_sleep', $options, set_value('phone', ''));
		?>
                    </li>

				<li id="fieldBox_34" class="mainForm">
					<label class="formFieldQuestion">Are you eating a healthy diet?&nbsp;*</label>
                    
                     <?php
		$options = array(	
		''		=> '',
		'Yes'		=> 'Yes',
							'No'	=> 'No'
							
						
		                );
		echo form_dropdown('is_healthy', $options, set_value('phone', ''));
		?>
                    
                    </li>

				<li id="fieldBox_35" class="mainForm">
					<label class="formFieldQuestion">Are you exercising weekly?&nbsp;*</label>
                     <?php
		$options = array(	
		''		=> '',
		'Yes'		=> 'Yes',
							'No'	=> 'No'
							
						
		                );
		echo form_dropdown('is_excersise', $options, set_value('phone', ''));
		?>
                    </li>

				<li id="fieldBox_36" class="mainForm">
					<label class="formFieldQuestion">Are you practicing meditation?&nbsp;*</label>
                    <?php
		$options = array(	
		''		=> '',
		'Yes'		=> 'Yes',
							'No'	=> 'No'
							
						
		                );
		echo form_dropdown('is_meditation', $options, set_value('phone', ''));
		?>
                    </li>

				<li id="fieldBox_37" class="mainForm">
					<label class="formFieldQuestion">Are you practicing your spirituality?&nbsp;*</label>
                     <?php
		$options = array(	
		''		=> '',
		'Yes'		=> 'Yes',
							'No'	=> 'No'
							
						
		                );
		echo form_dropdown('is_spirituality', $options, set_value('phone', ''));
		?>
                    </li>

				<li id="fieldBox_38" class="mainForm">
					<label class="formFieldQuestion">Are you attending support groups?&nbsp;*</label>
                      <?php
		$options = array(	
		''		=> '',
		'Yes'		=> 'Yes',
							'No'	=> 'No'
							
						
		                );
		echo form_dropdown('is_groups', $options, set_value('phone', ''));
		?>
                    </li>

				<li id="fieldBox_39" class="mainForm">
					<label class="formFieldQuestion">Are you involved in the community?&nbsp;*</label>
                   <?php
		$options = array(	
		''		=> '',
		'Yes'		=> 'Yes',
							'No'	=> 'No'
							
						
		                );
		echo form_dropdown('is_community', $options, set_value('phone', ''));
		?>
                   </li>

				<li id="fieldBox_40" class="mainForm">
					<label class="formFieldQuestion">Are you involved with family activity?&nbsp;*</label>
                    <?php
		$options = array(	
		''		=> '',
		'Yes'		=> 'Yes',
							'No'	=> 'No'
							
						
		                );
		echo form_dropdown('is_family', $options, set_value('phone', ''));
		?>
                    </li>

				<li id="fieldBox_41" class="mainForm">
					<label class="formFieldQuestion">Are you doing something you enjoy every week?&nbsp;*</label>
                    <?php
		$options = array(	
		''		=> '',
		'Yes'		=> 'Yes',
							'No'	=> 'No'
							
						
		                );
		echo form_dropdown('is_enjoy', $options, set_value('phone', ''));
		?>
                    </li>

				<li id="fieldBox_42" class="mainForm">
					<label class="formFieldQuestion">Are you practicing religion?&nbsp;*</label>
                     <?php
		$options = array(	
		''		=> '',
		'Yes'		=> 'Yes',
							'No'	=> 'No'
							
						
		                );
		echo form_dropdown('is_religion', $options, set_value('phone', ''));
		?>
                    </li>

				<li id="fieldBox_43" class="mainForm">
					<label class="formFieldQuestion">Are you satisfied with your recovery?&nbsp;*</label>
                             <?php
		$options = array(	
		''		=> '',
		'Yes'		=> 'Yes',
							'No'	=> 'No'
							
						
		                );
		echo form_dropdown('is_recovery', $options, set_value('phone', ''));
		?>
                    </li>

				<li id="fieldBox_44" class="mainForm">
					<label class="formFieldQuestion">Are you enjoying life?&nbsp;*</label>
                      <?php
		$options = array(	
		''		=> '',
		'Yes'		=> 'Yes',
							'No'	=> 'No'
							
						
		                );
		echo form_dropdown('is_life', $options, set_value('phone', ''));
		?>
                    </li>

				<li id="fieldBox_45" class="mainForm">
					<label class="formFieldQuestion">The "Pulse"&nbsp;*</label> <?php
				$data	= array('name'=>'pulse',  'value'=>set_value('pulse', ''),'style'=>'border-image:initial; height:100px; color:#000000; border:1px solid #000000;');
				echo form_textarea($data);
				?></li>
		
		
		


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

	<a href="<?php echo base_url('forms/physicalhealth_form') ?>" style="   background-color: #6195C5;
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
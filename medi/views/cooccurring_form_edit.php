<?php include('header.php'); ?>


<style>
.main-container {height: 640px;!important}
</style>

					<div class="journal-entries">
    			

	<div id="mainForm" style="height:100%; ">

<!-- begin form -->
		 <?php echo form_open_multipart($this->config->item('admin_folder').'forms/cooccurring_form'); ?>
		
			<ul id="mainForm_3" class="mainForm">

				<li id="fieldBox_20" class="mainForm first-child">
					<label class="formFieldQuestion">Do you want to use drugs?&nbsp;*</label>
                             <?php
		$options = array(	
		''		=> '',
		'Yes'		=> 'Yes',
							'No'	=> 'No'
							
						
		                );
		echo form_dropdown('is_drug', $options, set_value('phone', $is_drug));
		?>
                   </li>

				<li id="fieldBox_21" class="mainForm">
					<label class="formFieldQuestion">Have you used drugs this week?&nbsp;*</label> <?php
		$options = array(	
		''		=> '',
		'Yes'		=> 'Yes',
							'No'	=> 'No'
							
						
		                );
		echo form_dropdown('is_drug_week', $options, set_value('phone', $is_drug_week));
		?></li>

				<li id="fieldBox_22" class="mainForm">
					<label class="formFieldQuestion">Do you want to drink alcohol?&nbsp;*</label>
                    <?php
		$options = array(	
		''		=> '',
		'Yes'		=> 'Yes',
							'No'	=> 'No'
							
						
		                );
		echo form_dropdown('is_alcohol', $options, set_value('phone', $is_alcohol));
		?>
                    </li>

				<li id="fieldBox_23" class="mainForm">
					<label class="formFieldQuestion">Have you drank alcohol this week?&nbsp;*</label>
 <?php
		$options = array(	
		''		=> '',
		'Yes'		=> 'Yes',
							'No'	=> 'No'
							
						
		                );
		echo form_dropdown('is_alcohol_week', $options, set_value('phone', $is_alcohol_week));
		?>
                    </li>

				<li id="fieldBox_24" class="mainForm">
					<label class="formFieldQuestion">Do you friends drink alcohol or use drugs?&nbsp;*</label>
                   
                     <?php
		$options = array(	
		''		=> '',
		'Yes'		=> 'Yes',
		'No'	=> 'No'
							
						
		                );
		echo form_dropdown('is_alcohol_friend', $options, set_value('phone', $is_alcohol_friend));
		?>
                    </li>

				<li id="fieldBox_25" class="mainForm">
					<label class="formFieldQuestion">Does your family drink alcohol or use drugs?&nbsp;*</label>
                    <?php
		$options = array(	
		''		=> '',
		'Yes'		=> 'Yes',
		'No'	=> 'No'
							
						
		                );
		echo form_dropdown('is_alcohol_family', $options, set_value('phone', $is_alcohol_family));
		?>
        </li>

				<li id="fieldBox_26" class="mainForm">
					<label class="formFieldQuestion">Do you have cravings to drink or use?&nbsp;*</label>
                     <?php
		$options = array(	
		''		=> '',
		'Yes'		=> 'Yes',
		'No'	=> 'No'
							
						
		                );
		echo form_dropdown('is_cravings', $options, set_value('phone', $is_cravings));
		?>
                    
                    </li>

				<li id="fieldBox_27" class="mainForm">
					<label class="formFieldQuestion">Do you have drink or drug dreams?&nbsp;*</label>
                    <?php
		$options = array(	
		''		=> '',
		'Yes'		=> 'Yes',
		'No'	=> 'No'
							
						
		                );
		echo form_dropdown('is_dreams', $options, set_value('phone', $is_dreams));
		?>
                    </li>

				<li id="fieldBox_28" class="mainForm">
					<label class="formFieldQuestion">Do you identify triggers?&nbsp;*</label>
        
        <?php
		$options = array(	
		''		=> '',
		'Yes'		=> 'Yes',
		'No'	=> 'No'
							
						
		                );
		echo form_dropdown('is_triggers', $options, set_value('phone', $is_triggers));
		?>
        </li>

				<li id="fieldBox_29" class="mainForm">
					<label class="formFieldQuestion">Do you have action plans for triggers?&nbsp;*</label>
              <?php
		$options = array(	
		''		=> '',
		'Yes'		=> 'Yes',
		'No'	=> 'No'
							
						
		                );
		echo form_dropdown('is_plans', $options, set_value('phone', $is_triggers));
		?>       
</li>

				<li id="fieldBox_30" class="mainForm">
					<label class="formFieldQuestion">How long since you last drank alcohol?&nbsp;*</label>
                      <?php
		$options = array(
		''		=> '',	'0-30 Days'		=> '0-30 Days',
							'31-90 Days'	=> '31-90 Days',
							'91-180 Days'	=> '91-180 Days',
							'181-360 Days'	=> '181-360 Days'
							
						
		                );
		echo form_dropdown('last_alcohol', $options, set_value('phone', $last_alcohol));
		?> 
                    </li>

				<li id="fieldBox_31" class="mainForm">
					<label class="formFieldQuestion">How long since you last used drugs?&nbsp;*</label>
                    
<?php
		$options = array(
		''		=> '',	'0-30 Days'		=> '0-30 Days',
							'31-90 Days'	=> '31-90 Days',
							'91-180 Days'	=> '91-180 Days',
							'181-360 Days'	=> '181-360 Days'
							
						
		                );
		echo form_dropdown('last_drugs', $options, set_value('phone', $last_drugs));
		?> 
</li>

				<li id="fieldBox_32" class="mainForm">
					<label class="formFieldQuestion">The "Pulse"&nbsp;*</label>
                     <?php
				$data	= array('name'=>'pulse',  'value'=>set_value('pulse', $pulse),'style'=>'border-image:initial; height:100px; color:#000000; border:1px solid #000000;');
				echo form_textarea($data);
				?>
                    </li>
		
		
		<!-- end of this page -->

		<!-- page validation -->
	
		<!-- end page validaton -->

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

											</form></div><!-- .entry-content -->
		</div>
        
    			<!-- #content -->







<?php include('footer.php');
<?php include('header.php'); ?>

<style>
.main-container {height: 1200px;!important}
</style>
					
    			<div class="journal-entries" >
    			

	<div style="height:100%; " id="mainForm" >


		<!-- begin form -->
		 <?php echo form_open_multipart($this->config->item('admin_folder').'forms/core_journal_form3'); ?>
    <ul id="mainForm_9" class="mainForm">

				
				<ul id="mainForm_12" class="mainForm">

<div align="center"><h3 style="position:relative; left:0; top:-4px; " color="#FFFFFF" <font=""><font color="#2869D6">T-MeD Compass Center </font></h3></div>

				<li id="pfieldBox_83" class="mainForm">
					<label class="formFieldQuestion">Patient:&nbsp;*</label>
	      			<select name="patient">
						<?php foreach ($patient as $key => $value) {
						?>
						<option value="<?php echo $value->id; ?>"><?php echo $value->firstname. ' '.$value->lastname; ?></option>
						<?php } ?>
					</select>
				</li>
				<li id="fieldBox_101" class="mainForm">
					<label class="formFieldQuestion">Please Select the ZIP Code of your current residence&nbsp;*</label>
                    
                 
                     <?php
		$options = array(	
		''		=> '',
		'17901'		=> '17901',
							'17922'	=> '17922',
							'17933'	=> '17933',
							'17933'	=> '17933',
							'18252'	=> '18252',						
		                );
		echo form_dropdown('zip', $options, set_value('phone', ''));
		?>
                    </li>

				<li id="fieldBox_102" class="mainForm">
					<label class="formFieldQuestion">Please identify the Influences used during Engagement. (Check all that apply)&nbsp;*</label><span>

					<input type="checkbox" <? if (strpos($identify,'Integrity') !== false) {
					    echo 'checked';
					} ?> value="Integrity" id="field_102_option_1" name="identify[]" class="mainForm">
					<label for="field_102_option_1" class="formFieldOption">Integrity</label>
					<input type="checkbox"  <? if (strpos($identify,'Enthusiasm') !== false) {
					    echo 'checked';
					} ?> value="Enthusiasm" id="field_102_option_2" name="identify[]" class="mainForm">
					<label r="field_102_option_2" fostyle="position:relative; left:0; top:5px; " class="formFieldOption">Enthusiasm</label>
					<input type="checkbox" <? if (strpos($identify,'Humility') !== false) {
					    echo 'checked';
					} ?> value="Humility" id="field_102_option_3" name="identify[]" class="mainForm">
					<label for="field_102_option_3" class="formFieldOption">Humility</label>
					<input type="checkbox" <? if (strpos($identify,'Courage') !== false) {
					    echo 'checked';
					} ?> value="Courage" id="field_102_option_4" name="identify[]" class="mainForm">
					<label for="field_102_option_4" class="formFieldOption">Courage</label>
					<input type="checkbox" <? if (strpos($identify,'Consistency') !== false) {
					    echo 'checked';
					} ?> value="Consistency" id="field_102_option_5" name="identify[]" class="mainForm">
					<label for="field_102_option_5" class="formFieldOption">Consistency</label>
					<input  <? if (strpos($identify,'Responsibility') !== false) {
					    echo 'checked';
					} ?> type="checkbox" value="Responsibility" id="field_102_option_6" name="identify[]" class="mainForm">
					<label for="field_102_option_6" class="formFieldOption">Responsibility</label>
					<input  <? if (strpos($identify,'Accountability') !== false) {
					    echo 'checked';
					} ?> type="checkbox" value="Accountability" id="field_102_option_7" name="identify[]" class="mainForm">
					<label for="field_102_option_7" class="formFieldOption">Accountability</label>
					<input <? if (strpos($identify,'Contentment') !== false) {
					    echo 'checked';
					} ?> type="checkbox" value="Contentment" id="field_102_option_8" name="identify[]" class="mainForm">
					<label for="field_102_option_8" class="formFieldOption">Contentment</label></span></li>

				
					<li id="fieldBox_103" class="mainForm">
					<label class="formFieldQuestion">Was the supporter fully present?&nbsp;*</label>

				<?php
						$options = array(	'Yes'		=> 'Yes',
											'No'	=> 'No'
											
										
						                );
						echo form_dropdown('is_present', $options, set_value('phone', $is_present));
						?>
					</li>

				<li id="fieldBox_104" class="mainForm">
					<label class="formFieldQuestion">Do you feel satisfied with the T-MeD service?&nbsp;*</label>
                    

					<?php
							$options = array(	'Yes'		=> 'Yes',
												'No'	=> 'No'
												
											
							                );
							echo form_dropdown('is_service', $options, set_value('phone', $is_service));
							?>
					</li>

				<li style="height:184px; " id="fieldBox_105" class="mainForm">
					<label class="formFieldQuestion">The "Pulse"&nbsp;*</label>
                    <?php
					$data	= array('name'=>'pulse',  'value'=>set_value('pulse', ''));
					echo form_textarea($data);
					?>
                    </li>
				
				<li id="fieldBox_77" class="mainForm">
					<label class="formFieldQuestion">What Stage of Engagement is your relationship?&nbsp;*</label>
                    
					<?php
					$options = array(	
					''		=> '',
					'Phase I Creation'		=> 'Phase I Creation',
										'Phase II Connection'	=> 'Phase II Connection',
										'Phase III Development'	=> 'Phase III Development',
										'Phase IV Emancipation'	=> 'Phase IV Emancipation',
										
									
					                );
					echo form_dropdown('relatiopnship', $options, set_value('phone', ''));
					?>
                           </li>
				<li id="fieldBox_78" class="mainForm">
					<label class="formFieldQuestion">What Engagement Measures are applied by your supporter?&nbsp;*</label>
					<?php
					$options = array(	
					''		=> '',
					'Self Confidence'		=> 'Self Confidence',
										'Shared-Responsibility'	=> 'Shared-Responsibility',
										'Empathy'	=> 'Empathy',
										'Shared Disclosure'	=> 'Shared Disclosure',
										'Empathy'	=> 'Empathy',
										'Active Listening'	=> 'Active Listening',
										'Affirmation'	=> 'Affirmation',
										'Encouragement'	=> 'Encouragement',
										'Shared Acceptance'	=> 'Shared Acceptance',
										
										
									
					                );
					echo form_dropdown('supporter', $options, set_value('phone', ''));
					?>
				</li>
				<li id="fieldBox_79" class="mainForm">
					<label class="formFieldQuestion">Identify the locations of your visits&nbsp;*</label><span>
                    <input type="checkbox" <? if (strpos($visits,'Office') !== false) {
    //echo 'checked';
} ?> value="Office" id="field_79_option_1" name="visits[]" class="mainForm">
                    <label for="field_79_option_1" class="formFieldOption">Office</label>
                    <input type="checkbox" <? if (strpos($visits,'Community') !== false) {
    //echo 'checked';
} ?> value="Community" id="field_79_option_2" name="visits[]" class="mainForm">
                    <label for="field_79_option_2" class="formFieldOption">Community</label>
                    <input type="checkbox" <? if (strpos($visits,'Retreat') !== false) {
    //echo 'checked';
} ?> value="Retreat" id="field_79_option_3" name="visits[]" class="mainForm">
                    <label for="field_79_option_3" class="formFieldOption">Retreat</label>
                    <input type="checkbox" value="Probation/Parole Office"  <? if (strpos($visits,'Probation/Parole Office') !== false) {
    //echo 'checked';
} ?> id="field_79_option_4" name="visits[]" class="mainForm">
                    <label for="field_79_option_4" class="formFieldOption">Probation/Parole Office</label>
                    <input type="checkbox" <? if (strpos($visits,'Home') !== false) {
    //echo 'checked';
} ?> value="Home" id="field_79_option_5" name="visits[]" class="mainForm">
                    <label for="field_79_option_5" class="formFieldOption">Home</label>
                    <input type="checkbox" <? if (strpos($visits,'Wellness Trips') !== false) {
    //echo 'checked';
} ?> value="Wellness Trips" id="field_79_option_6" name="visits[]" class="mainForm">
                    <label for="field_79_option_6" class="formFieldOption">Wellness Trips</label>
                    <input type="checkbox" <? if (strpos($visits,'Other Service') !== false) {
    //echo 'checked';
} ?> value="Other Service" id="field_79_option_7" name="visits[]" class="mainForm">
                    <label for="field_79_option_7" class="formFieldOption">Other Service</label>
                    <input type="checkbox" value="-------------" id="field_79_option_8" name="visits[]" class="mainForm">
                    <label for="field_79_option_8" class="formFieldOption">-------------</label></span></li>

				<li id="fieldBox_80" class="mainForm">
					<label class="formFieldQuestion">What Phase of Transformative Medicine?&nbsp;*</label>
              
                     <?php
		$options = array(	
		''		=> '',
		'Phase I'		=> 'Phase I',
							'Phase II'	=> 'Phase II',
							'Phase III'	=> 'Phase III',
							
							
						
		                );
		echo form_dropdown('medicine', $options, set_value('phone', ''));
		?>
</li>

				<li id="fieldBox_81" class="mainForm">
                
                
					<label class="formFieldQuestion">What functional domain was the concentration?&nbsp;*</label>
                    
                     <?php
		$options = array(	
		''		=> '',
		'Self-Maintenance'		=> 'Self-Maintenance',
							'Social'	=> 'Social',
							'Vocational'	=> 'Vocational',
							'Educational'	=> 'Educational',
							
							
						
		                );
		echo form_dropdown('concentration', $options, set_value('phone', ''));
		?>
</li>

				<li id="fieldBox_82" class="mainForm">
					<label class="formFieldQuestion">The "Pulse"&nbsp;*</label>
                    
                    <?php
				$data	= array('name'=>'pulse2',  'value'=>set_value('pulse2', ''));
				echo form_textarea($data);
				?>
                </li>
		
		
			<!-- end page validaton -->

</ul></ul>

<div id="post-9" class="post-9 page type-page status-publish hentry" >
<button type="submit" style=" background-color: #6195C5;
    border: 2px solid #142872;
    color: #FFFFFF;
    margin-bottom: 7px;height: 36px;
    left: 201px;
    position: absolute;cursor: pointer;
      width: 137px;"><?php echo lang('form_save');?></button>
				<!--<div class="main-container" style="position:absolute; left:-50px; top:534px; " > -->
 				<?php /*?><div class="side-menu-class" >
       				 <ul id="side-menu" >
         			   <li style="position:absolute; left:-5px; top:63px; width:137px; height:36px; " ><a href="core.html" >Core Journal</a></li>
          			   <li style="position:absolute; left:201px; top:63px; width:137px; height:36px; " ><a href="core2.html" >Core Journal II</a></li>
          			   
						<li style="position:absolute; left:395px; top:63px; width:137px; height:36px; " ><a href="core3.html" >Core Journal III</a></li>
       				</ul>
    			</div>
<?php */?>

		
		<!-- close the display stuff for this page -->
    	</div></li></ul>
      	</form></div>
    	
<!-- .entry-content -->
<!-- #post-## -->

	
	</div><!-- #content -->







<?php include('footer.php');
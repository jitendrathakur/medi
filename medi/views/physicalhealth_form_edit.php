<?php include('header.php'); ?>

<style>
.main-container {height: 650px;!important}
</style>
					
    			<div class="journal-entries" >
    			

	<div style="height:100%; " id="mainForm" >


		<!-- begin form -->
		 <?php echo form_open_multipart($this->config->item('admin_folder').'forms/physicalhealth_form'); ?>
       <ul id="mainForm_5" class="mainForm">

				<li id="fieldBox_46" class="mainForm">
					<label class="formFieldQuestion">Do you receive treatment for?&nbsp;*</label><br><span>
                    <input type="checkbox" value="Diabetes" id="field_3_option_1" name="treatment[]" <? if (strpos($treatment,'Diabetes') !== false) {
    echo 'checked';
} ?> class="mainForm">
                    <label for="field_3_option_1" class="formFieldOption">Diabetes</label>
                    <input type="checkbox" value="High Blood Pressure" id="field_3_option_2" <? if (strpos($treatment,'High Blood Pressure') !== false) {
    echo 'checked';
} ?> name="treatment[]" class="mainForm">
                    <label for="field_3_option_2"  class="formFieldOption">High Blood Pressure</label>
                    <input type="checkbox" <? if (strpos($treatment,'High Cholesterol') !== false) {
    echo 'checked';
} ?>  value="High Cholesterol" id="field_3_option_3" name="treatment[]" class="mainForm">
                    <label for="field_3_option_3" class="formFieldOption">High Cholesterol</label>
                    <input type="checkbox" <? if (strpos($treatment,'Epilepsy') !== false) {
    echo 'checked';
} ?> value="Epilepsy" id="field_3_option_4" name="treatment[]" class="mainForm">
                    <label for="field_3_option_4" class="formFieldOption">Epilepsy</label>
                    <input type="checkbox" <? if (strpos($treatment,'Other') !== false) {
    echo 'checked';
} ?> value="Other" id="field_3_option_5" name="treatment[]" class="mainForm">
                    <label for="field_3_option_5" class="formFieldOption">Other</label></span></li>

				<li id="fieldBox_47" class="mainForm">
					<label class="formFieldQuestion">Do you have any STD or BBD?&nbsp;*</label>
                    <?php
		$options = array(	
		''		=> '',
		'Yes'		=> 'Yes',
							'No'	=> 'No'
							
						
		                );
		echo form_dropdown('is_std', $options, set_value('phone', $is_std));
		?>
                   </li>

				<li id="fieldBox_48" class="mainForm">
					<label class="formFieldQuestion">Have you had a physical in the past 12 months?&nbsp;*</label>
 <?php
		$options = array(	
		''		=> '',
		'Yes'		=> 'Yes',
							'No'	=> 'No'
							
						
		                );
		echo form_dropdown('is_physical', $options, set_value('phone', $is_physical));
		?></li>

				<li id="fieldBox_49" class="mainForm">
					<label class="formFieldQuestion">A vision/hearing test in the past two years?&nbsp;*</label>
 <?php
		$options = array(	
		''		=> '',
		'Yes'		=> 'Yes',
							'No'	=> 'No'
							
						
		                );
		echo form_dropdown('is_hearing', $options, set_value('phone', $is_hearing));
		?></li>

				<li id="fieldBox_50" class="mainForm">
					<label class="formFieldQuestion">Do you have a Primary Care Provider?&nbsp;*</label>
 <?php
		$options = array(	
		''		=> '',
		'Yes'		=> 'Yes',
							'No'	=> 'No'
							
						
		                );
		echo form_dropdown('is_provider', $options, set_value('phone', $is_provider));
		?></li>

				<li id="fieldBox_51" class="mainForm">
					<label class="formFieldQuestion">May we discuss your treatment with your PCP?&nbsp;*</label>
                     <?php
		$options = array(	
		''		=> '',
		'Yes'		=> 'Yes',
							'No'	=> 'No'
							
						
		                );
		echo form_dropdown('is_treatment', $options, set_value('phone', $is_treatment));
		?>
                    </li>

				<li id="fieldBox_52" class="mainForm">
					<label class="formFieldQuestion">Are you prescribed any physical health meds?&nbsp;*</label>
           <?php
		$options = array(	
		''		=> '',
		'Yes'		=> 'Yes',
							'No'	=> 'No'
							
						
		                );
		echo form_dropdown('is_meds', $options, set_value('phone', $is_meds));
		?></li>

				<li id="fieldBox_53" class="mainForm">
					<label class="formFieldQuestion">Do you use over the counter meds?&nbsp;*</label>
                    <?php
		$options = array(	
		''		=> '',
		'Yes'		=> 'Yes',
							'No'	=> 'No'
							
						
		                );
		echo form_dropdown('is_counter', $options, set_value('phone', $is_counter));
		?>
                    
                    </li>

				<li id="fieldBox_54" class="mainForm">
					<label class="formFieldQuestion">Do you use natural supplements, remedies?&nbsp;*</label>
                     <?php
		$options = array(	
		''		=> '',
		'Yes'		=> 'Yes',
							'No'	=> 'No'
							
						
		                );
		echo form_dropdown('is_remedies', $options, set_value('phone', $is_remedies));
		?>
                    </li>

				<li id="fieldBox_55" class="mainForm">
					<label class="formFieldQuestion">Did you lose/gain weight in the past 90 days?&nbsp;*</label>
<?php
		$options = array(	
		''		=> '',
		'Yes'		=> 'Yes',
							'No'	=> 'No'
							
						
		                );
		echo form_dropdown('is_weight', $options, set_value('phone', $is_weight));
		?>
</li>

				<li id="fieldBox_56" class="mainForm">
					<label class="formFieldQuestion">Are you happy with your weight?&nbsp;*</label>
                    <?php
		$options = array(	
		''		=> '',
		'Yes'		=> 'Yes',
							'No'	=> 'No'
							
						
		                );
		echo form_dropdown('is_happy', $options, set_value('phone', $is_happy));
		?>
                    </li>

				<li id="fieldBox_57" class="mainForm">
					<label class="formFieldQuestion">Are you experiencing any physical pain?&nbsp;*</label>
                 <?php
		$options = array(	
		''		=> '',
		'Yes'		=> 'Yes',
							'No'	=> 'No'
							
						
		                );
		echo form_dropdown('is_pain', $options, set_value('phone', $is_pain));
		?>
                </li>
</ul>
	
		<!-- end page validaton -->
		
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
    	<div id="content-container" class="full-width" >
	<div id="content" role="main" >

	
		<div id="post-9" class="post-9 page type-page status-publish hentry" >
		
  		</div></div></div></div></li></ul>
    			</form></div>
    			<div class="journal-entries" style="left:493px; top:-31px; height:100px; " > </div>


<!-- .entry-content -->
<!-- #post-## -->

	
	</div><!-- #content -->







<?php include('footer.php');
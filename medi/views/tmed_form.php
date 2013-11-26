<?php include('header.php'); ?>

					<style>
.main-container {height: 640px;!important}
</style>
    			<div class="journal-entries" >
    			

	<div style="height:100%; " id="mainForm" >


		<!-- begin form -->
		 <?php echo form_open_multipart($this->config->item('admin_folder').'forms/tmed_form'); ?>
      <ul id="mainForm_6" class="mainForm">

				<li id="fieldBox_59" class="mainForm first-child">
					<label class="formFieldQuestion">Are you satisfied with your Allowanced-Based Medicine?&nbsp;*</label>
  <?php
		$options = array(	
		''		=> '',
		'Yes'		=> 'Yes',
							'No'	=> 'No'
							
						
		                );
		echo form_dropdown('is_medicine', $options, set_value('phone', ''));
		?></li>

				<li id="fieldBox_60" class="mainForm">
					<label class="formFieldQuestion">Are you satisfied with your Psychiatric Medicine?&nbsp;*</label>
                      <?php
		$options = array(	
		''		=> '',
		'Yes'		=> 'Yes',
							'No'	=> 'No'
							
						
		                );
		echo form_dropdown('is_psychiatric', $options, set_value('phone', ''));
		?>
                    </li>

				<li id="fieldBox_61" class="mainForm">
					<label class="formFieldQuestion">Please select the category that best describes your Allowanced-Based Medicine&nbsp;*</label><span>
                    <input type="checkbox" value="Community-Based" id="field_61_option_1" name="category[]" <? if (strpos($category,'Community-Based') !== false) {
    //echo 'checked';
} ?> class="mainForm">
                    <label for="field_61_option_1" class="formFieldOption">Community-Based</label>
                    <input type="checkbox" value="Physical Activity" <? if (strpos($category,'Physical Activity') !== false) {
    //echo 'checked';
} ?> id="field_61_option_2" name="category[]" class="mainForm">
                    <label for="field_61_option_2" class="formFieldOption">Physical Activity</label>
                    <input type="checkbox" <? if (strpos($category,'Cultural') !== false) {
    //echo 'checked';
} ?> value="Cultural" id="field_61_option_3" name="category[]" class="mainForm">
                    <label for="field_61_option_3" class="formFieldOption">Cultural</label>
                    <input type="checkbox" value="Educational" <? if (strpos($category,'Educational') !== false) {
    //echo 'checked';
} ?> id="field_61_option_4" name="category[]" class="mainForm">
                    <label for="field_61_option_4" class="formFieldOption">Educational</label>
                    <input type="checkbox" value="Inter-Active" id="field_61_option_5" name="category[]" <? if (strpos($category,'Inter-Active') !== false) {
    //echo 'checked';
} ?> class="mainForm">
                    <label for="field_61_option_5" class="formFieldOption">Inter-Active</label>
                    <input type="checkbox" value="Self-Maintenance" id="field_61_option_6" name="category[]" <? if (strpos($category,'Self-Maintenance') !== false) {
    //echo 'checked';
} ?> class="mainForm">
                    <label for="field_61_option_6" class="formFieldOption">Self-Maintenance</label>
                    <input type="checkbox" value="Vocational" id="field_61_option_7" name="category[]" <? if (strpos($category,'Vocational') !== false) {
    //echo 'checked';
} ?> class="mainForm">
                    <label for="field_61_option_7" class="formFieldOption">Vocational</label>
                    <input type="checkbox" value="Social Development" id="field_61_option_8" name="category[]" <? if (strpos($category,'Social Development') !== false) {
    //echo 'checked';
} ?> class="mainForm">
                    <label for="field_61_option_8" class="formFieldOption">Social Development</label></span></li>

				<li id="fieldBox_62" class="mainForm">
					<label class="formFieldQuestion">Would you like to ask a question about Allowanced-Based Medicine?&nbsp;*</label><?php
		$options = array(	
		''		=> '',
		'Yes'		=> 'Yes',
							'No'	=> 'No'
							
						
		                );
		echo form_dropdown('is_question_medicine', $options, set_value('phone', ''));
		?></li>

				<li id="fieldBox_63" class="mainForm">
					<label class="formFieldQuestion">Would you like to ask a question about Psychiatric Medicine?&nbsp;*</label><?php
		$options = array(	
		''		=> '',
		'Yes'		=> 'Yes',
							'No'	=> 'No'
							
						
		                );
		echo form_dropdown('is_question_psychiatric', $options, set_value('phone', ''));
		?></li>

				<li id="fieldBox_64" class="mainForm">
					<label class="formFieldQuestion">The "Pulse"&nbsp;*</label> <?php
				$data	= array('name'=>'pulse',  'value'=>set_value('pulse', ''),'style'=>'border-image:initial; height:100px; color:#000000; border:1px solid #000000;');
				echo form_textarea($data);
				?></li>
		

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
    			</form>



    			</div>
    			<div class="journal-entries" style="left:493px; top:-31px; height:100px; " > </div>


<!-- .entry-content -->
<!-- #post-## -->

	
	</div><!-- #content -->


<?php include('footer.php');
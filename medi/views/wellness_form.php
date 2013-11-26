<?php include('header.php'); ?>

					<style>
.main-container {height: 630px;!important}
</style>
    			<div class="journal-entries" >
    			
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
	<div style="height:100%; " id="mainForm" >


		<!-- begin form -->
		 <?php echo form_open_multipart($this->config->item('admin_folder').'forms/wellness_form'); ?>
        <ul class="mainForm" id="mainForm_1" >

				<li class="mainForm" id="fieldBox_1" >
					<label class="formFieldQuestion" >How do you feel right now?&nbsp;*</label>
                    
                  <?php
				 
		$options = array(	'Excellent'		=> 'Excellent',
							'Good'	=> 'Good',
							'Not Sure'	=> 'Not Sure',
							'Bad'	=> 'Bad',
							'Terrible'	=> 'Terrible'
						
		                );
		echo form_dropdown('feel', $options, set_value('phone', ''));
		?>

                    </li>

				<li class="mainForm" id="fieldBox_2" >
					<label class="formFieldQuestion" >Are you satisfied with your wellness?&nbsp;*</label>
                   
                    
                     <?php
		$options = array(	'Yes'		=> 'Yes',
							'No'	=> 'No'
							
						
		                );
		echo form_dropdown('wellness', $options, set_value('phone', ''));
		?>
                    </li>

				<li class="mainForm" id="fieldBox_3" >
               
					<label class="formFieldQuestion" >Are You? Check all that may apply</label><br><span>
                    <input class="mainForm" type="checkbox" name="apply[]" id="field_3_option_1" <? if (strpos($apply,'Manic or  Hyper') !== false) {
    //echo 'checked';
} ?> value="Manic or  Hyper" />
                    <label class="formFieldOption" for="field_3_option_1" >Manic or  Hyper</label>
                    <input class="mainForm" type="checkbox" name="apply[]" id="field_3_option_2" value="Depressed" <? if (strpos($apply,'Depressed') !== false) {
    //echo 'checked';
} ?> />
                    <label class="formFieldOption" for="field_3_option_2" >Depressed</label>
                    <input class="mainForm" type="checkbox" name="apply[]" <? if (strpos($apply,'Hallucinating') !== false) {
    //echo 'checked';
} ?> id="field_3_option_3" value="Hallucinating" />
                    <label class="formFieldOption" for="field_3_option_3" >Hallucinating</label>
                    <input class="mainForm" type="checkbox" name="apply[]" id="field_3_option_4" value="Anxious" <? if (strpos($apply,'Anxious') !== false) {
    //echo 'checked';
} ?> />
                    <label class="formFieldOption" for="field_3_option_4" >Anxious</label>
                    <input class="mainForm" type="checkbox" name="apply[]" <? if (strpos($apply,'Lonely') !== false) {
    //echo 'checked';
} ?> id="field_3_option_5" value="Lonely" />
                    <label class="formFieldOption" for="field_3_option_5" >Lonely</label>
                    <input class="mainForm" type="checkbox" name="apply[]" <? if (strpos($apply,'Hearing Voices') !== false) {
    //echo 'checked';
} ?> id="field_3_option_6" value="Hearing Voices" />
                    <label class="formFieldOption" for="field_3_option_6" >Hearing Voices</label>
                    <input class="mainForm" type="checkbox" name="apply[]" <? if (strpos($apply,'Angry/Irritable') !== false) {
    //echo 'checked';
} ?> id="field_3_option_7" value="Angry/Irritable" />
                    <label class="formFieldOption" for="field_3_option_7" >Angry/Irritable</label>
                    <input class="mainForm" type="checkbox" name="apply[]" id="field_3_option_8" <? if (strpos($apply,'Thinking of Self-Harm') !== false) {
    //echo 'checked';
} ?> value="Thinking of Self-Harm" />
                    <label class="formFieldOption" for="field_3_option_8" >Thinking of Self-Harm</label></span></li>

				<li class="mainForm" id="fieldBox_4" >
					<label class="formFieldQuestion" >How long since my last hospitalization?&nbsp;*</label>
                    

                     <?php
		$options = array(	'0-30 Days'		=> '0-30 Days',
							'31-90 Days'	=> '31-90 Days',
							'91-180 Days'	=> '91-180 Days',
							'181-360 Days'	=> '181-360 Days'
							
						
		                );
		echo form_dropdown('hospitalization', $options, set_value('phone', ''));
		?> 
                    </li>

				<li class="mainForm" id="fieldBox_5" >
					<label class="formFieldQuestion" >How long since my last contact with crisis?&nbsp;*</label>
                <?php
		$options = array(	'0-30 Days'		=> '0-30 Days',
							'31-90 Days'	=> '31-90 Days',
							'91-180 Days'	=> '91-180 Days',
							'181-360 Days'	=> '181-360 Days'
							
						
		                );
		echo form_dropdown('crisis', $options, set_value('phone', ''));
		?> 
        </li>

				<li class="mainForm" id="fieldBox_6" >
					<label class="formFieldQuestion" >The "Pulse"&nbsp;*</label><?php
				$data	= array('name'=>'pulse',  'value'=>set_value('pulse', ''),'style'=>'border-image:initial; height:100px; color:#000000; border:1px solid #000000;');
				echo form_textarea($data);
				?></li>
		
	
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

    			<a href="<?php echo base_url('forms/forensic_form') ?>" style="   background-color: #6195C5;
    border: 2px solid #142872;
    bottom: 59px;
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


    			</div>
    			<div class="journal-entries" style="left:493px; top:-31px; height:100px; " > </div>


<!-- .entry-content -->
<!-- #post-## -->

	
	</div><!-- #content -->







<?php include('footer.php');
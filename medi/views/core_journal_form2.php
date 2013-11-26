<?php include('header.php'); ?>

					<style>
.main-container {height: 950px;!important}
</style>
    			<div class="journal-entries" >
    			

	<div style="height:100%; " id="mainForm" >


		<!-- begin form -->
		 <?php echo form_open_multipart($this->config->item('admin_folder').'forms/core_journal_form2'); ?>
      <ul id="mainForm_11" class="mainForm">

      			
				<li id="fieldBox_92" class="mainForm first-child">
					<label class="formFieldQuestion"><span style="white-space:pre; " class="Apple-tab-span">
									</span>&nbsp; &nbsp;T-MeD Recovery &amp; Wellness Goals</label>
				</li>

				<li id="pfieldBox_83" class="mainForm">
					<label class="formFieldQuestion">Patient:&nbsp;*</label>
	      			<select name="patient">
						<?php foreach ($patient as $key => $value) {
						?>
						<option value="<?php echo $value->id; ?>"><?php echo $value->firstname. ' '.$value->lastname; ?></option>
						<?php } ?>
					</select> 
				</li>


				<li id="fieldBox_93" class="mainForm">
					<label class="formFieldQuestion">Date:&nbsp;*</label>
                   
 <?php
			$data	= array('id' => 'datepicker', 'name'=>'coredate', 'value'=>set_value('coredate', ''), 'class'=>'mainForm','style'=>'border-image:initial; height:20px; color:#000000; border:1px solid #000000;');
			echo form_input($data); ?>
				<li id="fieldBox_94" class="mainForm">
					<label class="formFieldQuestion">Renewal:&nbsp;*</label>
                     <?php
			$data	= array('name'=>'renewal', 'value'=>set_value('renewal', ''), 'class'=>'mainForm','style'=>'border-image:initial; height:20px; color:#000000; border:1px solid #000000;');
			echo form_input($data); ?>
                    </li>

				<li id="fieldBox_95" class="mainForm">
					<label class="formFieldQuestion">T-MeD Plan#:&nbsp;*</label>
                    
                      <?php
			$data	= array('name'=>'plan', 'value'=>set_value('plan', ''), 'class'=>'mainForm','style'=>'border-image:initial; height:20px; color:#000000; border:1px solid #000000;');
			echo form_input($data); ?>
                    </li>

				<li id="fieldBox_96" class="mainForm">
					<label class="formFieldQuestion">Goal One:&nbsp;*</label>
                    

<?php
				$data	= array('name'=>'goal',  'value'=>set_value('goal', ''),'style'=>'border-image:initial; height:100px; color:#000000; border:1px solid #000000;');
				echo form_textarea($data);
				?>
</li>

				<li id="fieldBox_97" class="mainForm">
					<label class="formFieldQuestion">Step I:&nbsp;*</label>
                    
                    <?php
				$data	= array('name'=>'step1',  'value'=>set_value('step1', ''),'style'=>'border-image:initial; height:100px; color:#000000; border:1px solid #000000;');
				echo form_textarea($data);
				?>
                   </li>

				<li id="fieldBox_98" class="mainForm">
					<label class="formFieldQuestion">Step II:&nbsp;*</label>
                    
 <?php
				$data	= array('name'=>'step2',  'value'=>set_value('step2', ''),'style'=>'border-image:initial; height:100px; color:#000000; border:1px solid #000000;');
				echo form_textarea($data);
				?>
</li>

				<li id="fieldBox_99" class="mainForm">
					<label class="formFieldQuestion">Step III:&nbsp;*</label>
                     <?php
				$data	= array('name'=>'step3',  'value'=>set_value('step3', ''),'style'=>'border-image:initial; height:100px; color:#000000; border:1px solid #000000;');
				echo form_textarea($data);
				?>
                    </li>

				<li id="fieldBox_100" class="mainForm">
					<label class="formFieldQuestion">Target Dates &amp; Concentration:&nbsp;*</label>

 <?php
				$data	= array('name'=>'target',  'value'=>set_value('target', ''),'style'=>'border-image:initial; height:100px; color:#000000; border:1px solid #000000;');
				echo form_textarea($data);
				?>
</li>
		
		
		<!-- end of this page -->

		<!-- page validation -->
	

		<!-- end page validaton -->


						</ul>
                        
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
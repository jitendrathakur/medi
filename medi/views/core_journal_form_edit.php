<?php include('header.php'); ?>

					
    			<div class="journal-entries" >
    			

	<div style="height:100%; " id="mainForm" >


		<!-- begin form -->
		 <?php echo form_open_multipart($this->config->item('admin_folder').'forms/core_journal_form_edit/'.$id); ?>
		 
      <ul id="mainForm_10" class="mainForm">
      
      <span style="white-space:pre; " class="Apple-tab-span">	


      			</span>&nbsp; &nbsp;T-MeD Encounter Report<b></b><br>


	      		<li id="pfieldBox_83" class="mainForm">
					<label class="formFieldQuestion">Patient:&nbsp;*</label>
	      			<select name="patient">
						<?php foreach ($patient as $key => $value) {
						?>
						<option value="<?php echo $value->id; ?>"><?php echo $value->firstname. ' '.$value->lastname; ?></option>
						<?php } ?>
					</select> 
				</li>



      			<li id="fieldBox_84" class="mainForm">
					<label class="formFieldQuestion">Date:&nbsp;*</label>

                    <?php
			$data	= array('name'=>'coredate', 'value'=>set_value('coredate', $coredate), 'class'=>'mainForm','style'=>'border-image:initial; height:20px; color:#000000; border:1px solid #000000;');
			echo form_input($data); ?>
                    </li>

				<li id="fieldBox_85" class="mainForm">
					<label class="formFieldQuestion">Start Time:&nbsp;*</label>
                      <?php
			$data	= array('name'=>'starttime', 'value'=>set_value('starttime', $starttime), 'class'=>'mainForm','style'=>'border-image:initial; height:20px; color:#000000; border:1px solid #000000;');
			echo form_input($data); ?>
                    
                    </li>

				<li id="fieldBox_86" class="mainForm">
					<label class="formFieldQuestion">Stop Time :&nbsp;*</label>
                      <?php
			$data	= array('name'=>'endtime', 'value'=>set_value('endtime', $endtime), 'class'=>'mainForm','style'=>'border-image:initial; height:20px; color:#000000; border:1px solid #000000;');
			echo form_input($data); ?>
                  

			

				<li id="fieldBox_88" class="mainForm">
					<label class="formFieldQuestion">Goal</label>
                    
                   
                      <?php
		$options = array(	
		''		=> '',
		'Goal 1'		=> 'Goal 1',
							'Goal 2'	=> 'Goal 2',
							'Goal 3'	=> 'Goal 3',
							
						
		                );
		echo form_dropdown('goal', $options, set_value('phone', $goal));
		?>
                    </li>

				<li id="fieldBox_89" class="mainForm">
					<label class="formFieldQuestion">FIF&nbsp;*</label>
                
                     <?php
		$options = array(	
		''		=> '',
		'Self-Maintenance'		=> 'Self-Maintenance',
							'Vocational'	=> 'Vocational',
							'Education'	=> 'Education',
							'Social'	=> 'Social',
							
						
		                );
		echo form_dropdown('fif', $options, set_value('phone', $fif));
		?>
                    </li>

				<li id="fieldBox_90" class="mainForm">
					<label class="formFieldQuestion">Visit Report:&nbsp;*</label>
                   
                    <?php
				$data	= array('name'=>'visit',  'value'=>set_value('visit', $visit),'style'=>'border-image:initial; height:100px; color:#000000; border:1px solid #000000;');
				echo form_textarea($data);
				?>
                    </li>

				<li id="fieldBox_91" class="mainForm">
					<label class="formFieldQuestion">Follow-Up (Who, What, Where, When):&nbsp;*</label>
<?php
				$data	= array('name'=>'followup',  'value'=>set_value('followup', $followup),'style'=>'border-image:initial; height:100px; color:#000000; border:1px solid #000000;');
				echo form_textarea($data);
				?>
</li>
		
		
		<!-- end of this page -->

	

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
    			<div class="journal-entries" style="left:493px; top:-31px; height:100px; " > </div>


<!-- .entry-content -->
<!-- #post-## -->

	
	</div><!-- #content -->







<?php include('footer.php');
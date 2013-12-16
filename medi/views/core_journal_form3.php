<?php include('header.php'); ?>
          
<div class="col-md-10 well">

    <!-- begin form -->
    <h2>T-MeD Compass Center</h2>

		<!-- begin form -->
		<?php
        $formUrl = !empty($id) ? 'forms/core_journal_form3_edit/'.$id : 'forms/core_journal_form3';
		?>
		<?php echo form_open_multipart($this->config->item('admin_folder').$formUrl, array('class' => 'form-horizontal')); ?>
    	
			<div class="form-group">
		        <label for="inputEmail3" class="col-sm-2 control-label">Patient</label>
		        <div class="col-sm-10">
		          <select name="patient" class='span3'>
		            <?php foreach ($patient as $key => $value) {
		            ?>
		            <option value="<?php echo $value->id; ?>"><?php echo $value->firstname. ' '.$value->lastname; ?></option>
		            <?php } ?>
		          </select> 
		        </div>
		    </div>

		    <div class="form-group">
		        <label for="inputEmail3" class="col-sm-2 control-label">Please Select the ZIP Code of your current residence</label>
		        <div class="col-sm-10">
			        <?php
						$options = array(	
						''		=> '',
						'17901'		=> '17901',
						'17922'	=> '17922',
						'17933'	=> '17933',
						'17933'	=> '17933',
						'18252'	=> '18252',						
	                );
					echo form_dropdown('zip', $options, set_value('phone', $zip), 'class="span3"');
					?>
		        </div>
		    </div>

		    <div class="form-group">
		    	<div class="checkbox">
		        <label for="" class="col-sm-8 control-label">
			        <input type="checkbox" <? if (strpos($identify,'Integrity') !== false) {
					    echo 'checked';
					} ?> value="Integrity" id="field_102_option_1" name="identify[]" class="">
			        Please identify the Influences used during Engagement. (Check all that apply)

		        </label>
		    	</div>
		        
				<div class="checkbox">
				<label for="" class="col-sm-3 control-label">
					<input type="checkbox"  <? if (strpos($identify,'Enthusiasm') !== false) {
					    echo 'checked';
					} ?> value="Enthusiasm" id="field_102_option_2" name="identify[]" class="">
					Enthusiasm
				</label>
				</div>
				<div class="checkbox">
				<label class="col-sm-3 control-label">
				<input type="checkbox" <? if (strpos($identify,'Humility') !== false) {
				    echo 'checked';
				} ?> value="Humility" id="field_102_option_3" name="identify[]" class="">

				Humility</label>
				</div>
				<div class="checkbox">
				<label class="col-sm-3 control-label">
				<input type="checkbox" <? if (strpos($identify,'Courage') !== false) {
				    echo 'checked';
				} ?> value="Courage" id="field_102_option_4" name="identify[]" class="">

				Courage</label>
				</div>
				<div class="checkbox">
				<label class="col-sm-3 control-label">
				<input type="checkbox" <? if (strpos($identify,'Consistency') !== false) {
				    echo 'checked';
				} ?> value="Consistency" id="field_102_option_4" name="identify[]" class="">

				Consistency</label>
				</div>
				<div class="checkbox">
				<label class="col-sm-3 control-label">
				<input type="checkbox" <? if (strpos($identify,'Consistency') !== false) {
				    echo 'checked';
				} ?> value="Consistency" id="field_102_option_5" name="identify[]" class="">

				Consistency</label>
				</div>
				<div class="checkbox">
				<label for="" class="col-sm-3 control-label">

				<input  <? if (strpos($identify,'Responsibility') !== false) {
				    echo 'checked';
				} ?> type="checkbox" value="Responsibility" id="field_102_option_6" name="identify[]" class="">

				Responsibility</label>
				</div>
				<div class="checkbox">
				<label for="" class="col-sm-3 control-label">

				<input  <? if (strpos($identify,'Accountability') !== false) {
				    echo 'checked';
				} ?> type="checkbox" value="Accountability" id="field_102_option_7" name="identify[]" class="">

				Accountability</label>
				</div>
				<div class="checkbox">
				<label for="" class="col-sm-3 control-label">

				<input <? if (strpos($identify,'Contentment') !== false) {
				    echo 'checked';
				} ?> type="checkbox" value="Contentment" id="field_102_option_8" name="identify[]" class="">

				Contentment</label>		
				</div>		

		    </div>

		    <div class="form-group">
		        <label for="inputEmail3" class="col-sm-2 control-label">Was the supporter fully present?</label>
		        <div class="col-sm-10">
			        <?php
						$options = array(
							'Yes'		=> 'Yes',
							'No'	=> 'No'
						);
						echo form_dropdown('is_present', $options, set_value('is_present', $is_present), 'class="span3"');
					?>
		        </div>
		    </div>

		    <div class="form-group">
		        <label for="inputEmail3" class="col-sm-2 control-label">Do you feel satisfied with the T-MeD service?</label>
		        <div class="col-sm-10">
			        <?php
						$options = array(
							'Yes'		=> 'Yes',
							'No'	=> 'No'
						);
						echo form_dropdown('is_present', $options, set_value('is_present', $is_present), 'class="span3"');
					?>
		        </div>
		    </div>

		    <div class="form-group">
		        <label for="inputEmail3" class="col-sm-2 control-label">The "Pulse"</label>
		        <div class="col-sm-10">
			        <?php
					$data	= array('name'=>'pulse',  'value'=>set_value('pulse', $pulse), 'class'=>'form-control');
					echo form_textarea($data);
					?>
		        </div>
		    </div>

		    <div class="form-group">
		        <label for="inputEmail3" class="col-sm-2 control-label">What Stage of Engagement is your relationship</label>
		        <div class="col-sm-10">
			        <?php
					$options = array(	
						''		=> '',
						'Phase I Creation'		=> 'Phase I Creation',
						'Phase II Connection'	=> 'Phase II Connection',
						'Phase III Development'	=> 'Phase III Development',
						'Phase IV Emancipation'	=> 'Phase IV Emancipation',
					);
					echo form_dropdown('relatiopnship', $options, set_value('relatiopnship', $relatiopnship), 'class="span3"');
					?>
		        </div>
		    </div>

		    <div class="form-group">
		        <label for="inputEmail3" class="col-sm-2 control-label">What Engagement Measures are applied by your supporter?</label>
		        <div class="col-sm-10">
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
					echo form_dropdown('supporter', $options, set_value('supporter', $supporter), 'class="span3"');
					?>
		        </div>
		    </div>

		    <div class="form-group">

		    	<div class="checkbox">
		    	<label class="col-sm-4 control-label">

		    	<input type="checkbox" <? if (strpos($visits,'Office') !== false) {
    			echo 'checked';
				} ?> value="Office" id="field_79_option_1" name="visits[]" class="">

		    	Identify the locations of your visits&nbsp;*</label>

		    	</div>
		        
				<div class="checkbox">
                
                <label for="" class="col-sm-2 control-label">
                <input type="checkbox" <? if (strpos($visits,'Community') !== false) {
    			echo 'checked';
				} ?> value="Community" id="field_79_option_2" name="visits[]" class="">

                Office</label>

                </div>
		        
				<div class="checkbox">
                
                <label for="" class="col-sm-2 control-label">

                <input type="checkbox" <? if (strpos($visits,'Retreat') !== false) {
    			echo 'checked';
				} ?> value="Retreat" id="field_79_option_3" name="visits[]" class="">

                Community</label>

                </div>
		        
				<div class="checkbox">
               
                <label for="" class="col-sm-2 control-label">

                <input type="checkbox" value="Probation/Parole Office"  <? if (strpos($visits,'Probation/Parole Office') !== false) {
    			echo 'checked';
				} ?> id="field_79_option_4" name="visits[]" class="">

                Retreat</label>

                </div>
		        
				<div class="checkbox">
                
                <label for="" class="col-sm-3 control-label">

                <input type="checkbox" <? if (strpos($visits,'Home') !== false) {
    			echo 'checked';
				} ?> value="Home" id="field_79_option_5" name="visits[]" class="">

                Probation/Parole Office</label>

                </div>
		        
				<div class="checkbox">
                
                <label for="" class="col-sm-2 control-label">

                <input type="checkbox" <? if (strpos($visits,'Wellness Trips') !== false) {
    			echo 'checked';
				} ?> value="Wellness Trips" id="field_79_option_6" name="visits[]" class="">

                Home</label>

                </div>
		        
				<div class="checkbox">
                
                <label for="" class="col-sm-2 control-label">

                <input type="checkbox" <? if (strpos($visits,'Other Service') !== false) {
    			echo 'checked';
				} ?> value="Other Service" id="field_79_option_7" name="visits[]" class="">

                Wellness Trips</label>

                </div>
		        
				<div class="checkbox">
                
                <label for="" class="col-sm-2 control-label">

                <input type="checkbox" <? if (strpos($visits,'Other Service') !== false) {
    			echo 'checked';
				} ?> value="-------------" id="field_79_option_8" name="visits[]" class="">

                Other Service</label>  

                </div>
		        
		    </div>

		    <div class="form-group">
		        <label for="inputEmail3" class="col-sm-2 control-label">What Phase of Transformative Medicine?</label>
		        <div class="col-sm-10">
			        <?php
						$options = array(	
						''		=> '',
						'Phase I'		=> 'Phase I',
						'Phase II'	=> 'Phase II',
						'Phase III'	=> 'Phase III',
					);
					echo form_dropdown('medicine', $options, set_value('medicine', $medicine), 'class="span3"');
					?>
		        </div>
		    </div>

		    <div class="form-group">
		        <label for="inputEmail3" class="col-sm-2 control-label">What functional domain was the concentration?</label>
		        <div class="col-sm-10">
			        <?php
					$options = array(	
						''		=> '',
						'Self-Maintenance'		=> 'Self-Maintenance',
						'Social'	=> 'Social',
						'Vocational'	=> 'Vocational',
						'Educational'	=> 'Educational',
					);
					echo form_dropdown('concentration', $options, set_value('concentration', $concentration), 'class="span3"');
					?>
		        </div>
		    </div>

		    <div class="form-group">
		        <label for="inputEmail3" class="col-sm-2 control-label">The "Pulse 2"</label>
		        <div class="col-sm-10">
			        <?php
					$data	= array('name'=>'pulse2',  'value'=>set_value('pulse2', $pulse2),'class'=>'form-control');
					echo form_textarea($data);
					?>
		        </div>
		    </div>
    		
		    <div class="form-group">
		        <div class="col-sm-offset-2 col-sm-10">
		          <button type="submit" class="btn btn-primary btn-large"><?php echo lang('form_save');?></button>
		        </div>
		    </div>
    	</form>
  	</div>
</div>
 

<?php include('footer.php');
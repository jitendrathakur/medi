<?php include('header.php'); ?>
		
  	<div class="col-md-10 well">

	<!-- begin form -->
	<h2>T-MeD Recovery &amp; Wellness Goals</h2>
	<?php echo form_open_multipart($this->config->item('admin_folder').'forms/core_journal_form2', array('class' => 'form-horizontal')); ?>
      
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
	        <label for="inputEmail3" class="col-sm-2 control-label">Date</label>
	        <div class="col-sm-10">
	           <?php
				$data	= array('id' => 'datepicker', 'name'=>'coredate', 'value'=>set_value('coredate', ''), 'class'=>'form-control');
				echo form_input($data); ?>
	        </div>
	    </div>

	    <div class="form-group">
	        <label for="inputEmail3" class="col-sm-2 control-label">Renewal</label>
	        <div class="col-sm-10">
	          <?php
			$data	= array('id' => 'renewal', 'name'=>'renewal', 'value'=>set_value('renewal', ''), 'class'=>'form-control');
			echo form_input($data); ?>
	        </div>
	    </div>

	    <div class="form-group">
	        <label for="inputEmail3" class="col-sm-2 control-label">T-MeD Plan</label>
	        <div class="col-sm-10">
	          	<?php
				$data	= array('name'=>'plan', 'value'=>set_value('plan', ''), 'class'=>'form-control');
				echo form_input($data); ?>
	        </div>
	    </div>

	    <div class="form-group">
	        <label for="inputEmail3" class="col-sm-2 control-label">Goal One</label>
	        <div class="col-sm-10">
	          	<?php
				$data	= array('name'=>'goal',  'value'=>set_value('goal', ''), 'class' => 'form-control');
				echo form_textarea($data);
				?>
	        </div>
	    </div>

	    <div class="form-group">
	        <label for="inputEmail3" class="col-sm-2 control-label">Step I</label>
	        <div class="col-sm-10">
	          	<?php
				$data	= array('name'=>'step1',  'value'=>set_value('step1', ''), 'class' => 'form-control');
				echo form_textarea($data);
				?>
	        </div>
	    </div>

	    <div class="form-group">
	        <label for="inputEmail3" class="col-sm-2 control-label">Step II</label>
	        <div class="col-sm-10">
	          	<?php
				$data	= array('name'=>'step2',  'value'=>set_value('step2', ''), 'class' => 'form-control');
				echo form_textarea($data);
				?>
	        </div>
	    </div>

	    <div class="form-group">
	        <label for="inputEmail3" class="col-sm-2 control-label">Step III</label>
	        <div class="col-sm-10">
	          	<?php
				$data	= array('name'=>'step3',  'value'=>set_value('step3', ''), 'class' => 'form-control');
				echo form_textarea($data);
				?>
	        </div>
	    </div>

	    <div class="form-group">
	        <label for="inputEmail3" class="col-sm-2 control-label">Target Dates &amp; Concentration</label>
	        <div class="col-sm-10">
	          	<?php
				$data	= array('name'=>'target',  'value'=>set_value('target', ''), 'class' => 'form-control');
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
<?php include('header.php'); ?>

	         
<div class="col-md-10 well">

    <!-- begin form -->
    <h2>T-MeD Encounter Report</h2>
    
    <?php echo form_open_multipart($this->config->item('admin_folder').'forms/core_journal_form_edit/'.$id, array('class' => 'form-horizontal')); ?>
      <div class="form-group">
        <label for="inputEmail3" class="col-sm-2 control-label">Patient</label>
        <div class="col-sm-10">
          	<select name="patient">
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
          	$data	= array('name'=>'coredate', 'value'=>set_value('coredate', $coredate), 'class'=>'form-control');
			echo form_input($data); ?>
        </div>
      </div>

      <div class="form-group">
        <label for="inputEmail3" class="col-sm-2 control-label">Start Time</label>
        <div class="col-sm-10">
          	<?php
          	$data	= array('name'=>'starttime', 'value'=>set_value('starttime', $starttime), 'class'=>'form-control');
			echo form_input($data); ?>
        </div>
      </div>

      <div class="form-group">
        <label for="inputEmail3" class="col-sm-2 control-label">Stop Time</label>
        <div class="col-sm-10">
          	<?php
          	$data	= array('name'=>'endtime', 'value'=>set_value('endtime', $endtime), 'class'=>'form-control');
			echo form_input($data); ?>
        </div>
      </div>

      <div class="form-group">
        <label for="inputEmail3" class="col-sm-2 control-label">Goal</label>
        <div class="col-sm-10">
          <?php
          $options = array( 
            ''    => '',
            'Goal 1'    => 'Goal 1',
            'Goal 2'  => 'Goal 2',
            'Goal 3'  => 'Goal 3',
          );
          echo form_dropdown('goal', $options, set_value('goal', $goal));
          ?> 
        </div>
      </div>

      <div class="form-group">
        <label for="inputEmail3" class="col-sm-2 control-label">FIF</label>
        <div class="col-sm-10">
          <?php
          $options = array( 
            ''    => '',
            'Self-Maintenance'    => 'Self-Maintenance',
            'Vocational'  => 'Vocational',
            'Education' => 'Education',
            'Social'  => 'Social',
          );
          echo form_dropdown('fif', $options, set_value('fif', $fif));
          ?> 
        </div>
      </div>

      <div class="form-group">
        <label for="inputEmail3" class="col-sm-2 control-label">Visit Report</label>
        <div class="col-sm-10">
          <?php
          $data	= array('name'=>'visit',  'value'=>set_value('visit', $visit), 'class' => 'form-control');
          echo form_textarea($data);
          ?>
        </div>
      </div>

      <div class="form-group">
        <label for="inputEmail3" class="col-sm-2 control-label">Follow-Up (Who, What, Where, When)</label>
        <div class="col-sm-10">
          <?php
          $data	= array('name'=>'followup',  'value'=>set_value('followup', $followup), 'class' => 'form-control');
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

<?php include('header.php'); ?>

 <style type="text/css">
    /* some styling for the page */
    body { font-size: 10px; /* for the widget natural size */ }
    #content { font-size: 1.2em; /* for the rest of the page to show at a normal size */
               font-family: "Lucida Sans Unicode", "Lucida Grande", Verdana, Arial, Helvetica, sans-serif;
               width: 950px; margin: auto;
    }
    .code { margin: 6px; padding: 9px; background-color: #fdf5ce; border: 1px solid #c77405; }
    fieldset { padding: 0.5em 2em }
    hr { margin: 0.5em 0; clear: both }
    a { cursor: pointer; }
    #requirements li { line-height: 1.6em; }
</style>
  
<script type="text/javascript">
  $(document).ready(function() {
      $('#timepicker_start').timepicker({
          showLeadingZero: false,
          onSelect: tpStartSelect,
          maxTime: {
              hour: 16, minute: 30
          }
      });
      $('#timepicker_end').timepicker({
          showLeadingZero: false,
          onSelect: tpEndSelect,
          minTime: {
              hour: 9, minute: 15
          }
      });
  });

  // 1when start time change, update minimum for end timepicker
  function tpStartSelect( time, endTimePickerInst ) {
      $('#timepicker_end').timepicker('option', {
          minTime: {
              hour: endTimePickerInst.hours,
              minute: endTimePickerInst.minutes
          }
      });
  }

  // when end time change, update maximum for start timepicker
  function tpEndSelect( time, startTimePickerInst ) {
      $('#timepicker_start').timepicker('option', {
          maxTime: {
              hour: startTimePickerInst.hours,
              minute: startTimePickerInst.minutes
          }
      });
  }
</script>

          
<div class="col-md-10 well">

    <!-- begin form -->
    <h2>T-MeD Encounter Report</h2>
    <?php echo form_open_multipart($this->config->item('admin_folder').'forms/core_journal_form', array('class' => 'form-horizontal')); ?>
    
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
          $data = array('id' => 'datepicker', 'name'=>'coredate', 'value'=>set_value('coredate', ''), 'class'=>'form-control','style'=>'');
          echo form_input($data); ?>
        </div>
      </div>

      <div class="form-group">
        <label for="inputEmail3" class="col-sm-2 control-label">Start Time</label>
        <div class="col-sm-10">
          <?php
          $data = array('id' => 'timepicker_start', 'name'=>'starttime', 'value'=>set_value('starttime', ''), 'class'=>'form-control','style'=>'');
          echo form_input($data); ?>
        </div>
      </div>

      <div class="form-group">
        <label for="inputEmail3" class="col-sm-2 control-label">Stop Time</label>
        <div class="col-sm-10">
          <?php
          $data = array('id' => 'timepicker_end', 'name'=>'endtime', 'value'=>set_value('endtime', ''), 'class'=>'form-control','style'=>'');
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
          echo form_dropdown('goal', $options, set_value('goal', ''));
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
          echo form_dropdown('fif', $options, set_value('phone', ''));
          ?> 
        </div>
      </div>

      <div class="form-group">
        <label for="inputEmail3" class="col-sm-2 control-label">Visit Report</label>
        <div class="col-sm-10">
          <?php
          $data = array('name'=>'visit',  'value'=>set_value('visit', ''),'class'=>'form-control', 'rows' => '3');
          echo form_textarea($data);
          ?>
        </div>
      </div>

      <div class="form-group">
        <label for="inputEmail3" class="col-sm-2 control-label">Follow-Up (Who, What, Where, When)</label>
        <div class="col-sm-10">
          <?php
          $data = array('name'=>'followup',  'value'=>set_value('followup', ''),'class'=>'form-control', 'rows' => '3');
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
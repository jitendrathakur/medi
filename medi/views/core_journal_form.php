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

          
<div class="span8" style="margin-left:150px" >
          

  <div style="height:100%; " id="" class="well" >


    <!-- begin form -->
     <?php echo form_open_multipart($this->config->item('admin_folder').'forms/core_journal_form'); ?>
     
      <ul id="mainForm_10" class="mainForm">
      
        <h2>T-MeD Encounter Report</h2>


            <li id="pfieldBox_83" class="span12">
          <label class="formFieldQuestion span2">Patient:&nbsp;*</label>
              <select name="patient" class='span3'>
            <?php foreach ($patient as $key => $value) {
            ?>
            <option value="<?php echo $value->id; ?>"><?php echo $value->firstname. ' '.$value->lastname; ?></option>
            <?php } ?>
          </select> 
        </li>



            <li id="fieldBox_84" class="span12">
          <label class="formFieldQuestion span2">Date:&nbsp;*</label>

                    <?php
      $data = array('id' => 'datepicker', 'name'=>'coredate', 'value'=>set_value('coredate', ''), 'class'=>'span3','style'=>'');
      echo form_input($data); ?>
                    </li>

        <li id="fieldBox_85" class="span12">
          <label class="formFieldQuestion span2">Start Time:&nbsp;*</label>
                      <?php
      $data = array('id' => 'timepicker_start', 'name'=>'starttime', 'value'=>set_value('starttime', ''), 'class'=>'span3','style'=>'');
      echo form_input($data); ?>
                    
                    </li>

        <li id="fieldBox_86" class="span12">
          <label class="formFieldQuestion span2">Stop Time :&nbsp;*</label>
                      <?php
      $data = array('id' => 'timepicker_end', 'name'=>'endtime', 'value'=>set_value('endtime', ''), 'class'=>'span3','style'=>'');
      echo form_input($data); ?>
                  

      

        <li id="fieldBox_88" class="span12">
          <label class="formFieldQuestion span2">Goal</label>
                    
                   
                      <?php
    $options = array( 
    ''    => '',
    'Goal 1'    => 'Goal 1',
              'Goal 2'  => 'Goal 2',
              'Goal 3'  => 'Goal 3',
              
            
                    );
    echo form_dropdown('goal', $options, set_value('phone', ''));
    ?>
                    </li>

        <li id="fieldBox_89" class="span12">
          <label class="formFieldQuestion span2">FIF&nbsp;*</label>
                
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
                    </li>

        <li id="fieldBox_90" class="span12">
          <label class="formFieldQuestion span2">Visit Report:&nbsp;*</label>
                   
                    <?php
        $data = array('name'=>'visit',  'value'=>set_value('visit', ''),'class'=>'', 'rows' => '3');
        echo form_textarea($data);
        ?>
                    </li>

        <li id="fieldBox_91" class="span12">
          <label class="formFieldQuestion span2">Follow-Up (Who, What, Where, When):&nbsp;*</label>
<?php
        $data = array('name'=>'followup',  'value'=>set_value('followup', ''),'class'=>'', 'rows' => '3');
        echo form_textarea($data);
        ?>
</li>
    
    
    <!-- end of this page -->

  

    <!-- end page validaton -->


    </ul>
      <div id="post-9" class="form-actions" >
        <button type="submit" class="btn btn-primary btn-large"><?php echo lang('form_save');?></button>
       
      <!-- close the display stuff for this page -->
      </div>
  </li></ul>
        </form></div>
          <div class="journal-entries" style="left:493px; top:-31px; height:100px; " > </div>


<!-- .entry-content -->
<!-- #post-## -->

  
  </div><!-- #content -->







<?php include('footer.php');
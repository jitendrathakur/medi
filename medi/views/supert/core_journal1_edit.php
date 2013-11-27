<ul class="breadcrumb" style="margin-bottom: 5px;">
  <li><a href="<?php echo base_url('supert/') ?>">Home</a></li>
  <li><a href="<?php echo base_url('supert/details/').'/'.$user_id; ?>">Detail</a></li> 
  <li class=""><a href="<?php echo base_url('supert/core_journal1_list/').'/'.$user_id; ?>">Core Journal 1</a></li>
  <li class="active"><a href="<?php echo base_url('supert/core_journal1_edit/').'/'.$user_id.'/'.$id; ?>">Core Journal 1 Edit</a></li>
</ul>

<div class="bs-docs-section" >
          
  <div class="row">
    <div class="col-lg-12">
      <div class="page-header">        
        <h3 id="tables">T-MeD Encounter Report</h3>
      </div>
    </div>
  </div>

  <div class="row">

    <div class="col-lg-6">

      <div class="well bs-example form-horizontal">

        <fieldset>
          <legend>Edit Journal 1</legend>       


            <!-- begin form -->
            <?php echo form_open_multipart($this->config->item('supert').'/core_journal1_edit/'.$user_id."/".$id); ?>     

              <div class='form-group'>
                  
                <label class="formFieldQuestion">Patient:&nbsp;*</label>

                <div class='col-lg-10'>
                  <select name="patient" class='form-control'>
                    <?php foreach ($patient as $key => $value) {
                    ?>
                    <option value="<?php echo $value->id; ?>"><?php echo $value->firstname. ' '.$value->lastname; ?></option>
                    <?php } ?>
                  </select> 
                </div>
              </div>

              <div class='form-group'>   
                <label class="formFieldQuestion">Date:&nbsp;*</label>
 
                <div class='col-lg-10'>
                  <?php
                  $data = array('id' => 'datepicker', 'name'=>'coredate', 'value'=>set_value('coredate', $coredate), 'class'=>'form-control');
                  echo form_input($data); ?>
                </div>
              </div>
                           

              <div class='form-group'>
                <label class="formFieldQuestion">Start Time:&nbsp;*</label>

                <div class='col-lg-10'>
                            <?php
                  $data = array('id' => 'timepicker_start', 'name'=>'starttime', 'value'=>set_value('starttime', $starttime), 'class'=>'form-control');
                  echo form_input($data); ?>
                </div>
              </div>                          
                  
              <div class='form-group'>
                <label class="formFieldQuestion">Stop Time :&nbsp;*</label>
                <div class='col-lg-10'>
                            <?php
                  $data = array('id' => 'timepicker_end', 'name'=>'endtime', 'value'=>set_value('endtime', $endtime), 'class'=>'form-control');
                  echo form_input($data); ?>
                </div>
              </div>             

              <div class='form-group'>
                <label class="formFieldQuestion">Goal</label>

                <div class='col-lg-10'>
                          
                         
                                  <?php
                  $options = array( 
                  ''    => '',
                  'Goal 1'    => 'Goal 1',
                            'Goal 2'  => 'Goal 2',
                            'Goal 3'  => 'Goal 3',
                            
                          
                                  );
                  echo form_dropdown('goal', $options, set_value('phone', $goal),'class="form-control"');
                  ?>
                </div>
              </div>
                          

              <div class='form-group'>
                <label class="formFieldQuestion">FIF&nbsp;*</label>

                <div class='col-lg-10'>
                      
                             <?php
                  $options = array( 
                  ''    => '',
                  'Self-Maintenance'    => 'Self-Maintenance',
                            'Vocational'  => 'Vocational',
                            'Education' => 'Education',
                            'Social'  => 'Social',
                            
                          
                                  );
                  echo form_dropdown('fif', $options, set_value('phone', $fif),'class="form-control"');
                  ?>
                </div>
              </div>
                       

              <div class='form-group'>
                <label class="formFieldQuestion">Visit Report:&nbsp;*</label>
                <div class='col-lg-10'>
                         
                            <?php
                  $data = array('name'=>'visit',  'value'=>set_value('visit', $visit), 'class' => 'form-control');
                  echo form_textarea($data);
                  ?>
                </div>
              </div>
                    

              <div class='form-group'>
                <label class="formFieldQuestion">Follow-Up (Who, What, Where, When):&nbsp;*</label>
                <div class='col-lg-10'>
                  <?php
                  $data = array('name'=>'followup',  'value'=>set_value('followup', $followup), 'class' => 'form-control');
                  echo form_textarea($data);
                  ?>
                </div>
              </div> 
       
              <div id="post-9" class="col-lg-10 col-lg-offset-2" >
                <button type="submit" class="btn btn-success" style=""><?php echo lang('form_save');?></button>       
              </div>

          </form>

        </fieldset> 

      </div>

    </div>

  </div>
  
</div><!-- #content -->



<ul class="breadcrumb" style="margin-bottom: 5px;">
  <li><a href="<?php echo base_url('supert/') ?>">Home</a></li>
  <li><a href="<?php echo base_url('supert/details/').'/'.$user_id; ?>">Detail</a></li> 
  <li class=""><a href="<?php echo base_url('supert/core_journal3_list/').'/'.$user_id; ?>">Core Journal 3</a></li>
  <li class="active"><a href="<?php echo base_url('supert/core_journal3_edit/').'/'.$user_id.'/'.$id; ?>">Core Journal 3 Edit</a></li>
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
          <legend>Edit Journal 3</legend>       


            <!-- begin form -->
            <?php echo form_open_multipart($this->config->item('supert').'/core_journal3_edit/'.$user_id.'/'.$id); ?>

              <div class='form-group'>
                  
                <label class="col-lg-2 control-label">Patient:&nbsp;*</label>

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
                <label class="col-lg-2 control-label">Please Select the ZIP Code of your current residence:&nbsp;*</label>
 
                <div class='col-lg-10'>
                  <?php
                    $options = array( 
                    ''    => '',
                    '17901'   => '17901',
                              '17922' => '17922',
                              '17933' => '17933',
                              '17933' => '17933',
                              '18252' => '18252',                            
                                    );
                    echo form_dropdown('zip', $options, set_value('phone', $zip), 'class="form-control"');
                    ?>
                </div>
              </div>
                           

              <div class='form-group'>
                
                <label class="">Please identify the Influences used during Engagement. (Check all that apply):&nbsp;*</label>
               
                <div class='checkbox col-lg-10'>
                  <input type="checkbox" <? if (strpos($identify,'Integrity') !== false) {
                      echo 'checked';
                  } ?> value="Integrity" id="field_102_option_1" name="identify[]"  class="col-lg-10">               
                  <label for="field_102_option_1" class="col-lg-2">Integrity</label>
                </div>

                <div class='checkbox col-lg-10'>
                  <input type="checkbox"  <? if (strpos($identify,'Enthusiasm') !== false) {
                      echo 'checked';
                  } ?> value="Enthusiasm" id="field_102_option_2" name="identify[]" class="col-lg-10">
                  <label for="field_102_option_2" class="col-lg-2">Enthusiasm</label>
                </div>

                <div class='checkbox col-lg-10'>
                  <input type="checkbox" <? if (strpos($identify,'Humility') !== false) {
                      echo 'checked';
                  } ?> value="Humility" id="field_102_option_3" name="identify[]" class="col-lg-10">
                  <label for="field_102_option_3" class="col-lg-2">Humility</label>
                </div>

                <div class='checkbox col-lg-10'>
                  <input type="checkbox" <? if (strpos($identify,'Courage') !== false) {
                      echo 'checked';
                  } ?> value="Courage" id="field_102_option_4" name="identify[]" class="col-lg-10">
                  <label for="field_102_option_4" class="col-lg-2">Courage</label>
                </div>

                <div class='checkbox col-lg-10'>
                  <input type="checkbox" <? if (strpos($identify,'Consistency') !== false) {
                      echo 'checked';
                  } ?> value="Consistency" id="field_102_option_5" name="identify[]" class="col-lg-10">
                  <label for="field_102_option_5" class="col-lg-2">Consistency</label>
                </div>

                <div class='checkbox col-lg-10'>
                  <input  <? if (strpos($identify,'Responsibility') !== false) {
                      echo 'checked';
                  } ?> type="checkbox" value="Responsibility" id="field_102_option_6" name="identify[]" class="col-lg-10">
                  <label for="field_102_option_6" class="col-lg-2">Responsibility</label>
                </div>

                <div class='checkbox col-lg-10'>
                  <input  <? if (strpos($identify,'Accountability') !== false) {
                      echo 'checked';
                  } ?> type="checkbox" value="Accountability" id="field_102_option_7" name="identify[]" class="col-lg-10">
                  <label for="field_102_option_7" class="col-lg-2">Accountability</label>
                </div>


                <div class='checkbox col-lg-10'>
                  <input <? if (strpos($identify,'Contentment') !== false) {
                      echo 'checked';
                  } ?> type="checkbox" value="Contentment" id="field_102_option_8" name="identify[]" class="mainForm">
                  <label for="field_102_option_8" class="col-lg-10">Contentment</label>
                </div>
              </div>                          
                  
              <div class='form-group'>
                <label class="col-lg-2 control-label">Was the supporter fully present?:&nbsp;*</label>
                <div class='col-lg-10'>
                
                <?php
                $options = array( 'Yes'   => 'Yes',
                          'No'  => 'No'            
                                );
                echo form_dropdown('is_present', $options, set_value('phone', $is_present), 'class="form-control"');
                ?>
                </div>
              </div>             

              <div class='form-group'>
                <label class="col-lg-2 control-label">Do you feel satisfied with the T-MeD service?</label>

                <div class='col-lg-10'>
                          
                  <?php
                  $options = array( 'Yes'   => 'Yes',
                   'No'  => 'No'             
            
                    );
                    echo form_dropdown('is_service', $options, set_value('phone', $is_service), 'class="form-control"');
                  ?>
                </div>
              </div>
                          

              <div class='form-group'>
                <label class="col-lg-2 control-label">The Pulse*</label>

                <div class='col-lg-10'>
                  <?php
                  $data = array('name'=>'pulse',  'value'=>set_value('pulse', $pulse), 'class' => 'form-control');
                  echo form_textarea($data);
                  ?>
                </div>
              </div>

              <div class='form-group'>
                <label class="col-lg-2 control-label">What Stage of Engagement is your relationship?*</label>

                <div class='col-lg-10'>
                  <?php
                  $options = array( 
                  ''    => '',
                  'Phase I Creation'    => 'Phase I Creation',
                            'Phase II Connection' => 'Phase II Connection',
                            'Phase III Development' => 'Phase III Development',
                            'Phase IV Emancipation' => 'Phase IV Emancipation',                            
                          
                                  );
                  echo form_dropdown('relatiopnship', $options, set_value('phone', $relatiopnship), 'class="form-control"');
                  ?>
                </div>
              </div>

              <div class='form-group'>
                <label class="col-lg-2 control-label">What Engagement Measures are applied by your supporter?*</label>

                <div class='col-lg-10'>
                  <?php
                    $options = array( 
                    ''    => '',
                    'Self Confidence'   => 'Self Confidence',
                              'Shared-Responsibility' => 'Shared-Responsibility',
                              'Empathy' => 'Empathy',
                              'Shared Disclosure' => 'Shared Disclosure',
                              'Empathy' => 'Empathy',
                              'Active Listening'  => 'Active Listening',
                              'Affirmation' => 'Affirmation',
                              'Encouragement' => 'Encouragement',
                              'Shared Acceptance' => 'Shared Acceptance',
                                    );
                    echo form_dropdown('supporter', $options, set_value('phone', $supporter), 'class="form-control"');
                    ?>
                </div>
              </div>
             
              <div class='form-group'>

                <label class="">Identify the locations of your visits&nbsp;*</label><span>

                <div class='checkbox col-lg-10'>
                  <input type="checkbox" <? if (strpos($visits,'Office') !== false) {
                      echo 'checked';
                  } ?> value="Office" id="field_79_option_1" name="visits[]" class="col-lg-10">
                  <label for="field_79_option_1" class="col-lg-2">Office</label>
                </div>

                <div class='checkbox col-lg-10'>
                  <input type="checkbox" <? if (strpos($visits,'Community') !== false) {
                      echo 'checked';
                  } ?> value="Community" id="field_79_option_2" name="visits[]" class="col-lg-10">
                  <label for="field_79_option_2" class="col-lg-2">Community</label>
                </div>

                <div class='checkbox col-lg-10'>
                  <input type="checkbox" <? if (strpos($visits,'Retreat') !== false) {
                      echo 'checked';
                  } ?> value="Retreat" id="field_79_option_3" name="visits[]" class="col-lg-10">
                  <label for="field_79_option_3" class="col-lg-2">Retreat</label>
                </div>

                <div class='checkbox col-lg-10'>
                  <input type="checkbox" value="Probation/Parole Office"  <? if (strpos($visits,'Probation/Parole Office') !== false) {
                      echo 'checked';
                  } ?> id="field_79_option_4" name="visits[]" class="col-lg-10">
                  <label for="field_79_option_4" class="col-lg-2">Probation/Parole Office</label>
                </div>

                <div class='checkbox col-lg-10'>
                  <input type="checkbox" <? if (strpos($visits,'Home') !== false) {
                      echo 'checked';
                  } ?> value="Home" id="field_79_option_5" name="visits[]" class="col-lg-10">
                  <label for="field_79_option_5" class="col-lg-2">Home</label>
                </div>

                <div class='checkbox col-lg-10'>
                  <input type="checkbox" <? if (strpos($visits,'Wellness Trips') !== false) {
                      echo 'checked';
                  } ?> value="Wellness Trips" id="field_79_option_6" name="visits[]" class="col-lg-10">
                  <label for="field_79_option_6" class="col-lg-2">Wellness Trips</label>
                </div>

                <div class='checkbox col-lg-10'>
                  <input type="checkbox" <? if (strpos($visits,'Other Service') !== false) {
                      echo 'checked';
                  } ?> value="Other Service" id="field_79_option_7" name="visits[]" class="col-lg-10">
                  <label for="field_79_option_7" class="col-lg-2">Other Service</label>
                </div>

                <div class='checkbox col-lg-10'>
                  <input type="checkbox" value="-------------" id="field_79_option_8" name="visits[]" class="col-lg-10">
                  <label for="field_79_option_8" class="col-lg-2">-------------</label></span></li>
                </div>
              </div> 
       

              <div class='form-group'>
                <label class="col-lg-2 control-label">What Phase of Transformative Medicine?&nbsp;*</label>
                <div class='col-lg-10'>
                         
                  <?php
                  $options = array( 
                    ''    => '',
                    'Phase I'   => 'Phase I',
                    'Phase II'  => 'Phase II',
                    'Phase III' => 'Phase III',                          
                  );
                  echo form_dropdown('medicine', $options, set_value('phone', $medicine), 'class="form-control"');
                  ?>
                </div>
              </div> 

              <div class='form-group'>
                <label class="col-lg-2 control-label">What functional domain was the concentration?&nbsp;*</label>
                <div class='col-lg-10'>
                         
                  <?php
                  $options = array( 
                    ''    => '',
                    'Self-Maintenance'    => 'Self-Maintenance',
                    'Social'  => 'Social',
                    'Vocational'  => 'Vocational',
                    'Educational' => 'Educational',
                  );
                  echo form_dropdown('concentration', $options, set_value('phone', $concentration), 'class="form-control"');
                  ?>
                </div>
              </div>  

              <div class='form-group'>
                <label class="col-lg-2 control-label">The Pulse&nbsp;*</label>
                <div class='col-lg-10'>
                         
                  <?php
                    $data = array('name'=>'pulse2',  'value'=>set_value('pulse2', $pulse2), 'class' => 'form-control');
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



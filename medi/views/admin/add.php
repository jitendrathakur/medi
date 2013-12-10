<div class="bs-docs-section" >
 
  <div class="row">

    <div class="col-lg-6">

      <div class="well bs-example form-horizontal">

        <fieldset>
          <legend>Add New User</legend>

            <!-- begin form -->
            <?php //echo form_open_multipart($this->config->item('supert').'/patient_therapist_edit'); ?>
          <form action="<?php $this->config->item('admin').'/add' ?>"  method="post">
               <div class='form-group'>
                   
                    <label class="formFieldQuestion">Therapist :&nbsp;*</label>
                    
                    <div class='col-lg-10'>
                      <select name="therapist_id" id="therapist_id" class='form-control'>
                         <?php if(!empty($therapists)){ ?>
                              <?php foreach ( $therapists as $key => $value) { ?>
                                   <option value="<?php echo $value->id; ?>" >
                                        <?php echo $value->firstname. ' '.$value->lastname; ?>
                                   </option>
                              <?php } ?>
                        <?php } ?>
                       
                      </select> 
                    </div>
               </div>
               
               
               <div class='form-group'>
                   
                    <label class="formFieldQuestion">Patient :&nbsp;*</label>
    
                    <div class='col-lg-10'>
                      <select name="patient_id" id="patient_id" class='form-control'>
                         <?php if(!empty($patients)){ ?>
                              <?php foreach ( $patients as $key => $value) { ?>
                                   <option value="<?php echo $value->id; ?>"  >
                                        <?php echo $value->firstname. ' '.$value->lastname; ?>
                                   </option>
                              <?php } ?>
                        <?php } ?>
                       
                      </select> 
                    </div>
               </div>

               
              <div id="post-9" class="col-lg-10 col-lg-offset-2" >
                <button type="submit" class="btn btn-success" style="">
                    <?php echo lang('form_save');?>
                </button>       
              </div>

          </form>

        </fieldset> 

      </div>

    </div>

  </div>
  
</div><!-- #content -->



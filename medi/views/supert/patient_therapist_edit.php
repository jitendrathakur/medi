<ul class="breadcrumb" style="margin-bottom: 5px;">
  <li><a href="<?php echo base_url('supert/') ?>">Home</a></li>
  <!--<li><a href="<?php //echo base_url('supert/details/').'/'.$user_id; ?>">Detail</a></li> 
  <li class=""><a href="<?php //echo base_url('supert/core_journal1_list/').'/'.$user_id; ?>">Core Journal 1</a></li>
  <li class="active"><a href="<?php //echo base_url('supert/core_journal1_edit/').'/'.$user_id.'/'.$id; ?>">Core Journal 1 Edit</a></li>-->
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
          <legend>Edit Patient and Threpist</legend>       


            <!-- begin form -->
            <?php //echo form_open_multipart($this->config->item('supert').'/patient_therapist_edit'); ?>
          <form action="<?php $this->config->item('supert').'/patient_therapist_edit' ?>"  method="post">
               <div class='form-group'>
                   
                    <label class="formFieldQuestion">Therapist :&nbsp;*</label>
                    <input type="hidden"  name="id" id="id" value="<?php echo $result->id; ?>" >
                    <div class='col-lg-10'>
                      <select name="therapist_id" id="therapist_id" class='form-control'>
                         <?php if(!empty($therapists)){ ?>
                              <?php foreach ( $therapists as $key => $value) { ?>
                                   <option value="<?php echo $value->id; ?>" <?php echo ($result->therapist_id==$value->id ) ? 'selected=\"selected\"' : '' ?>>
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
                                   <option value="<?php echo $value->id; ?>" <?php echo ($result->patient_id==$value->id ) ? 'selected=\"selected\"' : '' ?> >
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



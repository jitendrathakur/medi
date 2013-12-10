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
                 
                  <label class="formFieldQuestion">First name</label>
                 
                  <?php
                  $data = array('name'=>'firstname', 'value'=>set_value('firstname', $firstname), 'class'=>'form-control');
                  echo form_input($data); ?>

                  <label class="formFieldQuestion">Last name</label>
                 
                  <?php
                  $data = array('name'=>'lastname', 'value'=>set_value('lastname', $lastname), 'class'=>'form-control');
                  echo form_input($data); ?>

                  <label class="formFieldQuestion">Username</label>
                 
                  <?php
                  $data = array('name'=>'user', 'value'=>set_value('user', $user), 'class'=>'form-control');
                  echo form_input($data); ?>

                  <label class="formFieldQuestion">Password</label>
                 
                  <?php
                  $data = array('type' => 'password', 'name'=>'password', 'value'=>set_value('password', $password), 'class'=>'form-control');
                  echo form_input($data); ?>

                  <label class="formFieldQuestion">Email</label>
                 
                  <?php
                  $data = array('name'=>'email', 'value'=>set_value('email', $email), 'class'=>'form-control');
                  echo form_input($data); ?>

                  <label class="formFieldQuestion">Mobile</label>
                 
                  <?php
                  $data = array('name'=>'mobile', 'value'=>set_value('mobile', $mobile), 'class'=>'form-control');
                  echo form_input($data); ?>
            
                 
                  <label class="formFieldQuestion">Role</label>
  
                  <div class='col-lg-10'>
                    <select name="access" id="access" class='form-control'>
                       <?php 

                       $access = array(
                        'Normal' => 'Patient',
                        'Therapists' => 'Therapist'
                        );

                       if(!empty($access)){ ?>
                          <?php foreach ( $access as $key => $value) { ?>
                            <option value="<?php echo $key; ?>"  >
                              <?php echo $value; ?>
                            </option>
                          <?php } ?>
                      <?php } ?>
                     
                    </select> 
                  </div>
             </div>

             
            <div id="post-9" class="col-lg-10 col-lg-offset-2" >
              <input type="submit" class="btn btn-success" value="Submit" />       
            </div>

          </form>

        </fieldset> 

      </div>

    </div>

  </div>
  
</div><!-- #content -->



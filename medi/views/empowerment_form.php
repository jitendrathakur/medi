<?php include('header.php'); ?>

<div class="col-md-10 well">

    <!-- begin form -->
    <h2>All Declarations Of Empowerment In Your Recovery And Wellness</h2>
    <hr/>
    			
 	<?php if ($this->session->flashdata('message')):?>
		<div class="alert alert-info">
			<a class="close" data-dismiss="alert">×</a>
			<?php echo $this->session->flashdata('message');?>
		</div>
	<?php endif;?>
	
	<?php if ($this->session->flashdata('error')):?>
		<div class="alert alert-error">
			<a class="close" data-dismiss="alert">×</a>
			<?php echo $this->session->flashdata('error');?>
		</div>
	<?php endif;?>
	
	<?php if (!empty($error)):?>
		<div class="alert alert-error">
			<a class="close" data-dismiss="alert">×</a>
			<?php echo $error;?>
		</div>
	<?php endif;?>



	<!-- begin form -->
	<?php echo form_open_multipart($this->config->item('admin_folder').'forms/empowerment_form', array('class' => 'form-horizontal')); ?>
    	<h3>Identify Your Declaration:</h3>
	    <div class="form-group">
	        <label for="inputEmail3" class="col-sm-3 control-label">Life or Current Achievement</label>
	        <div class="col-sm-9">
	        	<?php
		        $data	= array('name'=>'achievement',  'value'=>set_value('achievement', ''), 'class'=>'form-control');
				echo form_input($data);
				?>
	        </div>
	    </div>

	    <div class="form-group">
	        <label for="inputEmail3" class="col-sm-3 control-label">Goal/hope</label>
	        <div class="col-sm-9">
	        	<?php
		        $data	= array('name'=>'goal',  'value'=>set_value('goal', ''), 'class'=>'form-control');
				echo form_input($data);
				?>
	        </div>
	    </div>

	    <div class="form-group">	        

	        <label for="inputEmail3" class="col-sm-3 control-label">Personal Charactristics</label>
	        <div class="col-sm-9">
		        <input class="" type="checkbox" name="personal_char" id="personal_char" value="1" />
	        </div>
	    </div>

	    <div class="form-group">
	        <label for="inputEmail3" class="col-sm-3 control-label">Other</label>
	        <div class="col-sm-9">
	        	<?php
		        $data	= array('name'=>'other',  'value'=>set_value('other', ''), 'class'=>'form-control');
				echo form_input($data);
				?>
	        </div>
	    </div>
	    <h3>The Pulse</h3>

	    <div class="form-group">
	        <label for="inputEmail3" class="col-sm-3 control-label">Live Pulse</label>
	        <div class="col-sm-9">
	        	<?php
		        $data	= array('name'=>'pulse',  'value'=>set_value('pulse', ''), 'class'=>'form-control');
				echo form_textarea($data);
				?>
	        </div>
	    </div>

		<div class="form-group">
	        <div class="col-sm-offset-2 col-sm-9">
	          <button type="submit" class="btn btn-primary btn-large"><?php echo lang('form_save');?></button>
	          <a class="btn btn-primary btn-large" href="<?php echo base_url('forms/forensic_form') ?>" >Skip</a>
	        </div>       
      	</div>      

    </form>
  </div>
</div>
 

<?php include('footer.php');


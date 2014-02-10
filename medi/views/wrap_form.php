<?php include('header.php'); ?>

<div class="col-md-10 well">

    <!-- begin form -->
    <h2>Wrap</h2>
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
	<?php echo form_open_multipart($this->config->item('admin_folder').'forms/wrap_form', array('class' => 'form-horizontal')); ?>
    
	    <div class="form-group">	        

	        <label for="inputEmail3" class="col-sm-3 control-label">Wellness/Pro-Social Toolbox</label>
	        <div class="col-sm-9">
		        <input class="" type="checkbox" name="is_social" id="is_social" value="1" />
	        </div>
	    </div>

	    <div class="form-group">	        

	        <label for="inputEmail3" class="col-sm-3 control-label">Daily Maintainance/Descipline Plan</label>
	        <div class="col-sm-9">
		        <input class="" type="checkbox" name="is_discipline" value="1" />
	        </div>
	    </div>

	    <div class="form-group">
	        <label for="inputEmail3" class="col-sm-3 control-label">Triggers/Criminal Induced Trigger & Action Plan</label>
	        <div class="col-sm-9">
	        	<?php
		        $data	= array('name'=>'trigger',  'value'=>set_value('trigger', ''), 'class'=>'form-control');
				echo form_textarea($data);
				?>
	        </div>
	    </div>

	    <div class="form-group">
	        <label for="inputEmail3" class="col-sm-3 control-label">Earl Warning Signs/Criminal Motivators & Action Plan</label>
	        <div class="col-sm-9">
	        	<?php
		        $data	= array('name'=>'motivator',  'value'=>set_value('motivator', ''), 'class'=>'form-control');
				echo form_textarea($data);
				?>
	        </div>
	    </div>

	    <div class="form-group">
	        <label for="inputEmail3" class="col-sm-3 control-label">Things Are Breaking Down/Criminal Behaviors & Acion Plan</label>
	        <div class="col-sm-9">
	        	<?php
		        $data	= array('name'=>'behaviour',  'value'=>set_value('behaviour', ''), 'class'=>'form-control');
				echo form_textarea($data);
				?>
	        </div>
	    </div>

	    <div class="form-group">
	        <label for="inputEmail3" class="col-sm-3 control-label">Crisis & Forensic Necessities Plan</label>
	        <div class="col-sm-9">
	        	<?php
		        $data	= array('name'=>'necessity',  'value'=>set_value('necessity', ''), 'class'=>'form-control');
				echo form_textarea($data);
				?>
	        </div>
	    </div>

	    <div class="form-group">
	        <label for="inputEmail3" class="col-sm-3 control-label">Post Crisis & Trans-Entry Startegies</label>
	        <div class="col-sm-9">
	        	<?php
		        $data	= array('name'=>'strategy',  'value'=>set_value('strategy', ''), 'class'=>'form-control');
				echo form_textarea($data);
				?>
	        </div>
	    </div>

	    <div class="form-group">
	        <label for="inputEmail3" class="col-sm-3 control-label">What Dimensions Of Wrap</label>
	        <div class="col-sm-9">
		        <?php
				$options = array(
					'Individual' => 'Individual',
					'Illustration' => 'Illustration',
					'Application' => 'Application'
				);
				echo form_dropdown('dimension', $options, set_value('dimension', ''));
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

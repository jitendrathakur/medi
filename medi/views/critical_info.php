<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Access | Transformative Medicine</title>
<link href="<?php echo base_url('assets/css/login.css'); ?>" rel="stylesheet" type="text/css">
</head>
<body>
<div class="wrapper">
	<div class="wrapper_lft  ">
    	<?php echo form_open($this->config->item('admin_folder').'/login/critical_info') ?>
    	<div class="logo"> <img src="<?php echo base_url('assets/img/mainlogo.png') ?>" alt=" Logo"> </div>
        <br /> <br /> <br /><br />
        <h4>Please update your information</h4>
        <div class="login_det">
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
		<label> 
        	Email<br>
           <?php echo form_input(array('name'=>'email',  'placeholder'=>'User Name')); ?>
        </label> 
        <label style="font-size:11px;"> 
        	Mobile (Please include your country code like : +1)<br>
           <?php echo form_input(array('name'=>'mobile',  'placeholder'=>'Mobile')); ?>
        </label>
                               
            <input type="submit" class="log_but" value="Submit">
            
        </div>         
        </form>
    </div>
   
</div>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Access | Transformative Medicine</title>
<link href="<?php echo base_url('assets/css/login.css'); ?>" rel="stylesheet" type="text/css">
</head>
<body>
<div class="wrapper">
	<div class="wrapper_lft">
    	 <?php echo form_open($this->config->item('admin_folder').'/index.php/login') ?>
    	<div class="logo"> <img src="<?php echo base_url('assets/img/mainlogo.png') ?>" alt=" Logo"> </div>
        <br />  <br />  <br />
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
            	User Name<br>
               <?php echo form_input(array('name'=>'email',  'placeholder'=>'User Name')); ?>
            </label> 
            <label> 
            	Password<br>
                <?php echo form_password(array('name'=>'password', 'placeholder'=>'Password')); ?>
            </label>
            
            <?php /* 
            <label> 
            	<?php echo form_checkbox(array('name'=>'remember', 'value'=>'true', 'class'=>'chk_box'))?>Keep me signed in
            </label>
            */ ?>
            <input type="submit" class="log_but" value="Sign In">
            
        </div>
          <input type="hidden" value="<?php echo $redirect; ?>" name="redirect"/>
		<input type="hidden" value="submitted" name="submitted"/>
        </form>
    </div>
    <!-- End Wrapper Left -->
   
    <!-- End Wrapper Right -->
    
    
    
</div>

<?php
/*
//Always place this code at the top of the Page
session_start();
if (isset($_SESSION['id'])) {
    // Redirection to login page twitter or facebook
    header("location: home.php");
}

if (array_key_exists("login", $_GET)) {
    $oauth_provider = $_GET['oauth_provider'];
    if ($oauth_provider == 'google') {
        header("Location: login/google");
    } 
}
?>
<title>9lessons Google Openid Login</title>
<style type="text/css">
    body{
        background: #f1f1f1;
    }
    #buttons
    {
        text-align:center
    }
    #buttons img,
    #buttons a img
    { border: none;}
    h1
    {
        font-family:Arial, Helvetica, sans-serif;
        color:#999999;
    }

</style>



<div id="buttons">
    
    <a href="?login&oauth_provider=google"><img src="<?php echo base_url('assets/img/google-login-button.png'); ?>"></a><br/>
    <br />
    
</div>

*/?>


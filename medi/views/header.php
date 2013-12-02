<!DOCTYPE html>
<html lang="en-US" ><!--<![endif]--><head>

<meta charset="UTF-8" >

<title>Access | Transformative Medicine</title>

<script type="text/javascript">
  var baseUrl = "<?php echo base_url('/') ?>";  
</script>

<link rel="profile" href="http://gmpg.org/xfn/11" >

<link rel="pingback" href="http://tmed3000.org/xmlrpc.php" >

<meta name="robots" content="noindex,nofollow" >
<link rel="alternate" type="application/rss+xml" title="Transformative Medicine » Feed" href="http://tmed3000.org/feed/" >
<link rel="alternate" type="application/rss+xml" title="Transformative Medicine » Comments Feed" href="http://tmed3000.org/comments/feed/" >
<link rel="alternate" type="application/rss+xml" title="Transformative Medicine » Contact Us Comments Feed" href="http://tmed3000.org/about-us/feed/" >
<link rel="stylesheet" id="calp-general-css" href="css/general.css?ver=1" type="text/css" media="all" >

<link rel="stylesheet" href="<?php echo base_url('assets/css/style.css') ?>">
<link rel="stylesheet" href="<?php echo base_url('assets/css/blue.css') ?>">
<link rel="stylesheet" href="<?php echo base_url('assets/css//side-menu.css') ?>">

<link rel="stylesheet" id="quick_chat_style_sheet-css" href="css/quick-chat.css?ver=3.5.1" type="text/css" media="all" >
<!--[if lt IE 8]>
<link rel='stylesheet' id='quick_chat_ie_style_sheet-css'  href='css/quick-chat-ie.css?ver=3.5.1' type='text/css' media='all' />
<![endif]-->
<script type="text/javascript" src="js/jquery.js?ver=1.8.3" ></script>
<script type="text/javascript" src="js/include.js?ver=3.5.1" ></script>
<link rel="stylesheet" href="http://code.jquery.com/ui/1.10.3/themes/smoothness/jquery-ui.css" />
<script src="http://code.jquery.com/jquery-1.9.1.js"></script>
<script src="http://code.jquery.com/ui/1.10.3/jquery-ui.js"></script>
<script src="<?php echo base_url('assets/js/therapist.js') ?>"></script>



<link rel="EditURI" type="application/rsd+xml" title="RSD" href="http://tmed3000.org/xmlrpc.php?rsd" >
<link rel="wlwmanifest" type="application/wlwmanifest+xml" href="http://tmed3000.org/wp-includes/wlwmanifest.xml" > 
<link rel="prev" title="Inter-Active" href="http://tmed3000.org/inter-active/" >
<link rel="next" title="Partners" href="http://tmed3000.org/partners/" >
<meta name="generator" content="WordPress 3.5.1" >
<link rel="canonical" href="http://tmed3000.org/about-us/" >
<link rel="stylesheet" href="css/overlay_styles.css" type="text/css" >

<!-- Dropdown Menu Widget Styles by shailan (http://shailan.com) v1.9 on wp3.5.1 -->
<link rel="stylesheet" href="css/shailan-dropdown.min.css" type="text/css" >

<link rel="stylesheet" href="<?php echo base_url('assets/include/ui-1.10.0/ui-lightness/jquery-ui-1.10.0.custom.min.css') ?>" type="text/css" />
<link rel="stylesheet" href="<?php echo base_url('assets/css/jquery.ui.timepicker.css?v=0.3.3') ?>" type="text/css" />

<script type="text/javascript" src="<?php echo base_url('assets/include/ui-1.10.0/jquery.ui.core.min.js') ?>"></script>   
<script type="text/javascript" src="<?php echo base_url('assets/js/jquery.ui.timepicker.js?v=0.3.3') ?>"></script>

<script type="text/javascript" src="<?php echo base_url('assets/js/bootstrap.min.js') ?>"></script>

<link rel="stylesheet" href="<?php echo base_url('assets/css/bootstrap.min.css') ?>" type="text/css" />
<link rel="stylesheet" href="<?php echo base_url('assets/css/bootstrap-responsive.min.css') ?>" type="text/css" />



  <style type="text/css" >
#site-title a, #site-description {
  color:#02306F;
}

</style>
  <style type="text/css" id="custom-background-css" >
body.custom-background {
  background-color:#02306F;
}

</style>
<!-- calendar stuff -->
    
</head>

<body class="page page-id-9 page-template page-template-home-page-php custom-background no-sidebars color-blue" style="" >


  <div id="header" ><a href="http://tmed3000.org" >
    <img style="width:65%; padding-left:16%; " src="<?php echo base_url('assets/img/mainlogo.png') ?>" ></a>

    <div id="masthead" role="banner" >
  </div><!-- #masthead -->


  <header class="navbar navbar-inverse bs-docs-nav" role="banner">
        <div class="container">     
          <nav class="collapse navbar-collapse bs-navbar-collapse" role="navigation">
            <ul class="nav navbar-nav">
              <li class="active">
                <? if($this->auth->check_access('Normal')) { 
                  $href = base_url('forms/wellness_form');
                } else if ($this->auth->check_access('Therapists')) {
                  $href = base_url('forms/core_journal_form');
                } ?>
                <a href="<?php echo $href; ?>">Home</a>
              </li>
              <li>
                <a href="http://tmed3000.org/inter-active">Inter-Active</a>
              </li>
              
                <a href="http://tmed3000.org/about-us/">Contact Us</a>
              </li>
              <li>
                <a href="http://tmed3000.org/partners/">Partners</a>
              </li>
              
              <!-- Split button -->
              <li class="btn-group">                
                <a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown">
                                  Services
                                   <span class="caret"></span>
                </a>
                <ul class="dropdown-menu" role="menu">
                  <li>
                    <a href="http://tmed3000.org/inter-active/video-blog/">Video Blog</a>
                  </li>
                  <li>
                    <a href="http://tmed3000.org/inter-active/survey/">Survey</a>
                  </li>
                  <li>
                    <a href="http://tmed3000.org/inter-active/iq-center/">IQ Center</a>
                  </li>
                  <li>
                    <a href="http://tmed3000.org/inter-active/recovery-chat/">Recovery Chat</a>
                  </li>
                  <li>
                    <a href="http://tmed3000.org/referral/">Referral</a>
                  </li>
                  <li>
                    <a href="http://tmed3000.org/newsletter/">Newsletter</a>
                  </li>
                </ul>
              </li>
              <li>
                <a href="http://tmed3000.org/events/">Events</a>
              </li>
              <?php
              $admin = $this->admin_session->userdata('admin');
              if ($admin['access'] == 'Normal') { ?> 
              <li  id="menu-item-28" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-28"><a href="<?php echo base_url('forms/patient_alert_list') ?>">Alert <span class='badge'><?php echo @$total_read_count; ?></span></a></li>
              <?php } ?>

              <li id="menu-item-28" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-28" ><a href="<?php echo base_url('login/logout') ?>" >Logout</a></li>
              <li><span style="font-weight: bold; width: 100px;position:absolute;"><?php 
                echo 'Hi '.$admin['firstname'];
               ?>
               </span>
              </li>

            </ul>       
          </nav>
        </div>
      </header>
  <!-- Above -->

  <div id="container" class="hfeed contain" >

    


<?php
//Always place this code at the top of the Page
session_start();
if (isset($_SESSION['id'])) {
    // Redirection to login page twitter or facebook
    header("location: home.php");
}

if (array_key_exists("login", $_GET)) {
    $oauth_provider = $_GET['oauth_provider'];
    if ($oauth_provider == 'google') {      
        header("Location: http://skytempest.com/medi/login/google_signup");
    } 
}
?>
<title>9lessons Google Openid Login</title>






    

  </div><!-- #header -->



  <div id="content-box" ><link href="http://fonts.googleapis.com/css?family=Open+Sans:300,700" rel="stylesheet" type="text/css" >
    <script type="text/javascript" src="js/modernizr.custom.79639.js" ></script> 
    <!--[if lte IE 8]><style>.main{display:none;} .support-note .note-ie{display:block;}</style><![endif]-->

<div id="content-container" class="container" >
  <div id="content" role="main" class="well" >

  
    <div id="post-9" class="post-9 page type-page status-publish hentry" >

        <div class=""  >
        <?php include('leftmenu.php'); ?>
          <?php
  //lets have the flashdata overright "$message" if it exists
  if($this->session->flashdata('message'))
  {
    $message  = $this->session->flashdata('message');
  }
  
  if($this->session->flashdata('error'))
  {
    $error  = $this->session->flashdata('error');
  }
  
  if(function_exists('validation_errors') && validation_errors() != '')
  {
    $error  = validation_errors();
  }
  ?>
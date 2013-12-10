<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Admin</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta charset="utf-8">

    <link rel="stylesheet" href="<?php echo base_url('assets/css/bootstrap.min.css') ?>" type="text/css" />
    <link rel="stylesheet" href="<?php echo base_url('assets/css/bootstrap-responsive.min.css') ?>" type="text/css" />

    <link rel="stylesheet" href="<?php echo base_url('assets/include/ui-1.10.0/ui-lightness/jquery-ui-1.10.0.custom.min.css') ?>" type="text/css" />
    <link rel="stylesheet" href="<?php echo base_url('assets/css/jquery.ui.timepicker.css?v=0.3.3') ?>" type="text/css" />
    <link rel="stylesheet" href="<?php echo base_url('assets/css/supert.css') ?>" type="text/css" />

    <script src="http://code.jquery.com/jquery-1.9.1.js"></script>
    <script src="http://code.jquery.com/ui/1.10.3/jquery-ui.js"></script>
    <script type="text/javascript" src="<?php echo base_url('assets/include/ui-1.10.0/jquery.ui.core.min.js') ?>"></script>   
    <script type="text/javascript" src="<?php echo base_url('assets/js/supert.js') ?>"></script>
    <script type="text/javascript" src="<?php echo base_url('assets/js/jquery.ui.timepicker.js?v=0.3.3') ?>"></script>
    


    <script type="text/javascript" src="<?php echo base_url('assets/js/bootstrap.min.js') ?>"></script>
   
  </head>

  <body>
    <div class="navbar navbar-default navbar-fixed-top">

      <div class="container">

        <div class="navbar-header">
            <a href="../" class="navbar-brand"><a href="http://tmed3000.org" >
              <img style="width:69%;" src="<?php echo base_url('assets/img/mainlogo.png') ?>" >
            </a></a>
          <button class="navbar-toggle" type="button" data-toggle="collapse" data-target="#navbar-main">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
        </div>
        <div class="navbar-collapse collapse" id="navbar-main">
          <ul class="nav navbar-nav navbar-right">
            <li>
              <a href="javascript:;" class="navbar-brand">Administrator</a>
            </li>            
            <li class="dropdown">
              <a href="<?php echo base_url('login/logout') ?>" >Logout</a>             
            </li>  
            
          </ul>
        </div>        

        <div id="header" >
          
        </div>
       
      </div>
    </div>


    <div class="container">
      <div>        
        <div class="page-header" id="banner">
          <div class="row">
            
          </div>
        </div>
        <?php          
          include($view.'.php');
        ?>
      </div>
    </div>



     

  </body>

</html>
<?php  
$CI=& get_instance();
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title><?php echo $title ?></title>

    <meta name="description" content="Source code generated using layoutit.com">
    <meta name="author" content="LayoutIt!">

    <link href="<?php echo base_url() ?>assets/bootstrap/css/bootstrap.min.css" rel="stylesheet">

  </head>
  <body>

   <div class="container-fluid">
	<div class="row">
		<div class="col-md-1">
		</div>
		<div class="col-md-10">
                    <div style="height: 20px;" ></div>
			<nav class="navbar navbar-fixed-top navbar-default" role="navigation">
				<div class="navbar-header">
					 
					<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
						 <span class="sr-only">Toggle navigation</span><span class="icon-bar"></span><span class="icon-bar"></span><span class="icon-bar"></span>
					</button> <a class="navbar-brand" href="#"><?php echo $instansi ?></a>
				</div>
				
				<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
					<ul class="nav navbar-nav">
                        <?php
                        foreach($menu as $km=>$url){
                            $is_activ="";
                            if( strtolower($url)==strtolower($CI->uri->segment(1)) ){
                                $is_activ="active";    
                            }
                            
                            echo '
                            <li class="'.$is_activ.'">
							     <a href="'.site_url($url).'">'.$km.'</a>
	                        </li>
                            ';    
                        }
                        ?>
					</ul>
                    
                                    <ul class="nav navbar-nav navbar-right" style="padding-right: 10px;">
						<li class="dropdown">
							 <a href="#" class="dropdown-toggle" data-toggle="dropdown"><?php echo $_SESSION['user']; ?><strong class="caret"></strong></a>
							<ul class="dropdown-menu">
								<li>
									<a href="<?php echo site_url('User/profile') ?>">Profile & Password</a>
								</li>
								<li>
									<a href="<?php echo site_url('App_Setting') ?>">Setting</a>
								</li>
								<li class="divider">
								</li>
								<li>
									<a href="<?php echo site_url('User/logout') ?>">Logout</a>
								</li>
							</ul>
						</li>
					</ul>
				</div>
				
			</nav>
		</div>
		<div class="col-md-1">
		</div>
	</div>
    
    
	<div class="row">
		<div class="col-md-1">
		</div>
		<div class="col-md-10">
                    <br><br><br>
			<?php echo $content ?>
            <br />
		</div>
		<div class="col-md-1">
		</div>
	</div>
</div>
    <script src="<?php echo base_url() ?>assets/bootstrap/js/jquery-1.11.1.min.js"></script>
    <script src="<?php echo base_url() ?>assets/bootstrap/js/bootstrap.min.js"></script>
    <?php 
        foreach ($js as $js_url){
            ?> <script src="<?php echo base_url() ?>assets/js/custom/<?php echo $js_url ?>"></script> <?php
        }
    ?>
  </body>
</html>
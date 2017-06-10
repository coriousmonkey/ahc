<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Login</title>

    <meta name="description" content="Source code generated using layoutit.com">
    <meta name="author" content="LayoutIt!">

    <link href="<?php echo base_url() ?>assets/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  </head>
  <body>

    <div class="container-fluid">
    	<div class="row">
    		<div class="col-md-4">
    		</div>
    		<div class="col-md-4"><br /><br /><br />
                    <form method="post">
                        <div class="panel panel-primary">
                          <div class="panel-heading">Login</div>
                          <div class="panel-body">
                                <div class="form-group">
                                    <label>Username</label>
                                    <input type="text" name="username" class="form-control" />
                                </div>
                                <div class="form-group">
                                    <label>Password</label>
                                    <input type="password" name="password" class="form-control" />
                                </div>
                                <div class="form-group">
                                    <input type="submit" value="Login" class="btn btn-primary" />
                                </div>
                          </div>
                        </div>
                    </form>
    		</div>
    		<div class="col-md-4">
    		</div>
    	</div>
    </div>

    <script src="<?php echo base_url() ?>assets/bootstrap/js/jquery-1.11.1.min.js"></script>
    <script src="<?php echo base_url() ?>assets/bootstrap/js/bootstrap.min.js"></script>
  </body>
</html>
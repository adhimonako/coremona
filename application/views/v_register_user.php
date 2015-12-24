<!DOCTYPE html>
<html class="bg-green">
    <head>
        <meta charset="UTF-8">
        <title>AdminLTE | Registration Page</title>
        <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
        <link href="<?php echo base_url();?>asset/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url();?>asset/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
        <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>asset/css/datepicker.css" />
        <link href="<?php echo base_url();?>asset/css/AdminLTE.css" rel="stylesheet" type="text/css" />
        
    </head>
    <body class="bg-green">
        <div class="form-box" id="login-box">
            <?php
            if (!empty($error)) {
                ?>
                <div style="color:red;font-size:12px">
                    <?=$error;?>
                </div>
                <?php
            }
            ?>
            <form method="post">
                <div class="header">Register New Account</div>
                    <div class="body bg-gray">
                        <div class="form-group">
                            <input type="text" name="nm_user" class="form-control" placeholder="Username"/>
                        </div>
                        <div class="form-group">
                            <input type="email" name="email_user" class="form-control" placeholder="Your Email"/>
                        </div>
                        <div class="form-group">
                            <label>Tanggal Lahir</label>
                            <input type="date" name="birth_day" class="form_input datepicker small-form" placeholder="dd/mm/yyyy"/>
                        </div>
                        <div class="form-group">
                            <input type="password" name="pass_user" class="form-control" placeholder="Password"/>
                        </div>
                        <div class="form-group">
                            <input type="password" name="pass_confirm" class="form-control" placeholder="Confrim Your Password"/>
                        </div>
                             <input type="hidden" name="id_user" class="form-control" />
                    </div>
                <div class="footer">                    
                    <button type="submit" class="btn bg-olive btn-block">Daftar</button>
                    <a href="<?=base_url()?>"><input type="button" class="btn bg-olive btn-block" value="Login" /></a>
                </div>
            </form>

            <div class="margin text-center">
                <span>Register using social networks</span>
                <br/>
                <button class="btn bg-light-blue btn-circle"><i class="fa fa-facebook"></i></button>
                <button class="btn bg-aqua btn-circle"><i class="fa fa-twitter"></i></button>
                <button class="btn bg-red btn-circle"><i class="fa fa-google-plus"></i></button>

            </div>
        </div>

        <script src="<?php echo base_url();?>asset/js/jquery.min.js"></script>
        <script src="<?php echo base_url();?>asset/js/bootstrap.min.js" type="text/javascript"></script>
        <script type="text/javascript" src= "<?php echo base_url();?>asset/css/bootstrap-datepicker.js"></script> 
        <script type="text/javascript" src= "<?php echo base_url();?>asset/css/bootstrap-datetimepicker.js"></script>
        <script type="text/javascript" src= "<?php echo base_url();?>asset/css/bootstrap-datetimepicker.min.js"></script> 

    </body>
</html>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Admin | Dashboard</title>
        <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
        <script src="<?php echo base_url();?>asset/js/jquery.min.js"></script>
        <link href="<?php echo base_url();?>asset/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url();?>asset/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url();?>asset/css/Font_1.css" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url();?>asset/css/font_2.css" rel="stylesheet" type="text/css" />
        <!--borderd -->
        <link href="<?php echo base_url();?>asset/css/custom.css" rel="stylesheet" type="text/css" />
        <!-- Morris chart -->
        <link href="<?php echo base_url();?>asset/css/morris/morris.css" rel="stylesheet" type="text/css" />
        <!-- jvectormap -->
        <link href="<?php echo base_url();?>asset/css/jvectormap/jquery-jvectormap-1.2.2.css" rel="stylesheet" type="text/css" />
        <!-- Date Picker -->
        <link href="<?php echo base_url();?>asset/css/datepicker/datepicker3.css" rel="stylesheet" type="text/css" />
        <!-- Daterange picker -->
        <link href="<?php echo base_url();?>asset/css/daterangepicker/daterangepicker-bs3.css" rel="stylesheet" type="text/css" />
        <!-- bootstrap wysihtml5 - text editor -->
        <link href="<?php echo base_url();?>asset/css/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css" rel="stylesheet" type="text/css" />
        <!-- Theme style -->
        <link href="<?php echo base_url();?>asset/css/AdminLTE.css" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url();?>asset/css/datatables/dataTables.bootstrap.css" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url();?>asset/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
        <script src="<?php echo base_url();?>asset/js/bootstrap-datepicker.js" type="text/javascript"></script>
        <script src="<?php echo base_url();?>asset/js/bootstrap-datetimepicker.min.js" type="text/javascript"></script>
        <script src="<?php echo base_url();?>asset/js/bootstrap.min.js" type="text/javascript"></script>
        <link href="<?php echo base_url();?>asset/css/datepicker.css" rel="stylesheet" type="text/css" />
      
        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
          <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
          <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
        <![endif]-->
    </head>
    <body class="skin-blue">
        <!-- header logo: style can be found in header.less -->
        <header class="header">
            <a href="main.php" class="logo">
                <!-- Add the class icon to your logo image or logo icon to add the margining -->
                App Your Ebook
            </a>
            <!-- Header Navbar: style can be found in header.less -->
            <nav class="navbar navbar-static-top" role="navigation">
                <!-- Sidebar toggle button-->
                <a href="#" class="navbar-btn sidebar-toggle" data-toggle="offcanvas" role="button">
                  
                </a>
                <div class="navbar-right">
                    <ul class="nav navbar-nav">
                        <!-- Messages: style can be found in dropdown.less-->
                        <!-- User Account: style can be found in dropdown.less -->
                        <li class="dropdown user user-menu">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                <i class="glyphicon glyphicon-user"></i>
                                <?php 
                                    echo "Wellcome, ".$this->session->userdata('nm_user');
                                ?>
                                <span><i class="caret"></i></span>
                            </a>
                            <ul class="dropdown-menu">
                                <!-- User image -->
                                <!-- Menu Footer-->
                                <li class="user-footer">
                                     <div class="pull-right">
                                        <a href="<?php echo site_url("login/logout"); ?>" class="btn btn-default btn-flat">Sign out</a>
                                    </div>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </nav>
        </header>
        <div class="wrapper row-offcanvas row-offcanvas-left">
            <!-- Left side column. contains the logo and sidebar -->
            <aside class="left-side sidebar-offcanvas">
                <!-- sidebar: style can be found in sidebar.less -->
                <section class="sidebar">
                    <!-- Sidebar user panel -->
                    <!-- search form -->
                    <!-- /.search form -->
                    <!-- sidebar menu: : style can be found in sidebar.less -->
                    <ul class="sidebar-menu">
                    <?php if ($this->session->userdata('nm_user') == 'admin') { ?>
                        <li class="active">
                            <a href="<?php echo base_url();?>main">
                                <i class="fa fa-dashboard"></i> <span>Dashboard</span>
                            </a>
                        </li>
                        <li>
                            <a href="<?php echo base_url();?>register/manage_profil">
                                <i class="fa fa-th"></i> <span>Manage Profil</span> 
                                <i class="fa fa-angle-left pull-right"></i>
                            </a>
                        </li>
                        <li>
                            <a href="<?php echo base_url();?>user/manage_user">
                                <i class="glyphicon glyphicon-user"></i>
                                <span>Manage User</span>
                                <i class="fa fa-angle-left pull-right"></i>
                            </a>
                        </li>
                        <li>
                            <a href="<?php echo base_url();?>ebook/get_list_ebook_server">
                                <i class="glyphicon glyphicon-book"></i> <span>View Ebook On Server</span>
                                <i class="fa fa-angle-left pull-right"></i>
                            </a>
                        </li>
                        <li>
                            <a href="<?php echo base_url();?>ebook/view_ebook_all">
                                <i class="fa fa-cloud-download"></i> <span>Download Ebook</span>
                                <i class="fa fa-angle-left pull-right"></i>
                            </a>
                        </li>
                        <?php } else if ($this->session->userdata('nm_user') != 'admin') { ?>
                        <li class="active">
                            <a href="<?php echo base_url();?>main">
                                <i class="fa fa-dashboard"></i> <span>Dashboard</span>
                            </a>
                        </li>
                        <li>
                            <a href="<?php echo base_url();?>register/manage_profil">
                                <i class="fa fa-th"></i> <span>Manage Profil</span> 
                                <i class="fa fa-angle-left pull-right"></i>
                            </a>
                        </li>
                        <li>
                            <a href="<?php echo base_url();?>ebook/input_ebook">
                                <i class="fa fa-book"></i>
                                <span>Upload Ebook</span>
                                <i class="fa fa-angle-left pull-right"></i>
                            </a>
                        </li>
                        <li>
                            <a href="<?php echo base_url();?>ebook/view_ebook">
                                <i class="glyphicon glyphicon-book"></i> <span>View Ebook</span>
                                <i class="fa fa-angle-left pull-right"></i>
                            </a>
                        </li>
                        <li>
                            <a href="<?php echo base_url();?>ebook/view_ebook_all">
                                <i class="fa fa-cloud-download"></i> <span>Download Ebook</span>
                                <i class="fa fa-angle-left pull-right"></i>
                            </a>
                        </li>
                        <?php  } ?>    
                    </ul>
                </section>
                <!-- /.sidebar -->
            </aside>

            <!-- Right side column. Contains the navbar and content of the page -->
            <aside class="right-side">
                <!-- Content Header (Page header) -->
                <section class="content-header">
                </section>

                <!-- Main content -->
                <section>
                    <?php echo $content; ?>
                </section><!-- /.content -->
            </aside><!-- /.right-side -->
        </div><!-- ./wrapper -->

        <!-- add new calendar event modal -->


        <!-- Morris.js charts -->
        <script src="<?php echo base_url();?>asset/js/raphael-min.js"></script>
        <script src="<?php echo base_url();?>asset/js/plugins/morris/morris.min.js" type="text/javascript"></script>
        <!-- Sparkline -->
        <script src="<?php echo base_url();?>asset/js/plugins/sparkline/jquery.sparkline.min.js" type="text/javascript"></script>
        <!-- jvectormap -->
        <script src="<?php echo base_url();?>asset/js/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js" type="text/javascript"></script>
        <script src="<?php echo base_url();?>asset/js/plugins/jvectormap/jquery-jvectormap-world-mill-en.js" type="text/javascript"></script>
        <!-- jQuery Knob Chart -->
        <script src="<?php echo base_url();?>asset/js/plugins/jqueryKnob/jquery.knob.js" type="text/javascript"></script>
        <!-- daterangepicker -->
        <script src="<?php echo base_url();?>asset/js/plugins/daterangepicker/daterangepicker.js" type="text/javascript"></script>
        <!-- datepicker -->
        <script src="<?php echo base_url();?>asset/js/plugins/datepicker/bootstrap-datepicker.js" type="text/javascript"></script>
        <!-- Bootstrap WYSIHTML5 -->
        <script src="<?php echo base_url();?>asset/js/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js" type="text/javascript"></script>
        <!-- iCheck -->
        <script src="<?php echo base_url();?>asset/js/plugins/iCheck/icheck.min.js" type="text/javascript"></script>

        <!-- AdminLTE App -->
        <script src="<?php echo base_url();?>asset/js/AdminLTE/app.js" type="text/javascript"></script>

        <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
        <script src="<?php echo base_url();?>asset/js/AdminLTE/dashboard.js" type="text/javascript"></script>

         <link href="<?php echo base_url();?>asset/css/ionicons.min.css" rel="stylesheet" type="text/css" />
         
        <!-- AdminLTE for demo purposes -->
        <script src="<?php echo base_url();?>asset/js/plugins/datatables/jquery.dataTables.js" type="text/javascript"></script>
        <script src="<?php echo base_url();?>asset/js/plugins/datatables/dataTables.bootstrap.js" type="text/javascript"></script>
        <script type="text/javascript">
            $(function() {
                $("#example1").dataTable();
            });
        </script>
    </body>
</html>

<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=Edge">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <title>Dashboard</title>
    <!-- Favicon-->
    <link rel="icon" href="<?php echo base_url('assets/tup.png');?>" type="image/x-icon">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,700&subset=latin,cyrillic-ext" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" type="text/css">

    <!-- Bootstrap Core Css -->
    <link href="<?php echo base_url('assets/plugins/bootstrap/css/bootstrap.css');?>" rel="stylesheet">

    <!-- Waves Effect Css -->
    <link href="<?php echo base_url('assets/plugins/node-waves/waves.css');?>" rel="stylesheet" />

    <!-- Animation Css -->
    <link href="<?php echo base_url('assets/plugins/animate-css/animate.css');?>" rel="stylesheet" />

    <!-- Morris Chart Css-->
    <link href="<?php echo base_url('assets/plugins/morrisjs/morris.css');?>" rel="stylesheet" />

    <!-- Bootstrap Select Css -->
    <link href="<?php echo base_url('assets/css/select.css');?>" rel="stylesheet">

    <!-- Custom Css -->
    <link href="<?php echo base_url('assets/css/style.css');?>" rel="stylesheet">

    <!-- AdminBSB Themes. You can choose a theme from css/themes instead of get all themes -->
    <link href="<?php echo base_url('assets/css/themes/all-themes.css');?>" rel="stylesheet" />
    <script src="<?php echo base_url('assets/plugins/jquery/jquery.min.js'); ?>"></script>

</head>

<body class="theme-red">
    <!-- Page Loader -->
    <div class="page-loader-wrapper">
        <div class="loader">
            <div class="preloader">
                <div class="spinner-layer pl-red">
                    <div class="circle-clipper left">
                        <div class="circle"></div>
                    </div>
                    <div class="circle-clipper right">
                        <div class="circle"></div>
                    </div>
                </div>
            </div>
            <p>Please wait...</p>
        </div>
    </div>
    <!-- #END# Page Loader -->
    <!-- Overlay For Sidebars -->
    <div class="overlay"></div>
    <!-- #END# Overlay For Sidebars -->
    <!-- Search Bar -->
    <div class="search-bar">
        <div class="search-icon">
            <i class="material-icons">search</i>
        </div>
        <input type="text" placeholder="START TYPING...">
        <div class="close-search">
            <i class="material-icons">close</i>
        </div>
    </div>
    <!-- #END# Search Bar -->
    <!-- Top Bar -->
    <nav class="navbar bg-black">
        <div class="container-fluid">
            
            <div class="navbar-header">
                <a href="javascript:void(0);" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse" aria-expanded="false"></a>
                <a href="javascript:void(0);" class="bars"></a>
                <img class="" src="<?php echo base_url('assets/images/user.png');?>" width="50" height="50" alt="User" />
                <a class="navbar-brand"></a>
            </div>
            <div class="collapse navbar-collapse" id="navbar-collapse">
                <ul class="nav navbar-nav navbar-right">
                    <!-- Notifications -->
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button">
                            <i class="material-icons">notifications</i>
                            <span class="label-count bg-red " id="unseen_count"></span>
                        </a>
                        <ul class="dropdown-menu" id="notif" style="height: 200px; width: 300px; overflow-y: scroll">
                            
                        </ul>
                        
                    </li>
                    <!-- #END# Notifications -->
                </ul>
            </div>
        </div>
    </nav>
    <!-- #Top Bar -->
    <section>
        <!-- Left Sidebar -->
        <aside id="leftsidebar" class="sidebar">
            <!-- User Info -->
            <div class="user-info">
                <div class="info-container">
                    <div class="name" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><?php echo $this->session->userdata['admin_user_name']; ?></div>
                    <div class="name"><?php echo $this->session->userdata['admin_office_name']; ?></div>
                    <div class="btn-group user-helper-dropdown">
                        <i class="material-icons" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">keyboard_arrow_down</i>
                        <ul class="dropdown-menu pull-right">
                            <li><a href="<?php echo base_url('Admin_controller/logout');?>"><i class="material-icons">input</i>Sign Out</a></li>
                        </ul>
                    </div>
                </div>
            </div>
            <!-- #User Info -->
            <!-- Menu -->
            <div class="menu">
                <ul class="list">
                    <li class="header">MAIN NAVIGATION</li>
                    <li class="active">
                        <a href="<?php echo base_url('cashier'); ?>">
                            <i class="material-icons col-grey">home</i>
                            <span class="col-grey">Home</span>
                        </a>
                    </li>
                    <li>
                        <a href="javascript:void(0);" class="menu-toggle">
                            <i class="material-icons">content_paste</i>
                            <span>Purchase Requests</span>
                        </a> 
                        <ul class="ml-menu">                            
                            <li>
                                <a href="<?php echo base_url('Cashier_table_ongoing'); ?>">
                                    <span>Ongoing</span>
                                </a>
                            </li>
                            <li>
                                <a href="<?php echo base_url('Cashier_table_done'); ?>">
                                    <span>Approved</span>
                                </a>
                            </li>
                            <li>
                                <a href="<?php echo base_url('Cashier_table_failed'); ?>">
                                    <span>Failed</span>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href="<?php echo base_url('Cashier_notif'); ?>">
                            <i class="material-icons">add_alert</i>
                            <span>Notifications</span>
                        </a>
                   <!--  </li>           
                        <a href="<?php echo base_url('Cashier_reports'); ?>">
                            <i class="material-icons">library_books</i>
                            <span>Reports</span>
                        </a>
                    </li>    -->  
                </ul>
            </div>
            <!-- #Menu -->
            <!-- Footer -->
            <div class="legal">
                <div class="copyright">
                    &copy; 2018-2019 <a href="javascript:void(0);">TUP MANILA - BSCS 4B</a>.
                </div>
            </div>
            <!-- #Footer -->
        </aside>
        <!-- #END# Left Sidebar -->
        <!-- Right Sidebar -->
    </section>
 <script type="text/javascript">
        $(document).ready(function(){
            function load_unseen_notification(view = '')
            {
                $.ajax({
                    url:"<?php echo base_url('Cashier_controller/notification');?>",
                    method:"POST",
                    data:{view:view},
                    dataType:"json",
                    success:function(data)
                    {
                        if(!$('#notif').is(':visible')) {
                            // $('#notif').addClass("notclass");
                            $('#notif').html(data.notification);
                        }          
                        if(data.unseen_notification > 0)
                        {
                            $('#unseen_count').html(data.unseen_notification);
                        }
                        else{
                            $('#unseen_count').html('');
                        }
                        console.log(data.unseen_notification);
                    },
                    error:function(data){
                        console.log(data.responseText);
                }

                });
            }
         
            load_unseen_notification();
            
            $(document).on('click', '.dropdown-toggle', function(){
                $('.count').html('');
                load_unseen_notification('yes');
            });
         
            setInterval(function(){ 
                load_unseen_notification();; 
            }, 5000);
            });
    </script>
<!DOCTYPE html>
<html>
<?php
if (isset($this->session->userdata['user_id'])) {
    $eMail = ($this->session->userdata['email']);
    $client_id = ($this->session->userdata['user_id']);

    $this->db->select('*');
    $this->db->from('users');
    $this->db->where('id', $client_id);
    $query = $this->db->get();
    $rs = $query->result_array();

    foreach($rs as $rss)
    {
        $client_firstname = $rss['first_name'];
    }
    $this->db->select('*');
    $this->db->from('kyc');
    $this->db->where('user_id', $client_id);
    $query = $this->db->get();
    $rs2 = $query->result_array();

    foreach($rs2 as $rss2)
    {
        $client_picture = $rss2['picture'];
    }

    $profile2 = 'user.png';

    if($client_picture == '')
    {
        $profile_pix = $profile2;
    }
    else
    {
        $profile_pix = $client_picture;
    }
}
else redirect(site_url('login'));
?>
<head>
    <title>Pep project</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
    <link rel="stylesheet" href="<?php echo base_url('') ?>assets/css/bootstrap.min.css">
    <link href="<?php echo base_url('assets/dist/css/bootstrap-formhelpers.min.css')?>" rel="stylesheet">
    <link href="<?php echo base_url('assets/datatables/css/dataTables.bootstrap.min.css')?>" rel="stylesheet">
    <link href="<?php echo base_url('assets/bootstrap-datepicker/css/bootstrap-datepicker3.min.css')?>" rel="stylesheet">
    <link rel="stylesheet" href="<?php echo base_url('') ?>assets/vendor/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="<?php echo base_url('') ?>assets/vendor/linearicons/style.css">
    <link rel="stylesheet" href="<?php echo base_url('') ?>assets/vendor/chartist/css/chartist-custom.css">

    <!-- MAIN CSS -->
    <link rel="stylesheet" href="<?php echo base_url('') ?>assets/css/main.css">
    <!-- FOR DEMO PURPOSES ONLY. You should remove this in your project -->
    <link rel="stylesheet" href="<?php echo base_url('') ?>assets/css/demo.css">
    <link rel="stylesheet" href="<?php echo base_url('') ?>assets/css/avatar.css">
    <link href="<?php echo base_url('assets/css/form5.css')?>" rel="stylesheet">
    <!-- GOOGLE FONTS -->
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700" rel="stylesheet">
    <!-- ICONS -->
    <link rel="apple-touch-icon" sizes="76x76" href="<?php echo base_url('') ?>assets/img/apple-icon.png">
    <link rel="icon" type="image/png" sizes="96x96" href="<?php echo base_url('') ?>assets/img/favicon.png">



    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<body >
<!-- WRAPPER -->
<div id="wrapper">
    <!-- NAVBAR -->
    <nav class="navbar navbar-default navbar-fixed-top">
        <div class="brand">
            <a href="<?php echo site_url('') ?>"><img src="<?php echo base_url('') ?>assets/img/logo-dark.png" alt="Klorofil Logo" class="img-responsive logo"></a>
        </div>
        <div class="container-fluid">
            <div class="navbar-btn">
                <button type="button" class="btn-toggle-fullwidth"><i class="lnr lnr-arrow-left-circle"></i></button>
            </div>

            <div class="navbar-btn navbar-btn-right">
                <!--<a class="btn btn-success update-pro" href="https://www.themeineed.com/downloads/klorofil-pro-bootstrap-admin-dashboard-template/?utm_source=klorofil&utm_medium=template&utm_campaign=KlorofilPro" title="Upgrade to Pro" target="_blank"><i class="fa fa-rocket"></i> <span>UPGRADE TO PRO</span></a> -->
            </div>
            <div id="navbar-menu">
                <ul class="nav navbar-nav navbar-right">
                    <li style="padding-right: 10px;">
                        <h3 class="text-danger">PEP</h3>
                        <h4>$0.01</h4>
                    </li>
                    <li style="padding-right: 10px;">
                        <h3 class="text-danger">XPEP</h3>
                        <h4>$1</h4>
                    </li>
                    <li style="padding-right: 10px;">
                        <h3 class="text-danger">STEEM</h3>
                        <h4>$20</h4>
                    </li>
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle icon-menu" data-toggle="dropdown">
                            <i class="lnr lnr-alarm"></i>
                            <span class="badge bg-danger">5</span>
                        </a>
                        <ul class="dropdown-menu notifications">
                            <li><a href="#" class="notification-item"><span class="dot bg-warning"></span>System space is almost full</a></li>
                            <li><a href="#" class="notification-item"><span class="dot bg-danger"></span>You have 9 unfinished tasks</a></li>
                            <li><a href="#" class="notification-item"><span class="dot bg-success"></span>Monthly report is available</a></li>
                            <li><a href="#" class="notification-item"><span class="dot bg-warning"></span>Weekly meeting in 1 hour</a></li>
                            <li><a href="#" class="notification-item"><span class="dot bg-success"></span>Your request has been approved</a></li>
                            <li><a href="#" class="more">See all notifications</a></li>
                        </ul>
                    </li>
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="lnr lnr-question-circle"></i> <span>Help</span> <i class="icon-submenu lnr lnr-chevron-down"></i></a>
                        <ul class="dropdown-menu">
                            <li><a href="#">Basic Use</a></li>
                            <li><a href="#">Working With Data</a></li>
                            <li><a href="#">Security</a></li>
                            <li><a href="#">Troubleshooting</a></li>
                        </ul>
                    </li>
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown"><img src="<?php echo base_url($profile_pix); ?>" class="img-circle" alt="Avatar"> <span><?php echo ucfirst($client_firstname); ?></span> <i class="icon-submenu lnr lnr-chevron-down"></i></a>
                        <ul class="dropdown-menu">
                            <li><a href="<?php echo site_url('frontend/user_details') ?>"><i class="lnr lnr-user"></i> <span>My Profile</span></a></li>
                            <li><a href="#"><i class="lnr lnr-envelope"></i> <span>Message</span></a></li>
                            <li><a href="#"><i class="lnr lnr-cog"></i> <span>Settings</span></a></li>
                            <li><a href="<?php echo site_url('auth/logout') ?>"><i class="lnr lnr-exit"></i> <span>Logout</span></a></li>
                        </ul>
                    </li>

                </ul>

            </div>
        </div>
    </nav>
    <!-- END NAVBAR -->
    <!-- LEFT SIDEBAR -->
    <div id="sidebar-nav" class="sidebar" style="background-color: #030b16">
        <div class="sidebar-scroll">
            <nav>
                <ul class="nav">
                    <li><a href="<?php echo site_url('frontend/dashboard') ?>" class="active"><i class="lnr lnr-home"></i> <span>Dashboard</span></a></li>
                    <li><a href="<?php echo site_url('admin/users') ?>" class=""><i class="lnr lnr-user"></i> <span>Users</span></a></li>
                    <li><a href="<?php echo site_url('admin/kyc') ?>" class=""><i class="fa fa-id-card"></i> <span>KYC</span></a></li>
                    <li>
                        <a href="#subPages" data-toggle="collapse" class="collapsed"><i class="fa fa-money"></i> <span>Approve</span> <i class="icon-submenu lnr lnr-chevron-left"></i></a>
                        <div id="subPages" class="collapse ">
                            <ul class="nav">
                                <li><a href="<?php echo site_url('admin/airdrop_approval') ?>" class="">Airdrop</a></li>
                                <li><a href="<?php echo site_url('admin/admin_approve_fund') ?>" class="">Fund PEP</a></li>
                                <li><a href="<?php echo site_url('admin/admin_approve_xpep') ?>" class="">Fund XPEP</a></li>
                            </ul>
                        </div>
                    </li>
                    <li><a href="<?php echo site_url('admin/transactions') ?>" class=""><i class="fa fa-book"></i> <span>Transactions</span></a></li>
                    <li>
                        <a href="#subPages2" data-toggle="collapse" class="collapsed"><i class="fa fa-edit"></i> <span>Update</span> <i class="icon-submenu lnr lnr-chevron-left"></i></a>
                        <div id="subPages2" class="collapse">
                            <ul class="nav">
                                <li><a href="<?php echo site_url('admin/currency') ?>" class="">Currency</a></li>
                                <li><a href="<?php echo site_url('admin/ico') ?>" class="">ICO</a></li>
                                <li><a href="<?php echo site_url('admin/airdrop_amount') ?>" class="">Airdrop amount</a></li>
                            </ul>
                        </div>
                    </li>
                    <li><a href="<?php echo site_url('frontend/airdrop') ?>" class=""><i class="lnr lnr-drop"></i> <span>Airdrop Program</span></a></li>


                    <li><a href="#" class=""><i class="lnr lnr-dice"></i> <span>Transaction</span></a></li>
                    <li><a href="#" class=""><i class="fa fa-exchange"></i> <span>Open Exchange</span></a></li>
                    <li><a href="#" class=""><i class="fa fa-gift"></i> <span>PEP Reward Program</span></a></li>

                </ul>
            </nav>
        </div>
    </div>
    <!-- END LEFT SIDEBAR -->
    <!-- MAIN -->
    <div class="main">
        <!-- MAIN CONTENT -->
        <div class="main-content">
            <div class="container">
                <div class="row">
                    <div align="center" class="col-md-12">


                        <?php
                        $arr = $this->session->flashdata();
                        if(!empty($arr['flash_message'])){
                            $html = '<div class="bg-warning container flash-message">';
                            $html .= $arr['flash_message'];
                            $html .= '</div>';
                            echo $html;
                        }
                        ?>
                    </div>
                </div>
            </div>

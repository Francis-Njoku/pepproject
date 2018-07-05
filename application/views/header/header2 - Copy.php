<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title></title>
    <link href="<?php echo base_url('assets/bootstrap/css/bootstrap.min.css')?>" rel="stylesheet">
    <link href="<?php echo base_url('assets/css/body.css')?>" rel="stylesheet">
    <link href="<?php echo base_url('assets/css/style.css') ?>" rel="stylesheet">
    <link href="<?php echo base_url('assets/css/form5.css')?>" rel="stylesheet">

    <style type="text/css">
        .carousel-inner > .item > img, .carousel-inner > .item > a > img {
            display: block;
            height: 600px;
            min-width: 100%;
            width: 100%;
            max-width: 100%;
            line-height: 1;
        }
        .pagination-first{
            display: inline-block;
            color: black;
            float: left;
            padding: 8px 16px;
            text-decoration: none;
            transition: background-color .3s;
            border: 1px solid #ddd;
        }

    </style>

</head>
<body>

<nav class="navbar navbar-default navbar-fixed-top">
    <div class="container-fluid">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="<?php echo site_url(); ?>"><img src="<?php echo base_url('assets/images/logo.png')?>" alt="logo" width="120px" /></a>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav">
                <li class="active"><a href="<?php echo site_url(''); ?>">Home <span class="sr-only">(current)</span></a></li>
                <li class=""><a href="<?php echo site_url('fashion'); ?>">Fashion <span class="sr-only">(current)</span></a></li>
                <li class=""><a href="<?php echo site_url('phone_tablet'); ?>">Phone &amp; Tablets <span class="sr-only">(current)</span></a></li>
                <li class=""><a href="<?php echo site_url('electronics'); ?>">Electronics <span class="sr-only">(current)</span></a></li>
                <li class=""><a href="<?php echo site_url('computer_accessories'); ?>">Computer &amp; Accessories <span class="sr-only">(current)</span></a></li>

                <!--<li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Fashion <span class="caret"></span></a>
                    <ul class="dropdown-menu">
                        <li><a href="#">Men</a></li>
                        <li><a href="#">Women</a></li>
                        <li><a href="#">Baby</a></li>
                        <li role="separator" class="divider"></li>
                        <li><a href="#">Watches &amp; Sunglasses</a></li>
                        <li role="separator" class="divider"></li>
                        <li><a href="#">Hot Deals</a></li>
                    </ul>
                </li>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Phones &amp; Tablets <span class="caret"></span></a>
                    <ul class="dropdown-menu">
                        <li><a href="#">Mobiles</a>
                        </li>
                        <li><a href="#">Phones &amp; Tablets Accessories</a></li>
                        <li><a href="#">Tablets</a></li>

                    </ul>
                </li>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Electronics <span class="caret"></span></a>
                    <ul class="dropdown-menu">
                        <li><a href="#">Television</a>
                        </li>
                        <li><a href="#">Cameras</a></li>
                        <li><a href="#">Accessories</a></li>

                    </ul>
                </li> -->
            </ul>
            <!-- <form class="navbar-form navbar-left">
                 <div class="form-group">
                     <input type="text" class="form-control" placeholder="Search">
                 </div>
                 <button type="submit" class="btn btn-default">Submit</button>
             </form> -->
            <ul class="nav navbar-nav navbar-right">
                <li><a href="<?php echo site_url('frontend/capacity_building'); ?>">Capacity Building</a></li>
                <li><a href="<?php
                    if (isset($this->session->userdata['id'])) {
                        $eMail = ($this->session->userdata['email']);
                        $email = ($this->session->userdata['email']);
                        $userName = ($this->session->userdata['id']);
                        $id = ($this->session->userdata['line_id']);
                        $role = ($this->session->userdata['role']);
                        $upline = ($this->session->userdata['upline_id']);

                        echo site_url('frontend/dashboard');
                    }else{
                        echo site_url('login');
                    }
                    ?>">
                        <?php
                        if (isset($this->session->userdata['id'])) {
                            $eMail = ($this->session->userdata['email']);
                            $email = ($this->session->userdata['email']);
                            $userName = ($this->session->userdata['id']);
                            $id = ($this->session->userdata['line_id']);
                            $role = ($this->session->userdata['role']);
                            $upline = ($this->session->userdata['upline_id']);

                            echo 'Dashboard';
                        }else{
                            echo 'Login';
                        }
                        ?>
                    </a></li>
                <li><a href="
                <?php
                    if (isset($this->session->userdata['id'])) {
                        $eMail = ($this->session->userdata['email']);
                        $email = ($this->session->userdata['email']);
                        $userName = ($this->session->userdata['id']);
                        $id = ($this->session->userdata['line_id']);
                        $role = ($this->session->userdata['role']);
                        $upline = ($this->session->userdata['upline_id']);

                        echo site_url('logout');
                    }else{
                        echo site_url('register');
                    }
                    ?>
                ">
                        <?php
                        if (isset($this->session->userdata['id'])) {
                            $eMail = ($this->session->userdata['email']);
                            $email = ($this->session->userdata['email']);
                            $userName = ($this->session->userdata['id']);
                            $id = ($this->session->userdata['line_id']);
                            $role = ($this->session->userdata['role']);
                            $upline = ($this->session->userdata['upline_id']);

                            echo 'Logout';
                        }else{
                            echo 'Register';
                        }
                        ?>

                    </a></li>

            </ul>        </div><!-- /.navbar-collapse -->
    </div><!-- /.container-fluid -->
</nav>

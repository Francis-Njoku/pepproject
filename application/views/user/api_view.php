<!DOCTYPE html>
<html>

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
<body onload="calculate_price4()">
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
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">" class="img-circle" alt="Avatar"> <span></span> <i class="icon-submenu lnr lnr-chevron-down"></i></a>
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
    <div id="sidebar-nav" class="sidebar" style="background-color: white">
        <div class="sidebar-scroll">
            <nav>
                <ul class="nav">
                    <li><a href="<?php echo site_url('frontend/dashboard') ?>" class=""><i class="lnr lnr-home"></i> <span>Dashboard</span></a></li>
                    <li><a href="<?php echo site_url('frontend/user_details') ?>" class=""><i class="lnr lnr-user"></i> <span>My Profile</span></a></li>
                    <li>
                        <a href="#subPages" data-toggle="collapse" class="collapsed"><i class="fa fa-money"></i> <span>Wallet (Virtual)</span> <i class="icon-submenu lnr lnr-chevron-left"></i></a>
                        <div id="subPages" class="collapse ">
                            <ul class="nav">
                                <li><a href="<?php echo site_url('frontend/dashboard/pep') ?>" class="">PEP</a></li>
                                <li><a href="<?php echo site_url('frontend/dashboard/xpep') ?>" class="">XPEP</a></li>
                                <li><a href="<?php echo site_url('frontend/dashboard/waves') ?>" class="">WAVES</a></li>
                                <li><a href="<?php echo site_url('frontend/dashboard/bitcoin') ?>" class="">BITCOIN</a></li>
                                <li><a href="<?php echo site_url('frontend/dashboard/ethereum') ?>" class="">ETHEREUM</a></li>


                            </ul>
                        </div>
                    </li>                    <li><a href="<?php echo site_url('frontend/airdrop') ?>" class=""><i class="lnr lnr-drop"></i> <span>Airdrop Program</span></a></li>
                    <li>
                        <a href="#subPages2" data-toggle="collapse" class="collapsed"><i class="fa fa-shopping-bag"></i> <span>Trade XPEP</span> <i class="icon-submenu lnr lnr-chevron-left"></i></a>
                        <div id="subPages2" class="collapse">
                            <ul class="nav">
                                <li><a href="<?php echo site_url('frontend/fund_xpep') ?>" class="">Buy XPEP</a></li>
                                <li><a href="#" class="">XPEP BuyBack</a></li>
                            </ul>
                        </div>
                    </li>
                    <li><a href="<?php echo site_url('frontend/fund_wallet') ?>" class=""><i class="fa fa-circle"></i> <span>PEP ICO</span></a></li>

                    <li><a href="<?php echo site_url('frontend/wallet') ?>" class=""><i class="lnr lnr-dice"></i> <span>Transaction</span></a></li>
                    <li><a href="<?php echo site_url('frontend/exchange') ?>" class=""><i class="fa fa-exchange"></i> <span>Open Exchange</span></a></li>
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



            <!----Input data here----->
            <p>Chima</p>
            <input id="chima" type="text">


            <?php
            $fib = 1;
            $preFib = 1;
            echo '0, 1, ';
            for($i = 2; $i < 10; $i++)
            {
                $temp = $fib;
                $fib += $preFib;
                $preFib = $temp;


                echo $fib.', ';
            }
            echo $fib;


            $arr = array(1, 2, 3, 3, 4, 5, 6, 6, 6, 7, 7, 7, 8, 9, 10, 24);

           $result = array_unique($arr);

            print_r($result);

            $unique = array_keys(array_flip($arr));

            print_r($unique);

            foreach($result as $list)
            {
                echo $list;
            }

            ?>

            <script>
                var a = document.getElementById("chima");
                function calculate_price4()
                {
                    //alert("Hello");
                    //      margin = document.getElementById("margin").value;
                    $.getJSON("https://min-api.cryptocompare.com/data/pricemulti?fsyms=LTC,ETH,BTC,BCH,WAVES,STEEM&tsyms=USD,EUR",function(data){
                        /*   $.each(data,function(i,item){
                         alert(item.value);
                         })*/
                        alert(data['BTC'].USD);
                        a.value = (data['BTC'].USD)
                    });

                }
                function calculate_price5()
                {
                    $.getJSON( "https://min-api.cryptocompare.com/data/pricemulti?fsyms=LTC,ETH,BTC,BCH,WAVES,STEEM&tsyms=USD,EUR", function( data ) {
                        var items = [];
                        $.each( data, function( key, val ) {
                            items.push( "<li id='" + key + "'>" + val + "</li>" );
                        });

                        $( "<ul/>", {
                            "class": "my-new-list",
                            html: items.join( "" )
                        }).appendTo( "div" );
                    });
                }
                function calculate_price6()
                {
                    //alert("Hello");
                    //      margin = document.getElementById("margin").value;
                    $.getJSON("http://localhost/bend/index.php/destinations/json",function(data){
                        /*   $.each(data,function(i,item){
                         alert(item.value);
                         })*/
                        alert(data[2].date);
                    });
                }

            </script>

            <!-------End input data--->

        </div>
        <!-- END MAIN CONTENT -->
    </div>
    <!-- END MAIN -->
    <div class="clearfix"></div>
    <footer>
        <div class="container-fluid">
            <p class="copyright">&copy; 2018 <a href="" target="_blank">PEP PROJECT</a>. All Rights Reserved.</p>
        </div>
    </footer>
</div>
<!-- END WRAPPER -->
<!-- Javascript -->
<script src="<?php echo base_url('') ?>assets/vendor/jquery/jquery.min.js"></script>
<script src="<?php echo base_url('') ?>assets/vendor/bootstrap/js/bootstrap.min.js"></script>
<script src="<?php echo base_url('') ?>assets/vendor/jquery-slimscroll/jquery.slimscroll.min.js"></script>
<script src="<?php echo base_url('') ?>assets/vendor/jquery.easy-pie-chart/jquery.easypiechart.min.js"></script>
<script src="<?php echo base_url('') ?>assets/vendor/chartist/js/chartist.min.js"></script>
<script src="<?php echo base_url('') ?>assets/scripts/klorofil-common.js"></script>

</body>

</html>

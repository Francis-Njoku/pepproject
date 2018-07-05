<!DOCTYPE html>
<html>
<?php
if (isset($this->session->userdata['id'])) {
    $eMail = ($this->session->userdata['email']);
    $email = ($this->session->userdata['email']);
    $userName = ($this->session->userdata['id']);
    $user__id = ($this->session->userdata['id']);
    $id = ($this->session->userdata['line_id']);
    $line_id = ($this->session->userdata['line_id']);


    $photo = ($this->session->userdata['photo']);
    $first_name = ($this->session->userdata['first_name']);

}
else redirect(site_url('login'));
?>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Dashboard</title>
    <link href="<?php echo base_url('assets/css/body.css')?>" rel="stylesheet">
    <!-- Bootstrap core CSS     -->
    <link href="<?php echo base_url('assets2/css/bootstrap.min.css')?>" rel="stylesheet" />
    <link href="<?php echo base_url('assets/dist/css/bootstrap-formhelpers.min.css')?>" rel="stylesheet">
    <link href="<?php echo base_url('assets/datatables/css/dataTables.bootstrap.min.css')?>" rel="stylesheet">
    <link href="<?php echo base_url('assets/bootstrap-datepicker/css/bootstrap-datepicker3.min.css')?>" rel="stylesheet">

    <!-- Animation library for notifications   -->
    <link href="<?php echo base_url('assets2/css/animate.min.css')?>" rel="stylesheet" />

    <!--  Paper Dashboard core CSS    -->
    <link href="<?php echo base_url('assets2/css/paper-dashboard.css')?>" rel="stylesheet" />


    <!--  CSS for Demo Purpose, don't include it in your project     -->
    <link href="<?php echo base_url('assets2/css/demo.css')?>" rel="stylesheet" />

    <!--  Fonts and icons     -->
    <link href="http://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" rel="stylesheet">
    <link href='https://fonts.googleapis.com/css?family=Muli:400,300' rel='stylesheet' type='text/css'>
    <link href="<?php echo base_url('assets2/css/themify-icons.css')?>" rel="stylesheet" />

    <!-- color CSS -->
    <link href="<?php echo base_url('assets/css/form5.css')?>" rel="stylesheet">
    <link href="<?php echo base_url('assets/css/main2.css')?>" rel="stylesheet">
    <link href="<?php echo base_url('assets/css/main.css')?>" rel="stylesheet">

    <style type="text/css" >
        .capacity-building2
        {
            background-image: url('<?php echo base_url('assets/img/back/backy.jpg') ?>');
            background-repeat: repeat;
            background-size: contain;
        }
    </style>


    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<body style="background-color: #9cb5b6;" onload="document.getElementById('dunner').style.display = 'none';" >
<div class="wrapper">
<div style="background-color: lightblue;" class="sidebar" data-background-color="lightblue" data-active-color="danger">

<!--
    Tip 1: you can change the color of the sidebar's background using: data-background-color="white | black"
    Tip 2: you can change the color of the active button using the data-active-color="primary | info | success | warning | danger"
-->

<div class="sidebar-wrapper">
<div class="logo">
    <a href="<?php echo site_url('')?>" class="simple-text">
        <img src="<?php echo base_url('assets/images/fau.png'); ?>" height="50px" />
    </a>
</div>

<ul class="nav">
<li>
    <a class="profile-pic" href="#"> <img src="<?php echo base_url(); ?><?php
        $this->db->select('*');
        $this->db->from('users');
        $this->db->where('line_id', $line_id);
        $query = $this->db->get();

        foreach($query->result() as $roll)
        {
            $pictures = $roll->photo;
            $role = $roll->role_id;
            $first = $roll->first_name;
            $last = $roll->last_name;
        }

        $this->db->select('*');
        $this->db->from('roles');
        $this->db->where('id', $role);
        $query2 = $this->db->get();

        foreach($query2->result() as $roll_name)
        {
            $role_id = $roll_name->role;
        }



        if($pictures != ''){ echo $pictures;} else echo 'images/users/user.png'
        ?>" alt="user-img" width="150" align="center" class="img-circle"><b class="hidden-xs"></b> </a>
    <p align="center"><?php echo $first.'&nbsp;'.$last; ?></p>
    <p align="center">Role: <?php echo $role_id; ?></p>
    <p align="center" >User ID: <?php echo $id; ?></p>

</li>
<li>
    <p align="center" style="color: white;"><a class="btn btn-info"  href="<?php echo site_url('/logout') ?>">Logout</a> </p>

</li>
<li>
    <a href="<?php echo site_url('frontend/dashboard')?>">
        <i class="ti-panel"></i>
        <p>Dashboard</p>
    </a>
</li>
<li>
    <a href="<?php echo site_url('frontend/user_details')?>">
        <i class="ti-user"></i>
        <p>My Profile</p>
    </a>
</li>
<?php
if ($role == 'worker')
{
    ?>
    <li>
        <a href="<?php echo site_url('frontend/supervisor_details')?>">
            <i class="ti-signal"></i>
            <p>My Supervisor</p>
        </a>
    </li>
    <li>
        <a href="<?php echo site_url('frontend/user_clock')?>">
            <i class="ti-check-box"></i>
            <p>Attendance</p>
        </a>
    </li>
    <li>
        <a href="<?php echo site_url('admin/track_task_worker')?>">
            <i class="ti-direction"></i>
            <p>Task manager</p>
        </a>
    </li>
    <li>
        <a href="<?php echo site_url('admin/view_report_worker')?>">
            <i class="ti-book"></i>
            <p>Report Manager</p>
        </a>
    </li>
    <li>
        <a href="<?php echo site_url('frontend/review_request')?>">
            <i class="ti-layout-grid3"></i>
            <p>Inventory Manager</p>
        </a>
    </li>
    <li>
        <a href="<?php echo site_url('messages')?>">
            <i class="ti-email"></i>
            <p>Message &amp; Notice</p>
        </a>
    </li>
<?php
}
elseif ($role == '1')
{

    ?>
    <li>
        <a href="<?php echo site_url('admin/user_account')?>">
            <i class="ti-book"></i>
            <p>Manage user account</p>
        </a>
    </li>
    <li>
        <a href="<?php echo site_url('frontend/admin_clock_history')?>">
            <i class="ti-check"></i>
            <p>Attendance Manager</p>
        </a>
    </li>
    <li>
        <a href="<?php echo site_url('admin/admin_track_task');?>">
            <i class="ti-direction"></i>
            <p>Task manager</p>
        </a>
    </li>
    <li>
        <a href="<?php echo site_url('admin/admin_receive_inventory_worker');?>">
            <i class="ti-layout-grid3"></i>
            <p>Inventory Manager</p>
        </a>
    </li>

    <li>
        <a href="<?php echo site_url('admin/admin_supervisor_remit');?>">
            <i class="ti-widgetized"></i>
            <p>Supervisor Manager Module</p>
        </a>
    </li>
    <li>
        <a href="#">
            <i class="ti-widget"></i>
            <p>Principal Manager (coming soon)</p>
        </a>
    </li>
    <li>
        <a href="<?php echo site_url('admin/admin_report_worker');?>">
            <i class="ti-book"></i>
            <p>Report &amp; Insight</p>
        </a>
    </li>

<?php
}
elseif ($role == 'supervisor') {
    ?>

    <li>
        <a href="<?php echo site_url('admin/user_account_supervisor');?>">
            <i class="ti-view-grid"></i>
            <p>My Team </p>
        </a>
    </li>
    <li>
        <a href="<?php echo site_url('frontend/clock_history_admin');?>">
            <i class="ti-check-box"></i>
            <p>Attendance Manager</p>
        </a>
    </li>
    <li>
        <a href="<?php echo site_url('frontend/new_task_admin');?>">
            <i class="ti-direction"></i>
            <p>Task manager</p>
        </a>
    </li>
    <li>
        <a href="<?php echo site_url('admin/supervisor_report_worker');?>">
            <i class="ti-book"></i>
            <p>Report Manager</p>
        </a>
    </li>
    <li>
        <a href="<?php echo site_url('admin/receive_inventory_worker');?>">
            <i class="ti-layout-grid3"></i>
            <p>Inventory Manager</p>
        </a>
    </li>
    <li>
        <a href="<?php echo site_url('messages')?>">
            <i class="ti-email"></i>
            <p>Message &amp; Notice</p>
        </a>
    </li>
<?php
}
?>
<?php
if($role == 'distributor') {

    ?>
    <li>
        <a href="<?php echo site_url('admin/distributor_inventory') ?>">
            <i class="ti-layout-grid3"></i>

            <p>Inventory Manager</p>
        </a>
    </li>
<?php
}
?>


<?php
if($role == '1') {

    ?>
    <li>
        <a href="<?php echo site_url('admin/alert_manager') ?>">
            <i class="ti-map-alt"></i>

            <p>Geo Fencing</p>
        </a>
    </li>
    <li>
        <a href="<?php echo site_url('frontend/admin_message')?>">
            <i class="ti-email"></i>
            <p>Message &amp; Notice</p>
        </a>
    </li>
<?php
}
?>

<li>
    <a href="<?php echo site_url('')?>">
        <i class="ti-comment"></i>
        <p>Live Chat (coming soon)</p>
    </a>
</li>
<?php
if($role == '1') {

    ?>
    <li>
        <a href="<?php echo site_url('admin/person') ?>">
            <i class="ti-settings"></i>

            <p>Settings</p>
        </a>
    </li>
<?php
}
?>
</ul>
</div>

</div>

<div class="main-panel">
    <nav class="navbar navbar-default">
        <div class="container-fluid">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar bar1"></span>
                    <span class="icon-bar bar2"></span>
                    <span class="icon-bar bar3"></span>
                </button>
                <a class="navbar-brand" href="<?php echo site_url('frontend/dashboard')?>">Dashboard</a>
            </div>
            <div class="collapse navbar-collapse">
                <ul class="nav navbar-nav navbar-right">
                    <?php
                    if($role == '1') {

                        $this->db->select('*');
                        $this->db->from('alert');
                        $this->db->where("(status = 'unseen' )", NULL, FALSE);
                        $query = $this->db->get();

                        $get_count =  $query->num_rows();

                        ?>
                        <li>
                            <a href="<?php echo site_url('/admin/alert_manager')?>" class="" data-toggle="">
                                <i class="flag"></i>
                                <p>Alert <b style="padding: 5px; color: white;" class="homesubfrm"><?php echo $get_count; ?></b></p>
                            </a>
                        </li>
                        <li>
                            <a href="<?php echo site_url('/frontend/admin_new_task')?>" class="" data-toggle="">
                                <i class="ti-panel"></i>
                                <p>Task</p>
                            </a>
                        </li>
                    <?php
                    }
                    if($role == 'supervisor') {
                        $query = $this->db->query("SELECT * FROM conversations WHERE receipient = $userName && is_read = '0'");
                        $message_count =  $query->num_rows();

                        ?>
                        <li>
                            <a href="<?php echo site_url('/admin/track_task_worker') ?>" class="" data-toggle="">
                                <i class="ti-panel"></i>

                                <p>Task</p>
                            </a>
                        </li>
                        <li>
                            <a href="<?php echo site_url('/messages') ?>" class="" data-toggle="">
                                <i class="ti-email"></i>

                                <p>Messages <b style="padding: 5px; color: white;" class="homesubfrm"><?php echo $message_count; ?></b></p>
                            </a>
                        </li>
                    <?php
                    }

                    ?>

                    <!--<li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                            <i class="ti-bell"></i>
                            <p class="notification">5</p>
                            <p>Notifications</p>
                            <b class="caret"></b>
                        </a>
                        <ul class="dropdown-menu">
                            <li><a href="#">Notification 1</a></li>
                            <li><a href="#">Notification 2</a></li>
                            <li><a href="#">Notification 3</a></li>
                            <li><a href="#">Notification 4</a></li>
                            <li><a href="#">Another notification</a></li>
                        </ul>
                    </li> -->
                    <?php
                    if($role == '1')
                    {

                        ?>
                        <li>
                            <a href="<?php echo site_url('admin/person') ?>">
                                <i class="ti-settings"></i>
                                <p>Settings</p>
                            </a>
                        </li>
                    <?php
                    }
                    ?>
                </ul>

            </div>
        </div>
    </nav>
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

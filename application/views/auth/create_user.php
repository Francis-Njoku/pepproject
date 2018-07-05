
<div class="left">
    <div class="content">
        <div class="header">
            <div class="logo text-center"><img src="<?php echo base_url('assets/img/logo-dark.png')?>" alt="pepproject Logo"></div>
            <p class="lead">Register</p>
        </div>
        <div id="infoMessage"><?php echo $message;?></div>

        <?php $fattr = array('class' => 'form-auth-small', 'name' => 'registra'); ?>
        <?php echo form_open('auth/create_user', $fattr);?>
        <div class="form-group">
            <label for="signin-email" class="control-label sr-only">First name</label>
            <?php echo form_input($first_name);?>
        </div>
        <div class="form-group">
            <label for="signin-email" class="control-label sr-only">Last name</label>
            <?php echo form_input($last_name);?>
        </div>
        <?php
        if($identity_column!=='email') {
            echo '<div class="row" style="margin-bottom: 10px;"><div class="col-md-6">';
            echo lang('create_user_identity_label', 'identity');
            echo '</div><div class="col-md-6">';
            echo form_error('identity');
            echo form_input($identity);
            echo '</div></div>';
        }
        ?>
        <div class="form-group">
            <label for="signin-email" class="control-label sr-only">Email</label>
            <?php echo form_input($email);?>
        </div>
        <div class="form-group">
            <label for="signin-password" class="control-label sr-only">Password</label>
            <?php echo form_input($password);?>
        </div>
        <div class="form-group">
            <label for="signin-password" class="control-label sr-only">Confirm password</label>
            <?php echo form_input($password_confirm);?>
        </div>
        <div class="form-group clearfix">
        </div>
        <p align="center"><?php echo form_submit('login', 'Sign up', 'class="btn btn-info btn-lg btn-block"');?></p>

        <?php echo form_close();?>
        <div class="bottom">
            <span class="helper-text"><i class="fa fa-unlock"></i> <a href="#">Sign in</a></span>
        </div>
    </div>
</div>
<div class="right">
    <div class="overlay"></div>
    <div class="content text">
        <h1 class="heading">Pepproject Cryptocurrency</h1>
        <p>Number 1</p>
    </div>
</div>

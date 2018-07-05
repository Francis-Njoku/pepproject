
<div class="left">
    <div class="content">
        <div class="header">
            <div class="logo text-center"><img src="<?php echo base_url('assets/img/logo-dark.png')?>" alt="Klorofil Logo"></div>
            <p class="lead">Change password</p>
        </div>
        <div id="infoMessage"><?php echo $message;?></div>

        <?php $fattr = array('class' => 'form-auth-small', 'name' => 'registra'); ?>
        <?php echo form_open('auth/change_password', $fattr);?>
        <div class="form-group">
            <label for="signin-old-password" class="control-label sr-only">Old password</label>
            <?php echo form_input($old_password);?>
        </div>
        <div class="form-group">
            <label for="signin-password" class="control-label sr-only">New paasowrd</label>
            <?php echo form_input($new_password);?>
        </div>
        <div class="form-group">
            <label for="signin-password" class="control-label sr-only">Confirm new paasowrd</label>
            <?php echo form_input($new_password_confirm);?>
        </div>
        <p align="center"><?php echo form_submit('submit', 'Change', 'class="btn btn-info btn-lg btn-block"');?></p>

        <?php echo form_close();?>
        <div class="bottom">
            <span class="helper-text"><i class="fa fa-lock"></i> <a href="#">Sign in</a></span>
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


<div class="left">
    <div class="content">
        <div class="header">

            <div class="logo text-center"><img src="<?php echo base_url('assets/img/logo-dark.png')?>" alt="Klorofil Logo"></div>
            <p class="lead">Forgot password</p>
            <p><?php echo sprintf(lang('forgot_password_subheading'), $identity_label);?></p>

        </div>
        <div id="infoMessage"><?php echo $message;?></div>

        <?php $fattr = array('class' => 'form-auth-small', 'name' => 'registra'); ?>
        <?php echo form_open('auth/forgot_password', $fattr);?>
        <div class="form-group">
            <label for="signin-old-password" class="control-label sr-only">Email</label>
            <?php echo form_input($identity);?>
        </div>
        <p align="center"><?php echo form_submit('submit', 'Submit', 'class="btn btn-info btn-lg btn-block"');?></p>

        <?php echo form_close();?>
        <div class="bottom">
            <span class="helper-text"><i class="fa fa-lock"></i> <a href="<?php echo site_url('login') ?>">Sign in</a></span>
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

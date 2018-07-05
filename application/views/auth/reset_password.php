
<div class="left">
    <div class="content">
        <div class="header">

            <div class="logo text-center"><img src="<?php echo base_url('assets/img/logo-dark.png')?>" alt="Klorofil Logo"></div>
            <p class="lead">Reset password</p>

        </div>
        <div id="infoMessage"><?php echo $message;?></div>

        <?php $fattr = array('class' => 'form-auth-small', 'name' => 'registra'); ?>
        <?php echo form_open('auth/reset_password/'.$code, $fattr);?>
        <div class="form-group">
            <label for="signin-new-password" class="control-label sr-only">Email</label>
            <?php echo form_input($new_password);?>
        </div>
        <div class="form-group">
            <label for="signin-new-password_confirm" class="control-label sr-only">Email</label>
            <?php echo form_input($new_password_confirm);?>
        </div>
        <?php echo form_input($user_id);?>
        <?php echo form_hidden($csrf); ?>
        <p align="center"><?php echo form_submit('submit', 'Submit', 'class="btn btn-info btn-lg btn-block"');?></p>

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
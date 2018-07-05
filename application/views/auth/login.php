<div class="left">
    <div class="content">
        <div class="header">
            <div class="logo text-center"><img src="<?php echo base_url('assets/img/logo-dark.png')?>" alt="Klorofil Logo"></div>
            <p class="lead">Login to your account</p>
        </div>
        <div id="infoMessage"><?php echo $message;?></div>

            <?php $fattr = array('class' => 'form-auth-small', 'name' => 'registra'); ?>
            <?php echo form_open('auth/login', $fattr);?>
            <div class="form-group">
                <label for="signin-email" class="control-label sr-only">Email</label>
                <?php echo form_input($identity);?>
            </div>
            <div class="form-group">
                <label for="signin-password" class="control-label sr-only">Password</label>
                <?php echo form_input($password, 'class="form-control"');?>
            </div>
            <div class="form-group clearfix">
                <label class="fancy-checkbox element-left">
                    <?php echo form_checkbox('remember', '1', FALSE, 'id="remember"', 'class="form-control"');?>
                    <span>Remember me</span>
                </label>
            </div>
        <p align="center"><?php echo form_submit('login', 'Sign in', 'class="btn btn-info btn-lg btn-block"');?></p>

        <?php echo form_close();?>
            <div class="bottom">
                <div class="row">
                    <div class="col-md-6">
                        <span class="helper-text"><i class="fa fa-lock"></i> <a href="<?php echo site_url('auth/forgot') ?>">Forgot password?</a></span>

                    </div>
                    <div class="col-md-6">
                        <span class="helper-text"><i class="fa fa-user"></i> <a href="<?php echo site_url('register') ?>">Sign up</a></span>

                    </div>
                </div>
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

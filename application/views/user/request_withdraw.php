<nav class="navbar navbar-default">
    <div class="container-fluid">
        <div class="navbar-header">
        </div>
        <ul class="nav navbar-nav">
            <li><a href="<?php echo site_url('frontend/user_payment')?>">Fund wallet</a>
            </li>
            <li><a href="<?php echo site_url('frontend/wallet')?>">Wallet history</a>
            </li>
            <li><a href="<?php echo site_url('frontend/request_withdraw')?>">Request withdraw</a>
            </li>
            <li><a href="<?php echo site_url('frontend/withdraw_history')?>">Withdraw history</a>
            </li>
        </ul>
    </div>
</nav>

<div class="container-fluid">
    <div class="row">
        <div class="col-md-3 col-lg-3 col-sm-3"></div>
        <div class="col-md-6 col-lg-6 col-sm-6">
            <div class="form-style-5">
            <fieldset>
                <legend>Request Withdraw</legend>
                <form name="Payment" method="post" action="<?php echo site_url().'/frontend/request_withdraw/save_order' ?>" >
                    <label for="userpay">Currency<select id="userpay" class="form-control" name="currency" required="required">
                            <option value="">Select</option>
                            <option value="PEP">PEP</option>
                            <option value="XPEP">XPEP</option>
                            <option value="STEEM">STEEM</option>

                        </select></label>
                    <input placeholder="Amount" type="text" name="amount" required/>

                    <label for="ref">Wallet address<textarea id="ref" rows="3" name="address"></textarea></label>
                    <input type="submit" value="Send" />


                </form>
            </fieldset>
                </div>
        </div>
        <div class="col-md-3 col-lg-3 col-sm-3">

        </div>
    </div>
</div>
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
                <legend>Fund Wallet</legend>
                <form name="Payment" method="post" action="<?php echo site_url().'/frontend/user_payment/save_order' ?>" >
                    <input placeholder="Amount" type="text" name="amount" required/>
                    <label for="userpay">Currency<select id="userpay" class="form-control" name="currency" required="required">
                            <option value="">Select</option>
                            <option value="PEP">PEP</option>
                            <option value="XPEP">XPEP</option>
                            <option value="STEEM">STEEM</option>

                        </select></label>
                    <label>Date funded</label>
                    <input placeholder="Date funded (yyyy-mm-dd)" type="date" name="date_of_payment" required/>
                    <label for="ref">Payment reference<textarea id="ref" rows="3" name="ref"></textarea></label>
                    <input type="submit" value="Send" />


                </form>
            </fieldset>
                </div>
        </div>
        <div class="col-md-3 col-lg-3 col-sm-3">
            <h3>Our Wallet Address</h3><hr />
            <p><b>Address: </b>12345678</p>
        </div>
    </div>
</div>
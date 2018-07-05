<nav class="navbar navbar-default">
    <div class="container-fluid">
        <div class="navbar-header">
        </div>
        <ul class="nav navbar-nav">
            <li><a href="<?php echo site_url('frontend/fund_wallet_history')?>">Fund wallet history</a>
            </li>
            <li><a href="<?php echo site_url('frontend/wallet')?>">Wallet history</a>
            </li>
            <li><a href="<?php echo site_url('frontend/withdraw_history')?>">Withdraw history</a>
            </li>
            <li><a href="<?php echo site_url('frontend/xpep_buyback_history')?>">XPEP buyback history</a>
            </li>
            <li><a href="<?php echo site_url('frontend/transfer_history')?>">Transfer History</a>
            </li>
        </ul>
    </div>
</nav>

<div class="container-fluid">
    <div class="row">
        <h4 class="text-primary" align="center">Current transfer charge is 0.01% per transfer</h4>
    </div>
    <div class="row">
        <div class="col-md-3 col-lg-3 col-sm-3"></div>
        <div class="col-md-6 col-lg-6 col-sm-6">
            <div class="form-style-5">
            <fieldset>
                <legend>Transfer</legend>
                <form name="Payment" method="post" action="<?php echo site_url().'/frontend/transfer/transfer' ?>" >
                    <label for="userpay">Transfer to:<select id="userpay" class="form-control" name="type" onchange="myFunction()" required="required">
                            <option value="">Select option</option>
                            <option value="pepproject">Another user on Pepproject</option>
                            <option value="xcoinlive">Xcoinlive</option>
                            <option value="gopepcash">GoPepcash</option>
                        </select></label>
                    <label for="user">Currency<select id="user" class="form-control" name="currency" required="required">
                            <option value="">Select currency</option>
                            <option value="PEP">PEP</option>
                            <option value="XPEP">XPEP</option>
                        </select></label>
                    <label for="ref"><textarea id="dunner" rows="2" name="address" required></textarea></label>
                    <input placeholder="Amount" type="text" name="amount" required/>
                    <input type="submit" value="Send" />


                </form>
            </fieldset>
                </div>
        </div>
        <div class="col-md-3 col-lg-3 col-sm-3">

        </div>
    </div>
</div>
<script type="text/javascript">
    function myFunction() {
        var x = document.getElementById("userpay").value;
        if (x == "pepproject") {
            document.getElementById('dunner').style.display = 'inline';
            document.getElementById('dunner').placeholder = 'Insert Wallet address';

            clearInterval();
        }
        else if (x == "xcoinlive") {
            document.getElementById('dunner').style.display = 'inline';
            document.getElementById('dunner').placeholder = 'Insert XCoinlive ID';


            clearInterval();
        }
        else if (x == "gopepcash") {
            document.getElementById('dunner').style.display = 'inline';
            document.getElementById('dunner').placeholder = 'Insert GoPepcash ID';

            clearInterval();
        }
        else {
            document.getElementById('dunner').style.display = 'none';
              }

    }

</script>
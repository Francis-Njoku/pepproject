<?php
foreach($retrieve_user as $details)
{
    $waves = $details['waves_address'];
}
?>

<div class="container-fluid">
    <div class="row">
        <div class="col-lg-3 col-md-3 col-sm-3">
        </div>
        <div class="col-lg-6 col-md-6 col-sm-6">
        <p align="center">Current transaction charge is 0.01%</p>
        </div>
        <div class="col-lg-3 col-md-3 col-sm-3">
        </div>
    </div>
    <div class="row">
        <div class="col-lg-8 col-md-8  col-sm-8">
            <div class="form-style-5">
            <fieldset>
                <legend align="center">Sell XPEP</legend>
                <form name="Payment" method="post" action="<?php echo site_url('/frontend/sell_xpep/save_request') ?>" >
                    <label for="userpay">Select currency<select id="userpay" class="form-control" name="currency1" required="required">
                            <option value="">Select</option>
                            <option value="BTC">Bitcoin (BTC)</option>
                            <option value="BCH">Bitcash (BCH)</option>
                            <option value="ETH">Ethereum (ETH)</option>
                            <option value="LTC">Litcoin (LTC)</option>
                            <option value="NGN">Naira (NGN)</option>
                            <option value="STEEM">STEEM</option>
                            <option value="WAVES">WAVES</option>

                        </select></label>
                    <input placeholder="Amount in XPEP" type="text" name="amount" required/>
                    <input placeholder="XPEP" value="XPEP" type="text" name="currency2" hidden="hidden"/>

                       <input type="submit" value="SELL" />;



                </form>
            </fieldset>
                </div>
        </div>
        <div class="col-lg-4 col-md-4 col-sm-4">
            <div class="table-responsive">
                <table id="table" class="table table-striped table-bordered" cellspacing="0" width="100%">
                    <thead>
                    <tr>
                        <th style="background-color: darkgoldenrod; color: white"  colspan="2"><h4 align="center"><b>Exchange rate</b></h4></th>
                    </tr>
                    <tr>
                        <th>Currency</th>
                        <th>Value in XPEP</th>

                    </tr>
                    </thead>
                    <tbody>

                        <tr>
                            <th>Bitcoin (BTC)</th>
                            <th><b id="coin1"></b> <i style="color: red;" class="fa fa-long-arrow-down"></th>
                        </tr>
                        <tr>
                            <th>Bitcash (BCH)</th>
                            <th ><b id="coin2"></b> <i style="color: red;" class="fa fa-long-arrow-down"></th>
                        </tr>
                        <tr>
                            <th>Ethereum (ETH)</th>
                            <th ><b id="coin3"></b><i style="color: red;" class="fa fa-long-arrow-down"></th>
                        </tr>
                        <tr>
                            <th>Litcoin (LTC)</th>
                            <th ><b id="coin4"></b><i style="color: red;" class="fa fa-long-arrow-down"></th>
                        </tr>
                        <tr>
                            <th>Naira (NGN)</th>
                            <th id="">365 <i style="color: red;" class="fa fa-long-arrow-down"></th>
                        </tr>
                        <tr>
                            <th>STEEM</th>
                            <th ><b id="coin5"></b> <i style="color: red;" class="fa fa-long-arrow-down"></th>
                        </tr>
                        <tr>
                            <th>WAVES</th>
                            <th ><b id="coin6"></b> <i style="color: red;" class="fa fa-long-arrow-down"></th>
                        </tr>
                    </tbody>
                    <tfoot>
                    <tr>
                        <th>Currency</th>
                        <th>Value in XPEP</th>
                    </tr>
                    </tfoot>
                </table>
            </div>
        </div>
    </div>
</div>
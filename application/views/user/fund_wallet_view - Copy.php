<!--
<nav class="navbar navbar-default">
    <div class="container-fluid">
        <div class="navbar-header">
        </div>
        <ul class="nav navbar-nav">
            <li><a href="<?php echo site_url('frontend/wallet')?>">Fund wallet</a>
            </li>
            <li><a href="<?php echo site_url('frontend/fund_wallet_history')?>">Fund wallet history</a>
            </li>
            <li><a href="<?php echo site_url('frontend/wallet')?>">Wallet history</a>
            </li>
            <li><a href="<?php echo site_url('frontend/withdraw')?>">Request withdraw</a>
            </li>
            <li><a href="<?php echo site_url('frontend/withdraw_history')?>">Withdraw history</a>
            </li>
        </ul>
    </div>
</nav> -->

<div class="container">
    <div class="row">
        <div class="col-md-12 col-sm-12">
            <h2 align="center">Buy Pepcoin with:</h2>
        </div>
    </div>
</div>

<div class="container-fluid" style="margin-top: 50px">

    <div class="row">
        <div class="col-md-4 col-sm-4 col-xs-4">
            <button type="button" style="padding-top: 30px; padding-bottom: 30px;" class="btn btn-info btn-lg btn-block" data-toggle="modal" data-target="#myModal">Bitcoin</button>
        </div>
        <div class="col-md-4 col-sm-4 col-xs-4">
            <button type="button" class="btn btn-lg btn-block" style="background-color: darkgoldenrod; color: white; padding-top: 30px; padding-bottom: 30px;" data-toggle="modal" data-target="#myModal2">Bitcash</button>
        </div>
        <div class="col-md-4 col-sm-4 col-xs-4">
            <button type="button" class="btn btn-lg btn-block" style="background-color: red; color: white; padding-top: 30px; padding-bottom: 30px;" data-toggle="modal" data-target="#myModal3">Ethereum</button>
        </div>

    </div>
    <br/>
    <br/>
    <br/>
    <div class="row">
        <div class="col-md-4 col-sm-4 col-xs-4">
            <button type="button" style="padding-top: 30px; padding-bottom: 30px;" class="btn btn-info btn-lg btn-block" data-toggle="modal" data-target="#myModal4">Litcoin</button>
        </div>
        <div class="col-md-4 col-sm-4 col-xs-4">
            <button type="button" class="btn btn-lg btn-block" style="padding-top: 30px; padding-bottom: 30px; background-color: darkgoldenrod; color: white;" data-toggle="modal" data-target="#myModal5">WAVES</button>
        </div>
        <div class="col-md-4  col-sm-4 col-xs-4">
            <button type="button" class="btn btn-lg btn-block" style="padding-top: 30px; padding-bottom: 30px; background-color: red; color: white;" data-toggle="modal" data-target="#myModal6">STEEM</button>
        </div>
    </div>
    <br/>
    <br/>
    <br/>
    <div class="row">
        <div class="col-md-12">
            <button type="button" style="padding-top: 30px; padding-bottom: 30px;" class="btn btn-info btn-lg btn-block" data-toggle="modal" data-target="#myModal7">Naira</button>
        </div>
    </div>




    <div class="row">

        <div class="col-md-12">

            <!-- Modal -->
            <!-- Bitcoin -->
            <div id="myModal" class="modal fade" role="dialog">
                <div class="modal-dialog">

                    <!-- Modal content-->
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                            <h4 class="modal-title">Buy PEPCOIN WITH BITCOIN</h4>
                        </div>
                        <div class="modal-body">
                            <?php
                            foreach($currency_bitcoin as $bitcoin)
                            {
                                $value = $bitcoin['value'];
                            }
                            foreach($ico as $ico_details)
                            {
                                $ico_id = $ico_details['id'];
                                $rate = $ico_details['rate'];
                                $maximum_amount = $ico_details['maximum_amount'];
                                $current_amount = $ico_details['current_amount'];
                                $percent_bonus = $ico_details['percent_bonus'];
                            }
                            $maxi_difference = $maximum_amount - $current_amount;
                            if($current_amount == 0)
                            {
                                $sold_amount = 0;
                            }
                            else{
                                $sold_amount = $current_amount;
                            }
                            $bitcoin_value = $value / $rate;
                            ?>
                            <div class="row">
                            <div class="col-md-6 col-sm-6">
                                <h4 style="color: goldenrod;">The current offer is valued at <?php echo '$'.$rate.' per PEP with bonus of '.$percent_bonus.'%. Sold '.$sold_amount; ?></h4>
                                <h4 style="color: goldenrod;">About <?php echo $maxi_difference.' remains'; ?></h4>
                                <h5>1 BTC = <?php echo $bitcoin_value; ?> PEP</h5>
                            </div>
                            <div class="col-md-6 col-sm-6">
                                <a rel='nofollow' href='#' border='0' style='cursor:default'><img src='https://chart.googleapis.com/chart?cht=qr&chl=15yHJ6QQfNWyLLBNLKyWLvN2prxv1N4ahy&chs=180x180&choe=UTF-8&chld=L|2' alt=''></a>
                            </div>
                                <div class="col-md-12 col-sm-12">
                                    <p align="center">Bit coin address: <b>15yHJ6QQfNWyLLBNLKyWLvN2prxv1N4ahy</b></p>
                                </div>
                                </div>


                            <div class="form-style-5">
                                <fieldset>
                                    <form name="Payment" method="post" action="<?php echo site_url().'/frontend/fund_wallet/save_order' ?>" >
                                        <input placeholder="currency" type="hidden" name="currency" value="BTC" required/>
                                        <input placeholder="value" type="hidden" id="rate" name="value" value=" <?php echo $bitcoin_value; ?>" required/>
                                        <div class="row">
                                            <div class="col-md-6 col-sm-6">
                                                <input placeholder="Amount" id="from" onkeyup="calculate_price()" type="text" name="amount" required/>

                                            </div>
                                            <div class="col-md-6 col-sm-6">
                                                <input placeholder="Value in PEPCOIN" id="to"  type="text" name="value_in_pep" readonly required/>
                                            </div>
                                        </div>
                                        <input type="hidden" name="ico" value="<?php echo $ico_id; ?>" required/>

                                        <label for="ref">Reference details<textarea id="ref" rows="3" name="address"></textarea></label>
                                        <input type="submit" value="Pay" />


                                    </form>
                                </fieldset>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        </div>
                    </div>

                </div>
            </div>
            <!--End Bitcoin -->

            <!-- Bitcash -->
            <div id="myModal2" class="modal fade" role="dialog">
                <div class="modal-dialog">

                    <!-- Modal content-->
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                            <h4 class="modal-title">Buy PEPCOIN WITH BITCOIN CASH</h4>
                        </div>
                        <div class="modal-body">
                            <?php
                            foreach($currency_bitcash as $bitcash)
                            {
                                $value = $bitcash['value'];
                            }
                            foreach($ico as $ico_details)
                            {
                                $ico_id = $ico_details['id'];
                                $rate = $ico_details['rate'];
                                $maximum_amount = $ico_details['maximum_amount'];
                                $current_amount = $ico_details['current_amount'];
                                $percent_bonus = $ico_details['percent_bonus'];
                            }
                            $maxi_difference = $maximum_amount - $current_amount;
                            if($current_amount == 0)
                            {
                                $sold_amount = 0;
                            }
                            else{
                                $sold_amount = $current_amount;
                            }
                            $bitcoin_value = $value / $rate;
                            ?>
                            <div class="row">
                                <div class="col-md-6 col-sm-6">
                                    <h4 style="color: goldenrod;">The current offer is valued at <?php echo '$'.$rate.' per PEP with bonus of '.$percent_bonus.'%. Sold '.$sold_amount; ?></h4>
                                    <h4 style="color: goldenrod;">About <?php echo $maxi_difference.' remains'; ?></h4>
                                    <h5>1 BTC = <?php echo $bitcoin_value; ?> PEP</h5>
                                </div>
                                <div class="col-md-6 col-sm-6">
                                    <a rel='nofollow' href='#' border='0' style='cursor:default'><img src='https://chart.googleapis.com/chart?cht=qr&chl=qq3m07ncnr8u6jlvjrzwyemhnd87e0mujyn4zyfmgc&chs=180x180&choe=UTF-8&chld=L|2' alt=''></a>
                                </div>
                                <div class="col-md-12 col-sm-12">
                                    <p align="center">Bitcoin cash address: <b>qq3m07ncnr8u6jlvjrzwyemhnd87e0mujyn4zyfmgc</b></p>
                                </div>
                            </div>


                            <div class="form-style-5">
                                <fieldset>
                                    <form name="Payment" method="post" action="<?php echo site_url().'/frontend/fund_wallet/save_order' ?>" >
                                        <input placeholder="currency" type="hidden" name="currency" value="BCH" required/>
                                        <input placeholder="value" type="hidden" id="rate2" name="value" value=" <?php echo $bitcoin_value; ?>" required/>
                                        <div class="row">
                                            <div class="col-md-6 col-sm-6">
                                                <input placeholder="Amount" id="from2" onkeyup="calculate_price2()" type="text" name="amount" required/>

                                            </div>
                                            <div class="col-md-6 col-sm-6">
                                                <input placeholder="Value in PEPCOIN" id="to2"  type="text" name="value_in_pep" readonly required/>
                                            </div>
                                        </div>
                                        <input type="hidden" name="ico" value="<?php echo $ico_id; ?>" required/>

                                        <label for="ref">Reference details<textarea id="ref" rows="3" name="address"></textarea></label>
                                        <input type="submit" value="Pay" />


                                    </form>
                                </fieldset>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        </div>
                    </div>

                </div>
            </div>
            <!--End Bitcash -->

            <!-- Ethereum -->
            <div id="myModal3" class="modal fade" role="dialog">
                <div class="modal-dialog">

                    <!-- Modal content-->
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                            <h4 class="modal-title">Buy PEPCOIN WITH ETHEREUM</h4>
                        </div>
                        <div class="modal-body">
                            <?php
                            foreach($currency_ethereum as $currency)
                            {
                                $value = $currency['value'];
                            }
                            foreach($ico as $ico_details)
                            {
                                $ico_id = $ico_details['id'];
                                $rate = $ico_details['rate'];
                                $maximum_amount = $ico_details['maximum_amount'];
                                $current_amount = $ico_details['current_amount'];
                                $percent_bonus = $ico_details['percent_bonus'];
                            }
                            $maxi_difference = $maximum_amount - $current_amount;
                            if($current_amount == 0)
                            {
                                $sold_amount = 0;
                            }
                            else{
                                $sold_amount = $current_amount;
                            }
                            $currency_value = $value / $rate;
                            ?>
                            <div class="row">
                                <div class="col-md-6 col-sm-6">
                                    <h4 style="color: goldenrod;">The current offer is valued at <?php echo '$'.$rate.' per PEP with bonus of '.$percent_bonus.'%. Sold '.$sold_amount; ?></h4>
                                    <h4 style="color: goldenrod;">About <?php echo $maxi_difference.' remains'; ?></h4>
                                    <h5>1 ETH = <?php echo $currency_value; ?> PEP</h5>
                                </div>
                                <div class="col-md-6 col-sm-6">
                                    <a rel='nofollow' href='#' border='0' style='cursor:default'><img src='https://chart.googleapis.com/chart?cht=qr&chl=0xbc0ae12b397e6be23e190a1f0da974103d711788&chs=180x180&choe=UTF-8&chld=L|2' alt=''></a>
                                </div>
                                <div class="col-md-12 col-sm-12">
                                    <p align="center">Ethereum address: <b>0xbc0ae12b397e6be23e190a1f0da974103d711788</b></p>
                                </div>
                            </div>


                            <div class="form-style-5">
                                <fieldset>
                                    <form name="Payment" method="post" action="<?php echo site_url().'/frontend/fund_wallet/save_order' ?>" >
                                        <input placeholder="currency" type="hidden" name="currency" value="ETH" required/>
                                        <input placeholder="value" type="hidden" id="rate3" name="value" value=" <?php echo $currency_value; ?>" required/>
                                        <div class="row">
                                            <div class="col-md-6 col-sm-6">
                                                <input placeholder="Amount" id="from3" onkeyup="calculate_price3()" type="text" name="amount" required/>

                                            </div>
                                            <div class="col-md-6 col-sm-6">
                                                <input placeholder="Value in PEPCOIN" id="to3"  type="text" name="value_in_pep" readonly required/>
                                            </div>
                                        </div>
                                        <input type="hidden" name="ico" value="<?php echo $ico_id; ?>" required/>

                                        <label for="ref">Reference details<textarea id="ref" rows="3" name="address"></textarea></label>
                                        <input type="submit" value="Pay" />


                                    </form>
                                </fieldset>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        </div>
                    </div>

                </div>
            </div>
            <!--End Ethereum -->

            <!-- Litcoin -->
            <div id="myModal4" class="modal fade" role="dialog">
                <div class="modal-dialog">

                    <!-- Modal content-->
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                            <h4 class="modal-title">Buy PEPCOIN WITH LITCOIN</h4>
                        </div>
                        <div class="modal-body">
                            <?php
                            foreach($currency_litcoin as $currency)
                            {
                                $value = $currency['value'];
                            }
                            foreach($ico as $ico_details)
                            {
                                $ico_id = $ico_details['id'];
                                $rate = $ico_details['rate'];
                                $maximum_amount = $ico_details['maximum_amount'];
                                $current_amount = $ico_details['current_amount'];
                                $percent_bonus = $ico_details['percent_bonus'];
                            }
                            $maxi_difference = $maximum_amount - $current_amount;
                            if($current_amount == 0)
                            {
                                $sold_amount = 0;
                            }
                            else{
                                $sold_amount = $current_amount;
                            }
                            $currency_value = $value / $rate;
                            ?>
                            <div class="row">
                                <div class="col-md-6 col-sm-6">
                                    <h4 style="color: goldenrod;">The current offer is valued at <?php echo '$'.$rate.' per PEP with bonus of '.$percent_bonus.'%. Sold '.$sold_amount; ?></h4>
                                    <h4 style="color: goldenrod;">About <?php echo $maxi_difference.' remains'; ?></h4>
                                    <h5>1 LTC = <?php echo $currency_value; ?> PEP</h5>
                                </div>
                                <div class="col-md-6 col-sm-6">
                                    <a rel='nofollow' href='#' border='0' style='cursor:default'><img src='https://chart.googleapis.com/chart?cht=qr&chl=LSDGKpfah8duPcrNdbK2BLG3wecAZqSrQ4&chs=180x180&choe=UTF-8&chld=L|2' alt=''></a>
                                </div>
                                <div class="col-md-12 col-sm-12">
                                    <p align="center">Litcoin address: <b>LSDGKpfah8duPcrNdbK2BLG3wecAZqSrQ4</b></p>
                                </div>
                            </div>


                            <div class="form-style-5">
                                <fieldset>
                                    <form name="Payment" method="post" action="<?php echo site_url().'/frontend/fund_wallet/save_order' ?>" >
                                        <input placeholder="currency" type="hidden" name="currency" value="LTC" required/>
                                        <input placeholder="value" type="hidden" id="rate4" name="value" value=" <?php echo $currency_value; ?>" required/>
                                        <div class="row">
                                            <div class="col-md-6 col-sm-6">
                                                <input placeholder="Amount" id="from4" onkeyup="calculate_price4()" type="text" name="amount" required/>

                                            </div>
                                            <div class="col-md-6 col-sm-6">
                                                <input placeholder="Value in PEPCOIN" id="to4"  type="text" name="value_in_pep" readonly required/>
                                            </div>
                                        </div>
                                        <input type="hidden" name="ico" value="<?php echo $ico_id; ?>" required/>

                                        <label for="ref">Reference details<textarea id="ref" rows="3" name="address"></textarea></label>
                                        <input type="submit" value="Pay" />


                                    </form>
                                </fieldset>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        </div>
                    </div>

                </div>
            </div>
            <!--End Litcoin -->

            <!-- Waves -->
            <div id="myModal5" class="modal fade" role="dialog">
                <div class="modal-dialog">

                    <!-- Modal content-->
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                            <h4 class="modal-title">Buy PEPCOIN WITH WAVES</h4>
                        </div>
                        <div class="modal-body">
                            <?php
                            foreach($currency_waves as $currency)
                            {
                                $value = $currency['value'];
                            }
                            foreach($ico as $ico_details)
                            {
                                $ico_id = $ico_details['id'];
                                $rate = $ico_details['rate'];
                                $maximum_amount = $ico_details['maximum_amount'];
                                $current_amount = $ico_details['current_amount'];
                                $percent_bonus = $ico_details['percent_bonus'];
                            }
                            $maxi_difference = $maximum_amount - $current_amount;
                            if($current_amount == 0)
                            {
                                $sold_amount = 0;
                            }
                            else{
                                $sold_amount = $current_amount;
                            }
                            $currency_value = $value / $rate;
                            ?>
                            <div class="row">
                                <div class="col-md-6 col-sm-6">
                                    <h4 style="color: goldenrod;">The current offer is valued at <?php echo '$'.$rate.' per PEP with bonus of '.$percent_bonus.'%. Sold '.$sold_amount; ?></h4>
                                    <h4 style="color: goldenrod;">About <?php echo $maxi_difference.' remains'; ?></h4>
                                    <h5>1 WAVES = <?php echo $currency_value; ?> PEP</h5>
                                </div>
                                <div class="col-md-6 col-sm-6">
                                    <a rel='nofollow' href='#' border='0' style='cursor:default'><img src='https://chart.googleapis.com/chart?cht=qr&chl=3P5rAuuWwMv3H99NEFJzsZCVhPMwJq3cMrm&chs=180x180&choe=UTF-8&chld=L|2' alt=''></a>
                                </div>
                                <div class="col-md-12 col-sm-12">
                                    <p align="center">Waves address: <b>3P5rAuuWwMv3H99NEFJzsZCVhPMwJq3cMrm</b></p>
                                </div>
                            </div>


                            <div class="form-style-5">
                                <fieldset>
                                    <form name="Payment" method="post" action="<?php echo site_url().'/frontend/fund_wallet/save_order' ?>" >
                                        <input placeholder="currency" type="hidden" name="currency" value="Waves" required/>
                                        <input placeholder="value" type="hidden" id="rate5" name="value" value=" <?php echo $currency_value; ?>" required/>
                                        <div class="row">
                                            <div class="col-md-6 col-sm-6">
                                                <input placeholder="Amount" id="from5" onkeyup="calculate_price5()" type="text" name="amount" required/>

                                            </div>
                                            <div class="col-md-6 col-sm-6">
                                                <input placeholder="Value in PEPCOIN" id="to5"  type="text" name="value_in_pep" readonly required/>
                                            </div>
                                        </div>
                                        <input type="hidden" name="ico" value="<?php echo $ico_id; ?>" required/>

                                        <label for="ref">Reference details<textarea id="ref" rows="3" name="address"></textarea></label>
                                        <input type="submit" value="Pay" />


                                    </form>
                                </fieldset>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        </div>
                    </div>

                </div>
            </div>
            <!--End Waves -->

            <!-- STEEM -->
            <div id="myModal6" class="modal fade" role="dialog">
                <div class="modal-dialog">

                    <!-- Modal content-->
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                            <h4 class="modal-title">Buy PEPCOIN WITH STEEM</h4>
                        </div>
                        <div class="modal-body">
                            <?php
                            foreach($currency_steem as $currency)
                            {
                                $value = $currency['value'];
                            }
                            foreach($ico as $ico_details)
                            {
                                $ico_id = $ico_details['id'];
                                $rate = $ico_details['rate'];
                                $maximum_amount = $ico_details['maximum_amount'];
                                $current_amount = $ico_details['current_amount'];
                                $percent_bonus = $ico_details['percent_bonus'];
                            }
                            $maxi_difference = $maximum_amount - $current_amount;
                            if($current_amount == 0)
                            {
                                $sold_amount = 0;
                            }
                            else{
                                $sold_amount = $current_amount;
                            }
                            $currency_value = $value / $rate;
                            ?>
                            <div class="row">
                                <div class="col-md-6 col-sm-6">
                                    <h4 style="color: goldenrod;">The current offer is valued at <?php echo '$'.$rate.' per PEP with bonus of '.$percent_bonus.'%. Sold '.$sold_amount; ?></h4>
                                    <h4 style="color: goldenrod;">About <?php echo $maxi_difference.' remains'; ?></h4>
                                    <h5>1 STEEM = <?php echo $currency_value; ?> PEP</h5>
                                </div>
                                <div class="col-md-6 col-sm-6">
                                    <a rel='nofollow' href='#' border='0' style='cursor:default'><img src='https://chart.googleapis.com/chart?cht=qr&chl=@pepproject&chs=180x180&choe=UTF-8&chld=L|2' alt=''></a>
                                </div>
                                <div class="col-md-12 col-sm-12">
                                    <p align="center">STEEM address: <b>@pepproject</b></p>
                                </div>
                            </div>


                            <div class="form-style-5">
                                <fieldset>
                                    <form name="Payment" method="post" action="<?php echo site_url().'/frontend/fund_wallet/save_order' ?>" >
                                        <input placeholder="currency" type="hidden" name="currency" value="STEEM" required/>
                                        <input placeholder="value" type="hidden" id="rate6" name="value" value=" <?php echo $currency_value; ?>" required/>
                                        <div class="row">
                                            <div class="col-md-6 col-sm-6">
                                                <input placeholder="Amount" id="from6" onkeyup="calculate_price6()" type="text" name="amount" required/>

                                            </div>
                                            <div class="col-md-6 col-sm-6">
                                                <input placeholder="Value in PEPCOIN" id="to6"  type="text" name="value_in_pep" required readonly/>
                                            </div>
                                        </div>

                                        <input type="hidden" name="ico" value="<?php echo $ico_id; ?>" required/>

                                        <label for="ref">Reference details<textarea id="ref" rows="3" name="address"></textarea></label>
                                        <input type="submit" value="Pay" />


                                    </form>
                                </fieldset>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        </div>
                    </div>

                </div>
            </div>
            <!--End STEEM -->

            <!-- NAIRA -->
            <div id="myModal7" class="modal fade" role="dialog">
                <div class="modal-dialog">

                    <!-- Modal content-->
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                            <h4 class="modal-title">Buy PEPCOIN WITH NAIRA</h4>
                        </div>
                        <div class="modal-body">
                            <?php
                            foreach($currency_naira as $currency)
                            {
                                $value = $currency['value'];
                            }
                            foreach($ico as $ico_details)
                            {
                                $ico_id = $ico_details['id'];
                                $rate = $ico_details['rate'];
                                $maximum_amount = $ico_details['maximum_amount'];
                                $current_amount = $ico_details['current_amount'];
                                $percent_bonus = $ico_details['percent_bonus'];
                            }
                            $maxi_difference = $maximum_amount - $current_amount;
                            if($current_amount == 0)
                            {
                                $sold_amount = 0;
                            }
                            else{
                                $sold_amount = $current_amount;
                            }
                            $currency_value = $value / $rate;
                            ?>
                            <div class="row">
                                <div class="col-md-6 col-sm-6">
                                    <h4 style="color: goldenrod;">The current offer is valued at <?php echo '$'.$rate.' per PEP with bonus of '.$percent_bonus.'%. Sold '.$sold_amount; ?></h4>
                                    <h4 style="color: goldenrod;">About <?php echo $maxi_difference.' remains'; ?></h4>
                                    <h5>1 NAIRA = <?php echo $currency_value; ?> PEP</h5>
                                </div>
                                <div class="col-md-6 col-sm-6">
                                    <p>
                                        FCMB: <b>3053418021</b>
                                    </p>
                                    <p>
                                        GTBank: <b>0168611884</b>
                                    </p>
                                </div>
                            </div>


                            <div class="form-style-5">
                                <fieldset>
                                    <form name="Payment" method="post" action="<?php echo site_url().'/frontend/fund_wallet/save_order' ?>" >
                                        <input placeholder="currency" type="hidden" name="currency" value="NGN" required/>
                                        <input placeholder="value" type="hidden" id="rate7" name="value" value=" <?php echo $currency_value; ?>" required/>
                                        <div class="row">
                                            <div class="col-md-6 col-sm-6">
                                                <input placeholder="Amount" id="from7" onkeyup="calculate_price7  ()" type="text" name="amount" required/>

                                            </div>
                                            <div class="col-md-6 col-sm-6">
                                                <input placeholder="Value in PEPCOIN" id="to7"  type="text" name="value_in_pep" required readonly/>
                                            </div>
                                        </div>

                                        <input type="hidden" name="ico" value="<?php echo $ico_id; ?>" required/>

                                        <label for="ref">Reference details<textarea id="ref" rows="3" name="address"></textarea></label>
                                        <input type="submit" value="Pay" />


                                    </form>
                                </fieldset>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        </div>
                    </div>

                </div>
            </div>
            <!--End NAIRA -->

        </div>

    </div>

</div>

<script>

    var a = document.getElementById("rate");
    var b = document.getElementById("from");
    var c = document.getElementById("to");
    var a2 = document.getElementById("rate2");
    var b2 = document.getElementById("from2");
    var c2 = document.getElementById("to2");
    var a3 = document.getElementById("rate3");
    var b3 = document.getElementById("from3");
    var c3 = document.getElementById("to3");
    var a4 = document.getElementById("rate4");
    var b4 = document.getElementById("from4");
    var c4 = document.getElementById("to4");
    var a5 = document.getElementById("rate5");
    var b5 = document.getElementById("from5");
    var c5 = document.getElementById("to5");
    var a6 = document.getElementById("rate6");
    var b6 = document.getElementById("from6");
    var c6 = document.getElementById("to6");
    var a7 = document.getElementById("rate7");
    var b7 = document.getElementById("from7");
    var c7 = document.getElementById("to7");


    function calculate_price()
    {
        c.value = b.value * a.value;

    }

    function calculate_price2()
    {

        c2.value = b2.value * a2.value;
    }
    function calculate_price3()
    {

        c3.value = b3.value * a3.value;
    }
    function calculate_price4()
    {

        c4.value = b4.value * a4.value;
    }
    function calculate_price5()
    {

        c5.value = b5.value * a5.value;
    }
    function calculate_price6()
    {

        c6.value = b6.value * a6.value;
    }
    function calculate_price7()
    {

        c7.value = b7.value * a7.value;
    }


</script>
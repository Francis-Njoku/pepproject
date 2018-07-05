<!--
<nav class="navbar navbar-default">
    <div class="container-fluid">
        <div class="navbar-header">
        </div>
        <ul class="nav navbar-nav">
            <li><a href="<?php echo site_url('frontend/withdraw')?>">Withdraw</a>
            </li>
            <li><a href="<?php echo site_url('frontend/fund_xpep')?>">Deposit</a>
            </li>
            <li><a href="<?php echo site_url('frontend/transfer')?>">Transfer</a>
            </li>

        </ul>
    </div>
</nav> -->


<div class="container-fluid">
    <div class="row">
        <div class="col-md-12 col-sm-12">
            <h2 align="center">Buy XPEP with:</h2>
        </div>

    </div>
    <div class="row">
        <div class="col-lg-8 col-md-8 col-sm-8">
            <!--- Cryptocurrency--->
            <div class="row">

                <div class="col-md-4 col-sm-4 col-xs-4">
                    <button  type="button" style="padding-top: 30px; padding-bottom: 30px;" class="btn btn-info btn-lg btn-block" data-toggle="modal" data-target="#myModal">Bitcoin</button>
                </div>
                <div class="col-md-4 col-sm-4 col-xs-4">
                    <button  type="button" class="btn btn-lg btn-block" style="background-color: darkgoldenrod; color: white; padding-top: 30px; padding-bottom: 30px;" data-toggle="modal" data-target="#myModal2">Bitcash</button>
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
            <!---end cryptocurrency--->
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
                    <h4 class="modal-title">Buy PEPCASH WITH BITCOIN</h4>
                </div>
                <div class="modal-body">
                    <?php
                    foreach($currency_bitcoin as $bitcoin)
                    {
                        $value = $bitcoin['value'];
                    }

                    $bitcoin_value = $value
                    ?>
                    <div class="row">
                        <div class="col-md-6 col-sm-6">

                            <h5>1 BTC = <b id="coin1"></b> XPEP</h5>
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
                            <form name="Payment" method="post" action="<?php echo site_url().'/frontend/fund_xpep/save_order' ?>" >
                                <input placeholder="currency" type="hidden" name="currency" value="BTC" required/>
                                <input placeholder="value" type="hidden" id="rate" name="value" value="" required/>
                                <div class="row">
                                    <div class="col-md-6 col-sm-6">
                                        <input placeholder="Amount" id="from" onkeyup="calculate_price()" type="text" name="amount" required/>

                                    </div>
                                    <div class="col-md-6 col-sm-6">
                                        <input placeholder="Value in PEPCASH (XPEP)" id="to"  type="text" name="value_in_xpep" readonly required/>
                                    </div>
                                </div>

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
                    <h4 class="modal-title">Buy PEPCASH (XPEP) WITH BITCOIN CASH</h4>
                </div>
                <div class="modal-body">
                    <?php
                    foreach($currency_bitcash as $bitcash)
                    {
                        $value = $bitcash['value'];
                    }

                    $bitcoin_value = $value;
                    ?>
                    <div class="row">
                        <div class="col-md-6 col-sm-6">
                            <h5>1 BCH =  <b id="coin2"></b> XPEP</h5>
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
                            <form name="Payment" method="post" action="<?php echo site_url().'/frontend/fund_xpep/save_order' ?>" >
                                <input placeholder="currency" type="hidden" name="currency" value="BCH" required/>
                                <input placeholder="value" type="hidden" id="rate2" name="value" value="" required/>
                                <div class="row">
                                    <div class="col-md-6 col-sm-6">
                                        <input placeholder="Amount" id="from2" onkeyup="calculate_price2()" type="text" name="amount" required/>

                                    </div>
                                    <div class="col-md-6 col-sm-6">
                                        <input placeholder="Value in PEPCASH (XPEP)" id="to2"  type="text" name="value_in_xpep" readonly required/>
                                    </div>
                                </div>

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
                    <h4 class="modal-title">Buy PEPCASH WITH ETHEREUM</h4>
                </div>
                <div class="modal-body">
                    <?php
                    foreach($currency_ethereum as $currency)
                    {
                        $value = $currency['value'];
                    }

                    $currency_value = $value
                    ?>
                    <div class="row">
                        <div class="col-md-6 col-sm-6">
                            <h5>1 ETH = <b id="coin3"></b> XPEP</h5>
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
                            <form name="Payment" method="post" action="<?php echo site_url().'/frontend/fund_xpep/save_order' ?>" >
                                <input placeholder="currency" type="hidden" name="currency" value="ETH" required/>
                                <input placeholder="value" type="hidden" id="rate3" name="value" value="" required/>
                                <div class="row">
                                    <div class="col-md-6 col-sm-6">
                                        <input placeholder="Amount" id="from3" onkeyup="calculate_price3()" type="text" name="amount" required/>

                                    </div>
                                    <div class="col-md-6 col-sm-6">
                                        <input placeholder="Value in PEPCASH (XPEP)" id="to3"  type="text" name="value_in_xpep" readonly required/>
                                    </div>
                                </div>

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
                    <h4 class="modal-title">Buy PEPCASH WITH LITCOIN</h4>
                </div>
                <div class="modal-body">
                    <?php
                    foreach($currency_litcoin as $currency)
                    {
                        $value = $currency['value'];
                    }

                    $currency_value = $value;
                    ?>
                    <div class="row">
                        <div class="col-md-6 col-sm-6">

                            <h5>1 LTC = <b id="coin4"></b> XPEP</h5>
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
                            <form name="Payment" method="post" action="<?php echo site_url().'/frontend/fund_xpep/save_order' ?>" >
                                <input placeholder="currency" type="hidden" name="currency" value="LTC" required/>
                                <input placeholder="value" type="hidden" id="rate4" name="value" value="" required/>
                                <div class="row">
                                    <div class="col-md-6 col-sm-6">
                                        <input placeholder="Amount" id="from4" onkeyup="calculate_price4()" type="text" name="amount" required/>

                                    </div>
                                    <div class="col-md-6 col-sm-6">
                                        <input placeholder="Value in PEPCASH (XPEP)" id="to4"  type="text" name="value_in_xpep" readonly required/>
                                    </div>
                                </div>

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
                    <h4 class="modal-title">Buy PEPCASH WITH WAVES</h4>
                </div>
                <div class="modal-body">
                    <?php
                    foreach($currency_waves as $currency)
                    {
                        $value = $currency['value'];
                    }

                    $currency_value = $value;
                    ?>
                    <div class="row">
                        <div class="col-md-6 col-sm-6">

                            <h5>1 WAVES = <b id="coin5"></b> XPEP</h5>
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
                            <form name="Payment" method="post" action="<?php echo site_url().'/frontend/fund_xpep/save_order' ?>" >
                                <input placeholder="currency" type="hidden" name="currency" value="Waves" required/>
                                <input placeholder="value" type="hidden" id="rate5" name="value" value=" <?php echo $currency_value; ?>" required/>
                                <div class="row">
                                    <div class="col-md-6 col-sm-6">
                                        <input placeholder="Amount" id="from5" onkeyup="calculate_price5()" type="text" name="amount" required/>

                                    </div>
                                    <div class="col-md-6 col-sm-6">
                                        <input placeholder="Value in PEPCASH (XPEP)" id="to5"  type="text" name="value_in_xpep" readonly required/>
                                    </div>
                                </div>

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
                    <h4 class="modal-title">Buy PEPCASH WITH STEEM</h4>
                </div>
                <div class="modal-body">
                    <?php
                    foreach($currency_steem as $currency)
                    {
                        $value = $currency['value'];
                    }

                    $currency_value = $value;
                    ?>
                    <div class="row">
                        <div class="col-md-6 col-sm-6">
                            <h5>1 STEEM = <b id="coin6"></b> XPEP</h5>
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
                            <form name="Payment" method="post" action="<?php echo site_url().'/frontend/fund_xpep/save_order' ?>" >
                                <input placeholder="currency" type="hidden" name="currency" value="STEEM" required/>
                                <input placeholder="value" type="hidden" id="rate6" name="value" value=" " required/>
                                <div class="row">
                                    <div class="col-md-6 col-sm-6">
                                        <input placeholder="Amount" id="from6" onkeyup="calculate_price6()" type="text" name="amount" required/>

                                    </div>
                                    <div class="col-md-6 col-sm-6">
                                        <input placeholder="Value in PEPCASH (XPEP)" id="to6"  type="text" name="value_in_xpep" required readonly/>
                                    </div>
                                </div>

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
                    <h4 class="modal-title">Buy PEPCASH WITH NAIRA</h4>
                </div>
                <div class="modal-body">
                    <?php
                    foreach($currency_naira as $currency)
                    {
                        $value = $currency['value'];
                    }

                    $currency_value = $value;
                    ?>
                    <div class="row">
                        <div class="col-md-6 col-sm-6">
                            <h5>1 NAIRA = <?php echo $currency_value; ?> XPEP</h5>
                        </div>
                        <div class="col-md-6 col-sm-6">
                            <h1>
                                <b>COMING SOON</b>
                            </h1>

                        </div>
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



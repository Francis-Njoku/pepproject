

<div class="container">
    <div class="row">
        <div class="col-md-12 col-sm-12">
            <h2 align="center">EXCHANGE</h2>
        </div>
    </div>
</div>

<div class="container-fluid" style="margin-top: 50px">
    <div class="row">
        <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
            <div class="form-new">
                <fieldset>
                    <legend class="form-new-legend" align="center">Buy PEP</legend>
                    <form name="Payment" method="post" action="<?php echo site_url().'/frontend/trade/exchange' ?>" >
                        <div class="input-group">
                            <span class="input-group-btn"><button class="btn btn-danger" type="button">Balance (XPEP)</button></span>
                            <input class="form-control" name="type" value="buy_pep" type="hidden">

                            <input class="form-control" value="<?php $xpep_balance = $total_credit_xpep - $total_debit_xpep; echo $xpep_balance ?>" type="text">
                        </div>
                        <br/>
                        <div class="input-group">
                            <span class="input-group-btn"><button class="btn btn-primary" type="button">Amount</button></span>

                            <input onkeyup="calculate_price1()" id="amt" class="form-control" name="amount" type="text">
                        </div>
                        <br />
                        <div  class="input-group">
                            <span class="input-group-btn"><button class="btn btn-primary" type="button">Price</button></span>

                            <input onkeyup="calculate_price3()" id="prc" name="price" class="form-control" type="text">
                        </div>
                        <br/>
                        <div class="input-group">
                            <span class="input-group-btn"><button class="btn btn-primary" type="button">Total</button></span>

                            <input onkeyup="calculate_price2()" id="tt" name="total" class="form-control" type="text">
                        </div>
                        <br/>
                        <div class="input-group">
                            <span class="input-group-btn"><button class="btn btn-primary" type="button">Fee</button></span>

                            <input id="fee" name="fee" class="form-control" value="" type="text">
                        </div>
                        <br/>
                        <div class="input-group">
                            <span class="input-group-btn"><button class="btn btn-primary" type="button">Total + Fee</button></span>

                            <input id="tt_fee" name="total_fee" class="form-control" type="text">
                        </div>
                        <br/>
                        <div align="center">
                            <input class="btn btn-md btn-primary" type="submit" value="Buy" />
                        </div>

                    </form>
                </fieldset>
            </div>
        </div>

        <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
            <div class="form-new">
                <fieldset>
                    <legend class="form-new-legend" align="center">SELL PEP</legend>
                    <form name="Payment" method="post" action="<?php echo site_url().'/frontend/trade/exchange' ?>" >
                        <div class="input-group">
                            <span class="input-group-btn"><button class="btn btn-danger" type="button">Balance (PEP)</button></span>
                            <input class="form-control" name="type" value="sell_pep" type="hidden">

                            <input class="form-control" value="<?php $pep_balance = $total_credit_pep - $total_debit_pep; echo $pep_balance ?>" type="text">
                        </div>
                        <br/>
                        <div class="input-group">
                            <span class="input-group-btn"><button class="btn btn-primary" type="button">Amount</button></span>

                            <input class="form-control" name="amount" type="text">
                        </div>
                        <br />
                        <div class="input-group">
                            <span class="input-group-btn"><button class="btn btn-primary" type="button">Price</button></span>

                            <input name="price" class="form-control" type="text">
                        </div>
                        <br/>
                        <div class="input-group">
                            <span class="input-group-btn"><button class="btn btn-primary" type="button">Total</button></span>

                            <input name="total" class="form-control" type="text">
                        </div>
                        <br/>
                        <div class="input-group">
                            <span class="input-group-btn"><button class="btn btn-primary" type="button">Fee</button></span>

                            <input name="fee" class="form-control" type="text">
                        </div>
                        <br/>
                        <div class="input-group">
                            <span class="input-group-btn"><button class="btn btn-primary" type="button">Total + Fee</button></span>

                            <input name="total_fee" class="form-control" type="text">
                        </div>
                        <br/>
                        <div align="center">
                            <input class="btn btn-md btn-primary" type="submit" value="Sell" />
                        </div>

                    </form>
                </fieldset>
            </div>
        </div>
        <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
            <div class="table-responsive">
                <table id="table" class="table table-striped table-bordered" cellspacing="0" width="100%">
                    <thead>
                    <tr>
                        <th>Time</th>
                        <th>Type</th>
                        <th>Price</th>
                        <th>Amount</th>

                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <th></th>
                        <th></th>
                        <th></th>
                        <th></th>
                    </tr>
                    </tbody>
                    <tfoot>
                    <tr>
                        <th>Time</th>
                        <th>Type</th>
                        <th>Price</th>
                        <th>Amount</th>
                    </tr>
                    </tfoot>
                </table>
            </div>
        </div>

    </div>
    <br/>
    <div class="row">
        <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
            <div class="table-responsive">
                <table id="table" class="table table-striped table-bordered" cellspacing="0" width="100%">
                    <thead>
                    <tr>
                        <th style="background-color: darkgoldenrod; color: white"  colspan="3"><h5 align="center"><b>Sell Order</b></h5></th>
                    </tr>
                    <tr>
                        <th>Price</th>
                        <th>PEP</th>
                        <th>XPEP</th>

                    </tr>
                    </thead>
                    <tbody>
                    <?php
                    foreach($trade as $exchange)
                    {
                        $amount = $exchange['amount'];
                        $price = $exchange['rate'];
                        $trade_id = $exchange['id'];


                            ?>
                            <tr onclick="calculate_price43<?php echo $trade_id; ?>()">
                                <th id="rate<?php echo $trade_id; ?>" ><?php echo $price ?></th>
                                <th id="currency<?php echo $trade_id; ?>"><?php echo $amount ?></th>
                                <th id="trade<?php echo $trade_id; ?>"><?php $exc = $price * $amount;
                                    echo $exc ?></th>
                            </tr>
                        <?php

                    }
                    ?>

                    </tbody>
                    <tfoot>
                    <tr>
                        <th>Price</th>
                        <th>PEP</th>
                        <th>XPEP</th>
                    </tr>
                    </tfoot>
                </table>
            </div>
        </div>
    </div>
</div>

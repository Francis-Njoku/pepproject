
    <div class="container-fluid">
        <div class="row">
            <?php
            foreach($retrieve_user as $user) {
                $phone = $user['phone'];
                $first_name = $user['first_name'];
                $last_name = $user['last_name'];
                $waves_add = $user['waves_address'];

            }
            foreach($retrieve_kyc as $kyc) {
                $picture = $kyc['picture'];
                $id_card = $kyc['idCard'];
                $status = $kyc['status'];
            }
                ?>

                <div class="col-md-12">
                    <marquee>

                        <?php
                        $link_text = site_url('/frontend/user_details');
                        $link_text2 = site_url('/frontend/user_payment');
                        $link_text3 = site_url('/frontend/capacity_building');

                        if($phone == NULL || $first_name == '' || $last_name == ''){
                            echo "<span> <a class='bg-primary' href='".$link_text."'>Profile is incomplete click to complete, click here</a>&emsp;</span>";
                        }

                        if($status == '0'){
                            echo "<span> <a class='bg-primary' href='".$link_text."'>KYC has not been approved, click to review</a>&emsp;</span>";
                        }

                        ?>
                    </marquee>
                </div>
            <?php

            if (isset($this->session->userdata['user_id'])) {
                $eMail = ($this->session->userdata['email']);
                $email = ($this->session->userdata['email']);
                $userName = ($this->session->userdata['user_id']);
                $user__id = ($this->session->userdata['user_id']);
            }

            ?>

        </div>

    </div>

    <div class="container-fluid">
    <!-- OVERVIEW -->
    <div class="panel panel-headline">
        <div class="panel-heading">
            <h3 class="panel-title">PEPCASH (XPEP)</h3>
            <p class="panel-subtitle"></p>
        </div>
        <div class="panel-body">
            <div class="row">
                <div class="col-md-4">
                    <div class="metric">
                        <span class="icon"><i class="fa fa-money"></i></span>
                        <p>
                            <span class="number"><?php $xpep_balance = $total_credit_xpep - $total_debit_xpep; echo number_format($xpep_balance, 4); ?></span>
                            <span class="title">XPEP Balance</span>
                        </p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="metric">
                        <span class="icon"><i class="fa fa-money"></i></span>
                        <p>
                            <span class="number"><?php if($total_credit_xpep == ''){echo 0;} else echo number_format($total_credit_xpep, 4); ?></span>
                            <span class="title">Total XPEP credit</span>
                        </p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="metric">
                        <span class="icon"><i class="fa fa-money"></i></span>
                        <p>
                            <span class="number"><?php if($total_debit_xpep == ''){echo 0;} else echo number_format($total_debit_xpep, 4); ?></span>
                            <span class="title">Total XPEP debit</span>
                        </p>
                    </div>
                </div>

            </div>

        </div>
    </div>
        <!-- Transaction -->
        <div class="row">

                <div class="dropdown col-md-4 col-sm-4 col-xs-4 ">

                    <button style="font-size: 18px; padding-bottom: 20px; padding-top: 20px" class="btn btn-primary btn-block dropdown-toggle" type="button" data-toggle="dropdown" data-hover="dropdown">
                        Deposit <span class="caret"></span>
                    </button>

                    <ul class="dropdown-menu btn btn-info">
                        <li>
                            <button type="button"  class="btn btn-info btn-lg btn-block" data-toggle="modal" data-target="#myModal"><b>From XCoinlive Wallet</b></button>
                        </li>
                        <li>
                            <button type="button"  class="btn btn-info btn-lg btn-block" data-toggle="modal" data-target="#myModal2"><b>From GoPEPcash Wallet</b></button>
                        </li>
                        <li>
                            <button type="button"  class="btn btn-info btn-lg btn-block" data-toggle="modal" data-target="#myModal3"><b>From Waves Wallet</b></button>
                        </li>

                    </ul>

            </div>
            <div class="col-md-4 col-sm-4 col-xs-4">
                <p align="center">

                    <button type="button" style="padding-bottom: 20px; padding-top: 20px"  class="btn btn-info btn-lg btn-block" data-toggle="modal" data-target="#myModal4">Withdraw</button>

                </p>
            </div>
            <div class="col-md-4 col-sm-4 col-xs-4">
                <p align="center">

                    <button type="button" style="padding-bottom: 20px; padding-top: 20px"  class="btn btn-info btn-lg btn-block" data-toggle="modal" data-target="#myModal5">Transfer</button>
                </p>
            </div>
        </div>
        <br/>

        <!-- Transaction summary-->

        <div class="row" style="background-color: white;">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="table-responsive">
                    <table id="table" class="table table-striped table-bordered" cellspacing="0" width="100%">
                        <thead>
                        <tr>
                            <th style="background-color: red; color: white"  colspan="6"><h4 align="center"><b>XPEP Transaction history</b></h4></th>
                        </tr>
                        <tr>
                            <th>Currency</th>
                            <th>Type</th>
                            <th>Amount</th>
                            <th>Wallet ID</th>
                            <th>Description</th>
                        </tr>
                        </thead>
                        <tbody>


                        <?php
                        foreach ($xpep_wallet as $details) {
                            $user_id = $details['user_id'];
                            $currency = $details['currency'];
                            $amount = $details['user_id'];
                            $wallet_id = $details['walletId'];
                            $description = $details['description'];
                            $type = $details['type'];

                            ?>
                            <tr>
                                <td><?php echo $currency; ?></td>
                                <td><?php echo ucfirst($type); ?></td>
                                <td><?php echo $amount; ?></td>
                                <td><?php echo $wallet_id; ?></td>
                                <td><?php echo $description; ?></td>
                            </tr>
                        <?php
                        }
                        ?>
                        </tbody>
                        <tfoot>
                        <tr>
                            <th>Currency</th>
                            <th>Type</th>
                            <th>Amount</th>
                            <th>Wallet ID</th>
                            <th>Description</th>
                        </tr>
                        </tfoot>
                    </table>
                </div>
            </div>

            <div class="col-lg-12 col-md-12 col-sm-12">
                <p align="center">
                    <a class="btn btn-lg btn-primary" href="<?php echo site_url('frontend/wallet') ?>"> See more</a>
                </p>
            </div>
        </div>

        <!-- End Transaction summary-->
        <!-- END transaction -->

        <!-- END OVERVIEW -->


    <!-- Modal start -->
    <div class="row">

        <div class="col-md-12">

            <!-- Modal -->
            <!-- Xcoinlive -->
            <div id="myModal" class="modal fade" role="dialog">
                <div class="modal-dialog">

                    <!-- Modal content-->
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                            <h4 class="modal-title">Deposit PEPCASH (XPEP) from XCoinlive</h4>
                        </div>
                        <div class="modal-body">
                            <?php
                            $bitcoin_value = 1;
                            ?>
                            <div class="row">
                                <div class="col-md-6 col-sm-6">
                                    <h4 style="color: goldenrod;">Deposit PEPCASH (XPEP) from XCoinlive</h4>
                                </div>
                                <div class="col-md-6 col-sm-6">
                                    <a rel='nofollow' href='#' border='0' style='cursor:default'><img src='https://chart.googleapis.com/chart?cht=qr&chl=admin@xcoinlive.com&chs=180x180&choe=UTF-8&chld=L|2' alt=''></a>
                                </div>
                                <div class="col-md-12 col-sm-12">
                                    <p align="center">XCoinlive address to deposit: <b>admin@xcoinlive.com</b></p>
                                </div>
                            </div>


                            <div class="form-style-5">
                                <fieldset>
                                    <form name="Payment" method="post" action="<?php echo site_url().'/frontend/fund_wallet/save_order2' ?>" >
                                        <input placeholder="currency" type="hidden" name="currency" value="xcoinlive" required/>
                                        <input placeholder="value" type="hidden" id="rate" name="value" value=" <?php echo $bitcoin_value; ?>" required/>
                                        <input placeholder="value" type="hidden" name="destination" value="XPEP" required/>

                                        <div class="row">
                                            <div class="col-md-6 col-sm-6">
                                                <input placeholder="Amount" id="from" onkeyup="calculate_price()" type="text" name="amount" required/>

                                            </div>
                                            <div class="col-md-6 col-sm-6">
                                                <input placeholder="Value in PEPCASH" id="to"  type="text" name="value_in_pep" readonly required/>
                                            </div>
                                        </div>
                                        <label for="ref">Reference/Deposit Details<textarea placeholder="" id="ref" rows="3" name="address"></textarea></label>
                                        <input type="submit" value="Deposit" />


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
            <!--End Xcoinlive -->

            <!-- Gopepcash -->
            <div id="myModal2" class="modal fade" role="dialog">
                <div class="modal-dialog">

                    <!-- Modal content-->
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                            <h4 class="modal-title">Deposit PEPCASH (XPEP) from GoPEPcash </h4>
                        </div>
                        <div class="modal-body">
                            <?php
                            $bitcoin_value = 1;
                            ?>
                            <div class="row">
                                <div class="col-md-6 col-sm-6">
                                    <h4 style="color: goldenrod;">Deposit PEPCASH (XPEP) from GoPEPcash</h4>

                                </div>
                                <div class="col-md-6 col-sm-6">
                                    <a rel='nofollow' href='#' border='0' style='cursor:default'><img src='https://chart.googleapis.com/chart?cht=qr&chl=admin@gopepcash.com&chs=180x180&choe=UTF-8&chld=L|2' alt=''></a>
                                </div>
                                <div class="col-md-12 col-sm-12">
                                    <p align="center">GoPEPcash account to deposit: <b>admin@gopepcash.com</b></p>
                                </div>

                            </div>


                            <div class="form-style-5">
                                <fieldset>
                                    <form name="Payment" method="post" action="<?php echo site_url().'/frontend/fund_wallet/save_order2' ?>" >
                                        <input placeholder="currency" type="hidden" name="currency" value="gopepcash" required/>
                                        <input placeholder="value" type="hidden" id="rate2" name="value" value=" <?php echo $bitcoin_value; ?>" required/>
                                        <input placeholder="value" type="hidden" name="destination" value="XPEP" required/>

                                        <div class="row">
                                            <div class="col-md-6 col-sm-6">
                                                <input placeholder="Amount" id="from2" onkeyup="calculate_price2()" type="text" name="amount" required/>

                                            </div>
                                            <div class="col-md-6 col-sm-6">
                                                <input placeholder="Value in PEPCASH" id="to2"  type="text" name="value_in_pep" readonly required/>
                                            </div>
                                        </div>

                                        <label for="ref">Reference/Deposit Details<textarea id="ref" rows="3" placeholder="" name="address"></textarea></label>
                                        <input type="submit" value="Deposit" />


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
            <!--End Gopepcash -->

            <!-- Waves -->
            <div id="myModal3" class="modal fade" role="dialog">
                <div class="modal-dialog">

                    <!-- Modal content-->
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                            <h4 class="modal-title">Deposit PEPCASH FROM WAVES Wallet</h4>
                        </div>
                        <div class="modal-body">
                            <?php
                            foreach($currency_waves as $currency)
                            {
                                $value = $currency['value'];
                            }

                            $currency_value = $value
                            ?>
                            <div class="row">
                                <div class="col-md-6 col-sm-6">
                                    <h5>Deposit PEPCASH (XPEP) from Waves</h5>
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
                                    <form name="Payment" method="post" action="<?php echo site_url().'/frontend/fund_wallet/save_order2' ?>" >
                                        <input placeholder="currency" type="hidden" name="currency" value="Waves" required/>
                                        <input placeholder="value" type="hidden" id="rate5" name="value" value=" <?php echo $currency_value; ?>" required/>
                                        <input placeholder="value" type="hidden" name="destination" value="XPEP" required/>

                                        <div class="row">
                                            <div class="col-md-6 col-sm-6">
                                                <input placeholder="Amount" id="from5" onkeyup="calculate_price5()" type="text" name="amount" required/>

                                            </div>
                                            <div class="col-md-6 col-sm-6">
                                                <input placeholder="Value in PEPCASH" id="to5"  type="text" name="value_in_pep" readonly required/>
                                            </div>
                                        </div>

                                        <label for="ref">Reference/Deposit Details<textarea id="ref" rows="3" name="address"></textarea></label>
                                        <input type="submit" value="Deposit" />


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

            <!-- Withdraw -->
            <div id="myModal4" class="modal fade" role="dialog">
                <div class="modal-dialog">

                    <!-- Modal content-->
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                            <h4 class="modal-title">Withdraw to Waves Wallet</h4>
                        </div>
                        <div class="modal-body">
                            <p align="center">Withdraw charge is 0.01% per withdraw</p>
                            <div class="form-style-5">
                                <fieldset>
                                    <legend align="center">Request Withdraw</legend>
                                    <form name="Payment" method="post" action="<?php echo site_url().'/frontend/withdraw/save_request' ?>" >
                                        <label for="userpay">Currency to withdraw<select id="userpay" class="form-control" name="currency1" required="required">
                                                <option value="XPEP">XPEP</option>
                                            </select></label>

                                        <input placeholder="Amount" type="text" name="amount" required/>
                                        <?php
                                        if ($waves_add != '')
                                        {
                                            echo '<p align="center">XPEP will be sent to this address: <b>'.$waves_add.'</b></p>';
                                        }
                                        else
                                        {
                                            echo '<a href="'.site_url('frontend/user_details').'"><b style="color: red;"> You don\'t have a Waves wallet address on file, </b><b style="color: green;">click here  to input your Waves address</b></a>';
                                        }
                                        ?>

                                        <label for="userpay2">Destination <select id="userpay2" class="form-control" name="currency2" required="required">

                                                <option value="WAVES">WAVES wallet</option>

                                            </select></label>
                                        <textarea name="comment" rows="3" placeholder="Comment"></textarea>
                                        <?php
                                        if ($waves_add != '')
                                        {
                                            echo ' <input type="submit" value="Withdraw" />';
                                        }
                                        else
                                        {
                                            echo '<div align="center"><button class="btn btn-lg btn-success" disabled value="withdraw">Withdraw</button></div>';
                                        }
                                        ?>



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
            <!--End Withdraw -->

            <!-- Transfer -->
            <div id="myModal5" class="modal fade" role="dialog">
                <div class="modal-dialog">

                    <!-- Modal content-->
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                            <h4 class="modal-title">Transfer to users</h4>
                        </div>
                        <div class="modal-body">
                            <p align="center">Transfer charge is 0.01% per transaction</p>
                            <div class="form-style-5">
                                <fieldset>
                                    <legend>Transfer</legend>
                                    <form name="Payment" method="post" action="<?php echo site_url().'/frontend/transfer/transfer' ?>" >

                                        <div class="col-lg-g col-md-6 col-sm-6 col-xs-6">
                                            <label for="user">Currency<select id="user" class="form-control" name="currency" required="required">
                                                    <option value="XPEP">XPEP</option>
                                                </select></label>
                                        </div>
                                        <div class="col-lg-g col-md-6 col-sm-6 col-xs-6">
                                            <label for="userpay">Transfer to:<select id="userpay" class="form-control" name="type" onchange="myFunction()" required="required">
                                                    <option value="">Select option</option>
                                                    <option value="pepproject">Pepproject.co user</option>
                                                    <option value="xcoinlive">Xcoinlive user</option>
                                                    <option value="gopepcash">GoPepcash user</option>
                                                </select></label>
                                        </div>
                                        <div class="col-lg-g col-md-6 col-sm-6 col-xs-6">
                                            <label for="ref"><textarea placeholder="Enter ID/Address" rows="1" name="address" required></textarea></label>

                                        </div>
                                        <div class="col-lg-g col-md-6 col-sm-6 col-xs-6">
                                            <input placeholder="Amount" type="text" name="amount" required/>

                                        </div>
                                        <input type="submit" value="Send" />


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
            <!--End Transfer -->

        </div>

    </div>
    <!--Modal ends-->


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

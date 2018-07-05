<?php
foreach($airdrop_details as $details)
{
    $total = $details['total'];
    $balance = $details['balance'];
}
?>

<div class="container-fluid">
<!-- OVERVIEW -->
<div class="panel panel-headline">
    <div class="panel-heading">
        <h3 class="panel-title">Airdrop in PEP</h3>
        <p class="panel-subtitle"></p>
    </div>
    <div class="panel-body">
        <div class="row">
            <div class="col-md-3 col-sm-3 col-xs-3">
                <div class="metric">
                    <span class="icon"><i class="fa fa-money"></i></span>
                    <p>
                        <span class="number"><?php echo number_format($total); ?></span>
                        <span class="title">Total Airdrop</span>
                    </p>
                </div>
            </div>
            <div class="col-md-3 col-sm-3">
                <div class="metric">
                    <span class="icon"><i class="fa fa-money"></i></span>
                    <p>
                        <span class="number"><?php echo number_format($balance); ?></span>
                        <span class="title">Total Distributed</span>
                    </p>
                </div>
            </div>
            <div class="col-md-3 col-sm-3">
                <div class="metric">
                    <span class="icon"><i class="fa fa-money"></i></span>
                    <p>
                        <span class="number"><?php $remain = $total - $balance; echo number_format($remain); ?></span>
                        <span class="title">Balance</span>
                    </p>
                </div>
            </div>
            <div class="col-md-3 col-sm-3 ">
                <div class="metric">
                    <span class="icon"><i class="fa fa-money"></i></span>
                    <p>
                        <span class="number"><?php echo number_format($airdrop_gained); ?></span>
                        <span class="title">My Earnings</span>
                    </p>
                </div>
            </div>

        </div>

    </div>
</div>
<!-- END OVERVIEW -->

<div class="row">
<div class="col-md-1"></div>
<div class="col-md-10">
<h2 align="center">Airdrop Activity - Claim your free coin now</h2>

<!-- start -->

<div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">

<div class="panel panel-default" >
    <div class="panel-heading" style="background-color: goldenrod" role="tab" id="headingOne">
        <h4 class="panel-title">

            <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                <i class="more-less glyphicon glyphicon-plus"></i>
                Join PepTribe

            </a>&emsp;&emsp;

            <a style="text-align: right;" href="https://peptribe.info" target="_blank"><img height="25" src="<?php echo base_url('assets/img/peptribe_logo.png')?>"></a>
            <span style="text-align: right;">
                <?php
                foreach ($peptribe_value as $pept)
                {
                    $value2 = $pept['amount'];
                }
                echo ' Earn <b>'.$value2.'</b> PEP';
                ?>

            <span>
        </h4>
    </div>
    <div id="collapseOne" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingOne">
        <div class=" capacity_accordion panel-body">

            <?php
            if($num_peptribe == 0)
            {
                ?>
                <form name="Payment" method="post" action="<?php echo site_url().'/frontend/airdrop/insert_airdrop' ?>" >

                    <div class="input-group">
                        <input type="hidden" name="id" value="1">

                        <input type="text" name="details"  class="form-control" placeholder="Peptribe user name">
                        <span class="input-group-btn"><button type="submit" class="btn btn-primary"><i class="fa fa-arrow-right"></i></button></span>
                        <div></div>
                    </div>


                </form>
            <?php
            }
            elseif($num_peptribe == 1)
            {
                foreach($get_peptribe as $peptribe)
                {
                    $details = $peptribe['details'];
                    $status = $peptribe['status'];
                }
                ?>
                <form name="Payment" method="post" action="<?php echo site_url().'/frontend/airdrop/update_airdrop' ?>" >


                    <div class="input-group">
                        <input type="hidden" name="id" value="1">
                        <input type="text" name="details" class="form-control" value="<?php echo $details; ?>" placeholder="Peptribe user name">
                        <?php
                        if($status == 0)
                        {
                            ?>
                            <span class="input-group-btn"><button type="submit" class="btn btn-primary"><i class="fa fa-arrow-right"></i></button></span>

                        <?php
                        }
                        else
                        {
                            echo '<span class="input-group-btn"><button type="button" class="btn btn-primary" disabled>Approved</button></span>';
                        }
                        ?>
                        <div></div>
                    </div>


                </form>
            <?php
            }
            ?>



        </div>
    </div>
</div>
<div class="panel panel-default">
    <div class="panel-heading" style="background-color: white" role="tab" id="headingTwo">
        <h4 class="panel-title" >
            <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
                <i class="more-less glyphicon glyphicon-plus"></i>
                Join Pepproject Telegram
            </a>&emsp;&emsp;

            <a style="text-align: right;" href="#" target="_blank"><img height="25" src="<?php echo base_url('assets/img/telegram_logo.png')?>"></a>
            &emsp;
<span style="text-align: right;">
                <?php
                foreach ($pep_telegram_value as $pept)
                {
                    $value2 = $pept['amount'];
                }
                echo ' Earn <b>'.$value2.'</b> PEP';
                ?>
    <span>
        </h4>
    </div>
    <div id="collapseTwo" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingTwo">
        <div class=" capacity_accordion panel-body">

            <?php
            if($num_peptribe_telegram == 0)
            {
                ?>
                <form name="Payment" method="post" action="<?php echo site_url().'/frontend/airdrop/insert_airdrop' ?>" >

                    <div class="input-group">
                        <input type="hidden" name="id" value="2">

                        <input type="text" name="details"  class="form-control" placeholder="Pepproject telegram ID">
                        <span class="input-group-btn"><button type="submit" class="btn btn-primary"><i class="fa fa-arrow-right"></i></button></span>
                        <div></div>
                    </div>


                </form>
            <?php
            }
            elseif($num_peptribe_telegram == 1)
            {
                foreach($get_peptribe_telegram as $peptribe)
                {
                    $details = $peptribe['details'];
                    $status = $peptribe['status'];
                }
                ?>
                <form name="Payment" method="post" action="<?php echo site_url().'/frontend/airdrop/update_airdrop' ?>" >


                    <div class="input-group">
                        <input type="hidden" name="id" value="2">
                        <input type="text" name="details" class="form-control" value="<?php echo $details; ?>" placeholder="Pepproject telegram id">
                        <?php
                        if($status == 0)
                        {
                            ?>
                            <span class="input-group-btn"><button type="submit" class="btn btn-primary"><i class="fa fa-arrow-right"></i></button></span>

                        <?php
                        }
                        else
                        {
                            echo '<span class="input-group-btn"><button type="button" class="btn btn-primary" disabled>Approved</button></span>';
                        }
                        ?>
                        <div></div>
                    </div>


                </form>
            <?php
            }
            ?>



        </div>
    </div>
</div>
<div class="panel panel-default" >
    <div class="panel-heading" style="background-color: goldenrod" role="tab" id="headingThree">
        <h4 class="panel-title">

            <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseThree" aria-expanded="true" aria-controls="collapseThree">
                <i class="more-less glyphicon glyphicon-plus"></i>
                Download Chatonx
            </a>&emsp;&emsp;

            <a style="text-align: right;" href="https://play.google.com/store/apps/details?id=com.chatonx.application" target="_blank">
                <img height="25" src="<?php echo base_url('assets/img/chatonx.png') ?>"/>
            </a>
            &emsp;
            <span style="text-align: right;">
                <?php
                foreach ($chatonx_value as $pept)
                {
                    $value2 = $pept['amount'];
                }
                echo ' Earn <b>'.$value2.'</b> PEP';
                ?>
                <span>

        </h4>
    </div>
    <div id="collapseThree" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingThree">
        <div class=" capacity_accordion panel-body">

            <?php
            if($num_chatonx == 0)
            {
                ?>
                <form name="Payment" method="post" action="<?php echo site_url().'/frontend/airdrop/insert_airdrop' ?>" >

                    <div class="input-group">
                        <input type="hidden" name="id" value="3">

                        <input type="text" name="details"  class="form-control" placeholder="Chatonx ID">
                        <span class="input-group-btn"><button type="submit" class="btn btn-primary"><i class="fa fa-arrow-right"></i></button></span>
                        <div></div>
                    </div>


                </form>
            <?php
            }
            elseif($num_chatonx == 1)
            {
                foreach($get_chatonx as $peptribe)
                {
                    $details = $peptribe['details'];
                    $status = $peptribe['status'];
                }
                ?>
                <form name="Payment" method="post" action="<?php echo site_url().'/frontend/airdrop/update_airdrop' ?>" >


                    <div class="input-group">
                        <input type="hidden" name="id" value="3">
                        <input type="text" name="details" class="form-control" value="<?php echo $details; ?>" placeholder="Chatonx ID">
                        <?php
                        if($status == 0)
                        {
                            ?>
                            <span class="input-group-btn"><button type="submit" class="btn btn-primary"><i class="fa fa-arrow-right"></i></button></span>

                        <?php
                        }
                        else
                        {
                            echo '<span class="input-group-btn"><button type="button" class="btn btn-primary" disabled>Approved</button></span>';
                        }
                        ?>
                        <div></div>
                    </div>


                </form>
            <?php
            }
            ?>
        </div>
    </div>
</div>
<div class="panel panel-default">
    <div class="panel-heading" style="background-color: white" role="tab" id="headingFour">
        <h4 class="panel-title">
            <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseFour" aria-expanded="true" aria-controls="collapseFour">
                <i class="more-less glyphicon glyphicon-plus"></i>
                Pepproject Tv on Youtube
            </a>
            &emsp;&emsp;

            <a style="text-align: right;" href="" target="_blank"><i style="color: red; font-size: 25px;" class="fa fa-youtube"></i></a>
            &emsp;
            <span style="text-align: right;">
                <?php
                foreach ($pep_tribetv_value as $pept)
                {
                    $value2 = $pept['amount'];
                }
                echo ' Earn <b>'.$value2.'</b> PEP';
                ?>
                <span>
        </h4>
    </div>
    <div id="collapseFour" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingFour">
        <div class=" capacity_accordion panel-body">

            <?php
            if($num_peptribe_tv == 0)
            {
                ?>
                <form name="Payment" method="post" action="<?php echo site_url().'/frontend/airdrop/insert_airdrop' ?>" >

                    <div class="input-group">
                        <input type="hidden" name="id" value="4">

                        <input type="text" name="details"  class="form-control" placeholder="User ID">
                        <span class="input-group-btn"><button type="submit" class="btn btn-primary"><i class="fa fa-arrow-right"></i></button></span>
                        <div></div>
                    </div>


                </form>
            <?php
            }
            elseif($num_peptribe_tv == 1)
            {
                foreach($get_peptribe_tv as $peptribe)
                {
                    $details = $peptribe['details'];
                    $status = $peptribe['status'];
                }
                ?>
                <form name="Payment" method="post" action="<?php echo site_url().'/frontend/airdrop/update_airdrop' ?>" >


                    <div class="input-group">
                        <input type="hidden" name="id" value="4">
                        <input type="text" name="details" class="form-control" value="<?php echo $details; ?>" placeholder="User ID">
                        <?php
                        if($status == 0)
                        {
                            ?>
                            <span class="input-group-btn"><button type="submit" class="btn btn-primary"><i class="fa fa-arrow-right"></i></button></span>

                        <?php
                        }
                        else
                        {
                            echo '<span class="input-group-btn"><button type="button" class="btn btn-primary" disabled>Approved</button></span>';
                        }
                        ?>
                        <div></div>
                    </div>


                </form>
            <?php
            }
            ?>



        </div>
    </div>
</div>
<div class="panel panel-default" >
    <div class="panel-heading" style="background-color: goldenrod" role="tab" id="headingFive">
        <h4 class="panel-title">
            <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseFive" aria-expanded="true" aria-controls="collapseFive">
                <i class="more-less glyphicon glyphicon-plus"></i>
                Follow Pep on Facebook and Twitter

            </a>
            &emsp;&emsp;

            <a style="text-align: right;" href="https://www.facebook.com/Pep-Project-1808089299491818/" target="_blank"><i style="color: blue; font-size: 25px;" class="fa fa-facebook"></i></a>
            &emsp;&emsp;

            <a style="text-align: right;" href="https://twitter.com/PepProject_co" target="_blank"><i style="color: lightblue; font-size: 25px;" class="fa fa-twitter"></i></a>
            &emsp;
            <span style="text-align: right;">
                <?php
                foreach ($facebook_value as $pept)
                {
                    $value2 = $pept['amount'];
                }
                echo ' Earn <b>'.$value2.'</b> PEP';
                ?>
                <span>
        </h4>
    </div>
    <div id="collapseFive" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingFive">
        <div class=" capacity_accordion panel-body">

            <?php
            if($num_peptribe_facebook == 0)
            {
                ?>
                <form name="Payment" method="post" action="<?php echo site_url().'/frontend/airdrop/insert_airdrop' ?>" >

                    <div class="input-group">
                        <input type="hidden" name="id" value="5">

                        <input type="text" name="details"  class="form-control" placeholder="Facebook, Twitter">
                        <span class="input-group-btn"><button type="submit" class="btn btn-primary"><i class="fa fa-arrow-right"></i></button></span>
                        <div></div>
                    </div>


                </form>
            <?php
            }
            elseif($num_peptribe_facebook == 1)
            {
                foreach($get_peptribe_facebook as $peptribe)
                {
                    $details = $peptribe['details'];
                    $status = $peptribe['status'];
                }
                ?>
                <form name="Payment" method="post" action="<?php echo site_url().'/frontend/airdrop/update_airdrop' ?>" >


                    <div class="input-group">
                        <input type="hidden" name="id" value="5">
                        <input type="text" name="details" class="form-control" value="<?php echo $details; ?>" placeholder="Facebook, Twitter">
                        <?php
                        if($status == 0)
                        {
                            ?>
                            <span class="input-group-btn"><button type="submit" class="btn btn-primary"><i class="fa fa-arrow-right"></i></button></span>

                        <?php
                        }
                        else
                        {
                            echo '<span class="input-group-btn"><button type="button" class="btn btn-primary" disabled>Approved</button></span>';
                        }
                        ?>
                        <div></div>
                    </div>


                </form>
            <?php
            }
            ?>



        </div>
    </div>
</div>
<div class="panel panel-default">
    <div class="panel-heading" style="background-color: white" role="tab" id="headingSix">
        <h4 class="panel-title">
            <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseSix" aria-expanded="true" aria-controls="collapseSix">
                <i class="more-less glyphicon glyphicon-plus"></i>
                Download MarketXR
            </a>
            &emsp;&emsp;

            <a style="text-align: right;" href="https://marketxr.net" target="_blank">
                <img height="25" src="<?php echo base_url('assets/img/marketxr_logo.png') ?>"/>
            </a>
            &emsp;
            <span style="text-align: right;">
                <?php
                foreach ($marketxr_value as $pept)
                {
                    $value2 = $pept['amount'];
                }
                echo ' Earn <b>'.$value2.'</b> PEP';
                ?>
                <span>
        </h4>
    </div>
    <div id="collapseSix" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingSix">
        <div class=" capacity_accordion panel-body">

            <?php
            if($num_peptribe_marketxr == 0)
            {
                ?>
                <form name="Payment" method="post" action="<?php echo site_url().'/frontend/airdrop/insert_airdrop' ?>" >

                    <div class="input-group">
                        <input type="hidden" name="id" value="7">

                        <input type="text" name="details"  class="form-control" placeholder="Marketxr username">
                        <span class="input-group-btn"><button type="submit" class="btn btn-primary"><i class="fa fa-arrow-right"></i></button></span>
                        <div></div>
                    </div>


                </form>
            <?php
            }
            elseif($num_peptribe_marketxr == 1)
            {
                foreach($get_peptribe_marketxr as $peptribe)
                {
                    $details = $peptribe['details'];
                    $status = $peptribe['status'];
                }
                ?>
                <form name="Payment" method="post" action="<?php echo site_url().'/frontend/airdrop/update_airdrop' ?>" >


                    <div class="input-group">
                        <input type="hidden" name="id" value="7">
                        <input type="text" name="details" class="form-control" value="<?php echo $details; ?>" placeholder="Marketxr username">
                        <?php
                        if($status == 0)
                        {
                            ?>
                            <span class="input-group-btn"><button type="submit" class="btn btn-primary"><i class="fa fa-arrow-right"></i></button></span>

                        <?php
                        }
                        else
                        {
                            echo '<span class="input-group-btn"><button type="button" class="btn btn-primary" disabled>Approved</button></span>';
                        }
                        ?>
                        <div></div>
                    </div>
                </form>
            <?php
            }
            ?>
        </div>
    </div>
</div>
<div class="panel panel-default" >
    <div class="panel-heading" style="background-color: goldenrod" role="tab" id="headingNine">
        <h4 class="panel-title">

            <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseNine" aria-expanded="true" aria-controls="collapseNine">
                <i class="more-less glyphicon glyphicon-plus"></i>
                Join Pepproject Whatsapp
            </a>&emsp;&emsp;

            <a style="text-align: right;" href="https://chat.whatsapp.com/69GrLpXLA2V0BxOOB8cNg9" target="_blank"><i style="color: green; font-size: 25px;" class="fa fa-whatsapp"></i></a>
            &emsp;
            <span style="text-align: right;">
                <?php
                foreach ($pep_whatsapp_value as $pept)
                {
                    $value2 = $pept['amount'];
                }
                echo ' Earn <b>'.$value2.'</b> PEP';
                ?>
                <span>

        </h4>
    </div>
    <div id="collapseNine" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingNine">
        <div class=" capacity_accordion panel-body">

            <?php
            if($num_peptribe_whatsapp == 0)
            {
                ?>
                <form name="Payment" method="post" action="<?php echo site_url().'/frontend/airdrop/insert_airdrop' ?>" >

                    <div class="input-group">
                        <input type="hidden" name="id" value="3">

                        <input type="text" name="details"  class="form-control" placeholder="Pepproject whatsapp number">
                        <span class="input-group-btn"><button type="submit" class="btn btn-primary"><i class="fa fa-arrow-right"></i></button></span>
                        <div></div>
                    </div>


                </form>
            <?php
            }
            elseif($num_peptribe_whatsapp == 1)
            {
                foreach($get_peptribe_whatsapp as $peptribe)
                {
                    $details = $peptribe['details'];
                    $status = $peptribe['status'];
                }
                ?>
                <form name="Payment" method="post" action="<?php echo site_url().'/frontend/airdrop/update_airdrop' ?>" >


                    <div class="input-group">
                        <input type="hidden" name="id" value="3">
                        <input type="text" name="details" class="form-control" value="<?php echo $details; ?>" placeholder="Pepproject whatsapp number">
                        <?php
                        if($status == 0)
                        {
                            ?>
                            <span class="input-group-btn"><button type="submit" class="btn btn-primary"><i class="fa fa-arrow-right"></i></button></span>

                        <?php
                        }
                        else
                        {
                            echo '<span class="input-group-btn"><button type="button" class="btn btn-primary" disabled>Approved</button></span>';
                        }
                        ?>
                        <div></div>
                    </div>


                </form>
            <?php
            }
            ?>
        </div>
    </div>
</div>

<div class="panel panel-default">
    <div class="panel-heading" style="background-color: white" role="tab" id="headingEight">
        <h4 class="panel-title">
            <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseEight" aria-expanded="true" aria-controls="collapseEight">
                <i class="more-less glyphicon glyphicon-plus"></i>
                Invite 5 Friends via SMS
            </a>
            &emsp;
            <span style="text-align: right;">
                <?php
                foreach ($sms_value as $pept)
                {
                    $value2 = $pept['amount'];
                }
                echo ' Earn <b>'.$value2.'</b> PEP';
                ?>
                <span>
        </h4>
    </div>
    <div id="collapseEight" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingEight">
        <div class=" capacity_accordion panel-body">

            <?php
            if($num_sms == 0)
            {
                ?>
                <form name="Payment" method="post" action="<?php echo site_url().'/frontend/airdrop/insert_airdrop' ?>" >

                    <div class="input-group">
                        <input type="hidden" name="id" value="9">

                        <input type="text" name="details"  class="form-control" placeholder="Number1, Number2, Number3, Number4, Number5">
                        <span class="input-group-btn"><button type="submit" class="btn btn-primary"><i class="fa fa-arrow-right"></i></button></span>
                        <div></div>
                    </div>
                </form>
            <?php
            }
            elseif($num_sms == 1)
            {
                foreach($get_sms as $peptribe)
                {
                    $details = $peptribe['details'];
                    $status = $peptribe['status'];
                }
                ?>
                <form name="Payment" method="post" action="<?php echo site_url().'/frontend/airdrop/update_airdrop' ?>" >


                    <div class="input-group">
                        <input type="hidden" name="id" value="9">
                        <input type="text" name="details" class="form-control" value="<?php echo $details; ?>" placeholder="Number1, Number2, Number3, Number4, Number5">
                        <?php
                        if($status == 0)
                        {
                            ?>
                            <span class="input-group-btn"><button type="submit" class="btn btn-primary"><i class="fa fa-arrow-right"></i></button></span>

                        <?php
                        }
                        else
                        {
                            echo '<span class="input-group-btn"><button type="button" class="btn btn-primary" disabled>Approved</button></span>';
                        }
                        ?>
                        <div></div>
                    </div>
                </form>
            <?php
            }
            ?>
        </div>
    </div>
</div>
<div class="panel panel-default" >
    <div class="panel-heading" style="background-color: goldenrod" role="tab" id="headingSeven">
        <h4 class="panel-title">
            <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseSeven" aria-expanded="true" aria-controls="collapseSeven">
                <i class="more-less glyphicon glyphicon-plus"></i>
                Invite Friends via Email

            </a>
            &emsp;
            <span style="text-align: right;">
                <?php
                foreach ($email_value as $pept)
                {
                    $value2 = $pept['amount'];
                }
                echo ' Earn <b>'.$value2.'</b> PEP';
                ?>
                <span>
        </h4>
    </div>
    <div id="collapseSeven" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingSeven">
        <div class=" capacity_accordion panel-body">

            <?php
            if($num_email == 0)
            {
                ?>
                <form name="Payment" method="post" action="<?php echo site_url().'/frontend/airdrop/insert_airdrop' ?>" >

                    <div class="input-group">
                        <input type="hidden" name="id" value="8">

                        <input type="text" name="details"  class="form-control" placeholder="Address1, address2, .....">
                        <span class="input-group-btn"><button type="submit" class="btn btn-primary"><i class="fa fa-arrow-right"></i></button></span>
                        <div></div>
                    </div>


                </form>
            <?php
            }
            elseif($num_email == 1)
            {
                foreach($get_email as $peptribe)
                {
                    $details = $peptribe['details'];
                    $status = $peptribe['status'];
                }
                ?>
                <form name="Payment" method="post" action="<?php echo site_url().'/frontend/airdrop/update_airdrop' ?>" >


                    <div class="input-group">
                        <input type="hidden" name="id" value="8">
                        <input type="text" name="details" class="form-control" value="<?php echo $details; ?>" placeholder="Address1, address2, .....">
                        <?php
                        if($status == 0)
                        {
                            ?>
                            <span class="input-group-btn"><button type="submit" class="btn btn-primary"><i class="fa fa-arrow-right"></i></button></span>

                        <?php
                        }
                        else
                        {
                            echo '<span class="input-group-btn"><button type="button" class="btn btn-primary" disabled>Approved</button></span>';
                        }
                        ?>
                        <div></div>
                    </div>
                </form>
            <?php
            }
            ?>
        </div>
    </div>
</div>


</div><!-- panel-group -->
<!-- stop -->

<div class="col-md-1"></div>
</div>
</div>
</div>
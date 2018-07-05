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
        <p>Current withdraw charge is 0.01% per withdraw</p>
        </div>
        <div class="col-lg-3 col-md-3 col-sm-3">
        </div>
    </div>
    <div class="row">
        <div class="col-md-3 col-lg-3 col-sm-3"></div>
        <div class="col-md-6 col-lg-6 col-sm-6">
            <div class="form-style-5">
            <fieldset>
                <legend align="center">Request Withdraw</legend>
                <form name="Payment" method="post" action="<?php echo site_url().'/frontend/withdraw/save_request' ?>" >
                    <label for="userpay">Account to withdraw<select id="userpay" class="form-control" name="currency1" required="required">
                            <option value="">Select</option>
                            <option value="PEP">PEP</option>
                            <option value="XPEP">XPEP</option>
                             </select></label>
                    <input placeholder="Amount" type="text" name="amount" required/>
                    <?php
                    if ($waves != '')
                    {
                        echo '<b>'.$waves.'</b>';
                    }
                    else
                    {
                        echo '<a href="'.site_url('frontend/user_details').'"><b style="color: red;"> You don\'t have a Waves address, click here to input your Waves address</b></a>';
                    }
                    ?>

                    <label for="userpay2">Destination <select id="userpay2" class="form-control" name="currency2" required="required">

                            <option value="WAVES">WAVES wallet</option>


                        </select></label>
                    <?php
                    if ($waves != '')
                    {
                        echo ' <input type="submit" value="Withdraw" />';
                    }
                    else
                    {
                        echo '<button disabled value="withdraw">Withdraw</button>';
                    }
                    ?>



                </form>
            </fieldset>
                </div>
        </div>
        <div class="col-md-3 col-lg-3 col-sm-3">

        </div>
    </div>
</div>
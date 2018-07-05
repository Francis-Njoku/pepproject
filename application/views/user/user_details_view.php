<?php
foreach($view_data as $user):
$id = $user['id'];
$first_name = $user['first_name'];
$last_name = $user['last_name'];
$email = $user['email'];
$phone_number = $user['phone'];
    $referral_id = $user['referral_id'];
    $pep_wallet_address = $user['pep_wallet_address'];
    $xpep_wallet_address = $user['xpep_wallet_address'];
    $bitcoin_address = $user['bitcoin_address'];
    $bitcash_address = $user['bitcash_address'];
    $steem_address = $user['steem_address'];
    $litcoin_address = $user['litcoin_address'];
    $waves_address = $user['waves_address'];
    $ethereum_address = $user['ethereum_address'];
    $profile = 'user.png';
    $idcard2 = 'cert2b.png';
endforeach;

foreach($view_kyc as $kyc):
    $id_card = $kyc['idCard'];
    $picture = $kyc['picture'];
    $status = $kyc['status'];
    $updated = $kyc['updated'];
    $address = $kyc['address'];
endforeach;
?>

<div class="container-fluid">
<div class="panel panel-profile">
<div class="clearfix">
<!-- LEFT COLUMN -->
<div class="profile-left">
    <!-- PROFILE HEADER -->
    <div class="profile-header">
        <div class="overlay"></div>
        <div class="profile-main">
            <img src="<?php
            if($picture == NULL)
            {
                echo base_url('').$profile;
            }
            else
            {
                echo  base_url('').$picture;
            }
            ?>" class="avatar" alt="Avatar">
            <!-- Edit profile picture -->
            <form name="User image" enctype="multipart/form-data" method="post" action="<?php echo site_url().'/frontend/user_details/update_image' ?>" >
                <div align="center" class="form-group">
                    <p class="text-danger" style="font-size: 10px;">**image should not be more than 200px**</p>
                </div>
                <div class="form-group">
                    <div class="row">
                        <div class="col-md-6 col-sm-6 col-xm-6">

                            <div style=" position: relative; overflow: hidden;" class=" btn-sm btn btn-danger">
                                <span style="font-size: 14px;">Change Photo</span>
                                <input style="position: absolute; top: 0; right: 0; margin: 0; padding: 0; font-size: 16px; cursor: pointer; opacity: 0; filter: alpha(opacity=0);" type="file" class="upload" required="required" name="picture" />
                            </div>
                        </div>
                        <div class="col-md-6  col-sm-6 col-xm-6">
                            <button type="submit" class="btn btn-primary btn-sm"><span class="glyphicon glyphicon-off"></span> Update photo</button>

                        </div>
                    </div>
                </div>


            </form>

            <h3 class="name"><?php echo ucfirst($first_name).' '.ucfirst($last_name); ?></h3>
            <span class="online-status status-available">Available</span>
        </div>
        <div class="profile-stat">
            <div class="row">
                <div class="col-md-12 stat-item">
                    <?php echo $user_closure; ?>
                    <span>Number of referrals</span>
                </div>
            </div>
        </div>
    </div>
    <!-- END PROFILE HEADER -->
    <!-- PROFILE DETAIL -->
    <div class="profile-detail">
        <div class="profile-info">
            <h4 class="heading">Basic Info</h4>
            <ul class="list-unstyled list-justify">
                 <li>Phone number <span>
                        <form action="<?php echo site_url().'/frontend/user_details/update' ?>" method="post">
                            <input class="form-control" type="text" width="13" maxlength="13" name="phone" value="<?php echo $phone_number; ?>">
                           <br/><button type="submit" class="btn btn-info btn-fill btn-xs">Update number</button>

                        </form></span></li>
            </ul>
        </div>

            </div>
    <div class="col-md-12">

            <h4 align="center" class="heading">KYC Document Upload</h4>

        <form name="User image" enctype="multipart/form-data" method="post" action="<?php echo site_url().'/frontend/user_details/update_id_card' ?>" >
            <div align="center" class="form-group">
                <p class="text-danger" style="font-size: 10px;">**image should not be more than 200px**</p>
            </div>
            <div class="form-group">
                <div class="row">
                    <div class="col-md-3 col-sm-3 col-xm-3">
                        <?php
                        if($id_card == NULL)
                        {
                            $real_id = $idcard2;
                        }
                        else
                        {
                            $real_id = $id_card;
                        }
                        ?>
                        <a href="<?php echo base_url('').$real_id; ?>" target="_blank">
                            <img src="<?php

                            echo base_url('').$real_id;
                            ?>" class="img-responsive" alt="Avatar">
                        </a>
                    </div>
                    <div class="col-md-4 col-sm-4 col-xm-4">

                        <div style=" position: relative; overflow: hidden;" class=" btn-sm btn btn-danger">
                            <span style="font-size: 12px;">Change ID card</span>
                            <input style="position: absolute; top: 0; right: 0; margin: 0; padding: 0; font-size: 12px; cursor: pointer; opacity: 0; filter: alpha(opacity=0);" type="file" class="upload" required="required" name="id_card" />
                        </div>
                    </div>
                    <div class="col-md-5  col-sm-5 col-xm-5">
                        <button type="submit" class="btn btn-success btn-sm" <?php if($status == 1){echo 'disabled';} ?>><span class="glyphicon glyphicon-off"></span> Update ID Card</button>

                    </div>
                </div>
            </div>
        </form>
        <!-- update address-->
        <form name="User image" enctype="multipart/form-data" method="post" action="<?php echo site_url().'/frontend/user_details/update_address' ?>" >

            <div class="form-group">
                <div class="row">
                    <div class="col-md-3 col-sm-3 col-xm-3">
                        <?php
                        if($address == NULL)
                        {
                            $real_id = $idcard2;
                        }
                        else
                        {
                            $real_id = $address;
                        }
                        ?>
                        <a href="<?php echo base_url('').$real_id; ?>" target="_blank">
                            <img src="<?php

                            echo base_url('').$real_id;
                            ?>" class="img-responsive" alt="Avatar">
                        </a>
                    </div>
                    <div class="col-md-4 col-sm-4 col-xm-4">

                        <div style=" position: relative; overflow: hidden;" class=" btn-sm btn btn-danger">
                            <span style="font-size: 12px;">Change Address</span>
                            <input style="position: absolute; top: 0; right: 0; margin: 0; padding: 0; font-size: 12px; cursor: pointer; opacity: 0; filter: alpha(opacity=0);" type="file" class="upload" required="required" name="address" />
                        </div>
                    </div>
                    <div class="col-md-5  col-sm-5 col-xm-5">
                        <button type="submit"  class="btn btn-success btn-sm" <?php if($status == 1){echo 'disabled';} ?>><span class="glyphicon glyphicon-off"></span> Update Address</button>

                    </div>
                </div>
            </div>
        </form>

        <?php
        if($status == 0)
        {
            echo '<b style="color: red">KYC has not been approved, kindly update</b>';
        }
        else{
            echo '<b style="color: green">Congratulation! KYC has been approved</b>';
        }
        ?>
    </div>


    <!-- END PROFILE DETAIL -->
</div>
<!-- END LEFT COLUMN -->
<!-- RIGHT COLUMN -->
<div class="profile-right">
    <h4 class="heading">Account details</h4>
    <!-- AWARDS -->
    <div class="awards">
        <div class="row">
            <div class="col-md-4 col-sm-4">
                <p align="left">PEP wallet address:</p>
            </div>
            <div class="col-md-8 col-sm-8">
               <p align="left" style="color: blue;"> <?php echo $pep_wallet_address ?></p>
            </div>
            <br/>
            <hr/>
            <div class="col-md-4 col-sm-4">
                <p align="left">XPEP wallet address:</p>
            </div>
            <div class="col-md-8 col-sm-8">
                <p align="left" style="color: blue;"><?php echo $xpep_wallet_address ?></p>
            </div>
            <br/>
            <hr/>
            <div class="col-md-4 col-sm-4">
                <p align="left">Referral link:</p>
            </div>
            <div class="col-md-8 col-sm-8">
                <a style="text-align: left; color: green;" target="_blank" href="<?php echo site_url(''.$referral_id) ?>"><?php echo site_url(''.$referral_id) ?></a>

            </div>
            <br/>
            <hr/>

        </div>
        <div class="row">
            <div class="col-md-12 col-sm-12">
                <div class="profile-info">
                    <h4 class="heading" align="center">Share your referral link</h4><br/>
                    <ul class="list-inline social-icons">
                        <li><a target="_blank" href="http://www.facebook.com/sharer.php?u=<?php echo site_url(''.$referral_id) ?>" class="facebook-bg"><i class="fa fa-facebook"></i></a></li>
                        <li><a href="https://twitter.com/share?url=<?php echo site_url(''.$referral_id) ?>" target="_blank" class="twitter-bg"><i class="fa fa-twitter"></i></a></li>
                        <li><a href="https://plus.google.com/share?url=<?php echo site_url(''.$referral_id) ?>" target="_blank" class="google-plus-bg"><i class="fa fa-google-plus"></i></a></li>
                        <li><a href="http://www.linkedin.com/shareArticle?mini=true&amp;url=<?php echo site_url(''.$referral_id) ?>" target="_blank" class="github-bg"><i class="fa fa-linkedin"></i></a></li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12 col-sm-12">
            <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">

            <div class="panel panel-default" >
                <div class="panel-heading" style="background-color: goldenrod" role="tab" id="headingOne">
                    <h4 class="panel-title">
                        <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                            <i class="more-less glyphicon glyphicon-plus"></i>
                            Bitcoin wallet address

                        </a>
                    </h4>
                </div>
                <div id="collapseOne" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingOne">
                    <div class=" capacity_accordion panel-body">
                            <form name="Payment" method="post" action="<?php echo site_url().'/frontend/user_details/update_wallet' ?>" >

                                <div class="input-group">
                                    <input type="hidden" name="id" value="bitcoin_address">

                                    <input type="text" name="details" value="<?php echo $bitcoin_address ?>"  class="form-control" placeholder="Bitcoin wallet address 1">
                                    <span class="input-group-btn"><button type="submit" class="btn btn-primary"><i class="fa fa-arrow-right"></i></button></span>
                                    <div></div>
                                </div>

                            </form>
                    </div>
                </div>
            </div>
            <div class="panel panel-default">
                <div class="panel-heading" style="background-color: white" role="tab" id="headingTwo">
                    <h4 class="panel-title">
                        <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
                            <i class="more-less glyphicon glyphicon-plus"></i>
                            Bitcash wallet address
                        </a>
                    </h4>
                </div>
                <div id="collapseTwo" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingTwo">
                    <div class=" capacity_accordion panel-body">
                        <form name="Payment" method="post" action="<?php echo site_url().'/frontend/user_details/update_wallet' ?>" >

                            <div class="input-group">
                                <input type="hidden" name="id" value="bitcash_address">

                                <input type="text" name="details" value="<?php echo $bitcash_address ?>"  class="form-control" placeholder="Bitcash wallet address 1">
                                <span class="input-group-btn"><button type="submit" class="btn btn-primary"><i class="fa fa-arrow-right"></i></button></span>
                                <div></div>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
                <div class="panel panel-default" >
                    <div class="panel-heading" style="background-color: goldenrod" role="tab" id="headingThree">
                        <h4 class="panel-title">
                            <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseThree" aria-expanded="true" aria-controls="collapseThree">
                                <i class="more-less glyphicon glyphicon-plus"></i>
                                Ethereum wallet address

                            </a>
                        </h4>
                    </div>
                    <div id="collapseThree" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingThree">
                        <div class=" capacity_accordion panel-body">
                            <form name="Payment" method="post" action="<?php echo site_url().'/frontend/user_details/update_wallet' ?>" >

                                <div class="input-group">
                                    <input type="hidden" name="id" value="ethereum_address">

                                    <input type="text" name="details" value="<?php echo $ethereum_address ?>"  class="form-control" placeholder="Ethereum wallet address 1">
                                    <span class="input-group-btn"><button type="submit" class="btn btn-primary"><i class="fa fa-arrow-right"></i></button></span>
                                    <div></div>
                                </div>

                            </form>
                        </div>
                    </div>
                </div>
                <div class="panel panel-default">
                    <div class="panel-heading" style="background-color: white" role="tab" id="headingFour">
                        <h4 class="panel-title">
                            <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseFour" aria-expanded="true" aria-controls="collapseFour">
                                <i class="more-less glyphicon glyphicon-plus"></i>
                                Litcoin wallet address
                            </a>
                        </h4>
                    </div>
                    <div id="collapseFour" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingFour">
                        <div class=" capacity_accordion panel-body">
                            <form name="Payment" method="post" action="<?php echo site_url().'/frontend/user_details/update_wallet' ?>" >

                                <div class="input-group">
                                    <input type="hidden" name="id" value="litcoin_address">

                                    <input type="text" name="details" value="<?php echo $litcoin_address ?>"  class="form-control" placeholder="Litcoin wallet address">
                                    <span class="input-group-btn"><button type="submit" class="btn btn-primary"><i class="fa fa-arrow-right"></i></button></span>
                                    <div></div>
                                </div>

                            </form>
                        </div>
                    </div>
                </div>
                <div class="panel panel-default" >
                    <div class="panel-heading" style="background-color: goldenrod" role="tab" id="headingFive">
                        <h4 class="panel-title">
                            <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseFive" aria-expanded="true" aria-controls="collapseFive">
                                <i class="more-less glyphicon glyphicon-plus"></i>
                                STEEM wallet address

                            </a>
                        </h4>
                    </div>
                    <div id="collapseFive" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingFive">
                        <div class=" capacity_accordion panel-body">
                            <form name="Payment" method="post" action="<?php echo site_url().'/frontend/user_details/update_wallet' ?>" >

                                <div class="input-group">
                                    <input type="hidden" name="id" value="steem_address">

                                    <input type="text" name="details" value="<?php echo $bitcoin_address ?>"  class="form-control" placeholder="STEEM wallet address">
                                    <span class="input-group-btn"><button type="submit" class="btn btn-primary"><i class="fa fa-arrow-right"></i></button></span>
                                    <div></div>
                                </div>

                            </form>
                        </div>
                    </div>
                </div>
                <div class="panel panel-default">
                    <div class="panel-heading" style="background-color: white" role="tab" id="headingSix">
                        <h4 class="panel-title">
                            <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseSix" aria-expanded="true" aria-controls="collapseSix">
                                <i class="more-less glyphicon glyphicon-plus"></i>
                                WAVES wallet address
                            </a>
                        </h4>
                    </div>
                    <div id="collapseSix" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingSix">
                        <div class=" capacity_accordion panel-body">
                            <form name="Payment" method="post" action="<?php echo site_url().'/frontend/user_details/update_wallet' ?>" >

                                <div class="input-group">
                                    <input type="hidden" name="id" value="waves_address">

                                    <input type="text" name="details" value="<?php echo $waves_address ?>"  class="form-control" placeholder="WAVES wallet address">
                                    <span class="input-group-btn"><button type="submit" class="btn btn-primary"><i class="fa fa-arrow-right"></i></button></span>
                                    <div></div>
                                </div>

                            </form>
                        </div>
                    </div>
                </div>

            </div><!-- panel-group -->

            </div>

        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="profile-info">
                </div>
                    <div class="table-responsive">
                        <table id="table" class="table table-striped table-bordered" cellspacing="0" width="100%">
                            <thead>
                            <tr>
                                <th style="background-color: darkgoldenrod;"  colspan="6"><h4 align="center" style="color: white;"><b>Referrals</b></h4></th>
                            </tr>
                            <tr>
                                <th>First name</th>
                                <th>Last name</th>
                                <th>Level</th>
                            </tr>
                            </thead>
                            <tbody>
                    <?php
                    foreach($closure_details as $closure)
                    {
                        $descendant = $closure['descendant'];
                        $lvl = $closure['lvl'];

                        $this->db->select('*');
                        $this->db->from('users');
                        $this->db->where('id',$descendant);
                        $query = $this->db->get();

                        $result = $query->result_array();

                        foreach($result as $name)
                        {
                            $c_first_name = $name['first_name'];
                            $c_last_name = $name['last_name'];
                        }

                        ?>
                        <tr>
                            <td align="left"><?php echo ucfirst($c_first_name); ?></td>
                            <td align="left"><?php echo ucfirst($c_last_name); ?></td>
                            <td align="left"><?php echo $lvl; ?></td>
                            </tr>
                    <?php
                    }
                    ?>
                            </tbody>
                            <tfoot>
                            <tr>
                                <th>First name</th>
                                <th>Last name</th>
                                <th>Level</th>
                            </tr>
                            </tfoot>
                        </table>
                </div>

            </div>
            <div class="col-md-12 col-sm-12 col-xs-12">
                <p>
                <a href="<?php echo site_url('frontend/referral_1') ?>" class="btn btn-primary">See more</a>
                </p>
            </div>
        </div>
    </div>
    <!-- END AWARDS -->
    <!-- TABBED CONTENT -->

    <!-- END TABBED CONTENT -->
</div>
<!-- END RIGHT COLUMN -->
</div>
</div>
</div>

    <div class="container-fluid">
        <div class="row">
            <?php
            foreach($retrieve_user as $user) {
                $phone = $user['phone'];
                $first_name = $user['first_name'];
                $last_name = $user['last_name'];
            }
            foreach($retrieve_kyc as $kyc) {
                $picture = $kyc['picture'];
                $id_card = $kyc['idCard'];
                $status = $kyc['status'];
            }
                ?>

            <div id="myModal" class="modal fade" role="dialog">
                <div class="modal-dialog">

                    <!-- Modal content-->
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                            <h4 class="modal-title" style="text-align: center;" >Congratulations <?php echo ucfirst($first_name); ?>!</h4>
                            <p> You are now a member of pep project, a unique Africa-centric digital empowerment community guaranteed to empower you.</p>
                        </div>
                        <div class="modal-body">
                            <div class="row">
                                <div class="col-lg-12"><img alt="show" src="<?php echo base_url('/assets/img/model.jpeg') ?>" class="img-responsive" /></div>
                            </div>
                            <div class="row">
                                <p align="justify" class="pop_design">
                                    We are positioned to empower every African citizen through networking, trade facilitation and earnings sharing via our decentralised digital ecosystem which include: a social media platform, trading platforms, payment processing platform, digital hub, apps, cryptocurrency coins and lots more.

                                    As a welcome gift, we will send you <b>100 units</b> of our special cryptocurrency coin called <b>"pep coin"</b> immediately we verify that you are a full pep project member just by completing your profile details and signing up on our other platforms :
                                    <a href="https://peptribe.info" target="_blank">PepTribe</a> &amp;
                                    <a href="https://gopepcash.com" target="_blank">GoPepcash</a>

                                <br/>


                                    You can find your personal wallet addresses and referral link on your dashboard which you will use for your transactions on the ecosystem.

                                    We will also give you, 5 special business e-books, 2000 units of  pepcoin, a digital product/service voucher (can be discounted for cash) and a cash gift of <b>$50</b> (or it's equivalent) when you register for a our special "African invasion" package which is just <b>$22 (&#x20A6;7,500)</b>. You are expected after purchase, to refer just two people to also take advantage of this package.and your referral link is your effective tool for achieving this. Kindly share it with friends,  family members and everyone on your social media handles.

                                    <br/>
                                    We would love for all our members to have this package but unfortunately,  we can only give to just 1000 registered members at the highly discounted price of <b>$22 (&#x20A6;7,500)</b>. So,  the earlier you register,  the better your chances of getting your share of the pie.
                                    <br/>

                                    Kindly send your payment to : <br/><b>Account name: Afrinovation International Ltd.<br/>Bank: FCMB<br/>Account number: 3053418021</b><br/>  and we will send your package once we confirm payment.
                                    <br/>

                                    We wish you a fulfilling experience and be rest assured of our unwavering support.

                                    <br/>
                                    I welcome you once again to pep project. Thank you.
                                    <br/>
                                    <br/>

                                    Best regards,
                                    <br/>
                                    <br/>

                                    Fred Lawanson
                                    <br/>
                                    Project Mgr, Pep project
                                    <br/>
                                    <br/>

                                    <b style="color: red;">NOTE: You can purchase as many of this package as possible using your referral link but ensure you don't register more than ONCE.</b>

                                </p>
                               </div>

                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        </div>
                    </div>

                </div>
            </div>
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
            <h3 class="panel-title">PEP</h3>
            <p class="panel-subtitle"></p>
        </div>
        <div class="panel-body">
            <div class="row">
                <div class="col-md-4">
                    <div class="metric">
                        <span class="icon"><i class="fa fa-money"></i></span>
                        <p>
                            <span class="number"><?php $pep_balance = $total_credit_pep - $total_debit_pep; echo number_format($pep_balance, 4); ?></span>
                            <span class="title">PEP Balance</span>
                        </p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="metric">
                        <span class="icon"><i class="fa fa-money"></i></span>
                        <p>
                            <span class="number"><?php if($total_credit_pep == ''){echo 0;} else echo number_format($total_credit_pep, 4); ?></span>
                            <span class="title">Total PEP credit</span>
                        </p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="metric">
                        <span class="icon"><i class="fa fa-money"></i></span>
                        <p>
                            <span class="number"><?php if($total_debit_pep == ''){echo 0;} else echo number_format($total_debit_pep, 4); ?></span>
                            <span class="title">Total PEP debit</span>
                        </p>
                    </div>
                </div>

            </div>

        </div>
    </div>
    <div class="panel panel-headline">
        <div class="panel-heading">
            <h3 class="panel-title">XPEP</h3>
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
    <!-- END OVERVIEW -->

    <div class="row">
        <div class="col-md-12">
            <!-- TASKS -->
            <div class="panel">
                <div class="panel-heading">
                    <h3 class="panel-title">My details</h3>
                    <div class="right">
                        <button type="button" class="btn-toggle-collapse"><i class="lnr lnr-chevron-up"></i></button>
                        <button type="button" class="btn-remove"><i class="lnr lnr-cross"></i></button>
                    </div>
                </div>
                <div class="panel-body">
                    <ul class="list-unstyled task-list">
                        <li>
                            <p>Profile <span class="label-percent"><?php echo $cell1; ?>0%</span></p>
                            <div class="progress progress-xs">
                                <div class="progress-bar progress-bar-striped active progress-bar-danger" role="progressbar" aria-valuenow="<?php echo $cell1; ?>0" aria-valuemin="0" aria-valuemax="100" style="width: <?php echo $cell1; ?>0%">
                                    <span class="sr-only"><?php echo $cell1; ?>0% Complete</span>
                                </div>
                            </div>
                        </li>
                        <li>
                            <p>Airdrop <span class="label-percent"><?php echo $count_airdrop; ?>0%</span></p>
                            <div class="progress progress-xs">
                                <div class="progress-bar progress-bar-striped active progress-bar-success" role="progressbar" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100" style="width: <?php echo $count_airdrop; ?>0%">
                                    <span class="sr-only"><?php echo $count_airdrop; ?>0% Complete</span>
                                </div>
                            </div>
                        </li>
                        <li>
                            <p>KYC <span class="label-percent"><?php echo $cell2; ?>0%</span></p>
                            <div class="progress progress-xs">
                                <div class="progress-bar progress-bar-striped active progress-bar-success" role="progressbar" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100" style="width: <?php echo $cell2; ?>0%">
                                    <span class="sr-only">Success</span>
                                </div>
                            </div>
                        </li>
                        <li>
                            <p>Affliate <span class="label-percent">45%</span></p>
                            <div class="progress progress-xs">
                                <div class="progress-bar progress-bar-striped active progress-bar-warning" role="progressbar" aria-valuenow="45" aria-valuemin="0" aria-valuemax="100" style="width: 45%">
                                    <span class="sr-only">45% Complete</span>
                                </div>
                            </div>
                        </li>
                        <li>
                            <p>Next ICO <span class="label-percent">10%</span></p>
                            <div class="progress progress-xs">
                                <div class="progress-bar progress-bar-striped active progress-bar-danger" role="progressbar" aria-valuenow="10" aria-valuemin="0" aria-valuemax="100" style="width: 10%">
                                    <span class="sr-only">10% Complete</span>
                                </div>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
            <!-- END TASKS -->
        </div>

    </div>
    </div>

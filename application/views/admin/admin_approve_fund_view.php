<nav class="navbar navbar-default">
    <div class="container-fluid">
        <div class="navbar-header">
        </div>
        <ul class="nav navbar-nav">
            <li><a href="<?php echo site_url('/admin/wallet')?>">Wallet</a>
            </li>
            <li><a href="<?php echo site_url('/admin_trade_history')?>">Advert history</a></li>
            <li><a href="<?php echo site_url('/admin/transactions')?>">Trade history</a></li>

        </ul>
</nav>
<div class="container">
    <h3 align="center">Credit user</h3>
    <div class="row">
        <div class="col-md-11 col-sm-11 col-xm-11">
            <div class="table-responsive">
                <table id="table" class="table table-striped table-bordered" cellspacing="0" width="100%">
                    <thead>
                    <tr>
                        <th style="width: 10px; font-size: 12px;">Payment ID</th>
                        <th style="width: 10px; font-size: 12px;">User name</th>
                        <th style="width: 10px; font-size: 12px;">Payment currency</th>
                        <th style="width: 10px; font-size: 12px;">Amount Deposited</th>
                        <th style="width: 10px; font-size: 12px;">Credit currency</th>
                        <th style="width: 10px; font-size: 12px;">Amount Expected</th>
                        <th style="width: 10px; font-size: 12px;">Reference details</th>
                        <th style="width: 10px; font-size: 12px;">ICO type</th>
                        <th style="width: 10px; font-size: 12px;">Payment date</th>
                        <th style="width: 10px; font-size: 12px;">Status</th>
                        <th style="width: 10px; font-size: 12px;">Approve</th>
                        <th style="width: 10px; font-size: 12px;">Disapprove</th>
                    </tr>
                    </thead>
                    <tbody>


        <?php
        foreach ($blog_list->result() as $blog) {

            $this->db->select('*');
            $this->db->where('id', $blog->user_id);
            $this->db->from('users');
            $query = $this->db->get();
            $retrieve = $query->result_array();

            foreach ($retrieve as $user_details)
            {
                $first_name = $user_details['first_name'];
                $last_name = $user_details['last_name'];

            }


            ?>
            <tr <?php if($blog->status == 2) echo 'style="background-color: lightblue"'; ?>>
                <td><?php echo $blog->id; ?></td>
                <td><?php echo $first_name.' '.$last_name; ?></td>
                <td><?php echo $blog->currency_from; ?></td>
                <td><?php echo $blog->deposit; ?></td>
                <td><?php echo $blog->currency_to; ?></td>
                <td><?php echo $blog->amount; ?></td>
                <td><p> <?php echo $blog->referrence; ?></p>

                </td>
                <td><?php echo $blog->ico; ?></td>
                <td><?php echo $blog->date; ?></td>
                <td>
                    <?php
                    if ($blog->status == 2)
                    {
                        echo 'Disapproved';
                    }
                    elseif ($blog->status == 1)
                    {
                        echo 'Approved';
                    }
                    elseif ($blog->status == 0)
                    {
                        echo 'Pending';
                    }

                    ?>
                </td>
                <td>
                    <form name="Payment" method="post" action="<?php
                    if ($blog->status == 0)
                    {
                        echo site_url().'/admin/admin_approve_fund/credit';
                    }
                    elseif ($blog->status == 2)
                    {
                        echo site_url().'/admin/admin_approve_fund/#';
                    }

                    ?>" >
                        <input type="hidden" name="id" id="fund_row_id" value="<?php echo $blog->id; ?>">
                        <input type="submit" class="btn btn-sm btn-warning" value="Approve" />
                    </form>
                </td>                <td>
                    <form name="Payment" method="post" action="<?php
                    if ($blog->status == 0)
                    {
                        echo site_url().'/admin/admin_approve_fund/cancel';
                    }
                    elseif ($blog->status == 1)
                    {
                        echo site_url().'/admin/admin_approve_fund/#';
                    }

                    ?>" >
                        <input type="hidden" name="id" id="fund_row_id" value="<?php echo $blog->id; ?>">
                        <input type="submit" class="btn btn-sm btn-warning" value="Cancel" />
                    </form>
                </td>

            </tr>
        <?php
        }
        ?>
                    </tbody>
                    <tfoot>
                    <tr>
                        <th style="width: 10px; font-size: 12px;">Payment ID</th>
                        <th style="width: 10px; font-size: 12px;">User name</th>
                        <th style="width: 10px; font-size: 12px;">Payment currency</th>
                        <th style="width: 10px; font-size: 12px;">Amount Deposited</th>
                        <th style="width: 10px; font-size: 12px;">Credit currency</th>
                        <th style="width: 10px; font-size: 12px;">Amount Expected</th>
                        <th style="width: 10px; font-size: 12px;">Reference details</th>
                        <th style="width: 10px; font-size: 12px;">ICO type</th>
                        <th style="width: 10px; font-size: 12px;">Payment date</th>
                        <th style="width: 10px; font-size: 12px;">Status</th>
                        <th style="width: 10px; font-size: 12px;">Approve</th>
                        <th style="width: 10px; font-size: 12px;">Disapprove</th>
                    </tr>
                    </tfoot>
                </table>
            </div>
        </div>
        <div class="col-md-1 col-sm-1 col-xm-1"></div>
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">


        <?php
        if (strlen($pagination)) {
            echo '<span style="padding: 7px;">'.$pagination.'<span>';
        }
        ?>
        </div>
    </div>
</div>
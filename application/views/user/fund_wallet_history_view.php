
<!-- Left navbar-header end -->
<!-- Page Content -->
<nav class="navbar navbar-default">
    <div class="container-fluid">
        <div class="navbar-header">
        </div>
        <ul class="nav navbar-nav">
            <li><a href="<?php echo site_url('frontend/fund_wallet_history')?>">Fund wallet history</a>
            </li>
            <li><a href="<?php echo site_url('frontend/wallet')?>">Wallet history</a>
            </li>
            <li><a href="<?php echo site_url('frontend/withdraw_history')?>">Withdraw history</a>
            </li>
            <li><a href="<?php echo site_url('frontend/xpep_buyback_history')?>">XPEP buyback history</a>
            </li>
            <li><a href="<?php echo site_url('frontend/transfer_history')?>">Transfer History</a>
            </li>
        </ul>
    </div>
</nav>

<div class="container-fluid">
    <h1 style="font-size:20pt">Deposit History</h1>

    <br />
    <button class="btn btn-default" onclick="reload_table()"><i class="glyphicon glyphicon-refresh"></i> Reload</button>
    <br />
    <br />
    <div class="table-responsive">
    <table id="table" class="table table-striped table-bordered" cellspacing="0" width="100%">
        <thead>
        <tr>
            <th>ID</th>
            <th>Currency from</th>
            <th>Amount deposited</th>
            <th>Currency to</th>
            <th>Amount expected</th>
            <th>Reference</th>
            <th>Date of payment</th>
            <th>Updated</th>
            <th>Status</th>
        </tr>
        </thead>
        <tbody>
        </tbody>

        <tfoot>
        <tr>
            <th>ID</th>
            <th>Currency from</th>
            <th>Amount deposited</th>
            <th>Currency to</th>
            <th>Amount expected</th>
            <th>Reference</th>
            <th>Date of payment</th>
            <th>Updated</th>
            <th>Status</th>
        </tr>
        </tfoot>
    </table>
</div>
    </div>


<script src="<?php echo base_url('assets/js/jquery-2.1.4.min.js')?>"></script>
<!-- Menu Plugin JavaScript -->

<script type="text/javascript">

var save_method; //for save method string
var table;
var base_url = '<?php echo base_url();?>';

$(document).ready(function() {

    //datatables
    table = $('#table').DataTable({

        "processing": true, //Feature control the processing indicator.
        "serverSide": true, //Feature control DataTables' server-side processing mode.
        "order": [], //Initial no order.

        // Load data for the table's content from an Ajax source
        "ajax": {
            "url": "<?php echo site_url('frontend/fund_wallet_history/ajax_list')?>",
            "type": "POST"
        },

        //Set column definition initialisation properties.
        "columnDefs": [
            {
                "targets": [ -1 ], //last column
                "orderable": false, //set not orderable
            },
            {
                "targets": [ -2 ], //2 last column (photo)
                "orderable": false, //set not orderable
            },
        ],

    });

    //datepicker
    $('.datepicker').datepicker({
        autoclose: true,
        format: "yyyy-mm-dd",
        todayHighlight: true,
        orientation: "top auto",
        todayBtn: true,
        todayHighlight: true,
    });

    //set input/textarea/select event when change value, remove class error and remove text help block
    $("input").change(function(){
        $(this).parent().parent().removeClass('has-error');
        $(this).next().empty();
    });
    $("textarea").change(function(){
        $(this).parent().parent().removeClass('has-error');
        $(this).next().empty();
    });
    $("select").change(function(){
        $(this).parent().parent().removeClass('has-error');
        $(this).next().empty();
    });

});




function reload_table()
{
    table.ajax.reload(null,false); //reload datatable ajax
}


</script>


</body>
</html>
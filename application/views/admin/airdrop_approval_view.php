<div id="page-wrapper">
    <div class="container-fluid">
        <h1 style="font-size:20pt">KYC</h1>

        <h3>Details</h3>
        <br />
        <button class="btn btn-default" onclick="reload_table()"><i class="glyphicon glyphicon-refresh"></i> Reload</button>
        <br />
        <br />
        <table id="table" class="table table-striped table-bordered" cellspacing="0" width="100%">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>First name</th>
                    <th>Last name</th>
                    <th>Type</th>
                    <th>Currency</th>
                    <th>Amount</th>
                    <th>Details</th>
                    <th>Created</th>
                    <th>Updated</th>
                    <th>Status</th>
                    <th style="width:150px;">Action</th>
                </tr>
            </thead>
            <tbody>
            </tbody>

            <tfoot>
            <tr>
                <th>ID</th>
                <th>First name</th>
                <th>Last name</th>
                <th>Type</th>
                <th>Currency</th>
                <th>Amount</th>
                <th>Details</th>
                <th>Created</th>
                <th>Updated</th>
                <th>Status</th>
                <th>Action</th>
            </tr>
            </tfoot>
        </table>
    </div>
</div>
<script src="<?php echo base_url('assets/js/jquery-2.1.4.min.js')?>"></script>


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
            "url": "<?php echo site_url('admin/airdrop_approval/ajax_list')?>",
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



function add_person()
{
    save_method = 'add';
    $('#form')[0].reset(); // reset form on modals
    $('.form-group').removeClass('has-error'); // clear error class
    $('.help-block').empty(); // clear error string
    $('#modal_form').modal('show'); // show bootstrap modal
    $('.modal-title').text('Add Product'); // Set Title to Bootstrap modal title

    $('#photo-preview').hide(); // hide photo preview modal

    $('#label-photo').text('Upload Photo'); // label photo upload

    $('#photo-preview2').hide(); // hide photo preview modal

    $('#label-photo2').text('Upload Photo'); // label photo upload
    $('#photo-preview3').hide(); // hide photo preview modal

    $('#label-photo3').text('Upload Photo'); // label photo upload
}

function edit_person(id)
{
    save_method = 'update';
    $('#form')[0].reset(); // reset form on modals
    $('.form-group').removeClass('has-error'); // clear error class
    $('.help-block').empty(); // clear error string


    //Ajax Load data from ajax
    $.ajax({
        url : "<?php echo site_url('admin/kyc/ajax_edit')?>/" + id,
        type: "GET",
        dataType: "JSON",
        success: function(data)
        {

            $('[name="id"]').val(data.id);
            $('[name="user_id"]').val(data.user_id);
            $('[name="idCard"]').val(data.idCard);
            $('[name="picture"]').val(data.picture);
            $('[name="address"]').val(data.address);
            $('[name="status"]').val(data.status);

            $('#modal_form').modal('show'); // show bootstrap modal when complete loaded
            $('.modal-title').text('Edit Person'); // Set title to Bootstrap modal title

            $('#photo-preview').show(); // show photo preview modal
            $('#photo-preview2').show(); // show photo preview modal
            $('#photo-preview3').show(); // show photo preview modal

            if(data.picture)
            {
                $('#label-photo').text('Change Product Image'); // label photo upload
                $('#photo-preview div').html('<img src="'+base_url+data.picture+'" class="img-responsive">'); // show photo
                $('#photo-preview div').append('<input type="checkbox" name="remove_photo" value="'+data.picture+'"/> Remove photo when saving'); // remove photo

            }
            else
            {
                $('#label-photo').text('Upload Photo'); // label photo upload
                $('#photo-preview div').text('(No photo)');
            }
            if(data.idCard)
            {
                $('#label-photo2').text('Change Product Image'); // label photo upload
                $('#photo-preview2 div').html('<img src="'+base_url+data.idCard+'" class="img-responsive">'); // show photo
                $('#photo-preview2 div').append('<input type="checkbox" name="remove_photo2" value="'+data.idCard+'"/> Remove photo when saving'); // remove photo

            }
            else
            {
                $('#label-photo2').text('Upload Photo'); // label photo upload
                $('#photo-preview2 div').text('(No photo)');
            }
            if(data.address)
            {
                $('#label-photo3').text('Change Product Image'); // label photo upload
                $('#photo-preview3 div').html('<img src="'+base_url+data.address+'" class="img-responsive">'); // show photo
                $('#photo-preview3 div').append('<input type="checkbox" name="remove_photo3" value="'+data.address+'"/> Remove photo when saving'); // remove photo

            }
            else
            {
                $('#label-photo3').text('Upload Photo'); // label photo upload
                $('#photo-preview3 div').text('(No photo)');
            }


        },
        error: function (jqXHR, textStatus, errorThrown)
        {
            alert('Error get data from ajax');
        }
    });
}

function reload_table()
{
    table.ajax.reload(null,false); //reload datatable ajax 
}

function save()
{
    $('#btnSave').text('saving...'); //change button text
    $('#btnSave').attr('disabled',true); //set button disable 
    var url;

    if(save_method == 'add') {
        url = "<?php echo site_url('admin/kyc/ajax_add')?>";
    } else {
        url = "<?php echo site_url('admin/kyc/ajax_update')?>";
    }

    // ajax adding data to database

    var formData = new FormData($('#form')[0]);
    $.ajax({
        url : url,
        type: "POST",
        data: formData,
        contentType: false,
        processData: false,
        dataType: "JSON",
        success: function(data)
        {

            if(data.status) //if success close modal and reload ajax table
            {
                $('#modal_form').modal('hide');
                reload_table();
            }
            else
            {
                for (var i = 0; i < data.inputerror.length; i++) 
                {
                    $('[name="'+data.inputerror[i]+'"]').parent().parent().addClass('has-error'); //select parent twice to select div form-group class and add has-error class
                    $('[name="'+data.inputerror[i]+'"]').next().text(data.error_string[i]); //select span help-block class set text error string
                }
            }
            $('#btnSave').text('save'); //change button text
            $('#btnSave').attr('disabled',false); //set button enable 


        },
        error: function (jqXHR, textStatus, errorThrown)
        {
            alert('Error adding / update data');
            $('#btnSave').text('save'); //change button text
            $('#btnSave').attr('disabled',false); //set button enable 

        }
    });
}

function delete_person(id)
{
    if(confirm('Are you sure delete this data?'))
    {
        // ajax delete data to database
        $.ajax({
            url : "<?php echo site_url('admin/kyc/ajax_delete')?>/"+id,
            type: "POST",
            dataType: "JSON",
            success: function(data)
            {
                //if success reload ajax table
                $('#modal_form').modal('hide');
                reload_table();
            },
            error: function (jqXHR, textStatus, errorThrown)
            {
                alert('Error deleting data');
            }
        });

    }
}

</script>

<!-- Bootstrap modal -->
<div class="modal fade" id="modal_form" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h3 class="modal-title">Product details</h3>
            </div>
            <div class="modal-body form">
                <form action="#" id="form" class="form-horizontal">
                    <input type="hidden" value="" name="id"/>
                    <div class="form-body">

                        <div class="form-group">
                            <label class="control-label col-md-3">Name of Product</label>
                            <div class="col-md-9">
                                <input name="user_id" placeholder="name" class="form-control" type="text">
                                <span class="help-block"></span>
                            </div>
                        </div>

                        <div class="form-group" id="photo-preview">
                            <label class="control-label col-md-3">Photo</label>
                            <div class="col-md-9">
                                (No photo)
                                <span class="help-block"></span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3" id="label-photo">Upload Photo </label>
                            <div class="col-md-9">
                                <input name="picture" type="file">
                                <span class="help-block"></span>
                            </div>
                        </div>
                        <div class="form-group" id="photo-preview2">
                            <label class="control-label col-md-3">Photo</label>
                            <div class="col-md-9">
                                (No photo)
                                <span class="help-block"></span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3" id="label-photo2">Upload Photo </label>
                            <div class="col-md-9">
                                <input name="idCard" type="file">
                                <span class="help-block"></span>
                            </div>
                        </div>
                        <div class="form-group" id="photo-preview3">
                            <label class="control-label col-md-3">Photo</label>
                            <div class="col-md-9">
                                (No photo)
                                <span class="help-block"></span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3" id="label-photo3">Upload Photo </label>
                            <div class="col-md-9">
                                <input name="address" type="file">
                                <span class="help-block"></span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3">Product status</label>
                            <div class="col-md-9">
                                <select name="status" id="gender" class="form-control">

                                    <option value=""></option>
                                    <option value="pending">Pending</option>
                                    <option value="approved">Approve</option>
                                </select>
                                <span class="help-block"></span>
                            </div>
                        </div>
                    </div>

                </form>
            </div>
            <div class="modal-footer">
                <button type="button" id="btnSave" onclick="save()" class="btn btn-primary">Save</button>
                <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
            </div>

        </div><!-- /.modal-content -->

    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
<!-- End Bootstrap modal -->
    <script type="text/javascript">
        $(document).ready(function(){
            $(document).ready(function(){
                var $optgroups = $('#subcategory > optgroup');

                $("#category").on("change",function(){
                    var selectedVal = this.value;

                    $('#subcategory').html($optgroups.filter('[label="'+selectedVal+'"]'));
                });
                var $optgroups2 = $('#subcategory2 > optgroup');

                $("#subcategory").on("change",function(){
                    var selectedVal2 = this.value;

                    $('#subcategory2').html($optgroups2.filter('[label="'+selectedVal2+'"]'));
                });
            });

        });
    </script>
    <script type="text/javascript">
        $(document).ready(function(){






        });
    </script>
</body>
</html>
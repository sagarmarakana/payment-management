<?php defined('BASEPATH') OR exit('No direct script access allowed');?>
<div class="app-content icon-content">
    <div class="section">
        <div class="page-header">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="<?=base_url('admin/dashboard');?>">Dashboard</a>
                </li>
                <li class="breadcrumb-item active"><?=$title?></li>
            </ol>
            <div class="mt-3 mt-lg-0">
                <div class="d-flex align-items-center flex-wrap text-nowrap">
                    <a href="<?=base_url('admin/users/add/');?>" class="btn btn-success btn-icon-text mr-2 d-none d-md-block"><i class="fe fe-plus"></i>Add User</a>
                </div>
            </div>
        </div>
        <?php if ($this->session->flashdata('message') !== NULL) {?>
            <div class="alert alert-<?php echo $this->session->flashdata('message')['0'] == 1 ? 'success' : 'danger'; ?> alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                <?php print_r($this->session->flashdata('message')['1']);?>
            </div>
        <?php }?>
        <div class="row">
            <div class="col-xl-12">
                <div class="card">
                     <div class="card-header">
                        <h4 class="card-title"><?=$title?></h4>
                    </div>
                    <div class="card-body">
                        <div class="application-table">
                            <div class="table-responsive">
                                <table id="users" class="table table-striped table-bordered dataTable no-footer dtr-inline">
                                    <thead>
                                        <tr>
                                            <th></th>
                                            <th>Name</th>
                                            <th>Email</th>
                                            <th>Google2FA QR</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody></tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript">
    $(document).ready(function () {
        oTable = $('#users').dataTable({
            "aaSorting": [[1, "desc"]],
            "stateSave":true,
            "serverSide": true,
            "fixedHeader": true,
            "responsive": false,
            "autoWidth" : false,
            "aLengthMenu": [[10, 25, 50, 100, -1], [10, 25, 50, 100, "All"]],
            "iDisplayLength": 10,
            'bProcessing': true, 'bServerSide': true,"bDestroy": true,"bRetrieve":true,
            'sAjaxSource': "<?=site_url('admin/users/getUsers/')?>",
            'fnServerData': function (sSource, aoData, fnCallback) {
                aoData.push({
                    "name": "<?=$this->security->get_csrf_token_name()?>",
                    "value": "<?=$this->security->get_csrf_hash()?>"
                },
                {
                    "name": "sColumns",
                    "value": "",
                });

                $.ajax({'dataType': 'json', 'type': 'POST', 'url': sSource, 'data': aoData, 'success': fnCallback});
            },
            "columnDefs": [{
                "defaultContent": "-",
                "targets": "_all",
            }],
            "aoColumns": [
            {
                "bVisible": false,
            },
            null,
            null,
            {
                "mRender" : image_qr
            },
            {
                "bSortable": false,
                "mRender": users_action,
            },
            ],
            'fnRowCallback': function (nRow, aData, iDisplayIndex) {
                var oSettings = oTable.fnSettings();
                nRow.id = aData[0];
                nRow.className = "user_list";
                return nRow;
            },
            "fnFooterCallback": function (nRow, aaData, iStart, iEnd, aiDisplay) {
            },
            "fnDrawCallback": function (nRow, aaData, iStart, iEnd, aiDisplay) {
                $('[data-toggle="popover"]').popover();
                $('[data-toggle="tooltip"]').tooltip();
            }
        });
    });
    $(document).on('click', 'tr td:first-child', function(){
       $('[data-toggle="popover"]').popover();
       $('[data-toggle="tooltip"]').tooltip();
    });
</script>
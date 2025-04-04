<?php
defined('BASEPATH') OR exit('No direct script access allowed');

 $status_list = status_list();
?>
<link rel="stylesheet" href="<?php echo base_url('assets/dist-assets/css/plugins/datatables.min.css') ?>" />
    

<div class="">
<div class="float-left breadcrumb"><h1 class="mr-2">News Updates</h1></div>
<div class="float-right"><a class="btn btn-primary" type="button" data-dismiss="modal" href="<?php echo site_url('news/create'); ?>"><i class="i-Add-File"></i> Add</a></div>
<div class="clearfix"></div>
</div>

<div class="separator-breadcrumb border-top"></div>



<?php $this->load->view('common/flashmsg'); ?>



<!--row-->
<div class="row mb-12">
<div class="col-md-12 mb-3">
<div class=""><div class="">
<div class="table-responsive">
<table  class="table table-striped" id="zero_configuration_table" style="width:100%">
<thead>
<tr>
<th scope="col">Sr. No.</th>
<th scope="col">Title</th>
<th scope="col">Status</th>
<th scope="col">Created Date</th>
<th scope="col">Action</th>
</tr>
</thead>
<tbody>

</tbody>
</table>
</div>
</div>
</div>
</div>

</div>


<?php $this->load->view('common/footer');  ?>
<script src="<?php echo base_url('assets/dist-assets/js/plugins/datatables.min.js') ?>"></script>

<script src="<?php echo base_url('assets/custom.js'); ?>"></script>


<script type="text/javascript">

    $(document).ready(function(){
    	var table =  $('#zero_configuration_table').DataTable({
                'processing': true,
                "oLanguage": {'sProcessing': '<div class="dt_spinner"> <span class="spinner spinner-primary mr-3"></span></div>'},
                "stripeClasses": [],
                "lengthMenu": [10, 25, 75, 100,200],
                "pageLength": 10,
                "sDom": 'lrtip',
                "bInfo":true,
                "searching": true,
                "ordering": false,
                "columnDefs": [{
                    "defaultContent": "-",
                    "targets": "_all"
                }], 
                serverSide: true,
                ajax: {
                    url: "<?php echo site_url('news/list') ?>",
                    // dataSrc :'data',
                    dataFilter: function(data){
                        var json = jQuery.parseJSON( data );
                        json.recordsTotal = json.data.totalRecords;
                        json.recordsFiltered = json.data.totalRecordwithFilter;
                        json.data = json.data.aaData;
                        return JSON.stringify( json ); 
                    },
                },

                columns: [
                        {
                          "render": function(data, type, full, meta) {
                            return meta.row + meta.settings._iDisplayStart + 1;
                          }
                        },
                        { data: 'title' },
                        { data: 'status' },
                        { data: 'created_at' },
                        {
                          "render": function(data, type, full, meta) {
                            $html = '<a class="text-success mr-2 text-18" href="<?php echo site_url() ?>news/'+full.id+'" data-toggle="tooltip" data-placement="top" title="View"><i class="nav-icon i-Eye font-weight-bold"></i></a>';

                            $html += '<a class="text-success mr-2 text-18" href="<?php echo site_url() ?>news/'+full.id+'/edit" data-toggle="tooltip" data-placement="top" title="Edit"><i class="nav-icon i-File-Edit"></i></a>';

                            return $html;
                          }
                        },
                 ]
        });   

    });
</script>
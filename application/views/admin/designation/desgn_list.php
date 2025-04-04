<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<link rel="stylesheet" href="<?php echo base_url('assets/dist-assets/css/plugins/datatables.min.css') ?>" />
<link href="<?php echo base_url('assets/libs/jquery-ui/jquery-ui.min.css'); ?>" rel="stylesheet" type="text/css">

    

<div class="">
<div class="float-left breadcrumb"><h1 class="mr-2">All Designation</h1></div>
<div class="float-right"><a class="btn btn-primary" type="button" data-dismiss="modal" href="<?php echo site_url('designation/create'); ?>"><i class="i-Add-File"></i> Add</a></div>
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
<th scope="col">Name</th>
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
    	var i = 1;
    	var table =  $('#zero_configuration_table').DataTable({
	            'processing': true,
	             "oLanguage": {
	            		'sProcessing': ' <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>'
	        		},
	        "stripeClasses": [],
	        "lengthMenu": [10, 25, 75, 100,200],
	        "pageLength": 10,
	        "sDom": 'lrtip',
	        "bInfo":true,
	         "columnDefs": [{
	              "defaultContent": "-",
	              "targets": "_all"
	            }], 
	           ajax: "<?php echo site_url('designation/list') ?>",
	           columns: [
	                    {
					      "render": function(data, type, full, meta) {
					        return i++;
					      }
					    },
	                    { data: 'name' },
	                    { data: 'status'},
	                    { data: 'created_at' },
	                    {
					      "render": function(data, type, full, meta) {
					        console.log(full.name);
					        $html = '<a class="text-success mr-2 text-18" href="<?php echo site_url() ?>designation/'+full.id+'" data-toggle="tooltip" data-placement="top" title="View"><i class="nav-icon i-Eye font-weight-bold"></i></a>';

							$html += '<a class="text-success mr-2 text-18" href="<?php echo site_url() ?>designation/'+full.id+'/edit" data-toggle="tooltip" data-placement="top" title="Edit"><i class="nav-icon i-File-Edit"></i></a>';

							//$html += '<a class="text-danger mr-2  text-18" href="#" data-toggle="tooltip" data-placement="top" title="Delete" ><i class="nav-icon i-Close-Window font-weight-bold"></i></a>';

							return $html;
					      }
					    },
                 ]
        });   

    });
</script>
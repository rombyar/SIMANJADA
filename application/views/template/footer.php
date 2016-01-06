    <!-- JS Scripts-->
    <!-- jQuery Js -->
    <script src="<?php echo base_url('assets/js/jquery-1.10.2.js'); ?>"></script>
    
	<!-- Bootstrap Js -->
    <script src="<?php echo base_url('assets/js/bootstrap.min.js'); ?>"></script>
    
	<!-- Metis Menu Js -->
    <script src="<?php echo base_url('assets/js/jquery.metisMenu.js'); ?>"></script>
    
	<!-- Morris Chart Js
    <script src="<?php echo base_url('assets/js/morris/raphael-2.1.0.min.js'); ?>"></script>
    <script src="<?php echo base_url('assets/js/morris/morris.js'); ?>"></script> -->
	
	<!-- Chart Js -->
	<script src="<?php echo base_url('assets/js/easypiechart.js'); ?>"></script>
	<script src="<?php echo base_url('assets/js/easypiechart-data.js'); ?>"></script>
	<script src="<?php echo base_url('assets/js/Lightweight-Chart/jquery.chart.js'); ?>"></script>
    
	<!-- DATA TABLE SCRIPTS -->
		<script src="<?php echo base_url('assets/plugin/datatables/jquery.dataTables.min.js');?>"></script>
		<script src="<?php echo base_url('assets/plugin/datatables/datatables.js');?>"></script>
		<script type="text/javascript">
		$(document).ready(function() {
			$('.datatable').dataTable({
				"sPaginationType": "bs_normal"
			});	
			$('.datatable').each(function(){
				var datatable = $(this);
				// SEARCH - Add the placeholder for Search and Turn this into in-line form control
				var search_input = datatable.closest('.dataTables_wrapper').find('div[id$=_filter] input');
				search_input.attr('placeholder', 'Search');
				search_input.addClass('form-control input-sm');
				// LENGTH - Inline-Form control
				var length_sel = datatable.closest('.dataTables_wrapper').find('div[id$=_length] select');
				length_sel.addClass('form-control input-sm');
                datatable.bind('page', function(e){
                    window.console && console.log('pagination event:', e) //this event must be fired whenever you paginate
                });
			});
		});
	</script>						
	
	<!-- Include jQuery - see http://jquery.com -->
	<script type="text/javascript">
		$('.confirmation').on('click', function () {
			return confirm('Are you sure?');
		});
	</script>

	<!-- Custom Js
    <script src="<?php echo base_url('assets/js/custom-scripts.js'); ?>"></script> -->
    
</body>
</html>
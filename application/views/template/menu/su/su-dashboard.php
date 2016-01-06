<!-- set up the modal to start hidden and fade in and out -->
<div id="myModal" class="modal fade">
  <div class="modal-dialog">
    <div class="modal-content">
      <!-- dialog body -->
      <div class="modal-body">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        Hello world!
      </div>
      <!-- dialog buttons -->
      <div class="modal-footer"><button type="button" class="btn btn-primary">OK</button></div>
    </div>
  </div>
</div>

<!-- sometime later, probably inside your on load event callback -->
<script>
    $("#myModal").on("show", function() {    // wire up the OK button to dismiss the modal when shown
        $("#myModal a.btn").on("click", function(e) {
            console.log("button pressed");   // just as an example...
            $("#myModal").modal('hide');     // dismiss the dialog
        });
    });
    $("#myModal").on("hide", function() {    // remove the event listeners when the dialog is dismissed
        $("#myModal a.btn").off("click");
    });
    
    $("#myModal").on("hidden", function() {  // remove the actual elements from the DOM when fully hidden
        $("#myModal").remove();
    });
    
    $("#myModal").modal({                    // wire up the actual modal functionality and show the dialog
      "backdrop"  : "static",
      "keyboard"  : true,
      "show"      : true                     // ensure the modal is shown immediately
    });
</script>



<!-- /. ROW  -->
<div class="row">
<?php if($level == 1){?>
    <div class="col-md-3 col-sm-12 col-xs-12">
        <div class="panel panel-primary text-center no-boder blue">
            <div class="panel-left pull-left blue">
                <i class="fa fa-users fa-5x"></i>
				<span>DKM</span>
            </div>
            <div class="panel-right">
				<h3><?php echo $dkm_a_num; ?> </h3>
				<strong> Aktif</strong>
            </div>
        </div>
    </div>
    <div class="col-md-3 col-sm-12 col-xs-12">
        <div class="panel panel-primary text-center no-boder blue">
            <div class="panel-left pull-left blue">
                <i class="fa fa-users fa-5x"></i>
				<span>DKM</span>				
            </div>
            <div class="panel-right">
				<h3><?php echo $dkm_n_num; ?> </h3>
				<strong> Non-Aktif</strong>
            </div>
        </div>
    </div>
<?php } ?>
    <div class="col-md-3 col-sm-12 col-xs-12">
        <div class="panel panel-primary text-center no-boder blue">
            <div class="panel-left pull-left blue">
				<i class="fa fa-star fa-5x"></i>
			</div>
            <div class="panel-right">
				<h3><?php 
				if($level == 2){
					$masjid_num = $this->m_row->get_masjid_num_id($user_id);
				}else{
					$masjid_num = $this->m_row->get_masjid_num();
				}
				echo $masjid_num; ?> </h3>
               <strong> Masjid</strong>
            </div>
        </div>
    </div>
    <div class="col-md-3 col-sm-12 col-xs-12">
        <div class="panel panel-primary text-center no-boder blue">
            <div class="panel-left pull-left blue">
                <i class="fa fa fa-calendar fa-5x"></i>
            </div>
            <div class="panel-right">
				<h3><?php 
				if($level == 2){
					$jadwal_num = $this->m_row->get_jadwal_num_id($user_id);
				}else{
					$jadwal_num = $this->m_row->get_jadwal_num();
				}
				echo $jadwal_num; ?> </h3>
				<strong> Jadwal </strong>
            </div>
        </div>
    </div>
</div>
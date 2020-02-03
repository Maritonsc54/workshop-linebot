<?php

	include('../include/header.php');
	require('../SqlqueryClass.php');

	$query = new SqlqueryClass;
	$campaign_list[] = $query->campaign_list() ;

?>
<main role="main" class="container">
	<div class="panel-group wrap" id="accordion" role="tablist" aria-multiselectable="true">
	<?php
	if(count($campaign_list) > 0){
		foreach ($campaign_list as $result){
	?>
		<div class="panel">
			<div class="panel-heading" role="tab" id="headingOne">
				<h4 class="panel-title">
					<a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
					  <?php if($result["status"] == 1){?>
					  <span class="badge badge-success">Running</span> 
					  <?php }else { ?>
					   <span class="badge badge-danger">Expired</span> 
					  <?php } ?>
						| Code : <b><?=formatdata($result["prefix"])?> </b>
					</a>
				</h4>
			</div>
			<div id="collapseOne" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingOne">
				<div class="card-body">
					<p><b>เคมเปญ : </b><?=formatdata($result["campaign_name"])?></p>
					<p><b>วันที่เริ่มต้น : </b><?=formatdata($result["date_start"])?></p>
					<p><b>วันที่สิ้นสุด : </b><?=formatdata($result["date_end"])?></p>
					<p><b>โควตา  : </b><?=formatdata($result["lucky"])?>  สิทธิ์</p>
					<p><b>Prefix : </b><?=formatdata($result["prefix"])?></p>
					<p><b>เงื่อนไข : </b><?=formatdata($result["condition"])?></p>
				</div>
			</div>
		</div>
	<?php
		}; //end foreach
	}; //end if
	?>
	  <!-- end of panel -->

	</div>

</main>
<?php
	function formatdata($data){
		return iconv('tis-620','utf-8',$data);
	}

	include('../include/footer.php')
?>




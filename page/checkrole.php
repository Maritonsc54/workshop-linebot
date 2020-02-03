<?php
	include('../include/header.php');
	require('../SqlqueryClass.php');

	$query = new SqlqueryClass;
	$campaign_list[] = $query->campaign_list() ;
	
?>
<main role="main" class="container">
	<div class="my-3 p-3 bg-white rounded box-shadow">
        <h6 class="border-bottom border-gray pb-2 mb-0"><b>สิทธิ์คงเหลือเเต่ละเเคมเปญ</b>
		 <small class="text-right mt-3">
         (<?=count($campaign_list);?> Campaign)
        </small></h6>
			<table class="table">
				<tbody>
				<?php
					$no =1;
					
					foreach ($campaign_list as $result){
						$campaign_use = $query->campaign_use($result["prefix"],$result["date_start"],$result["date_end"]);
				?>
					<tr>
						<td width="2%"><b><?=$no++?>.</b></td>
						<td width="40%"><b><?=formatdata($result["prefix"])?></b></td>
						<td width="58%" align="right"><?=$campaign_use["num_total"]?>/ <?=$result["lucky"]?>  <small > (สิทธิ์)</small></td>
					</tr>
				<?php
					}
				?>
			</tbody>
		</table>
	</div>
</main>
<?php


	function formatdata($data){
		return iconv('tis-620','utf-8',$data);
	}

	include('../include/footer.php')
?>




<style>
	.up-img_sec{
		margin-bottom: 15PX;
		text-align: right;
	}
	.form_outer{
		margin-bottom:20px;
	}
	table{
		width:100%;
		margin:0px;
		font-size: 14px !important;
	}
	table td.actions{
		width:28% !important;
	}
	.form_outer{
		margin-bottom:20px;
	}
	.pagination_sec{
		padding: 0px 15px;
		padding-bottom: 15px;
	}
	.pagination_sec .paging span{
		display: inline-block;
		padding: 7px 13px;
		border-radius: 4px;
		border: 1px solid #dd4b39;
		background-color: #dd4b39;
		color: #fff;
		text-transform: capitalize;
	}
</style>
<div class="page_heading">
	<h2 class="headng">View Welcome to crete</h2>
</div>
<div class="table-responsive">
	<div class="col-sm-6">
		<div class="form_outer box">
			<table class="table table-striped table-bordered table-condensed table-hover table_cnts">
				<tbody>
					<tr>
						<th>Id</th>
						<td><?php echo h($Facilitie['Welcometocrete']['id']); ?></td>
					</tr>
	               	<tr>
						<th>Description</th>
						<td><?php echo h($Facilitie['Welcometocrete']['text']); ?></td>
					</tr>
					<tr>
						<th>Description(Greek)</th>
						<td><?php echo h($Facilitie['Welcometocrete']['text_greek']); ?></td>
					</tr>
					<tr>
						<th>Image</th>
						<td>
						<?php $imgxx = explode(",",$Facilitie['Welcometocrete']['image']);
						foreach ($imgxx as $value) { 
						?>
			            <img style="width:50px; height:50px;" src="<?php echo $value;?>" />
			             <?php } ?>
             			</td>
					</tr>
				</tbody>
			</table>
		</div>
	</div>
</div>



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
	<h2 class="headng">View Facilitie</h2>
</div>
<div class="table-responsive">
	<div class="col-sm-6">
		<div class="form_outer box">
			<table class="table table-striped table-bordered table-condensed table-hover table_cnts">
				<tbody>
					<tr>
						<th>Id</th>
						<td><?php echo h($Facilitie['Facilitie']['id']); ?></td>
					</tr>
	                
					<tr>
						<th>Name</th>
						<td><?php echo h($Facilitie['Facilitie']['title']); ?></td>
					</tr>
					<tr>
						<th>Name(Greek)</th>
						<td><?php echo h($Facilitie['Facilitie']['title_greek']); ?></td>
					</tr>
	                <tr>
						<th>Description</th>
						<td><?php echo h($Facilitie['Facilitie']['description']); ?></td>
					</tr>
					<tr>
						<th>Description(Greek)</th>
						<td><?php echo h($Facilitie['Facilitie']['description_greek']); ?></td>
					</tr>
					<tr>
						<th>Image</th>
						<td><img style="width:100px; height:100px;" src="<?php echo $Facilitie['Facilitie']['image']; ?>"/></td>
					</tr>
				</tbody>
			</table>
		</div>
	</div>
</div>
<div class="pagination_sec">
	<?php echo $this->Html->link('Back', array('action' => 'index', $Facilitie['Facilitie']['hotelid']), array('class' => 'btn btn-default ')); ?>
</div>


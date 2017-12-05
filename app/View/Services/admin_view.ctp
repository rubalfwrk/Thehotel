<style>
	table{
		width:100%;
		margin:0px;
		font-size: 14px !important;
	}
	.form_outer{
		margin-bottom:20px;
	}
	.pagination_sec{
		padding: 0px 15px;
		padding-bottom: 15px;
	}
</style>
<div class="page_heading">
	<h2 class="headng">Service</h2>
</div>
<div class="table-responsive">
	<div class="col-sm-5">
		<div class="form_outer box">
			<table class="table table-striped table-bordered table-condensed table-hover table_cnts">
				<tbody>
					<tr>
						<th>Id</th>
						<td><?php echo h($Service['Service']['id']); ?></td>
					</tr>
	                
					<tr>
						<th>Name</th>
						<td><?php echo h($Service['Service']['title']); ?></td>
					</tr>
					<tr>
						<th>Name(Greek)</th>
						<td><?php echo h($Service['Service']['title_greek']); ?></td>
					</tr>
	                <tr>
						<th>description</th>
						<td><?php echo h($Service['Service']['description']); ?></td>
					</tr>
					<tr>
						<th>description(Greek)</th>
						<td><?php echo h($Service['Service']['description_greek']); ?></td>
					</tr>
				</tbody>
			</table>
		</div>
	</div>
</div>
<div class="pagination_sec">
	<?php echo $this->Html->link('Back', array('action' => 'index', $Service['Service']['hotelid']), array('class' => 'btn btn-default ')); ?>
</div>


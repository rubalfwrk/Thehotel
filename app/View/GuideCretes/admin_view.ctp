<style>
	table{
		width:100%;
		margin:0px;
		font-size: 14px !important;
	}
	.form_outer{
		margin-bottom:20px;
	}
</style>
<div class="page_heading">
	<h2 class="headng">View Guide Crete</h2>
</div>
<div class="table-responsive">
	<div class="col-sm-12">
		<div class="form_outer box">
			<table class="table table-striped table-bordered table-condensed table-hover table_cnts">
				<tbody>
					<tr>
						<th>Id</th>
						<td><?php echo h($GuideCrete['GuideCrete']['id']); ?></td>
					</tr>
					<tr>
						<th>Name</th>
						<td><?php echo h($GuideCrete['GuideCrete']['title']); ?></td>
					</tr>
					<tr>
						<th>Name(Greek)</th>
						<td><?php echo h($GuideCrete['GuideCrete']['title_greek']); ?></td>
					</tr>
					<tr>
						<th>Image</th>
						<td><img style="width:100px; height:100px;" src="<?php echo $GuideCrete['GuideCrete']['image']; ?>"/></td>
					</tr>
	                <tr>
						<th>Created</th>
						<td><?php echo h($GuideCrete['GuideCrete']['created_date']); ?></td>
					</tr>
				</tbody>
			</table>
		</div>
	</div>
</div>


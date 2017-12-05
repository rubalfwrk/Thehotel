<style>
	.form_outer{
		margin-bottom:20px;
	}
</style>
<div class="page_heading">
	<h2 class="headng">View Accommodation</h2>
</div>
<div class="table-responsive">
	<div class="col-sm-5">
		<div class="form_outer box">
			<table class="table table-striped table-bordered table-condensed table-hover table_cnts">
				<tbody>
					<tr>
						<th>Id</th>
						<td><?php echo h($Accommodation['Accommodation']['id']); ?></td>
					</tr>
					<tr>
						<th>Name</th>
						<td><?php echo h($Accommodation['Accommodation']['title']); ?></td>
					</tr>
					<tr>
						<th>Name(Greek)</th>
						<td><?php echo h($Accommodation['Accommodation']['title_greek']); ?></td>
					</tr>
	                <tr>
						<th>Image</th>
						<td><img style="width:100px; height:100px;" src="<?php echo $Accommodation['Accommodation']['image']; ?>"/></td>
					</tr>
	                <tr>
						<th>description</th>
						<td><?php echo h($Accommodation['Accommodation']['description']); ?></td>
					</tr>
					<tr>
						<th>description(Greek)</th>
						<td><?php echo h($Accommodation['Accommodation']['description_greek']); ?></td>
					</tr>
				</tbody>
			</table>
		</div>
	</div>
</div>

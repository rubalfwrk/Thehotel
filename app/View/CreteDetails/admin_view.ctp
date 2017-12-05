<style>
	table{
		width:100%;
		margin:0px;
	}
</style>
<div class="page_heading">
	<h2><?php echo $title; ?></h2>
</div>
<div class="row">
	<div class="col-sm-5">
		<div class="form_outer">
			<table class="table-striped table-bordered table-condensed table-hover">
				<tr>
					<td>Id</td>
					<td><?php echo h($CreteDetail['CreteDetail']['id']); ?></td>
				</tr>
                <tr>
					<td>crete Id</td>
					<td><?php echo h($CreteDetail['CreteDetail']['creteid']); ?></td>
				</tr>
				<tr>
					<td>Name</td>
					<td><?php echo h($CreteDetail['CreteDetail']['title']); ?></td>
				</tr>
           
                <tr>
					<td>description</td>
					<td><?php echo h($CreteDetail['CreteDetail']['description']); ?></td>
				</tr>
                <tr>
					<td>latitude</td>
					<td><?php echo h($CreteDetail['CreteDetail']['created_date']); ?></td>
				</tr>
			
			</table>
		</div>
	</div>
</div>
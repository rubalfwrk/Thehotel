<style>
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
</style>
<div class="page_heading">
	<h2 class="headng">Guide List</h2>
</div>
<div class="table-responsive">
	<div class="col-sm-5">
		<div class="form_outer box">
			<table class="table table-striped table-bordered table-condensed table-hover table_cnts">
				<tbody>
					<tr>
						<th>Id</th>
						<td><?php echo h($GuideList['GuideList']['id']); ?></td>
					</tr>
	                <tr>
						<th>Guide Crete Id</th>
						<td><?php echo h($GuideList['GuideList']['guidecreteid']); ?></td>
					</tr>
					<tr>
						<th>Name</th>
						<td><?php echo h($GuideList['GuideList']['title']); ?></td>
					</tr>
					<tr>
						<th>Name(Greek)</th>
						<td><?php echo h($GuideList['GuideList']['title_greek']); ?></td>
					</tr>
	                <tr>
						<th>Image</th>
						<td><?php $imgxx = explode(",",$GuideList['GuideList']['image']);
						foreach ($imgxx as $value) { 
						?>
			            <img style="width:50px; height:50px;" src="<?php echo $value;?>" />
			             <?php } ?></td>
					</tr>
	                <tr>
						<th>description</th>
						<td><?php echo h($GuideList['GuideList']['description']); ?></td>
					</tr>
					<tr>
						<th>description(Greek)</th>
						<td><?php echo h($GuideList['GuideList']['description_greek']); ?></td>
					</tr>
	                <tr>
						<th>latitude</th>
						<td><?php echo h($GuideList['GuideList']['latitude']); ?></td>
					</tr>
					<tr>
						<th>longitude</th>
						<td><?php echo h($GuideList['GuideList']['longitude']); ?></td>
					</tr>
				</tbody>
			</table>
		</div>
	</div>
</div>

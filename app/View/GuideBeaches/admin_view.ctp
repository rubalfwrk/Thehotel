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
					<td><?php echo h($GuideBeache['GuideBeache']['id']); ?></td>
				</tr>
                <tr>
					<td>Guide Data Id</td>
					<td><?php echo h($GuideBeache['GuideBeache']['guidedataid']); ?></td>
				</tr>
				<?php if($GuideBeache['GuideBeache']['guidedataid'] == "2"){ ?>
				<tr>
					<td>Region</td>
					<td><?php echo h($GuideBeache['GuideBeache']['region']); ?></td>
				</tr>
				
				<?php } ?>
				<tr>
					<td>Name</td>
					<td><?php echo h($GuideBeache['GuideBeache']['title']); ?></td>
				</tr>
				<tr>
					<td>Name(Greek)</td>
					<td><?php echo h($GuideBeache['GuideBeache']['title_greek']); ?></td>
				</tr>
                <tr>
					<td>Image</td>
					<td><?php $imgxx = explode(",",$GuideBeache['GuideBeache']['image']);
						foreach ($imgxx as $value) { 
						?>
			            <img style="width:50px; height:50px;" src="<?php echo $value;?>" />
			             <?php } ?></td>
				</tr>
                <tr>
					<td>Description</td>
					<td><?php echo h($GuideBeache['GuideBeache']['description']); ?></td>
				</tr>
				<tr>
					<td>Description(Greek)</td>
					<td><?php echo h($GuideBeache['GuideBeache']['description_greek']); ?></td>
				</tr>
                <tr>
					<td>latitude</td>
					<td><?php echo h($GuideBeache['GuideBeache']['latitude']); ?></td>
				</tr>
				<tr>
					<td>longitude</td>
					<td><?php echo h($GuideBeache['GuideBeache']['longitude']); ?></td>
				</tr>
			</table>
		</div>
	</div>
</div>
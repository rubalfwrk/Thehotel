<style>
	table{
		width:100%;
		margin:0px;
	}
</style>
<div class="container">
<div class="page_heading">
	<h2>About Crete</h2>
</div>
<div class="row">
	<div class="col-sm-5" style="padding:15px;">
		<div class="form_outer box">
			<table class="table-striped table-bordered table-condensed table-hover">
				<tr>
					<td>Id</td>
					<td><?php echo h($AbouttoCrete['AbouttoCrete']['id']); ?></td>
				</tr>
				<tr>
					<td>Name</td>
					<td><?php echo h($AbouttoCrete['AbouttoCrete']['title']); ?></td>
				</tr>
				<tr>
					<td>Name(Greek)</td>
					<td><?php echo h($AbouttoCrete['AbouttoCrete']['title_greek']); ?></td>
				</tr>
				<tr>
					<td>Description</td>
					<td><?php echo h($AbouttoCrete['AbouttoCrete']['description']); ?></td>
				</tr>
				<tr>
					<td>Description(Greek)</td>
					<td><?php echo h($AbouttoCrete['AbouttoCrete']['description_greek']); ?></td>
				</tr>
				<?php if($AbouttoCrete['AbouttoCrete']['id'] != '1') { ?>

                <tr>
					<td>Image</td>
					<td><img style="width:200px; height:200px;" src="<?php echo h($AbouttoCrete['AbouttoCrete']['image']); ?>"/></td>
				</tr>
				<?php } else { ?>
				<tr>
					<th>Image</th>
					<td>
					<?php 
					$imgxx = explode(",",$AbouttoCrete['AbouttoCrete']['image']);
					foreach ($imgxx as $value) { 
					?>
		            <img style="width:50px; height:50px;" src="<?php echo $value;?>" />
		             <?php } ?>
         			</td>
				</tr>
               	<?php } ?>
                <tr>
					<td>Created Date</td>
					<td><?php echo h($AbouttoCrete['AbouttoCrete']['created_date']); ?></td>
				</tr>

			</table>
		</div>
	</div>
</div>
</div>
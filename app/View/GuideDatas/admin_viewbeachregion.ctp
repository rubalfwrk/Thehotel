<style>
	.up-img_sec{
		margin-bottom: 15PX;
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
	<h2 class="headng">Guide <?php echo $title;?></h2>
</div>
<div class="table-responsive">
	<div class="col-sm-12">
		<div class="form_outer">
			<div class="up-img_sec">
				<?php //echo $this->Html->link('Add GuideBeache', array('action' => 'add'), array('class' => 'btn btn-default')); ?>
			</div>
			<table class="table table-striped table-bordered table-condensed table-hover table_cnts">
				<thead>
					<tr>
						<th><?php echo $this->Paginator->sort('id'); ?></th>
	                    <th><?php echo $this->Paginator->sort('Region'); ?></th>
	                    <th><?php echo $this->Paginator->sort('Region(Greek)'); ?></th>
	                    <th><?php echo $this->Paginator->sort('image'); ?></th>
	                    <th>Action</th>
					</tr>
				</thead>
				<tbody>
					<?php foreach ($GuideBeache as $tag): ?>
					<tr>
						<td><?php echo $tag['BeachRegion']['id']; ?></td>
	                    <td><?php echo $tag['BeachRegion']['region']; ?></td>
	                    <td><?php echo $tag['BeachRegion']['region_greek']; ?></td>
						<td><img style="width:100px; height:100px;" src="<?php echo $tag['BeachRegion']['regionimage']; ?>"/></td>

						<td><?php echo $this->Html->link('Edit', array('action' => 'editbeachregion', $tag['BeachRegion']['id']), array('class' => 'btn  btn-xs btn-info btn-edit')); ?>
						<?php echo $this->Form->postLink('Delete Region', array('action' => 'deletebeachregion',$tag['BeachRegion']['id']), array('class' => 'btn btn-danger btn-xs btn-delet'), __('Are you sure you want to delete # %s?', $tag['BeachRegion']['id'])); ?></td>
					</tr>
					<?php endforeach; ?>
				</tbody>
			</table>
		</div>
	</div>
</div>
<div class="pagination_sec">
	<?php echo $this->element('pagination-counter'); ?>
	<?php echo $this->element('pagination'); ?>
</div>


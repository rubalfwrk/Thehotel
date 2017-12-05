<style>
	.up-img_sec{
		margin-bottom: 15PX;
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
	<h2 class="headng">Service</h2>
</div>
<div class="table-responsive">
	<div class="col-sm-12">
		<div class="form_outer">
			<div class="up-img_sec">
				<?php echo $this->Html->link('Add Service', array('action' => 'add',$hotelid), array('class' => 'btn btn-default')); ?>
			</div>
		</div>
	</div>
	<div class="col-sm-12">
		<div class="form_outer box">
			<table class="table table-striped table-bordered table-condensed table-hover table_cnts">
				<thead>
					<tr>
						<th><?php echo $this->Paginator->sort('id'); ?></th>
	                    <th><?php echo $this->Paginator->sort('title'); ?></th>
	                    <th><?php echo $this->Paginator->sort('title(Greek)'); ?></th>
	                    <th><?php echo $this->Paginator->sort('description'); ?></th>
	                    <th><?php echo $this->Paginator->sort('description(Greek)'); ?></th>
						<th class="actions">Actions</th>
					</tr>
				</thead>
				<tbody>
					<?php foreach ($Service as $tag): ?>
					<tr>
						<td><?php echo $tag['Service']['id']; ?></td>
		                <td><?php echo $tag['Service']['title']; ?></td>
		                <td><?php echo $tag['Service']['title_greek']; ?></td>
						<td><?php echo $tag['Service']['description']; ?></td>
						<td><?php echo $tag['Service']['description_greek']; ?></td>
						<td class="actions">
							<?php echo $this->Html->link('View', array('action' => 'view', $tag['Service']['id'],$hotelid), array('class' => 'btn btn-primary btn-xs btn-view')); ?>

							<?php echo $this->Html->link('Edit', array('action' => 'edit', $tag['Service']['id'],$hotelid), array('class' => 'btn btn-info btn-xs btn-edit')); ?>

							<?php echo $this->Form->postLink('Delete', array('action' => 'delete', $tag['Service']['id'],$hotelid), array('class' => 'btn btn-danger btn-xs btn-delet'), __('Are you sure you want to delete # %s?', $tag['Service']['id'])); ?>
						</td>
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


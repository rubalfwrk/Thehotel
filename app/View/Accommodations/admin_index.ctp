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
	<h2 class="headng">Accommodation</h2>
</div>
<div class="table-responsive">
	<div class="col-sm-12">
		<div class="form_outer">
			<div class="up-img_sec">
				<?php echo $this->Html->link('Add Accommodation', array('action' => 'add',$hotelid), array('class' => 'btn btn-default')); ?>
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
	                    <th style="width:30%;"><?php echo $this->Paginator->sort('description'); ?></th>
	                    <th><?php echo $this->Paginator->sort('description(Greek)'); ?></th>
	                    <th><?php echo $this->Paginator->sort('image'); ?></th>
						<th class="actions">Actions</th>
					</tr>
				</thead>
				<tbody>
					<?php foreach ($Accommodation as $tag): ?>
					<tr>
						<td><?php echo $tag['Accommodation']['id']; ?></td>
	                    <td><?php echo $tag['Accommodation']['title']; ?></td>
	                    <td><?php echo $tag['Accommodation']['title_greek']; ?></td>
						<td><?php echo $tag['Accommodation']['description']; ?></td>
						<td><?php echo $tag['Accommodation']['description_greek']; ?></td>
						<td><img style="width:100px; height:100px;" src="<?php echo $tag['Accommodation']['image']; ?>"/></td>
						<td class="actions">
							<?php echo $this->Html->link('View', array('action' => 'view', $tag['Accommodation']['id'],$hotelid), array('class' => 'btn btn-primary btn-xs btn-view')); ?>

							<?php echo $this->Html->link('Edit', array('action' => 'edit', $tag['Accommodation']['id'],$hotelid), array('class' => 'btn btn-info btn-xs btn-edit')); ?>

							<?php echo $this->Form->postLink('Delete', array('action' => 'delete', $tag['Accommodation']['id'],$hotelid), array('class' => 'btn btn-danger btn-xs btn-delet'), __('Are you sure you want to delete # %s?', $tag['Accommodation']['id'])); ?>
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


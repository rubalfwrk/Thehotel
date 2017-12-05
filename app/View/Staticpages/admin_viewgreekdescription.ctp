<style>
	.up-img_sec{
		margin-bottom: 15PX;
		text-align: right;
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
	<h2 class="headng">About Crete</h2>
</div>
<div class="table-responsive">
	<div class="col-sm-12">
		<div class="form_outer box">
			<div class="up-img_sec">
				<?php //echo $this->Html->link('Add About Crete', array('action' => 'add'), array('class' => 'btn btn-default')); ?>
			</div>
			<table class="table table-striped table-bordered table-condensed table-hover table_cnts">
				<thead>
					<tr>
						<th><?php echo $this->Paginator->sort('id'); ?></th>
						<th><?php echo $this->Paginator->sort('english'); ?></th>
						<th><?php echo $this->Paginator->sort('pronunciation'); ?></th>
						<th><?php echo $this->Paginator->sort('greek'); ?></th>
						<th style="width: 15%;"><?php echo $this->Paginator->sort('Created Date'); ?></th>
						<th class="actions">Actions</th>
					</tr>
				</thead>
				<tbody>
					<?php foreach ($AbouttoCrete as $tag): ?>
					<tr>
						<td><?php echo $tag['GreekDescription']['id']; ?></td>
						<td><?php echo $tag['GreekDescription']['english']; ?></td>
						<td><?php echo $tag['GreekDescription']['pronunciation']; ?></td>
						<td><?php echo $tag['GreekDescription']['greek']; ?></td>
						<td><?php echo $tag['GreekDescription']['created_date']; ?></td>
						<td class="actions">

							<?php //echo $this->Html->link('Edit', array('action' => 'edit', $tag['AbouttoCrete']['id']), array('class' => 'btn btn-info btn-xs btn-edit')); ?>

							<?php echo $this->Form->postLink('Delete', array('action' => 'deletegreekdescription', $tag['GreekDescription']['id']), array('class' => 'btn btn-danger btn-xs btn-delet'), __('Are you sure you want to delete # %s?', $tag['GreekDescription']['id'])); ?>
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


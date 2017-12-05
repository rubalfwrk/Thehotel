<style>
	.form_outer{
		margin-bottom:20px;
	}
	table{
		width:100%;
		margin:0px;
	}
	table td.actions{
		width:28% !important;
	}
	.form_outer{
		margin-bottom:20px;
	}
</style>
<div class="page_heading">
	<h2>Guide Beach</h2>
</div>
<div class="row">
	<div class="col-sm-7">
		<div class="form_outer">
			<div class="up-img_sec">
				<?php //echo $this->Html->link('Add CreteDetail', array('action' => 'add',1), array('class' => 'btn btn-default')); ?>
			</div>
			<table class="table-striped table-bordered table-condensed table-hover">
				<tr>
					<th><?php echo $this->Paginator->sort('id'); ?></th>
					<th><?php echo $this->Paginator->sort('creteid'); ?></th>
                    <th><?php echo $this->Paginator->sort('title'); ?></th>
                    <th><?php echo $this->Paginator->sort('description'); ?></th>
                    <th><?php echo $this->Paginator->sort('created_date'); ?></th>
					<th class="actions">Actions</th>
				</tr>
				<?php foreach ($CreteDetail as $tag): ?>
				<tr>
					<td><?php echo $tag['CreteDetail']['id']; ?></td>
					<td><?php echo $tag['CreteDetail']['creteid']; ?></td>
                    <td><?php echo $tag['CreteDetail']['title']; ?></td>
					<td><?php echo $tag['CreteDetail']['description']; ?></td>
					<td><?php echo $tag['CreteDetail']['created_date']; ?></td>
					<td class="actions">
						<?php echo $this->Html->link('View', array('action' => 'view', $tag['CreteDetail']['id']), array('class' => 'btn btn-default btn-xs btn-view')); ?>
						<?php echo $this->Html->link('Edit', array('action' => 'edit', $tag['CreteDetail']['id']), array('class' => 'btn btn-default btn-xs btn-edit')); ?>
						<?php echo $this->Form->postLink('Delete', array('action' => 'delete', $tag['CreteDetail']['id']), array('class' => 'btn btn-danger btn-xs btn-delet'), __('Are you sure you want to delete # %s?', $tag['CreteDetail']['id'])); ?>
					</td>
				</tr>
				<?php endforeach; ?>
			</table>
		</div>
	</div>
</div>
<?php echo $this->element('pagination-counter'); ?>
<?php echo $this->element('pagination'); ?>


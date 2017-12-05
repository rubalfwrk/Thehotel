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
	<h2 class="headng">Crete Extra</h2>
</div>
<div class="table-responsive">
	<div class="col-sm-12">
		<div class="form_outer box">
			<div class="up-img_sec">
				<?php echo $this->Html->link('Add CreteExtra', array('action' => 'add'), array('class' => 'btn btn-default')); ?>
			</div>
			<table class="table table-striped table-bordered table-condensed table-hover table_cnts">
				<thead>
					<tr>
						<th><?php echo $this->Paginator->sort('id'); ?></th>
	                    <th><?php echo $this->Paginator->sort('title'); ?></th>
	                    <th><?php echo $this->Paginator->sort('title(Greek)'); ?></th>
	                    <th><?php echo $this->Paginator->sort('image'); ?></th>
	                    <th><?php echo $this->Paginator->sort('created_date'); ?></th>
						<th class="actions">Actions</th>
					</tr>
				</thead>
				<tbody>
					<?php foreach ($CreteExtra as $tag): ?>
					<tr>
						<td><?php echo $tag['CreteExtra']['id']; ?></td>
						<td><?php echo $tag['CreteExtra']['title']; ?></td>
						<td><?php echo $tag['CreteExtra']['title_greek']; ?></td>
	                    <td><img style="width:100px; height:100px;" src="<?php echo $tag['CreteExtra']['image']; ?>"/></td>
						<td><?php echo $tag['CreteExtra']['created_date']; ?></td>
						
						<td class="actions">
							<?php echo $this->Html->link('View Subcategories', array('action' => 'view', $tag['CreteExtra']['id'],$tag['CreteExtra']['title']), array('class' => 'btn btn-primary btn-xs btn-view')); ?>

							<?php echo $this->Html->link('Edit', array('action' => 'edit', $tag['CreteExtra']['id']), array('class' => 'btn btn-info btn-xs btn-edit')); ?>
	                        
	                        <?php 
							 echo $this->Html->link('Add Subcategories', array('action' => 'addshop', $tag['CreteExtra']['id']), array('class' => 'btn btn-success btn-xs btn-edit'));
							?>
	                        
							<?php echo $this->Form->postLink('Delete', array('action' => 'delete', $tag['CreteExtra']['id']), array('class' => 'btn btn-danger btn-xs btn-delet'), __('Are you sure you want to delete # %s?', $tag['CreteExtra']['id'])); ?>
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


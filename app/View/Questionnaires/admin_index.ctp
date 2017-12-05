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
	<h2 class="headng">Questionnaire</h2>
</div>
<div class="table-responsive">
	<div class="col-sm-12">
		<div class="form_outer">
			<div class="up-img_sec">
				<?php echo $this->Html->link('Add Questionnaire', array('action' => 'add',$hotelid), array('class' => 'btn btn-default')); ?>
			</div>
		</div>
	</div>
	<div class="col-sm-12">
		<div class="form_outer box">
			<table class="table table-striped table-bordered table-condensed table-hover table_cnts">
				<thead>
					<tr>
						<th><?php echo $this->Paginator->sort('id'); ?></th>
	                    <th><?php echo $this->Paginator->sort('category'); ?></th>
	                    <th><?php echo $this->Paginator->sort('category(Greek)'); ?></th>
	                    <th><?php echo $this->Paginator->sort('question'); ?></th>
	                    <th><?php echo $this->Paginator->sort('question(Greek)'); ?></th>
						<th class="actions">Actions</th>
					</tr>
				</thead>
				<tbody>
					<?php foreach ($Questionnaire as $tag): ?>
					<tr>
						<td><?php echo $tag['Questionnaire']['id']; ?></td>
		                <td><?php echo $tag['Questionnaire']['category']; ?></td>
		                <td><?php echo $tag['Questionnaire']['category_greek']; ?></td>
						<td><?php echo $tag['Questionnaire']['question']; ?></td>
						<td><?php echo $tag['Questionnaire']['question_greek']; ?></td>
						<td class="actions">
							<?php echo $this->Html->link('View', array('action' => 'view', $tag['Questionnaire']['id'],$hotelid), array('class' => 'btn btn-primary btn-xs btn-view')); ?>

							<?php echo $this->Html->link('Edit', array('action' => 'edit', $tag['Questionnaire']['id'],$hotelid), array('class' => 'btn btn-info btn-xs btn-edit')); ?>

							<?php echo $this->Form->postLink('Delete', array('action' => 'delete', $tag['Questionnaire']['id'],$hotelid), array('class' => 'btn btn-danger btn-xs btn-delet'), __('Are you sure you want to delete # %s?', $tag['Questionnaire']['id'])); ?>
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


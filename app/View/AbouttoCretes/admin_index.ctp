<style>
	.up-img_sec{
		margin-bottom: 15PX;
		text-align: left;
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
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.15/css/dataTables.bootstrap.min.css"/>
<script type="text/javascript" src="https://cdn.datatables.net/1.10.15/js/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/1.10.15/js/dataTables.bootstrap.min.js"></script>
<div class="page_heading">
	<h2 class="headng">About Crete</h2>
</div>
<div class="table-responsive">
	<div class="col-sm-12">
		<div class="form_outer box">
			<div class="up-img_sec">
				<?php echo $this->Html->link('Add About Crete', array('action' => 'add'), array('class' => 'btn btn-default')); ?>
			</div>
			<table class="table table-striped table-bordered table-condensed table-hover table_cnts">
				<thead>
					<tr>
						<th><?php echo $this->Paginator->sort('id'); ?></th>
						<th><?php echo $this->Paginator->sort('title'); ?></th>
						<th><?php echo $this->Paginator->sort('title(Greek)'); ?></th>
						<th><?php echo $this->Paginator->sort('description'); ?></th>
						<th><?php echo $this->Paginator->sort('description(Greek)'); ?></th>
	                    <th><?php echo $this->Paginator->sort('image'); ?></th>
						<th style="width: 15%;"><?php echo $this->Paginator->sort('Created Date'); ?></th>
						<th class="actions">Actions</th>
					</tr>
				</thead>
				<tbody>
					<?php foreach ($AbouttoCrete as $tag): ?>
					<tr>
						<td><?php echo $tag['AbouttoCrete']['id']; ?></td>
						<td><?php echo $tag['AbouttoCrete']['title']; ?></td>
						<td><?php echo $tag['AbouttoCrete']['title_greek']; ?></td>
						<td><?php echo $tag['AbouttoCrete']['description']; ?></td>
						<td><?php echo $tag['AbouttoCrete']['description_greek']; ?></td>
						<?php if($tag['AbouttoCrete']['id'] != '1') { ?>
	                    <td><img src="<?php echo $tag['AbouttoCrete']['image']; ?>" width =
	                    "100"; height="100"></td>
	                    </td>
	                    <?php } else { ?>
	                    <td>
						<?php $imgxx = explode(",",$tag['AbouttoCrete']['image']);
						foreach ($imgxx as $value) { 
						?>
			            <img style="width:50px; height:50px;" src="<?php echo $value;?>" />
			             <?php } ?>
             			</td>
             			<?php } ?>
						<td><?php echo $tag['AbouttoCrete']['created_date']; ?></td>
						<td class="actions">
							<?php echo $this->Html->link('View', array('action' => 'view', $tag['AbouttoCrete']['id']), array('class' => 'btn btn-primary btn-xs btn-view')); ?>

							<?php echo $this->Html->link('Edit', array('action' => 'edit', $tag['AbouttoCrete']['id']), array('class' => 'btn btn-info btn-xs btn-edit')); ?>

							<?php if($tag['AbouttoCrete']['id'] != '1'){ ?>
								<?php echo $this->Html->link('Add Sub Menus', array('action' => 'addsubmenu', $tag['AbouttoCrete']['id']), array('class' => 'btn btn-success btn-xs btn-edit')); ?>

								<?php echo $this->Html->link('View Sub Menus', array('action' => 'viewsubmenu', $tag['AbouttoCrete']['id']), array('class' => 'btn btn-primary btn-xs btn-view')); ?>

							<?php echo $this->Form->postLink('Delete', array('action' => 'delete', $tag['AbouttoCrete']['id']), array('class' => 'btn btn-danger btn-xs btn-delet'), __('Are you sure you want to delete # %s?', $tag['AbouttoCrete']['id'])); ?>
							<?php } ?>
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


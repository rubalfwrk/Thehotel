<style>
	.up-img_sec{
		margin-bottom: 15PX;
	}
	.form_outer{
		margin-bottom:20px;
	}
	.table_cnts th {
    padding: 11px !important;
}
.actions a {
    margin-bottom: 5px;
}
.btn.btn-primary.btn-xs.btn-view {
    margin: 2px !important;
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
	<h2 class="headng">Guide List</h2>
</div>
<div class="table-responsive">
	<div class="col-sm-12">
		<div class="form_outer box">
			<div class="up-img_sec">
				<?php echo $this->Html->link('Add GuideList', array('action' => 'add',1), array('class' => 'btn btn-default')); ?>
			</div>
			<table class="table table-striped table-bordered table-condensed table-hover table_cnts">
				<thead>
					<tr>
						<th><?php echo $this->Paginator->sort('id'); ?></th>
						<th><?php echo $this->Paginator->sort('Heading'); ?></th>
						<th><?php echo $this->Paginator->sort('Heading(Greek)'); ?></th>
	                    <th><?php echo $this->Paginator->sort('title'); ?></th>
	                    <th><?php echo $this->Paginator->sort('title(Greek)'); ?></th>
	                    <th><?php echo $this->Paginator->sort('description'); ?></th>
	                    <th><?php echo $this->Paginator->sort('description(Greek)'); ?></th>
	                    <th><?php echo $this->Paginator->sort('latitude'); ?></th>
	                    <th><?php echo $this->Paginator->sort('longitude'); ?></th>
	                    <th><?php echo $this->Paginator->sort('image'); ?></th>
						<th class="actions">Actions</th>
					</tr>
				</thead>
				<tbody>
					<?php foreach ($GuideList as $tag): ?>
					<tr>
						<td><?php echo $tag['GuideList']['id']; ?></td>
						<td><?php echo $tag['GuideCrete']['title']; //echo $tag['GuideList']['guidecreteid']; ?></td>
						<td><?php echo $tag['GuideCrete']['title_greek']; //echo $tag['GuideList']['guidecreteid']; ?></td>
	                    <td><?php echo $tag['GuideList']['title']; ?></td>
	                    <td><?php echo $tag['GuideList']['title_greek']; ?></td>
						<td><?php echo $tag['GuideList']['description']; ?></td>
						<td><?php echo $tag['GuideList']['description_greek']; ?></td>
						<td><?php echo $tag['GuideList']['latitude']; ?></td>
	                    <td><?php echo $tag['GuideList']['longitude']; ?></td>
						<td>
						<?php $imgxx = explode(",",$tag['GuideList']['image']);
						foreach ($imgxx as $value) { 
						?>
			            <img style="width:50px; height:50px;" src="<?php echo $value;?>" />
			             <?php } ?>
             			</td>
						<td class="actions">
							<?php echo $this->Html->link('View', array('action' => 'view', $tag['GuideList']['id']), array('class' => 'btn btn-primary btn-xs btn-view')); ?>

							<?php echo $this->Html->link('View Sightseeings', array('controller' =>'GuideSightseeings','action' => 'viewsightseeing', $tag['GuideList']['id']), array('class' => 'btn btn-primary btn-xs btn-view')); ?>


							<?php echo $this->Html->link('Add Sightseeings', array('controller' =>'GuideSightseeings','action' => 'addsightseeing', $tag['GuideList']['id']), array('class' => 'btn btn-primary btn-xs btn-view')); ?>

                           
							<?php echo $this->Html->link('Edit', array('action' => 'edit', $tag['GuideList']['id']), array('class' => 'btn btn-info btn-xs btn-edit')); ?>

							<?php echo $this->Form->postLink('Delete', array('action' => 'delete', $tag['GuideList']['id']), array('class' => 'btn btn-danger btn-xs btn-delet'), __('Are you sure you want to delete # %s?', $tag['GuideList']['id'])); ?>
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


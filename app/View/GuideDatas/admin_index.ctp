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
		.table_cnts th {
    padding: 12px 3px !important;
}
.actions a{
		margin-bottom:5px;
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
	<h2 class="headng">Guide Data</h2>
</div>
<div class="table-responsive">
	<div class="col-sm-12">
		<div class="form_outer box" style="overflow-x:scroll;">
			<div class="up-img_sec">
				<?php echo $this->Html->link('Add GuideData', array('action' => 'add'), array('class' => 'btn btn-default')); ?>
			</div>
			<table class="table table-striped table-bordered table-condensed table-hover table_cnts">
				<thead>
					<tr>
						<th><?php echo $this->Paginator->sort('id'); ?></th>
						<th><?php echo $this->Paginator->sort('guidecreteid'); ?></th>
						<th><?php echo $this->Paginator->sort('guidecreteid(Greek)'); ?></th>
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
					<?php foreach ($GuideData as $tag): ?>
					<tr>
						<td><?php echo $tag['GuideData']['id']; ?></td>
						<td><?php echo $tag['GuideCrete']['title']; ?></td>
						<td><?php echo $tag['GuideCrete']['title_greek']; ?></td>
	                    <td><?php echo $tag['GuideData']['title']; ?></td>
	                    <td><?php echo $tag['GuideData']['title_greek']; ?></td>
						<td><?php echo $tag['GuideData']['description']; ?></td>
						<td><?php echo $tag['GuideData']['description_greek']; ?></td>
						<td><?php echo $tag['GuideData']['latitude']; ?></td>
	                    <td><?php echo $tag['GuideData']['longitude']; ?></td>
						<td><?php $imgxx = explode(",",$tag['GuideData']['image']);
						foreach ($imgxx as $value) { 
						?>
			            <img style="width:50px; height:50px;" src="<?php echo $value;?>" />
			             <?php } ?></td>
						<td class="actions">
							<?php echo $this->Html->link('View', array('action' => 'view', $tag['GuideData']['id'],$tag['GuideData']['title']), array('class' => 'btn btn-primary btn-xs btn-view')); ?>

							<?php echo $this->Html->link('Edit', array('action' => 'edit', $tag['GuideData']['id']), array('class' => 'btn  btn-xs btn-info btn-edit')); ?>
	                        
	                        <?php if($tag['GuideData']['description'] =="" || $tag['GuideData']['latitude']=="" || $tag['GuideData']['longitude']==""){

							 echo $this->Html->link('Add', array('action' => 'addbeach', $tag['GuideData']['id']), array('class' => 'btn btn-success  btn-xs btn-edit'));
							}
							?>

							<?php if($tag['GuideData']['id'] == "2"){
	                        	
							 echo $this->Html->link('Add Region', array('action' => 'addbeachregion', $tag['GuideData']['id']), array('class' => 'btn btn-success  btn-xs btn-edit'));

							 echo $this->Html->link('View Region', array('action' => 'viewbeachregion'), array('class' => 'btn btn-primary btn-xs btn-view'));
							}
							?>
	                        
							<?php echo $this->Form->postLink('Delete', array('action' => 'delete', $tag['GuideData']['id']), array('class' => 'btn btn-danger btn-xs btn-delet'), __('Are you sure you want to delete # %s?', $tag['GuideData']['id'])); ?>
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


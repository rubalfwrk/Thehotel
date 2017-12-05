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
				<?php //echo $this->Html->link('Add GuideBeache', array('action' => 'add',1), array('class' => 'btn btn-default')); ?>
			</div>
			<table class="table-striped table-bordered table-condensed table-hover">
				<tr>
					<th><?php echo $this->Paginator->sort('id'); ?></th>
					<th><?php echo $this->Paginator->sort('guidedataid'); ?></th>
                    <th><?php echo $this->Paginator->sort('title'); ?></th>
                    <th><?php echo $this->Paginator->sort('title(Greek)'); ?></th>
                    <th><?php echo $this->Paginator->sort('description'); ?></th>
                    <th><?php echo $this->Paginator->sort('description(Greek)'); ?></th>
                    <th><?php echo $this->Paginator->sort('latitude'); ?></th>
                    <th><?php echo $this->Paginator->sort('longitude'); ?></th>
                    <th><?php echo $this->Paginator->sort('image'); ?></th>
					<th class="actions">Actions</th>
				</tr>
				<?php foreach ($GuideBeache as $tag): ?>
				<tr>
					<td><?php echo $tag['GuideBeache']['id']; ?></td>
					<td><?php echo $tag['GuideBeache']['guidedataid']; ?></td>
                    <td><?php echo $tag['GuideBeache']['title']; ?></td>
                    <td><?php echo $tag['GuideBeache']['title_greek']; ?></td>
					<td><?php echo $tag['GuideBeache']['description']; ?></td>
					<td><?php echo $tag['GuideBeache']['description_greek']; ?></td>
					<td><?php echo $tag['GuideBeache']['latitude']; ?></td>
                    <td><?php echo $tag['GuideBeache']['longitude']; ?></td>
					<td><?php $imgxx = explode(",",$tag['GuideBeache']['image']);
						foreach ($imgxx as $value) { 
						?>
			            <img style="width:50px; height:50px;" src="<?php echo $value;?>" />
			             <?php } ?></td>
					<td class="actions">
						<?php echo $this->Html->link('View', array('action' => 'view', $tag['GuideBeache']['id']), array('class' => 'btn btn-default btn-xs btn-view')); ?>
						<?php echo $this->Html->link('Edit', array('action' => 'edit', $tag['GuideBeache']['id'], $tag['GuideBeache']['title']), array('class' => 'btn btn-default btn-xs btn-edit')); ?>
						<?php echo $this->Form->postLink('Delete', array('action' => 'delete', $tag['GuideBeache']['id']), array('class' => 'btn btn-danger btn-xs btn-delet'), __('Are you sure you want to delete # %s?', $tag['GuideBeache']['id'])); ?>
					</td>
				</tr>
				<?php endforeach; ?>
			</table>
		</div>
	</div>
</div>
<?php echo $this->element('pagination-counter'); ?>
<?php echo $this->element('pagination'); ?>


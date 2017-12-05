
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
	.col-sm-12 {
    width: 96%;
}
	.form_outer{
		margin-bottom:20px;
	}
</style>
<div class="container">
<div class="page_heading">
	<h2>Guide <?php echo $title; ?></h2>
</div>
<div class="row">
	<div class="col-sm-12">
		<div class="form_outer box">
			<div class="up-img_sec">
				<?php //echo $this->Html->link('Add CreteDetail', array('action' => 'add',1), array('class' => 'btn btn-default')); ?>
			</div>
			<table class="table-striped table-bordered table-condensed table-hover">
				<tr>
					<th><?php echo $this->Paginator->sort('id'); ?></th>
                    <th><?php echo $this->Paginator->sort('title'); ?></th>
                    <th><?php echo $this->Paginator->sort('title(Greek)'); ?></th>
                    <th><?php echo $this->Paginator->sort('image'); ?></th>
                    <th><?php echo $this->Paginator->sort('description'); ?></th>
                    <th><?php echo $this->Paginator->sort('description(Greek)'); ?></th>
                    <th><?php echo $this->Paginator->sort('latitude'); ?></th>
                    <th><?php echo $this->Paginator->sort('longitude'); ?></th>
                    <th><?php echo $this->Paginator->sort('created_date'); ?></th>
					<th class="actions">Actions</th>
				</tr>
				<?php foreach ($CreteDetail as $tag){ ?>
				<tr>
					<td><?php echo $tag['GuideShopping']['id']; ?></td>
                    <td><?php echo $tag['GuideShopping']['title']; ?></td>
                    <td><?php echo $tag['GuideShopping']['title_greek']; ?></td>
                    <td><?php $imgxx = explode(",",$tag['GuideShopping']['image']);
						foreach ($imgxx as $value) { 
						?>
			            <img style="width:50px; height:50px;" src="<?php echo $value;?>" />
			             <?php } ?></td>
					<td><?php echo $tag['GuideShopping']['description']; ?></td>
					<td><?php echo $tag['GuideShopping']['description_greek']; ?></td>
					<td><?php echo $tag['GuideShopping']['latitude']; ?></td>
					<td><?php echo $tag['GuideShopping']['longitude']; ?></td>
					<td><?php echo $tag['GuideShopping']['created_date']; ?></td>
					<td class="actions">
						<?php echo $this->Html->link('Edit', array('action' => 'editsub', $tag['GuideShopping']['id']), array('class' => 'btn btn-info btn-xs btn-edit')); ?>
						<?php echo $this->Form->postLink('Delete', array('controller' => 'CreteExtras','action' => 'subdelete', $tag['GuideShopping']['id']), array('class' => 'btn btn-danger btn-xs btn-delet'), __('Are you sure you want to delete # %s?', $tag['GuideShopping']['id'])); ?>
					</td>
				</tr>
				<?php } ?>
			</table>
		</div>
	</div>
</div>
<div class="pagination_sec" style="padding-left: 0px;">
	<?php echo $this->element('pagination-counter'); ?>
	<?php echo $this->element('pagination'); ?>
</div>
</div>
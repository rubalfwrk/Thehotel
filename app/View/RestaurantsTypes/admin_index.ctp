<div class="content">
<div class="restaurantsTypes index">
	<h2><?php echo __('Deal Types'); ?></h2>
    <div class="table-responsive">
    <div class="box">
	<table class="table table-bordered table-hover dataTable" cellpadding="0" cellspacing="0">
	<thead>
	<tr>
			<th><?php echo $this->Paginator->sort('id'); ?></th>
			<th><?php echo $this->Paginator->sort('name'); ?></th>
                        <th><?php echo $this->Paginator->sort('logo'); ?></th>
			<th><?php echo $this->Paginator->sort('created'); ?></th>
			<th><?php echo $this->Paginator->sort('modified'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	</thead>
	<tbody>
	<?php foreach ($restaurantsTypes as $restaurantsType): ?>
	<tr>
		<td><?php echo h($restaurantsType['RestaurantsType']['id']); ?>&nbsp;</td>
		<td><?php echo h($restaurantsType['RestaurantsType']['name']); ?>&nbsp;</td>
                <td><img src="<?php echo $this->webroot ?>/files/restaurants/<?php echo h($restaurantsType['RestaurantsType']['logo']); ?>" width="100px" height="100px"/>&nbsp;</td>
		<td><?php echo h($restaurantsType['RestaurantsType']['created']); ?>&nbsp;</td>
		<td><?php echo h($restaurantsType['RestaurantsType']['modified']); ?>&nbsp;</td>
		<td class="actions">
			
            
              <?php echo $this->Html->link(__('View'), array('action' => 'view', $restaurantsType['RestaurantsType']['id']), array('class' => 'btn btn-primary btn-xs')); ?>
			
            
            <?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $restaurantsType['RestaurantsType']['id']), array('class' => 'btn btn-success btn-xs')); ?>
            
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $restaurantsType['RestaurantsType']['id']),array('class' => 'btn btn-danger btn-xs'), array('confirm' => __('Are you sure you want to delete # %s?', $restaurantsType['RestaurantsType']['id']))); ?>
		</td>
	</tr>
<?php endforeach; ?>
	</tbody>
	</table>
    </div>
    </div>
    </div>
	<p>
	<?php
	echo $this->Paginator->counter(array(
		'format' => __('Page {:page} of {:pages}, showing {:current} records out of {:count} total, starting on record {:start}, ending on {:end}')
	));
	?>	</p>
	<div class="paging">
	<?php
		echo $this->Paginator->prev('< ' . __('previous'), array(), null, array('class' => 'prev disabled'));
		echo $this->Paginator->numbers(array('separator' => ''));
		echo $this->Paginator->next(__('next') . ' >', array(), null, array('class' => 'next disabled'));
	?>
	</div>
</div>
<div class="row">
<div class="col-sm-3">
<div class="actions action_menu">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('New Deal Type'), array('action' => 'add')); ?></li>
	</ul>
</div>
</div>
</div>

<div class="row">
<div class="col-sm-12">
<div class="dishSubcats form headng">
<?php echo $this->Form->create('DishSubcat',array('type'=>'file')); ?>
	<fieldset>
		<legend><?php echo __('Admin Add Dish Subcat'); ?></legend>
	<?php
                echo $this->Form->input('dish_catid', ['options' => $dishCategories, 'label' => 'Dish Category Name &nbsp; : &nbsp;']); 
		echo $this->Form->input('name &nbsp;',array('type'=>'text'));
                 echo $this->Form->input('image',array('type'=>'file'));
		//echo $this->Form->input('status');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>

</div>
</div>

<div class="col-sm-12">
<div class="actions action_menu">
	<h3 class="headng"><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('List Dish Subcats'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Dish Categories'), array('controller' => 'dish_categories', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Dish Category'), array('controller' => 'dish_categories', 'action' => 'add')); ?> </li>
	</ul>
</div>
</div>
</div>

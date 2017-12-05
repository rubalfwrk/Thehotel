<section class="content">

<div class="row">

<div class="col-sm-6">
<div class="box box-primary">
<div class="restaurantsTypes form">
<?php echo $this->Form->create('RestaurantsType',array('enctype'=>'multipart/form-data','type'=>'file')); ?>
    
	<fieldset>
		<legend><?php echo __('Admin Add Deal Type'); ?></legend>
	<?php
		echo $this->Form->input('name',array('required' => true));
                //echo $this->Form->input('catid',array('required' => true)); 
                echo $this->Form->input('logo', array('type' => 'file', 'class' => 'form-control', 'label' => 'Logo:'));
	?>
	
	</fieldset>
<?php //echo $this->Form->end(__('Submit')); ?> 

<?php echo $this->Form->button('Submit', array('class' => 'btn btn-primary')); ?>

</div>
</div>
</div>

<div class="col-sm-12">
<div class="actions action_menu">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('List Deal Types'), array('action' => 'index')); ?></li>
	</ul>
</div>
</div>

</div>
</section>

<style>
.restaurantsTypes.form {
    padding: 10px;
}

#RestaurantsTypeLogo {
    height: auto;
}
.input {
    width: 100%;
    float: left;
	margin-bottom: 10px;
}
label {
    width: 20%;
    float: left;
    padding-left: 0px !important;
}
.input input {
    width: 80% !important;
    float: left;
}
</style>
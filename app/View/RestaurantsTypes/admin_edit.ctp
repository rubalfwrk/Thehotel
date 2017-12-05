<section class="content">
<div class="row">
<div class="col-sm-6">
<div style="padding: 10px;" class="box">
<div class="restaurantsTypes form">
<?php echo $this->Form->create('RestaurantsType'); ?>
	<fieldset>
		<legend><?php echo __('Edit Deal Type'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('name');
                
	?>
                <div class="form-group">
                <div class="input">
                <label for="RestaurantDeals"></label>
                <div class="form-control form_img">
                    <img src="<?php echo $this->webroot;?>/files/restaurants/<?php echo $this->request->data['RestaurantsType']['logo']; ?>" width="100" height="100"/>   
                </div>
                </div>
                </div>
                 
                <div class="form-group">
                    <label>Deal Type Logo:</label>
                    <input type="file" name="data[RestaurantsType][logo]" class="form-control" id="RestaurantLogo" value="<?php echo $Cats['RestaurantsType']['logo']; ?>">
                </div>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
</div>
</div>
</section>

<div class="col-sm-12">
<div class="actions action_menu">
	<h3 class="headng"><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('RestaurantsType.id')), array(), __('Are you sure you want to delete # %s?', $this->Form->value('RestaurantsType.id'))); ?></li>
		<li><?php echo $this->Html->link(__('List Deal Types'), array('action' => 'index')); ?></li>
	</ul>
</div>
</div>
</div>

<style>
.form-group {
    width: 100%;
    float: left;
}
label {
    width: 30%;
    float: left;
}
.form-group input {
    width: 70% !important;
    float: left;
}
.input {
    width: 100%;
    float: left;
}

.form_img {
    height: 100px;
    overflow: hidden;
	border-width:0px !important;
	background: none;
}

.form_img img{
    height: 100%;
}

.form-control {
    width: 80%;
    float: left;
}

label {
    width: 20%;
    float: left;
}

#RestaurantLogo{height:auto;}
</style>
 <section class="content-header">
        <h1>
            Dashboard
            <small>Control panel</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Dashboard</li>
        </ol>
    </section>
 <section class="content">
      <div class="row">
        <div class="col-xs-6">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Deal Type</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
<table class="table table-bordered table-hover dataTable" cellspacing="0" cellpadding="0">
        <tr>
            <th scope="row"><?php echo __('Id'); ?></th>
            <td><?php echo h($restaurantsType['RestaurantsType']['id']); ?>&nbsp;</td>
        </tr>
        <tr>
            <th scope="row"><?php echo __('Name'); ?></th>
            <td><?php echo h($restaurantsType['RestaurantsType']['name']); ?>&nbsp;</td>
        </tr>
        <tr>
            <th scope="row"><?= __('Logo') ?></th>
            <td><img src="<?php echo $this->webroot;?>/files/restaurants/<?php echo h($restaurantsType['RestaurantsType']['logo']); ?>" width="100" height="100"/></td>
        </tr>
        <tr>
            <th scope="row"><?php echo __('Created'); ?></th>
            <td><?php echo h($restaurantsType['RestaurantsType']['created']); ?>&nbsp;</td>
        </tr>
        <tr>
            <th scope="row"><?php echo __('Modified'); ?></th>
            <td><?php echo h($restaurantsType['RestaurantsType']['modified']); ?>
			&nbsp;</td>
        </tr>
        
    </table>
 
</div>
 </div>
</div>
<div class="col-sm-12">
<div class="actions action_menu">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Deal Type'), array('action' => 'edit', $restaurantsType['RestaurantsType']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Deal Type'), array('action' => 'delete', $restaurantsType['RestaurantsType']['id']), array(), __('Are you sure you want to delete # %s?', $restaurantsType['RestaurantsType']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Deal Types'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Deal Type'), array('action' => 'add')); ?> </li>
	</ul>
</div>
</div>
 </div>

</section>


<div class="row">
<!--<div class="col-sm-3">
<div class="restaurantsTypes view">
<h2><?php //echo __('Deal Type'); ?></h2>

	<dl>
		<dt><?php// echo __('Id'); ?></dt>
		<dd>
			<?php //echo h($restaurantsType['RestaurantsType']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php// echo __('Name'); ?></dt>
		<dd>
			<?php //echo h($restaurantsType['RestaurantsType']['name']); ?>
			&nbsp;
		</dd>
                <dt><?php //echo __('Logo'); ?></dt>
		<dd>
                    <img src="<?php //echo $this->webroot ?>/files/restaurants/<?php echo h($restaurantsType['RestaurantsType']['logo']); ?>" width="100px" height="100px"/>
			&nbsp;
		</dd>
		<dt><?php //echo __('Created'); ?></dt>
		<dd>
			<?php //echo h($restaurantsType['RestaurantsType']['created']); ?>
			&nbsp;
		</dd>
		<dt><?php //echo __('Modified'); ?></dt>
		<dd>
			<?php //echo h($restaurantsType['RestaurantsType']['modified']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
</div>-->

</div>
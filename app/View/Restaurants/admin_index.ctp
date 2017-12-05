 <!-- Content Header (Page header) -->
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
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Deals</h3>
            </div>
    <div class="main-content">
        <?php $x = $this->Session->flash(); ?>
        <?php if ($x) { ?>
            <div class="alert success">
                <span class="icon"></span>
                <strong></strong><?php echo $x; ?>
            </div>
        <?php }  if($loggedUserRole!='rest_admin'){ ?>
        
         <div class="btn-toolbar list-toolbar">
            <?php echo $this->Form->create('Restaurant', array()); ?>
            <div class="col-lg-2">
                <?php
                echo $this->Form->input('filter', array(
                    'label' => false,
                    'class' => 'form-control',
                    'options' => array(
                        'name' => 'Name'
                        
                    ),
                    'selected' => $all['filter']
                ));
                ?>

            </div>
            <div class="col-lg-2">
                <?php echo $this->Form->input('name', array('label' => false, 'id' => false, 'type' => 'text', 'class' => 'form-control', 'value' => $all['name'])); ?>

            </div>
            <div class="col-lg-4">
                <?php
                echo $this->Form->button('Search', array('class' => 'btn btn-default'));
                echo $this->Form->end();
                ?>
                &nbsp; &nbsp;
                <?php echo $this->Html->link('View All', array('controller' => 'restaurants', 'action' => 'reset', 'admin' => true), array('class' => 'btn btn-danger')); ?>

            </div><br/><br/>
            <div class="btn-group">     
            </div>
        </div>
        <?php } echo $this->Form->create('Restaurant', array("action" => "deleteall", 'id' => 'mbc')); ?>
        <div class="restaurants index">
            <table class="table table-bordered table-hover dataTable" cellpadding="0" cellspacing="0">
                <thead>
                    <tr>
                        <th class="admin_check_b" width="1%"><input type="checkbox" id="selectall" onClick="selectallCHBox();" /></th>
                        <th width="1%"><?php echo $this->Paginator->sort('id'); ?></th>
                        <th width="8%"><?php echo $this->Paginator->sort('logo'); ?></th>
                        <th width="10%"><?php echo $this->Paginator->sort('name'); ?></th>
                        <th width="10%"><?php echo $this->Paginator->sort('Category Name'); ?></th>
                        <th width="10%"><?php echo $this->Paginator->sort('Marker'); ?></th>
                        <!-- <th><?php echo $this->Paginator->sort('street'); ?></th>
                        <th><?php echo $this->Paginator->sort('city'); ?></th>
                        <th><?php echo $this->Paginator->sort('state'); ?></th>
                        <th><?php echo $this->Paginator->sort('zip'); ?></th>
                        <th><?php echo $this->Paginator->sort('country'); ?></th> -->
                        <th width="15%">Address</th>
                        <th width="10%"><?php echo $this->Paginator->sort('created'); ?></th>
                        <th width="25%" class="actions"><?php echo __('Actions'); ?></th>
                    </tr>
                </thead>
                <tbody>
<?php //print_r($restaurants);exit;?> 
                    <?php foreach ($restaurants as $restaurant): ?>
                        <tr>
                            <td><?php echo $this->Form->checkbox("res" + $restaurant['Restaurant']['id'], array('value' => $restaurant['Restaurant']['id'], 'class' => 'chechid')); ?></td>

                            <td><?php echo h($restaurant['Restaurant']['id']); ?>&nbsp;</td>
                            <td><?php
                                $restaurantPath = '/files/restaurants/';
                                echo $this->Html->image($restaurantPath . $restaurant['Restaurant']['logo'], array('alt' => 'Restaurant Logo', 'width' => 60));
                                ?> &nbsp;</td>
                            <?php // print_r($restaurant); ?>
                            <td><?php echo h($restaurant['Restaurant']['name']); ?>&nbsp;</td>
                            <td><?php echo h($restaurant['Cat']['rest_type']); ?>&nbsp;</td>
                            <td><?php
                                $restaurantPath = '/files/restaurants/';
                                echo $this->Html->image($restaurantPath . $restaurant['Restaurant']['marker'], array('alt' => 'Restaurant Logo', 'width' => 60));
                                ?> &nbsp;</td>
                            <td><?php echo h($restaurant['Restaurant']['address']); ?>&nbsp;</td>
                            <td>
                                <?php echo h($restaurant['Restaurant']['created']); ?>&nbsp;
                            <td class="actions">
                                <?php echo $this->Html->link(__('View'), array('action' => 'view', $restaurant['Restaurant']['id']), array('class' => 'view1 btn btn-default btn-xs')); ?>

                                <?php echo $this->Html->link(__('Edit'), array('action' => 'edit/' . $restaurant['Restaurant']['id'] . '/' . $restaurant['Restaurant']['user_id']), array('class' => 'edit1 btn btn-primary btn-xs')); ?>
                                
                                    <?php 
                                    if($loggedUserRole!='rest_admin'){ 
                                    echo $this->Html->link(__('Delete'), array('action' => 'delete', $restaurant['Restaurant']['id']), array('class' => 'delete1 btn btn-danger btn-xs'), __('Are you sure you want to delete # %s?', $restaurant['Restaurant']['id']));
                                    
//                                if ($restaurant['Restaurant']['status'] == 0) {
//                                    echo $this->Html->link(('Activate'), array('Controller' => 'Restaurants', 'action' => 'admin_activate', $restaurant['Restaurant']['id']), array('escape' => false, 'class' => 'active1 btn btn-warning btn-xs', 'title' => 'Active'));
//                                } else {
//                                    echo $this->Html->link(('Block'), array('controller' => 'Restaurants', 'action' => 'admin_deactivate', $restaurant['Restaurant']['id']), array('escape' => false, 'class' => 'deactive1 btn btn-warning btn-xs', 'title' => 'Block'));
//                                }
                                ?>  
 <?php } ?>  
                                <?php //echo $this->Html->link(__('Gallery'), array('action' => 'uploadresimage/' . $restaurant['Restaurant']['id']), array('class' => 'edit1 btn btn-info btn-xs')); ?>
                               
  
                      
                                <?php //echo $this->Html->link('View all Product', array('controller' => 'products', 'action' => 'resindex', $restaurant['Restaurant']['id']), array('class' => 'btn btn-success btn-xs success_edt')); ?>

                            </td>
 
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
        <?php echo $this->Form->end(); 
         if($loggedUserRole!='rest_admin'){ 
        ?>
        <div class="bottom_button">
            <button class="btn btn-sm btn-success delete_all" name="delete" value="Activate" onclick=" <?php if (@$url[2] == 'restaurant') { ?>$('#mbc').attr({'action': './activateall'});<?php } else { ?>$('#mbc').attr({'action': 'restaurants/activateall'});<?php } ?>$('#mbc').submit();"><?php echo __("Activate All") ?></button>

            <button class="btn btn-sm btn-default delete_all" name="delete" value="Deactivate" onclick=" <?php if (@$url[2] == 'restaurant') { ?>$('#mbc').attr({'action': './inactivateall'});<?php } else { ?>$('#mbc').attr({'action': 'restaurants/inactivateall'});<?php } ?>$('#mbc').submit();"><?php echo __("Deactivate All") ?></button>

            <button onclick="$('#mbc').submit();" value="Delete" class="btn btn-sm btn-danger delete_all"><?php echo __("DeleteAll"); ?></button>

            <ul class="paginator_Admin">
                <div class="first_button1"><?php echo $this->Paginator->prev('Previous ', null, null, array('class' => 'disabled')); ?></div>
                <?php echo $this->Paginator->numbers(); ?>
                <div class="first_button1"><?php echo $this->Paginator->next(' Next ', null, null, array('class' => 'disabled')); ?></div>
            </ul>
        </div>
         <?php }?>
   </div>
 </div>
</div>
 </div>

</section>
<style type="text/css">
    .search_username{margin-top: -3%;}
</style>
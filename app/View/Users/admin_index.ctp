<style type="text/css">
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

<h2 class="headng">Users</h2>
<?php echo $this->Session->flash(); ?>
<div class="table-responsive">
         <?php //print_r($loggeduserrole); exit;
     echo $this->Form->create('User', array()); ?>
    <div class="col-lg-2"> 
       <?php echo  $this->Form->input('search',array('type'=>'text','class'=>'form-control','label'=>false,'placeholder'=>'Enter Username')); ?>
</div>       
   <div class="col-lg-4">
        <?php echo $this->Form->button('Search', array('class' => 'btn btn-default')); ?>
        &nbsp; &nbsp;
        <?php echo $this->Html->link('View All', array('controller' => 'users', 'action' => 'index', 'admin' => true), array('class' => 'btn btn-danger')); ?>  
            
    </div><br/><br/>
    <div class="col-md-12">
        <div class="form_outer box">            
<table class="table table-striped table-bordered table-condensed table-hover table_cnts">
    <tr>

        <th><?php echo $this->Paginator->sort('role');?></th>
        <th><?php echo $this->Paginator->sort('name');?></th>
        <th><?php echo $this->Paginator->sort('email');?></th>
        <th><?php echo $this->Paginator->sort('username');?></th>
        <th><?php echo $this->Paginator->sort('date');?></th>
        <th class="actions">Actions</th>
    </tr>
    <?php if($loggeduserrole == "rest_admin"){ ?>
    <?php foreach ($users as $user): ?>
    <tr>
        <td><?php echo h($user['User']['role']); ?></td>
        <td><?php echo h($user['User']['reservationname']); ?></td>
        <td><?php echo h($user['User']['username']); ?></td>
        <td><?php echo h($user['User']['email']); ?></td>
        <td><?php echo h($user['User']['created_date']); ?></td>
        <td class="actions">
        
        <?php if ($user['User']['chat_status'] == '0') { ?>
            <?php echo $this->Html->link('Chat On', array('action' => 'activate', $user['User']['id']), array('class' => 'btn btn-primary btn-xs'));
                                    ?><?php } else { ?>
              <?php echo $this->Html->link('Chat Off', array('action' => 'deactivate', $user['User']['id']), array('class' => 'btn btn-primary btn-xs'));
            ?><?php } ?>
            
            <?php echo $this->Html->link('View', array('action' => 'admin_view', $user['User']['id']), array('class' => 'btn btn-primary btn-xs')); ?>
            <?php echo $this->Html->link('Chat', array('action' => 'admin_chat', $user['User']['id']), array('class' => 'btn btn-primary btn-xs')); ?>

            <?php echo $this->Html->link('Questionnaires', array('action' => 'admin_questionnaires', $user['User']['id']), array('class' => 'btn btn-primary btn-xs')); ?>
            &nbsp;
        </td>
    </tr>
    <?php endforeach; } else { ?>
    <?php foreach ($users as $user): ?>
    <tr>
        <td><?php echo h($user['User']['role']); ?></td>
        <td><?php echo h($user['User']['reservationname']); ?></td>
        <td><?php echo h($user['User']['username']); ?></td>
        <td><?php echo h($user['User']['email']); ?></td>
        <td><?php echo h($user['User']['created_date']); ?></td>
        <td class="actions">
            <?php echo $this->Html->link('View', array('action' => 'admin_view', $user['User']['id']), array('class' => 'btn btn-primary btn-xs')); ?>
            <?php echo $this->Form->postLink('Delete User', array('action' => 'delete', $user['User']['id']), array('class' => 'btn btn-primary btn-xs'), __('Are you sure you want to delete # %s?', $user['User']['username'])); ?>
            <?php echo $this->Html->link('Questionnaires', array('action' => 'admin_questionnaires', $user['User']['id']), array('class' => 'btn btn-primary btn-xs')); ?>
        </td>
    </tr>
    <?php endforeach; } ?>
</table>
        </div>
    </div>
</div>
<br />
<div class="pagination_sec">
<?php echo $this->element('pagination-counter'); ?>
<?php echo $this->element('pagination'); ?>
</div>

<style type="text/css">
    h2.headng{
        margin-top: 0px;
        padding-top: 20px;
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
    .pagination_sec .paging span a{
        color: #fff;
    }
	.btn.btn-primary.btn-xs {
    margin-bottom: 3px;
}
</style>
<h2 class="headng">Hotels</h2>
<div class="table-responsive">
         
    <?php 
     echo $this->Form->create('User', array()); ?>
    <div class="col-lg-5"> 
       <?php echo  $this->Form->input('search',array('type'=>'text','class'=>'form-control','label'=>false,'placeholder'=>'Enter Hotelname')); ?>
    </div>       
    <div class="col-lg-4">
        <?php echo $this->Form->button('Search', array('class' => 'btn btn-default')); ?>
        &nbsp; &nbsp;
        <?php echo $this->Html->link('View All', array('controller' => 'hotels', 'action' => 'hotel', 'admin' => true), array('class' => 'btn btn-danger')); ?>  
            
    </div><br/><br/>
    <div style="padding: 0px 15px">
    <div class="form_outer box">
        <table class="table table-striped table-bordered table-condensed table-hover table_cnts">
            <thead>
                <tr>
                    <th><?php echo $this->Paginator->sort('Hotel Name');?></th>
                    <th><?php echo $this->Paginator->sort('Hotel code');?></th>
                    <th><?php echo $this->Paginator->sort('Group Name');?></th>
                    <th><?php echo $this->Paginator->sort('Date');?></th>
                    <th style="width: 35%;" class="actions">Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php if($admincode['User']['role'] == 'admin' ){ ?>
                <?php foreach ($users as $user): ?>
                <tr>
                    <td><?php echo h($user['Addhotel']['hotelname']); ?></td>
                    <td><?php echo h($user['Addhotel']['code']); ?></td>
                    <td><?php echo h($user['Addhotel']['groupname']); ?></td>
                    <td><?php echo h($user['Addhotel']['created_date']); ?></td>
                    <td class="actions">

                        <?php echo $this->Html->link('View', array('action' => 'admin_view', $user['Addhotel']['id']), array('class' => 'btn btn-primary btn-xs')); ?>

                        <?php echo $this->Html->link('Change Home Background', array('controller' => 'staticpages', 'action' => 'background', $user['Addhotel']['id'], 'admin' => true), array('class' => 'btn btn-primary btn-xs')); ?>

                        <?php echo $this->Html->link('Hotel Info', array('controller'=>'Addhotels','action' => 'admin_addhotelinfo', $user['Addhotel']['id']), array('class' => 'btn btn-primary btn-xs')); ?>

                        <?php echo $this->Html->link('About the Hotel', array('action' => 'admin_about', $user['Addhotel']['id']), array('class' => 'btn btn-primary btn-xs')); ?>

                        <?php echo $this->Html->link('Services', array('controller'=>'Services','action' => 'admin_index', $user['Addhotel']['id']), array('class' => 'btn btn-primary btn-xs')); ?>

                        <?php echo $this->Html->link('Facilities',  array('controller'=>'Facilities','action' => 'admin_index', $user['Addhotel']['id']), array('class' => 'btn btn-primary btn-xs')); ?>

                        <?php echo $this->Html->link('Accommodation', array('controller'=>'Accommodations','action' => 'admin_index', $user['Addhotel']['id']), array('class' => 'btn btn-primary btn-xs')); ?>

                        <?php echo $this->Html->link('Social Media', array('controller'=>'Socials','action' => 'admin_index', $user['Addhotel']['id']), array('class' => 'btn btn-primary btn-xs')); ?>

                        <?php echo $this->Html->link('Questionnaire',  array('controller'=>'Questionnaires','action' => 'admin_index', $user['Addhotel']['id']), array('class' => 'btn btn-primary btn-xs')); ?>

                        <?php echo $this->Html->link('Contact Us', array('controller'=>'Contacts','action' => 'admin_index', $user['Addhotel']['id']), array('class' => 'btn btn-primary btn-xs'));?>

                    </td>
                </tr>
                <?php endforeach; } else {?>
                <?php foreach ($users as $user):
                if($admincode['User']['code'] == $user['Addhotel']['code']) {
                 ?>
                
                <tr>
                    <td><?php echo h($user['Addhotel']['hotelname']); ?></td>
                    <td><?php echo h($user['Addhotel']['code']); ?></td>
                    <td><?php echo h($user['Addhotel']['groupname']); ?></td>
                    <td><?php echo h($user['Addhotel']['created_date']); ?></td>
                    <td class="actions">
                        <?php echo $this->Html->link('View', array('action' => 'admin_view', $user['Addhotel']['id']), array('class' => 'btn btn-primary btn-xs')); ?>

                    </td>
                </tr>
            <?php  } endforeach; } ?>
            </tbody>
    </table>
    </div>
    </div>
</div>
<div class="pagination_sec">    
    <?php echo $this->element('pagination-counter'); ?>
    <?php echo $this->element('pagination'); ?>
</div>

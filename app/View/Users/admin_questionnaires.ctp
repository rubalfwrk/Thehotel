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
<h2 class="headng">Questionnaires</h2>
<div class="table-responsive">

    <div class="col-lg-2"> 
       <?php echo  $this->Form->input('search',array('type'=>'text','class'=>'form-control','label'=>false,'placeholder'=>'Enter Keyword')); ?>
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

        <th><?php echo $this->Paginator->sort('category');?></th>
        <th><?php echo $this->Paginator->sort('category_greek');?></th>
        <th><?php echo $this->Paginator->sort('question');?></th>
        <th><?php echo $this->Paginator->sort('question_greek');?></th>
        <th><?php echo $this->Paginator->sort('answer');?></th>
        <th><?php echo $this->Paginator->sort('date');?></th>
        
    </tr>
    
    <?php
    foreach ($question as $user){  ?>
    	 
    <tr>
        <td><?php echo h($user['questionnaires']['category']); ?></td>
        <td><?php echo h($user['questionnaires']['category_greek']); ?></td>
        <td><?php echo strip_tags($user['questionnaires']['question']); ?></td>
        <td><?php echo strip_tags($user['questionnaires']['question_greek']); ?></td>
        <td><?php echo strip_tags($user['questionnaires_answers']['answer']); ?></td>        
        <td><?php echo h($user['questionnaires']['created_date']); ?></td>
    </tr>
    <?php } ?>
     <tr>

        <th><?php echo $this->Paginator->sort('comment');?></th>
        <th><?php echo $this->Paginator->sort('rating');?></th>
    </tr>
     <tr>
        <th><?php echo h($comment['Rating']['comments']); ?></th>
        <th><?php echo h($comment['Rating']['rating']); ?></th>
    </tr>
</table>
        </div>
    </div>
</div>
<br />
<div class="pagination_sec">
<?php echo $this->element('pagination-counter'); ?>
<?php echo $this->element('pagination'); ?>
</div>


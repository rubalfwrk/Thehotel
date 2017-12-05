<?php //print_r($users); ?>

<style>
	label{
		width:100%;
		float:left;
	}
	.form_outer form .form-control{
		width:auto;
		float:left;
		margin-right:4px;
	}
	.form_outer form .btn{
		float:left;
	}
</style>

<div class="container">
	<h2>Add chat</h2>

<div class="row">
	<div class="col-sm-12 padding" >
		<div class="form_outer">
        <table class="table table-striped table-bordered dataTable no-footer">
        <tr>
        <th>ID</th>
          <th>Email</th>
           <th>Checked</th>
        </tr>
        <?php echo $this->Form->create('chat'); ?> 
        <?php foreach($users as $usersx): ?>
        <tr>
           <td ><?php echo $this->Form->input('uid', array('label'=>'userid','class' => 'form-control','value'=>$usersx['User']['id'])); ?></td>
           <td ><?php echo $this->Form->input('email', array('class' => 'form-control','value'=>$usersx['User']['email'])); ?></td>
          <td><?php echo $this->Form->input('checkbox'.$usersx['User']['id'],array('label'=>false,'type'=>'checkbox','value'=>$usersx['User']['id'],'name' => 'box[]' ,'id'=>$usersx['User']['id'],'div' => false)); echo $usersx['User']['id'];?></td>
        </tr>
        
        <?php endforeach; ?>
        <tr><td colspan="1"><?php echo $this->Form->input('msg', array('label'=>'message','type'=>'text','class' => 'form-control')); ?></td>
        </tr>
        </table>
  
            
			<?php echo $this->Form->button('Submit', array('class' => 'btn btn-primary')); ?>
			<?php echo $this->Form->end(); ?>
		</div>
    </div>
</div>
</div>
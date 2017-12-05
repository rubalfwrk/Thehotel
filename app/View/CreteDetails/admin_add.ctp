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
<div class="page_heading">
	<h2>Add CreteDetail</h2>
</div>
<div class="row">
	<div class="col-sm-5">
		<div class="form_outer">
			<?php echo $this->Form->create('CreteDetail',array('type'=>'file')); ?> 
			<?php echo $this->Form->input('id'); ?>
            <?php //echo $this->Form->input('guidecreteid', array('class' => 'form-control','options' => $GuideCretelist)); ?>
            <?php echo $this->Form->input('creteid',array('value'=>$idx,'type' => 'hidden'));//, array('type' => 'hidden') ?>
			<?php echo $this->Form->input('title', array('class' => 'form-control')); ?>
             <?php echo $this->Form->input('image', array('class' => 'form-control','type'=>'file')); ?>
            <?php echo $this->Form->input('description', array('class' => 'form-control')); ?>
			<?php echo $this->Form->button('Submit', array('class' => 'btn btn-primary')); ?>
			<?php echo $this->Form->end(); ?>
		</div>
    </div>
</div>
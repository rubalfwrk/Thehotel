<style>
	label{
		width:100%;
		float:left;
	}
	.form_outer form .form-control{
		width:auto;
		float:left;
		margin-right:6px;
	}
	.form_outer form .btn{
		float:left;
	}
</style>
<div class="page_heading">
	<h2>Add Sub Menus </h2>
</div>
<div class="row">
	<div class="col-sm-5">
		<div class="form_outer box">
			<?php echo $this->Form->create('Gastronomy',array('type'=>'file')); ?>
			<?php echo $this->Form->input('title', array('class' => 'form-control')); ?>
			<?php echo $this->Form->input('title_greek', array('class' => 'form-control')); ?>
            <?php echo $this->Form->input('description', array('class' => 'form-control')); ?>
            <?php echo $this->Form->input('description_greek', array('class' => 'form-control')); ?>
            <?php echo $this->Form->input('image', array('class' => 'form-control','required','type'=> 'file' )); ?>
			<?php echo $this->Form->button('Submit', array('class' => 'btn btn-primary')); ?>
			<?php echo $this->Form->end(); ?>
		</div>
    </div>
</div>
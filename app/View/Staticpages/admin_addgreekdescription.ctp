<style>
	.form_outer{
		margin-bottom:20px;
	}
	div.input{
		width: 100%;
		display: table;
		margin-bottom: 15px;
	}
	label{
		width: 100%;
		float: left;
		margin-bottom: 11px;
		padding: 0px !important;
	}
	.btn-primary{
		float: left;
	}
	.speacer{
		width: 100%;
		display: table;
		padding-bottom: 15px;
	}
</style>
<div class="page_heading">
	<h2 class="headng">Add Greek Description</h2>
</div>
<div class="table-responsive">
	<div class="col-sm-5">
		<div class="form_outer box">
			<?php echo $this->Form->create('GreekDescription',array('type'=>'file','enctype'=>'multipart/form-data','accept-charset'=>"utf-8" )); ?> 
			<?php echo $this->Form->input('id'); ?>

			<?php echo $this->Form->input('english', array('class' => 'form-control')); ?>
            <?php echo $this->Form->input('pronunciation', array('type'=>'text','class' => 'form-control')); ?>
            <?php echo $this->Form->input('greek', array('class' => 'form-control')); ?>
			<?php echo $this->Form->button('Submit', array('class' => 'btn btn-primary')); ?>
			<div class="speacer"></div>
			<?php echo $this->Form->end(); ?>
		</div>
	</div>
</div>


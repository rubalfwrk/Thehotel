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
	}
	.btn-primary{
		float: left;
	}
</style>
<div class="page_heading">
	<h2 class="headng">Edit Guide Crete</h2>
</div>
<div class="table-responsive">
	<div class="col-sm-5">
		<div class="form_outer box">
			<?php echo $this->Form->create('GuideSightseeing',array('type'=>'file')); ?> 
			<?php echo $this->Form->input('id'); ?>
			<?php echo $this->Form->input('title', array('class' => 'form-control')); ?>
			<?php echo $this->Form->input('title_greek', array('class' => 'form-control')); ?>
            <?php echo $this->Form->input('image', array('class' => 'form-control','type'=>'file')); ?>
            <img style="width:200px; height:200px;" src="<?php echo $imagexx;?>" />
			<?php echo $this->Form->input('description', array('class' => 'form-control')); ?>
			<?php echo $this->Form->input('description_greek', array('class' => 'form-control')); ?>
			<?php echo $this->Form->input('latitude', array('class' => 'form-control')); ?>
			<?php echo $this->Form->input('longitude', array('class' => 'form-control')); ?>
			<?php echo $this->Form->button('Submit', array('class' => 'btn btn-primary')); ?>
			<?php echo $this->Form->end(); ?>
		</div>
	</div>
</div>


<style>
	.form_outer{
		margin-bottom:20px;
	}
	div.input{
		margin-bottom: 15px;
	}
	label{
		width: 100%;
		display: table;
		margin-bottom: 11px;
		padding: 0px !important;
	}
	.btn-primary{
		float: left;
	}
</style>
<div class="page_heading">
	<h2 class="headng">Edit Welcometocrete</h2>
</div>
<div class="table-responsive">
	<div class="col-sm-5">
		<div class="form_outer box">
			<?php echo $this->Form->create('Welcometocrete',array('type' => 'file','role'=>'form')); ?> 
			<?php echo $this->Form->input('id'); ?>
			<?php echo $this->Form->input('image', array('class' => 'form-control',"name"=>"data[Welcometocrete][image][]",'type'=>'file','multiple' => 'true')); ?>
			
            <div class="input textare">	
            	<label>Description</label>
             	<?php echo $this->Form->textarea('text', array('class' => 'form-control')); ?>
            </div>
            <div class="input textare">	
            	<label>Description(Greek)</label>
             	<?php echo $this->Form->textarea('text_greek', array('class' => 'form-control')); ?>
            </div>
            <?php echo $this->Form->button('Submit', array('class' => 'btn btn-primary')); ?>
			<?php echo $this->Form->end(); ?>
		</div>
	</div>
</div>


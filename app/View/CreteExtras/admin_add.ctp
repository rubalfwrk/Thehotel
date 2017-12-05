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
	.btn-primary {
    float: left;
    margin-bottom: 14px;
}
	.speacer{
		width: 100%;
		display: table;
		padding-bottom: 15px;
	}
</style>
<div class="page_heading">
	<h2 class="headng">Add Crete Extra</h2>
</div>
<div class="table-responsive">
	<div class="col-sm-5">
		<div class="form_outer box">
			<?php echo $this->Form->create('CreteExtra',array('type'=>'file')); ?> 
			<?php echo $this->Form->input('id'); ?>
            <?php //echo $this->Form->input('creteextraid', array('class' => 'form-control','options' => $GuideCretelist)); ?>
            <?php //echo $this->Form->input('guidecreteid',array('value'=>$idx,'type' => 'text'));//, array('type' => 'hidden') ?>
			<?php echo $this->Form->input('title', array('class' => 'form-control')); ?>
			<?php echo $this->Form->input('title_greek', array('class' => 'form-control')); ?>
             <?php echo $this->Form->input('image', array('class' => 'form-control','type'=>'file')); ?>
            <?php echo $this->Form->input('Sub_category', array('class' => 'form-control')); ?>
            <?php echo $this->Form->input('Sub_category_greek', array('class' => 'form-control')); ?>
             <label>Sub Category Images</label>
			<?php echo $this->Form->input('Sub_category_image.', array('class' => 'form-control','type'=>'file','multiple' => 'true')); ?>
            <?php echo $this->Form->input('description', array('type'=>'textarea','class' => 'form-control')); ?>
            <?php echo $this->Form->input('description_greek', array('type'=>'textarea','class' => 'form-control')); ?>
             <?php echo $this->Form->input('latitude', array('class' => 'form-control')); ?>
             <?php echo $this->Form->input('longitude', array('class' => 'form-control')); ?>
			<?php echo $this->Form->button('Submit', array('class' => 'btn btn-primary')); ?>
			<?php echo $this->Form->end(); ?>
		</div>
	</div>
</div>
<div class="speacer"></div>

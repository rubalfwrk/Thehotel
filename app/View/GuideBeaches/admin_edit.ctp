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
	<h2>Edit GuideBeach</h2>
</div>
<section class="content">
<div class="row">
    <div class="col-sm-8">
    <div class="box box-primary">
		<div class="form_outer">
        <div class="box-body">
			<?php echo $this->Form->create('GuideBeache',array('type'=>'file')); ?> 
			<?php echo $this->Form->input('id'); ?>
            <?php echo $this->Form->input('guidecreteid',array('type'=>'hidden')); ?>
			<?php echo $this->Form->input('title', array('class' => 'form-control')); ?>
			<?php echo $this->Form->input('title_greek', array('class' => 'form-control')); ?>
             <?php echo $this->Form->input('image.', array('class' => 'form-control','type'=>'file','multiple' => 'true')); ?>
             <?php foreach ($imagexx as $value) { ?>
             <img style="width:200px; height:200px; margin-bottom:10px;" src="<?php echo $value;?>" />
             <?php } ?>
             <label>Description</label>
             <?php echo $this->Form->textarea('description', array('class' => 'form-control')); ?>
             <label>Description(Greek)</label>
             <?php echo $this->Form->textarea('description_greek', array('class' => 'form-control')); ?>
             <?php echo $this->Form->input('latitude', array('class' => 'form-control')); ?>
             <?php echo $this->Form->input('longitude', array('class' => 'form-control')); ?>
			<?php echo $this->Form->button('Submit', array('class' => 'btn btn-primary')); ?>
			<?php echo $this->Form->end(); ?>
		</div>
    </div>
</div>
</div>
</div>
</section>
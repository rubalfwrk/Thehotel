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
	#GuideCreteImage {
  height: auto;
  margin-bottom: 17px;
}
#GuideCreteTitle {
  margin-bottom: 17px;
}
#GuideCreteTitleGreek {
  margin-bottom: 17px;
}
</style>
<section class="content-header">
	<h2>Edit Guide Crete</h2>
</section>
<section class="content">
<div class="table-responsive">
	<div class="col-sm-5">
		<div class="box box-primary">
        <div class="box-body">
			<?php echo $this->Form->create('GuideCrete',array('type'=>'file')); ?> 
			<?php echo $this->Form->input('id'); ?>
			<?php echo $this->Form->input('title', array('class' => 'form-control')); ?>
			<?php echo $this->Form->input('title_greek', array('class' => 'form-control')); ?>
            <?php echo $this->Form->input('image', array('class' => 'form-control','type'=>'file')); ?>
            <div class="image_full">
            <img style="width:200px; height:200px;" src="<?php echo $imagexx;?>" />
			<span style="width:100%;float:left;padding-top:15px;"><?php echo $this->Form->button('Submit', array('class' => 'btn btn-primary')); ?></span>
			<?php echo $this->Form->end(); ?>
		</div>
	</div>
</div>
</div>
</div>
</section>

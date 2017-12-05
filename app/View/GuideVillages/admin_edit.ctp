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
		float: right;
	}
	.speacer{
		width: 100%;
		display: table;
		padding-bottom: 15px;
	}
</style>
<div class="page_heading">
	<h2 class="headng">Edit Guide Village</h2>
</div>
<div class="table-responsive">
	<div class="col-sm-5">
		<div class="form_outer box">
			<?php echo $this->Form->create('GuideVillage',array('type'=>'file')); ?> 
			<?php echo $this->Form->input('id'); ?>
            <?php echo $this->Form->input('guidelistid', array('class'=>'form-control', 'type'=>'hidden')); ?>
            <?php echo $this->Form->input('region', array('class' => 'form-control')); ?>
			<?php echo $this->Form->input('region_greek', array('class' => 'form-control')); ?>
			<?php echo $this->Form->input('title', array('class' => 'form-control')); ?>
			<?php echo $this->Form->input('title_greek', array('class' => 'form-control')); ?>
             <?php echo $this->Form->input('image.', array('class' => 'form-control','type'=>'file','multiple' => 'true')); ?>
             <?php foreach ($imagexx as $value) { ?>
             <img style="width:200px; height:200px;" src="<?php echo $value;?>" />
             <?php } ?>
             <?php echo $this->Form->input('description', array('class' => 'form-control')); ?>
             <label>Description(Greek)</label>
             <?php echo $this->Form->textarea('description_greek', array('class' => 'form-control')); ?>
             <?php echo $this->Form->input('latitude', array('class' => 'form-control')); ?>
             <?php echo $this->Form->input('longitude', array('class' => 'form-control')); ?>
			<?php echo $this->Form->button('Submit', array('class' => 'btn btn-primary')); ?>
			<div class="speacer"></div>
			<?php echo $this->Form->end(); ?>
		</div>
	</div>
</div>


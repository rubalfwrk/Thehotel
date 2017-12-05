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
		margin-bottom: 15px;
	}
	.speacer{
		width: 100%;
		display: table;
		padding-bottom: 15px;
	}
</style>
<div class="page_heading">
	<h2 class="headng">Add Data</h2>
</div>
<div class="table-responsive">
 <?php $x = $this->Session->flash(); ?>
                    <?php if ($x) { ?>
                    <div class="alert success">
                        <span class="icon"></span>
                        <strong></strong><?php echo $x; ?>
                    </div>
                    <?php } ?>
	<div class="col-sm-5">
		<div class="form_outer">
		
			<?php echo $this->Form->create('BeachRegion',array('type'=>'file')); ?> 
			<?php echo $this->Form->input('id'); ?>
			<?php echo $this->Form->input('region', array('class' => 'form-control')); ?>
			<?php echo $this->Form->input('region_greek', array('class' => 'form-control')); ?>
            <?php echo $this->Form->input('regionimage', array('class' => 'form-control','type'=>'file')); ?>
			<?php echo $this->Form->button('Submit', array('class' => 'btn btn-primary')); ?>
			<?php echo $this->Form->end(); ?>
		</div>
	</div>
</div>
<div class="speacer"></div>

<style>
	.up-img_sec{
		margin-bottom: 15PX;
		text-align: right;
	}
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
	.headng{
		margin-top: 0px;
		padding-top: 15px; 
	}
</style>
<div class="page_heading">
	<h2 class="headng">Add Service</h2>
</div>
<div class="table-responsive">
	<div class="col-sm-5">
		<div class="form_outer box">
			<?php echo $this->Form->create('Service'); ?> 
			<?php echo $this->Form->input('hotelid',array('value'=>$idx,'type' => 'hidden'));//, array('type' => 'hidden') ?>
			<?php echo $this->Form->input('title', array('class' => 'form-control')); ?>
			<?php echo $this->Form->input('title_greek', array('class' => 'form-control')); ?>
            <div class="input textarea">
	           <label>Description</label>
	           <textarea class="form-control" name="data[Service][description]"></textarea>
            </div>
            <div class="input textarea">
	           <label>Description(Greek)</label>
	           <textarea class="form-control" name="data[Service][description_greek]"></textarea>
            </div>
            <?php echo $this->Form->button('Submit', array('class' => 'btn btn-primary')); ?>
			<?php echo $this->Form->end(); ?>
		</div>
	</div>
</div>
<div class="speacer"></div>


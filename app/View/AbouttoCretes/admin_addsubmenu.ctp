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
	#CretedetailDescriptionGreek {
  margin-bottom: 16px;
  width: 100%;
  float: left;
	}
	#CretedetailDescription {
	  width: 100%;
	  float: left;
	  margin-bottom: 17px;
	}
	#CretedetailTitleGreek {
	  margin-bottom: 17px;
	}
	#CretedetailTitle {
	  margin-bottom: 17px;
	}
</style>
<div class="container">
<section class="content-header">
	<h2>Add Sub Menus About to Crete</h2>
</section>
<section class="content">
<div class="row">
	<div class="col-sm-5">
		<div class="box box-primary">
        <div class="box-body">
			<?php echo $this->Form->create('Cretedetail'); ?>
			<?php echo $this->Form->input('title', array('class' => 'form-control')); ?>
			<?php echo $this->Form->input('title_greek', array('class' => 'form-control')); ?>
            <?php echo $this->Form->input('description', array('class' => 'form-control')); ?>
            <?php echo $this->Form->input('description_greek', array('class' => 'form-control')); ?>
			<?php echo $this->Form->button('Submit', array('class' => 'btn btn-primary')); ?>
			<?php echo $this->Form->end(); ?>
		</div>
    </div>
</div>
</div>
</div>
</section>
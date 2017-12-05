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
	textarea {
    width: 100%;
    float: left;
	margin-bottom: 16px;
	}
	#FacilitieTitle {
    margin-bottom: 17px;
	}
</style>


<section class="content-header">
      <h1>Add Facilities</h1>
</section>

<section class="content">

<div class="row">
	<div class="col-sm-5">
    
		<div class="box box-primary">
        <div class="box-body">
			<?php echo $this->Form->create('Facilitie',array('type'=>'file')); ?> 
			<?php echo $this->Form->input('hotelid',array('value'=>$idx,'type' => 'hidden'));//, array('type' => 'hidden') ?>
			<?php echo $this->Form->input('title', array('class' => 'form-control')); ?>
			<?php echo $this->Form->input('title_greek', array('class' => 'form-control')); ?>
			<?php echo $this->Form->input('category', array('class' => 'form-control')); ?>
			<?php echo $this->Form->input('category_greek', array('class' => 'form-control')); ?>
			<?php echo $this->Form->input('image', array('class' => 'form-control','type'=>'file')); ?>
            <br>
           <label>Description
           </label>
           <textarea  name="data[Facilitie][description]"></textarea>
           <label>Description(Greek)</label>
           <textarea  name="data[Facilitie][description_greek]"></textarea>
           <br>
            <?php echo $this->Form->button('Submit', array('class' => 'btn btn-primary')); ?>
			<?php echo $this->Form->end(); ?>
		</div>
    </div>
    </div>
</div>
</section>
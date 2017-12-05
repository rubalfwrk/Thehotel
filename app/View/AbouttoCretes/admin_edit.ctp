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
	#AbouttoCreteImage {
    margin-bottom: 16px;
   }
   #AbouttoCreteImage {
  margin-bottom: 16px;
  height: auto;
   }

#AbouttoCreteTitle {
  margin-bottom: 17px;
 }
#AbouttoCreteTitleGreek {
  margin-bottom: 17px;
 }
#AbouttoCreteDescription {
  margin-bottom: 17px;
 }
#AbouttoCreteDescriptionGreek {
  margin-bottom: 17px;
 }
</style>
<div class="container">
<section class="content-header">
	<h2>Edit About Crete</h2>
</section>
<section class="content">
<div class="row">
    <div class="col-sm-5">
		<div class="box box-primary">
    <div class="box-body">

			<?php echo $this->Form->create('AbouttoCrete',array('type' => 'file','role'=>'form')); ?> 
			<?php echo $this->Form->input('id'); ?>
			<?php echo $this->Form->input('title', array('class' => 'form-control')); ?>
			<?php echo $this->Form->input('title_greek', array('class' => 'form-control')); ?>
			<?php echo $this->Form->input('description', array('class' => 'form-control')); ?>
			<?php echo $this->Form->input('description_greek', array('class' => 'form-control')); ?>
			<?php if($id == '1'){ ?>
             <?php echo $this->Form->input('image', array('class' => 'form-control',"name"=>"data[AbouttoCrete][image][]",'type'=>'file')); ?>
			<?php } else { ?>
			<?php echo $this->Form->input('image', array('class' => 'form-control','type'=>'file')); ?>
			<?php } ?>
            <br>
			<?php echo $this->Form->button('Submit', array('class' => 'btn btn-primary')); ?>
			<?php echo $this->Form->end(); ?>
		</div>
    </div>
</div>
</div>
</div>
</section>
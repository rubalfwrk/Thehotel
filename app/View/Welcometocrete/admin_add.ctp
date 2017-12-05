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
      <h1>Add Welcome to crete data</h1>
</section>

<section class="content">

<div class="row">
	<div class="col-sm-5">
    
		<div class="box box-primary">
        <div class="box-body">
			<?php echo $this->Form->create('Welcometocrete',array('type' => 'file','role'=>'form')); ?> 
			<?php echo $this->Form->input('image', array('class' => 'form-control',"name"=>"data[Welcometocrete][image][]",'type'=>'file','multiple' => 'true')); ?>
            <br>
           <label>Description</label>
           <textarea required name="data[Welcometocrete][text]"></textarea>
           <label>Description(Greek)</label>
           <textarea required name="data[Welcometocrete][text_greek]"></textarea>
           <br>
            <?php echo $this->Form->button('Submit', array('class' => 'btn btn-primary')); ?>
			<?php echo $this->Form->end(); ?>
		</div>
    </div>
    </div>
</div>
</section>
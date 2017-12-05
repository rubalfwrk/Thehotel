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
  #UsefulNumberDescriptionGreek {
    margin-bottom: 16px;
	}
	#UsefulNumberTitle {
    margin-bottom: 17px;
	}
	#UsefulNumberTitleGreek {
    margin-bottom: 17px;
	}
	#UsefulNumberDescription {
    margin-bottom: 17px;
	}
</style>

<section class="content-header">
  <h2>Edit Useful Number</h2>
</section>
<section class="content">
<div class="row">
    <div class="col-sm-5">
    <div class="box box-primary">
    <div class="box-body">
      <?php echo $this->Form->create('UsefulNumber',array('type'=>'file')); ?> 
      <?php echo $this->Form->input('id'); ?>
            
      <?php echo $this->Form->input('title', array('class' => 'form-control')); ?>
      <?php echo $this->Form->input('title_greek', array('class' => 'form-control')); ?>
      <?php echo $this->Form->input('description', array('type'=>'textarea','class' => 'form-control')); ?>
      <?php echo $this->Form->input('description_greek', array('type'=>'textarea','class' => 'form-control')); ?>
      <?php echo $this->Form->button('Submit', array('class' => 'btn btn-primary')); ?>
      <?php echo $this->Form->end(); ?>
    </div>
    </div>
</div>
</div>
</section>
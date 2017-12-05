<style>
  label{
    width:100%;
    float:left;
	margin:20px 0 0 0 ;
  }
  .form_outer form .form-control{
    width:auto;
    float:left;
    margin-right:4px;
  }
  .form_outer form .btn{
    float:left;
  }
  .edit-info { float:left; width:100%;}
  .sbt { margin-top:10px;}
</style>
<div class="container">
<div class="edit-info">
<div class="row">
    <div class="col-sm-12">
<div class="page_heading">
  <h2>Edit Useful Info</h2>
</div>
</div>
</div>
</div>
</div>

<div class="container">
<div class="edit-info">
<div class="row">
    <div class="col-sm-5">
    <div class="form_outer box">
     <div class="col-sm-12" style="padding:0px;">
      <?php echo $this->Form->create('UsefulInfo',array('type'=>'file')); ?> 
      <?php echo $this->Form->input('id'); ?>
      </div>
          <div class="col-sm-12">     
      <?php echo $this->Form->input('title', array('class' => 'form-control')); ?>
      <?php echo $this->Form->input('title_greek', array('class' => 'form-control')); ?>
      <!-- <label>Description</label> -->
             <?php echo $this->Form->input('description', array('type'=>'textarea','class' => 'form-control')); ?>
      <!-- <label>Description(Greek)</label> -->
             <?php echo $this->Form->input('description_greek', array('type'=>'textarea','class' => 'form-control')); ?>
             </div>
                <div class="col-sm-12">
      <?php echo $this->Form->button('Submit', array('class' => 'btn btn-primary sbt')); ?>
      </div>
      <?php echo $this->Form->end(); ?>
    </div>
    </div>
</div>
</div>
</div>
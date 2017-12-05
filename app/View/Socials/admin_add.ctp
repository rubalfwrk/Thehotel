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
</style>
<div class="page_heading">
  <h2 class="headng">Add Social</h2>
</div>
<div class="table-responsive">
  <div class="col-sm-5">
    <div class="form_outer box">
      <?php echo $this->Form->create('Social'); ?> 
      <?php echo $this->Form->input('hotelid',array('value'=>$idx,'type' => 'hidden'));//, array('type' => 'hidden') ?>
      <?php echo $this->Form->input('title', array('class' => 'form-control')); ?>
      <?php echo $this->Form->input('link', array('class' => 'form-control')); ?>
    
      <?php echo $this->Form->button('Submit', array('class' => 'btn btn-primary')); ?>
      <?php echo $this->Form->end(); ?>
    </div>
  </div>
</div>
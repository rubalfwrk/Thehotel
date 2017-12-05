    <section class="content">
      <div class="row">
        <!-- left column -->
        <div class="col-md-12">
          <!-- general form elements -->
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Edit Hotel Details</h3>
            </div>
              
        <?php echo $this->Form->create('Addhotel',array('action'=>'addhotelinfo'));?>
       <div class="box-body">    
        <?php echo $this->Form->input('id'); ?>
        
        <?php echo $this->Form->input('hotelname', array('class' => 'form-control')); ?>
        <br />
        <?php echo $this->Form->input('hotelname_greek', array('class' => 'form-control')); ?>
        <br />
        <?php echo $this->Form->input('groupname', array('class' => 'form-control')); ?>
  		<br />
        <?php echo $this->Form->input('groupname_greek', array('class' => 'form-control')); ?>
        <br />
        <label>Description</label>
        <?php echo $this->Form->textarea('description', array('class' => 'form-control')); ?>
          <br />
        <label>Description(Greek)</label>
        <?php echo $this->Form->textarea('description_greek', array('class' => 'form-control')); ?>
        <br />

        <div class="box-footer">
           <?php echo $this->Form->button('Submit', array('class' => 'btn btn-primary')); ?>
        </div>
        </div>
            <?= $this->Form->end() ?>

        </div></div></div>
</section>

<style>
.prcheck > label {
    float: left;
    margin-left: 5px;
    width: auto;
}
.prcheck > input {
    float: left;
}
</style>
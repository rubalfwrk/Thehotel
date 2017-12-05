    <section class="content">
      <div class="row">
        <!-- left column -->
        <div class="col-md-6">
          <!-- general form elements -->
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Edit User Details</h3>
            </div>
              
        <?php echo $this->Form->create('User',array('action'=>'edit'));?>
       <div class="box-body">    
        <?php echo $this->Form->input('id'); ?>
        <?php echo $this->Form->input('role', array('class' => 'form-control', 'options' => array('admin' => 'admin','rest_admin'=>'rest_admin'),'default'=> $this->request->data['User']['role'] )); ?>
        <br />
        <?php echo $this->Form->input('reservationname', array('class' => 'form-control')); ?>
        <br />
        <?php echo $this->Form->input('username', array('class' => 'form-control')); ?>
        <br />
		<br/>
		<div class="check_box">
        <?php echo $this->Form->input('active', array('type' => 'checkbox')); ?>
        </div>
                
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
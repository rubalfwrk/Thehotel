<section class="content">
      <div class="row">
        <!-- left column -->
        <div class="col-md-6">
          <!-- general form elements -->
          <div class="box box-primary">

    <div class="box-header with-border">
		<h3 class="box-title">Add Restaurant User</h3>
    </div>

<div class="row">
    <div class="col-md-12">

        <?php echo $this->Form->create('User');?>
    
       <?php echo $this->Form->input('role', array('class' => 'form-control', 'options' => array('rest_admin'=> 'Store User'))); ?>
        <br />
        <?php echo $this->Form->input('name', array('class' => 'form-control','label'=>'Restaurant Name')); ?>
        <br />
        <?php echo $this->Form->input('username', array('class' => 'form-control','placeholder'=>'E-mail','type'=>'email')); ?>
        <br />
        <?php echo $this->Form->input('password', array('class' => 'form-control')); ?>
        <br />
        <?php echo $this->Form->input('active', array('type' => 'checkbox')); ?>
        <br />
        <?php echo $this->Form->button('Submit', array('class' => 'btn btn-primary')); ?>
        <?php echo $this->Form->end(); ?>
		<br />
    </div>
</div>


</div>
</div>
</div><!-- row -->
</section>

<style>
.select,.text,.email,.password,.checkbox {
    width: 100%;
    float: left;
	padding: 10px;
}

.select label,.text label,.email label,.password label {
    width: 25%;
    float: left;
}

.form-control {
    width: 75% !important;
    float: left;
}

#UserActive {
    margin: 4px 0 0 0px;
}

.btn.btn-primary{margin-left: 10px;}

</style>
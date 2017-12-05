    <section class="content">
      <div class="row">
        <!-- left column -->
        <div class="col-md-6">
          <!-- general form elements -->
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Add New Category</h3>
            </div>
 
<?php echo $this->Form->create('Cat',array('type'=>'file','method'=>'post','action'=>'admin_add')); ?>
   <div class="box-body">              
	<?php
        
		echo $this->Form->input('rest_type',array('required' => true,'label'=>'Name'));
                echo $this->Form->input('logo',array('type'=>'file','required' => true,'label'=>'Logo'));
                echo $this->Form->input('image',array('type'=>'file','required' => true,'label'=>'Icon'));
		echo $this->Form->input('res_id', array('type' => 'hidden'));
	?>


 <div class="box-footer">
    <?= $this->Form->button(__('Submit'),array('class'=>'btn btn-success')) ?>
</div>
</div>
    <?= $this->Form->end() ?>

</div></div></div>
</section>

<style>
.input {
    width: 100%;
    float: left;
	margin-bottom: 10px;
}
label {
    width: 20%;
    float: left;
	padding-left: 15px;
}
.input input {
    width: 80% !important;
    float: left;
}
</style>
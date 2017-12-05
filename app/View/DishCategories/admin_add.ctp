    <section class="content">
      <div class="row">
        <!-- left column -->
        <div class="col-md-6">
          <!-- general form elements -->
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">User Registration</h3>
            </div>
 
<?php echo $this->Form->create('DishCategory',array('type'=>'file')); ?>
   <div class="box-body">              
	<?php
		echo $this->Form->input('name &nbsp;',array('required' => true));
                echo $this->Form->input('image',array('type'=>'file','required' => true));
		//echo $this->Form->input('status');
		echo $this->Form->input('res_id', array('type' => 'hidden'));
	?>


 <div class="box-footer">
    <?= $this->Form->button(__('Submit'),array('class'=>'btn btn-success')) ?>
</div>
</div>
    <?= $this->Form->end() ?>

</div></div></div>
</section>
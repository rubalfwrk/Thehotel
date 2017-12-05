    <section class="content">
      <div class="row">
        <!-- left column -->
        <div class="col-md-6">
          <!-- general form elements -->
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">User Registration</h3>
            </div>
 
        <?php echo $this->Form->create('User',array('type'=>'file','method'=>'post','action'=>'admin_add','role'=>'form'));?>
       <div class="box-body">    
       <?php echo $this->Form->input('role', array('class' => 'form-control', 'options' => array('admin' => 'admin','rest_admin'=> 'rest_admin'))); ?>
       <br />
       <?php echo $this->Form->input('code', array('class' => 'form-control', 'placeholder'=>'Hotel Code')); ?>
        <br />
        <?php echo $this->Form->input('username', array('class' => 'form-control','placeholder'=>'Username/E-mail')); ?>
        <br />
        <?php echo $this->Form->input('password', array('class' => 'form-control')); ?>
        <br />  

 <div class="my-set">
   <?php echo $this->Form->button('Submit', array('class' => 'btn btn-primary')); ?>
</div>
</div>
    <?= $this->Form->end() ?>

</div></div></div>
</section>

<style>
#UserImage {
    height: auto;
}
#UserActive {
    margin-left: 1px;
}
.box-footer my-set {
    padding-top: 12px ;

}
</style>

<section class="content">
      <div class="row">
        <!-- left column -->
        <div class="col-md-6">
          <!-- general form elements -->
          <div class="box box-primary">

    <div class="box-header with-border">
    	<h3 class="box-title" style="margin-top: 0;">Admin Edit User Password</h3>
    </div>

	<span style="padding:0 10px;">Username : <?php echo $this->Form->value('User.username'); ?></span>



<div class="row">
    <div class="col-md-12">

        <?php echo $this->Form->create('User');?>
        <?php echo $this->Form->input('id', array('class' => 'form-control')); ?>
        <?php echo $this->Form->input('password', array('class' => 'form-control', 'value' => '')); ?>
        <br />
        <?php echo $this->Form->button('Submit', array('class' => 'btn btn-primary'));?>
        <?php echo $this->Form->end();?>

    </div>
</div>

</div>
</div>
</div>
</section>

<style>
.input.password {
    width: 100%;
    float: left;
}
.password label {
    width: 20%;
    float: left;
}
#UserPassword {
    width: 80%;
    float: left;
}

#UserAdminPasswordForm{
	padding: 10px;
	}
</style>
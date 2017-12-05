<h2>Admin Edit Order</h2>
<?php die(); ?>
<div class="row">

    <div class="col col-lg-3">

        <?php echo $this->Form->create('User'); ?>

        <?php echo $this->Form->input('id', array('class' => 'form-control')); ?>
        <?php echo $this->Form->input('first_name', array('class' => 'form-control')); ?>
        <?php echo $this->Form->input('last_name', array('class' => 'form-control')); ?>
        <?php echo $this->Form->input('email', array('class' => 'form-control')); ?>
        <?php echo $this->Form->input('phone', array('class' => 'form-control')); ?>
        <br />
        <?php echo $this->Form->button('Submit', array('class' => 'btn btn-primary'));?>
        <?php echo $this->Form->end();?>

    </div>

</div>
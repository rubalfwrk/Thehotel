    <section class="content">
      <div class="row">
        <!-- left column -->
        <div class="col-md-5">
          <!-- general form elements -->
          <div class="box box-primary">
  <div class="box-header with-border">        
<h3 class="box-title">User</h3>
</div>
<table class="table table-striped table-bordered dataTable no-footer">
    <tr>
        <td>Id</td>
        <td><?php echo $user[0]['User']['id']; ?></td>
    </tr>
    <tr>
        <td>Role</td>
        <td><?php echo $user[0]['User']['role']; ?></td>
    </tr>
    <tr>
        <td>Name</td>
        <td><?php echo $user[0]['User']['reservationname']; ?></td>
    </tr>

    <tr>
        <td>Username</td>
        <td><?php echo $user[0]['User']['username']; ?></td>
    </tr>
   
    <tr>
        <td>Created</td>
        <td><?php echo $user[0]['User']['created_date']; ?></td>
    </tr>

</table>
</div>
</div>

<!-- <h3 class="action">Actions</h3> -->



<!-- <div class="btns">
<?php //echo $this->Html->link('Edit User', array('action' => 'edit', $user[0]['User']['id']), array('class' => 'btn btn-success')); ?> </li>


<?php// echo $this->Form->postLink('Delete User', array('action' => 'delete', $user[0]['User']['id']), array('class' => 'btn btn-danger'), __('Are you sure you want to delete # %s?', $user[0]['User']['id'])); ?>

<br />
<br />

</div> -->
</div>
</section>
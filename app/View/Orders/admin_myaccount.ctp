<style>
    .form_outer{
        margin-bottom:20px;
    }
    table{
        width:100%;
        margin:0px;
        font-size: 14px !important;
    }
    table td.actions{
        width:28% !important;
    }
</style>
<div class="page_heading">
    <h2 class="headng">User</h2>
</div>
<div class="table-responsive">
    <div class="col-sm-12">
        <div class="form_outer">
            <table class="table table-striped table-bordered table-condensed table-hover table_cnts">
                <tbody>
                    <tr>
                        <th>Id</th>
                        <td><?php echo h($user['User']['id']); ?></td>
                    </tr>
                    <tr>
                        <th>Role</th>
                        <td><?php echo h($user['User']['role']); ?></td>
                    </tr>
                    <tr>
                        <th>Username</th>
                        <td><?php echo h($user['User']['username']); ?></td>
                    </tr>
                    <tr>
                        <th>Name</th>
                        <td><?php echo h($user['User']['reservationname']); ?></td>
                    </tr>
                    <tr>
                        <th>E-mail</th>
                        <td><?php echo h($user['User']['email']); ?></td>
                    </tr>
                    <tr>
                        <th>Date</th>
                        <td><?php echo h($user['User']['created_date']); ?></td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>
<div class="col-sm-5">
    <h3>Actions</h3>
    <?php echo $this->Html->link('Change Password', array('action' => 'password', $user['User']['id']), array('class' => 'btn btn-primary')); ?>
    <?php echo $this->Html->link('Edit Profile', array('controller' => 'users' ,'action' => 'edit', $user['User']['id']), array('class' => 'btn btn-primary')); ?>
</div>


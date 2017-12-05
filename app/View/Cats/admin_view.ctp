   <section class="content-header">
        <h1>
            Dashboard
            <small>Control panel</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Dashboard</li>
        </ol>
    </section>
 <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Deal Category</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
<table class="table table-bordered table-hover dataTable" cellspacing="0" cellpadding="0">
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $Cats['Cat']['id'] ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Name') ?></th>
            <td><?= $Cats['Cat']['rest_type'] ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Image') ?></th>
            <td><img src="<?php echo $this->webroot;?>/files/restaurants/<?php echo $Cats['Cat']['logo']; ?>" width="100" height="100"/></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= $Cats['Cat']['created'] ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Modified') ?></th>
            <td><?= $Cats['Cat']['modified'] ?></td>
        </tr>

            <th scope="row"><?= __('Icon') ?></th>
            <td><img src="<?php echo $this->webroot;?>/img/<?= $Cats['Cat']['image']?>" width="100" height="100" style="background: #222D32;"/></td>
        </tr>
    </table>

</div>
 </div>
</div>
 </div>

</section>
                   


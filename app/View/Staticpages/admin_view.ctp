
    <!-- Content Header (Page header) -->
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
              <h3 class="box-title">Static page</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
        <p>
            <?php $x=$this->Session->flash(); ?>
                    <?php if($x){ ?>
                    <div class="alert success">
                        <span class="icon"></span>
                    <strong>Success!</strong><?php echo $x; ?>
                    </div>
                    <?php } ?>
        </p>
 <table class="table table-bordered table-hover dataTable">
 <tr>
            <th scope="row"><?= __('Hotelname') ?></th>
            <td><?= h($staticpage['Staticpage']['hotelname']); ?></td>
        </tr>
        
            <th scope="row"><?= __('Image') ?></th>
            <td><?= $this->Html->image('../files/staticpage/'.$staticpage['Staticpage']['image'],
                           array('alt'=>'Staticpage Image','style'=>'height:150px;')); ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Description') ?></th>
            <td><?= htmlspecialchars($staticpage['Staticpage']['description']); ?></td>
        </tr>        
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($staticpage['Staticpage']['created']); ?></td>
        </tr>
       
    </table>
   
   
</div>
 </div>
</div>
 </div>

</section>

                       

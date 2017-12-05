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
                    <h3 class="box-title">Static Pages</h3>
                </div>
                <div class="box-body">
                    <table id="example2" class="table table-bordered table-hover">
        <p>
            <?php $x = $this->Session->flash(); ?>
            <?php if ($x) { ?>
            <div class="alert success">
                <span class="icon"></span>
                <strong></strong><?php echo $x; ?>
            </div>
        <?php } ?>
        </p>
        <div class="btn-toolbar list-toolbar">
            <!--<a href="<?php //echo $this->Html->url(array('controller' => 'Staticpages', 'action' => 'admin_add')); ?>"><span class="btn btn-primary"><i class="fa fa-plus"></i>New Add</span></a>-->
            <?php echo $this->Form->create("Staticpage", array("action" => "admin_index")); ?>
            <div class="search_username">
                <button type="submit" class="search_button1" style="float: right; line-height: 28px;"><i class="fa fa-search"></i></button>
                <input type="text" name="keyword" value="<?php if (@$keyword) {
                echo $keyword;
            } ?>" placeholder="Search Here !!!" class="form-control" style="width: 17%;float: right;"/>
            </div>
            </form>
            <div class="btn-group">
            </div>
        </div>
      <?php echo $this->Form->create('Staticpage', array("action" => "deleteall", 'id' => 'mbc')); ?>
        <table class="table">
            <thead>
                <tr>
                   <th><?php echo $this->Paginator->sort('hotelname'); ?></th>
                   <th><?php echo $this->Paginator->sort('Title'); ?></th>
                    <th><?php echo $this->Paginator->sort('Image'); ?></th>
                    <th><?php echo $this->Paginator->sort('Created'); ?></th>
                    <!-- <th><?php //echo $this->Paginator->sort('Status'); ?></th> -->
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php if($staticpages){
                if(isset($staticpages)){
                foreach ($staticpages as $staticpage){ ?>
                        <tr>
                        <td><?php echo h($staticpage['Staticpage']['hotelname']); ?>&nbsp;</td>
                        <td><?php echo h($staticpage['Staticpage']['title']); ?>&nbsp;</td>
                        <td><?php
                    $ext = pathinfo($staticpage['Staticpage']['image'], PATHINFO_EXTENSION);
                        if(empty($ext)){
                           echo  'No Image';
                        }
                        else
                        {
                      echo $this->Html->image('../files/staticpage/'.$staticpage['Staticpage']['image']
                            ,array('alt'=>'Not Image','height'=>'70px','width'=>'100px')); 
                        }
                        ?>                       
                            
                        </td>
                        <td><?php echo h($staticpage['Staticpage']['created']); ?>&nbsp;</td>
                                
                                <td class="actions">
                                    <?php echo $this->Html->link(__('View'), array('action' => 'view', $staticpage['Staticpage']['id']), array('class' => 'btn btn-primary btn-xs')); ?>
                                    
                                    <?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $staticpage['Staticpage']['id']), array('class' => 'btn btn-success btn-xs')); ?>
                                    <?php //echo $this->Form->postLink(__('Delete'),array('action' => 'delete', $staticpage['Staticpage']['id']), array('confirm'=>__('Are you sure you want to delete # %s?', $staticpage['Staticpage']['id']),'class' => 'btn btn-danger btn-xs')); ?>
                                    <?php
                                    
                                    ?>
                                </td>
                            </tr>
                 <?php } } } else { { ?> 
                <p class="not_found">NOT FOUND</p>
                 <?php } } ?>
            </tbody>
        </table>
            <?php echo $this->Form->end(); ?>
       
    </div>

</div>
</div>
</div>
<style type="text/css">
    .search_username{margin-top: 0%;}
</style>
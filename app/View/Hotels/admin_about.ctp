<style>
    .up-img_sec{
        margin-bottom: 15px;
    }
    .form_outer{
        margin-bottom:20px;
    }
</style>
<div class="page_heading">
    <h2 class="headng">About Images</h2>
</div>
<div class="table-responsive">
    <div class="col-sm-12">
        <div class="form_outer">
            <div class="up-img_sec">
                <?php 
                echo $this->Html->link('Add New Image', array('action' => 'add',$hotel[0][Addhotel][id]), array('class' => 'btn btn-default')); ?>
            </div>
        </div>
    </div>
    <div class="col-sm-5">
        <div class="form_outer box">
            <table class="table table-striped table-bordered table-condensed table-hover table_cnts">
                <thead>
                    <tr>
                        <th>Sr. No.</th>
                        <th>Images</th>
                        <th class="actions">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php 
                        $x = '1';
                        foreach ($abt as $value) { 
                    ?>
                    <tr>
                        <td><?php echo $x; ?></td>
                        <td><img style="width:100px; height:100px;" src="<?php echo $value['About']['image']; ?>"/></td>
                        <td class="actions">
                            <?php echo $this->Form->postLink('Delete', array('action' => 'deleteabout',$hotel[0][Addhotel][id], $value['About']['id']), array('class' => 'btn btn-danger btn-xs btn-delet'), __('Are you sure you want to delete # %s?', $value['About']['id'])); ?>
                        </td>
                    </tr>
                    <?php $x++; } ?>
                </tbody>
            </table>
        </div>
    </div>
</div>


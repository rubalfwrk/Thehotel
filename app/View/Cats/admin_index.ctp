<div class="content">
    <div class="header">

        <h2 style="margin-top: 0;" class="box-title">Deal Category</h2>

    </div>
    <div class="main-content">
        <?php $x = $this->Session->flash(); ?>
        <?php if ($x) { ?>
            <div class="alert success">
                <span class="icon"></span>
                <strong></strong><?php echo $x; ?>
            </div>
        <?php } ?>
        <div class="btn-toolbar list-toolbar">

            <div class="btn-group">            </div>
        </div>
        <?php echo $this->Form->create('Restaurant', array("action" => "deleteall", 'id' => 'mbc')); ?>
        <div class="dishCategories index">
        <div class="box">
            <table cellpadding="0" cellspacing="0" class="table table-bordered table-hover dataTable">
                <thead>
                    <tr>
                        <th><?php echo $this->Paginator->sort('id'); ?></th>
                        <th><?php echo $this->Paginator->sort('Type Name'); ?></th>
                        <th><?php echo $this->Paginator->sort('Logo'); ?></th>
                        <th><?php echo $this->Paginator->sort('Icon'); ?></th>
                        <th class="actions"><?php echo __('Actions'); ?></th>
                    </tr>
                </thead>
                
                <tbody>
                    <?php foreach ($cats as $cat): ?>
                        <tr>
                            <td><?php echo $cat['Cat']['id']; ?>&nbsp;</td>
                            <td><?php echo $cat['Cat']['rest_type']; ?>&nbsp;</td>
                            <td><img src="<?php echo $this->webroot ?>/files/restaurants/<?php echo $cat['Cat']['logo']; ?>" width="100px" height="100px"/>&nbsp;</td>
                            <td><img src="<?php echo $this->webroot ?>/img/<?php echo $cat['Cat']['image']; ?>" width="100px" height="100px"/>&nbsp;</td>
                            <td class="actions">
                                <?php echo $this->Html->link(__('View'), array('action' => 'admin_view', $cat['Cat']['id']), array('class' => 'btn btn-default btn-xs')); ?>
                                <?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $cat['Cat']['id']), array('class' => 'btn btn-success btn-xs')); ?>
                                <?php echo $this->Form->postLink(__('Delete'), array('action' => 'admin_delete', $cat['Cat']['id']), array('confirm' => __('Are you sure you want to delete # %s?', $cat['Cat']['id']),'class'=>'btn btn-danger btn-xs')); ?>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
         </div>
        </div>
        
            <p>
                <?php
                echo $this->Paginator->counter(array(
                    'format' => __('Page {:page} of {:pages}, showing {:current} records out of {:count} total, starting on record {:start}, ending on {:end}')
                ));
                ?>	</p>
                
            <div class="paging">
                <?php
                echo $this->Paginator->prev('< ' . __('previous').'>', array(), null, array('class' => 'prev disabled'));
                echo $this->Paginator->numbers(array('separator' => ''));
                echo $this->Paginator->next('    < ' .__('next') . ' >', array(), null, array('class' => 'next disabled'));
                ?>
            </div>
            
        </div>
        </div>
        </div>
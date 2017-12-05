<!-- Left side column. contains the logo and sidebar -->
<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
        <!-- Sidebar user panel -->
        <div class="user-panel">
            <div class="pull-left image">
               <img src="<?php echo $this->request->webroot ?>profile_pic/default.jpg" class="img-circle" alt="User Image">
            </div>
            <div class="pull-left info">
                <p><?php echo $loggedusername; ?></p>
            </div>
        </div>
        <!-- sidebar menu: : style can be found in sidebar.less -->
        <ul class="sidebar-menu">      
      
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-users"></i><span>Users</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li class="active"><?php echo $this->Html->link('Users', array('controller' => 'users', 'action' => 'index', 'admin' => true), array('class' => 'users_autorizemenu')); ?></li>
                    <?php if($loggeduserrole == "admin") { ?>  
                   <li class="active"><?php echo $this->Html->link('Add User', array('controller' => 'users', 'action' => 'add', 'admin' => true), array('class' => 'users_autorizemenu')); ?></li>
                   <?php } ?>
                </ul>
            </li> 

            <li class="treeview">
                <a href="#">
                    <i class="fa fa-user-secret"></i> <span>Hotels</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                 <li>  <?php echo $this->Html->link('Hotel', array('controller' => 'hotels', 'action' => 'hotel', 'admin' => true), array('class' => 'hotels_autorizemenu')); ?> </li> 
                    <?php if($loggeduserrole == "admin") { ?>   
                    <li><?php echo $this->Html->link('Add hotels', array('controller' => 'addhotels', 'action' => 'hoteladd', 'admin' => true), array('class' => 'addrestaurants_autorizemenu')); ?></li>
                    <?php } ?>
                </ul>
            </li>  

            <?php if($loggeduserrole == "admin") { ?>

            <!-- <li class="treeview">
                <a href="#">
                    <i class="fa fa-file-o"></i> <span>Page</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li class="active"><?php //echo $this->Html->link('Static Page', array('controller' => 'staticpages', 'action' => 'index', 'admin' => true), array('class' => 'staticpages_autorizemenu')); ?></li>
                    <li class="active"><?php //echo $this->Html->link('Add Static Page', array('controller' => 'staticpages', 'action' => 'add', 'admin' => true), array('class' => 'staticpages_autorizemenu')); ?></li>     
                    
                </ul>
            </li>  -->
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-file-o"></i> <span>Useful Info</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li class="active"><?php echo $this->Html->link('View Useful Info', array('controller' => 'staticpages', 'action' => 'viewusefulnumber', 'admin' => true), array('class' => 'staticpages_autorizemenu')); ?></li>
                    <li class="active"><?php echo $this->Html->link('Add Useful Info', array('controller' => 'staticpages', 'action' => 'addusefulnumber', 'admin' => true), array('class' => 'staticpages_autorizemenu')); ?></li>     
                    
                </ul>
            </li> 

            <li class="treeview">
                <a href="#">
                    <i class="fa fa-file-o"></i> <span>Greek Words</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li class="active"><?php echo $this->Html->link('View Greek Words', array('controller' => 'staticpages', 'action' => 'viewgreekword', 'admin' => true), array('class' => 'staticpages_autorizemenu')); ?></li>
                    <li class="active"><?php echo $this->Html->link('Add Greek Words', array('controller' => 'staticpages','action' => 'addgreekword', 'admin' => true), array('class' => 'staticpages_autorizemenu')); ?></li>     
                    
                </ul>
            </li>

            <li class="treeview">
                <a href="#">
                    <i class="fa fa-file-o"></i> <span>Useful Telephone Numbers</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li class="active"><?php echo $this->Html->link('View Telephone Numbers', array('controller' => 'staticpages', 'action' => 'viewnumber', 'admin' => true), array('class' => 'staticpages_autorizemenu')); ?></li>
                    <li class="active"><?php echo $this->Html->link('Add Telephone Numbers', array('controller' => 'staticpages','action' => 'addnumber', 'admin' => true), array('class' => 'staticpages_autorizemenu')); ?></li>     
                    
                </ul>
            </li>

            <?php } ?>
            <?php if($loggeduserrole == "admin") { ?>

            <li class="treeview">
                <a href="#">
                    <i class="fa fa-file-o"></i> <span>About Crete</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li class="active"><?php echo $this->Html->link('About Crete', array('controller' => 'AbouttoCretes', 'action' => 'index', 'admin' => true), array('class' => 'staticpages_autorizemenu')); ?></li>
                    <li class="active"><?php echo $this->Html->link('Add About Crete', array('controller' => 'AbouttoCretes', 'action' => 'add', 'admin' => true), array('class' => 'staticpages_autorizemenu')); ?></li>

                </ul>
            </li> 
            <?php } ?>
            
            <?php if($loggeduserrole == "admin") { ?>

            <li class="treeview">
                <a href="#">
                    <i class="fa fa-file-o"></i> <span>Guide Crete</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li class="active"><?php echo $this->Html->link('Guide Crete', array('controller' => 'GuideCretes', 'action' => 'index', 'admin' => true), array('class' => 'staticpages_autorizemenu')); ?></li>
                    <li class="active"><?php echo $this->Html->link('Add Guide Crete', array('controller' => 'GuideCretes', 'action' => 'add', 'admin' => true), array('class' => 'staticpages_autorizemenu')); ?></li>     
                    
                </ul>
            </li> 
            <?php } ?>
            
            
             <?php if($loggeduserrole == "admin") { ?>

            <li class="treeview">
                <a href="#">
                    <i class="fa fa-file-o"></i> <span>Guide Crete city</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li class="active"><?php echo $this->Html->link('Guide Crete City', array('controller' => 'GuideLists', 'action' => 'index', 'admin' => true), array('class' => 'staticpages_autorizemenu')); ?></li>
                    <li class="active"><?php echo $this->Html->link('Add Guide Crete', array('controller' => 'GuideLists', 'action' => 'add',1, 'admin' => true), array('class' => 'staticpages_autorizemenu')); ?></li>     
                    
                </ul>
            </li> 
            <?php } ?>
            
             <?php if($loggeduserrole == "admin") { ?>

            <li class="treeview">
                <a href="#">
                    <i class="fa fa-file-o"></i> <span>Guide Village</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li class="active"><?php echo $this->Html->link('Guide Village', array('controller' => 'GuideVillages', 'action' => 'index', 'admin' => true), array('class' => 'staticpages_autorizemenu')); ?></li>
                    <li class="active"><?php echo $this->Html->link('Add Guide Village', array('controller' => 'GuideVillages', 'action' => 'add',2, 'admin' => true), array('class' => 'staticpages_autorizemenu')); ?></li>     
                    
                </ul>
            </li> 
            <?php } ?>
            
            
             <?php if($loggeduserrole == "admin") { ?>

            <li class="treeview">
                <a href="#">
                    <i class="fa fa-file-o"></i> <span>Guide Data</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li class="active"><?php echo $this->Html->link('Guide Data', array('controller' => 'GuideDatas', 'action' => 'index', 'admin' => true), array('class' => 'staticpages_autorizemenu')); ?></li>
                    <li class="active"><?php echo $this->Html->link('Add Guide Data', array('controller' => 'GuideDatas', 'action' => 'add', 'admin' => true), array('class' => 'staticpages_autorizemenu')); ?></li>     
                    
                </ul>
            </li> 
            <?php } ?>
            
            
            <?php if($loggeduserrole == "admin") { ?>
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-file-o"></i> <span>Crete Extras</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li class="active"><?php echo $this->Html->link('Extras', array('controller' => 'CreteExtras', 'action' => 'index', 'admin' => true), array('class' => 'staticpages_autorizemenu')); ?></li>
                    <li class="active"><?php echo $this->Html->link('Add Extras', array('controller' => 'CreteExtras', 'action' => 'add', 'admin' => true), array('class' => 'staticpages_autorizemenu')); ?></li>     
                    
                </ul>
            </li> 
            <?php } ?>

             <?php if($loggeduserrole == "rest_admin") { ?>
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-file-o"></i> <span>Multiple Messages</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li class="active"><?php echo $this->Html->link('Multiple Messages', array('controller' => 'chats', 'action' => 'msg', 'admin' => true), array('class' => 'staticpages_autorizemenu')); ?></li>
                
                </ul>
            </li> 
            <?php } ?>
            
            
            
        </ul>
    </section>
    <!-- /.sidebar -->
</aside>
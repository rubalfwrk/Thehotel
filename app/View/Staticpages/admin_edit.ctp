 <section class="content">
      <div class="row">
        <!-- left column -->
        <div class="col-md-6">
          <!-- general form elements -->
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Edit static page</h3>
            </div>
        <p>
            <?php $x=$this->Session->flash(); ?>
                    <?php if($x){ ?>
                    <div class="alert success">
                        <span class="icon"></span>
                    <strong>Success!</strong><?php echo $x; ?>
                    </div>
                    <?php } ?>
        </p>
        <div class="row">
            <?php echo $this->Form->create('Staticpage',array('id'=>'tab','type'=>'file')); ?>
  <div class="box-body"> 
            <div class="col-md-12">                
                    <!-- <div class="form-group"> 
                          <?php //echo $this->Form->select('position',array('about'=>'About Us', 'career' => 'Career', 'team' => 'Team', 'services' => 'Services', 'privacypolicy' => 'Privacy and Policy', 'terms' => 'Terms of Use', 'home' => 'Welcome to Restaurant','faq' => 'FAQ')
                                  //,array('class'=>'form-control','empty' => '--Select position--','required'))
                          ?>

                                         
                    </div> -->
                    
                    <?php if($admin_edit['Staticpage']['position']=='faq'){
						$cats = array('Payments','How it works','Delivery delay','Takeaway','Preorder','Register','Pricing','Privacy');
						 ?>
                     <div class="form-group">
                     
                    <?php echo $this->Form->input('category',array('type'=>'select','options'=>$cats)); ?>
                    </div>
                    <?php }?>
                    
                    
                    <div class="form-group">
                        <?php echo $this->Form->input('title',array('class'=>'form-control','readonly'));?>
                    </div>
                    
                    
                    <?php if($admin_edit['Staticpage']['position']!='faq'){ ?>
                    <div class="form-group">
                        <?php echo $this->Form->input('image',array('type'=>'file'));?>     
                    </div>
                    <?php }?>
                    <div class="form-group">
                        <?php echo $this->Form->input('description',array('class'=>'form-control','type'=>'textarea','cols'=>'8','rows'=>'8'));?>
                    </div>
                    
                    <input type="hidden" name="data[Staticpage][created]" value="<?php echo date('Y-m-d H:i:s'); ?>">
               
<div class="box-footer">
    <?= $this->Form->button(__('Submit'),array('class'=>'btn btn-success')) ?>
    <a href="<?php echo $this->Html->url(array('controller' => 'Staticpages', 'action' => 'admin_index')); ?>" data-toggle="modal" class="btn btn-danger">Cancel</a>
</div>
</div>
    <?= $this->Form->end() ?>

</div></div>
</section>
    <script type="text/javascript" src="//cdnjs.cloudflare.com/ajax/libs/tinymce/4.1.6/tinymce.min.js"></script>
    <script type="text/javascript">
    tinymce.init({
             selector: "textarea",
             plugins : "media"
    });
    </script>
   <style>
   .btn-success {
    margin-top: 3px;
}
   </style>
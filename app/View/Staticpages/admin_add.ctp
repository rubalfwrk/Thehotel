<?php
    //print_r($restype); die;?>
    <section style="padding-top: 0;padding-bottom: 0;" class="content">
      <div class="row">
        <!-- left column -->
        <div style="padding: 0;" class="col-md-12">
          <!-- general form elements -->
          <div style="margin-bottom:0; border-top:0px;" class="box box-primary">
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
            <div class="col-md-12">
                <?php echo $this->Form->create('Staticpage',array('id'=>'tab','type'=>'file')); ?>
    <div class="box-body"> 
                   
                    <div class="form-group">
                    <label>Select Hotel : </label>
                    <select required="true" class="form-control" name="data[Staticpage][hotelname]">
                        <?php

                        foreach ($restype as $key=>$value) {

                           $this->request->data['Staticpage']['hotelid'] = $value['Addhotel']['id'];
                           $this->request->data['Staticpage']['hotelname'] = $value['Addhotel']['hotelname'];

                            echo "<option value='".$this->request->data['Staticpage']['hotelname']."'>".$this->request->data['Staticpage']['hotelname']."</option>";
                        };
                        ?>
                    </select>
                    </div>
                    <div class="form-group">
                        <label>Title</label>
                        <?php echo $this->Form->select('title',array('Info'=>'Info','GreekWords'=>'Greek Words'),
                         array('class'=>'form-control','empty' => '--Select page--','required'))
                        ?>
                    </div>
                   <!--  <div class="form-group">
                        <label>Title</label>
                        <input type="text" name="data[Staticpage][title]" class="form-control span12">                        
                    </div> -->
                    <div class="form-group">
                    <label>Image</label> 
                    <input type="file" name="data[Staticpage][image]">
                    </div>
                    <div class="form-group">
                        <label>Description</label>
                        <textarea rows="8" cols="6" name="data[Staticpage][description]"  id="edi" ></textarea>
                    </div>
                                      
                  
                    <input type="hidden" name="data[Staticpage][created]" value="<?php echo date('Y-m-d H:i:s'); ?>">
                    <input type="hidden" name="data[Staticpage][status]" value="1">

               <div class="box-footer">
    <?= $this->Form->button(__('Submit'),array('class'=>'btn btn-success')) ?>
</div>
</div>
    <?= $this->Form->end() ?>

</div></div>
</section>
    
   <script type="text/javascript" src="//cdnjs.cloudflare.com/ajax/libs/tinymce/4.1.6/tinymce.min.js"></script>
    <script type="text/javascript">
    tinymce.init({
             selector: "#edi",
             plugins : "media"

    });
    </script>
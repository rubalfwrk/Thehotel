<style>legend{
        display:none;}
    button, html input[type="button"], input[type="reset"], input[type="submit"] {
        cursor: pointer;
        color: black;}

</style>
    <section class="content">
      <div class="row">
        <!-- left column -->
        <div class="col-md-6">
          <!-- general form elements -->
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Add Deal</h3>
            </div>

            <?php //debug($restype); exit;  
            $x = $this->Session->flash();
            ?>
<?php if ($x) { ?>
        <div class="alert success">
            <span class="icon"></span>
            <strong></strong>
            <?php echo $x; ?>
        </div>
<?php } ?>
        </p>

<?php echo $this->Form->create('Restaurant', array('type' => 'file')); ?>
 <div class="box-body">     
 
                        <?php echo $this->Form->input('typeid', ['options' => $restype, 'label' => 'Restaurant Type:']); ?>
<?php //echo $this->Form->input('name',array('class'=>'form-control','label'=>'Restaurant Name:')); 	 ?>
                    </div>

                    <div class="form-group">

<?php echo $this->Form->input('name', array('class' => 'form-control', 'value'=>$rname,'label' => 'Restaurant Name:')); ?>
                    </div>
                    <!--                    <div class="form-group">
<?php // echo $this->Form->input('barcodeno', array('class' => 'form-control', 'label' => 'Barcode NO.')); ?>
                                        </div>-->
                    <div class="form-group">
<?php echo $this->Form->input('phone', array('class' => 'form-control', 'label' => 'Restaurant Phone:')); ?>
                    </div>
                    <div class="form-group">
<?php echo $this->Form->input('owner_name', array('class' => 'form-control', 'label' => 'Owner Name:')); ?>
                    </div>
                    <div class="form-group">
<?php echo $this->Form->input('owner_phone', array('class' => 'form-control', 'label' => 'Owner Phone:')); ?>
                    </div>
                    <div class="form-group">
<?php echo $this->Form->input('address', array('class' => 'form-control', 'label' => 'Address:')); ?>
                    </div>
                    <div class="form-group">
<?php echo $this->Form->input('city', array('class' => 'form-control', 'label' => 'City:')); ?>
                    </div>
                    <div class="form-group">
<?php echo $this->Form->input('state', array('class' => 'form-control', 'label' => 'State:')); ?>
                    </div>
                    <div class="form-group">
<?php echo $this->Form->input('zip', array('class' => 'form-control', 'label' => 'Zip:')); ?>
                    </div>
                    <div class="form-group">
<?php //echo $this->Form->input('details',array('class'=>'form-control','label'=>'Details:'));  ?>
                    </div>
                    <div class="form-group">
<?php echo $this->Form->input('description', array('class' => 'form-control', 'label' => 'Description:')); ?>
                    </div>
                    <div class="form-group">
<?php echo $this->Form->input('logo', array('type' => 'file', 'class' => 'form-control', 'label' => 'Logo:')); ?>
                    </div>
                     </div>
                    <div class="form-group">
<?php echo $this->Form->input('banner', array('type' => 'file', 'class' => 'form-control', 'label' => 'Banner:')); ?>
                    </div>
                    <div class="form-group">
<?php echo $this->Form->input('website', array('class' => 'form-control', 'label' => 'Website:')); ?>
                    </div>
                    <div class="form-group">
<?php echo $this->Form->input('email', array('class' => 'form-control', 'label' => 'Email:')); ?>
                    </div>
                    <!--                       <div class="form-group">
<?php //echo $this->Form->input('delivery_distance', array('class' => 'form-control', 'label' => 'Delivery Distance in miles:')); ?>
                                        </div>-->
                    <div class="form-group">
                        <input type="checkbox" name="data[Restaurant][delivery]" value="1" />
                        <label>delivery</label>
                    </div>
                    <div class="form-group">
                        <input type="checkbox" name="data[Restaurant][takeaway]" value="1"/>
                        <label>Takeaway</label>
                    </div>
                    <div class="form-group">
                    <?php echo $this->Form->input('delivery_fee', array('class' => 'form-control', 'label' => 'Delivery Fee:')); ?>
                    </div>

                    <div class="form-group">
<?php echo $this->Form->input('opening_time', array('class' => 'form-control', 'label' => 'Opening Time:', 'type' => 'time')); ?>
                    </div>

                    <div class="form-group">
<?php echo $this->Form->input('closing_time', array('class' => 'form-control', 'label' => 'Closing Time:', 'type' => 'time')); ?>
                    </div>
                     <div class="form-group">
<?php echo $this->Form->input('taxes', array('class' => 'form-control', 'label' => 'Tax', 'type' => 'text')); ?>
                    </div>
                    <div class="form-group">
<?php //echo $this->Form->input('prayer_time',array('class'=>'form-control','label'=>'Prayer Time:','type'=>'time'));	 ?>
                    </div>
                    <div class="form-group">
<?php //echo $this->Form->input('contact_person_fname',array('class'=>'form-control','label'=>'Contact:'));	 ?>
                    </div>

                    <!--                    <div class="form-group"><?php //$options = array('hh','gg','sss'); ?>
<?php //echo $this->Form->radio('Amities',$options ,array('class'=>'form-control','label'=>'Amities:'));	 ?>
                                        </div>-->





                    <?php //$options = array(1 => 'ONE', 'TWO', 'THREE');
                    //$selected = array(1, 3); , 'selected' => $selected
                    ?>
<?php //echo $this->Form->input('amities_selected', array('label'=>'Amenities','class'=>'form-control','multiple' => 'checkbox', 'options' => $Restaurantx));	 ?>
<?php //echo $this->Form->checkbox('done', array('value' => 555,'label'=>'fggf'));  ?>


               

                <input type="hidden" name="data[Restaurant][created]" value="
<?php echo date('Y-m-d H:i:s'); ?>">
                <input type="hidden" name="data[Restaurant][user_id]" value="2">
                <input type="hidden" name="data[Restaurant][status]" value="1">

                       <?php echo $this->Form->submit('Save', array('formnovalidate' => true, 'class' => "submitres", 'div' => array('class' => 'btn btn-success'))); ?>

                    <a href=" 
<?php echo $this->Html->url(array('controller' => 'Restaurants', 'action' => 'admin_index')); ?>" data-toggle="modal" class="btn btn-danger">Cancel
                    </a>
     </div>          
    <?= $this->Form->end() ?>
</div>
</div></div></div>
</section>

<style>
   .submitres {
    border: none;
    background: none;
}



</style>
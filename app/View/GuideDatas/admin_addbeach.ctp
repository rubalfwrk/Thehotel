<style>
	.form_outer{
		margin-bottom:20px;
	}
	div.input{
		width: 100%;
		display: table;
		margin-bottom: 15px;
	}
	label{
		width: 100%;
		float: left;
		margin-bottom: 11px;
		padding: 0px !important;
	}
	.btn-primary{
		float: left;
		margin-bottom: 15px;
	}
	.speacer{
		width: 100%;
		display: table;
		padding-bottom: 15px;
	}
</style>
<div class="page_heading">
	<h2 class="headng">Add Data</h2>
</div>
<div class="table-responsive">
	<div class="col-sm-5">
		<div class="form_outer box">
		
			<?php echo $this->Form->create('GuideBeache',array('type'=>'file')); ?> 
			<?php echo $this->Form->input('id'); ?>
             <?php echo $this->Form->input('guidedataid',array('value'=>$idx,'type' => 'hidden')); 
            
            if($idx == 2){ ?>
            <div class="input select"><label for="GuideBeacheRegion">Region</label><select name="data[GuideBeache][region]" class="form-control" id="GuideBeacheRegion">
             <?php 
             $region = array();
             foreach ($GuideCretelist as $key => $value) {
             
				$region[] = $value['BeachRegion']['region'];
				echo '<option value="'.$value['BeachRegion']['region'].'">'.$value['BeachRegion']['region'].'</option>';
			} ?> 

            </select></div>

           <?php } ?>
           
		
			<?php //echo $this->Form->input('region', array('class' => 'form-control','options' => $region,'value' => $region)); ?>

			<?php echo $this->Form->input('title', array('class' => 'form-control')); ?>
			<?php echo $this->Form->input('title_greek', array('class' => 'form-control')); ?>
			<label>Image</label>
            <?php echo $this->Form->input('image.', array('class' => 'form-control','type'=>'file','multiple' => 'true')); ?>
            <?php echo $this->Form->input('description', array('class' => 'form-control')); ?>
            	<label>Description(Greek)</label>
            <?php echo $this->Form->textarea('description_greek', array('class' => 'form-control')); ?>
             <?php echo $this->Form->input('latitude', array('class' => 'form-control')); ?>
             <?php echo $this->Form->input('longitude', array('class' => 'form-control')); ?>
			<?php echo $this->Form->button('Submit', array('class' => 'btn btn-primary')); ?>
			<?php echo $this->Form->end(); ?>
		</div>
	</div>
</div>
<div class="speacer"></div>

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
		float: right;
	}
	.speacer{
		width: 100%;
		display: table;
		padding-bottom: 15px;
	}
    label.user-name{
    	font-weight: bold;
    }
</style>
<div class="page_heading">
    <h2 class="headng">Change User Password</h2>
</div>
<div class="table-responsive">
    <div class="col-sm-5">
        <div class="form_outer">
        <label class="user-name">
        	Username : <?php echo $this->Form->value('User.username'); ?>
        </label>
        <?php echo $this->Form->create('User');?>
        <?php echo $this->Form->input('id', array('class' => 'form-control')); ?>
        <?php echo $this->Form->input('password', array('class' => 'form-control', 'value' => '')); ?>
        <br />
        <?php echo $this->Form->button('Submit', array('class' => 'btn btn-primary'));?>
        <?php echo $this->Form->end();?>
        </div>
    </div>
</div>
<div class="speacer"></div>


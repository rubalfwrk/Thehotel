<div class="main_sec">
	<div class="container">
		<div class="row">
			<div class="col-md-4 center-col">
				<div class="login_form">
					<div class="avatar_sec">
						<img src="<?php echo $this->webroot; ?>img/Logo.png" alt="Profile Image">
					</div>
					<h3>Welcome To The Hotel</h3>
					<?php echo $this->Form->create('User', array('action' => 'login')); ?>
	        		<?php echo $this->Form->input('username', array('class' => 'form-control', 'autofocus' => 'autofocus')); ?>
	        		<?php echo $this->Form->input('password', array('class' => 'form-control')); ?>
	        		<?php echo $this->Form->button('Login', array('class' => 'btn btn-primary')); ?>
	        		<?php echo $this->Form->end(); ?>
				</div>
			</div>
		</div>
	</div>
</div>
<style> 

.login_frm_popup h3 {
    color: #444;
    float: left;
    width: 100%;
}

footer.Footer {
    position: fixed;
    bottom: 0;
    left: 0;
}
.login_frm label {
    color: #444;
    font-size: 14px;
}

.login_box_m {
    float: left;
    width: 100%;
    margin-bottom: 10%;
}

.login_b2 h1 {
	background: #fc0;
	border-radius: 6px;
	color: #fff;
	font-size: 18px;
	padding: 15px 16px;
	text-align: center;
	text-transform: uppercase;
	width: 95%;
	margin: 10px auto 0px;
}

.login_b2 {
	background: #f9f9f9;
	box-shadow: 0 0 1px #c5c5c5;
	float: left;
	width: 100%;
	border-top-left-radius: 9px;
	border-top-right-radius: 9px;
}

.login_outer_frm {
    width: 100%;
    float: left;
    padding: 20px;
}

.alert.alert-success{
	float: left;
	width: 100%;
	margin-top: 19%;
}

 @media (max-width: 800px) {
	 footer.Footer {
    position: relative;
    bottom: 0;
    left: 0;
}}
 @media (max-width: 768px) {}
 @media (max-width: 360px) {} 
 @media (max-width: 320px) {}
</style>


<div class="container">
    <div class="col-sm-6 col-sm-offset-3">
    <div class="login_frm login_frm_popup">
<?php  $x=$this->Session->flash('loginIncorrect');
if($x){ ?> 


        <div class="alert alert-success">
   
<?php echo $x; ?>
 </div>


<?php } ?>

<div class="login_box_m">

<div class="login_b2">
    <div class="login_b"><h1>Forgot password</h1></div>
    
    <div class="login_outer_frm">
        <?php echo $this->Form->create('User', array('action' => 'login')); ?>
        <?php echo $this->Form->input('username', array('class' => 'form-control', 'autofocus' => 'autofocus','label'=>'Email')); ?>
        <br />
        <?php echo $this->Form->input('password', array('class' => 'form-control')); ?>
         <input type="hidden" name="data[User][server]" value="<?php echo $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI']; ?>">
        <br />
        <?php echo $this->Form->button('Login', array('class' => 'btn btn-primary')); ?>
        <?php echo $this->Form->end(); ?>
        </div>
        
        </div> 
     </div>
            
</div>
</div>
</div>


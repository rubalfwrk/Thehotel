<style>
.login_box_m {
    background: #fff;
    padding:10px;
    margin-top: 30px;
    margin-bottom: 30px;
	border-top-left-radius: 9px;
	border-top-right-radius: 9px;
    float: left;
    width: 100%;
}

.login_b{
background: #fc0;
color: #fff;
text-align: center;
padding: 10px;
border-radius: 4px;
}

.login_b h3{
	margin:0;
	}

</style>

<div class="smart_container">
 <div class="con_main">
     	<div class="container">
        
          <div class="page_inn"><!--page inn start-->
        
        <div class="col-sm-3"></div>
     <div class="col-sm-6">
     <div class="login_box_m">
         <?php $x=$this->Session->flash(); 
           if($x)
           {
               //echo $x;
           }
           
         
         ?>
   <div class="login_b"><h3>Forgot password</h3></div>
   <div class="loign_form">
     <?php echo $this->Form->create('User',array('id'=>'reset'));   ?>
       <!--<p><label>  password  <i>*</i></label><span> <input type="password" id="pass5" name="data[User][pass]" required ></span></p>
       <p><label>  Confirm Password <i>*</i></label><span><input type="password"  name="data[User][password_confirm]" required></span></p> -->
      <div style="margin-top: 15px;margin-bottom: 0;" class="form-group">
            <input type="password" id="pass5" name="data[User][pass]" required  class="form-control login-field focus_frm" value="" placeholder="Password" />
            <label class="login-field-icon fui-user" for="login-name"></label>
        </div>
        <div style="margin-bottom: 0;"class="form-group">
            <input type="password"  name="data[User][password_confirm]" required class="form-control login-field focus_frm" value="" placeholder="Confirm New Password"/>
            <label class="login-field-icon fui-lock" for="login-pass"></label>
        </div>
        
      </div>
      
   <div class="login_buttonn "><input class="btn btn-primary btn-md btn_chdpwd" type="submit" name="submit" value="Submit" style="padding: 8px 10px;background: #fc0;border: 1px solid #fc0;font-weight: bold;"></div>
     <?php $this->Form->end(); ?>
     </div> </div>
   
   <div class="col-sm-3"></div>
   

   </div></div>
     </div><!--page inn end-->
     </div>
     <script type="text/javascript">
          $(document).ready(function() {
                $("#reset").validate({
                    errorElement: 'span',
                    rules: {
                      "data[User][password]": "required",
                        "data[User][password_confirm]": {
                            required: true,
                            minlength: 8,
                            equalTo: "#pass5"
                        }
                    },
                    messages: {
                           "data[User][password_confirm]": {
                            required: "Please Enter confirm password",
                            equalTo: "Confirm Password is not matching your Password"
                        }
                    },
                    submitHandler: function(form) {
                        form.submit();
                    }
                });
            });
            
         </script>
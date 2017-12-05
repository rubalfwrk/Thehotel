<div class="con_main">
     	<div class="container">
        
          <div class="page_inn">page inn start
        
        <div class="col-sm-3"></div>
     <div class="col-sm-6">
     <div class="login_box_m">
         <?php $x=$this->Session->flash(); 
//           if($x)
//           {
//               echo $x;
//           }
//           
//         
//         ?>
         <div class="login_b2">
   <div class="login_b"><h1>Forgot password</h1></div>
   <div class="login_outer_frm">
   <div class="loign_form">
       
       <p class="Worry"> Don't Worry! we'll help you to reset your password Just fill in your new password</p>
     <?php echo $this->Form->create('User',array('id'=>'reset'));   ?>
       <table class="forget_pw">
           <tr>
               <td><label>  Password  <i>*</i></label></td>
               <td><span> <input class="input_pw" type="password" id="pass5" name="data[User][password1]" required ></span></td>
           </tr>
           <tr>
               <td><label>  Confirm Password <i>*</i></label></td>
               <td><span><input class="input_pw" type="password"  name="data[User][password_confirm]" required></span></td>
           </tr>
       </table>
      </div>
      
       <div class="login_buttonn "><input type="submit" name="submit" value="Submit"></div></div>
     <?php $this->Form->end(); ?>
     
         </div>
     </div> </div>
   
   <div class="col-sm-3"></div>
   

   </div></div>
     </div>
     
 

<style>
    
    .login_box_m {
    float: left;
    width: 100%;
    margin-top: 19%;
}

.login_b2 {
    background: #f9f9f9 none repeat scroll 0 0;
    box-shadow: 0 0 1px #c5c5c5;
    float: left;
    margin-bottom: 10%;
    width: 100%;
    border-top-left-radius: 9px;
    border-top-right-radius: 9px;
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

.login_outer_frm {
    width: 100%;
    float: left;
    padding: 20px;
}

.login_buttonn input[type='submit'] {
    background: #fc0;
    border-radius: 7px;
    color: #fff;
    float: right;
    font-size: 16px;
    padding: 7px 0;
    text-transform: uppercase;
    width: 40%;
    border-color: transparent;
}

.Worry {
    font-size: 16px;
    line-height: 27px;
    margin-bottom: 6%;
}

.forget_pw{
    width: 100%;
    float:left;
    margin-bottom:15px ;
}

.input_pw{
    width: 100%;
    float: left;
    border-radius: 5px;
    border: 1px solid #ccc;
    padding: 4px;
    margin-bottom: 5px;
}
</style>
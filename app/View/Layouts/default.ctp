<?php 
/**
 *
 * PHP 5
 *
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright 2005-2012, Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright 2005-2012, Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       Cake.View.Layouts
 * @since         CakePHP(tm) v 0.10.0.1076
 * @license       MIT License (http://www.opensource.org/licenses/mit-license.php)
 */
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>The Hotels Template</title>
<link href="<?php echo $this->webroot?>home/css/bootstrap.min.css" rel="stylesheet">
<link href="<?php echo $this->webroot?>home/css/style.css" rel="stylesheet">
<link href="<?php echo $this->webroot?>home/font-awesome/css/font-awesome.min.css" rel="stylesheet">
<link rel="stylesheet" href="<?php echo $this->webroot?>home/build/freshslider.min.css">

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script> 
 <script src="<?php echo $this->webroot?>home/js/bootstrap.min.js"></script>
 
<style>

.locate_search {
  float: left;
  width: 100%;
  position: relative;
}
.form-group.search_locate {
  width: 100%;
  padding-right: 40px;
}
.locate_search button {
  position: absolute;
  right: 0;
  top: 0;
}
</style>
</head>
<body>

<!-------subcription plan modal------->

<div class="modal fade bs-example-modal-sm" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" id="subscriptions">
  <div class="modal-dialog modal-sm" role="document">
    <div class="modal-content">
      <div class="panel panel-primary">
          <form method ="post" action="<?php echo $this->webroot;?>users/molliePayment">
                <div class="panel-heading">
                    <h3 class="panel-title">
                        Subscription</h3>
                </div>
                <div class="panel-body">
                    <div class="the-price">
                        <h1>
                            $10<span class="subscript">/mo</span></h1>
                        <small>1 month FREE trial</small>
                    </div>
                    <table class="table">
                        <tr>
                            <td>
                                <input type="text" value="10.00" name="data[Order][first_name]" readonly="readonly">
                            </td>
                        </tr>
                        <tr class="active">
                            <td>
                               <input type="text" value="lorum" name="data[Order][last_name]" readonly="readonly">
                            </td>
                        </tr>
                        
                    </table>
                </div>
                <div class="panel-footer">
                    <input type="submit" class="btn btn-success" role="button" value="Sign Up">
                    1 month FREE trial</div>
          </form>
            </div>
    </div>
  </div>
</div>

<!-------subcription plan end------->


    <input type="hidden" id="lat" value="">
<input type="hidden" id="long" value="">
<!-----search toggle---->
<div class="search_toggle">
  <div class="container">
    <div class="col-md-10 col-md-offset-1">
      <div class="row">
      <form method="post" action="" >
        <div class="col-md-6">
       
            <div class="search_filter">
             <span class="filter_head">CATEGORIES:</span>
              
                <div class="dropdown">
                  <select class="filterCats" style="margin-top: 6px;margin-left: 10px;">
			  <option value="all">Select Category</option>
			    <?php foreach($res_types as $res){?>
				<option value="<?php echo $res['Cat']['id'];?>"><?php echo $res['Cat']['rest_type'];?></option>
				<?php } ?>
			  </select>
                </div>
            
            </div>
          </div>
          
          	
          <div class="col-md-6">
   
            <div class="search_filter">
             <span class="filter_head">WITH IN</span>
              
                <div data-role="page" style="float:left;">
                  <div data-role="main" class="ui-content">
                    
                    <div class="range-slider">
                        <input class="range-slider__range" type="range" value="0" min="0" max="100">
                        <span class="range-slider__value">0</span>
                  </div>
                   
                  </div>
                </div>
             
             <span class="filter_head">&lt;100 km</span><input style="margin-top: 5px;margin-left: 10px;" type="button" value="Apply" class="applybtn fillterbtn">
            </div>
        
         
	

	</div>
              
              
              
        </div>
           </form>
        </div>
        
      </div>
    </div>
  </div>
</div>
 
<input type='hidden' id='locationCats' value=''>
<input type='hidden' id='locationdis' value=''>
<!-----search toggle-end----> 

<!-----modal login---->
<div id="myModal" class="modal fade in" role="dialog" tabindex="-1" aria-labelledby="myModalLabel" style="display: none;">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
    <div class="modal-header">
      <h2 align="center">SIGN IN</h2>
      <button class="close" type="button" data-dismiss="modal" aria-label="Close"> <span aria-hidden="true">×</span> </button>
    </div>
    <form action="<?php echo $this->webroot; ?>users/login" method="post"class="popup-form" id="myLogin">
      <div class="login_icon"><i class="icon_lock_alt"></i></div>
      <div class="col-sm-12">
<div class="floating-placeholder">
        <input type="text" name="data[User][username]" class=" form-white" placeholder="Email">
      </div>
      </div>
      <div class="col-sm-12">
<div class="floating-placeholder">
      <input type="password" name="data[User][password]" class="form-white" placeholder="Password">
      </div>
        </div>
      <div class="col-sm-12">
<div style="border:0;" class="floating-placeholder">
      <input type="hidden" name="data[User][server]" value="<?php echo $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI']; ?>">
      </div>
      
      <!--<div class="text-left"> <a href="<?php echo $this->webroot; ?>users/forgetpwd">Forgot Password?</a> </div>-->
      
      
            <div class="chk">
     <input name="" value="" checked="" type="checkbox">
          <h5><a href="#">Remember me</a></h5>
   </div>
            <div class="forget">
     <h5><a href="<?php echo $this->webroot; ?>users/forgetpwd">Forgot Password ?</a></h5>
   </div>
  </div>
      

   
   
      <!--<div class="check_box">
   <div class="chk">
     <input name="" value="" checked="" type="checkbox">
          <h5><a href="#">Remember me</a></h5>
   </div>
   
      <div class="forget">
     <h5><a href="<?php echo $this->webroot; ?>users/forgetpwd">Forget Password ?</a></h5>
   </div>
  </div>-->
      
      <div class="col-sm-12">

      <button  class="btnwale" type="submit" class="btn btn-submit">
      Submit
      </button>
      </div>
    
      <div class="clearfix"></div>
      <div class="space-15"></div>
      <div class="text-center or">or</div>
      <div class="clearfix"></div>
      <div class="space-15"></div>
      <div class="clearfix"></div>
      <div class="space-15"></div>
      <p class="terms text-center"> By signing here, you agree to our <a href="<?php echo $this->webroot?>pages/terms"><b>Terms of Service</b></a> and <a href="<?php echo $this->webroot?>pages/privacyandpolicy"><b>Privacy Policy</b></a></p></a>
      <div class="space-20"></div>
      <div class="clearfix"></div>
      <div class="col-sm-12">
        <div class="new-member text-center"> New User? <a href="" data-dismiss="modal" data-toggle="modal" ng-click="hide_validate_span()" data-target="#myModal2">Sign Up</a> </div>
      </div>
      <div class="clearfix"></div>
      <div class="space-50"></div>
      </div>
    </form>
  </div>
</div>
</div>

<!-----modal-end----> 

<!--- model 2 signup ---->

<div id="myModal2" class="modal fade in" role="dialog" tabindex="-1" aria-labelledby="myModalLabel" style="display: none;">
 
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h2 align="center">SIGN UP</h2>
        <button class="close" type="button" data-dismiss="modal" aria-label="Close"> <span aria-hidden="true">×</span> </button>
      </div>
      <form action="<?php echo $this->webroot; ?>users/add" class="popup-form" method="post" id="myRegister">
      
      
            <div class="col-sm-12">
<div class="floating-placeholder">
  <input id="name" name="data[User][role]" type="hidden" placeholder="Full Name" value="customer">
  <!--<label for="name">Full Name</label>-->
</div>
</div>  
          
              <div class="col-sm-12">
<div class="floating-placeholder">
  <input id="name" name="data[User][name]" type="text" placeholder="Full Name">
  <!--<label for="name">Full Name</label>-->
</div>
</div>

        <div class="col-sm-12">
<div class="floating-placeholder">
  <input id="name" name="data[User][email]" type="text" placeholder="Username">
  <!--<label for="name">Email</label>-->
</div>
</div>

        <div class="col-sm-12">
<div class="floating-placeholder">
  <input id="name" name="data[User][username]" type="text" placeholder="Email">
  <!--<label for="name">Username</label>-->
</div>
</div>

        <div class="col-sm-12">
<div class="floating-placeholder">
  <input id="name" name="data[User][password]"  type="password" placeholder="Password">
  <!--<label for="name">Password</label>-->
</div>
</div>

        <div class="col-sm-12">
<div class="floating-placeholder">
  <input id="name" required name="data[User][cpassword]" type="password" placeholder="Confirm Password">
  <!--<label for="name">Confirm password</label>-->
</div>
</div>

      
        <!--<div class="login_icon"><i class="icon_lock_alt"></i></div>
        <input type="text" required class="form-control form-white" name="data[User][name]" placeholder="Full Name" maxlength="50" pattern="[a-zA-Z][a-zA-Z0-9\s]*">
        <input type="Email" required class="form-control form-white" name="data[User][email]"  placeholder="Email" maxlength="50">
        <input type="text" required class="form-control form-white" name="data[User][username]" placeholder="Username" maxlength="50">
        <input type="password" required class="form-control form-white" name="data[User][password]" placeholder="Password"  id="password1" maxlength="50">
        <input type="password" class="form-control form-white" placeholder="Confirm password"  id="password2" maxlength="50" required name="data[User][cpassword]">
        <input type="hidden" class="form-control form-white" name="data[User][role]" value="customer">-->
        
        
        
        
        
        <!--<input type="hidden" class="form-control form-white" name="data[User][name]" value="gurpreet Singh">-->
        <input type="hidden" class="form-control form-white" name="data[User][active]" value="1">
        <!--<input type="hidden" class="form-control form-white" name="data[User][password]" value="customer">-->
        <input type="hidden" name="data[User][server]" value="<?php echo $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI']; ?>">
        <div id="pass-info" class="clearfix"></div>
        <div class="checkbox-holder text-left">
        <div class="col-sm-12">
          <div class="checkbox checkbox1 checkbox-signup">
            <input  type="checkbox" value="accept_2" id="check_2" name="check_2" required />
            <label class="checkwale" for="check_2"></label>
            <a href="<?php echo $this->webroot?>pages/terms"><span>I Agree to the <strong>Terms &amp; Conditions</strong></span></a>
          </div>
          </div>
        </div>
<div class="col-sm-12">
        <button class="radius-6 sign-up-btn" type="submit" ng-click="nav_signin('customer','0')" class="btn btn-submit">
        Register
        </button>
      </form>
      </div>
      
      <div class="col-sm-12">
  
   <div class="space-20"></div>
<!--<div class="col-sm-12">
<input class="radius-6 sign-up-btn" ng-click="nav_signin('customer','0')" value="Let me in" type="button">

</div>-->
<div class="clearfix"></div>
<div class="space-15"></div>
<p class="terms text-center"> By signing here, you agree to our <a href="<?php echo $this->webroot?>pages/terms"><b>Terms of Service</b></a> and <a href="<?php echo $this->webroot?>pages/privacyandpolicy"><b>Privacy Policy</b></a></p></a>
<div class="space-20"></div>
<div class="clearfix"></div>
<div class="col-sm-12">
<div class="new-member text-center">
Old User?
<a href="" data-dismiss="modal" data-toggle="modal" ng-click="hide_validate_span()" data-target="#myModal">Sign In</a>
</div>
</div>
<div class="clearfix"></div>
<div class="space-50"></div> 
   
   
   
  </div>
      
    </div>
  </div>
</div>

<!--- model 2 end ---->



<!-----modal login-3---->
<div id="myModal3" class="modal fade in" role="dialog" tabindex="-1" aria-labelledby="myModalLabel" style="display: none;">
 
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h2 align="center">SIGN UP</h2>
        <button class="close" type="button" data-dismiss="modal" aria-label="Close"> <span aria-hidden="true">×</span> </button>
      </div>
      <form action="" class="popup-form businesspopup" method="post" id="myRegister">
      
      
            <div class="col-sm-12">
<div class="floating-placeholder">
  <input id="restAdmin" name="data[User][role]" type="hidden" placeholder="Full Name" value="rest_admin">
  <!--<label for="name">Full Name</label>-->
</div>
</div>  
           
<div class="col-sm-12">
    <div class="floating-placeholder">
      <input id="company" name="data[User][company]" type="text" placeholder="Company Name">
      <!--<label for="name">Full Name</label>-->
    </div>
</div>
          
<div class="col-sm-12">
    <div class="floating-placeholder">
      <input id="Address" name="data[User][address]" type="text" placeholder="Address">
      <!--<label for="name">Full Name</label>-->
    </div>
</div> 
          
          
<div class="col-sm-12">
    <div class="floating-placeholder">
      <input id="pin" name="data[User][zip]" type="text" placeholder="Postal Code">
      <!--<label for="name">Full Name</label>-->
    </div>
</div>
          
<div class="col-sm-12">
    <div class="floating-placeholder">
      <input id="city" required name="data[User][city]" type="text" placeholder="City">
      <!--<label for="name">Confirm password</label>-->
    </div>
</div>
          
<div class="col-sm-12">
    <div class="floating-placeholder">
      <input id="phonenumber" name="data[User][phone]" type="text" placeholder="Phone Number">
      <!--<label for="name">Full Name</label>-->
    </div>
</div>     
  
<div class="col-sm-12">
    <div class="floating-placeholder">
      <input id="kvk" name="data[User][kvk]" type="text" placeholder="KVK Number">
      <!--<label for="name">Full Name</label>-->
    </div>
</div>
          
<div class="col-sm-12">
    <div class="floating-placeholder">
      <input id="Email" name="data[User][username]" type="text" placeholder="Email">
      <!--<label for="name">Username</label>-->
    </div>
</div>       
   
<div class="col-sm-12">
    <div class="floating-placeholder">
      <input id="uname" name="data[User][email]" type="text" placeholder="Username">
      <!--<label for="name">Email</label>-->
    </div>
</div>


<div class="col-sm-12">
    <div class="floating-placeholder">
      <input id="pwd" name="data[User][password]"  type="password" placeholder="Password">
      <!--<label for="name">Password</label>-->
    </div>
</div>

<div class="col-sm-12">
    <div class="floating-placeholder">
      <input id="name" required name="data[User][cpassword]" type="password" placeholder="Confirm Password">
      <!--<label for="name">Confirm password</label>-->
    </div>
</div>
          

          

          
 
        <!--<input type="hidden" class="form-control form-white" name="data[User][name]" value="gurpreet Singh">-->
        <input type="hidden" class="form-control form-white" name="data[User][active]" value="1">
        <!--<input type="hidden" class="form-control form-white" name="data[User][password]" value="customer">-->
<!--        <input type="hidden" name="data[User][server]" value="<?php //echo $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI']; ?>">-->
        <div id="pass-info" class="clearfix"></div>
        <div class="checkbox-holder text-left">
        <div class="col-sm-12">
          <div class="checkbox checkbox1 checkbox-signup">
            <input  type="checkbox" value="accept_2" id="check_2" name="check_2" required />
            <label class="checkwale" for="check_2"></label>
            <a href="<?php echo $this->webroot?>pages/terms"><span>I Agree to the <strong>Terms &amp; Conditions</strong></span></a>
          </div>
          </div>
        </div>
<div class="col-sm-12">
        <button  class="radius-6 sign-up-btn" type="button"  class="btn btn-submit" id="businessForm" >
        Pay
        </button>
      </form>
</div>
      
      <div class="col-sm-12">
  
   <div class="space-20"></div>
<!--<div class="col-sm-12">
<input class="radius-6 sign-up-btn" ng-click="nav_signin('customer','0')" value="Let me in" type="button">

</div>-->
<div class="clearfix"></div>
<div class="space-15"></div>
<p class="terms text-center"> By signing here, you agree to our <a href="<?php echo $this->webroot?>pages/terms"><b>Terms of Service</b></a> and <a href="<?php echo $this->webroot?>pages/privacyandpolicy"><b>Privacy Policy</b></a></p></a>
<div class="space-20"></div>
<div class="clearfix"></div>
<div class="col-sm-12">
<div class="new-member text-center">
Old User?
<a href="" data-dismiss="modal" data-toggle="modal" ng-click="hide_validate_span()" data-target="#myModal">Sign In</a>
</div>
</div>
<div class="clearfix"></div>
<div class="space-50"></div> 
   
   
   
  </div>
      
    </div>
  </div>
</div>

<!-----modal-end-3----> 




<!-----header start----> 
<nav class="navbar navbar-default navbar-fixed-top" style="z-index:999;">
  <div class="container">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar"> <span class="sr-only">Toggle navigation</span> <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> </button>

      <a style="    margin-top: -26px;" class="navbar-brand" href="<?php echo $this->webroot;?>"><h2>The Hotel</h2></a> </div>
    <div id="navbar" class="navbar-collapse collapse">
      <ul class="nav navbar-nav navbar-right navright_cnt">
       
        
<!--          <form class="navbar-form navbar-left" role="search"  method="post">
          <div class="locate_search">
          <div class="form-group search_locate">
            <input id="autocomplete" type="text" class="form-control" placeholder="Search">
            <input type="hidden" name="data[Restaurant][lat]" class="field" id="latitude"></input>
            <input type="hidden" name="data[Restaurant][long]" class="field" id="longitude"></input>
          </div>
          <button style="background: none;" type="submit" class="btn btn-default"><i class="fa fa-search" aria-hidden="true"></i></button>
		</div>
        </form>-->
          
        
          
          
          
          
          
          
        <!-- <li><a style="outline: 0 !important;" class="search" href="#"><i class="fa fa-sliders slider_icn" aria-hidden="true"></i></a></li>
        <?php if (empty($loggeduser)) { ?>
        <li><a data-toggle="modal" data-target="#myModal" href="#contact"><b>SIGN IN</b></a></li>
		<li><a style="outline: 0 !important;" data-toggle="modal" data-target="#myModal3"><b>BUSINESS</b></a></li>
        <?php } else { ?>
        
		
		
        <li class="dropdown drp_edt"> <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"> My Account <span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="<?php echo $this->webroot?>restaurants/orderhistory">Favorites</a></li>
            <li><a href="<?php echo $this->webroot?>users/myaccount">Edit Info</a></li>
            <li><a href="<?php echo $this->webroot?>users/changepassword">Edit Password</a></li>
            <li><a href="<?php echo $this->webroot?>users/logout">Logout</a></li>
          </ul>
        </li>
		
		
        <?php } ?> -->
      </ul>
    </div>
    <!--/.nav-collapse --> 
  </div>
</nav>

<!-- End Header =============================================== --> 
<?php echo $this->fetch('content'); ?>
 <!-- <footer class="footer">
  <div class="container">
    <div style="padding-bottom: 65px;" class="row">
      <div class="col-md-3 keep">
        <h3 style="margin-bottom: 25px;">Information</h3>
        <ul>
          <li><a href="<?php echo $this->webroot?>pages/about">About us</a></li>
          <li><a href="<?php echo $this->webroot?>pages/privacyandpolicy">Privacy policy</a></li>
          <li><a href="<?php echo $this->webroot?>pages/terms">Terms & Conditions</a></li>
        </ul>
      </div>
     <div class="col-md-3">
        <h3 style="margin-bottom: 25px;">Contact us</h3>
        <p style="margin:0; font-size: 18px;"> The Hotels <br/>
          Nes 41, 1012 kc Amsterdam,Netherlands </p>
        <a style="color:#fff;font-size: 18px;">DHdeals@gmail.com</a> </div>
      <div class="col-md-3 keep">
        <h3 style="margin-bottom: 25px;">Keep in touch</h3>
        <ul>
          <li><a><i class="fa fa-facebook fb" aria-hidden="true"></i>Facebook</a></li>
          <li><a><i class="fa fa-twitter tw" aria-hidden="true"></i>Twitter</a></li>
          <li><a><i class="fa fa-google-plus gp" aria-hidden="true"></i>Google</a></li>
        </ul>
      </div>
      <div class="col-md-3 keep">
        <h3 style="margin-bottom: 25px;">Link</h3>
        <ul>
          <li><a href="" data-dismiss="modal" data-toggle="modal" ng-click="hide_validate_span()" data-target="#myModal2">Register</a></li>
          <li><a href="" data-dismiss="modal" data-toggle="modal" ng-click="hide_validate_span()" data-target="#myModal">Log In</a></li>
        </ul>
      </div> 
    </div>
  </div>
  <div class="text-muted">
    <div class="container"> <span class="bottom">copyright The Hotel classic © <?php echo date("Y"); ?>.All rights reserved</span> </div>
  </div>
</footer>-->

<!-- jQuery (necessary for Bootstrap's JavaScript plugins) --> 

<!-- Include all compiled plugins (below), or include individual files as needed --> 
<script>
    var rangeSlider = function(){
  var slider = $('.range-slider'),
      range = $('.range-slider__range'),
      value = $('.range-slider__value');
    console.log(range);
    console.log(value);
  slider.each(function(){

    value.each(function(){
      var value = $(this).prev().attr('value');
      $(this).html(value);
    });

    range.on('input', function(){
      $(this).next(value).html(this.value);
    });
  });
};

rangeSlider();
</script>
<script>
    $(".search").click(function(){
    $(".search_toggle").slideToggle('slow'); 
});
    </script>
 <script>   
  $(document).ready(function(){
      
var urlcat = '<?php echo $_GET['categories']; ?>';
var urlcity = '<?php echo $_GET['distance']; ?>';
if(urlcat){
$('.filterCats option').each(function(){
var option = $(this).val();
if(urlcat == option){
$(this).attr('selected','selected');
$('#locationCat').val(urlcat);
}
});
}

if(urlcity){ 
$('.range-slider__range').each(function(){
var option = $(this).val();
if(urlcity == option){
$(this).attr('selected','selected');
$('#locationdis').val(urlcity);
}
});
}


	$('.filterCats').change(function(){
	   console.log($(this).val());
	   $('#locationCats').val($(this).val());
	});
	
	$('.range-slider__range').change(function(){
            console.log($(this).val());
	   $('#locationdis').val($(this).val());
	});
        
	$(".fillterbtn").click(function(){
        var lat = $('#lat').val();
        var long = $('#long').val();
	if($('#locationdis').val() != ''){
	var city = $('#locationdis').val();
	}else{
	var city = 'all';
	}
	if($('#locationCats').val() != ''){
	var cat = $('#locationCats').val();
	}else{
	var cat = 'all';
	}
	console.log(cat);
	
	window.location.href = '<?php echo $this->webroot; ?>?distance='+city+'&categories='+cat+'&lat='+lat+'&long='+long;
	
	});
});
       
 </script>           
      
 <script>
//     $.post( "<?php //echo $this->webroot;?>products/searchData", function( data ) {
//         if(navigator.geolocation){
//
//navigator.geolocation.getCurrentPosition(function(position){
//
//var lat = position.coords.latitude;
//
//var lon = position.coords.longitude
//
//});
//
//}
//         alert(data);
//         var res = data.split(",");
//         $('#lat').val(res[0]);
//         $('#long').val(res[1]);
//       console.log(res);
//    });
    
   </script>
 
   
   <script>
       
   $(document).ready(function(){
           $("#businessForm").click(function(){ 
           var res = $('#restAdmin').val();
           var cmpy = $('#company').val();
           var addr = $('#Address').val();
           var pin = $('#pin').val();
           var city = $('#city').val();
           var phonenumber = $('#phonenumber').val();
           var kvk = $('#kvk').val();
           var Email = $('#Email').val();
           var uname = $('#uname').val();
           var pwd = $('#pwd').val();
           if(cmpy == ''||addr == ''||pin == ''||city == ''){
               alert('All fields are required');
           }else{
           var dataString = 'role='+ res + '&company='+ cmpy +'&address='+ addr + '&zip='+ pin + '&city='+ city +'&phone='+ phonenumber+'&kvk='+ kvk+'&email='+ Email+'&username='+ uname+'&password='+ pwd;
            console.log(dataString);
            $.ajax({
                type: "POST",
                url: "<?php echo $this->webroot; ?>users/adds",
                data: dataString,
                cache: false,
                success: function(result){
                    var obj = $.parseJSON( result);
                    console.log(obj);
                    if(obj.msg == "Data saved sucessfully"){
                        $("#myModal3").modal('hide'); 
                        $("#subscriptions").modal('show');  
                    }  
                }
            });
            }
        }); 
    });
   </script>
  
</body>
</html>
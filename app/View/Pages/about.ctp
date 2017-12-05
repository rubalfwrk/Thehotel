<!----Content Section Start --->

<div class="smart_container">

    <div class="about_us">
        <div class="container">
    		<h3><?php echo $staticabout[0]['Staticpage']['title'];?></h3>
        </div>
        <div class="overlay"></div>
    </div>
    
    <div class="about_cnt">
    	<div class="container">
		
        	<div class="row">
            	<div class="col-md-6">
                	<h3 class="color_text"><?php echo $staticabout[0]['Staticpage']['title'];?></h3>
                <?php //print_r($staticabout);?> 
                    <p><?php echo $staticabout[0]['Staticpage']['description'];?></p>
                </div>
                <div class="col-md-5 col-md-offset-1">
                    <div class="about_pic">
                    <img class="img-responsive" src="<?php echo $this->webroot?>files/staticpage/<?php echo $staticabout[0]['Staticpage']['image'];?>" />
                    </div>
                </div> 
                
            </div>
			
        </div>
    </div>
    
    
    
    
    
    
    <div class="jumb">
    <div class="container">
    
  <div class="headng"><h3 style="font-size:30px">DHdeals is the best way to find & discover great local deals</h3>
  <h4 style="font-size:21px">This won't be the last time you look for deals,but with DHdeals it may be the last time</h4></div>
  
  <a class="btn btn-primary btn-lg" href="<?php echo $this->webroot;?>" role="button"><img src="<?php echo $this->webroot?>home/img/logo.png" /></a>
  
  </div>
</div>
  
  
    
    
    </div><!----smart-container-->
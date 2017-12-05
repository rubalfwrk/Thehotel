<div class="smart_container">

<div class="about_us">
        <div class="container">
    		<h3>Favorites</h3>
        </div>
        <div class="overlay"></div>
    </div>


    <div style="margin-top: 2%;" class="inner_content">
        <div class="container">
            <div class="row">
			<?php if(empty($favlist)){ 
					echo "No Favorite Deals";
				}else{ 
					foreach($favlist as $res){
						
					?> 
          <div class="col-sm-6 col-md-3">
		  	<div class="restaurant_main">
			
			<div class="heart_main">
            
            
               <i class="heart fa fa-heart-o fa-heart  <?php if(in_array($res['Restaurant']['id'], $fav)){ echo 'fa-heart2';} ?>"></i> 
               
            <input type = "hidden" id="<?php echo $res['Restaurant']['id'];?>" class="resId">
                <input type = "hidden" id="<?php echo $loggeduser;?>" class="userId">
                </div>
			
            <div class="thumbnail thumb">
			<?php //print_r($ctname);?>
			
              <a href="<?php echo $this->webroot?>restaurants/detail/<?php echo $res['Restaurant']['id']?>/<?php echo $ctname['Cat']['rest_type']?>">
                  <div class="items"><img src="<?php echo $this->webroot?>files/restaurants/<?php echo $res['Restaurant']['logo'];?>" alt="..."></div>
                  <div class="caption">
                      <h3><?php echo $res['Restaurant']['name'];?></h3>
                <p><?php echo $res['Restaurant']['deals'];?></p>  
                
                                 
                  </div>
              </a>
			  
            </div>
			
          </div>
		  </div>
          <?php } }?>
          
          
          
         
          
        </div>
          </div>
         </div>
		
        
        
</div>
 <style>
         .heart1 {
    background: red;
  }
  .fa-heart2:before {
  content: "\f004" !important;
  color:#f00;
}
    </style>
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    
<script>
    $(document).ready(function(){
        $(".heart.fa").each(function(){
        $(this).click(function() {
      
            var hearIcon = $(this);
                //jQuery(this).prev("li").attr("id","newId");
                var res_id = $(this).next(".resId").attr("id");
                 var user_id = $(".userId").attr("id");
                //alert(res_id);
               // alert(user_id);
        //return false;
                //$(this).toggleClass("fa-heart fa-heart-o"); 
               
        var user =   '<?php echo $loggeduser; ?>';
     
    
    if(user != ''){
    $.ajax({
            type: "POST",
            url: "http://rajdeep.crystalbiltech.com/dhdeals2/restaurants/likeit", 
            data: {
                res_id: res_id,
                user_id: user_id
            },
            dataType: "json",
            success: function (data) {
                console.log(data);
               if(data.error == 0) {
                      hearIcon.removeClass('fa-heart2'); 
                  }else{
                hearIcon.addClass("fa-heart2"); 
            }
            }, 
            error: function () { 
                alert('Errorrrrrr!');
            }
     });
//return false;
     }else{
         hearIcon.attr('data-toggle','modal');
         hearIcon.attr('data-target','#myModal');
         hearIcon.trigger('click');
     }
            
   }); 
    });
            
    });
   
   
  
   
</script>
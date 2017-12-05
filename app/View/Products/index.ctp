<!----Content Section Start --->

<div class="smart_container">
<div class="session_msg"><?php echo $this->Session->flash('signup'); ?></div>
    <div class="container">

      <div class="row">

        <div class="col-xs-12 col-sm-9">
         <!-- <p class="pull-right visible-xs">
            <button type="button" class="btn btn-primary btn-xs" data-toggle="offcanvas">Toggle nav</button>
          </p>-->
           
          <div class="jumbotrn"></div>
<!--         <div id="map_wrapper">
              <input id="pac-input" class="controls" type="text" placeholder="Search Box">
    <div id="map_canvas" class="mapping"></div>
    
   
</div>-->
          
          
      <div style=" margin-top:0;background:none; width: 240px; height:40px; position: relative;">
      <input id="address" style="position:fixed;right: 26vw;top: 128px;"  type="text"
        placeholder="Enter a location">
         </div>
         

    <div>
        <div id="map-canvas" style="height: 55vh !important;width: 100%;position: relative; overflow: hidden !important; margin: 0!important;">
            
        </div>
    </div>    

          <div class="map_indicator">
          	<ul>
                    <li id="all" class="caticons"><a href="javascript:void(0)"><span class="icon_indi"> <img alt="img" src="<?php echo $this->webroot?>home/img/CatAll.png"></span>All</a></li>
                     <?php foreach($res_types as $res){?>
            	<li class ="caticon" id="<?php echo $res['Cat']['id']?>"><a href="javascript:void(0)"><span class="icon_indi"> <img src="<?php echo $this->webroot?>img/<?php echo $res['Cat']['image']?>" alt="img" /></span><?php echo $res['Cat']['rest_type']?></a></li>
                
                 <?php }?>
            </ul>
          </div>
         
          
          
          <!--/row-->
        </div><!--/.col-xs-12.col-sm-9--> 

        <div class="col-xs-12 col-sm-3 sidebar-offcanvas" id="sidebar">
        
        <div class="right_sidebar">
            <?php //print_r($latestdeal);?>
        	<h3 class="title">LATEST DEALS</h3>
        
        	<ul class="sidebar_right">
            <?php foreach($latestdeal as $deal){?>
            	<li class ="markid" id="<?php echo $deal['Restaurant']['id'];?>" onmouseover="hover(<?php echo $deal['Restaurant']['id'];?>)" onmouseout="out(<?php echo $deal['Restaurant']['id'];?>)"> 
                <a href="<?php echo $this->webroot?>restaurants/detail/<?php echo $deal['Restaurant']['id'];?>"> 
                	<span><img src="<?php echo $this->webroot?>files/restaurants/<?php echo $deal['Restaurant']['logo'];?>" alt=""></span>
                    
                    <div class="right_list">
                    <h3><?php echo $deal['Restaurant']['name'];?></h3>
                    <h6><?php echo $deal['Restaurant']['deals'];?></h6>
                        <!--div class="reviews">
                            <ul>
                            <li class="active"><i class="fa fa-star"></i></li>
                            <li class="active"><i class="fa fa-star"></i></li>
                            <li class="active"><i class="fa fa-star"></i></li>
                            <li><i class="fa fa-star"></i></li>
                            <li><i class="fa fa-star"></i></li>
                            </ul>
                        </div-->
                        </div>
                        
                </a>
                </li>
               
                
			<?php } ?>
                
                
                
            </ul>
              
                
        </div>
        
              
                        
        </div><!--/.sidebar-offcanvas-->
      </div><!--/row-->
    </div>
    
    
    <div class="container">
    
     <h3 class="title">MOST POPULAR DEALS</h3>
          <div class="filter">
          Filter by:
         <div class="btn-group">
              <!--button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                All location <span class="caret"></span>
              </button>
              <ul class="dropdown-menu">
                <li><a href="#">Action</a></li>
                <li><a href="#">Another action</a></li>
                <li><a href="#">Something else here</a></li>
                <li role="separator" class="divider"></li>
                <li><a href="#">Separated link</a></li>
              </ul-->
			  
			  <select class="filterRes">
			  <option value="all">Select Location</option>
			    <?php foreach($cities as $res){?>
				<option value="<?php echo $res['Restaurant']['city'];?>"><?php echo $res['Restaurant']['city'];?></option>
				<?php } ?>
			  </select>
			  
			  
        </div>
        
        <div class="btn-group">
              <!--button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                All categories <span class="caret"></span>
              </button>
              <ul class="dropdown-menu">
			  <?php //foreach($res_types as $res){?>
                <li><a href="#"><?php //echo $res['DishCategory']['name'];?></a></li>
                <?php //} ?>
              </ul-->
			  <select class="filterCat">
			  <option value="all">Select Category</option>
			    <?php foreach($res_types as $res){?>
				<option value="<?php echo $res['Cat']['id'];?>"><?php echo $res['Cat']['rest_type'];?></option>
				<?php } ?>
			  </select>
        </div>
        
        <div class="btn-group">
              <button type="button" class="applybtn">
                Apply 
              </button>
             
        </div>
        
    </div>
     

            <div class="row">
                <?php //print_r($data);exit;?>
                <?php if(empty($popularDeal)){ 
					echo "No Deals Available";
				}else{ 
					foreach($popularDeal as $popular){ ?>
                        
          <div class="col-sm-6 col-md-3">
		  <?php //print_r($popularDeal);exit;?>
            <div class="thumbnail thumb">
            
            <div style="left:22px;" class="heart_main">
              <i class="heart fa fa-heart-o fa-heart  <?php if(in_array($popular['Restaurant']['id'], $favs)){ echo 'fa-heart2';} ?>"></i> 
            <input type = "hidden" id="<?php echo $popular['Restaurant']['id'];?>" class="resId">
                <input type = "hidden" id="<?php echo $loggeduser;?>" class="userId">
                </div>
            
              <a href="<?php echo $this->webroot?>restaurants/detail/<?php echo $popular['Restaurant']['id']?>/<?php echo $popular['Cat']['rest_type']?>">
                  <div class="items"><img src="<?php echo $this->webroot?>files/restaurants/<?php echo $popular['Restaurant']['logo']?>" alt="..."></div>
                  <div class="caption">
                     <h3><?php echo $popular['Restaurant']['name']?></h3>
                    <p><?php echo $popular['Restaurant']['deals']?></p>
                    <!--div class="box blue_b"></div-->
                                    
                           <!--div class="reviews">
                                <ul>
                                <li class="active"><i class="fa fa-star"></i></li>
                                <li class="active"><i class="fa fa-star"></i></li>
                                <li class="active"><i class="fa fa-star"></i></li>
                                <li><i class="fa fa-star"></i></li>
                                <li><i class="fa fa-star"></i></li>
                                </ul>
                            </div-->
                                 
                  </div>
              </a>
            </div>
			
          </div>
                        <?php } }?>
        <?php //echo $this->Paginator->prev('< Previous ', null, null, array('class' => 'disabled')); ?>
		<?php //echo $this->Paginator->next(' Next >', null, null, array('class' => 'disabled')); ?>
          <?php //echo $this->Paginator->numbers(); ?>
         <nav aria-label="Page navigation" class="page_nav"> 
  <!--ul class="pagination">
    <li>
<?php //echo $this->Paginator->numbers(); ?>
      <a href="#" aria-label="Previous">
        <span aria-hidden="true">&laquo;</span>
      </a>
    </li>
    <li class="active"><a href="#">1 <span class="sr-only">(current)</span></a></li>
    <li><a href="#">2</a></li>
    <li><a href="#">3</a></li>
    <li><a href="#">4</a></li>
    <li><a href="#">5</a></li>
    <li>
      <a href="#" aria-label="Next">
        <span aria-hidden="true">&raquo;</span>
      </a>
    </li>
  </ul-->
</nav>
          
        </div>
    
    
    </div>
    
   <div class="collection"> 
        <div class="container">
		<?php //print_r($res_types);exit;?>
        <h3 class="title">CATEGORIES</h3>
                <div class="row">
				<?php foreach($res_types as $res){?>
                 <div class="col-xs-6 col-md-4">
                    <a href="<?php echo $this->webroot?>restaurants/categories/<?php echo $res['Cat']['id']; ?>" class="thumbnail">
                      <img src="<?php echo $this->webroot?>files/restaurants/<?php echo $res['Cat']['logo']?>" alt="img" />
                      <div class="overlay"></div>
                      <h3><?php echo $res['Cat']['rest_type'];?></h3>
                    </a>

                    
                  </div>
                  <?php } ?>
                
                  
                </div>
        </div>
  </div> 
    
    <!--div class="container">
    <h3 class="title">CATEGORIES</h3>
    	<div class="row">
    	
            	<?php foreach($res_types as $res){
				//print_r($res);exit;
						
				?>
                    <div class="col-md-3">
                    	<a href="<?php echo $this->webroot?>restaurants/categories/<?php echo $res['DishCategory']['id']; ?>" class="category blue">
                        	<span class="glyphicon"><i class="fa fa-star" aria-hidden="true"></i></span> 
                            <span class="text"><?php echo $res['DishCategory']['name'];?></span>
							
							<?php
 
$count = '';
							foreach($restcount as $rt){
							//print_r($rt);exit;
							
							if($res['DishCategory']['id'] == $rt[0]['Restaurant']['catid']){
							$count = count($rt);
							}
							}

							?>
							
							
                            <?php if($count != ''){ ?><span class="number"><?php echo $count; ?></span><?php } ?>
							
                        </a>
                    </div>
                      <?php }  ?>
                   
                    
        
        
    	</div>
    </div-->
    <input type='hidden' id='locationCity' value=''>
	<input type='hidden' id='locationCat' value=''>
        
        <input type='hidden' id='CatIcon' value=''>
    
    <div class="jumb">
    <div class="container">
    
  <div class="headng"><h3 style="font-size:30px">DHdeals is the best way to find & discover great local deals</h3>
  <h4 style="font-size:21px">This won't be the last time you look for deals,but with DHdeals it may be the last time</h4></div>
  
  <a class="btn btn-primary btn-lg" href="#" role="button"><img src="<?php echo $this->webroot?>home/img/logo.png" /></a>
  
  </div>
</div>
  
  
    
    
    </div><!----smart-container-->   
 <style>
     #pac-input {
    background-color: #fff;
    font-family: Roboto;
    font-size: 15px;
    font-weight: 300;
    margin-left: 400px;
    padding: 0 11px 0 13px;
    position: relative;
    text-overflow: ellipsis;
    top: 29px;
    width: 400px;
    z-index: 9999;
}
        #map_wrapper {
    height: 400px;
}
     #map_wrapper {
    height: 400px;
}

#map_canvas {
    width: 100%;
    height: 100%;
}

#map-canvas {
        margin: 0px auto;
        padding-top: 50px;
        margin-top: 54px;
        overflow: hidden !important;
        
      }
      #map-canvas {
	      margin-top: 40px;
      }

      #address {
      	position: relative !important !important;
	      background-color: #fff;
        padding: 0 11px 0 13px;
        width: 284px;
        font-family: Roboto;
        font-size: 15px;
        font-weight: 300;
        text-overflow: ellipsis;
        border: 1px solid #ddd;
        border-radius: 2px 0 0 2px;
        box-sizing: border-box;
        -moz-box-sizing: border-box;
        height: 32px;
        outline: none;
/*        box-shadow: 0 2px 6px rgba(0, 0, 0, 0.3);*/
        top:-40px !important !important;
        margin-top: -120px;
        z-index: 999;
      }


         .heart1 {
    background: red;
  }
  .fa-heart2:before {
  content: "\f004" !important;
  color:#f00;
}

#map {
        height: 470px;
        width: 100%;
       }

    </style>
<script src="https://cdn.klokantech.com/maptilerlayer/v1/index.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>


<script>
$(document).ready(function(){
var urlcat = '<?php echo $_GET['category']; ?>';
var urlcity = '<?php echo $_GET['location']; ?>';
if(urlcat){
$('.filterCat option').each(function(){
var option = $(this).val();
if(urlcat == option){
$(this).attr('selected','selected');
$('#locationCat').val(urlcat);
}
});
}
if(urlcity){ 
$('.filterRes option').each(function(){
var option = $(this).val();
if(urlcity == option){
$(this).attr('selected','selected');
$('#locationCity').val(urlcity);
}
});
}

	$('.filterCat').change(function(){
	   console.log($(this).val());
	   $('#locationCat').val($(this).val());
	});
	$('.filterRes').change(function(){
	   $('#locationCity').val($(this).val());
	});
	
	$(".applybtn").click(function(){

	if($('#locationCity').val() != ''){
	var city = $('#locationCity').val();
	}else{
	var city = 'all';
	}
	if($('#locationCat').val() != ''){
	var cat = $('#locationCat').val();
	}else{
	var cat = 'all';
	}
	console.log(city);
	
	window.location.href = '<?php echo $this->webroot; ?>?location='+city+'&category='+cat;
	
	});
});
</script>


<script>
$(document).ready(function(){
//var urlcat = '<?php //echo $_GET['cats']; ?>';
  
        $('.caticon').each(function(){
            $(this).click(function(){
            var catid = $(this).attr('id');
            window.location.href = '<?php echo $this->webroot; ?>?cats='+catid;
            });
    });
    
    
            $('.caticons').click(function(){
            var catids = $(this).attr('id');
            window.location.href = '<?php echo $this->webroot; ?>?catsAll='+catids;
            });
   
});
</script>


<script>
    $(document).ready(function(){
        $(".heart.fa").each(function(){
        $(this).click(function() {
      
            var hearIcon = $(this);
                //jQuery(this).prev("li").attr("id","newId");
                var res_id = $(this).next(".resId").attr("id");
                 var user_id = $(".userId").attr("id");
               // alert(res_id);
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

 
<script>
   
     var icon2 = "http://rajdeep.crystalbiltech.com/dhdeals2/home/img/maploc.png";
     var cr1 = 'http://rajdeep.crystalbiltech.com/dhdeals2/home/img/newMark.png';
     var images =  new Array();
           <?php 
            foreach($maps as $mapss){ 
                $markers = $mapss['Restaurant']['marker'];
                
            ?>
            images.push('<?php echo 'http://rajdeep.crystalbiltech.com/dhdeals2/files/restaurants/'.$markers; ?>');
         
        <?php } ?>
      var allMarkers = [];
      var arr = [];
function hover(id) {
    
    for ( var i = 0; i< allMarkers.length; i++) {
        if (id === allMarkers[i].id) {
           allMarkers[i].setIcon(icon2);
           break;
        }
   }
}
function out(id) { 
  
    for ( var i = 0; i< allMarkers.length; i++) {
        
        if (id === allMarkers[i].id) {
           allMarkers[i].setIcon(images[i]);
          break;
        }
   }
}

function initializes() {
    var map;
    var bounds = new google.maps.LatLngBounds();
    var mapOptions = {
        mapTypeId: 'roadmap',
        streetViewControl: false,
        tilt: 0,
        zoomControl: true,
        scaleControl: true
        //disableDefaultUI: true
    };
    
    // Display a map on the page
    map = new google.maps.Map(document.getElementById("map-canvas"), mapOptions);
    console.log(map);
    map.setTilt(45);
     
      var input = /** @type {HTMLInputElement} */(
      document.getElementById('address'));

  var types = document.getElementById('type-selector');

  map.controls[google.maps.ControlPosition.TOP_LEFT].push(types);

  var autocomplete = new google.maps.places.Autocomplete(input);
  autocomplete.bindTo('bounds', map);
     google.maps.event.addListener(autocomplete, 'place_changed', function() {
    //infowindow.close();
    marker.setVisible(false);
    var place = autocomplete.getPlace();
    if (!place.geometry) {
      return;
    }

    // If the place has a geometry, then present it on a map.
    if (place.geometry.viewport) {
      map.fitBounds(place.geometry.viewport);
    } else {
      map.setCenter(place.geometry.location);
      map.setZoom(17);  // Why 17? Because it looks good.
    }
//    marker.setIcon(/** @type {google.maps.Icon} */({
//      url: place.icon,
//      size: new google.maps.Size(71, 71),
//      origin: new google.maps.Point(0, 0),
//      anchor: new google.maps.Point(17, 34),
//      scaledSize: new google.maps.Size(35, 35)
//    }));
//    marker.setPosition(place.geometry.location);
//    marker.setVisible(true);

//    var address = '';
//    if (place.address_components) {
//      address = [
//        (place.address_components[0] && place.address_components[0].short_name || ''),
//        (place.address_components[1] && place.address_components[1].short_name || ''),
//        (place.address_components[2] && place.address_components[2].short_name || '')
//      ].join(' ');
//    }
//
//    infowindow.setContent('<div><strong>' + place.name + '</strong><br>' + address);
//    infowindow.open(map, marker);
  });
  
   
     
    // Multiple Markers 
    var markers = [
        
        <?php //print_r($maps);
    foreach($maps as $mymap):
        $latitudez = $mymap['Restaurant']['latitude'];
        $longitudez =  $mymap['Restaurant']['longitude'];
        $city =  $mymap['Restaurant']['city'];
        $state =  $mymap['Restaurant']['state'];
        $id =  $mymap['Restaurant']['id'];
         //$marker =  $mymap['Restaurant']['marker'];
        ?>
                   
        ['<?php echo $city;?>, <?php echo $state;?>', <?php echo $latitudez;?>,<?php echo $longitudez;?>],
        //['Palace of Westminster, London', 51.499633,-0.124755],
 <?php endforeach;  ?>  
    ];
     var markid = [
          <?php foreach($maps as $mymap):
       
        $id =  $mymap['Restaurant']['id'];
         $marker =  $mymap['Restaurant']['created'];
        ?>
                    [<?php echo $id;?>,'<?php echo $marker;?>'],
                       
      <?php endforeach;  ?>  
     ]; 
     
  // console.log(markid);  


var todayTimeStamp = +new Date; // Unix timestamp in milliseconds
var oneDayTimeStamp = 1000 * 60 * 60 * 24; // Milliseconds in a day
var diff = todayTimeStamp - oneDayTimeStamp;
var yesterdayDate = new Date(diff);
var mnth = ('0'+(yesterdayDate.getMonth() + 1)).slice(-2);
//console.log(mnth);
var yesterdayString = yesterdayDate.getFullYear() + '-' + (mnth) + '-' + yesterdayDate.getDate();
console.log(yesterdayString);

var todayTimeStamp2 = +new Date; // Unix timestamp in milliseconds
var oneDayTimeStamp2 = 2000 * 60 * 60 * 24; // Milliseconds in a day
var diff2 = todayTimeStamp2 - oneDayTimeStamp2;
var yesterdayDate2 = new Date(diff2);
var mnth2 = ('0'+(yesterdayDate2.getMonth() + 1)).slice(-2);
//console.log(mnth);
var yesterdayString2 = yesterdayDate2.getFullYear() + '-' + (mnth2) + '-' + yesterdayDate2.getDate();
console.log(yesterdayString2);
var todayTimeStamp3 = +new Date; // Unix timestamp in milliseconds
var oneDayTimeStamp3 = 3000 * 60 * 60 * 24; // Milliseconds in a day
var diff3 = todayTimeStamp3 - oneDayTimeStamp3;
var yesterdayDate3 = new Date(diff3);
var mnth3 = ('0'+(yesterdayDate3.getMonth() + 1)).slice(-2);
//console.log(mnth);
var yesterdayString3 = yesterdayDate3.getFullYear() + '-' + (mnth3) + '-' + yesterdayDate3.getDate();
console.log(yesterdayString3);
var todayTimeStamp4 = +new Date; // Unix timestamp in milliseconds
var oneDayTimeStamp4 = 4000 * 60 * 60 * 24; // Milliseconds in a day
var diff4 = todayTimeStamp4 - oneDayTimeStamp4;
var yesterdayDate4 = new Date(diff4);
var mnth4 = ('0'+(yesterdayDate4.getMonth() + 1)).slice(-2);
//console.log(mnth);
var yesterdayString4 = yesterdayDate4.getFullYear() + '-' + (mnth4) + '-' + yesterdayDate4.getDate();
console.log(yesterdayString4);
var todayTimeStamp5 = +new Date; // Unix timestamp in milliseconds
var oneDayTimeStamp5 = 5000 * 60 * 60 * 24; // Milliseconds in a day
var diff5 = todayTimeStamp5 - oneDayTimeStamp5;
var yesterdayDate5 = new Date(diff5);
var mnth5 = ('0'+(yesterdayDate5.getMonth() + 1)).slice(-2);
//console.log(mnth);
var yesterdayString5 = yesterdayDate5.getFullYear() + '-' + (mnth5) + '-' + yesterdayDate5.getDate();

console.log(yesterdayString5);
    
//        var date1 = newMark1[0];
//            //console.log(date1);
//        var date2 = '2017-02-25';
//
//        // First we split the values to arrays date1[0] is the year, [1] the month and [2] the day
//        date1 = date1.split('-');
//        date2 = date2.split('-');
//
//        // Now we convert the array to a Date object, which has several helpful methods
//        date1 = new Date(date1[0], date1[1], date1[2]);
//        date2 = new Date(date2[0], date2[1], date2[2]);
//
//        // We use the getTime() method and get the unixtime (in milliseconds, but we want seconds, therefore we divide it through 1000)
//        date1_unixtime = parseInt(date1.getTime() / 1000);
//        date2_unixtime = parseInt(date2.getTime() / 1000);
//
//        // This is the calculated difference in seconds
//        var timeDifference = date2_unixtime - date1_unixtime;
//
//        // in Hours
//        var timeDifferenceInHours = timeDifference / 60 / 60;
//
//        // and finaly, in days :)
//        var timeDifferenceInDays = timeDifferenceInHours  / 24;
//
//        console.log(timeDifferenceInDays);
        
        
    // Info Window Content 
    var infoWindowContent = [
          <?php //print_r($maps);
            foreach($maps as $mymap):
                $id = $mymap['Restaurant']['id'];
                $name = $mymap['Restaurant']['name'];
                $desc =  $mymap['Restaurant']['description'];
                $deals =  $mymap['Restaurant']['deals'];
                $imgDeal =  $mymap['Restaurant']['logo'];
                $catName =  $mymap['Cat']['rest_type'];
           ?>
          
        ['<div class="info_content" style="overflow:hidden">' +  
        '<h4 style="display:none; color:red;" class="rt">New</h4>'+
        '<h3><?php echo $name; ?></h3>' +
        '<img src="<?php echo $this->webroot?>files/restaurants/<?php echo $imgDeal;?>" width="90px" height="90px">' + 
        '<p><?php echo $deals; ?></p>' +
        '<a class="view_deals" href="<?php echo $this->webroot?>restaurants/detail/<?php echo $id;?>/<?php echo $catName;?>">view Deal</a>'+ '</div>'],  
        <?php endforeach;  ?>   
        
    ];
    
    
           var image =  new Array();
           <?php 
            foreach($maps as $mapss){ 
                $markers = $mapss['Restaurant']['marker'];
                
            ?>
            image.push('<?php echo 'http://rajdeep.crystalbiltech.com/dhdeals2/files/restaurants/'.$markers; ?>');
         
        <?php } ?>
            console.log(image);
            
            var cr = 'http://rajdeep.crystalbiltech.com/dhdeals2/home/img/newMark.png';
            var imagess =  new Array();
          
            imagess.push(cr);
         
      
            console.log(imagess);
            
       //var cr = 'http://rajdeep.crystalbiltech.com/dhdeals2/files/restaurants/Bar1.png';
    // Display multiple markers on a map
    var infoWindow = new google.maps.InfoWindow(), marker, i;
   // console.log(infoWindow);
var ar = new Array();
    for( i = 0; i < markid.length; i++ ) {
         // var strss = markid[i][0].split(',');
           var newMark = markid[i][1].split(",");
           var newMark1 = newMark[0].split(" ");
           console.log(newMark);
          // console.log(yesterdayString);
           if(newMark1[0] == yesterdayString){
               //console.log('new res');
              ar.push(markid[i][0])
           }else if(newMark1[0] == yesterdayString2){
               ar.push(markid[i][0])
           }else if(newMark1[0] == yesterdayString3){
               ar.push(markid[i][0])
           }else if(newMark1[0] == yesterdayString4){
               ar.push(markid[i][0])
           }else if(newMark1[0] == yesterdayString5){
               ar.push(markid[i][0])
           } 
           
     }
     
     
     //console.log(ar);
      for( i = 0; i < markers.length; i++ ) {
        
        
        var position = new google.maps.LatLng(markers[i][1], markers[i][2]);
        bounds.extend(position);
        console.log(ar);
        if(jQuery.inArray(markid[i][0],ar) !== -1){
            console.log('1');

        
        
            marker = new google.maps.Marker({
            position: position,
            map: map,
            id:markid[i][0],
            title: markers[i][0],
            icon: image[i]
        });
        
        }else{
             console.log('2');

        
            marker = new google.maps.Marker({
            position: position,
            map: map,
            id:markid[i][0],
            title: markers[i][0],
            icon: image[i]
        });
 
        
        
    }
        console.log(marker); 
       allMarkers.push(marker);
     var iconIDs = '';
   // alternateMarkers.push(altMarkImg);
        // Allow each marker to have an info window    
        google.maps.event.addListener(marker, 'click', (function(marker, i) {
            
            return function() {
                infoWindow.setContent(infoWindowContent[i][0]);
              
                if(jQuery.inArray(marker.id,ar) !== -1){
                    $('.info_content .rt').css('display','block');
                     
                }else{
                     
                    $('.info_content .rt').css('display','none');
                    
                }
                 
                 infoWindow.open(map, marker);
                var idm = marker.id;
                console.log(idm);
                $("li.markid").each(function() {
                    var u = $(this);
                  iconIDs=$(this).attr('id');
                  if(idm == iconIDs){
                     $(this).css('background-color','#fc0');//remove sidebar links back colors 
                    
                  }else{
                      $(this).css('background-color','#fff');
                  }
                  var ty = $('.gm-style-iw').next();
                  ty.click(function(){
                     u.css('background-color','#fff');
                  });
                 });
                
            }
        })(marker, i));
       
//       google.maps.event.addListener(marker, 'mouseout', (function(marker, i) {
//            return function() {
//                infoWindow.setContent(infoWindowContent[i][0]);
//                 infoWindow.open(map, marker);
//                 infoWindow.close(map, marker);
//                var idm = marker.id; 
//                console.log(idm);
//                $("li.markid").each(function() {
//                  iconIDs=$(this).attr('id');
//                  if(idm == iconIDs){
//                     $(this).css('background-color','#fff');//remove sidebar links back colors 
//                  }
//                 });
//                
//            }
//        })(marker, i));
        
        // Automatically center the map fitting all markers on the screen
        map.fitBounds(bounds);
        
        
    }
     
      
     
     
     
     
     
    // Loop through our array of markers & place each one on the map  
   

// Try HTML5 geolocation.

/*******************    gps location *************************/
 var cr = 'http://rajdeep.crystalbiltech.com/dhdeals2/home/img/current_icon-01.png';
var controlDiv = document.createElement('div');
	
	var firstChild = document.createElement('button');
	firstChild.style.backgroundColor = '#fff';
	firstChild.style.border = 'none';
	firstChild.style.outline = 'none';
	firstChild.style.width = '28px';
	firstChild.style.height = '28px';
	firstChild.style.borderRadius = '2px';
	firstChild.style.boxShadow = '0 1px 4px rgba(0,0,0,0.3)';
	firstChild.style.cursor = 'pointer';
	firstChild.style.marginRight = '10px';
	firstChild.style.padding = '0px';
	firstChild.title = 'Your Location';
	controlDiv.appendChild(firstChild);
	
	var secondChild = document.createElement('div');
	secondChild.style.margin = '5px';
	secondChild.style.width = '18px';
	secondChild.style.height = '18px';
	secondChild.style.backgroundImage = 'url(https://maps.gstatic.com/tactile/mylocation/mylocation-sprite-1x.png)';
	secondChild.style.backgroundSize = '180px 18px';
	secondChild.style.backgroundPosition = '0px 0px';
	secondChild.style.backgroundRepeat = 'no-repeat';
	secondChild.id = 'you_location_img';
	firstChild.appendChild(secondChild);
	
	google.maps.event.addListener(map, 'dragend', function() {
		$('#you_location_img').css('background-position', '0px 0px');
	});

	firstChild.addEventListener('click', function() { 
		var imgX = '0';
		var animationInterval = setInterval(function(){
			if(imgX == '-18') imgX = '0';
			else imgX = '-18';
			$('#you_location_img').css('background-position', imgX+'px 0px');
		}, 500);
		 if (navigator.geolocation) {
          navigator.geolocation.getCurrentPosition(function(position) {
              document.getElementById('lat').value = position.coords.latitude;
              document.getElementById('long').value = position.coords.longitude;
            var pos = {
              lat: position.coords.latitude,
              lng: position.coords.longitude,
             
            };
 console.log(pos);
        markers = new google.maps.Marker({
            position: pos,
            map: map,
            //title: markers[i][0],
            icon: cr
        });
 
 
            //infoWindow.setPosition(pos);
           /*var circle = new google.maps.Circle({
          center: pos,
          radius: position.coords.accuracy,
          map: map,
          fillColor: '#0000FF',
          fillOpacity: 0.5,
          strokeColor: '#0000FF',
          strokeOpacity: 1.0
        });*/
            map.setCenter(pos);
            
          }, function() {
            handleLocationError(true, infoWindow, map.getCenter());
          });
        } else {
          // Browser doesn't support Geolocation
          handleLocationError(false, infoWindow, map.getCenter());
        }
	});
	
	controlDiv.index = 1;
	map.controls[google.maps.ControlPosition.RIGHT_BOTTOM].push(controlDiv);

/*******************   End gps location *************************/
       
      function handleLocationError(browserHasGeolocation, infoWindow, pos) {
        infoWindow.setPosition(pos);
        infoWindow.setContent(browserHasGeolocation ?
                              'Error: The Geolocation service failed.' :
                              'Error: Your browser doesn\'t support geolocation.');
      }



     
}




    </script>
     <script>
    $(document).ready(function(){
        if(navigator.geolocation){
            navigator.geolocation.getCurrentPosition(function(position){
            document.getElementById('lat').value = position.coords.latitude;
            document.getElementById('long').value = position.coords.longitude;
            var lat = position.coords.latitude;

            var lon = position.coords.longitude;
              
              console.log(lat);
              console.log(lon);

            });

         }
        //$('#you_location_img').trigger('click'); 
       //console.log(res);
    });
      </script>
   <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAFBwip8aVt9LCuo3GxTzHwLiJT2jgh-uM&libraries=places&callback=initializes"
         async defer></script>
         
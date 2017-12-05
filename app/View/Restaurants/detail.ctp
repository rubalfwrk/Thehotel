<!-----share modal---->

<div id="shareModal" class="modal fade in" role="dialog" tabindex="-1" aria-labelledby="myModalLabel" style="display: none;">
<div class="modal-dialog" role="document">
<div class="modal-content cntnt">

    <div class="modal-header">
    <h2 align="center">SHARE</h2>
    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
    <span aria-hidden="true">×</span>
    </button>
    </div>

  
    <div class="col-sm-12">
    <button  id = "share_button"class="btn btn-block facebook_btn" data-dismiss="modal" data-toggle="modal" onclick="fb_login("signup	     ")">
    
    Share on Facebook
    </button>
    </div>
	<div class="text-center or">or</div>

    <div class="col-sm-6">
    <a href="https://api.addthis.com/oexchange/0.8/forward/twitter/offer?url=http://rajdeep.crystalbiltech.com/dhdeals2/restaurants/detail/<?php echo $restdetail[0]['Restaurant']['id'];?>&pubid=ra-42fed1e187bae420&title=AddThis%20%7C%20Home&ct=1" target="_blank"><button style="background:#00b2f8;" class="btn btn-block facebook_btn">Share on Twitter</button></a> 
	
    </div>
    
    <div class="col-sm-6">
    <a href="https://plus.google.com/share?url=http://rajdeep.crystalbiltech.com/dhdeals2/restaurants/detail/<?php echo $restdetail[0]['Restaurant']['id'];?>" onclick="javascript:window.open(this.href,
  '', 'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=600,width=600');return false;" > <span class="size" data-toggle="tooltip" title="Email"><button style="background:#dd4c39 ;" class="btn btn-block facebook_btn">Share on Google+</button></span></a>
	
	
    </div>

   <div class="text-center or">&nbsp;</div>
   
   
  </div>
  

</div>
</div>


<!-----share modal end---->

    
<!----Content Section Start --->

<div class="smart_container">
<div id="fb-root"></div>
<script>
window.fbAsyncInit = function() {
FB.init({appId: '1503653092993372', status: true, cookie: true,
xfbml: true});
};
(function() {
var e = document.createElement('script'); e.async = true;
e.src = document.location.protocol +
'//connect.facebook.net/en_US/all.js';
document.getElementById('fb-root').appendChild(e);
}());
</script> 
        <div class="full_map">
    
          
              <!--div class="jumbotrn">
                
              </div-->
              <!--/row-->
              </div>
        <!--<div id="map_wrapper">
            <div id="map_canvass" class="mapping"></div>
        </div>--> 
    

 <div style=" margin-top:0;background:none; width: 240px; height:40px; position: relative;">
      <input id="address" style="position:fixed;right: 22vw;top: 128px;"  type="text"
        placeholder="Enter a location">
         </div>
         

    <div>
        <div id="map-canvas" style="height: 65vh !important;width: 100%;position: relative; overflow: hidden !important; margin: 0!important;">
            
        </div>
            
    </div>  
    
    <div class="inner_content">
        <div class="container">
            <div class="row">
                <div class="col-md-9">
                	<div class="contact">
                    <?php foreach($brndcrumb as $crumb){
								$cbs = $crumb['Cat']['rest_type'];
								$catid = $crumb['Cat']['id']; 
								$this->Html->addCrumb($cbs, array('controller'=>'restaurants/categories/'.$catid)); 
							}
						?>
                    	<div class="crumb">
						     
                            <ol class="breadcrumb">
                              <li><a href="#"><?php echo $this->Html->getCrumbs(' / ', 'Home');?></a></li>
                              
                            </ol>
                          </div>
                        
					<?php// $this->Html->addCrumb($brndcrumb, 'Customers/add'); ?>
					
                	<div class="row">
                    		<div class="col-md-5">
                            	<div class="bar_pic"><img src="<?php echo $this->webroot?>files/restaurants/<?php echo $restdetail[0]['Restaurant']['logo'];?>" /></div>
                                <!--div class="box blue_b"></div-->
                                
                                <ul class="address">
                                    <li> <i class="fa fa-map-marker" aria-hidden="true"></i> <?php echo $restdetail[0]['Restaurant']['address'];?></li>
                                    <!--li class="grey"><i class="fa fa-calendar" aria-hidden="true"></i> No specify serve day</li-->
                                    <a data-toggle="modal" data-target="#shareModal" class="owner share_edt" id="share_button1">SHARE</a>
									
</a>
                                </ul>
                                
                            </div>
                            
                            <div class="col-md-7">
                            	<div class="right_bar">
                                		<h3><?php echo $restdetail[0]['Restaurant']['name'];?></h3>
                                        <!--div class="reviews">
                                            <ul>
                                            <li class="active"><i class="fa fa-star"></i></li>
                                            <li class="active"><i class="fa fa-star"></i></li>
                                            <li class="active"><i class="fa fa-star"></i></li>
                                            <li><i class="fa fa-star"></i></li>
                                            <li><i class="fa fa-star"></i></li>
                                            </ul>
                                        </div-->
                                        
                                        <!--div class="thumb_pic">
                                        	<img src="image/bar.jpg" alt="..." class="img-thumbnail pic_margin">
                                            <img src="image/bar.jpg" alt="..." class="img-thumbnail">
                                            <img src="image/bar.jpg" alt="..." class="img-thumbnail">
                                        </div-->
                                        
                                        <p><?php echo $restdetail[0]['Restaurant']['description'];?></p>
                                </div>
                            </div>
                    </div>
                </div>
                
            </div>
                
                <div class="col-md-3">
                     
                     <div class="right_sidebar">
        
        	<h3 class="title">LATEST DEALS</h3>
        
        	<ul class="sidebar_right">
				 <?php foreach($latestdeals as $deals){?>
            	<li class ="markid" id="<?php echo $deals['Restaurant']['id'];?>" onmouseover="hover(<?php echo $deals['Restaurant']['id'];?>)" onmouseout="out(<?php echo $deals['Restaurant']['id'];?>)"> 
                <a href="<?php echo $this->webroot?>restaurants/detail/<? echo $deals['Restaurant']['id'];?>">
                	<span><img src="<?php echo $this->webroot?>files/restaurants/<?php echo $deals['Restaurant']['logo'];?>" alt="images"></span>
                    
                    <div class="right_list">
                    <h3><?php echo $deals['Restaurant']['name'];?></h3>
                    <h6><?php echo $deals['Restaurant']['deals'];?></h6>
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
                     
                </div>
                
            </div>
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

    </style>
	
	
 <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAFBwip8aVt9LCuo3GxTzHwLiJT2jgh-uM"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>

	<script type="text/javascript">
		$(document).ready(function(){
		$('#share_button').click(function(e){
		//alert("ajay");
		e.preventDefault();
		FB.ui(
		{
		method: 'feed',
		name: '<?php echo $restdetail[0]['Restaurant']['name'];?>.',
		link: ' https://rajdeep.crystalbiltech.com/dhdeals2/',
		picture: 'https://rajdeep.crystalbiltech.com/dhdeals2/files/restaurants/<?php echo $restdetail[0]['Restaurant']['logo'];?>',
		caption: '<?php echo "Price: $".$restdetail[0]['Restaurant']['name']; ?>',
		description: '<?php echo $restdetail[0]['Restaurant']['description'];?>',
		message: ''
		});
		});
		});
	</script> 
	
	


<script>
var icon2 = "http://rajdeep.crystalbiltech.com/dhdeals2/home/img/maploc.png";
    // var cr = 'http://rajdeep.crystalbiltech.com/dhdeals2/files/restaurants/shop1.png';
     var images =  new Array();
           <?php 
            foreach($restdetail as $mapss){ 
                $markers = $mapss['Restaurant']['marker'];
                
            ?>
            images.push('<?php echo 'http://rajdeep.crystalbiltech.com/dhdeals2/files/restaurants/'.$markers; ?>');
         
        <?php } ?>
      var allMarkers = [];
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
        //zoom: 10,
        streetViewControl: false,
        tilt: 0,
        zoomControl: true,
       // scaleControl: true,
        disableDefaultUI: true
    };

//console.log(mapOptions);

    // Display a map on the page
    map = new google.maps.Map(document.getElementById("map-canvas"), mapOptions);
console.log(map);
    map.setTilt(45);
     map.setZoom(4);
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
      map.setZoom(10);  // Why 17? Because it looks good.
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
    foreach($restdetail as $mymap):
        $latitudez = $mymap['Restaurant']['latitude'];
        $longitudez =  $mymap['Restaurant']['longitude'];
        $city =  $mymap['Restaurant']['city'];
        $state =  $mymap['Restaurant']['state'];
        $id =  $mymap['Restaurant']['id'];
        ?>
                   
        ['<?php echo $city;?>, <?php echo $state;?>', <?php echo $latitudez;?>,<?php echo $longitudez;?>],
        //['Palace of Westminster, London', 51.499633,-0.124755],
 <?php endforeach;  ?>  
    ];
     
     var markid = [
          <?php foreach($restdetail as $mymap):
       
        $id =  $mymap['Restaurant']['id'];
        $marker =  $mymap['Restaurant']['created'];
        ?>
                     [<?php echo $id;?>,'<?php echo $marker;?>'],
      <?php endforeach;  ?>  
     ]; 

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
    
    // Info Window Content 
    var infoWindowContent = [
          <?php //print_r($maps);
            foreach($restdetail as $mymap):
				$id = $mymap['Restaurant']['id'];
                $name = $mymap['Restaurant']['name'];
                $desc =  $mymap['Restaurant']['description'];
                $deals =  $mymap['Restaurant']['deals'];
				$imgDeal =  $mymap['Restaurant']['logo'];
         
           ?>
        ['<div class="info_content" style="overflow:hidden">' +  
        '<h4 style="display:none; color:red;" class="rt">New</h4>'+
        '<h3><?php echo $name; ?></h3>' +
        '<img src="<?php echo $this->webroot?>files/restaurants/<?php echo $imgDeal;?>" width="90px" height="90px">' + 
        '<p><?php echo $deals; ?></p>' +'</div>'],  
        <?php endforeach;  ?>   
    ];
	
	
	
	
	
	
    
    var image =  new Array();
    <?php 
        foreach($restdetail as $mapss){ 
        $markers = $mapss['Restaurant']['marker'];
         
    ?>
    image.push('<?php echo 'http://rajdeep.crystalbiltech.com/dhdeals2/files/restaurants/'.$markers; ?>');
         
    <?php } ?>
    console.log(image);
	
	var cr = 'http://rajdeep.crystalbiltech.com/dhdeals2/home/img/newMark.png';
            var imagess =  new Array();
            imagess.push(cr);
            console.log(imagess);
       
    // Display multiple markers on a map
    var infoWindow = new google.maps.InfoWindow(), marker, i;
    console.log(infoWindow);
   var ar = new Array();
    for( i = 0; i < markid.length; i++ ) {
         // var strss = markid[i][0].split(',');
           var newMark = markid[i][1].split(",");
           var newMark1 = newMark[0].split(" ");
           //console.log(markid[i][0]);
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
      
    // Loop through our array of markers & place each one on the map  
      for( i = 0; i < markers.length; i++ ) {
        
        
        var position = new google.maps.LatLng(markers[i][1], markers[i][2]);
         bounds.extend(position);
        console.log(ar);
        if(jQuery.inArray(markid[i][0],ar) !== -1){
            console.log('1');

        
        
            marker = new google.maps.Marker({
            position: position,
            map: map,
            zoom:12,
            id:markid[i][0],
            title: markers[i][0],
           icon: image[i]
        });
        
        }else{
             console.log('2');

       
            marker = new google.maps.Marker({
            position: position,
            map: map,
            zoom:12,
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
            var pos = {
              lat: position.coords.latitude,
              lng: position.coords.longitude,
             
            };
 
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
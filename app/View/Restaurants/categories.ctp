   
<!----Content Section Start --->

<div class="smart_container">

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
		
		<h1 class="title" style="padding: 0px 15px; color:black; font-size:30px"><?php echo $catname['Cat']['rest_type'];?></h1>
		<?php foreach($restaurant as $res){ ?>  
        	<div class="col-sm-6 col-md-3">
            <div class="restaurant_main">
           <div class="heart_main">
            
            
               <i class="heart fa fa-heart-o fa-heart  <?php if(in_array($res['Restaurant']['id'], $fav)){ echo 'fa-heart2';} ?>"></i> 
               
            <input type = "hidden" id="<?php echo $res['Restaurant']['id'];?>" class="resId">
                <input type = "hidden" id="<?php echo $loggeduser;?>" class="userId">
                </div>   
          <a style="width: 100%;float: left;" href="<?php echo $this->webroot?>restaurants/detail/<?php echo $res['Restaurant']['id'];?>/<?php echo $catname['Cat']['rest_type'];?>">
                 
                
            <div class="thumbnail thumb">
                
              <div class="restaurant_pic"><img src="<?php echo $this->webroot?>files/restaurants/<?php echo $res['Restaurant']['logo'];?>" alt="..." ></div>
              <div class="caption">
                 <h3><?php echo $res['Restaurant']['name'];?></h3>
                <p><?php echo $res['Restaurant']['deals'];?></p>  
                
                				
                                   
                             
              </div>
            </div></a>
          </div></div>
          <?php } ?>
          
         
          
         <!--<nav aria-label="Page navigation" class="page_nav"> 
  <ul class="pagination">
    <li>
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
  </ul>
</nav>-->
          
        </div>
                
                <div class="col-md-3">
                     
                     <div class="right_sidebar">
        
        	<h3 class="title">Latest Deals</h3>
        
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
                <? } ?>
                               
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

         .heart1 {
    background: red;
  }
  .fa-heart2:before {
  content: "\f004" !important;
  color:#f00;
}
 

    </style>
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
        <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAFBwip8aVt9LCuo3GxTzHwLiJT2jgh-uM"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>

<script>
    $(document).ready(function(){
        $(".heart.fa").each(function(){
        $(this).click(function() {
      
            var hearIcon = $(this);
                //jQuery(this).prev("li").attr("id","newId");
                var res_id = $(this).next(".resId").attr("id");
                 var user_id = $(".userId").attr("id");
                //alert(res_id);
                //alert(user_id);
        //return false;
                //$(this).toggleClass("fa-heart fa-heart-o"); 
               
        var user =   '<?php echo $loggeduser; ?>';
     
   // alert(user);
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
    // var cr = 'http://rajdeep.crystalbiltech.com/dhdeals2/files/restaurants/shop1.png';
     var images =  new Array();
           <?php 
            foreach($restaurant as $mapss){ 
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
        streetViewControl: false,
        tilt: 0,
        zoomControl: true,
    scaleControl: true
        //disableDefaultUI: true
    };
     
    // Display a map on the page
    map = new google.maps.Map(document.getElementById("map-canvas"), mapOptions);
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
    foreach($restaurant as $mymap):
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
          <?php foreach($restaurant as $mymap):
       
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
            foreach($restaurant as $mymap):
				$id = $mymap['Restaurant']['id'];
                $name = $mymap['Restaurant']['name'];
                $desc =  $mymap['Restaurant']['description'];
                $deals =  $mymap['Restaurant']['deals'];
				$imgDeal =  $mymap['Restaurant']['logo'];
         //$marker =  $mymap['Restaurant']['marker'];
           ?>
        ['<div class="info_content" style="overflow:hidden">' +  
        '<h4 style="display:none; color:red;" class="rt">New</h4>'+
        '<h3><?php echo $name; ?></h3>' +
        '<img src="<?php echo $this->webroot?>files/restaurants/<?php echo $imgDeal;?>" width="90px" height="90px">' + 
        '<p><?php echo $deals; ?></p>' +
        '<a class="view_deals" href="<?php echo $this->webroot?>restaurants/detail/<?php echo $id;?>">view Deal</a>'+ '</div>'],  
        <?php endforeach;  ?>   
    ];
    
	 
	
	
          var image =  new Array();
    <?php 
        foreach($restaurant as $mapss){ 
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
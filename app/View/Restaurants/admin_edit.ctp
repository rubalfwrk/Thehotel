<div class="content">
    <div class="header">
<?php 
//print_r(unserialize($Restaurant['Restaurant']['typeid']));
?>
        <h2 style="margin-top:0px;">Edit Deal</h2>
        <ul class="breadcrumb">
            <li><a href="<?php echo $this->Html->url('/admin/Restaurants/'); ?>">Deal Management</a> </li>
            <li class="active">Edit Restaurant</li>
        </ul>

    </div>
    <div class="main-content">  
        <p>
            <?php $x = $this->Session->flash(); ?>
            <?php if ($x) { ?>
        <div class="alert success">
            <span class="icon"></span>
            <strong></strong><?php echo $x; ?>
        </div>
        <?php } ?>
        </p>
        
        <div class="box box-primary">
        <div class="row">
        
            <?php echo $this->Form->create('Restaurant', array('id' => 'tab', 'type' => 'file','action'=>'admin_edit')); ?>
            <div class="col-md-12">
<!--                  <div class="form-group">
                   <?php //echo "Username:- ". $uname['User']['username']; ?>
                      
                   
                </div>-->
                
                <div class="form-group">
                    <?php echo $this->Form->input('typeid', ['options' => $restype, 'label' => 'Deal Type:','multiple'=>'multiple','selected'=>unserialize($Restaurant['Restaurant']['typeid'])]); ?>
                    <?php //echo $this->Form->input('name',array('class'=>'form-control','label'=>'Restaurant Name:'));   
                     
                    ?>
                </div>
                
                <div class="form-group">
                    <?php echo $this->Form->input('catid', ['options' => $restypes, 'label' => 'Deal Category:','selected'=>unserialize($Restaurant['Restaurant']['catid'])]); ?>
                    <?php //echo $this->Form->input('name',array('class'=>'form-control','label'=>'Restaurant Name:'));   
                     
                    ?>
                </div>
                <div class="form-group">
                    <?php echo $this->Form->input('name', array('class' => 'form-control', 'label' => 'Deal Name:')); ?>
                </div>
                <!--                <div class="form-group">
                    <?php //echo $this->Form->input('barcodeno', array('class' => 'form-control', 'label' => 'Barcode NO.')); ?>
                                </div>-->
<!--                <div class="form-group">
                    <?php //echo $this->Form->input('phone', array('class' => 'form-control', 'label' => 'Deal Phone:')); ?>
                </div>
                <div class="form-group">
                    <?php //echo $this->Form->input('owner_name', array('class' => 'form-control', 'label' => 'Owner Name:')); ?>
                </div>
                <div class="form-group">
                    <?php //echo $this->Form->input('owner_phone', array('class' => 'form-control', 'label' => 'Owner Phone:')); ?>
                </div>-->
<!--                                <div class="form-group">
                                    <label>Select Address:</label>
                                    <input id="autocomplete" placeholder="Select Address" onFocus="geolocate()" type="text" class="form-control"></input>
                                </div>-->
                
                <div class="form-group">          
                    <?php //echo $this->Form->input('street_number', array('class' => 'form-control', 'label' => 'Street Number:', 'id' => 'street_number')); ?>
                </div>
                <div class="form-group">
                    <?php //echo $this->Form->input('street', array('class' => 'form-control', 'label' => 'Street:', 'id' => 'route')); ?>
                </div>
                <div class="form-group">
                    <?php echo $this->Form->input('address', array('class' => 'form-control', 'label' => 'Address:')); ?>
                </div>
                <div class="form-group">
                    <?php echo $this->Form->input('city', array('class' => 'form-control', 'label' => 'City:', 'id' => 'autocomplete')); ?>
                </div>
                <div class="form-group">
                    <?php echo $this->Form->input('state', array('class' => 'form-control', 'label' => 'State:', 'id' => 'administrative_area_level_1')); ?>
                </div>
                <div class="form-group">
                    <?php echo $this->Form->input('zip', array('class' => 'form-control', 'label' => 'Zip:','id' => 'postal_code')); ?>
                </div> 
                
                
                 <div class="form-group">
<?php echo $this->Form->input('latitude', array('class' => 'form-control', 'label' => 'Latitude', 'type' => 'hidden','id'=>'latitude')); ?>
                    </div>
                     <div class="form-group">
<?php echo $this->Form->input('longitude', array('class' => 'form-control', 'label' => 'Logitude', 'type' => 'hidden','id'=>'longitude')); ?>
                    </div> 
                
                <div class="form-group">
                    <?php echo $this->Form->input('deals', array('class' => 'form-control', 'label' => 'Deals')); ?>
                </div>
                
                         
                <div class="form-group">
                    <?php echo $this->Form->input('description', array('class' => 'form-control', 'label' => 'Description:')); ?>
                </div>
                
                <div class="form-group">
                <div class="input text">
                <label for="RestaurantDeals"></label>
                <div class="form-control form_img">
                    <?php
                    $restaurantPath = '/files/restaurants/';
                    echo $this->Html->image($restaurantPath . $Restaurant['Restaurant']['logo'], array('alt' => 'Store Logo', 'width' => 100));
                    ?>
                  </div>
                 </div>
                </div> 
                
                <div class="form-group">
                    <label>Logo:</label>
                    <input type="file" name="data[Restaurant][logo]" class="form-control" id="RestaurantLogo" value="<?php echo $Restaurant['Restaurant']['logo']; ?>">
                    <?php //echo $this->Form->input('logo', array('type' => 'file', 'class' => 'form-control', 'label' => 'Logo:','value'=>'efr')); ?>
                </div>
                
                <div class="form-group">
                	<div class="input text">
                	<label for="RestaurantDeals"></label>
                	<div class="form-control form_img">
                    <?php
                    $restaurantPath = '/files/restaurants/';
                    echo $this->Html->image($restaurantPath . $Restaurant['Restaurant']['marker'], array('alt' => 'Store banner', 'width' => 100));
                    ?>
                   </div>
                   </div> 
                </div> 
                
                <div class="form-group">
                    <label>Pointer for Map:</label>
                    <input type="file" name="data[Restaurant][marker]" class="form-control" id="RestaurantLogo" value="<?php echo $Restaurant['Restaurant']['marker']; ?>">
                    <?php //echo $this->Form->input('marker', array('type' => 'file', 'class' => 'form-control', 'label' => 'Logo:','value'=>'efr')); ?>
                </div>

                 <div class="form-group">
                    <label>Pointer for Map on Website:</label>
                    <input type="file" name="data[Restaurant][webmarker]" class="form-control" id="RestaurantLogos" value="<?php echo $Restaurant['Restaurant']['webmarker']; ?>">
                    <?php //echo $this->Form->input('marker', array('type' => 'file', 'class' => 'form-control', 'label' => 'Logo:','value'=>'efr')); ?>
                </div>

<!--                <div class="form-group">
                    <?php //echo $this->Form->input('website', array('class' => 'form-control', 'label' => 'Website:')); ?>
                </div>
                <div class="form-group">
                    <?php //echo $this->Form->input('email', array('class' => 'form-control', 'label' => 'Email:')); ?>
                </div>
                
                <div class="form-group">
                    <?php //echo $this->Form->input('delivery_distance', array('class' => 'form-control', 'label' => 'Visibility Radius:',)); ?>
                </div> -->
            
               
                  
<!--                <div class="form-group">
                    <?php //echo $this->Form->input('takeaway', array('class' => 'form-control1', 'type'=>'checkbox', 'label' => 'Pickup:')); ?>
                </div>
                   <div class="form-group">
                    <?php //echo $this->Form->input('reservation', array('class' => 'form-control1', 'type'=>'checkbox', 'label' => 'Dining:')); ?>
                </div>-->
                  
              
                 
                <!--                   <div class="form-group">
                    <?php //echo $this->Form->input('delivery_fee', array('class' => 'form-control', 'label' => 'Delivery Fee:')); ?>
                                </div>-->
                <div class="form-group">
<?php //echo $this->Form->input('opening_time', array('class' => 'form-control', 'label' => 'Opening Time:', 'type' => 'time')); ?>
                </div>

                <div class="form-group">
<?php //echo $this->Form->input('closing_time', array('class' => 'form-control', 'label' => 'Closing Time:', 'type' => 'time')); ?>
                </div>
                
              
                <input type="hidden" name="data[Restaurant][created]" value="<?php echo date('Y-m-d H:i:s'); ?>">
                
               <!-- <input type="hidden" name="data[Restaurant][latitude]" value="" id="latitude">
                <input type="hidden" name="data[Restaurant][longitude]" value="" id="longitude">-->
                <input type="hidden" name="data[Restaurant][status]" value="1">
                <div class="btn-toolbar list-toolbar">
                    <?php echo $this->Form->submit('Save', array('formnovalidate' => true, 'class' => "submitres", 'div' => array('class' => 'btn btn-primary'))); ?>
                    <a href="<?php echo $this->Html->url(array('controller' => 'Restaurants', 'action' => 'admin_index')); ?>" data-toggle="modal" class="btn btn-danger">Cancel</a>
                </div>
                </form>
            </div>
        </div>
    </div>
</div>

</div>
<script>
// This example displays an address form, using the autocomplete feature
// of the Google Places API to help users fill in the information.

    var placeSearch, autocomplete;
    var componentForm = {
        street_number: 'short_name',
        route: 'long_name',
        locality: 'long_name',
        administrative_area_level_1: 'long_name',
        country: 'long_name',
        postal_code: 'short_name'
    };


    function initAutocomplete() {
        // Create the autocomplete object, restricting the search to geographical
        // location types.
        autocomplete = new google.maps.places.Autocomplete(
                /** @type {!HTMLInputElement} */(document.getElementById('autocomplete')),
                {types: ['geocode']});

        // When the user selects an address from the dropdown, populate the address
        // fields in the form.
        autocomplete.addListener('place_changed', fillInAddress);
    }

// [START region_fillform]
    function fillInAddress() {
        // Get the place details from the autocomplete object.
        var place = autocomplete.getPlace();
        
        var lat = place.geometry.location.lat();
        var lng = place.geometry.location.lng();
//        alert(lat);
//        alert(lng);
        document.getElementById("latitude").value = lat;
        //alert(document.getElementById("latitude").value);
        document.getElementById("longitude").value = lng;
        
        for (var component in componentForm) {
            document.getElementById(component).value = '';
        }
        
        // Get each component of the address from the place details
        // and fill the corresponding field on the form.
        for (var i = 0; i < place.address_components.length; i++) {
            var addressType = place.address_components[i].types[0];
            if (componentForm[addressType]) {
                var val = place.address_components[i][componentForm[addressType]];
                document.getElementById(addressType).value = val;
            }
        }
    }
// [END region_fillform]

// [START region_geolocation]
// Bias the autocomplete object to the user's geographical location,
// as supplied by the browser's 'navigator.geolocation' object.
    function geolocate() {
        //alert('jio');
        if (navigator.geolocation) {
            navigator.geolocation.getCurrentPosition(function (position) {
                var geolocation = {
                    lat: position.coords.latitude,
                    lng: position.coords.longitude
                };
                var circle = new google.maps.Circle({
                    center: geolocation,
                    radius: position.coords.accuracy
                });
                autocomplete.setBounds(circle.getBounds());
            });
        }
    }
// [END region_geolocation]

</script>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyD-232zH5khzq7n4iZkztT8OGpEAZXu04A&libraries=places&callback=initAutocomplete"
        async defer></script>
<style>
   .submitres {
    border: none;
    background: none;
}

.form-group {
    width: 100%;
    float: left;
}
.input {
    width: 100%;
    float: left;
}
label {
    width: 20%;
    float: left;
}
.form-control {
    width: 80%;
    float: left;
}

#RestaurantLogo,#RestaurantLogos {
    height: auto;
}

.form_img {
    height: 100px;
    overflow: hidden;
	border-width:0px !important;
}

.form_img img{
    height: 100%;
}

#tab {
    padding: 10px;
}

.btn-toolbar.list-toolbar {
    float: left;
    width: 100%;
    margin: 10px 0px;
}

</style>
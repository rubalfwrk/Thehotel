<div style="margin-bottom:0px;" class="box">
<div class="header">
<?php 
//print_r(unserialize($Restaurant['Restaurant']['typeid']));
?>
        <h2 class="page-title">Edit Deal Type</h2>
        <ul class="breadcrumb">
            <li><a href="<?php echo $this->Html->url('/admin/Restaurants/'); ?>">Deal Management</a> </li>
            <li class="active">Edit Deal</li>
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
        <div class="row">
            <?php echo $this->Form->create('Cat', array('type' => 'file','method'=>'post','action'=>'admin_edit')); ?> 
            
            <div class="col-md-12"> 
                <div class="form-group">
                    
                    <?php 
                    echo $this->Form->input('id');
                    //echo $this->request->data['Cat']['rest_type'];
                    echo $this->Form->input('rest_type',array('required' => true,'label'=>'Type Name','value'=>$this->request->data['Cat']['rest_type'])); ?>
                </div> 
                
<!--                <div class="form-group">
                    <?php //echo $this->Form->input('Created Date',array('type'=>'date')) ?>
                </div> -->
         
                <div class="form-group">
                <div class="input text">
                <label for="RestaurantDeals"></label>
                <div class="form-control form_img">
                
                    <img src="<?php echo $this->webroot;?>/files/restaurants/<?php echo $this->request->data['Cat']['logo']; ?>" width="100" height="100"/>
                    <?php
//                    $restaurantPath = '/files/restaurants/';
//                    echo $this->Html->image($restaurantPath . $Cats['Cat']['logo'], array('alt' => 'Store Logo', 'width' => 100));
//                    ?>
                </div>
                </div>
                </div>
                
                <div class="form-group">
                    <label>Deal Type Logo:</label>
                    <input type="file" name="data[Cat][logo]" class="form-control" id="RestaurantLogo" value="<?php echo $Cats['Cat']['logo']; ?>">
                    <?php //echo $this->Form->input('logo', array('type' => 'file', 'class' => 'form-control', 'label' => 'Logo:','value'=>'efr')); ?>
                </div>
                
                <div class="form-group">
                <div class="input text">
                <label for="RestaurantDeals"></label>
                <div class="form-control form_img">
                    <img src="<?php echo $this->webroot;?>/img/<?php echo $this->request->data['Cat']['image']; ?>" width="100" height="100"/>
                   
                </div>
                </div>
                </div>
                
                
                <div class="form-group">
                    <label>Deal Type Icon:</label>
                    <input type="file" name="data[Cat][image]" class="form-control" id="RestaurantLogo" value="<?php echo $Cats['Cat']['image']; ?>">
                    <?php //echo $this->Form->input('logo', array('type' => 'file', 'class' => 'form-control', 'label' => 'Logo:','value'=>'efr')); ?>
                </div>

                <div class="btn-toolbar list-toolbar">
                    <?php echo $this->Form->submit('Save', array('formnovalidate' => true, 'class' => "submitres", 'div' => array('class' => 'btn btn-primary'))); ?>
                    <a href="<?php echo $this->Html->url(array('controller' => 'Cats', 'action' => 'admin_index')); ?>" data-toggle="modal" class="btn btn-danger">Cancel</a>
                </div>
                </form>
            </div>
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
        for (var component in componentForm) {
            document.getElementById(component).value = '';
        }
        var lat = place.geometry.location.lat();
        var lng = place.geometry.location.lng();
        document.getElementById("latitude").value = lat;
        document.getElementById("longitude").value = lng;
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
<script src="https://maps.googleapis.com/maps/api/js?&signed_in=true&libraries=places&callback=initAutocomplete"
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
	background: none;
}

.form_img img{
    height: 100%;
}


.btn-toolbar.list-toolbar {
    float: left;
    width: 100%;
    margin: 10px 0px;
}

.box{padding: 15px;}
</style>
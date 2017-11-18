<style type="text/css">
    .fa-reply:before {
    content: "\f112";
}
.fa {
    display: inline-block;
    font-family: FontAwesome;
    font-style: normal;
    font-weight: normal;
    line-height: 1;
    -webkit-font-smoothing: antialiased;
    -moz-osx-font-smoothing: grayscale;
}

</style>

<link type="text/css" rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500">


<section class="cs-favorite-jobs">
    <div class="scetion-title">
        <div class="col-md-6" style="padding: 0px;"><h3>Add Order</h3></div>
        <div class="col-md-6 padding4">
            <a href="#insert_order " data-toggle="tab"  class="btn btn-default" style="margin-right:2%;float:right;"> <i class="fa fa-reply" aria-hidden="true"></i> </a>
        </div>
    </div>


        <form  method="post" action="<?php echo site_url();?>/home/addorder"> 
                <input type="hidden" name="vendorid" value="<?php if (!empty($data['vendordatainfo'])) echo $data['vendordatainfo']->user_id; ?>"/>
                    <div class="row">


                        <div class="col-sm-12 col-md-12 text-center">
                                <label class="form-label"><h4>Order Data</h4></label>
                        </div>


                        <div class="form-group col-sm-6 col-md-6">
                                <input type="text" class="form-control" placeholder="Order No" name="orderno" required="required"/>
                        </div>
                        <div class="form-group col-sm-6 col-md-6">
                                <input type="text" class="form-control" placeholder="Order Name" name="ordername" required="required"/>
                        </div>
                        <div class="form-group col-sm-6 col-md-6">
                                <input type="text" class="form-control" placeholder="Customer Name" name="customername" required="required"/>
                        </div> 
                        <div class="form-group col-sm-6 col-md-6">
                                <input type="text" class="form-control" placeholder="Customer Contact" name="customercontact" required="required"/>
                        </div> 
                        <div class="form-group col-sm-6 col-md-6">
                                <input type="text" class="form-control" placeholder="Detail" name="details" required="required">
                        </div>
                        <div class="form-group col-sm-6 col-md-6">
                                <input type="text" class="form-control" placeholder="Instruction" name="instruction" required="required">
                        </div>
                        <div class="form-group col-sm-6 col-md-6">
                                <input type="text" class="form-control" placeholder="Contact" name="contact" required="required">
                        </div> 
                        <div class="form-group col-sm-6 col-md-6">
                                <input type="text" class="form-control" placeholder="Amount" name="amount" required="required">
                        </div> 
                        <div class="form-group col-sm-12 col-md-12">
                            <select class="form-control" name="ordertype" required="required">
                                <option value=""> Select Order Type </option>
                                <option value="Current"> Current </option>
                                <option value="Backdated"> Backdated </option>
                            </select>
                        </div>
                   



                        <div class="col-sm-12 col-md-12 text-center">
                            <label class="form-label"><h4>Pick Up Address Info</h4></label>
                        </div>




                        <div id="locationField" class="form-group col-sm-12 col-md-12">
                            <input type="text" class="form-control" id="autocomplete" placeholder="Pickup Address"
                                onFocus="geolocate()" required="required">
                            <input type="hidden" id="lat" name="pickup_lat">
                            <input type="hidden" id="lng" name="pickup_lng">
                        </div>
                        <div class="form-group col-sm-6 col-md-6">
                            <input type="text" id="street_number" class="form-control" placeholder="Pickup Street Number" name="pickup_street_number" required="required">
                        </div>
                        <div class="form-group col-sm-6 col-md-6">
                            <input type="text" id="route" class="form-control" placeholder="Pickup Route" name="pickup_route" required="required">
                        </div>
                        <div class="form-group col-sm-6 col-md-6">
                            <input type="text" id="sublocality_level_1" class="form-control" placeholder="Pickup Place" name="pickup_sublocality_level_1">
                        </div>
                        <div class="form-group col-sm-6 col-md-6">
                            <input type="text" id="locality" class="form-control" placeholder="Pickup City" name="pickup_locality" required="required">
                        </div>
                        <div class="form-group col-sm-6 col-md-6">
                            <input type="text" id="administrative_area_level_1" class="form-control" placeholder="Pickup State" name="pickup_administrative_area_level_1" required="required">
                        </div>
                        <div class="form-group col-sm-6 col-md-6">
                            <input type="text" id="country" class="form-control" placeholder="Pickup Country" name="pickup_country" required="required">
                        </div>
                        <div class="form-group col-sm-6 col-md-6">
                            <input type="text" id="postal_code" class="form-control" placeholder="Pickup Zip Code" name="pickup_postal_code" required="required">
                        </div>  
                        <div class="form-group col-sm-3 col-md-3">
                            <input type="text" style="border: 1px solid rgb(228, 228, 228);" placeholder="Pickup Time" class="form-control" name="pickup_time" required="required">
                        </div>
                        <div class="form-group col-sm-3 col-md-3">
                            <input type="text" id="pickup" data-min-year="1800" data-max-year="2020" data-formate="Y-m-d"  data-lang="en" data-large-mode="true" placeholder="Pickup Date" class="form-control" name="pickup_date" required="required">
                        </div>




                        <div class="col-sm-12 col-md-12 text-center">
                            <label class="form-label"><h4>Drop off Address Info</h4></label>
                        </div>




                        <div id="locationField" class="form-group col-sm-12 col-md-12">
                            <input type="text" class="form-control" id="autocomplete2" placeholder="Drop Off Address"
                                onFocus="geolocate()" required="required">
                            <input type="hidden" id="lat2" name="dropoff_lat">
                            <input type="hidden" id="lng2" name="dropoff_lng">
                        </div>
                        <div class="form-group col-sm-6 col-md-6">
                            <input type="text" id="street_number2" class="form-control" placeholder="Drop Off Street Number" name="dropoff_street_number" required="required">
                        </div>
                        <div class="form-group col-sm-6 col-md-6">
                            <input type="text" id="route2" class="form-control" placeholder="Drop Off Route" name="dropoff_route" required="required">
                        </div>
                        <div class="form-group col-sm-6 col-md-6">
                            <input type="text" id="sublocality_level_12" class="form-control" placeholder="Drop Off Place" name="dropoff_sublocality_level_1">
                        </div>
                        <div class="form-group col-sm-6 col-md-6">
                            <input type="text" id="locality2" class="form-control" placeholder="Drop Off City" name="dropoff_locality" required="required">
                        </div>
                        <div class="form-group col-sm-6 col-md-6">
                            <input type="text" id="administrative_area_level_12" class="form-control" placeholder="Drop Off State" name="dropoff_administrative_area_level_1" required="required">
                        </div>
                        <div class="form-group col-sm-6 col-md-6">
                            <input type="text" id="country2" class="form-control" placeholder="Drop Off Country" name="dropoff_country" required="required">
                        </div>
                        <div class="form-group col-sm-6 col-md-6">
                            <input type="text" id="postal_code2" class="form-control" placeholder="Drop Off Zip Code" name="dropoff_postal_code" required="required">
                        </div>
                        <div class="form-group col-sm-3 col-md-3">
                            <input type="text" class="form-control" placeholder="Drop off Time" name="dropoff_time" required="required">
                        </div>
                        <div class="form-group col-sm-3 col-md-3">
                            <input type="text" id="dropoff" data-min-year="1800" data-max-year="2020" data-formate="Y-m-d"  data-lang="en" data-large-mode="true" class="form-control" placeholder="Drop off Date" name="dropoff_date" required="required">
                        </div>
                </div>

                    <a href="#insert_order " data-toggle="tab"  class="btn btn-default">Close</a>
                    <button type="submit" class="btn btn-primary pull-right">Add</button>
                
        </form>











<script>





    // This example displays an address form, using the autocomplete feature
    // of the Google Places API to help users fill in the information.

    // This example requires the Places library. Include the libraries=places
    // parameter when you first load the API. For example:
    // <script src="https://maps.googleapis.com/maps/api/js?key=YOUR_API_KEY&libraries=places">

    var placeSearch, autocomplete, autocomplete2;
    var componentForm = {
        street_number: 'long_name',
        route: 'long_name',
        sublocality_level_1: 'long_name',
        locality: 'long_name',
        administrative_area_level_1: 'long_name',
        country: 'long_name',
        postal_code: 'long_name'
    };




    function initAutocomplete() {
        // Create the autocomplete object, restricting the search to geographical
        // location types.
        autocomplete = new google.maps.places.Autocomplete(
            /** @type {!HTMLInputElement} */
            (document.getElementById('autocomplete')), {
                types: ['geocode']
        });
        // When the user selects an address from the dropdown, populate the address
        // fields in the form.
        autocomplete.addListener('place_changed', function() {
            fillInAddress(autocomplete, "");
        });


        autocomplete2 = new google.maps.places.Autocomplete(
            /** @type {!HTMLInputElement} */
            (document.getElementById('autocomplete2')), {
                types: ['geocode']
        });
        autocomplete2.addListener('place_changed', function() {
            fillInAddress(autocomplete2, "2");
        });
    }



    function fillInAddress(autocomplete, unique) {
        // Get the place details from the autocomplete object.
        var place = autocomplete.getPlace();
        var lat = place.geometry.location.lat();
        var lng = place.geometry.location.lng();
        var placeId = place.place_id;

        console.log(place);

        for (var component in componentForm) {
          if (!!document.getElementById(component + unique)) {
              document.getElementById(component + unique).value = '';
              document.getElementById(component + unique).disabled = false;
            }
        }

        // Get each component of the address from the place details
        // and fill the corresponding field on the form.
        for (var i = 0; i < place.address_components.length; i++) {
          var addressType = place.address_components[i].types[0];
          if (componentForm[addressType] && document.getElementById(addressType + unique)) {
            var val = place.address_components[i][componentForm[addressType]];
            document.getElementById(addressType + unique).value = val;
          }
        }

        document.getElementById('lat' + unique).value = lat;
        document.getElementById('lng' + unique).value = lng;
        // document.getElementById("location_id").value = placeId;   

      }

      // Bias the autocomplete object to the user's geographical location,
      // as supplied by the browser's 'navigator.geolocation' object.
      function geolocate() {
        if (navigator.geolocation) {
          navigator.geolocation.getCurrentPosition(function(position) {
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
    </script>






        <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAnaHkFFR6tUuVZ-MjXB-0CjM9TieZiYnw&signed_in=true&libraries=places&callback=initialize" async defer></script>

    




    
</section>
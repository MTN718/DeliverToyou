<div id="main-content" class="dashboard">
    <div class="panel panel-default ">
        <div class="panel-heading" style="background:#F7AE07">
            <h4>
                <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion" href="#collapseTwoo" style="color: #fff;font-weight: 600;">
                    Filter
                </a>
            </h4>
        </div>
        <div id="collapseTwoo" class="panel-collapse collapse in">
            <div class="panel-body">
                <div class="col-md-12" style="background:#fff;">
                    <form>
                        <div class="row">
                            <div class="col-md-3">
                                <label class="checkbox-inline"><input type="checkbox">Online Rider</label>
                            </div>
                            <div class="col-md-3">
                                <label class="checkbox-inline"><input type="checkbox">Offline Rider</label>
                            </div>
                            <div class="col-md-3">
                                <label class="checkbox-inline"><input type="checkbox">On Task Rider</label>
                            </div>
                            <div class="col-md-3">
                                <label class="checkbox-inline"><input type="checkbox">Available Rider</label>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <section class="cs-favorite-jobs">
        <div class="scetion-title">
            <h3>Map</h3>
        </div>
        <div class="row">
            <div class="col-lg-9 col-md-9 col-sm-12 col-xs-12" >
                <div id="map" style="width: 100%; height:650px;"></div>
            </div>

            <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" >
                        <img src="<?php echo base_url();?>assets/img/mydelivery2u.png"  style="background: #FCDD11 ; padding: 2% 3%; margin-bottom:2%;" class="center-block img-responsive">
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <img id="riderImg" src="<?php echo base_url();?>assets/img/home_img.jpg" style="border:2px solid black;" class="center-block  img-responsive">

                    </div>
                </div>
                <br>
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="row vender_info" >
                            <div class="col-md-12 col-lg-12 col-sm-12">
                                <div class="dropdown" style="width: 100%;">
                                    <button class="dropbtn" >Driver Name</button>
                                    <div class="dropdown-content">
                                        <a href="#">Demo</a>
                                        <a href="#">Demo</a>
                                        <a href="#">Demo</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row vender_info" >
                    <div class="col-md-12 col-lg-12 col-sm-12">
                     <!-- <button class="collapsible" data-toggle="collapse" data-target="#demo">Rider Name <i class="icon-arrow-down"></i> </button>-->
                        <div id="demo" class="" style="background-color: #fff;padding: 5%;"><!--class="collapse"-->
                            <ul>
                                <li> 
                                  <a href="javascript:voic(0);"><b> Rider Id </b></a>
                                  <span id="rider_id"></span>
                                </li>
                                <li> 
                                  <a href="javascript:voic(0);"><b> Name :</b> </a>
                                  <span id="rider_name"></span>
                                </li>
                                <li> 
                                  <a href="javascript:voic(0);"><b> Current Locations :</b></a> 
                                  <span id="current_location"></span>
                                </li>
                                <li> 
                                  <a href="javascript:voic(0);"><b> ETA :</b> </a>
                                  <span id="eta"></span> 
                                </li>
                                <li> 
                                  <a href="javascript:voic(0);"><b> Customer Name :</b></a> 
                                  <span id="customer_name"></span>
                                </li>
                                <li> 
                                  <a href="javascript:voic(0);"><b> Customer Contact : </b></a> 
                                  <span id="customer_contact"></span>
                                </li>
                                <li> 
                                  <a href="javascript:voic(0);"><b> Drop OFF Loc. </b></a> 
                                  <span id="drop_off_loc"></span>
                                </li>
                                <li> 
                                  <a href="javascript:voic(0);"><b> Order Id : </b></a> 
                                  <span id="order_id"></span>
                                </li>
                                <li> 
                                  <a href="javascript:voic(0);"><b> Group Id : </b></a> 
                                  <span id="group_id"></span>
                                </li>
                                <li> 
                                  <a href="javascript:voic(0);"><b> Rider Nunber : </b></a> 
                                  <span id="rider_number"></span>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div> 






<script>
      var customLabel = {
        restaurant: {
          label: 'R'
        },
        bar: {
          label: 'B'
        }
      };

        function initMap() {
        var map = new google.maps.Map(document.getElementById('map'), {
          center: new google.maps.LatLng(0, 0),
          zoom: 3
        });
        var infoWindow = new google.maps.InfoWindow;

          // Change this depending on the name of your PHP or XML file
          downloadUrl('<?php echo base_url(); ?>/index.php/admin/maplocation', function(data) {
            var xml = data.responseXML;
            var markers = xml.documentElement.getElementsByTagName('marker');
            Array.prototype.forEach.call(markers, function(markerElem) {
              var id = markerElem.getAttribute('id');
              var name = markerElem.getAttribute('name');
              var address = markerElem.getAttribute('address');
              var type = markerElem.getAttribute('type');
              var point = new google.maps.LatLng(
                  parseFloat(markerElem.getAttribute('lat')),
                  parseFloat(markerElem.getAttribute('lng')));

              var infowincontent = document.createElement('div');
              var strong = document.createElement('strong');
              strong.textContent = name
              infowincontent.appendChild(strong);
              infowincontent.appendChild(document.createElement('br'));

              var text = document.createElement('text');
              text.textContent = address
              infowincontent.appendChild(text);
              var icon = customLabel[type] || {};
              var marker = new google.maps.Marker({
                id: id,
                text: text,
                map: map,
                position: point,
                label: icon.label
              });
              marker.addListener('click', function() {
                data = {};
                data['id'] = marker.id;

                $.ajax({   

                    type: "POST",  
                    url: "<?php echo base_url(); ?>index.php/admin/getRiderCustomerData",  
                    cache:false,  
                    data: data,
                    dataType: "json",       
                    success: function(response)  
                    {  
                      $('#rider_id').text(response.location.rider_id);
                      $('#rider_name').text(response.location.name);
                      $('#current_location').text(response.address);
                      $('#eta').text(response.location.eta);
                      $('#customer_name').text(response.location.customer_name);
                      $('#customer_contact').text(response.location.customer_contact);
                      $('#drop_off_loc').text(response.location.dropoff_address_line_1);
                      $('#order_id').text(response.location.order_id);
                      $('#group_id').text(response.location.group_id);
                      $('#rider_number').text(response.location.mobile);
                      $("#riderImg").attr('src',"<?php echo base_url();?>images/vendor/"+response.location.image_url) 
                    } 

                });


              });
            });
          });
        }



      function downloadUrl(url, callback) {
        var request = window.ActiveXObject ?
            new ActiveXObject('Microsoft.XMLHTTP') :
            new XMLHttpRequest;

        request.onreadystatechange = function() {
          if (request.readyState == 4) {
            request.onreadystatechange = doNothing;
            callback(request, request.status);
          }
        };

        request.open('GET', url, true);
        request.send(null);
      }

      function doNothing() {}



   

    </script>
    <script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAnaHkFFR6tUuVZ-MjXB-0CjM9TieZiYnw&callback=initMap">
    </script>




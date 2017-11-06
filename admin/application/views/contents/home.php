<style type="text/css">
  #demo ul li {
    margin-bottom: 18px;
  }
</style>

<div id="main-content" class="dashboard">
    
    <section class="cs-favorite-jobs">
        <div class="scetion-title">
            <h3>Map</h3>
        </div>
        <div class="row">
            <div class="col-lg-9 col-md-9 col-sm-12 col-xs-12" >
                <div id="map" style="width: 100%; height:650px;"></div>
                <br>
                <div class="panel panel-default ">
                  <div id="collapseTwoo" class="panel-collapse collapse in">
                      <div class="panel-body">
                          <div class="col-md-12" style="background:#fff;">
                              <form>
                                  <div class="row">
                                      <div class="col-md-2">
                                          <label class="radio-inline status_action" data-val="all">
                                            <input type="radio" name="status" <?php if($status == "all") echo "checked"; ?> >All Rider
                                          </label>
                                      </div>
                                      <div class="col-md-2">
                                          <label class="radio-inline status_action" data-val="online">
                                            <input type="radio" name="status" <?php if($status == "online") echo "checked"; ?> >Online Rider
                                          </label>
                                      </div>
                                      <div class="col-md-2">
                                          <label class="radio-inline status_action" data-val="offline">
                                            <input type="radio" name="status" <?php if($status == "offline") echo "checked"; ?> >Offline Rider
                                          </label>
                                      </div>
                                      <div class="col-md-3">
                                          <label class="radio-inline status_action" data-val="ontask">
                                            <input type="radio" name="status" <?php if($status == "ontask") echo "checked"; ?> >On Task Rider
                                          </label>
                                      </div>
                                      <div class="col-md-3">
                                          <label class="radio-inline status_action" data-val="available">
                                            <input type="radio" name="status" <?php if($status == "available") echo "checked"; ?> >Available Rider
                                          </label>
                                      </div>
                                  </div>
                              </form>
                          </div>
                      </div>
                  </div>
              </div>
            </div>

            <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" >
                        <img src="<?php echo base_url();?>assets/img/mydelivery2u.png"  style="background: #FCDD11 ; padding: 4% 5%; margin-bottom:15px; width: 100%;" class="center-block img-responsive">
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                      <?php if(!empty($riderData->image_url)) { ?>
                        <img id="riderImg" src="<?php echo base_url();?>images/vendor/<?php echo $riderData->image_url; ?>" style="border:2px solid black;width: 100%;height: 250px;" class="center-block  img-responsive">
                      <?php } else { ?>
                        <img id="riderImg" src="<?php echo base_url();?>assets/img/home_img.jpg" style="border:2px solid black;width: 100%;height: 250px;" class="center-block  img-responsive">
                      <?php } ?>
                    </div>
                </div>
                <br>
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="row vender_info" >
                            <div class="col-md-12 col-lg-12 col-sm-12">
                                <div class="dropdown" style="width: 100%;">
                                    <button class="dropbtn" >Rider Name</button>
                                    <div class="dropdown-content">
                                      <?php foreach ($riderlist as $rider) { ?>
                                          <a href="<?php echo site_url(); ?>/admin/home/all/<?php echo $rider->user_id ?>" class="rider_action">
                                            <?php echo $rider->name ?>
                                          </a>
                                      <?php } ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row vender_info" >
                    <div class="col-md-12 col-lg-12 col-sm-12">
                        <div id="demo" class="" style="background-color: #fff;padding: 5%; min-height: 310px;">
                        <br>
                            <ul>  
                                <li> 
                                  <a href="javascript:voic(0);"><b> Name :</b> </a>
                                  <span id="rider_name"><?php if(!empty($riderData->name)) echo $riderData->name; ?></span>
                                </li>
                                <li> 
                                  <a href="javascript:voic(0);"><b> Rider Id </b></a>
                                  <span id="rider_id"><?php if(!empty($riderData->user_id)) echo $riderData->user_id; ?></span>
                                </li>
                                <li> 
                                  <a href="javascript:voic(0);"><b> Contact Email : </b></a> 
                                  <span id="rider_email"><?php if(!empty($riderData->email)) echo $riderData->email; ?></span>
                                </li>
                                <li> 
                                  <a href="javascript:voic(0);"><b> Contact Number : </b></a> 
                                  <span id="rider_number"><?php if(!empty($riderData->mobile)) echo $riderData->mobile; ?></span>
                                </li>
                                <li> 
                                  <a href="javascript:voic(0);"><b>Emergency Contact Number : </b></a> 
                                  <span id="e_rider_number"><?php if(!empty($riderData->emergency_contact_no)) echo $riderData->emergency_contact_no; ?></span>
                                </li>
                                <li> 
                                  <a href="javascript:voic(0);"><b> Current Locations :</b></a> 
                                  <span id="current_location"><?php if(!empty($address)) echo $address; ?></span>
                                </li>
                                <!-- <li> 
                                  <a href="javascript:voic(0);"><b> Group Id : </b></a> 
                                  <span id="group_id"></span>
                                </li> -->
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

        var rider_id = '<?php echo $rider_id ;?>';
        var status = '<?php echo $status ;?>';

          // Change this depending on the name of your PHP or XML file
          downloadUrl('<?php echo base_url(); ?>/index.php/admin/maplocation/'+status, function(data) {
            var xml = data.responseXML;
            var markers = xml.documentElement.getElementsByTagName('marker');
            Array.prototype.forEach.call(markers, function(markerElem) {
              var id = markerElem.getAttribute('id');
              var status = markerElem.getAttribute('status');
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
              if(status != "ontask") {
                var marker = new google.maps.Marker({
                  id: id,
                  text: text,
                  map: map,
                  icon: normalIcon(),
                  position: point,
                  label: icon.label
                });
              } else {
                var marker = new google.maps.Marker({
                  id: id,
                  text: text,
                  map: map,
                  icon: highlightedIcon(),
                  position: point,
                  label: icon.label
                });
              }

              if(marker.id == rider_id) {
                marker.setAnimation(google.maps.Animation.BOUNCE);
                setTimeout(function() {
                    marker.setAnimation(null)
                }, 3000);
                map.setZoom(4);
                map.setCenter(marker.getPosition());
              }

              marker.addListener('click', function() {
                data = {};
                data['id'] = marker.id;

                $.ajax({   

                    type: "POST",  
                    url: "<?php echo base_url(); ?>index.php/admin/getMapRiderData",  
                    cache:false,  
                    data: data,
                    dataType: "json",       
                    success: function(response)  
                    {                      
                      map.setZoom(4);
                      map.setCenter(marker.getPosition());
                      $('#rider_id').text(response.location.user_id);
                      $('#rider_name').text(response.location.name);
                      $('#current_location').text(response.address);
                      $('#group_id').text(response.location.group_order_id);
                      $('#rider_number').text(response.location.mobile);
                      $('#e_rider_number').text(response.location.emergency_contact_no);
                      $('#rider_email').text(response.location.email);
                      $("#riderImg").attr('src',"<?php echo base_url();?>images/vendor/"+response.location.image_url) 
                    } 
                });
              });
            });
          });
        }

        function normalIcon() {
          return {
            url: 'http://maps.google.com/mapfiles/marker.png'
          };
        }
        function highlightedIcon() {
          return {
            url: 'http://maps.google.com/mapfiles/marker_green.png'
          };
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

      $(document).ready(function(){      
        $(document).on('click','.status_action', function() {
          
          var val = $(this).attr('data-val');

          location.href = "<?php echo base_url(); ?>/index.php/admin/home/"+val;

        });
      });

     
    </script>
    <script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAnaHkFFR6tUuVZ-MjXB-0CjM9TieZiYnw&callback=initMap"></script>


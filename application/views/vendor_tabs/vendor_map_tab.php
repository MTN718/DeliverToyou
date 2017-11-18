<style type="text/css">
.wp-jobhunt .cs-tabs .tab-content .cs-downlod-sec:after {
  border-left: none!important;
  content: ''!important;
  font-family: icomoon;
  font-size: 14px;
  height: 35px;
  padding-left: 8px;
  padding-top: 7px;
  position: absolute;
  right: 0px;
  top: -1px;
}
.cs-downlod-sec2 {
  background: #fbdc06 !important;
  border: 1px solid #e7e7e7 !important;
  box-shadow: 0 1px 2px 0 rgba(0,0,0,0.1) !important;
  cursor: pointer !important;
  height: 43px !important;
  padding: 5px 0 0 10px !important;
  position: absolute !important;
  width: 181px !important;
}
.cs-downlod-sec2 .a1 {
  text-align: center !important;
  color: #010107 !important;
  font-size: 12px !important;
  font-weight: bold !important;
  height: 45px !important;
  left: 0 !important;
  line-height: 28px !important;
  padding: 0px !important; 
  position: absolute !important;
  top: unset !important; 
  width: 100% !important;
}
.cs-downlod-sec2 ul {
  border: 1px solid #fbdc06 !important;
  width: 100% !important;
}
.cs-downlod-sec2 ul li a {
  padding: 5px !important;
}
</style>

<section class="cs-favorite-jobs">
  <!-- <div class="panel panel-default ">                                      
    <div id="collapseTwo" class="panel-collapse collapse in">
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
  </div> -->
  <div class="row">

    <div class="col-lg-9 col-md-9 col-sm-12 col-xs-12" >
      <div id="map" style="width: 100%; height: 450px;"></div>
    </div>

    <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
      <div class="">
        <div class="margin10">
          <div class="">
            <?php if(!empty($data['riderData']->image_url)) { ?>
              <img id="riderImg" src="<?php echo base_url();?>admin/images/vendor/<?php echo $data['riderData']->image_url; ?>" style="border:2px solid black;width:100%;height:115px;">
            <?php } else { ?>
              <img id="riderImg" src="<?php echo base_url();?>assets/images/billyReed.jpeg" style="border:2px solid black;width:100%;height:115px;">
            <?php } ?>
          </div>
          <div class="row vender_info" >
            <div class="col-md-12 col-lg-12 col-sm-12">


              <div class="cs-downlod-sec cs-downlod-sec2" style="right: 15px !important; top: 0px !important;">
                <a class="a1">Rider Name</a>
                <ul>
                  <?php foreach ($data['ongoingRiderList'] as $rider) { ?>
                    <li>
                      <a href="<?php echo site_url(); ?>/home/vendorDashboard/home/<?php echo $rider->user_id ?>"><?php echo $rider->name ?></a>
                    </li>
                  <?php } ?>  
                </ul>
              </div>


              <button class="collapsible" data-toggle="collapse" data-target="#demo">Rider Name <i class="icon-arrow-down"></i> </button>
              <div>
                <ul>
                  <li style="padding: 0px;"> 
                    <a style="color: black;" href="javascript:voic(0);"><b> Rider Id </b></a>
                    <span id="rider_id"><?php if(!empty($data['riderData']->user_id)) echo $data['riderData']->user_id; ?></span>
                  </li>
                  <li style="padding: 0px;"> 
                    <a style="color: black;" href="javascript:voic(0);"><b> Name :</b> </a>
                    <span id="rider_name"><?php if(!empty($data['riderData']->name)) echo $data['riderData']->name; ?></span>
                  </li>
                  <li style="padding: 0px;"> 
                    <a style="color: black;" href="javascript:voic(0);"><b> Current Locations :</b></a> 
                    <span id="current_location"><?php if(!empty($data['riderLocation'])) echo $data['riderLocation']; ?></span>
                  </li>
                  <!-- <li style="padding: 0px;"> 
                    <a style="color: black;" href="javascript:voic(0);"><b> ETA :</b> </a>
                    <span id="eta"><?php if(!empty($data['riderData']->name)) echo $riderData->name; ?></span> 
                  </li> -->
                  <li style="padding: 0px;"> 
                    <a style="color: black;" href="javascript:voic(0);"><b> Rider Nunber : </b></a> 
                    <span id="rider_number"><?php if(!empty($data['riderData']->mobile)) echo $data['riderData']->mobile; ?></span>
                  </li>
                  <li style="padding: 0px;"> 
                    <a style="color: black;" href="javascript:voic(0);"><b> Group Id : </b></a> 
                    <span id="group_id"><?php if(!empty($data['riderData']->group_order_id)) echo $data['riderData']->group_order_id; ?></span>
                  </li>


                  <div id="order-data-list">
                    <?php 
                      if(!empty($data['orderData'])) {
                      foreach ($data['orderData'] as $order) { ?>
                      <hr>
                      <li style="padding: 0px;"> 
                        <a style="color: black;" href="javascript:voic(0);"><b> Order Id : </b></a> 
                        <?php if(!empty($order->order_id)) echo $order->order_id; ?>
                      </li>
                      <li style="padding: 0px;"> 
                        <a style="color: black;" href="javascript:voic(0);"><b> Customer Name :</b></a> 
                        <?php if(!empty($order->customer_name)) echo $order->customer_name; ?>
                      </li>
                      <li style="padding: 0px;"> 
                        <a style="color: black;" href="javascript:voic(0);"><b> Customer Contact : </b></a> 
                        <?php if(!empty($order->customer_contact)) echo $order->customer_contact; ?>
                      </li>
                      <li style="padding: 0px;"> 
                        <a style="color: black;" href="javascript:voic(0);"><b> Drop OFF Loc. </b></a> 
                        <?php if(!empty($order->dropoff_address_line_1)) echo $order->dropoff_address_line_1; ?>
                        <?php if(!empty($order->dropoff_address_line_2)) echo $order->dropoff_address_line_2; ?>
                        <?php if(!empty($order->dropoff_city)) echo $order->dropoff_city; ?>
                        <?php if(!empty($order->dropoff_state)) echo $order->dropoff_state; ?>
                        <?php if(!empty($order->dropoff_zip)) echo $order->dropoff_zip; ?>
                      </li>
                    <?php } } else { ?>
                      <hr>
                      <li style="padding: 0px;"> 
                        <a style="color: black;" href="javascript:voic(0);"><b> Order Id : </b></a> 
                      </li>
                      <li style="padding: 0px;"> 
                        <a style="color: black;" href="javascript:voic(0);"><b> Customer Name :</b></a> 
                      </li>
                      <li style="padding: 0px;"> 
                        <a style="color: black;" href="javascript:voic(0);"><b> Customer Contact : </b></a> 
                      </li>
                      <li style="padding: 0px;"> 
                        <a style="color: black;" href="javascript:voic(0);"><b> Drop OFF Loc. </b></a> 
                      </li>
                    <?php } ?>
                  </div>


                </ul>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>


<script>
  jQuery(document).ready(function () {
    jQuery('[data-toggle="tooltip"]').tooltip();
  });
</script>




<script>







function initialize() {
  initMap();
  initAutocomplete();
}









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
      zoom: 4
    });
    var rider_id = '<?php echo $data['rider_id']; ?>';
    var infoWindow = new google.maps.InfoWindow;

          // Change this depending on the name of your PHP or XML file    
          downloadUrl('<?php echo base_url(); ?>/index.php/home/maplocation', function(data) {
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
                  url: "<?php echo base_url(); ?>index.php/home/getRiderOrderData",  
                  cache:false,  
                  data: data,
                  dataType: "json",       
                  success: function(response)  
                  {  
                    $('#rider_id').text(response.rider.user_id);
                    $('#rider_name').text(response.rider.name);
                    $('#rider_number').text(response.rider.mobile);
                    $("#riderImg").attr('src',"<?php echo base_url();?>admin/images/vendor/"+response.rider.image_url);
                    $('#current_location').text(response.address);
                    $('#group_id').text(response.order[0].group_order_id);

                    
                    appendOrderGrid(response);
                  } 

                });


              });
            });
          });
        }

        function appendOrderGrid(response)
        {
          console.log(response);

          var gridContainer = document.getElementById("order-data-list");
          gridContainer.innerHTML = ""; 


          if (response.order.length == 0) {
            gridContainer.innerHTML = "No order Details";
          }

          for (i = 0; i < response.order.length; i++)
          {
            orderdata = response.order[i];

            gridContainer.innerHTML += '<hr>'+
            '<li style="padding: 0px;">'+ 
            '<a style="color: black;" href="javascript:voic(0);"><b> Order Id : </b></a>'+ 
            '<span>'+orderdata.order_id+'</span>'+
            '</li>'+
            '<li style="padding: 0px;">'+ 
            '<a style="color: black;" href="javascript:voic(0);"><b> Customer Name :</b></a>'+ 
            '<span>'+orderdata.customer_name+'</span>'+
            '</li>'+
            '<li style="padding: 0px;">'+
            '<a style="color: black;" href="javascript:voic(0);"><b> Customer Contact : </b></a>'+
            '<span>'+orderdata.customer_contact+'</span>'+
            '</li>'+
            '<li style="padding: 0px;">'+
            '<a style="color: black;" href="javascript:voic(0);"><b> Drop OFF Loc. </b></a>'+
            '<span>'+orderdata.dropoff_address_line_1+' '+orderdata.dropoff_address_line_2+' '+orderdata.dropoff_city+' '+orderdata.dropoff_state+' '+orderdata.dropoff_zip+'</span>'+
            '</li>';
          }
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
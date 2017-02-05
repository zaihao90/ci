
<style>
      /* Always set the map height explicitly to define the size of the div
       * element that contains the map. */
      #map {
        height: 100%;
      }
</style>
    <link type="text/css" rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500">
<style>
  #locationField, #controls {

    width: 480px;
  }
  #autocomplete {

    width: 99%;
  }
  .label {
    text-align: right;
    font-weight: bold;
    width: 100px;
    color: #303030;
  }
  #address {
    border: 1px solid #000090;
    background-color: #f0f0ff;
    width: 480px;
    padding-right: 2px;

  }
  #address td {
    font-size: 10pt;
  }
  .field {
    width: 99%;
  }
  .slimField {
    width: 80px;
  }
  .wideField {
    width: 200px;
  }
  #locationField {
   width: 100%;
  }
</style>
  <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
  <link rel="stylesheet" href="/resources/demos/style.css">
<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
  <script>
  $( function() {
    $( "#datepicker" ).datepicker({
      changeMonth: true,
      changeYear: true,
     maxDate: "+0M +0D",
     dateFormat: 'dd/mm/yy',
    });
  } );
$("#txtDate").val($.datepicker.formatDate('dd M yy', new Date()));
      

  </script>
<!--    ------------------------------------------Body--------------------------------------------------------->
<div id="locationField" style="text-align:center;">
    
    
    <h1>My Profile</h1>
    <?php 
    if(isset($dataprofile['message']))
    {
        echo $dataprofile['message'];
    }
    ?>
    
    <?php 
    if(isset($_SESSION['userid']))
    {?>
        You can edit your email address, gender and name on your Facebook <a href="https://www.facebook.com/settings">Account Setting</a> 
    <?php } ?>

    <br><br><br>

<center>
     <?php  if(isset($_SESSION['userid'])) { ?>
        <img src="//graph.facebook.com/<?php echo $_SESSION['userid']; ?>/picture?width=200&height=200">
    <?php } ?>
    <br><br><br><br>
    <table id="address" > 
        <?php echo form_open('/index.php/pages/updateprofile')?>
        <tr>
            <td class="label">
              Name:
            </td>
            <td class="wideField" colspan="3">
              <input class="field" type="text" name="name" readonly="readonly" value="<?php echo $Name ; ?>"><br> 

            </td>
        </tr>
        <tr>
            <td class="label">
             Email:
            </td>
            <td class="wideField" colspan="3">
               <input class="field" type="text" name="email" readonly="readonly" value="<?php echo $Email; ?>"><br>
            </td>
        </tr>
        <tr>
            <td class="label">Gender:</td>
            <td class="slimField">
                <select class="field" name="gender" style="text-transform:uppercase">
                    <?php if($Gender == 'MALE'){ ?>
                  <option value="MALE" selected="selected">MALE</option>
                    <?php }else{ ?>
                      <option value="MALE" >MALE</option>
                    <?php } ?>
                <?php if($Gender == 'FEMALE'){ ?>
                  <option value="FEMALE" selected="selected">FEMALE</option>
                    <?php }else{ ?>
                      <option value="FEMALE" >FEMALE</option>
                    <?php } ?>
                </select>
            
            </td>
        </tr>
        <tr>
            <td class="label">Birthday:</td>

            <td class="wideField" colspan="2">
                <input class="field" id="datepicker" name="birthdate" readonly="readonly" value="<?php echo $Birthdate; ?>" > 
            </td>
            <td>
            #DD/MM/YYYY
            </td>
        </tr>
        <tr>
            <td class="label" >
             Search For Your Address
            </td>
            <td class="wideField" colspan="3">
                <input class="field" id="autocomplete" placeholder="Enter To Search Your Address" onFocus="geolocate()" type="text">  
            </td>

        </tr>
        <tr>
            <td class="label">Door Number:</td>
            <td class="wideField" colspan="3">
                <input class="field" id="hse_address" name="doornum" placeholder="Door Number(Optional)" style="text-transform:uppercase" value="<?php echo $Doornum; ?>">
            </td>
         </tr>
        <tr>
            <td class="label">Street address:</td>
            <td class="slimField">
                <input class="field" id="street_number" name="streetnum" style="text-transform:uppercase" value="<?php echo $Streetnum; ?>">
            </td>
            <td class="wideField" colspan="2">
                <input class="field" id="route" name="routename"  style="text-transform:uppercase" value="<?php echo $Routenum; ?>">
            </td>
        </tr>
        <tr>
            <td class="label">City:</td>
            <td class="wideField" colspan="3">
                <input class="field" id="locality" name="cityname" style="text-transform:uppercase" value="<?php echo $Cityname; ?>">
            </td>
         </tr>
        <tr>
            <td class="label">State:</td>
            <td class="slimField">
                <input class="field" id="administrative_area_level_1" name="statename" style="text-transform:uppercase" value="<?php echo $Statename; ?>"></td>
            <td class="label">Zip code:</td>
            <td class="wideField">
                <input class="field" id="postal_code" name="zipcodenum" style="text-transform:uppercase" value="<?php echo $Zipcodenum; ?>"></td>
        </tr>
        <tr>
            <td class="label">Country:</td>
            <td class="wideField" colspan="3">
                <input class="field" id="country"  name="countryname" style="text-transform:uppercase" value="<?php echo $Countryname; ?>"></td>
        </tr>
        <tr>
        <td>
            <input type="button" value="Cancel" onClick="document.location.href='<?php echo base_url(); ?>index.php';" />   
           
        </td>
        <td>
             <button type="reset" value="Reset">Clear</button>
        </td>
        <td colspan="2">
            <button type="submit" value="Submit">Save Changes</button>    
        </td>
        </tr>
    <?php echo form_close();?>
    </table>
</center>
<!--    ------------------------------------------End Of Body--------------------------------------------------------->

</div>
  <script>
      // This example displays an address form, using the autocomplete feature
      // of the Google Places API to help users fill in the information.

      // This example requires the Places library. Include the libraries=places
      // parameter when you first load the API. For example:
      // <script src="https://maps.googleapis.com/maps/api/js?key=YOUR_API_KEY&libraries=places">

      var placeSearch, autocomplete;
      var componentForm = {
        street_number: 'short_name',
        route: 'long_name',
        locality: 'long_name',
        administrative_area_level_1: 'short_name',
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

      function fillInAddress() {
        // Get the place details from the autocomplete object.
        var place = autocomplete.getPlace();

        for (var component in componentForm) {
          document.getElementById(component).value = '';
          document.getElementById(component).disabled = false;
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
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBgUevBD1LpBPfhI5-kvE2YywhVOUndghA&libraries=places&callback=initAutocomplete"
        async defer></script>

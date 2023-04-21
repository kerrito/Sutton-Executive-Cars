function initMap(search_id,run_calculate,submit_form) {
  var dis=0;
    var submit_check=submit_form;
    if(search_id!=undefined && search_id!=''){
    var options = {
        componentRestrictions: { country: 'UK' } // Restrict suggestions to the UK
    };
    var autocomplete = new google.maps.places.Autocomplete(document.getElementById(search_id), options);

    autocomplete.addListener('place_changed', function () {
        var place = autocomplete.getPlace();
        var url=place.url
        document.getElementById(search_id+"_lat").value=url;
	    var value=document.getElementById(search_id).value
        sessionStorage.removeItem(search_id)
        sessionStorage.setItem(search_id,value);
        
	    
        // console.log(url)
        // var long=place.geometry.location.lng();
        // var lat=place.geometry.location.lat();
        // document.getElementById(search_id+"_lat").value=lat;
        // document.getElementById(search_id+"_long").value=long;
        // console.log(long+" "+lat);
        console.log(place); 
        // Log the selected place object to the console
    });
}


    //create a DirectionsService object to use the route method and get a result for our request
    var directionsService = new google.maps.DirectionsService();

    function calcRoute(from,to) {


      //create request
      var request = {
        origin: from,
        destination: to,
        travelMode: google.maps.TravelMode.DRIVING, //WALKING, BYCYCLING, TRANSIT
        unitSystem: google.maps.UnitSystem.IMPERIAL,
      };

      //pass the request to the route method
      directionsService.route(request, function (result, status) {
        if (status == google.maps.DirectionsStatus.OK) {
          dis += parseInt(result.routes[0].legs[0].distance.text);
          document.getElementById("total_distance_of_trip").value=dis  
          sessionStorage.removeItem("distance_in_mile")
          sessionStorage.setItem("distance_in_mile",dis)

          
          
        } else {
            submit_check="false";
          }
      });
    }

    if (run_calculate != undefined && run_calculate != '') {
      
      var count=document.getElementById("via_locations_fields").childElementCount;
      console.log(count);
      if(count>0){
        calcRoute(document.getElementById("point_start_loc").value,document.getElementsByClassName("via_location_childs")[0].value);
        for (var n=0;n<count;n++){  
        if(document.getElementsByClassName("via_location_childs")[(n+1)]){
            var value=document.getElementsByClassName("via_location_childs")[n].value
        var value1=document.getElementsByClassName("via_location_childs")[(n+1)].value
        calcRoute(value,value1);  
       }else{
        calcRoute(document.getElementsByClassName("via_location_childs")[n].value,document.getElementById("point_end_loc").value);
       }
       }
            
        
          setTimeout(function(){
            if(submit_check=="yes" && document.getElementById("total_distance_of_trip").value!=''){
                document.getElementById("ride-bform").submit()
                
            }
        },3000)
      }else{
        calcRoute(document.getElementById("point_start_loc").value,document.getElementById("point_end_loc").value);

setTimeout(function(){
    if(submit_check=="yes" && document.getElementById("total_distance_of_trip").value!=''  ){
        document.getElementById("ride-bform").submit()
        
    }
},2000)
        
      }
     
    }
}
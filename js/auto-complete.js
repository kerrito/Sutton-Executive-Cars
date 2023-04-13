function initMap(search_id) {
    if(search_id!=undefined){
    var options = {
        componentRestrictions: { country: 'UK' } // Restrict suggestions to the UK
    };
    var autocomplete = new google.maps.places.Autocomplete(document.getElementById(search_id), options);

    autocomplete.addListener('place_changed', function () {
        var place = autocomplete.getPlace();
        var url=place.url
        document.getElementById(search_id+"_lat").value=url;
	    var value=document.getElementById(search_id).value
        console.log(search_id)
        console.log(value)
        sessionStorage.removeItem(search_id)
        sessionStorage.setItem(search_id,value);
        
	    
        // console.log(url)
        // var long=place.geometry.location.lng();
        // var lat=place.geometry.location.lat();
        // document.getElementById(search_id+"_lat").value=lat;
        // document.getElementById(search_id+"_long").value=long;
        // console.log(long+" "+lat);
        console.log(place); // Log the selected place object to the console
    });
}
}
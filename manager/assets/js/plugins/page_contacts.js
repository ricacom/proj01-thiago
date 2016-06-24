var ContactPage = function () {

    return {
        
    	//Basic Map
        initMap: function () {
			var map;
			$(document).ready(function(){
			  map = new GMaps({
				div: '#map',
				lat: -22.9199991,
				lng: -47.0372082
				/*
				lat: 40.748866,
				lng: -73.988366
				*/
			  });
			  
			  var marker = map.addMarker({
			  	lat: -22.9199991,
				lng: -47.0372082,
			  	/*
				lat: 40.748866,
				lng: -73.988366,
				*/
	            title: 'Company, Inc.'
		       });
			});
        },

        //Panorama Map
        initPanorama: function () {
		    var panorama;
		    $(document).ready(function(){
		      panorama = GMaps.createPanorama({
		        el: '#panorama',
		        lat: -22.9199991,
				lng: -47.0372082
		        /*
		        lat : 40.748866,
		        lng : -73.988366
		        */
		      });
		    });
		}        

    };
}();


/*
https://www.google.com.br/maps/place/R.+Dom+Ot%C3%A1vio+Chagas+de+Miranda+-+Jardim+Baroneza,+Campinas+-+SP
/@-22.9199991,-47.0372082,17z/data=!4m2!3m1!1s0x94c8cf1fc156a63b:0x202c8117820e0bc9?hl=pt-BR
*/
var JSON; 
var myJson; 
var seven;
var departure = 'DUB'; 
var startTime = '00:01';
var endTime = '23:59';
function loadAPI() {
    $('#output').fadeOut('slow');
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function(){
        if(this.readyState == 4 && this.status == 200)
        {
            
            myJson = JSON.parse(this.responseText);
            populateArrival(myJson); 
            populateDeparture(myJson);
        }
    };
    xhttp.open("GET", 'https://api.ryanair.com/flightinfo/3/flights/?&arrivalAirportIataCode='  + '&departureAirportIataCode=' + departure + '&departureTimeScheduledFrom=' + startTime + '&departureTimeScheduledTo=' + endTime + '&length=&number=&offset=', true);
    xhttp.send();

}

    

    
    function populateArrival(JSON){
		for (var i in JSON.flights){
        var message = message + "<option value =\"" +  JSON.flights[i].arrivalAirport.iataCode + "\">" +  JSON.flights[i].arrivalAirport.name + "</option>";
    }
         document.getElementById('arrival').innerHTML = message;
         ///8 lines below taken from http://jsfiddle.net/EB3nQ/
        var usedNames = {};
        $("select[id='arrival'] > option").each(function () {
        if(usedNames[this.text]) {
        $(this).remove();
    } else {
        usedNames[this.text] = this.value;
    }
});
    }
    function populateDeparture(JSON){
        var message = '<option>' + JSON.flights[1].departureAirport.name + "</option>";
		for (var i in JSON.flights){
        message = message + "<option value =\"" +  JSON.flights[i].arrivalAirport.iataCode + "\">" +  JSON.flights[i].arrivalAirport.name + "</option>";
    }
         document.getElementById('departure').innerHTML = message;
         ///8 lines below taken from http://jsfiddle.net/EB3nQ/
        var usedNames = {};
        $("select[id='departure'] > option").each(function () {
        if(usedNames[this.text]) {
        $(this).remove();
    } else {
        usedNames[this.text] = this.value;
    }
});
    }
    
    function displayDetails(){
        $('#output').fadeIn('slow');
        var destination = document.getElementById('arrival').value.toUpperCase();
        var output = '<tr><th>Flight Number</th><th>Departure Airport</th><th>Destination Airport</th><th> Scheduled Departure</th> <th> Estimated Departure</th> <th>Status</th></tr>';
         for (var x in myJson.flights){
            var compare = myJson.flights[x].arrivalAirport.iataCode;
             if (compare == destination && departure == myJson.flights[x].departureAirport.iataCode){
                output = output +
                 '<tr><td>FR' + myJson.flights[x].number + '</td><td>' + myJson.flights[x].departureAirport.name + '</td><td>'
                + myJson.flights[x].arrivalAirport.name + '</td><td>' + myJson.flights[x].departureTime.scheduled + '</td><td>' + myJson.flights[x].departureTime.scheduled + '</td><td>' + myJson.flights[x].status.message + '</td>  </tr>';
            
        }
         }
         document.getElementById('arrival').value = destination;
         if (output == undefined){
             output = 'Sorry, no flights are available between these airports.';
         }
         document.getElementById("output").innerHTML = output;
    }
    function changeDeparture() {
        departure = document.getElementById('departure').value; 
        loadAPI()
    }
    
    
    
$(document).ready(function() {
    //geo-location enabled
    if("geolocation" in navigator) {
        navigator.geolocation.getCurrentPosition(showcityname);
        function showcityname(position) {
            let lati = position.coords.latitude;
            let longi = position.coords.longitude;
            let temprature;
            let city;
            let country;
            let apiKey = "b7110ab9fedfd12468786ef3231f0cd1";
            $.getJSON("http://api.openweathermap.org/data/2.5/weather?lat=" + lati + "&lon=" + longi + "&appid=" + apiKey, function(data) {
                city = data["name"];
                country = data["sys"]["country"];
                temprature = data["main"]["temp"] - 273.15;
                $("#temprature").html(temprature.toFixed(2) + "&deg;C");
                $("#place").html(city + ", "+ country);
            });
        }
    } else {
        //Browser does not have permission to access geolocation
    }
});
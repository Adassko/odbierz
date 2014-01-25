<html>
    <body>
        <div id="out"></div>
    <script>
        
function longitude_length(latitude)
{
	var p1 = 111412.84, p2 = -93.5, p3 = 0.118,
		deg2rad = 0.017453292519943295, // 2 * Math.PI / 360
		lat = deg2rad * latitude;
	return p1 * Math.cos(lat) + p2 * Math.cos(3 * lat) + p3 * Math.cos(5 * lat);
}

function getLocation(success, failure) {
    function f(success, failure, timeout) {
        navigator.geolocation.getCurrentPosition(success, failure,
            { maximumAge: 10 * 60 * 1000, timeout: timeout || 0 );
    }
    
    f(success, function(e) {
        if (e.code === e.TIMEOUT) {
            // div show info
            setTimeout(function() {
                f(success, failure, Infinity);
            }, 1000);
        }
    });
}


        var loc = "";
        navigator.geolocation.getCurrentPosition(function(e) {
            for(var k in e.coords)
            {
                loc += k + " = " + e.coords[k] + "<br>";
            }
            loc += Math.round(e.coords.longitude * 1e7) + "<br>";
            loc += Math.round(e.coords.latitude * 1e5) + "<br>"; // 1 unit ~= 10m
            document.getElementById('out').innerHTML = loc;
        },
                                             function(){},
                                             {maximumAge:600000, enableHighAccuracy:true});
    </script>    
    </body>
</html>
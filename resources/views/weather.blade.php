<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Cuaca Sekarang</title>
</head>

<body>
    {{-- <pre>{{ print_r($weather, true) }}</pre> --}}
    <h1>Cuaca di {{ $weather['name'] }}</h1>
    <ul>
        <li>Temperatur: {{ $weather['main']['temp'] }}°C</li>
        <li>Rasa Seperti: {{ $weather['main']['feels_like'] }}°C</li>
        <li>Kelembaban: {{ $weather['main']['humidity'] }}%</li>
        <li>Tekanan Udara: {{ $weather['main']['pressure'] }} hPa</li>
        <li>Cuaca: {{ $weather['weather'][0]['description'] }}</li>
    </ul>

    <script>
        function getLocation() {
            if (navigator.geolocation) {
                navigator.geolocation.getCurrentPosition(function(position) {
                    const lat = position.coords.latitude;
                    const lon = position.coords.longitude;

                    fetch(`/weather-gps?lat=${lat}&lon=${lon}`)
                        .then(response => response.json())
                        .then(data => {
                            // Tampilkan data cuaca di HTML
                            document.getElementById('weather-info').innerHTML = `
                            <h1>Cuaca Sekarang:</h1>
                            <ul>
                            <li>Temperatur: ${data.main.temp}°C</li>
                            <li>Rasa Seperti: ${data.main.feels_like}°C</li>
                            <li>Kelembaban: ${data.main.humidity}%</li>
                            <li>Cuaca: ${data.weather[0].description}</li>
                            </ul>
                        `;
                        })
                        .catch(error => console.log('Error:', error));
                });
            } else {
                console.log("Geolocation is not supported by this browser.");
            }
        }

        getLocation();
    </script>

    <div id="weather-info"></div>


</body>

</html>

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
</body>

</html>

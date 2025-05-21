<!DOCTYPE html>
<html lang="en">

<head>
    @vite(['resources/sass/app.scss', "resources/js/app.js"])

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Orario dei treni</title>
</head>

<body>
    <div class="container">
        <h1>Orario dei treni disponibili attualmente</h1>

        @foreach ($futureAvailableTrains as $train)
            <div class="train">
                <h2>Treno {{ $train['codice_treno'] }}</h2>
                <p>Stazione di Partenza: {{ $train['stazione_partenza'] }}</p>
                <p>Stazione di Arrivo: {{ $train['stazione_arrivo'] }}</p>
                <p>Orario di Partenza: {{ $train['orario_partenza'] }}</p>
                <p>Orario di Arrivo: {{ $train['orario_arrivo'] }}</p>
            </div>
        @endforeach

    </div>
</body>

</html>
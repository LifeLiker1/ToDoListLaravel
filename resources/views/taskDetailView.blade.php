<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>

<body>
    @include('header', ['myTitle' => "Задача " . $details->title ])
    <h1>{{ $details->description }}</h1>
    <button>Сохранить изменения</button>
</body>

</html>

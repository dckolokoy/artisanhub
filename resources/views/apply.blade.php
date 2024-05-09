<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>

    @foreach($tables as $table)

           {{auth()->user()->name }}, is applying for the position of {{ $table->position }}. Please contact here <br>
           Email: {{auth()->user()->email }} <br>
           Mobile: {{auth()->user()->mobile }}


    @endforeach
</body>
</html>

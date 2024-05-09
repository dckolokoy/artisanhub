<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>

    @foreach($appointments as $appointment)
        @if ($appointment->is_verified == 1)
            Hello {{$appointment->name  }}, your account is approved. Please try to login your account. Thank you.

        @else
            Hello {{$appointment->name  }}, your account is disapproved due to {{ $appointment->remarks }}.
            Thank you.

        @endif

    @endforeach
</body>
</html>

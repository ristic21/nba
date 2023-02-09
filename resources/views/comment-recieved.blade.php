<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Verification</title>
</head>
<body>
    
    <h1>New comment</h1>
    <p>New comment on "https://localhost:8000/teams/{{ $mailData['id'] }}" from {{Auth::user()->name}}. <a href="https://localhost:8000/signin">Click to login and check it!</a> </p>

</body>
</html>
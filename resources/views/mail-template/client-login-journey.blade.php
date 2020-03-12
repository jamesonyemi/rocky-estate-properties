<!DOCTYPE html>
<html>
  <head>
    <title>Client Login</title>
  </head>
  <body>
    <h2>Welcome to the {!! config('app.name') !!} </h2>
    <p>Login Credentials</p><br>
    <p>{!! $email !!}</p>
    <p>{!! $secretKey !!}</p>
    <p>Please click on the below link below to Login</p> 
    <br/>
    <a href="{!! url('client/sign-in', $client->clientid) !!}">Register</a>
  </body>
</html>
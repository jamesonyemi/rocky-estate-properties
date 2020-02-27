<!DOCTYPE html>
<html>
  <head>
    <title>Email Verification</title>
  </head>
  <body>
    <h2>Welcome to the {!! config('app.name') !!} </h2>
    <h2>Your User Name {!! $user['first_name'] ." ". $user['last_name'] !!} </h2>
    <br/>
    <p>Your registered email  is <address>{{ $user['email'] }}</address> </p> 
    <p>Please click on the below link to verify your email account</p> 
    <br/>
    <a href="{!! url('client/verify', $user->verifyUser->token) !!}">Verify Email</a>
  </body>
</html>
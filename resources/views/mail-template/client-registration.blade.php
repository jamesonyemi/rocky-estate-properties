<!DOCTYPE html>
<html>
  <head>
    <title>Client Registration Process</title>
  </head>
  <body>
    <h2>Welcome to the {!! config('app.name') !!} </h2>
    <p>Please click on the below link below begin your Registration Process</p> 
    <br/>
    <a href="{!! url('client/sign-up', $client->clientid) !!}">Register</a>
  </body>
</html>
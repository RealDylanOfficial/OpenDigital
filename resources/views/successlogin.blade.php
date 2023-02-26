<!DOCTYPE html>
<html>
 <head>
  <title>Simple Login System in Laravel</title>
 </head>
 <body>
  <br />
  <div class="container box">
   <h3 align="center">Simple Login System in Laravel</h3><br />

   @if(isset(Auth::user()->username))
    <div class="alert alert-danger success-block">
     <strong>Welcome {{ Auth::user()->username }}</strong>
     <br />
     <a href="{{ url('/test/logout') }}">Logout</a>
    </div>
   @else
    <script>window.location = "/test";</script>
   @endif
   
   <br />
  </div>
 </body>
</html>
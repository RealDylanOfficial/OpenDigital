<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="icon" href="{{asset("images/logo.png")}}">
	<title>OpenDigital - Login</title>
	<link rel="stylesheet" href="login.scss">
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

    @viteReactRefresh
    @vite(["resources/js/app.js", "resources/js/login.js", "resources/sass/app.scss", "resources/sass/login.scss"])

	
</head>
<body>
	@include('inc.navbar')

	<main id="main-holder">
    <h1 id="login-header">Login</h1>

    @if(isset(Auth::user()->username))
      <script>window.location="/successlogin";</script>
    @endif

    @if ($message = Session::get('error'))
    <div class="alert alert-danger alert-block">
      <button type="button" class="close" data-dismiss="alert">x</button>
      <strong>{{ $message }}</strong>
    </div>
    @endif
   
    @if (count($errors) > 0)
    <div class="alert alert-danger">
      <ul>
      @foreach($errors->all() as $error)
      <li>{{ $error }}</li>
      @endforeach
      </ul>
    </div>
    @endif
    
    <form method="post" id="login-form" action="{{ url('/checklogin') }}">
      {{ csrf_field() }}
      <input type="text" name="username" id="username" class="form-control" placeholder="Username">
      <input type="password" name="password" id="password" class="form-control" placeholder="Password">
      <div class="form-group">
        <input type="submit" name="login" value="Login" class="btn btn-primary" id="login-form-submit">
      </div>
    </form>
  
  </main>

</body>
</html>

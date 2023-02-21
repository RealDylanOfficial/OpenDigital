
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="icon" href="{{asset("images/logo.png")}}">
	<title>OpenDigital - Register</title>
	<link rel="stylesheet" href="register.scss">

    @viteReactRefresh
    @vite(["resources/js/app.js", "resources/sass/app.scss", "resources/sass/register.scss"])

	
</head>
<body>
	@include('inc.navbar')
	<main id="main-holder">
    <h1 id="register-header">Register</h1>
   
    <form id="register-form">
	  <input type="text" name="email" id="email-field" class="register-form-field" placeholder="Email">
      <input type="text" name="username" id="username-field" class="register-form-field" placeholder="Username">
      <input type="password" name="password" id="password-field" class="register-form-field" placeholder="Password">
      <input type="submit" value="Login" id="login-form-submit">
    </form>
  
</body>
</html>

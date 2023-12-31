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


@include('inc.navbar')

<div class="row justify-content-center">
	<div class="col-md-4">
		<div class="card">
		<div class="card-header">Registration</div>
		<div class="card-body">
			<form action="{{ route('sample.validate_registration') }}" method="POST">
				@csrf
				<div class="form-group mb-3">
					<input type="text" name="username" class="form-control" placeholder="Username" />
					@if($errors->has('username'))
						<span class="text-danger">{{ $errors->first('username') }}</span>
					@endif
				</div>
				<div class="form-group mb-3">
					<input type="text" name="email" class="form-control" placeholder="Email Address" />
					@if($errors->has('email'))
						<span class="text-danger">{{ $errors->first('email') }}</span>
					@endif
				</div>
				<div class="form-group mb-3">
					<input type="password" name="password" class="form-control" placeholder="Password" />
					@if($errors->has('password'))
						<span class="text-danger">{{ $errors->first('password') }}</span>
					@endif
				</div>
				<div class="d-grid mx-auto">
					<button type="submit" class="btn btn-dark btn-block auth-button">Register</button>
				</div>
			</form>
		</div>
	</div>
</div>


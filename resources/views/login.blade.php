<!DOCTYPE html>

<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="icon" href="{{asset("images/logo.png")}}">
	<title>OpenDigital - Login</title>
	<link rel="stylesheet" href="login.scss">
    @viteReactRefresh
    @vite(["resources/js/app.js", "resources/js/login.js", "resources/sass/app.scss", "resources/sass/login.scss"])

	
</head>

<main>

@if($message = Session::get('success'))

<div class="alert alert-info">
{{ $message }}
</div>

@endif

@include('inc.navbar')


<div class="row justify-content-center">
	<div class="col-md-4">
		<div class="card">
			<div class="card-header">Login</div>
			<div class="card-body">
				<form action="{{ route('sample.validate_login') }}" method="post">
					@csrf
					<div class="form-group mb-3">
						<input type="text" name="username" class="form-control" placeholder="Username" />
						@if($errors->has('username'))
							<span class="text-danger">{{ $errors->first('username') }}</span>
						@endif
					</div>
					<div class="form-group mb-3">
						<input type="password" name="password" class="form-control" placeholder="Password" />
						@if($errors->has('password'))
							<span class="text-danger">{{ $errors->first('password') }}</span>
						@endif
					</div>
					<div class="d-grid mx-auto">
						<button type="submit" class="btn btn-dark btn-block">Login</button>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>


</main>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>How To Install React in Laravel 9 with Vite</title>

    @viteReactRefresh
    @vite(["resources/js/app.js", "resources/sass/app.scss"])

	
</head>
<body>
	@include('inc.navbar')
	
    {{$testHead}}
	<div id="root"></div>
	<img src="{{ asset('images/Blue_tit_three-quarter_close-up.jpg') }}" alt="" style="height: 200px; width:auto">
	<h1 class="text-3xl font-bold underline">test</h1>

</body>
</html>

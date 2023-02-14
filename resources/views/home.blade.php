<!DOCTYPE html>
<html>
<head>
    <link rel="icon" href="{{asset("images/logo.png")}}">
    <title> OpenDigital - Home</title>
    @viteReactRefresh
    @vite(["resources/js/app.js", "resources/sass/app.scss"])
</head>
<body>
@include('inc.navbar')
</body>
</html>

home
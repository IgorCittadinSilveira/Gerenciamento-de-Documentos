<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{$title}} - Gerenciamento</title>
    <link rel="stylesheet" href="{{asset('css/app.css')}}">
</head>
<body>

<div class="container">
        <h1> 
<svg xmlns="http://www.w3.org/2000/svg" height=" 26"fill="currentColor" class="bi bi-house-fill" viewBox="0 0 16 16">
<a href="{{route('dashboard')}}">
<path d="M8.707 1.5a1 1 0 0 0-1.414 0L.646 8.146a.5.5 0 0 0 .708.708L8 2.207l6.646 6.647a.5.5 0 0 0 .708-.708L13 5.793V2.5a.5.5 0 0 0-.5-.5h-1a.5.5 0 0 0-.5.5v1.293z"/>
<path d="m8 3.293 6 6V13.5a1.5 1.5 0 0 1-1.5 1.5h-9A1.5 1.5 0 0 1 2 13.5V9.293z"/>
</svg>
</a>  
{{$title}}
        </h1>
         
@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
 
            {{$slot}}

            <div class="container">
        <!-- O conteúdo será inserido aqui -->
        @yield('content')
    </div>

            
</div>
</body>
</html>


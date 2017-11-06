
<!DOCTYPE html>
<html lang="en">
<head>
    <title>9GaG</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <style>
        .background{
            position: absolute;
            top:0;
            left:0;
            width: 100%;
            height:100%;
            background: url("{{asset('storage/404.gif')}}") 50% no-repeat;
            opacity: 0.2;
            background-size:cover;
            z-index: -1;
        }

        .message{
            text-align: center;
            width:100%;
            top:50%;
            position: absolute;
            transform: translateY(-50%);
        }
        .message h1 {
            font-size: 144px;
            font-weight: 100;
            margin-bottom: 16px;
        }
    </style>
</head>
<body style="background-color: #000000;color: #fff;">

<nav class="navbar navbar-inverse">
    <div class="container-fluid">
        <div class="navbar-header">
            <a class="navbar-brand" href="/trending">
                <img  style="width: 35px; margin-top: -5px" src="{{asset('storage/logo.jpg')}}" alt="">
            </a>
        </div>
    </div>
</nav>

<div class="background">

</div>

<div class="message">
    <h1>404</h1>
    <h3>There's nothing here</h3>
</div>


</body>
</html>


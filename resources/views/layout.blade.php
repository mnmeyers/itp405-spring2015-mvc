<!DOCTYPE html>
<html>
<head>
    <title>@yield('page_title')</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap.min.css">
    <style>
        .form-control {
            width:30%;
        }
        table{
            table-layout: fixed;
        }
        td{
            word-wrap:break-word;
        }

        .alert {
            background: #e4f3d4;
            border: 2px solid #5ca000;
            font-size: 14px;
            color: #4e7e0e;
            margin: 10px 0;
            padding: 10px;
        }
    </style>
</head>
<body>
<div class="container">
    @yield('content')

</div>

</body>
</html>
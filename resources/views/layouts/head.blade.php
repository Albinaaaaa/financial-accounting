<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />
    <style>
        body {
            background-color: #010725;
        }

        .container {
            max-width: 1200px;
            padding: 0px 15px;
            margin: 0 auto;
        }

        .menu {
            padding: 15px 0px;
            display: flex;
            flex-direction: row;
            justify-content: flex-end;
            align-items: center;
        }

        .btn-primary {
            color: white;
            background-color: #0328EE;
            padding: 15px 20px;
            border-radius: 25px;
            text-decoration: none;
        }

        .btn-primary:not(:last-of-type) {
            margin-right: 15px;
        }


        .btn-primary.mini {
            //padding: 10px 15px;
            background-color: #5069ec;
        }

        .btn-primary:hover {
            background-color: #091b76;
        }

        .content {
            padding: 65px 0px;
            display: flex;
            align-content: center;
            justify-content: center;
            align-items: center;
            color: white;
            font-size: 20px;
            gap: 25px;
        }
    </style>
</head>
<body class="container">

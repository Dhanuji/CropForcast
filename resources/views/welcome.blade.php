<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>AgriTechEase Training Reservation System</title>
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />
    <!-- Styles -->
    <style>
        /* Your styles here */
        html, body {
            height: 100%;
            margin: 0;
            display: flex;
            justify-content: center;
            align-items: center;
        }
        body {
            font-family: 'figtree', sans-serif;
        }
        .container {
            text-align: center;
        }
        .logo {
            width: 100px; /* Adjust as needed */
            height: auto;
        }
        .header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            flex-direction: column; /* Adjusted */
            padding: 20px;
            background-color: #f0f0f0;
            width: 100%; /* Set width to 100% */
        }
        .green-header {
            background-color: lightgreen;
            padding: 20px;
            width: 100%; /* Set width to 100% */
            text-align: center;
        }
        .buttons {
            display: flex;
            gap: 20px;
        }
        .button {
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            background-color: #007bff;
            color: #fff;
            text-decoration: none;
            font-weight: bold;
        }
        .button:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="green-header">
            <h1>Department of Agriculture</h1>
        </div>
        <div class="header">
            <img src="images/department_of_agriculture_logo.png" alt="AgriTechEase Logo" class="logo">
            <h1>Crop Forecasting Mobile Application</h1>
            <div class="buttons"> 
                <a href="login" class="button">Login</a>
                </div>
        </div>
        <!-- Your content here -->
    </div>
</body>
</html>

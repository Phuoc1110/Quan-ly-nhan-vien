<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        .container {
            display: flex;
            flex-direction: column; 
            justify-content: center;
            align-items: center;
            height: 100vh; 
        }
        .centered {
            display: inline-block;
            text-align: left;
            margin-bottom: 5px; 
        }
    </style>
</head>
<body>
    <div class="container">
        <label class="centered">Username</label>
        <input type="text" placeholder="Your username" class="centered">
        <label class="centered">Password</label>
        <input type="password" placeholder="Password" class="centered">
        <input type="button" value="Login" class="centered">
    </div>
</body>
</html>

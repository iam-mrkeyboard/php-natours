<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Natours | Error</title>
    <link href="https://fonts.googleapis.com/css?family=Lato:100,300,400,700,900" rel="stylesheet">
    <style>
        body {
            font-family: "Lato", sans-serif;
            font-weight: 300;
            line-height: 1.7;
            color: #777;
            padding: 3rem;
            background-color: #f7f7f7;
            display: flex;
            align-items: center;
            justify-content: center;
            height: 90vh;
            text-align: center;
        }
        .error-box {
            background-color: #fff;
            padding: 5rem 10rem;
            box-shadow: 0 2rem 6rem rgba(0,0,0,0.1);
            border-radius: 3px;
        }
        .heading-secondary {
            font-size: 3.5rem;
            text-transform: uppercase;
            font-weight: 700;
            display: inline-block;
            background-image: linear-gradient(to right, #ffb900, #ff7730);
            -webkit-background-clip: text;
            color: transparent;
            letter-spacing: 2px;
            margin-bottom: 2rem;
        }
        .error-msg {
            font-size: 1.8rem;
            margin-bottom: 4rem;
        }
        .btn {
            text-transform: uppercase;
            text-decoration: none;
            padding: 1.5rem 4rem;
            display: inline-block;
            border-radius: 10rem;
            transition: all .2s;
            font-size: 1.6rem;
            background-color: #55c57a;
            color: #fff;
            border: none;
        }
        .btn:hover {
            transform: translateY(-3px);
            box-shadow: 0 1rem 2rem rgba(0,0,0,0.2);
        }
    </style>
</head>
<body>
    <div class="error-box">
        <h2 class="heading-secondary">Something went wrong!</h2>
        <p class="error-msg"><?= esc($message) ?></p>
        <a href="/" class="btn">Go back to home</a>
    </div>
</body>
</html>

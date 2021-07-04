<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="../markdownit/atelier-forest-light.css">
    <link rel="stylesheet" href="../app.css">
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
    <link rel="shortcut icon" href="../favicon.svg" type="image/x-icon">
    <title>Laravel Marks Notes</title>
</head>
<body>
    <div>
        <div class="titleContainer">
            <img class="titlePic" src="/favicon.svg" alt="markednotes icon" />
            <h1 class="titleText">Laravel Marks Notes</h1>
        </div>
        <div class="featureContainerContainer">
            <div class="featureContainer">
                <img class="carouselPic" src="creation.jpeg" />
                <p class="description">create study notes using markdown</p>
            </div>
            <a href={{ route('login') }}><div class="enter"><button class="enterText">Enter</button></div></a>
        </div>

        <br />
        <br />

        <div class="footerContainer">
            <h1 class="footerText">Made using Laravel + MongoDB + Heroku</h1>
        </div>
    </div>
</body>
</html>

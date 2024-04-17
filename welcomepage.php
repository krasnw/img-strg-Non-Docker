<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <title>Welcome page</title>
    <link rel="stylesheet" type="text/css" href="css/welcomepage.css">
</head>
<body>
<div class="sections">
    <div class="section" id="section1">
        <h1>🙋Welcome to ImgStrg.com</h1>
    </div>
    <div class="section" id="section2">
        <h1>👮‍Przed rozpoczęciem trzeba zalogować się, albo założyć konto</h1>
    </div>
    <div class="section" id="section3">
        <div class="buttons">
            <div class="backgroundForButtons" id="bgForButtons" style="display: block;">
                <a href="login.php">
                    <button class="login-button" id="login" style="display: block;">🪪 Zaloguj się</button>
                </a>
                <a href="signup.php">
                    <button class="register-button" id="register" style="display: block;">📝 Zarejestruj się</button>
                </a>
                <a href="index.php"><p id="guest">👤 Kontynuuj jako gość</p></a>
            </div>
        </div>
    </div>
</div>
</body>
</html>
<html>
    <head>
        <title>login</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta charset="utf-8"/>
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Abel&display=swap" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css2?family=Bebas+Neue&display=swap" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css2?family=Comfortaa&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="reset.css" media="screen" />
        <link rel="stylesheet" href="style.css" media="screen" />
        <link rel="stylesheet" href="login_animation.css" media="screen" />
    </head>
    <body class="blogContainer">
        <nav style="padding-top: 0.7cm; align-self: flex-end;">
            <ul>
                <li style="padding-right: 30px;"><a href="index.php" class="item12_view">Home</a></li>
            </ul>
        </nav>
        <div class="login0">
          <div class="trail">
            <div class="trail1">
                <h1 class="login_trail">login</h1>
                <form method="post"  action="login_backend.php" class="login2">
                    <div><input  class="login_form" type="text" placeholder="Enter username" id="email" name="email" required minlength="5" maxlength="20"></div>
                    <div><input  class="login_form" type="password" placeholder="Enter password" id="password" name="password" ></div>
                    <button class="login4" type="submit" name="submit" id="submit">sign in</button>
                </form>
            </div>
          </div>
        </div>
    </body>
</html>

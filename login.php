<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://www.phptutorial.net/app/css/style.css">
    <title>Login</title>
</head>
<body>
<main>
    <form action="createSession.php" method="post">
        <h1>Sign in</h1>
        <div>
            <label for="credential">Username or email:</label>
            <input type="text" name="credential" id="credential">
        </div>

        <div>
            <label for="password">Password:</label>
            <input type="password" name="password" id="password">
        </div>
        <button type="submit">Login</button>
        <footer>Don’t have the account yet? <a href="register.php">Sign up</a></footer>
    </form>
</main>
</body>
</html>

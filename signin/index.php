<?php

require_once "../config/db/connectDB.php";
require_once('../vendor/autoload.php');

$dotenv = Dotenv\Dotenv::createImmutable('../');
$dotenv->load();

// Google login
$clientID = $_ENV['CLIENT_ID'];
$secret = $_ENV['CLIENT_SECRET'];
$redirectUri = "http://localhost:8000/profile";

$gclient = new Google_Client();
$gclient->setClientId($clientID);
$gclient->setClientSecret($secret);
$gclient->setRedirectUri($redirectUri);
$gclient->addScope('email');
$gclient->addScope('profile');
 
if(isset($_GET['code'])) {

    $token = $gclient->fetchAccessTokenWithAuthCode($_GET['code']);
    $gclient->setAccessToken($token);

    session_start();
    $_SESSION["loggedin"] = true;
    $_SESSION['ucode'] = $_GET['code'];

    exit;
}

// Regular login
$username = $password = "";
$login_err = "";

if($_SERVER["REQUEST_METHOD"] == "POST") {

    $username = trim($_POST["username"]);
    $password = trim($_POST["password"]);
    
    $sql = "SELECT id, username, password FROM users WHERE username = ?";
    
    if($stmt = mysqli_prepare($conn, $sql)){
        mysqli_stmt_bind_param($stmt, "s", $param_username);
        $param_username = $username;

        if(mysqli_stmt_execute($stmt)){
            mysqli_stmt_store_result($stmt);
            
            if(mysqli_stmt_num_rows($stmt) == 1) {                    
                mysqli_stmt_bind_result($stmt, $id, $username, $hashed_password);

                if(mysqli_stmt_fetch($stmt)){
                    if(password_verify($password, $hashed_password)) {
                        session_start();
                        $_SESSION["loggedin"] = true;                         
                        header("Location: ../profile");
                    } else {
                        $login_err = "Wrong name or password.";
                    }
                }
            } else {
                $login_err = "Wrong name or password.";
            }
        } else {
            echo "Something went wrong, try again!";
        }

        mysqli_stmt_close($stmt);
    }
    
    mysqli_close($conn);
}

?>
 
<!DOCTYPE html>
<html lang="uk">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Log in</title>
    <link rel="stylesheet" href="../styles/main.css">
    <link rel="icon" type="image/x-icon" href="../assets/img/favicon.ico">
</head>
<body>
    <div class="wrapper">
      <header class="header">
        <div class="header__container container">
          <b>Web</b>

          <nav>
            <ul class="navigation">
              <li>
                <a href="/">Main</a>
              </li>
              <li>
                <a href="/about">Request</a>
              </li>
              <li>
                <a href="/contact">Form</a>
              </li>
            </ul>
          </nav>

        <div class="header__account">
          <a href="/signin" class="header__btn">Log in</a>
          <a href="/signup" class="header__btn">Sign up</a>
        </div>
        </div>
      </header>

      <main class="page">
        <h2 class="page__title form__title title">Log in to your account</h2>

        <?php 
          if(!empty($login_err)){
              echo '<div class="alert">' . $login_err . '</div>';
          }
        ?>

        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post" class="form">
            <label for="username">Name:</label>
            <input type="text" id="username" name="username" value="<?php echo $username; ?>" required>

            <label for="password">Password:</label>
            <input type="password" id="password" name="password" value="<?php echo $password; ?>" required>

            <button type="submit" class="button">Log in</button>
            
            <p class="center"><a href="<?= $gclient->createAuthUrl() ?>">Log in with Google</a> </p>

            <p class="prompt">Not yet registered? <a href="/portfolio/register">Create account</a>.</p>
        </form>
      </main>
    </div>    
</body>
</html>
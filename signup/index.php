<?php

require_once "../config/db/connectDB.php";
 
$username = $password = "";
$username_err = $password_err = "";
 
if($_SERVER["REQUEST_METHOD"] == "POST") {

    // Validate username
    if(strlen(trim($_POST["username"])) < 2){
        $username_err = "Name should be at least 2 letters.";
    } else {
        $username = trim($_POST["username"]);
    }
    
    // Validate password
    if(strlen(trim($_POST["password"])) < 6){
        $password_err = "Password should be at least 6 letters.";
    } else {
        $password = trim($_POST["password"]);
    }
    
    // Check for errors
    if(empty($username_err) && empty($password_err)){
        $sql = "INSERT INTO users (username, password) VALUES (?, ?)";
         
        if($stmt = mysqli_prepare($conn, $sql)){
            mysqli_stmt_bind_param($stmt, "ss", $param_username, $param_password);
            
            $param_username = $username;
            $param_password = password_hash($password, PASSWORD_DEFAULT);
            
            if(mysqli_stmt_execute($stmt)){
                session_start();
                $_SESSION["loggedin"] = true;                         
                header("Location: ../profile");
            } else {
                echo "Something went wrong, try again!";
            }
            mysqli_stmt_close($stmt);
        }
    }

    mysqli_close($conn);
}
?>
 
<!DOCTYPE html>
<html lang="uk">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sing up</title>
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
          <a href="/signin" class="header__btn">Sign in</a>
          <a href="/signup" class="header__btn">Sign up</a>
        </div>
        </div>
      </header>

      <main class="page">
        <h2 class="page__title form__title title">Create your account</h2>

        <?php 
          if(!empty($username_err)){
              echo '<div class="alert">' . $username_err . '</div>';
          }
          if(!empty($password_err)){
              echo '<div class="alert">' . $password_err . '</div>';
          }
        ?>

        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post" class="form">
            <label for="username">Name:</label>
            <input type="text" id="username" name="username" value="<?php echo $username; ?>" required>

            <label for="password">Password:</label>
            <input type="password" id="password" name="password" value="<?php echo $password; ?>" required>

            <button type="submit" class="button">Sign up</button>

            <p class="prompt">Already signed up? <a href="/portfolio/login">Log in</a>.</p>
        </form>
      </main>
    </div>    
</body>
</html>
<!DOCTYPE html>
<html lang="uk">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Contact</title>
  <link rel="stylesheet" href="./styles/main.css">
  <link rel="icon" type="image/x-icon" href="../assets/favicon.ico">
</head>
<body>
  <div class="wrapper">

  <header class="header">
    <div class="header__container container">
      <b>WEB</b>

      <nav>
        <ul class="navigation">
          <li>
            <a href="/">Main</a>
          </li>
          <li>
            <a href="/about">Request</a>
          </li>
          <li>
            <a href="/contact" class="active">Form</a>
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
    <h2 class="page__title contact__title title">Contact me</h2>

    <form class="contact" action="/contact/message.php" method="post">
      <label for="name">Name:</label>
      <input type="text" id="name" name="name" required>

      <label for="email">Email:</label>
      <input type="email" id="email" name="email" required>

      <label for="message">Message:</label>
      <textarea id="message" name="message" required></textarea>

      <button type="submit">Send</button>
    </form>
  </main>
  </div>
</body>
</html>
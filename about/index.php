<!DOCTYPE html>
<html lang="uk">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Request</title>
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
            <a href="/about" class="active">Request</a>
          </li>
          <li>
            <a href="/contact">Form</a>
          </li>
        </ul>
      </nav>
    </div>
  </header>

  <main class="page">
    <div class="page__container">
      <section class="page__greeting">
        <h2 class="subtitle title">Demonstration of an AJAX request</h2>
        <p class="page__text_description">
          Click on the button to send a request.<br>
          The information will appear without reloading the page.
        </p>
        <button type="button" class="button">Send a request</button>
      </section>

      <section class="page__greeting">
        <ul id="data"></ul>
      </section>
    </div>
  </main>
  </div>

  <script src="../js/ajax.js"></script>
</body>
</html>
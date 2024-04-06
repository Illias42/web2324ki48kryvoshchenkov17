<!DOCTYPE html>
<html lang="uk">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Main</title>
  <link rel="stylesheet" href="./styles/main.css">
  <link rel="icon" type="image/x-icon" href="./assets/favicon.ico">
</head>
<body>
  <div class="wrapper">

    <header class="header">
      <div class="header__container container">
        <b>WEB</b>
        <nav>
          <ul class="navigation">
            <li>
              <a href="/" class="active">Main</a>
            </li>
            <li>
              <a href="/about">About</a>
            </li>
            <li>
              <a href="/contact">Contacts</a>
            </li>
          </ul>
        </nav>
      </div>
    </header>

    <main class="page">
      <div class="page__container">
        <section class="page__greeting">
          <h1 class="page__title title">Welcome!</h1>
          <p class="page__text">
            This website was created as an assignment for laboratory work #2 from the discipline "Web Programming Technologies".
            <br>
            It will also be used to perform laboratory work #3 and #4.
          </p>

          <h2 class="subtitle title">Brief information</h2>

          <table class="page__table">
            <tbody>
              <tr>
                <td>Student</td>
                <td>Kryvoshchenkov Illia</td>
              </tr>
              <tr>
                <td>Group</td>
                <td>КІ-48</td>
              </tr>
              <tr>
                <td>Technologies</td>
                <td>HTML, CSS, JavaScript, PHP</td>
              </tr>
            </tbody>
          </table>

          <p class="page__text">
            Use the menu above to navigate. Navigation takes place according to the conditions of the task, that is, using the GET method.
            <br>
            Also, other pages demonstrate the operation of AJAX (on the "About Me" page) and the POST method (on the "Contacts" page when sending the form to the server).
          </p>
        </section>
      </div>
    </main>
  </div>
</body>
</html>
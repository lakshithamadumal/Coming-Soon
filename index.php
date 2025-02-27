<?php

session_start();

require "connection.php";
?>
<!DOCTYPE html>

<meta charset="utf-8">


<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Coming Soon</title>

  <!-- Favicons -->
  <link rel="icon" type="image/png" sizes="32x32" href="assets/images/logo.png">
  <link rel="manifest" href="/manifest.json">
  <meta name="theme-color" content="#ffffff">

  <!-- Stylesheets -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/notyf@3/notyf.min.css">
  <link href="assets/lib/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/lib/owl.carousel/dist/assets/owl.carousel.css" rel="stylesheet">
  <link href="assets/css/style.css" rel="stylesheet">
  <link id="color-scheme" href="assets/css/colors/default.css" rel="stylesheet">
</head>

<body>
  <main>
    <section class="main">
      <div class="content">
        <div class="container">
          <div class="content2">
            <h1 class="text-light">Coming Soon Web Page</h1>
            <h3 class="text-light">Official Web Site</h3>
          </div>
          <div class="counter" id="countdown">
            <h2>Launching in Soon
            </h2>
            <div class="row">
              <div class="col-sm-6 col-sm-offset-3">
                <p>This project is designed to let your users know that something exciting is on the way</p>
              </div>
            </div>
          </div>
          <div class="subscribe">
            <div class="row">
              <div class="col-xs-10 col-xs-offset-1 col-sm-4 col-sm-offset-4">
                <form class="subscribe-form" id="subscription-form">
                  <div class="input-group">
                    <input class="form-control notify-me" id="subscriber-email" placeholder="Enter your email address" aria-label="Email address" required>
                    <span class="input-group-addon">
                      <button class="btn btn-default" id="subscribe-button" type="button" onclick="subscribe();" aria-label="Subscribe">Subscribe</button>
                    </span>
                  </div>
                </form>
                <div id="subscription-response"></div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    <div class="dark-footer footer">
      <div class="container text-center">
        <p>Copyright © 2025 Laky</p>
      </div>
    </footer>
    </main>


  <!-- JavaScripts -->
  <script src="assets/lib/jquery/dist/jquery.js"></script>
  <script src="assets/lib/bootstrap/dist/js/bootstrap.min.js"></script>
  <script src="assets/lib/owl.carousel/dist/owl.carousel.js"></script>
  <script src="assets/lib/ajaxchimp/jquery.ajaxchimp.js"></script>
  <script src="assets/js/main.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/notyf@3/notyf.min.js"></script>
</body>

</html>
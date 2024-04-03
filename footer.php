<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Algojo Coffee Shop</title>

  <style>
    body {
      margin: 0;
      padding: 0;
      font-family: Arial, sans-serif;
    }

    #footer {
      background-color: #333;
      padding: 30px 0;
      text-align: center;
      color: #fff;
      width: 100%;
    }

    #footer h3 {
      font-size: 24px;
    }

    #footer p {
      font-size: 14px;
      line-height: 24px;
    }

    .social-links a {
      display: inline-block;
      background-color: #555;
      color: #fff;
      border-radius: 50%;
      line-height: 1;
      margin: 0 5px;
      padding: 10px;
      transition: 0.3s;
      text-decoration: none;
    }

    .social-links a:hover {
      background-color: #111;
    }

    .social-links a::after {
      content: attr(data-name);
      display: block;
      margin-top: 5px;
    }

    #copyright {
      font-size: 12px;
      margin-top: 30px;
    }
  </style>
</head>

<body>

  <!-- ======= Footer ======= -->
  <footer id="footer">
    <div class="container">
      <h3>Algojo Coffee Shop</h3>
      <p>Bring you happiness to give you a very sweet smile.</p>
      <div class="social-links">
        <a href="https://twitter.com/?lang=en" class="twitter" data-name="Twitter"></a>
        <a href="https://www.facebook.com/" class="facebook" data-name="Facebook"></a>
        <a href="https://www.instagram.com/" class="instagram" data-name="Instagram"></a>
        <a href="https://www.linkedin.com/" class="linkedin" data-name="LinkedIn"></a>
      </div>
      <div id="copyright">
        &copy; 2023 Algojo Cafe. All rights reserved.
      </div>
    </div>
  </footer><!-- End Footer -->

</body>

</html>

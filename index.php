<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.gstatic.com" />
    <link
      href="https://fonts.googleapis.com/css2?family=Rubik:wght@400;500;600;700&display=swap"
      rel="stylesheet"
    />
    <link rel="stylesheet" type="text/css" href="css/styles.css">
    <script
      type="module"
      src="https://unpkg.com/ionicons@5.4.0/dist/ionicons/ionicons.esm.js"
    ></script>
    <script
      nomodule=""
      src="https://unpkg.com/ionicons@5.4.0/dist/ionicons/ionicons.js"
    ></script>
    <title>Online Ticketing</title>
</head>
<body>
  <?php
  include "php/auth.php";
  ?>
    <main>
        <section class="section-hero">
            <div class="hero">
                  <img src="weblogo.png" class="logo" alt="logo">
                <div class="hero-text">
                  <h1 class="heading-primary">
                      Online Traffic Ticketing Portal
                  </h1>
                </div>
                <form action="" method="POST">
                  
                  <div class="cta-form">
                    <div>
                      <label for="number">Client Number/Username:</label>
                      <input 
                      name="username"
                      id="client"
                      type="text"
                      required
                      />
                    </div>
                    <div>
                      <label for="password">Password:</label>
                      <input
                        name="password"
                        id="password"
                        type="password"
                        required
                      />
                      
                    </div>
                    <div>
                      <?php 
                      $url = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
                    
                      if(strpos($url, "login=expired") == true){
                        echo "<h1 class='error'> Please Login </h1>";
                      }

                      elseif(strpos($url, "login=incorrect") == true){
                        echo "<h1 class='error'> Wrong username/password combination! </h1>";
                      }
                      ?>
                    </div>
                    
                    <button type="submit" name="login" class="btn btn--form">Log in</button>
                    </div>
                  </div>
                </form>
            </div>
        </section>
    </main>
</body>
<script src="js/script.js"></script>
</html>
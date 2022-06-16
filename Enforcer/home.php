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
    <link rel="stylesheet" type="text/css" href="../css/styles.css">
    <script
      type="module"
      src="https://unpkg.com/ionicons@5.4.0/dist/ionicons/ionicons.esm.js"
    ></script>
    <script
      nomodule=""
      src="https://unpkg.com/ionicons@5.4.0/dist/ionicons/ionicons.js"
    ></script>
    <script src="../instascan.min.js"></script>
    <title>Enforcer</title>
</head>
<body>
  <?php include('../php/auth.php');  include('../php/get_profile.php');?>
    <main>
        <section class="section-hero">
            <div class="hero hero--enforcer">
                <div class="hero-text">
                  <h1 class="heading-primary-small">
                      Enforcer:
                  </h1>
                  <h3 class="heading-tertiary-small">
                  <?php echo $fname . " " . $lname?>
                  </h3>
                </div>
                <form action="" method="POST">
                  
                  <div class="cta-form">
                    <div>
                      <label for="violation">VIOLATION</label>
                          <select id="violation" name='violation'>
                              <option value="">Please choose one option:</option>
                              <option value="Obstruction">Obstruction</option>
                              <option value="Beating the Red Light">Beating the Red Light</option>
                              <option value="Colorum violation">Colorum violation</option>
                              <option value="Axle overloading">Axle overloading</option>
                              <option value="Driving w/o License">Driving w/o License</option>
                              <option value="No Helmet">No Helmet</option>
                              <option value="Reckless Driving">Reckless Driving</option>
                              <option value="Unregistered vehicle">Unregistered vehicle</option>
                              <option value="Trip-cutting">Trip-cutting</option>
                              <option value="Smoke-belching">Smoke-belching</option>
                          </select>
                      </div>
                    <div>
                      <label for="violation">CLIENT ID:</label>
                      <input type="text" class='qr' id='qr' name='clientID'/>
                      <button type="button" class="icon-qr" onclick="hideShow()"><ion-icon  name="qr-code"></ion-icon></button>
                    </div>
                    <div>
                      <?php 
                      $url = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
                      
                      if(strpos($url, "submit=none") == true){
                        
                        echo "<h1 class='error'>Violation/Client ID Missing!</h1>";
                      }
                      elseif(strpos($url, "submit=not") == true){
                        echo "<h1 class='error'> Client not found! </h1>";
                      }
                      elseif(strpos($url, "submit=success") == true){
                        echo "<h1 class='error'> Violation Recorded! </h1>";
                      }

                      
                      ?>
                    </div>
                    <video id="preview"></video>
                    <button type="submit" name="save" class="btn btn--form">Submit</button>
                      <button type="submit" name="logout" class="btn btn--log">
                          <ion-icon name="log-out-outline"></ion-icon>
                          Logout
                    </div>
                    </div>
                  </div>
                </form>
            </div>
        </section>
    </main>
</body>

<script type="text/javascript">
var x = document.getElementById("preview");
let scanner = new Instascan.Scanner({ video: document.getElementById('preview') });
scanner.addListener('scan', function (content) {
  
  document.getElementById("qr").value = content;
  x.style.display = "none";
  scanner.stop()
  });
  

  function hideShow() {
  
  if (x.style.display === "none") {
    x.style.display = "block";
    Instascan.Camera.getCameras().then(function (cameras) {
    if (cameras.length > 0) {
    scanner.start(cameras[1]);
                            
    } else {
    console.error('No cameras found.');
    }
  }).catch(function (e) {
    console.error(e);
  });

  } else {
    x.style.display = "none";
    scanner.stop()
  }
}
</script>

</html>
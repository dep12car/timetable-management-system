<?php
session_start();
//$_SESSION["admin"] = "Deepak Cardoza";
if (isset($_SESSION["admin"])) {
  //Get details
} else {
  header("Location: ./login.php");
}


?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login | Admin</title>

  <!-- ----------------------------------------- CSS ---------------------------------------------->
  <link rel="stylesheet" href="css/index.css" type="text/css">

  <!-- ----------------------------------------- JS ----------------------------------------------->
  <script src="js/jquery-3.6.0.min.js"></script>
  <script src="js/jquery.js"></script>

  <!-- ----------------------------------------- BootStrap ---------------------------------------------->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

  <!-- ----------------------------------------- Icons ---------------------------------------------->
  <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
  <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
</head>

<body>
  <nav class="navbar sticky-top navbar-expand-lg navbar-dark bg-dark" id="navmenu">
    <div class="container-fluid">
      <img src="Images/sjec-logo.png" width="50"> &nbsp; &nbsp;
      <a class="navbar-brand" href="#"><span class="heading"> TMS </span></a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse text-right custom-nav" style="padding-right: 100px;" id="navbarSupportedContent">
        <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
          <li class="nav-item">
            <a class="nav-link active" id="mhome" data-menu-section="home" aria-current="page" href="#" onclick="menuActive(this)">TMS Dashboard</a>
          </li>
          <!-- <li class="nav-item">
            <a class="nav-link" id="mabout" data-menu-section="about" href="#about" onclick="menuActive(this)">Manage Courses</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" id="mservices" data-menu-section="services" href="#services" onclick="menuActive(this)">Manage Faculty</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" id="mcontact" data-menu-section="contact" href="#contact" onclick="menuActive(this)">View TT</a>
          </li> -->
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" id="mprojects" data-menu-section="projects" href="javascript:void(0)" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false" onclick="menuActive(this)">
              <?php echo $_SESSION["user"] ?> 
            </a>
            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
              <li><a class="dropdown-item" href="logout.php">Log Out</a></li>
            </ul>
          </li>
        </ul>

      </div>
    </div>
  </nav>
  <div class="container main ">
    <?php
    include('dbconnection.php');
    //print_r($conn);           
    ?>
    <br><br>
    <div class="choose">
      <div class="row">
        <div class="col-sm-6">
          <label for="courses" class="form-label">Choose Courses*</label>
          <select class="form-select" id="courses" aria-label="Default select example">
            <?php
            $stmt = $con->prepare("SELECT * FROM `course`");
            $stmt->execute();

            $result = $stmt->fetchAll();

            foreach ($result as $row) {
            ?>
              <option value="<?php echo $row['Course_ID']; ?>"><?php echo $row['Branch'] ?> <?php echo $row['Semester']; ?></option>
            <?php
            }
            ?>
          </select>
          <br>

        </div>

        <div class="col-sm-6">
          <label for="slots" class="form-label">Choose Slots*</label>
          <select class="form-select" id="slots" aria-label="Default select example">
            <?php
            $stmt = $con->prepare("SELECT * FROM `slots`");
            $stmt->execute();

            $result = $stmt->fetchAll();

            foreach ($result as $row) {
            ?>
              <option value="<?php echo $row['Slot_ID']; ?>"><?php echo $row['Slot_ID']; ?></option>
            <?php
            }
            ?>
          </select><br>

        </div>
      </div>
      <div class="row">
        <div class="col-sm-12">
          <center>
            <button type="button" name="get" id="get" class="btn btn-success">Get Data</button>
          </center>
        </div>
      </div>
      <br>
      <div class="row">
        <div class="col-sm-6" id="selcou">
          <!-- <center> -->
          <h6>Selected Courses</h6>
          <div class="col-sm-12" id="cou">
            <!-- Rendered from Jquery and Database <!-->
          </div>
          <!-- <center> -->
        </div>

        <div class="col-sm-6">
          <!-- <center> -->
          <div class="row">
            <div class="col-sm-6" id="selslo">
              <!-- <center> -->
              <h6>Selected Slot</h6>
              <div class="col-sm-12" id="slo">
                <!-- Rendered from Jquery and Database <!-->
              </div>
            </div>
            <div class="col-sm-6" id="sellab">
              <!-- <center> -->
              <h6>Labs (Afternoon Slots) </h6>
              <div class="col-sm-12" id="lab">
                <!-- Rendered from Jquery and Database <!-->
              </div>
            </div>
          </div>
        </div>
        <div class="row" id="timetable">
          <div class="col-sm-12">
            <h3 align="center">Time Table - I Sem MCA</h3>
            <script>
              var timetable = new Array();
              timetable = JSON.parse(sessionStorage.getItem('timetable'));
              //alert(timetable);
              console.log(timetable);
            </script>
            <div class="container">
              <!-- <div class="timetable-img text-center">
            <img src="img/content/timetable.png" alt="">
        </div> -->
              <div class="table-responsive">
                <table border="1" class="table table-bordered text-center">
                  <thead>
                    <tr class="bg-light-gray">
                      <th class="text-uppercase">Time
                      </th>
                      <th class="text-uppercase">9.00 - 9.55</th>
                      <th class="text-uppercase">9.55 - 10.50</th>
                      <th class="text-uppercase">11.10 - 12.05</th>
                      <th class="text-uppercase">12.05 - 1.00</th>
                      <th class="text-uppercase">1.00 - 2.00</th>
                      <th class="text-uppercase">2.00 - 3.00</th>
                      <th class="text-uppercase">3.00 -4.00</th>
                      <th class="text-uppercase">4.00 - 5.00</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <th class="align-middle bg-light-gray">Monday</th>
                      <td id="D1S1">
                        <span id="D1S1" class="bg-pink padding-5px-tb padding-15px-lr border-radius-5 margin-10px-bottom text-white font-size16  xs-font-size13"></span>
                        <!-- <div class="margin-10px-top font-size14">1:00-2:00</div>
                        <div class="font-size13 text-light-gray">James Smith</div> -->
                      </td>
                      <td id="D1S2">
                        <span id="D1S2" class="bg-yellow padding-5px-tb padding-15px-lr border-radius-5 margin-10px-bottom text-white font-size16  xs-font-size13"></span>
                      </td>
                      <td id="D1S3">
                      <span id="D1S2" class="bg-yellow padding-5px-tb padding-15px-lr border-radius-5 margin-10px-bottom text-white font-size16  xs-font-size13"></span>
                      </td>
                      <td id="D1S4">

                      </td>
                      <td id="Lunch" rowspan="6" style="vertical-align:middle;">
                      <span class="bg-green padding-5px-tb padding-15px-lr border-radius-5 margin-10px-bottom text-white font-size16  xs-font-size13">LUNCH BREAK</span>
                         
                      </td>
                      <td id="D1S5" colspan="3"> </td>
                      <!-- <td id="D1S6"> </td>
                      <td id="D1S7"></td> -->
                    </tr>

                    <tr>
                      <th class="align-middle bg-light-gray">Tuesday</th>
                      <td id="D2S1">

                      </td>
                      <td id="D2S2">

                      </td>
                      <td id="D2S3">

                      </td>
                      <td id="D2S4">

                      </td>
                      <!-- <td id="Lunch"> </td> -->
                      <td id="D2S5" colspan="3"> </td>
                      <!-- <td id="D1S6"> </td>
                      <td id="D1S7"></td> -->
                    </tr>

                    <tr>
                      <th class="align-middle bg-light-gray">Wednesday</th>
                      <td id="D3S1">

                      </td>
                      <td id="D3S2">

                      </td>
                      <td id="D3S3">

                      </td>
                      <td id="D3S4">

                      </td>
                      <!-- <td id="Lunch"> </td> -->
                      <td id="D3S5" colspan="3"> </td>
                      <!-- <td id="D3S6"> </td>
                      <td id="D3S7"></td> -->

                    </tr>

                    <tr>
                      <th class="align-middle bg-light-gray">Thursday</th>
                      <td id="D4S1">

                      </td>
                      <td id="D4S2">

                      </td>
                      <td id="D4S3">

                      </td>
                      <td id="D4S4">

                      </td>
                      <!-- <td id="Lunch"> </td> -->
                      <td id="D4S5" colspan="3"> </td>
                      <!-- <td id="D4S6"> </td>
                      <td id="D4S7"></td> -->
                    </tr>
                    <tr>
                      <th class="align-middle bg-light-gray">Friday</th>
                      <td id="D5S1">

                      </td>
                      <td id="D5S2">

                      </td>
                      <td id="D5S3">

                      </td>
                      <td id="D5S4">

                      </td>
                      <!-- <td id="Lunch"></td> -->
                        
                      <td id="D5S5" colspan="3"> </td>
                      <!-- <td id="D5S6"> </td>
                      <td id="D5S7"></td> -->
                    </tr>

                    <tr>
                      <th class="align-middle bg-light-gray">Saturday</th>
                      <td id="D6S1">

                      </td>
                      <td id="D6S2">

                      </td>
                      <td id="D6S3">

                      </td>
                      <td id="D6S4">

                      </td>
                      <!-- <td id="Lunch"> </td> -->
                      <td id="D6S5" colspan="3"> </td>
                      <!-- <td id="D6S6"> </td>
                      <td id="D6S7"></td> -->
                    </tr>
                    <!-- <tr>
                      <th class="align-middle">Sunday</th>
                      <td>
                        <span class="bg-pink padding-5px-tb padding-15px-lr border-radius-5 margin-10px-bottom text-white font-size16  xs-font-size13">English</span>
                        <div class="margin-10px-top font-size14">1:00-2:00</div>
                        <div class="font-size13 text-light-gray">James Smith</div>
                      </td>
                      <td>
                        <span class="bg-yellow padding-5px-tb padding-15px-lr border-radius-5 margin-10px-bottom text-white font-size16  xs-font-size13">Music</span>
                        <div class="margin-10px-top font-size14">1:00-2:00</div>
                        <div class="font-size13 text-light-gray">Ivana Wong</div>
                      </td>
                      <td>
                        <span class="bg-yellow padding-5px-tb padding-15px-lr border-radius-5 margin-10px-bottom text-white font-size16  xs-font-size13">Music</span>
                        <div class="margin-10px-top font-size14">1:00-2:00</div>
                        <div class="font-size13 text-light-gray">Ivana Wong</div>
                      </td>


                      <td>
                        <span class="bg-pink padding-5px-tb padding-15px-lr border-radius-5 margin-10px-bottom text-white font-size16  xs-font-size13">English</span>
                        <div class="margin-10px-top font-size14">1:00-2:00</div>
                        <div class="font-size13 text-light-gray">James Smith</div>
                      </td>
                      <td>
                        <span class="bg-green padding-5px-tb padding-15px-lr border-radius-5 margin-10px-bottom text-white font-size16  xs-font-size13">LUNCH BREAK</span>
                        <div class="margin-10px-top font-size14">1:00-2:00</div>

                      </td>
                      <td>
                        <span class="bg-yellow padding-5px-tb padding-15px-lr border-radius-5 margin-10px-bottom text-white font-size16  xs-font-size13">Music</span>
                        <div class="margin-10px-top font-size14">1:00-2:00</div>
                        <div class="font-size13 text-light-gray">Ivana Wong</div>
                      </td>

                      <td>
                        <span class="bg-yellow padding-5px-tb padding-15px-lr border-radius-5 margin-10px-bottom text-white font-size16  xs-font-size13">Music</span>
                        <div class="margin-10px-top font-size14">1:00-2:00</div>
                        <div class="font-size13 text-light-gray">Ivana Wong</div>
                      </td>

                      <td>
                        <span class="bg-yellow padding-5px-tb padding-15px-lr border-radius-5 margin-10px-bottom text-white font-size16  xs-font-size13">Music</span>
                        <div class="margin-10px-top font-size14">1:00-2:00</div>
                        <div class="font-size13 text-light-gray">Ivana Wong</div>
                      </td>
                    </tr>
                    </tr> -->
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
        <br>
        <div class="row">
          <div class="col-sm-12">
            <center>
              <button type="button" name="generate" id="generate" class="btn btn-success" disabled>Generate Time Table</button>
            </center>
          </div>
        </div>
        <br><br>
        <div class="row">
          <div class="col-sm-12">
            <center>
              <button type="button" name="generate" id="save" class="btn btn-success">
              Save & Print
            </button>
            </center>
          </div>
        </div>
      </div>
      <br>

      <script>
        function showPassword() {
          var password_field = document.getElementById('password');
          var eye1 = document.getElementById('eye1');
          var eye2 = document.getElementById('eye2');

          if (password_field.type === "password") {
            password_field.type = "text";
            eye1.style.display = "none";
            eye2.style.display = "inline-block";
          } else {
            password_field.type = "password";
            eye1.style.display = "inline-block";
            eye2.style.display = "none";
          }
        }
      </script>

      <?php
      $conn = null;
      ?>
</body>

</html>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>

    <!-- ----------------------------------------- CSS ---------------------------------------------->
    <link rel="stylesheet" type="text/css" href="css/login.css?v=270220220357">
    <link rel="stylesheet" type="text/css" href="css/responsive.css?v=270220220357">
    
    <!-- ----------------------------------------- BootStrap ---------------------------------------------->
    <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p"
        crossorigin="anonymous"></script> -->

    <!-- ----------------------------------------- Icons ---------------------------------------------->
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
    
</head>
<body>
    <section>
        <div class="contentBx">
            <div class="formBx">
                <h2>TMS - Login</h2>
                <form method="POST">
                    <div class="inputBx">
                        <span>Email</span>
                        <ion-icon class="user-icon" name="mail-open"></ion-icon>
                        <input type="email" placeholder="Email ID" name="email" id="email" required>
                    </div>
                    <div class="inputBx">
                        <span>Password</span>
                        <ion-icon class="pass-icon" name="lock-closed"></ion-icon>
                        <input type="password" placeholder="Password" name="password" id="password" required>
                        <ion-icon class="eye1" id="eye1" name="eye" onclick="showPassword()"></ion-icon>
                        <ion-icon class="eye2" id="eye2" name="eye-off" onclick="showPassword()"></ion-icon>
                    </div>
                    <!-- <div class="remember">
                        <p><a href="/forgot-password">Forgot Password?</a></p>
                    </div> -->
                    <div class="inputBx">
                        <button type="submit" name="submit" id="submit">
                        Sign In
                        <ion-icon style="margin-bottom: -2px;font-size: 18px;" name="person"></ion-icon>
                        </button>
                    </div>
                    <!-- <div class="inputBx">
                        <p>Don't have an account? <a href="#">Sign Up</a></p>
                    </div> -->
                </form>
            </div>
        </div>
        <div class="imgBX">
            <img src="Images/login.png" alt="Login Image">
        </div>
    </section>
    <?php
    include('dbconnection.php');

    if (isset($_POST["submit"])) {
        $email = $_POST["email"];
        $password = $_POST["password"];

        $query = "SELECT * FROM `admin` WHERE `Email`=:email AND `Password`=:password;";
        $stmt = $con->prepare($query);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':password', $password);
        $stmt->execute();
        $data = $stmt->fetchAll(PDO::FETCH_ASSOC);
        print_r($data);
        session_start();
        if ($stmt->rowCount() > 0) {
            foreach ($data as $row) {
                if ($email == $row["Email"] && $password == $row["Password"]) {
                    $_SESSION["admin"] =$row["Email"];
                    $_SESSION["user"] =$row["Name"];
                    header("Location: ./index.php");
                    die("Success");
                } else {
                    echo "<script>alert('Invalid Login Credentials');</script>";
                }
            }
        } else {
            echo "<script>alert('Invalid Login Credentials');</script>";
        }
    }
    ?>
    <script>
        function showPassword()
        {
            var password_field = document.getElementById('password');
            var eye1 = document.getElementById('eye1');
            var eye2 = document.getElementById('eye2');

            if(password_field.type==="password")
            {
                password_field.type="text";
                eye1.style.display="none";
                eye2.style.display="inline-block";
            }
            else
            {
                password_field.type="password";
                eye1.style.display="inline-block";
                eye2.style.display="none";
            }
        }
    </script>
    
</body>
</html>
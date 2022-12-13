<?php

if(isset($_POST['login']))
    {
        $email = $_POST['email'];
        $passsword = $_POST['psw'];
        $email_err="";
        $password_err="";
        require_once "config.php";


        $sql = "SELECT * FROM mysignup WHERE email='$email' AND password='$passsword'";

        $result = $con->query($sql);

        if ($result->num_rows > 0)  {

            while($row = $result->fetch_assoc()) {

            if ($row['email'] === $email && $row['password'] === $_POST['psw']) {

                echo "Logged in!";
    } } }
    else {
        echo "Your credentials are not correct! Please try again!";
    }


    }

    ?>
    <!DOCTYPE html>
  <html>
    <head></head>
    <body>
      <p>
        Return back to the main page by clicking the left arrow</p>

            </body>
            </html>
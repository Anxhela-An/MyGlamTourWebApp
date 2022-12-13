<?php

if(isset($_POST['signup']))
    {
        $email = $_POST['email'];
        $uname = $_POST['username'];
        $passsword = $_POST['psw'];
        $confirm_password=$_POST['confirmpsw'];
        $email_err="";
        $uname_err="";
        $password_err="";
        $confirm_password_err="";

        require_once "config.php";
        
        if(!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $email_err = "Use the email pattern like in the placeholder!";
            echo "$email_err";
         
           }

        if(empty($email_err))
                {
                 $sql = "SELECT id FROM mysignup where email='$email'";
                 $result = $con->query($sql);
                 
                if ($result->num_rows > 0) {
                   while($row = $result->fetch_assoc()) {
                     $email_err= "This email already exists. Continue with login or use a different email address!";
                     echo "$email_err";
           
                   }
                 }
            }
        if(!preg_match('/^[a-zA-Z0-9_]+$/', trim($uname)) && empty($email_err)){
                $uname_err = "Username can only contain letters, numbers, and underscores.";
                echo "$uname_err";
            } 
        if(empty($uname_err) && empty($email_err))
        {
            $sql = "SELECT id FROM mysignup where username='$uname'";
            $result = $con->query($sql);
            
            if ($result->num_rows > 0) {
              while($row = $result->fetch_assoc()) {
                $uname_err= "This username is taken. Please try another one!";
                echo "This username is taken. Please try another one!";
  
              }
            } }

            if((strlen($_POST['psw']) < 6) && empty($email_err) && empty($uname_err)) 
            {
                    $password_err = "Password must have atleast 6 characters.";
                    echo "$password_err";

            }

            if(empty($email_err) && empty($uname_err) && empty($password_err) && ($_POST['psw'] != $_POST['confirmpsw']))
                    {
                        $confirm_password_err = "Password did not match.";
                        echo "$confirm_password_err";
                    }
            
            if(empty($email_err) && empty($uname_err) && empty($password_err) && empty($confirm_password_err))
            
            {    $sql = "INSERT INTO mysignup (email, username, password) VALUES ('$email', '$uname','$passsword')";
                        //fire query to save entries and check it with if statement
                      $rs = mysqli_query($con, $sql);
                         if($rs)
                         {
                               echo "Your account has been created successfully!";
                          }
          
                           else{echo "Error, the account is not created! Something's Wrong."; 

                           }
//connection closed.
                       mysqli_close($con); 
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


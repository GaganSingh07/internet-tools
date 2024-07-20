
<?php 
    require_once './includes/header.php';
    require_once './db/conn.php';
    session_start();

    if($_SERVER["REQUEST_METHOD"]== "POST"){
        //Create variables for user inputs
        $email = $_POST['mail'];
        $password = $_POST['password'];
        $fname = $_POST['fname'];
        $lname = $_POST['lname'];
        $cnfrm_password = $_POST['cnfrm-password'];
        try{
            if($password===$cnfrm_password){
                $sql = "INSERT INTO user (email_id,password,first_name, last_name) VALUES ('$email', '$password', '$fname', '$lname')";
                if (mysqli_query($conn, $sql)) {
                    $_SESSION['message']="User Added Successfully!";
                    $_SESSION['loggedin']=true;
                    $_SESSION['email'] = $email;
                    header("Location: ./php/register.php");
                    exit();
                } else {
                    $_SESSION['message']="User already exists!";
                    header("Location: ./php/register.php");
                    exit();
                }
        
            }else{
                $_SESSION['message']="Password does not match!";
                header("Location: ./php/register.php");
            }
        }
        catch (mysqli_sql_exception $e) {
            $_SESSION['message']="User already exists!";
            header("Location: ./php/register.php");
            exit();
        }
    }
    
 ?>


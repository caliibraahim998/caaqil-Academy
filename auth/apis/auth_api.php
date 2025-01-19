<?php  
header('ContentType: application/json');
include("../../admin/config/conn.php");
//Import PHPMailer classes into the global namespace
//These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
// use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

//Load Composer's autoloader
require '../../vendor/autoload.php';

function SEND_EMAIL($user_name,$email,$token){
//Create an instance; passing `true` enables exceptions
$mail = new PHPMailer(true);

try {
    //Server settings
    $mail->SMTPDebug = 0;                      //Enable verbose debug output
    $mail->isSMTP();                                            //Send using SMTP
    $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
    $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
    $mail->Username   = 'caliibraahim998@gmail.com';                     //SMTP username
    $mail->Password   = 'uvtd njwo jhbg uzoi';                               //SMTP password
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
    $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

    //Recipients
    $mail->setFrom('caliibraahim998@gmail.com', 'School Management');
    $mail->addAddress($email, $user_name);     //Add a recipient

    //Content
    $mail->isHTML(true);                                  //Set email format to HTML
    $mail->Subject = '🔔Email Verification From School Management';
    $mail->Body    = '<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Email Verification</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #3478f7;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }
        .container {
            background-color: #ffffff;
            width: 400px;
            border-radius: 8px;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
            text-align: center;
        }
        .container img {
            width: 150px;
            margin-bottom: 20px;
        }
        .container h2 {
            color: #333333;
            font-size: 20px;
            margin-bottom: 20px;
        }
        .container p {
            color: #555555;
            font-size: 16px;
            line-height: 1.5;
            margin-bottom: 20px;
        }
        .container a {
            display: inline-block;
            background-color: #3478f7;
            color: #ffffff;
            text-decoration: none;
            padding: 10px 20px;
            border-radius: 4px;
            font-size: 16px;
        }
        .container a:hover {
            background-color: #245ab3;
        }
        .container .link {
            color: #888888;
            font-size: 14px;
            margin-top: 20px;
            display: block;
            word-break: break-all;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="icon">&#128276;</div>
        <h2>Verify your Email</h2>
        <p>Please  verify  Your Email To Complate Your  Registration my page.<br>
        Please verify this email address by clicking the button below.</p>
        <a href="http://localhost/admin_pannel/auth/verify.php?token='.$token.'" class="primary-btn">Verify;&nbsp;</a>
      <div class="footer">
      If You Dont Order This Request Dont Verify This  Email Verification
      </div>
      <div class="copyright">
      &copy; 2024-'. Date("Y").' Cali Ibraahim , All Rights Reserved.
      </div>
    </div>
</body>
</html>
';
    // $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

   
    $mail->send();
    echo json_encode(
        ["status" =>"success","message" =>"Successfully Registered To Complete Your Registration Please Verify Your Email We send Email InTO This ($email)"]);
} catch (Exception $e) {
    echo json_encode(
        ["status"=>"error", "message"=> "message could not be sent. Mailer Error: {$mail->ErrorInfo}"]) ;
}
}


// Making Action Start Here
if(isset($_POST['action'])){
    $action = $_POST['action'];
    if(function_exists($action)){
        $action($conn);
    }
    else{
        echo json_encode(['status' => 'error', 'message' =>'invalid action']);
    }
}
else{
    echo json_encode(['status' => 'error', 'message' =>'Action is Required']);
}
// Making Action end Here

// Registeration Start Here
function regf($conn){
    if(isset($_POST['regf']) && $_POST['regf'] == 'Caaqil123'){
        extract($_POST);
        // Form Validation
       if(empty($user_name) || empty($email) || empty($password) || empty($cPassword)){
        echo json_encode(['status' => 'error', 'message' =>'All Feilds are required']);
       }
       else{
        $read_old=mysqli_query($conn, "SELECT * FROM  users WHERE email = '$email' AND token = 'verified'");
        if($read_old && mysqli_num_rows($read_old)>0){
            echo json_encode(['status' => 'error', 'message' =>'This Email is already Exists!']);

        }
        else{
            $read_old_2=mysqli_query($conn, "SELECT * FROM users WHERE email='$email' AND token != 'verified'");
            if($read_old_2 && mysqli_num_rows($read_old_2)>0){
                echo json_encode(['status' => 'error', 'message' =>'This Email is Not Verified Please Verify The Email We sent Into Your Email Address!']);
            }
            else if($password == $cPassword){
                $token=md5(rand());
                $hashPassword=password_hash($password,PASSWORD_DEFAULT);
                $register=mysqli_query($conn, " INSERT INTO users(username,email,user_password,token,user_image)VALUES('$user_name','$email','$hashPassword','$token','../../admin/images/user.png')");
                if($register){
                    SEND_EMAIL($user_name,$email,$token);
                    echo json_encode(['status' => 'success','message' => 'Successfully registered']);
                }
                else{
                    echo json_encode(['status' => 'error', 'message' =>'Something went wrong When Your Making Registration']);

                }
            }else{
                echo json_encode(['status' => 'error', 'message' =>'Password And Confirm Password Are Not Match']);

            }
        }
       }
    }else{
        echo json_encode(['status' => 'error', 'message' =>'Invalid Regsiter And Password Is Required']);

    }
}
// Registeration End Here
// Login  star Here
function login($conn){
    if(isset($_POST['login']) && $_POST['login'] == 'Caaqil123'){
        extract($_POST);
        // Form Validation
        if(empty($email) || empty($password)){
            echo json_encode(['status' => 'error', 'message' =>'All Feilds Are Required']);
        }
        else{
            $read=mysqli_query($conn, "SELECT * FROM  users WHERE email='$email' AND token='verified'");
            if($read && mysqli_num_rows($read)>0){
                $row=mysqli_fetch_array($read);
                $hashPassword=$row['user_password'];
                if(password_verify($password,$hashPassword)){

                    $_SESSION['id']=$row['id'];
                    $_SESSION['activeUser']=true;
                   echo json_encode(["status"=> "success", "message"=> "successfully Loged in!"]);
                }
                else{
                    echo json_encode(['status' => 'error', 'message' =>'Wrong Password']);
                }
            }else{
                echo json_encode(['status' => 'error', 'message'=>'Email is not verified Please verify the Email We Send Into the Email Address']); 
            }
        }
    }else{
        echo json_encode(['status' => 'error', 'message' =>' Invalid Login And Login Password Is required']);
    }
}
// Login  End Here
?>
<?php
include("../admin/config/conn.php");
if(isset($_GET['token'])){
    $token = $_GET['token'];
    $read_token=mysqli_query($conn, "SELECT * FROM users WHERE token='$token'");
    if($read_token && mysqli_num_rows($read_token)){
        $row_token=mysqli_fetch_array($read_token);
        $update_token=mysqli_query($conn, "UPDATE users SET token='verified' WHERE token='$token'");
        if($update_token){
           ?>
                    <!DOCTYPE html>
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
            width: 450px;
            height: 350px;
            border-radius: 8px;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
            text-align: center;
        }
        .container img {
            width: 150px;
            margin-bottom: 20px;
        }
        .container h2 {
            color: #3478f7;
            font-size: 16px;
            margin-bottom: 20px;
        }
        .container p {
            color: #555555;
            font-size: 14px;
            line-height: 1.5;
            margin-bottom: 20px;
        }
        .container a {
            display: inline-block;
            background-color: #3478f7;
            color: #ffffff;
            text-decoration: none;
            padding: 6px 40px;
            margin-top: 10px;
            border-radius: 10px;
            font-size: 18px;
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
        <div style="margin-top: 10px; font-size:xx-large;" class="icon">&#128525;</div>
        <h2>Hey  Welcome To Our Company Abdihouse </h2>
        <p>Thanks For Your Veryfing Your Email Please Wait A Few Hours To Accept Your Registration Request!<br>
        <a href="https://wa.link/6hknrb" target="_blank" class="primary-btn">&#128222;&nbsp; Contact Us</a>
      <div style="font-size: 12px; font-weight: 600; margin:10px;" class="footer">
      If You Dont Order This Request Dont Verify it. If You Verify This You Can Accept <br />
       Our Privacy Policy.
      </div>
      <div style="margin-top: 35px; font-size: 11px;" class="copyright">
      &copy; 2024-<?php echo Date("Y")?> Ali, All Rights Reserved.
      </div>
    </div>
</body>
</html>
           <?php
        }
        else{
            ?>
                      <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Email Verification</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: darkRed;
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
            height: 300px;
            border-radius: 8px;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
            text-align: center;
        }
        .container img {
            width: 150px;
            margin-bottom: 20px;
        }
        .container h2 {
            color: darkRed;
            font-size: 16px;
            margin-bottom: 20px;
        }
        .container p {
            color: #555555;
            font-size: 14px;
            line-height: 1.5;
            margin-bottom: 20px;
        }
        .container a {
            display: inline-block;
            background-color: darkRed;
            color: #ffffff;
            text-decoration: none;
            padding: 6px 40px;
            margin-top: 10px;
            border-radius: 10px;
            font-size: 18px;
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
        <div style="margin-top: 10px; font-size:xx-large;" class="icon">&#128514;</div>
        <h2>I  Am Sorry ! </h2>
        <p>Token Is Expired And New Token Is Required<br>
        <a href="https://wa.link/6hknrb" target="_blank" class="primary-btn">&#128222;&nbsp; Contact Us</a>
      <div style="margin-top: 35px; font-size: 11px;" class="copyright">
      &copy; 2024-<?php echo Date("Y")?> Abdihouse, All Rights Reserved.
      </div>
    </div>
</body>
</html>
            <?php
        }
    }
    else{
        header("Location:./");
    }
}



?>
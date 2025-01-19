
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Pannel</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="side-menu">
        <div class="brand-name">
            <h1>School Management</h1>
        </div>
        <ul>
            <li> <img src="images/dashboard (2).png" alt="search.."> &nbsp; <span><a href="../admin/">Dashboard</a></span> </li>
            <li> <img src="images/reading-book (1).png" alt="search.."> &nbsp; <span><a href="students.php">Students</a></span> </li>
            <li> <img src="images/teacher2.png" alt="search.."> &nbsp; <span><a href="teachers.php">Teachers</a></span> </li>
            <li> <img src="images/school.png" alt="search.."> &nbsp; <span><a href="schools.php">Schools</a></span> </li>
            <li> <img src="images/payment.png" alt="search.."> &nbsp; <span>Income</span> </li>
            <li> <img src="images/help-web-button.png" alt="search..">&nbsp; <span>Help</span></li>
            <li> <img src="images/settings.png" alt="search.."> &nbsp; <span>Settings</span> </li>
        </ul>
    </div>
    <div class="container">
        <div class="header">
            <div class="nav">
                <div class="search">
                    <input type="text" placeholder="search...">
                    <button type="submit"><img src="images/search.png" alt=""></button>
                </div>
                <div class="user">
                    <a href="#" class="btn">Add New</a>
                    <img src="images/notifications.png" alt="">
                    <div class="image-case">
                        <img src="images/user.png" alt="">
                    </div>
                </div>
            </div>
        </div>
        <div class="content">
            <div class="cards">
                <div class="card">
                    <div class="box">
                        <h1>2194</h1>
                        <h3>Students</h3>
                    </div>
                    <div class="icon-case">
                        <img src="images/students.png" alt="">
                    </div>
                </div>
                <div class="card">
                    <div class="box">
                        <h1>50</h1>
                        <h3>Teachers</h3>
                    </div>
                    <div class="icon-case">
                        <img src="images/teachers.png" alt="">
                    </div>
                </div>
                <div class="card">
                    <div class="box">
                        <h1>10</h1>
                        <h3>Schools</h3>
                    </div>
                    <div class="icon-case">
                        <img src="images/schools.png" alt="">
                    </div>
                </div>
                <div class="card">
                    <div class="box">
                        <h1>530000</h1>
                        <h3>Income</h3>
                    </div>
                    <div class="icon-case">
                        <img src="images/income.png" alt="">
                    </div>
                </div>
            </div>
            <div class="content2">
                <div class="recent-payments">
                    <div class="title">
                        <h2>Recent Payments</h2>
                        <a href="#" class="btn">View All</a>
                    </div>
                    <table>
                        <tr>
                            <th>Name</th>
                            <th>School</th>
                            <th>Amount</th>
                            <th>Option</th>
                        </tr>
                        <tr>
                            <td>Cali</td>
                            <td>Jabuuti School</td>
                            <td>$200</td>
                            <td><a href="#" class="btn">View</a></td>
                        </tr>
                        <tr>
                            <td>c/raxman</td>
                            <td>Wadani School</td>
                            <td>$120</td>
                            <td><a href="#" class="btn">View</a></td>
                        </tr>
                        <tr>
                            <td>Taamir</td>
                            <td>siidii School</td>
                            <td>$400</td>
                            <td><a href="#" class="btn">View</a></td>
                        </tr>
                        <tr>
                            <td>mohamed</td>
                            <td>Ali Husein School</td>
                            <td>$300</td>
                            <td><a href="#" class="btn">View</a></td>
                        </tr>
                    </table>
                </div>
                <div class="new-students">
                    <div class="title">
                        <h2>New Students</h2>
                        <a href="#" class="btn">View All</a>
                    </div>
                    <table>
                        <tr>
                            <th>Profile</th>
                            <th>Name</th>
                            <th>Option</th>
                        </tr>
                        <tr>
                            <td><img src="images/user.png" alt=""></td>
                            <td>Cali</td>
                            <td><img src="images/info.png" alt=""></td>
                        </tr>
                        <tr>
                            <td><img src="images/user.png" alt=""></td>
                            <td>Cali</td>
                            <td><img src="images/info.png" alt=""></td>
                        </tr>
                        <tr>
                            <td><img src="images/user.png" alt=""></td>
                            <td>Cali</td>
                            <td><img src="images/info.png" alt=""></td>
                        </tr>
                        <tr>
                            <td><img src="images/user.png" alt=""></td>
                            <td>Cali</td>
                            <td><img src="images/info.png" alt=""></td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
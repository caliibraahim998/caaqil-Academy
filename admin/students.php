
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Students Table</title>
    <!-- <link rel="stylesheet" href="style.css"> -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css" integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body>
    <style>
 *{
    margin: 0;
    padding: 0;
    box-sizing: border-box;
    font-family: 'Poppins',sans-serif;
}
body{
    min-height: 100vh;
}
a{
    text-decoration: none;
}
li{
    list-style: none;
}
h1,h2{
    font-size: 18px;
    color: #444;
 
}
h3{
    color: #999;
}
/* .btn{
  background: #f05462;
  color: white;
  padding: 5px 10px; 
  text-align: center; 
} */
/* .btn:hover{
    color: #f05462;
    background: #fff;
    padding: 3px 8px;
    border: 2px solid #f05462;
} */
.title{
    display:flex;
    align-items: center;
    justify-content: space-around;
    padding: 15px 10px;
    border-bottom: 2px solid #999;
}
table{
    padding: 10px;
}
th,td{
    text-align: left;
    padding: 8px;
}
.side-menu{
    position: fixed;
    background: #f05462;
    width: 20vw;
    height: 100vh;
    display: flex;
    flex-direction: column;
    
}
.side-menu .brand-name{
    height: 10vh;
    display: flex;
    align-items: center;
    justify-content: center;
}
.side-menu li{
    font-size: 24px;
    padding: 10px 40px;
    color: white;
    display: flex;
    align-items: center;
   margin-top: 10px;
}
.side-menu li:hover{
    background: white;
    color: #f05462;
}

.container{
    position: absolute;
    right: 0;
    width: 80vw;
    height: 100vh;
    background: #f1f1f1;
}
.container .header{
    position: fixed;
    top: 0;
    right: 0;
    width: 80vw;
    height: 10vh;
    background: white;
    display: flex;
    justify-content: center;
    align-items: center;
    box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
    z-index: 1;
}
.container .header .nav{
    width: 90%;
    display: flex;
    align-items: center;
}
.container .header .nav .search{
flex: 3;
display: flex;
justify-content: center;
}
.container .header .nav .search input[type=text]{
    border: none;
    background: #f1f1f1;
    padding: 10px;
    width: 50%;
}
.container .header .nav .search button{
    width: 40px;
    height: 40px;
    border: none;
    display: flex;
    justify-content: center;
    align-items: center;
}
.container .header .nav .search button img{
    width: 30px;
    height: 30px;
}
.container .header .nav .user{
    flex: 1;
    display: flex;
    justify-content: space-between;
    align-items: center;
}
.container .header .nav .user img{
    width: 40px;
    height: 40px;
}
.container .header .nav .user .image-case{
    position: relative;
    width: 50px;
    height: 50px;
}
.container .header .nav .user .image-case img{
    position:absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
}

@media screen and (max-width: 1050px)  {
    .side-menu li{
        font-size: 18px;
    }
    .brand-name h1{
        margin-left: 10px;
        font-size: 15px;
    }
}
@media screen and (max-width: 940px){
    .side-menu li span{
     display: none;
    }
    .side-menu{
        align-items: center;
    }
    .side-menu li img{
        width: 40px;
        height: 40px;
    }
    .side-menu li:hover{
        background:#f05462;
        padding: 8px 38px;
        border: 2px solid white;
    }
}
/* @media screen and (max-width: 536px){
.container .content .cards{
    justify-content: center;
}
.container .content .content2 .recent-payments table th:nth-child(2),
.container .content .content2 .recent-payments table th:nth-child(2){
    display: none;
}

} */

    </style>
    <div class="side-menu">
        <div class="brand-name">
            <h1>School Management</h1>
        </div>
        <ul>
            <li> <img src="images/dashboard (2).png" alt="search.."> &nbsp; <span><a href="../admin/">Dashboard</a></span> </li>
            <li> <img src="images/reading-book (1).png" alt="search.."> &nbsp; <span><a href="students.php">Students</a></span> </li>
            <li> <img src="images/teacher2.png" alt="search.."> &nbsp; <span><a href="teachers.php">Teachers</a></span> </li>
            <li> <img src="images/school.png" alt="search.."> &nbsp; <span><a href="schools.php">schools</a></span> </li>
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
                    <a href="#" class="btn btn-primary">Add New</a>
                    <img src="images/notifications.png" alt="">
                    <div class="image-case">
                        <img src="images/user.png" alt="">
                    </div>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="card" style="margin-top: 100px;">
                <div class="card-header d-flex justify-content-between items-center bg-dark">
                    <h1 class="text-white">Students List</h1>
                    <!-- Button trigger modal -->
                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
                Add New
                </button>
                </div>
                <div class="card-body">
                    <table class="table table-hover">
                        <thead class="bg-primary text-white">
                            <tr>
                                <td>#</td>
                                <td>Name</td>
                                <td>School Name</td>
                                <td>Class</td>
                                <td>View</td>
                                <td>Update</td>
                                <td>Delete</td>
                            </tr>
                        </thead>
                        <tbody id="ReadStudentBody">
                            <!-- The Student will Becomig Students Js File -->
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
                <!-- Update Read  Modal -->
<div class="modal fade" style="margin-top: 100px;" id="UpdateModal" tabindex="-1" aria-labelledby="UpdateModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="UpdateModalLabel">Update Form</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body" id="UpdateReadBody">
      
      <!-- will Becomig Here -->
      </div>
    </div>
  </div>
</div>
        <!-- Modal -->
<div class="modal fade" style="margin-top: 100px;" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Modal title</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form id="studentForm">
            <label>Student Name</label>
            <input type="text" class="form-control" id="fullname" name="fullname">
            <label>School Name</label>
            <input type="text" class="form-control" id="Sschool" name="Sschool">
            <label>class</label>
            <input type="text" class="form-control" id="class" name="class">
            <label>Image</label>
            <input type="file" class="form-control" id="Simage" name="Simage">

      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Save</button>
      </div>
      </form>
      </div>
    </div>
  </div>
</div>



        <!-- View  Modal -->
<div class="modal fade" style="margin-top: 100px;" id="viewModal" tabindex="-1" aria-labelledby="viewModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="viewModalLabel">Modal title</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body" id="viewStudentBody">
       <!-- will  be Becomig Students Js File -->
      </div>
    </div>
  </div>
</div>


 
       
    </div>
    <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="js/students.js"></script>
</body>
</html>
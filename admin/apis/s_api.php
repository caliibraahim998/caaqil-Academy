<?php 
header('Content-Type: application/json');
include("../config/conn.php");

if (isset($_POST['action'])) {
    $action = $_POST['action'];
    if (function_exists($action)) {
        $action($conn);
    } else {
        echo json_encode(['status' => 'error', 'message' => 'Invalid action']);
    }
} else {
    echo json_encode(['status' => 'error', 'message' => 'Action is Required']);
}

// Making Action End Here

// Making Insert Functio  Start  Here
function StudentsF($conn) {
    if (isset($_POST['StudentsF']) && $_POST['StudentsF'] == 'Idman123') {
        extract($_POST);

        // Function to validate fullname (at least 3 names)
        function validateFullName($fullname) {
            $words = explode(' ', trim($fullname));
            return count($words) >= 3; // Check if fullname has at least 3 words
        }

        if (empty($fullname) || empty($Sschool) || empty($class)) {
            echo json_encode(['status' => 'error', 'message' => 'All Fields Are Required']);
           
        }
        // Check if fullname has at least 3 names
        else if (!validateFullName($fullname)) {
            echo json_encode(['status' => 'error', 'message' => 'Fullname must contain at least 3 names']);
        }
        else{
            $image_name = $_FILES['Simage']['name'];
            $temp_name = $_FILES['Simage']['tmp_name'];
            $folder = "../uploads/students/" . $image_name;
    
            if ($_FILES['Simage']['error'] === UPLOAD_ERR_OK) {
                if (move_uploaded_file($temp_name, $folder)) {
                    $insert = mysqli_query($conn, "INSERT INTO students(fullname, school, class, s_image) VALUES('$fullname', '$Sschool', '$class', '$image_name')");
                    if ($insert) {
                        echo json_encode(['status' => 'success', 'message' => 'Successfully Inserted']);
                    } else {
                        echo json_encode(['status' => 'error', 'message' => 'Database Insert Failed']);
                    }
                } else {
                    echo json_encode(['status' => 'error', 'message' => 'Image Not Uploaded. Please Try Again']);
                }
            } else {
                echo json_encode(['status' => 'error', 'message' => 'File Upload Error: ' . $_FILES['Simage']['error']]);
            }
        }
    } else {
        echo json_encode(['status' => 'error', 'message' => 'Invalid Insert And Insert Password Is Required']);
    }
}

// Making Insert Functio  End Here
// Making ReadStudent Function  Start Here
function ReadStudent($conn) {
if(isset($_POST['ReadStudent']) && $_POST['ReadStudent'] == 'Idman123'){
    $read_student=mysqli_query($conn, "SELECT * FROM students");
    if($read_student && mysqli_num_rows($read_student)>0){
        foreach($read_student as $row){
            ?>
            <tr>
                 <td><?php echo $row['student_id'];  ?></td>
                 <td><?php echo $row['fullname'];  ?></td>
                 <td><?php echo $row['school'];  ?></td>
                 <td><?php echo $row['class'];  ?></td>
                 <td><button data-bs-toggle="modal" data-bs-target="#viewModal" id="viewBTN" student_id="<?php echo $row['student_id']; ?>" class="btn btn-secondary"><i class="fas fa-eye"></i></button></td>
                 <td><button data-bs-toggle="modal" data-bs-target="#UpdateModal" id="UpdateBTN" student_id="<?php echo $row['student_id']; ?>"  class="btn btn-success"><i class="fas fa-edit"></i></button></td>
                 <td><button id="DeleteBTN" student_id="<?php echo $row['student_id']; ?>" class="btn btn-danger"><i class="fas fa-trash"></i></button></td>
             </tr>
         <?php
        }
    }
    else{
        echo json_encode(['status' => 'error','message' => 'No Studennts Found in Database']);
    }
}
else{
    echo json_encode(['status' => 'error','message' => 'Invalid Read And Read Password Is Required']);
}
}
// Making ReadStudent Function  End Here
// Making Delete Student Function  Start Here
function deleteStudent($conn){
    if(isset($_POST['student_id'])){
      $studen_id = $_POST['student_id'];
      $delete_student=mysqli_query($conn, "DELETE FROM students WHERE student_id='$studen_id'");
      if($delete_student){
        echo json_encode(['status' => 'success','message' => 'Student Successfully Deleted']);
      }else{
        echo json_encode(['status' => 'error','message' => 'Database Delete Failed']);
      }
    }
    else{
      echo json_encode(['status' => 'error','message' => 'Student Id is Required']);
    }
}
// Making Delete Student Function  End Here
// Making View Student Function  Start Here
function ViewStudent($conn){
    if(isset($_POST['student_id'])){
        $student_id = $_POST['student_id'];
        $view_student=mysqli_query($conn, "SELECT * FROM students WHERE student_id='$student_id'");
        if($view_student && mysqli_num_rows($view_student)>0){
            $row = mysqli_fetch_assoc($view_student);
           ?>
            <div class="image bg-secondary" style="width: 150px; height: 150px; margin-left: 180px; border-radius: 50%; overflow: hidden;">
                <img style="width: 100%; height: 100%; object-fit: cover;" src="<?php echo 'uploads/students/'. $row['s_image']; ?>" alt="Search...">
            </div>

        <li class="d-flex justify-content-between items-center  mt-3"><strong>id</strong><span><?php echo $row['student_id'];  ?></span></li>
        <li  class="d-flex justify-content-between items-center mt-3"><strong>Fullname</strong><span><?php echo $row['fullname'];  ?></span></li>
        <li  class="d-flex justify-content-between items-center mt-3"><strong>School</strong><span><?php echo $row['school'];  ?></span></li>
        <li  class="d-flex justify-content-between items-center mt-3"><strong>Class</strong><span><?php echo $row['class'];  ?></span></li>
        <li  class="d-flex justify-content-between items-center mt-3"><strong>Joining Data</strong><span><?php echo $row['Joining_Date'];  ?></span></li>
           <?php
        }
        else{
            echo json_encode(['status' => 'error','message' => 'No Studennt Found in Database']);
        }
    }
}
// Making View Student Function  End Here
// Making Read Update Student Function  start Here
function readUpdate($conn){
    if(isset($_POST['student_id'])){
        $student_id = $_POST['student_id'];
        $read_student=mysqli_query($conn, "SELECT * FROM students WHERE student_id='$student_id'");
        if($read_student && mysqli_num_rows($read_student)>0){
            $row = mysqli_fetch_assoc($read_student);
           ?>
              <form id="UpdateForm">
              <input type="text" hidden class="form-control" value="<?php echo $row['student_id']  ?>" id="student_id" name="student_id">

            <label>Student Name</label>
            <input type="text" class="form-control" value="<?php echo $row['fullname']  ?>" id="fullname" name="fullname">
            <label>School Name</label>
            <input type="text" class="form-control" value="<?php echo $row['school']  ?>" id="Sschool" name="Sschool">
            <label>class</label>
            <input type="text" class="form-control" value="<?php echo $row['class']  ?>" id="class" name="class">
            <label>Change Image</label>
                <input type="file" class="form-control" id="Simage" name="Simage" accept="image/*">
                
                <!-- Hidden input for the old image -->
                <input type="hidden" name="old_image" value="<?php echo $row['s_image']; ?>">

      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Save</button>
      </div>
      </form>
           <?php
        }else{
            echo json_encode(['status' => 'error','message' => 'No Studennt Found in Database']);
        }
    }
    else{
        echo json_encode(['status' => 'error','message' => 'Student Id is Required']);
    }
}
// Making Read Update Student Function  End Here
// Making  Update Student Function  start Here
function updateStudent($conn) {
    if (isset($_POST['student_id'])) {
        $student_id = $_POST['student_id'];
        extract($_POST);

        function validateFullName($fullname) {
            $words = explode(' ', trim($fullname));
            return count($words) >= 3; // Check if fullname has at least 3 words
        }

        // Form Validation
        if (empty($fullname) || empty($Sschool) || empty($class)) {
            echo json_encode(['status' => 'error', 'message' => 'All Fields Are Required']);
        } 
        // Validate Fullname
        else if (!validateFullName($fullname)) {
            echo json_encode(['status' => 'error', 'message' => 'Fullname must contain at least 3 names']);
        } 
        else {
            // Handle Image Upload
            $image_name = $_FILES['Simage']['name'];
            $temp_name = $_FILES['Simage']['tmp_name'];
            $folder = "../uploads/students/" . $image_name;

            if ($_FILES['Simage']['error'] === UPLOAD_ERR_OK) {
                if (move_uploaded_file($temp_name, $folder)) {
                    // Update Student in Database
                    $updateStudent = mysqli_query($conn, "UPDATE students SET fullname='$fullname', school='$Sschool', class='$class', s_image='$image_name' WHERE student_id='$student_id'");
                    if ($updateStudent) {
                        echo json_encode(['status' => 'success', 'message' => 'Student Successfully Updated']);
                    } else {
                        echo json_encode(['status' => 'error', 'message' => 'Failed to update student']);
                    }
                } else {
                    echo json_encode(['status' => 'error', 'message' => 'Failed to move uploaded file']);
                }
            } else {
                echo json_encode(['status' => 'error', 'message' => 'Failed to upload image']);
            }
        }
    } else {
        echo json_encode(['status' => 'error', 'message' => 'Student ID is Required']);
    }
}

// Making  Update Student Function  End Here

?>

<?php  
header('Content-Type: application/json');
include("../config/conn.php");
if(isset($_POST['action'])){
    $action = $_POST['action'];
    if(function_exists($action)){
        $action($conn);
    }else{
        echo json_encode(['status' => 'error','message' => 'Invalid action']);
    }
}else{
    echo json_encode(['status' => 'error','message' => 'Action is required']);
}

// insert Teachers Function Start Here
function insertF($conn){
    if(isset($_POST["insertF"]) && $_POST["insertF"] == "Idman123"){
        extract($_POST);

        function validateTeacherName($t_name) {
            $words = explode(' ', trim($t_name));
            return count($words) >= 3; // Check if fullname has at least 3 words
        }

        // form Falidation
        if(empty($t_name) && empty($Tschool) && empty($Specialization)) {
            echo json_encode(['status' => 'error','message' => 'All Fields Are Required']);
        }
        else if(!validateTeacherName($t_name)){
            echo json_encode(['status' => 'error','message' => 'Teacher Name must contain at least 3 names']);
        }
        else{
            $image_name = $_FILES['Timage']['name'];
            $temp_name = $_FILES['Timage']['tmp_name'];
            $folder = "../uploads/teachers/" . $image_name;

            if ($_FILES['Timage']['error'] === UPLOAD_ERR_OK) {
                if (move_uploaded_file($temp_name, $folder)) {
               $insertTeacher=mysqli_query($conn, "INSERT INTO teachers(teacher_name,school_name,specialization,teacher_image)VALUES('$t_name','$Tschool','$Specialization','$folder')");
               if($insertTeacher){
                 echo json_encode(['status' => 'success','message' => 'Successfully Inserted']);
                 }
                 else{
                 echo json_encode(['status' => 'error','message' => 'Failed to Insert Teacher']);
                 }
               }else{
                 echo json_encode(['status' => 'error','message' => 'Failed to move uploaded file']);
  
               }
             }
             else{
                 echo json_encode(['status' => 'error','message' => 'Failed to move uploaded file']);
             }
            }
        }else{
            echo json_encode(['status' => 'error','message' =>'Invalid Insert And Insert Password Is Required']);
        }
    }

// insert Function end Here
// Read Function Start Here
function Readteacher($conn){
    if(isset($_POST['Readteacher']) && $_POST['Readteacher'] == 'Idman123'){
        $read_teacher=mysqli_query($conn, "SELECT * FROM teachers");
        if($read_teacher && mysqli_num_rows($read_teacher)){
            foreach($read_teacher as $row_teacher){
                ?>
                    <tr>
                        <td><?php echo $row_teacher['teacher_id'];  ?></td>
                        <td><?php echo $row_teacher['teacher_name'];  ?></td>
                        <td><?php echo $row_teacher['school_name'];  ?></td>
                        <td><?php echo $row_teacher['specialization'];  ?></td>
                        <td><button data-bs-toggle="modal" data-bs-target="#ViewModal" id="BtnView" teacher_id="<?php echo $row_teacher['teacher_id']; ?>" class="btn btn-success"><i class="fas fa-eye"></i></button></td>
                        <td><button class="btn btn-secondary"><i class="fas fa-edit"></i></button></td>
                        <td><button id="BtnDelete" teacher_id="<?php echo $row_teacher['teacher_id']; ?>" class="btn btn-danger"><i class="fas fa-trash"></i></button></td>
                    </tr>
                <?php
            }
        }else{
            echo json_encode(['status' => 'error','message' => 'No Teacher Found In']);
        }
    }
    else{
        echo json_encode(['status' => 'error','message' =>'Invalid Read And Read Password Is Required']);
    }
}
// Read Function end Here
// Delete Function start Here
function delete($conn){
    if(isset($_POST['teacher_id'])){
        $teacher_id=$_POST['teacher_id'];
        $DeleteTeacher=mysqli_query($conn, "DELETE FROM teachers WHERE teacher_id='$teacher_id'");
        if($DeleteTeacher){
            echo json_encode(['status' => 'success','message' => 'Teacher Successfully Deleted']);
        }else{
            echo json_encode(['status' => 'error','message' => 'Failed to Delete Teacher']);
        }
    }
    else{
        echo json_encode(['status' => 'error','message' =>'Teacher ID Is Required']);
    }
}
// Delete Function end Here
// View Teacher Function Start Here
function ViewTeacher($conn){
    if(isset($_POST['teacher_id'])){
        $teacher_id=$_POST['teacher_id'];
        $view_teacher=mysqli_query($conn, "SELECT * FROM teachers WHERE teacher_id='$teacher_id'");
        if($view_teacher && mysqli_num_rows($view_teacher)>0){
            $row = mysqli_fetch_assoc($view_teacher);
            ?>
             <div class="image bg-secondary" style="width: 150px; height: 150px; margin-left: 160px; border-radius: 50%; overflow: hidden;">
                <img style="width: 100%; height: 100%; object-fit: cover;" src="<?php echo 'teachers/'. $row['teacher_image']; ?>" alt="Search...">
             </div>

        <li class="d-flex justify-content-between items-center  mt-3"><strong>Teacher ID</strong><span><?php echo $row['teacher_id'];  ?></span></li>
        <li  class="d-flex justify-content-between items-center mt-3"><strong>Teacher Name</strong><span><?php echo $row['teacher_name'];  ?></span></li>
        <li  class="d-flex justify-content-between items-center mt-3"><strong>School Name</strong><span><?php echo $row['school_name'];  ?></span></li>
        <li  class="d-flex justify-content-between items-center mt-3"><strong>Specialization</strong><span><?php echo $row['specialization'];  ?></span></li>
        <li  class="d-flex justify-content-between items-center mt-3"><strong>Joining Data</strong><span><?php echo $row['Joining_Date'];  ?></span></li>
            <?php
        }else{
            echo json_encode(['status' => 'error','message' => 'No Teacher Found']);
        }
    }
}
// View Teacher Function end Here

?>
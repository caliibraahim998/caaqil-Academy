$(document).ready(function () {
    $(document).on('submit','#studentForm',function(e){
        e.preventDefault();
        // console.log("clicked");
        let formdata=new FormData(this);
        formdata.append("action","StudentsF");
        formdata.append("StudentsF","Idman123");
        // console.log(formdata);
        $.ajax({
            type: "POST",
            url: "apis/s_api.php",
            contentType:false,
            processData:false,
            data: formdata,
            dataType: "json",
            success: function (response) {
                // console.log(response.message);
                if(response.status == "success"){
                    Swal.fire({
                        title:"Good Job",
                        text:response.message,
                        icon:"success",
                    });
                    $("#studentForm")[0].reset();
                    readRequest();
                }else if(response.status == "error"){
                    Swal.fire({
                        title:"I Am Sorry",
                        text:response.message,
                        icon:"error",
                    });
                }
                
            }
        });
    })
   
//    Read Student logiC Start Here
readRequest();

function readRequest(){
    $.ajax({
        type: "POST",
        url: "apis/s_api.php",
        data:{"action":"ReadStudent","ReadStudent":"Idman123"},
        dataType: "html",
        success: function (response) {
            $("#ReadStudentBody").html(response);
        }
    });
}
//    Read Student logiC End Here
//    Delete Student logiC start  Here
$(document).on('click','#DeleteBTN',function (e) {
    e.preventDefault();
    // alert('Delete Student');
    let StudentID=$(this).attr('student_id');
    // alert(StudentID);
    Swal.fire({
        title: "Are you sure?",
        text: "You won't be able to revert this!",
        icon: "warning",
        showCancelButton: true,
        confirmButtonColor: "#3085d6",
        cancelButtonColor: "#d33",
        confirmButtonText: "Yes, delete it!"
      }).then((result) => {
        if (result.isConfirmed) {
          $.ajax({
            type: "POST",
            url: "apis/s_Api.php",
            data:{"action": "deleteStudent","student_id": StudentID},
            dataType: "json",
            success: function (response) {
                if (response.status  == "success") {
                    Swal.fire({
                        title: "Deleted!",
                        text: response.message,
                        icon: "success",
                    });
                    readRequest();
                }else if(response.status == "error") {
                    Swal.fire({
                        title: "I Am Sorry",
                        text: response.message,
                        icon: "error",
                    });
                }
            }
          });
        }
      });
})
//    Delete Student logiC End Here
//    View Student logiC Start Here
$(document).on('click','#viewBTN', function(e){
    e.preventDefault();
    // alert("clicked");
    let StudentID = $(this).attr('student_id');
    // alert(StudentID);
    $.ajax({
        type: "POST",
        url: "apis/s_api.php",
        data: {"action": "viewStudent","student_id": StudentID},
        dataType: "html",
        success: function (response) {
            // console.log(response);
            $("#viewStudentBody").html(response);
        }
    });
})
//    View Student logiC End Here
//    Read Update Student logiC Start Here
$(document).on('click','#UpdateBTN',function(e){
    e.preventDefault();
    // alert("clicked");
    let StudentID=$(this).attr('student_id');
    // alert(StudentID);
    $.ajax({
        type: "POST",
        url: "apis/s_api.php",
        data:{"action":"readUpdate","student_id":StudentID},
        dataType: "html",
        success: function (response) {
            // console.log(response.message);
            $("#UpdateReadBody").html(response);
        }
    });
})
//    Read Update Student logiC End Here


//     Update Student logiC start Here
$(document).on('submit','#UpdateForm',function(e){
    e.preventDefault();
    // alert("clicked");
    let formdata=new FormData(this);
    formdata.append("action","updateStudent");
    // formdata.append("Sid",$(this).attr('student_id'));
    // alert(formdata);
    $.ajax({
        type: "POST",
        url: "apis/s_api.php",
        contentType:false,
        processData:false,
        data: formdata,
        dataType: "json",
        success: function (response) {
            if(response.status == "success"){
                Swal.fire({
                    title:"Good Job",
                    text:response.message,
                    icon:"success",
                })
                $("#UpdateForm")[0].reset();
                readRequest();
            }else if(response.status == "error"){
                Swal.fire({
                    title:"I Am Sorry",
                    text:response.message,
                    icon:"error",
                })
            }
        }
    });
})
//     Update Student logiC End Here


});
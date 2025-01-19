$(document).ready(function () {
    $(document).on("submit","#TeachersForm",function (e) {
        e.preventDefault();
        // alert("clicked");
        let formdata=new FormData(this);
        formdata.append("action","insertF");
        formdata.append("insertF","Idman123");
        // alert(formdata);
        $.ajax({
            type: "POST",
            url: "apis/t_api.php",
            contentType:false,
            processData:false,
            data:formdata,
            dataType: "json",
            success: function (response) {
            //    console.log(response.message);
                if(response.status == "success"){
                    // show success message
                    Swal.fire({
                        title: "Good Job",
                        text: response.message,
                        icon: "success",
                    })
                    readRequest();
                    $("#TeachersForm")[0].reset();
                }else if(response.status == "error"){
                    Swal.fire({
                        title: "I Am Sorry!",
                        text: response.message,
                        icon: "error",
                    })
                }
            }
        });
    })
//   Read Teacher Start Here
readRequest();
function readRequest() {
    $.ajax({
        type: "POST",
        url: "apis/t_api.php",
        data:{"action":"Readteacher","Readteacher":"Idman123"},
        dataType: "html",
        success: function (response) {
            $("#TeacherModalBody").html(response);
            
        }
    });
}
//   Read Teacher end Here
//   Delete Teacher Start Here
$(document).on('click', '#BtnDelete', function(e){
    e.preventDefault();
    // alert('Teacher deleted');
    let TeacherId= $(this).attr("teacher_id");
    // alert(TeacherId);
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
            url: "apis/t_api.php",
            data:{"action": "delete", "teacher_id":TeacherId},
            dataType: "json",
            success: function (response) {
                console.log(response.message);
                if(response.status == "success"){
                    // show success message
                    Swal.fire({
                       title:"Good Job",
                       text:response.message,
                       icon:"success",
                })
                    readRequest();
                }else if(response.status == "error"){
                    Swal.fire({
                        title:"I Am Sorry!",
                        text:response.message,
                        icon:"error",
                    })
 
                }

            }
         });
        }
      });
})
//   Delete Teacher end Here
//   View Profile Teacher Start Here
$(document).on('click','#BtnView',function(e) {
    e.preventDefault();
    // alert("clicked");
    let TeacherId = $(this).attr("teacher_id");
    // alert(TeacherId);
    $.ajax({
        type: "POST",
        url: "apis/t_api.php",
        data: {"action": "ViewTeacher", "teacher_id":TeacherId},
        dataType: "html",
        success: function (response) {
            $("#ViewTeacherBody").html(response);
            
        }
    });
})
//   View Profile Teacher end Here
});
$(document).ready(function () {
    $(document).on('submit','#RegForm',function(e){
        e.preventDefault();
        // console.log("clicked");
        let formdata=new FormData(this);
        formdata.append("action","regf");
        formdata.append("regf","Caaqil123");
        // console.log(formdata);
        $.ajax({
            type: "POST",
            url: "apis/auth_api.php",
            contentType:false,
            processData:false,
            data:formdata,
            dataType: "json",
            success: function (response) {
                // console.log(response.message);
                if(response.status == "success"){
                   Swal.fire({
                    title:"Good Job",
                    text:response.message,
                    icon:"success",
                   })
                }
                else if(response.status == "error"){
                    Swal.fire({
                        title:"I Am Sorry",
                        text:response.message,
                        icon:"error",
                       })
                }
                
            }
        });
    })
    
    // Lojic Of Login Function
$(document).on("submit","#logForm",function(e){
    e.preventDefault();
    // console.log("clicked");
    let formdata =new FormData(this);
    formdata.append("action","login");
    formdata.append("login","Caaqil123");
    // console.log(formdata);
   $.ajax({
    type: "POST",
    url: "apis/auth_api.php",
    contentType:false,
    processData:false,
    data:formdata,
    dataType: "json",
    success: function (response) {
        // console.log(response.message);
        if(response.status == "success"){
            window.location.href="../admin";
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
});
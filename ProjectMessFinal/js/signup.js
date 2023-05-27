$(document).ready(function(){
    $("#signupData").on("submit", function(e){
        e.preventDefault();
        let formData = new FormData(this);
        formData.append("signup","signup");
        $.ajax({
            type: "POST",
            url: "php/signup.php",
            data: formData,
            contentType: false,
            processData: false,
            success: function(response){
                if(response == "success"){
                    location.href = "login.php";
                }else{
                    $("#errors").css("display", "block");
                    $("#errors").html(response);
                }
            }
        });
    });
});
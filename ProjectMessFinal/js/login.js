$(document).ready(function(){
    $("#loginForm").on("submit", function(e){
        e.preventDefault();
        let formData = new FormData(this);
        formData.append("login","login");
        $.ajax({
            type: "POST",
            url: "php/login.php",
            data: formData,
            contentType: false,
            processData: false,
            success: function(response){
                if(response == "success"){
                    location.href = "users.php";
                }else{
                    $("#errors").css("display", "block");
                    $("#errors").html(response);
                }
            }
        });
    });
});
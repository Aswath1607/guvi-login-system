$(document).ready(function () {

    $("#loginBtn").click(function () {

    

        $.ajax({
            url: "php/login.php",
            type: "POST",
            dataType: "json",
            data: {
                email: $("#email").val(),
                password: $("#password").val()
            },

            success: function (response) {

    

    alert(response.message);

    if (response.success) {

        localStorage.setItem(
            "auth_token",
            response.token
        );

        localStorage.setItem(
            "user_id",
            response.user_id
        );

        localStorage.setItem(
            "user_name",
            response.name
        );

        

        window.location.href = "profile.html";
    }
},

            error: function (xhr, status, error) {
                console.log(xhr.responseText);
                console.log(status);
                console.log(error);
                alert("AJAX ERROR");
            }
        });

    });

});
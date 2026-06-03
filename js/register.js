$(document).ready(function () {

    $("#registerBtn").click(function () {

        const fullName = $("#fullName").val().trim();
        const email = $("#email").val().trim();
        const password = $("#password").val().trim();

        if (!fullName || !email || !password) {
            alert("Please fill all fields");
            return;
        }

        $.ajax({
            url: "php/register.php",
            type: "POST",
            dataType: "json",
            data: {
                full_name: fullName,
                email: email,
                password: password
            },

            success: function (response) {

                alert(response.message);

                if (response.success) {
                    window.location.href = "login.html";
                }
            },

            error: function (xhr, status, error) {

                console.log(xhr.responseText);

                alert("AJAX Error");
            }
        });

    });

});
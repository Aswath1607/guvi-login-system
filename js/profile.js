

$(document).ready(function () {

    const userName = localStorage.getItem("user_name");
    const userId = localStorage.getItem("user_id");

    if (!userName || !userId) {

        window.location.href = "login.html";
        return;
    }

    $("#welcomeText").text(
        "Welcome, " + userName
    );

    $.ajax({

    url: "php/get_profile.php",
    type: "GET",

    data: {
        user_id: userId
    },

    dataType: "json",

    success: function (response) {

        if (response.success) {

            $("#age").val(response.age);
            $("#dob").val(response.dob);
            $("#contact").val(response.contact);
        }
    }

});

    $("#saveProfileBtn").click(function () {

        const profileData = {
            user_id: userId,
            age: $("#age").val(),
            dob: $("#dob").val(),
            contact: $("#contact").val()
        };

        $.ajax({
            url: "php/save_profile.php",
            type: "POST",
            contentType: "application/json",
            data: JSON.stringify(profileData),

            success: function (response) {

                alert(response.message);

            },

            error: function () {

                alert("Error saving profile");
            }
        });

    });

});
$("#logoutBtn").click(function () {

    $.ajax({
        url: "php/logout.php",
        type: "POST",
        contentType: "application/json",

        data: JSON.stringify({
            token: localStorage.getItem("auth_token")
        }),

        success: function () {

            localStorage.clear();

            window.location.href =
                "login.html";
        }
    });

});
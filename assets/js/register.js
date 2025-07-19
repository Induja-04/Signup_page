$(document).ready(function () {
  $('#registerBtn').click(function () {
    var name = $('#username').val();
    var email = $('#email').val();
    var password = $('#password').val();
    var mobile = $('#mobile').val();

    $.ajax({
      url: '/intern_project/assets/php/register.php',
      type: 'POST',
      data: {
        name: name,
        email: email,
        password: password,
        mobile: mobile
      },
      success: function (response) {
        if (response.trim() === "success") {
          alert("✅ Registered successfully!");
          window.location.href = "login.html";
        } else {
          alert("❌ " + response);
        }
      },
      error: function () {
        alert("❌ An error occurred during registration.");
      }
    });
  });
});

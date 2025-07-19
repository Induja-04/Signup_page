console.log("Login JS loaded");
$('#loginBtn').click(function (e) {
  e.preventDefault(); // ✅ Prevent form reload
  
  $.ajax({
    url: 'php/login.php',
    method: 'POST',
    data: {
      email: $('#email').val(),
      password: $('#password').val()
    },
    success: function (res) {
      const result = JSON.parse(res);
      if (result.status === 'success') {
        localStorage.setItem('session_token', result.token);
        localStorage.setItem('email', $('#email').val());
        window.location.href = "profile.html";
      } else {
        alert("Login failed");
      }
    },
    error: function (xhr, status, error) {
      console.error("AJAX Error:", error); // 🔍 Debug
    }
  });
});

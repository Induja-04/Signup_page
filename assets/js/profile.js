$(document).ready(function () {
  const token = localStorage.getItem('session_token');

  if (!token) {
    alert("No session token found. Please log in again.");
    window.location.href = "login.html";
    return;
  }

  $.ajax({
    url: 'assets/php/profile.php',
    method: 'GET',
    headers: {
      'Authorization': token
    },
    success: function (res) {
      if (res.status === 'success') {
        $('#email').text(res.data.email);
        $('#name').val(res.data.name);
        $('#phone').val(res.data.phone);
        $('#address').val(res.data.address);
      } else {
        alert(res.message);
        window.location.href = "login.html";
      }
    },
    error: function () {
      alert("Something went wrong. Please log in again.");
      window.location.href = "login.html";
    }
  });
});

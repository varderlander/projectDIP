$('#form_id1').submit(function (e) {
  // e.preventDefault();

  let login = $('input[name="login"]').val(),
    password = $('input[name="pasw1"]').val();


  $.ajax({
    url: './validation/auth.php',
    type: "POST",
    dataType: 'text',
    data: {
      login: login,
      password: password
    },
    success (data) {
     $('.mes').text(data);
    }
  });

});


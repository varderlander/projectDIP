$('#changepas').submit(function (e) {
  e.preventDefault();

  let login = $('input[name="new_login"]').val(),
    opassword = $('input[name="opassword"]').val(),
    npassword = $('input[name="npassword"]').val();
            


  $.ajax({
    url: './dashboard.php',
    type: "POST",
    dataType: 'text',
    data: {
      login: login,
      opassword: opassword,
      npassword: npassword
    },
    success (data) {
     $('.mes').text(data);
    }
  });

});
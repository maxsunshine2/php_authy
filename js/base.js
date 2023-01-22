$(document).ready(function () {

  //for loader
  // setTimeout(function() {
  
clearInterval();
  //for login
  $("#login").on("submit", function (e) {
    e.preventDefault();
    var mail = $("#logml").val();
    var code = $("#logps").val();

    if (code !== "" && mail !== "") {
      $.ajax({
        url: "handler.php",
        type: "POST",
        data: { usmail: mail, uspass: code },
      }).done(function (data) {
        var a = JSON.stringify(data);
        console.log(data);
        var ans = JSON.stringify(data);
        if (ans.match(/(welcome)/i)) {
          setTimeout(function () {
            location.href = "index.php";
          }, 1000);
          clearTimeout();
        }else{
          alert(data);
        }
      });
    } else {
      alert("Verify Your Inputs");
    }
  });

  // for account recovery email
  $("#recover").on("submit", function (e) {
    e.preventDefault();
    var mail = $("#rmail").val();

    if (mail !== "") {
      $.ajax({
        url: "handler.php",
        type: "POST",
        data: { remail: mail},
      }).done(function (data) {
        var a = JSON.stringify(data);
        console.log(data);
        var ans = JSON.stringify(data);
        if (ans.match(/(recovering)/i)) {
          setTimeout(function () {
            localStorage.setItem("email", mail);
            location.href = "resetpass.php";
          }, 1000);
          clearTimeout();
        }else{
          alert(data);
        }
      });
    } else {
      alert("Verify Your Inputs");
    }
  });
  
  //for registeration submit
  $("#reg").on("submit", function (event) {
    event.preventDefault();
    $("#rg").html(
      "<div class='spinner-border text-light' role='status'></div>"
    );
    var fname = $("#fn").val();
    var lname = $("#ln").val();
    var email = $("#email").val();
    var pword = $("#psw").val();

    var fd = new FormData();

    fd.append("fname", fname);
    fd.append("lname", lname);
    fd.append("email", email);
    fd.append("pword", pword);

    if (fname !== null && lname !== null && email !== null && pword !== null) {
      $.ajax({
        url: "handler.php",
        type: "post",
        data: fd,
        contentType: false,
        processData: false,
      }).done(function (data) {
        var a = JSON.stringify(data);
        console.log(data);
        if (a.match(/(successful)/i)) {
          setTimeout(function () {
            location.href = "log-in.php";
          }, 1000);
          clearTimeout();
        }else{
          alert(data);
        }
      });
    } else {
      alert("Verify Your Inputs");
    }
  });

    //for account recovery passwor setting
  $("#resetpass").on("submit", function (e) {
    e.preventDefault();
    var pass = $("#repass").val();
    var passe = $("#repasscon").val();
    var email = localStorage.getItem("email");
    // alert(passe);
    if (pass === passe) {
      $.ajax({
        url: "handler.php",
        type: "POST",
        data: { repass: pass, rpmail: email},
      }).done(function (data) {
        var a = JSON.stringify(data);
        console.log(data);
        if (a.match(/(recovered)/i)) {
          setTimeout(function () {
            location.href = "index.php";
          }, 1000);
          clearTimeout();
        }else{
          alert(data);
        }
      });
    } else {
      alert("Verify Your Inputs");
    }
  });

});

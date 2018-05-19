

function main(){

  $('#signupp').hide();

  alert("S'il vous plait lisez le about en haut dans le menu");

  function scorePassword(pass) {
    var score = 0;
    if (!pass)
        return score;

    // award every unique letter until 5 repetitions
    var letters = new Object();
    for (var i=0; i<pass.length; i++) {
        letters[pass[i]] = (letters[pass[i]] || 0) + 1;
        score += 5.0 / letters[pass[i]];
    }

    // bonus points for mixing it up
    var variations = {
        digits: /\d/.test(pass),
        lower: /[a-z]/.test(pass),
        upper: /[A-Z]/.test(pass),
        nonWords: /\W/.test(pass),
    }

    variationCount = 0;
    for (var check in variations) {
        variationCount += (variations[check] == true) ? 1 : 0;
    }
    score += (variationCount - 1) * 10;

    return parseInt(score);
  }

  function checkPassStrength(pass) {
    var score = scorePassword(pass);
    if (score > 80)
        return "strong";
    if (score > 60)
        return "good";
    if (score >= 30)
        return "weak";
    return "very weak";
  }

  $('#Signup').on('click',function(){
    document.getElementById('modal-title').innerHTML = "Register";
    $('#offline').hide();
    $('#signupp').show();
  });

  $('#cancelsub').on('click',function(){
    document.getElementById('modal-title').innerHTML = "Login";
    $('#offline').show();
    $('#signupp').hide();
  });

  $('#password').keyup(function(){
    var r= checkPassStrength(document.getElementById('password').value);
    document.getElementById('Salert').innerHTML = "Your password is " + r;
  });

  $("#Cpassword").keyup(function() {
    var password = $("#password").val();
    $("#Calert").html(password == $(this).val()
      ? "Passwords match."
      : "Passwords do not match!"
      );
  });

	$('.carousel').carousel({
        interval:3000,
        keyboard: true,
        pause:'hover',
        wrap:true
      });

  $('#slider4').on('slide.bs.carousel', function(){
        console.log('slide');
      });

     

}

$(document).ready(main);
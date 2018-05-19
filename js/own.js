function main(){

  alert("S'il vous plait lisez le about en haut dans le menu");
  $('#Settings').hide();
  $('#Addproject').hide();
  $('#Parsite').hide();
  $('#saves').hide();
  $('.modal-Acc').toggleClass("AccToggle");
  $('.modal-col1').toggleClass("modal-col1togg");
  $('.modal-col2').toggleClass("modal-col2togg");
  $('#Vossites').show();
  $('#online').show();
  $('#sitelink').hide();

  $('#Addproj').on('click',function(){
    $('#Vossites').hide();
    $('#Addproject').show();
    $('#Parsite').hide();
  });

  $('#Canproj').on('click',function(){
    $('#Vossites').show();
    $('#Addproject').hide();
  });

  $('#list-Settings').on('click',function(){
    $("#sitelink").hide();
    $("#staffmembers").show();
    $("#settingname").show();
    $("#saveNS").show();
    $("#delS").show();
    $("#sdNS").show();
    $('#Vossites').hide();
    $('#Settings').show();
    $('#Addproject').hide();
    $('#Parsite').hide();
    $('#saves').hide();    
  });

  $('#list-Vossites').on('click',function(){
    $("#sitelink").hide();
    $("#staffmembers").show();
    $("#settingname").show();
    $("#saveNS").show();
    $("#delS").show();
    $("#sdNS").show();
    $('#saves').hide();
    $('#Vossites').show();
    $('#Settings').hide();
    $('#Parsite').hide();
    $('#Addproject').hide();
    $("#semsg").html("");
    $("#Senpwd").value="";
  });

  $(".Vel").on('click',function () {
    var r=this.name.split("(");
    if (window.XMLHttpRequest) {
      xmlhttp = new XMLHttpRequest();
    }else {
      // code for IE6, IE5
      xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
    }
    xmlhttp.onreadystatechange = function() {
      if (this.readyState == 4 && this.status == 200) {
        var c= this.responseText.split("&");
        document.getElementById('Sitename').value = c[0];
        document.getElementById('Sitep').value = c[2];
        document.getElementById('Sitee').value = c[3].split(" ")[0];
        document.getElementById('Siteg').value = c[1];
        if(c[4]==1){
            $('#sitelink').show();
            document.getElementById('sitelien').innerHTML="https://umake.000webhostapp.com/sites/"+r[1]+"/Velocity.html";

        }
      }
    };
    xmlhttp.open("GET","server/m.php?q="+this.name,true);
    xmlhttp.send();
    $('#Vossites').hide();
    if(r[0]!="a"){
      $("#staffmembers").hide();
      $("#settingname").hide();
      $("#saveNS").hide();
      $("#delS").hide();
      $("#sdNS").hide();
    }
    $('#Parsite').show();
  });

  $("#Senpwd").keyup(function() {
    var password = $("#Sepwd").val();
    $("#semsg").html(password == $(this).val()
      ? "Passwords match."
      : "Passwords do not match!"
      );
  });

  $(".Tok").on('click',function () {
    var r=this.name.split("(");
    var d;
    if (window.XMLHttpRequest) {
      xmlhttp = new XMLHttpRequest();
    }else {
      // code for IE6, IE5
      xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
    }
    xmlhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            var c= this.responseText.split("&");
            document.getElementById('Sitename').value = c[0];
            document.getElementById('Sitep').value = c[2];
            document.getElementById('Sitee').value = c[3];
            document.getElementById('Siteg').value = c[1];
            if(c[4]==1){
                $('#sitelink').show();
                document.getElementById('sitelien').innerHTML="https://umake.000webhostapp.com/sites/"+c[4]+"/tokyo.html";
            }

        }
    };
    xmlhttp.open("GET","server/m.php?q="+this.name,true);
    xmlhttp.send();
    if(r[0]!="a"){
        $("#staffmembers").hide();
        $("#settingname").hide();
        $("#saveNS").hide();
        $("#delS").hide();
        $("#sdNS").hide();
    }
    $('#Parsite').show();
    $('#Vossites').hide();
    $('#Parsite').show();
  });

  $("#canPS").on('click',function () {
    $("#staffmembers").show();
    $("#settingname").show();
    $("#sitelink").hide();
    $("#saveNS").show();
    $("#delS").show();
    $("#sdNS").show();
    $('#Vossites').show();
    $('#Parsite').hide();
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

  $("#VelClick").on('click',function () {
    document.getElementById('namesave').name="VT";
    $('#Addproject').hide();
    $('#saves').show();
  });

  $("#TokClick").on('click',function () {
    document.getElementById('saveup').name="TT";
    $('#Addproject').hide();
    $('#saves').show();
  });

  $("#Csaveup").on('click',function () {
    $('#Addproject').hide();
    $('#saves').hide();
    $('#Vossites').show();
  });

}
$(document).ready(main);
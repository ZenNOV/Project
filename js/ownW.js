

function main(){
    var c = $('#choice');
    var ifame = c.contents();
    var lastclickedimg;
    var lastclickedlink;
    $('#Pages').hide();
    $('#uploads').hide();
    $('#settings').hide();
    $('#settingslink').hide();

    $('#paes').on('click',function(){
        document.getElementById("modaltitle").innerHTML="Pages";
        $('#uploads').hide();
        $('#Pages').show();
        $("#Settings").modal();
        
    });

    $('#uphot').on('click',function(){
        document.getElementById("modaltitle").innerHTML="Media uploads";
        $('#Pages').hide();
        $('#uploads').show();
        $("#Settings").modal();
    });

    $('.subpage').on('click',function(){
        var name = this.name;                
        var re = document.getElementById("choice").src;
        re = re.split("/");
        re[re.length-1] = name;
        re = jion(re);
        if (window.XMLHttpRequest) {
            xmlhttp = new XMLHttpRequest();
        }else {
          // code for IE6, IE5
          xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
        }
        xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {    
                var r = this.responseText.split(" ");
                if(r[0].localeCompare("no")==0){
                    alert("Please Save first");     
                }else{                    
                    document.getElementById("choice").src=re;
                }
            }   
        };
        xmlhttp.open("GET","server/m.php?s="+re,true);
        xmlhttp.send();
    });

    c.on('load',function(){
        var iframe =c.contents();

        iframe.find(".fullwidth-imagee").click(function(){
            $('#settingslink').hide();
            $('#settings').show();
            document.getElementById("modaltitleset").innerHTML="Image Settings";
            document.getElementById("inputset").value= this.src;
            lastclickedimg=this.id;
        });

        iframe.find(".with-icon").click(function(){                        
            $('#settings').hide();
            $('#settingslink').show();
            document.getElementById("modaltitlelinkset").innerHTML="Link Settings";
            lastclickedlink=this.id;
        });

        iframe.find(".text").click(function(){                      
            if (window.XMLHttpRequest) {
                xmlhttp = new XMLHttpRequest();
            }else {
                // code for IE6, IE5
                xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
            }
            xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) { 
                }  
            }; 
            xmlhttp.open("GET","server/m.php?click=unsave" , true);
            xmlhttp.send();  
        });

        $("#saveup").on('click',function(){
            var savearray= new Array();
            var d=c.get(0).contentDocument.getElementsByClassName('text');
            var i=0;
            while(i<d.length){
                savearray.push(d[i].id+"&"+d[i].innerHTML);
                i=i+1;
            }
            if (window.XMLHttpRequest) {
                xmlhttp = new XMLHttpRequest();
            }else {
                // code for IE6, IE5
                xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
            }
            xmlhttp.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {    
                    window.location.reload(true); 
                }  
            }; 
            xmlhttp.open("POST","server/save.php");
            xmlhttp.send(JSON.stringify(savearray)); 
        });

    });

    function jion(v){
        var r="";
        var i=0;
        
        while ( i < (v.length-1)){
            r=r+v[i]+"/";
            i=1+i;
        }
        r=r+v[v.length-1];
        return r;
    }

    $('.uploadedimg').on('click',function(){
        document.getElementById("inputset").value= this.name;
    });



    $('#savenimg').on('click',function(){
        if (window.XMLHttpRequest) {
            xmlhttp = new XMLHttpRequest();
        }else {
            // code for IE6, IE5
            xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
        }
        xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {    
                window.location.reload(true);           
            }  
        }; 
        xmlhttp.open("GET","server/save.php?si="+ lastclickedimg+"("+document.getElementById("inputset").value , true);
        xmlhttp.send();  
    });


    $('#savenlink').on('click',function(){
        if (window.XMLHttpRequest) {
            xmlhttp = new XMLHttpRequest();
        }else {
            // code for IE6, IE5
            xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
        }
        xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {    
                window.location.reload(true);     
            }  
        }; 
        var v=document.getElementById("inputsetlink").value;
        lastclickedlink=lastclickedlink.concat("("+v);
        alert(lastclickedlink);
        xmlhttp.open("GET","server/save.php?sl="+lastclickedlink , true);
        xmlhttp.send();
    });


    window.onbeforeunload = function (e) {
        e = e || window.event;
        // For IE and Firefox prior to version 4
        if (e) {
            e.returnValue = 'Sure?';
        }
        // For Safari
        return 'Sure?';
    };

}

$(document).ready(main);

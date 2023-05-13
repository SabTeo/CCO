function DisplayCollezione(e){
    sessionStorage.setItem("lastsort",e);
    if(!sessionStorage.hasOwnProperty("check")){ 
        sessionStorage.setItem("check","false");
    }
    if(e=='default'){
        $("#zonaCarte").load("PHP/displayCollection.php",{sort:'order by id',check: sessionStorage.getItem("check")},
                        function(responseTxt, statusTxt, xhr){
                        if(statusTxt == "error")
                        alert("Errore" + xhr.status + ":" + xhr.statusText);
    
                    });
    }
    else if(e=='nome'){
            $("#zonaCarte").load("PHP/displayCollection.php",{sort:'order by nomecarta',check: sessionStorage.getItem("check")},
            function(responseTxt, statusTxt, xhr){
            if(statusTxt == "error")
            alert("Errore" + xhr.status + ":" + xhr.statusText);
            });
    }   
}

function cambiastatocheck(){
    if(!sessionStorage.hasOwnProperty("check")){ 
        sessionStorage.setItem("check","true");
    }
    else{
        if(sessionStorage.getItem("check")=="true"){ sessionStorage.setItem("check","false");}
        else if(sessionStorage.getItem("check")=="false"){ sessionStorage.setItem("check","true");}
    }
    DisplayCollezione(sessionStorage.getItem("lastsort"));
}

function showOverlay(){
    $('#overlay').toggleClass('hidden');
    $('#esc').toggleClass('hidden');
}

function flip(){
    //decommentare per far girare le carte nella collezione
    //$('#card-big').toggleClass('flipped');
}

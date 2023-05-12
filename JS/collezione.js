function DisplayCollezione(e){
    sessionStorage.setItem("lastsort",e);
    if(!sessionStorage.hasOwnProperty("check")){ 
        sessionStorage.setItem("check","false");
    }
    if(e=='default'){
        $("#zonaCarte").load("PHP/Carte.php",{sort:'order by id',check: sessionStorage.getItem("check")},
                        function(responseTxt, statusTxt, xhr){
                        if(statusTxt == "error")
                        alert("Errore" + xhr.status + ":" + xhr.statusText);
    
                    });
    }
    else if(e=='nome'){
            $("#zonaCarte").load("PHP/Carte.php",{sort:'order by nomecarta',check: sessionStorage.getItem("check")},
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

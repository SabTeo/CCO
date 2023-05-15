function DisplayCollezione(e){
    if(!sessionStorage.hasOwnProperty("check")){ 
        sessionStorage.setItem("check","false");
    }
    if(e=="start"){
        if(sessionStorage.hasOwnProperty("lastsort")){
            DisplayCollezione(sessionStorage.getItem("lastsort"));
            return;
        }
        else{(DisplayCollezione('default'));}
    }
    sessionStorage.setItem("lastsort",e);
    if(!sessionStorage.hasOwnProperty('order')){
        sessionStorage.setItem('order','asc');
    }
    if(e=='default'){
        loadperdisplay('order by id ');
    }
    else if(e=='nome'){
        loadperdisplay('order by nomecarta ');
    } 
    else if(e=='rarita'){
        loadperdisplay('order by rarita ');
    }  
}

function loadperdisplay(e1){
            $("#zonaCarte").load("PHP/displayCollection.php",{sort:e1,check: sessionStorage.getItem("check"),order:sessionStorage.getItem('order')},
            function(responseTxt, statusTxt, xhr){
            if(statusTxt == "error")
            alert("Errore" + xhr.status + ":" + xhr.statusText);
            });
}

function cambiaordine(e){
    sessionStorage.setItem('order',e);
    DisplayCollezione(sessionStorage.getItem("lastsort"));
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

function controllacheck(){
    if(sessionStorage.hasOwnProperty("check")){
        if(sessionStorage.getItem("check")=="true"){
            $('#checco').prop('checked',true);
        }
    }
}
function showOverlay(){
    $('#overlay').toggleClass('hidden');
    $('#esc').toggleClass('hidden');
}

function flip(){
    //decommentare per far girare le carte nella collezione
    //$('#card-big').toggleClass('flipped');
}

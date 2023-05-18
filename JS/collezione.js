function DisplayCollezione(e){
    if(!sessionStorage.hasOwnProperty("check")){ 
        sessionStorage.setItem("check","false");
    }
    if(e=="start"){
        if(sessionStorage.hasOwnProperty("lastsort")){
            DisplayCollezione(sessionStorage.getItem("lastsort"));
            return;
        }
        else{
            (DisplayCollezione('ID'));
            return;
        }
    }
    sessionStorage.setItem("lastsort",e);
    if(!sessionStorage.hasOwnProperty('order')){
        sessionStorage.setItem('order','asc');
    }
    if(e=='ID'){
        loadperdisplay('order by id ');
    }
    else if(e=='Nome'){
        loadperdisplay('order by nomecarta ');
    } 
    else if(e=='Rarità'){
        loadperdisplay('order by rarita ');
    }  
}

function loadperdisplay(e1){
            $("#zonaCarte").load("PHP/displayCollection.php",{sort:e1,check: sessionStorage.getItem("check"),order:sessionStorage.getItem('order')},
            function(responseTxt, statusTxt, xhr){
            if(statusTxt == "error") alert("Errore" + xhr.status + ":" + xhr.statusText);
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
    $('body').addClass('noScroll');
}

function flip(){
    //decommentare per far girare le carte nella collezione
    //$('#card-big').toggleClass('flipped');
}

function riempidropdown(){
    const primodd=document.querySelector('#primodd');
    const secondodd=document.querySelector('#secondodd');
    console.log(primodd);
    primodd.innerText=sessionStorage.getItem('lastsort');
    if(sessionStorage.getItem('order')=='asc'){
        secondodd.innerText='Crescente';
    }
    else if(sessionStorage.getItem('order')=='desc'){
        secondodd.innerText='Decrescente';
    }
}

function prova(){
    const dropdowns= document.querySelectorAll(".dropdown");
    dropdowns.forEach(dropdown =>{
        const select=dropdown.querySelector('.dropbtn');
        const triangolo=dropdown.querySelector('.triangolino ');
        const menu=dropdown.querySelector('.dropdown-content');
        const options=dropdown.querySelectorAll('.dropdown-content li');
        const selected=dropdown.querySelector('.selected');
        select.addEventListener('click',()=>{
             /*select.classList.toggle('select-clicked');*/
            triangolo.classList.toggle('triangolino-rotate');
            menu.classList.toggle('menu-open');
        });
        options.forEach(option =>{
            option.addEventListener('click',() =>{
                selected.innerText=option.innerText;
                console.log(selected.innerText);
                console.log(option.innerText);
                /*select.classList.remove('select-clicked');*/
                triangolo.classList.remove('triangolino-rotate');
                menu.classList.remove('menu-open');
                options.forEach(option=>{ 
                    option.classList.remove('active');
                });
            option.classList.add('active');
            });
        });
    });
}
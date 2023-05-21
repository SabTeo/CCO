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

//assume che id sia string
function loadCarta(id){
    $('#zonaDisplay').load('PHP/displayCard.php',{id:id},
    function(responseTxt, statusTxt, xhr){
        if(statusTxt == 'error') alert('Errore' + xhr.status + ':' + xhr.statusText);
        showOverlay();
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

//ATTENZIONE funzioni chiamate da php
//indici posizionali dell'ultima carta in display e della carta in ultima posizione
var currentIndex;
var maxIndex

function setIndex(n){
    currentIndex = n;
}

function setMaxIndex(m){
    maxIndex = m;
}

function showOverlay(){
    $('#overlay').removeClass('hidden');
    $('#esc').removeClass('hidden');
    $('#nextL').removeClass('hidden');
    $('#nextR').removeClass('hidden');
    $('body').addClass('noScroll');
    if(currentIndex==0) $('#nextL').addClass('hidden');
    if(currentIndex==maxIndex) $('#nextR').addClass('hidden');
}

function hideOverlay(){
    $('#overlay').addClass('hidden');
    $('#esc').addClass('hidden');
    $('#nextL').addClass('hidden');
    $('#nextR').addClass('hidden');
    $('body').removeClass('noScroll');
}

function loadNext(direction){
    if(direction=='R') nextIndex = parseInt(++currentIndex);   
    else nextIndex = parseInt(--currentIndex);
    nextId = $('[data-position='+String(nextIndex)+']').attr('id');
    loadCarta(String(nextId));
}

function showDialog(){
    MicroModal.show('modal-1');
}

function flip(){
    //decommentare per far girare le carte nella collezione
    //$('#card-big').toggleClass('flipped');
}

function riempidropdown(){
    const primodd=document.querySelector('#primodd');
    const secondodd=document.querySelector('#secondodd');
    primodd.innerText=sessionStorage.getItem('lastsort').toLowerCase();
    if(sessionStorage.getItem('order')=='asc'){
        //secondodd.innerText='crescente';
        secondodd.innerHTML='<img src="Assets/sort-desc-w.svg" class="sortIcon" style="transform: rotate(180deg)"></img>';
    }
    else if(sessionStorage.getItem('order')=='desc'){
        //secondodd.innerText='decrescente';
        secondodd.innerHTML='<img src="Assets/sort-desc-w.svg" class="sortIcon"></img>';
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
                if(option.innerHTML.trim()=='<img src="Assets/sort-desc.svg" class="sortIcon">')
                    selected.innerHTML='<img src="Assets/sort-desc-w.svg" class="sortIcon"></img>'
                else if(option.innerHTML.trim()=='<img src="Assets/sort-desc.svg" class="sortIcon" style="transform: rotate(180deg)">')
                    selected.innerHTML='<img src="Assets/sort-desc-w.svg" class="sortIcon" style="transform: rotate(180deg)">'
                else
                selected.innerHTML=option.innerHTML
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
//ATTENZIONE funzione chiamata da php
//indice dell'ultima carta in coda per l'animazione
var maxQueue;

function setMaxQueue(n){
    maxQueue = n;
}

function displayAnim(i){  
    //console.log(maxQueue);
        if(i>maxQueue) return; 
        $('[data-queue='+i+']').removeClass('initialpos');
        setTimeout(()=>{displayAnim(i+1)}, 30);
        //setTimeout(()=>{$('.initialpos').removeClass('initialpos')}, 75);
}
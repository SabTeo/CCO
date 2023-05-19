function buyAnim(){
    document.getElementById("buy-button").disabled = true;
    document.getElementById("lock").classList.add("enabled");
    var flipOnce = false;
    newCard = document.getElementById("card-new");
    newCard.addEventListener("click", ()=>{newCard.classList.toggle("flipped");
                                            flipOnce = true; 
                                            });
    setTimeout(()=>{
        document.getElementById("b1").classList.toggle("hidden")
    }, 200);
    setTimeout(()=>{
        document.getElementById("b2").classList.remove("hidden")
    }, 400);
    setTimeout(()=>{
        document.getElementById("b3").classList.remove("hidden")
    }, 600);
    setTimeout(()=>{
        document.getElementById("horizontal").classList.add("p1")
    }, 800);
    setTimeout(()=>{
        document.getElementById("horizontal").classList.add("p2")
    }, 1100);
    setTimeout(()=>{
        document.getElementById("anibox").classList.remove("anihidden")
    }, 1400);
    setTimeout(()=>{
        document.getElementById("end-button").addEventListener("click", ()=>{
            if(!flipOnce){
                newCard.classList.toggle("flipped");
                document.getElementById("end-button").disabled = true;
                setTimeout(()=>{
                    window.location.reload()
                }, 900);
            }
            else{
                window.location.reload()   
            }
        }
        )
        document.getElementById("end-button").classList.remove("invisible")
    }, 2200);
}

function displayTimer(){
    calculateTimer();
    setInterval(calculateTimer, 60000);
}

function calculateTimer(){
    hour = 15;
    today = new Date();
    nextAv = new Date(today.getFullYear(), today.getMonth(), today.getDate(), hour)
    //se l'ora di oggi è gia passata allora passo a domani
    if(!(today<nextAv)) nextAv = new Date(today.getFullYear(), today.getMonth(), today.getDate()+1, hour);
    //console.log(String(nextAv));
    msLeft = nextAv - today;
    msInHour = 3600000;
    msInMinute = 60000;
    hLeft = Math.floor(msLeft/msInHour);
    minLeft = Math.ceil((msLeft%msInHour)/msInMinute);
    if(hLeft==0 && minLeft==0){
        winbdow.location.reload();
    }
    plural = (hLeft==1)?' ora e ':' ore e '
    $('#timer').html(String(hLeft)+plural+String(minLeft)+' minuti');
    $('.tooltipTimer').html('(disponibile tra: '+ String(hLeft)+' ore e '+String(minLeft)+' minuti)');
}

// ATTEZIONE var valuta e var user inizializzate in php
var valuta;
var user;

function enoughCurrency(){
    //amount = parseInt($("#amountAv").html());
    if(valuta<100) return(false);
    return(true);
}

//colora la quantita di cristalli se sono abbastanza o meno per comprare
function colorAmount(){
    if(!enoughCurrency()){
        $("#amountAv").css({"font-size" : "21px", "color": "rgb(121, 49, 49)"});
    }
    else{
        $("#amountAv").css("font-size", "28px");
    }
}

function buy(){
    if(enoughCurrency()){
        $.get("PHP/newCard.php?user="+String(user),
        //$("#new-cont").load("PHP/newCard.php?user="+String(user),
        function(responseTxt, statusTxt, xhr){
            if(statusTxt == "error") alert("Errore" + xhr.status + ":" + xhr.statusText);
            else{
                if(responseTxt=='END'){
                    //alert('complimenti hai finito la collezione');
                    MicroModal.show('modal-1');
                    return;
                }
                $("#new-cont").html(responseTxt);
                buyAnim();
            }
        });
    }
}

function update(){
    colorAmount();
    tippy('.hov',{
        theme:'custom',
        arrow:'',
        content:$('.gift-tooltip').html(),
        allowHTML: true,
    });
}

$(window).on('load',update);
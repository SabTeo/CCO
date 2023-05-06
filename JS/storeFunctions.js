//animazione invocata da buy-button in html
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
        document.getElementById("new-card-cont").classList.remove("new-cont-hidden")
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

function enoughCurrency(){
    amount = parseInt($("#amountAv").html());
    if(amount<100) return(false);
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

function update(){
    colorAmount();
    tippy('.hov',{
        theme:'custom',
        arrow:'',
        content:"Visita il negozio ogni giorno tra le 15 e le 18 per ricevere il tuo bonus giornaliero di 100 cristalli"
    });
}

$( window ).on( "load",update());
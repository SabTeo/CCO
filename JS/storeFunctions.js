//animazione invocata da buy-button in html
function buyAnim(){
    document.getElementById("buy-button").disabled = true;
    document.getElementById("lock").classList.add("enabled");
    newCard = document.getElementById("card-new")
    newCard.addEventListener("click", ()=>{newCard.classList.toggle("flipped")})
    setTimeout(()=>{
        document.getElementById("b1").classList.remove("hidden")
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
        document.getElementById("card-new").classList.remove("hidden")
    }, 1400);
    setTimeout(()=>{
        document.getElementById("end-button").addEventListener("click", ()=>{
            if(newCard.classList.contains("flipped")){
                newCard.classList.toggle("flipped") 
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
}

$( window ).on( "load",update());
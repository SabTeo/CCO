//invocata da buy-button in html
function buyAnim(){
    document.getElementById("buy-button").disabled = true;
    document.getElementById("lock").classList.add("enabled")
    setTimeout(()=>{
        document.getElementById("b1").classList.remove("hidden")
    }, 200)
    setTimeout(()=>{
        document.getElementById("b2").classList.remove("hidden")
    }, 400)
    setTimeout(()=>{
        document.getElementById("b3").classList.remove("hidden")
    }, 600)
    setTimeout(()=>{
        document.getElementById("horizontal").classList.add("p1")
    }, 800)
    setTimeout(()=>{
        document.getElementById("horizontal").classList.add("p2")
    }, 1100)
    setTimeout(()=>{
        document.getElementById("card-new").classList.remove("hidden")
    }, 1400)
    setTimeout(()=>{
        document.getElementById("end-button").classList.remove("invisible")
    }, 2200)
}
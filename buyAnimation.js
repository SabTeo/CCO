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

}
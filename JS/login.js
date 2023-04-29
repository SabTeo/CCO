function resHandler(e){
    //$('.invalid-message').html(e.target.responseText);
    res = e.target.responseText;
    if(res!="LOGIN_SUCCESSFUL"){
        if(res=="INVALID_NAME"){
            $('.invalid-message').html("il nome utente inserito non esiste");
            $('#userfield').css('border-color', 'red');
        }
        else if(res=='INVALID_PASSWORD'){
            $('.invalid-message').html("la password non corrisponde al nome utente inserito");
            $('#passwordfield').css('border-color', 'red');
        }
    }
    else window.location.href = "main.php";
}

function login(){
    $('#userfield').css('border-color', '');
    $('#passwordfield').css('border-color', '');
    request = new XMLHttpRequest();
    request.onreadystatechange = resHandler;
    request.open("POST", "/PHP/loginver.php", true);
    request.setRequestHeader("Content-type", "application/x-www-form-urlencoded")
    request.send("Username="+$("#userfield").val()+"&inputPassword="+$("#passwordfield").val()+"&remember="+$('#rmb').is(":checked"));
}

function init(){
    $('#form').submit(function(e){
    e.preventDefault();
    //later you decide you want to submit
    //$(this).unbind('submit').submit()
    });
    ('.invalid-message').html('');
    $('#userfield').css('border-color', '');
    $('#passwordfield').css('border-color', '');
}

$(window).on("load", init());

function resHandler(e){
    if(!(e.target.readyState == 4 && e.target.status == 200))return;
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
    else window.location.href = "collezione.php";
}

function login(){
    $('#userfield').css('border-color', '');
    $('#passwordfield').css('border-color', '');
    request = new XMLHttpRequest();
    request.onreadystatechange = resHandler;
    request.open("POST", "/PHP/loginAj.php", true);
    request.setRequestHeader("Content-type", "application/x-www-form-urlencoded")
    body = "username="+$("#userfield").val()+"&inputPassword="+$("#passwordfield").val();
    if($('#rmb').is(":checked")){
        body = body +"&remember=true";
    }
    request.send(body);
}

function init(){
    $('#form').submit(function(e){
        e.preventDefault();
        login();
    });
    $('.invalid-message').html('');
    $('#userfield').css('border-color', '');
    $('#passwordfield').css('border-color', '');
}

$(window).on('load', init);


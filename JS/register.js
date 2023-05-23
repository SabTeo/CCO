//FUNZIONI DI VALDAZIONE

//manda chiamata ajax per verificare username o email (field) gia presenti
function verifyTaken(field, value){
    return new Promise(function(resolve, reject){
        request = new XMLHttpRequest();
        request.open('POST', '/PHP/registerAj.php', true);
        request.onload = function(e){
            resolve(e.target.responseText);
        }
        request.onerror = ()=>{resolve('error')};
        request.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
        if(field=='username')body = 'type=VER_U' + '&username=' + value;
        else if(field=='mail')body = 'type=VER_E' + '&mail=' + value;
        request.send(body);
        });
}

async function isUserValid(){
    value = String($('#userfield').val());
    if(value.length<4){
        $('#invUser').html('Il nome deve contenere almeno 4 caratteri');
        $('#userfield').css('border-color', 'red');
        return false;
    }
    if(value.length>16){
        $('#invUser').html('Il nome deve contenere al massimo 16 caratteri');
        $('#userfield').css('border-color', 'red');
        return false;
    }
    if(value.indexOf(' ')>=0){
        $('#invUser').html('Il nome non deve contenere spazi');
        $('#userfield').css('border-color', 'red');
        return false;
    }
    if(value.indexOf('\n')>=0){
        $('#invUser').html('Il nome non deve contenere spazi');
        $('#userfield').css('border-color', 'red');
        return false;
    }

    res = await verifyTaken('username', value);
    if(res=='TAKEN_U'){
        $('#invUser').html('Esiste già un utente con questo nome');
        $('#userfield').css('border-color', 'red');
        return false;
    }
    else if(res=='error'){
        alert('Errore interno');
        return false;
    }
    else{
        $('#invUser').html('');
        $('#userfield').css('border-color', 'forestgreen');
        return true;
    }
}

async function isMailValid(){
    value = String($('#mailfield').val());
    if(value.match(/[^\s@]+@[^\s@]+\.[^\s@]/)==null){
        $('#invMail').html('L\'email inserita non è valida');
        $('#mailfield').css('border-color', 'red');
        return false;
    }
    if(value.length>64){
        $('#invMail').html('L\'email inserita è più lunga di 64 caratteri');
        $('#mailfield').css('border-color', 'red');
        return false;
    }

    res = await verifyTaken('mail', value);
    if(res=='TAKEN_E'){
        $('#invMail').html('Esiste già un utente con questa email');
        $('#mailfield').css('border-color', 'red');
        return false;
    }
    else if(res=='error'){
        alert('Errore interno');
        return false;
    }
    else{
        $('#invMail').html('');
        $('#mailfield').css('border-color', 'forestgreen');
        return true;
    }
}

function isPassValid(){
    value = String($('#passwordfield').val());
    if(value.length<4){
        $('#invPass').html('La password deve contenere almeno 4 caratteri');
        $('#passwordfield').css('border-color', 'red');
        return false;
    }
    if(value.length>20){
        $('#invPass').html('hai fino a 256 caratteri a disposizione');
        $('#invPass').css('color', 'forestgreen');
        $('#passwordfield').css('border-color', 'forestgreen');
        return false;
    }
    if(value.indexOf(' ')>=0){
        $('#invPass').html('la password non deve contenere spazi');
        $('#passwordfield').css('border-color', 'red');
        return false;
    }
    if(value.indexOf('\n')>=0){
        $('#invPass').html('la password non deve contenere spazi');
        $('#passwordfield').css('border-color', 'red');
        return false;
    }
    if(value.match(/\d/)==null){
        $('#invPass').html('la password deve contenere almeno un numero');
        $('#passwordfield').css('border-color', 'red');
        return false;
    }
    $('#invPass').html('');
    $('#passwordfield').css('border-color', 'forestgreen');
    return true;
}

function resHandler(e){
    if(!(e.target.readyState == 4 && e.target.status == 200))return;
    res = e.target.responseText;
    switch(res){
        case('SUCCESS'):
            alert('Registrazione effettuata con successo');
            window.location.href = 'index.php';
        break;
        case('ERROR'):
            alert('Errore interno');
            window.location.reload();
        break;
    }
}

async function register(){
    u = await isUserValid();
    m = await isMailValid();
    p = isPassValid();
    if(!(u && m && p)) return;
    $('#userfield').css('border-color', '');
    $('#mailfield').css('border-color', '');
    $('#passwordfield').css('border-color', '');
    request = new XMLHttpRequest();
    request.onreadystatechange = resHandler;
    request.open('POST', '/PHP/registerAj.php', true);
    request.setRequestHeader('Content-type', 'application/x-www-form-urlencoded')
    body = 'type=REG'+
            '&username='+$('#userfield').val()+
            '&mail='+$('#mailfield').val()+
            '&inputPassword='+$('#passwordfield').val();
    request.send(body);
}

function init(){
    $('#form').submit(function(e){
        $('.btn').prop("disabled",true);
        e.preventDefault();
       register();
       $('.btn').prop("disabled",false);
    });
    $('.invalid-message').html('');
    $('#userfield').css('border-color', '');
    $('#mailfield').css('border-color', '');
    $('#passwordfield').css('border-color', '');
}

$(window).on('load',init);